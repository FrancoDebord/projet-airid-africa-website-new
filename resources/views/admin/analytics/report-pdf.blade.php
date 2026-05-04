<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Rapport visiteurs - {{ $label }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 11px; }
        h1 { font-size: 16px; color: #333; border-bottom: 1px solid #333; padding-bottom: 6px; }
        h2 { font-size: 13px; margin-top: 14px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 12px; }
        th, td { border: 1px solid #ddd; padding: 6px 8px; text-align: left; }
        th { background: #f5f5f5; font-weight: bold; }
        .text-right { text-align: right; }
        .stats { margin: 12px 0; }
        .stats div { margin: 4px 0; }
        .meta { color: #666; font-size: 10px; margin-top: 16px; }
    </style>
</head>
<body>
    <h1>Rapport des visiteurs du site – {{ $label }}</h1>
    <p class="meta">Généré le {{ now()->format('d/m/Y à H:i') }}</p>

    <h2>Synthèse</h2>
    <div class="stats">
        <div><strong>Nombre de visiteurs (sessions) :</strong> {{ number_format($stats['total_visits'], 0, ',', ' ') }}</div>
        <div><strong>Nombre total de pages vues :</strong> {{ number_format($stats['total_page_views'], 0, ',', ' ') }}</div>
        <div><strong>Durée totale sur le site :</strong>
            @php
                $s = (int) $stats['total_duration_seconds'];
                if ($s < 60) { $dur = $s . ' s'; }
                elseif ($s < 3600) { $dur = floor($s/60) . ' min ' . ($s%60 ? $s%60 . ' s' : ''); }
                else { $h = floor($s/3600); $m = floor(($s%3600)/60); $dur = $h . ' h ' . ($m ? $m . ' min' : ''); }
            @endphp
            {{ $dur }}
        </div>
    </div>

    @if(isset($comparison) && ($comparison['visits_var_pct'] !== null || $comparison['prev_label']))
    <h2>Résumé par rapport à {{ $comparison['prev_label'] }}</h2>
    <div class="stats">
        <div>Visiteurs : {{ $comparison['visits_var_pct'] !== null ? ($comparison['visits_var_pct'] >= 0 ? '+' : '') . $comparison['visits_var_pct'] . ' %' : '—' }} vs période précédente</div>
        <div>Pages vues : {{ $comparison['page_views_var_pct'] !== null ? ($comparison['page_views_var_pct'] >= 0 ? '+' : '') . $comparison['page_views_var_pct'] . ' %' : '—' }}</div>
        <div>Durée totale : {{ $comparison['duration_var_pct'] !== null ? ($comparison['duration_var_pct'] >= 0 ? '+' : '') . $comparison['duration_var_pct'] . ' %' : '—' }}</div>
        <div>Pays le plus représenté : <strong>{{ $comparison['top_country_now'] ?: '—' }}</strong></div>
    </div>
    @endif

    <h2>Répartition par pays</h2>
    <table>
        <thead>
            <tr>
                <th>Pays</th>
                <th class="text-right">Nombre de visites</th>
            </tr>
        </thead>
        <tbody>
            @foreach($byCountry as $country => $cnt)
                <tr>
                    <td>{{ $country ?: 'Inconnu' }}</td>
                    <td class="text-right">{{ number_format($cnt, 0, ',', ' ') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Détail des visites</h2>
    <table>
        <thead>
            <tr>
                <th>Date / Heure</th>
                <th>Pays</th>
                <th>IP</th>
                <th class="text-right">Pages vues</th>
                <th>Durée</th>
            </tr>
        </thead>
        <tbody>
            @foreach($visits as $v)
                <tr>
                    <td>{{ $v->first_seen_at->format('d/m/Y H:i') }}</td>
                    <td>{{ $v->country ?: 'Inconnu' }}</td>
                    <td>{{ $v->ip_address }}</td>
                    <td class="text-right">{{ $v->page_views_count }}</td>
                    <td>{{ $v->formatted_duration }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p class="meta">Fin du rapport – AIRID Admin</p>
</body>
</html>
