<?php

namespace App\Http\Middleware;

use App\Models\SiteVisit;
use App\Models\SiteVisitAction;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class TrackSiteVisit
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Ne pas tracker les requêtes admin, API, ou sans session
        if ($request->is('admin/*') || $request->is('api/*') || ! $request->hasSession()) {
            return $response;
        }

        try {
            $this->recordVisit($request);
        } catch (\Throwable $e) {
            Log::channel('single')->warning('TrackSiteVisit: enregistrement impossible.', [
                'message' => $e->getMessage(),
                'url' => $request->fullUrl(),
            ]);
        }

        return $response;
    }

    /**
     * Enregistre ou met à jour la visite (isolé pour try/catch).
     */
    private function recordVisit(Request $request): void
    {
        $sessionId = $request->session()->getId();
        $ip = $request->ip();
        $userAgent = $request->userAgent();
        $url = $request->fullUrl();
        $pageTitle = null;

        $visit = SiteVisit::where('session_id', $sessionId)->first();
        $now = now();

        if ($visit) {
            $durationSeconds = (int) $visit->first_seen_at->diffInSeconds($now, true);
            $visit->update([
                'last_seen_at' => $now,
                'duration_seconds' => $durationSeconds,
                'page_views_count' => $visit->page_views_count + 1,
            ]);
        } else {
            $country = config('analytics.geo_lookup_enabled', true)
                ? $this->getCountryFromIp($ip)
                : [];
            $visit = SiteVisit::create([
                'session_id' => $sessionId,
                'ip_address' => $ip,
                'country' => $country['country'] ?? 'Inconnu',
                'country_code' => $country['countryCode'] ?? null,
                'user_agent' => $userAgent,
                'first_seen_at' => $now,
                'last_seen_at' => $now,
                'duration_seconds' => 0,
                'page_views_count' => 1,
            ]);
        }

        SiteVisitAction::create([
            'site_visit_id' => $visit->id,
            'url' => strlen($url) > 500 ? substr($url, 0, 497) . '...' : $url,
            'page_title' => $pageTitle,
            'action_type' => 'page_view',
            'created_at' => $now,
        ]);
    }

    /**
     * Résolution pays à partir de l'IP (ip-api.com, gratuit, sans clé).
     * Désactivable via config analytics.geo_lookup_enabled (ex: hébergement LWS).
     */
    private function getCountryFromIp(?string $ip): array
    {
        if (! $ip || in_array($ip, ['127.0.0.1', '::1'], true)) {
            return ['country' => 'Local', 'countryCode' => 'LOC'];
        }

        $url = 'http://ip-api.com/json/' . urlencode($ip) . '?fields=country,countryCode&lang=fr';
        $ctx = stream_context_create(['http' => ['timeout' => 2]]);
        $json = @file_get_contents($url, false, $ctx);
        if ($json === false) {
            return [];
        }
        $data = json_decode($json, true);
        return is_array($data) ? $data : [];
    }
}
