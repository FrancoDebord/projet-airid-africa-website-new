@extends('admin.layout')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-white rounded h-100 p-4">
                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
                        <div>
                            <h6 class="mb-0">Statistiques des visiteurs</h6>
                            <p class="text-muted mb-0">Nombre de visites, actions, durée sur le site et pays des visiteurs</p>
                        </div>
                        <div class="d-flex align-items-center gap-2 flex-wrap">
                            <a href="{{ route('admin.analytics.export-pdf', array_merge(request()->only('period', 'year', 'month'))) }}" class="btn btn-danger">
                                <i class="fas fa-file-pdf me-2"></i>Exporter en PDF
                            </a>
                        </div>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    {{-- Filtres par période --}}
                    <form method="get" action="{{ route('admin.analytics.index') }}" class="row g-3 mb-4 p-3  rounded">
                        <div class="col-auto">
                            <label class="form-label mb-0">Période</label>
                            <select name="period" class="form-select" id="analytics-period">
                                <option value="month" {{ $period === 'month' ? 'selected' : '' }}>Par mois</option>
                                <option value="year" {{ $period === 'year' ? 'selected' : '' }}>Par année</option>
                            </select>
                        </div>
                        <div class="col-auto" id="wrap-month">
                            <label class="form-label mb-0">Mois</label>
                            <select name="month" class="form-select">
                                @foreach(['01'=>'Janvier','02'=>'Février','03'=>'Mars','04'=>'Avril','05'=>'Mai','06'=>'Juin','07'=>'Juillet','08'=>'Août','09'=>'Septembre','10'=>'Octobre','11'=>'Novembre','12'=>'Décembre'] as $m => $name)
                                    <option value="{{ $m }}" {{ (int)($month ?? 0) === (int)$m ? 'selected' : '' }}>{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-auto">
                            <label class="form-label mb-0">Année</label>
                            <select name="year" class="form-select">
                                @foreach($years as $y)
                                    <option value="{{ $y }}" {{ $year === $y ? 'selected' : '' }}>{{ $y }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-auto d-flex align-items-end">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-filter me-1"></i> Appliquer</button>
                        </div>
                    </form>

                    <p class="text-muted mb-3"><strong>Rapport :</strong> {{ $label }}</p>

                    {{-- Cartes récap --}}
                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <div class="border rounded p-3  bg-opacity-10">
                                <div class="text-muted small">Nombre de visiteurs (sessions)</div>
                                <div class="h4 mb-0 text-primary">{{ number_format($stats['total_visits'], 0, ',', ' ') }}</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border rounded p-3  bg-opacity-10">
                                <div class="text-muted small">Nombre total de pages vues</div>
                                <div class="h4 mb-0 text-success">{{ number_format($stats['total_page_views'], 0, ',', ' ') }}</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border rounded p-3  bg-opacity-10">
                                <div class="text-muted small">Durée totale sur le site</div>
                                @php
                                    $s = (int) $stats['total_duration_seconds'];
                                    if ($s < 60) { $dur = $s . ' s'; }
                                    elseif ($s < 3600) { $dur = floor($s/60) . ' min ' . ($s%60 ? $s%60 . ' s' : ''); }
                                    else { $h = floor($s/3600); $m = floor(($s%3600)/60); $dur = $h . ' h ' . ($m ? $m . ' min' : ''); }
                                @endphp
                                <div class="h4 mb-0 text-info">{{ $dur }}</div>
                            </div>
                        </div>
                    </div>

                    {{-- Résumé par rapport à la période précédente --}}
                    <div class="mb-4 p-3 rounded border ">
                        <h6 class="mb-3"><i class="fas fa-chart-line me-2"></i>Résumé par rapport à {{ $comparison['prev_label'] }}</h6>
                        @if($comparison['prev_visits'] > 0 || $stats['total_visits'] > 0)
                            <div class="row g-2 small">
                                <div class="col-md-4">
                                    <span class="text-muted">Visiteurs :</span>
                                    @if($comparison['visits_var_pct'] !== null)
                                        <span class="{{ $comparison['visits_var_pct'] >= 0 ? 'text-success' : 'text-danger' }}">
                                            {{ $comparison['visits_var_pct'] >= 0 ? '+' : '' }}{{ $comparison['visits_var_pct'] }} %
                                        </span>
                                    @else
                                        <span class="text-muted">—</span>
                                    @endif
                                    <span class="text-muted">vs période précédente</span>
                                </div>
                                <div class="col-md-4">
                                    <span class="text-muted">Pages vues :</span>
                                    @if($comparison['page_views_var_pct'] !== null)
                                        <span class="{{ $comparison['page_views_var_pct'] >= 0 ? 'text-success' : 'text-danger' }}">
                                            {{ $comparison['page_views_var_pct'] >= 0 ? '+' : '' }}{{ $comparison['page_views_var_pct'] }} %
                                        </span>
                                    @else
                                        <span class="text-muted">—</span>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <span class="text-muted">Durée totale :</span>
                                    @if($comparison['duration_var_pct'] !== null)
                                        <span class="{{ $comparison['duration_var_pct'] >= 0 ? 'text-success' : 'text-danger' }}">
                                            {{ $comparison['duration_var_pct'] >= 0 ? '+' : '' }}{{ $comparison['duration_var_pct'] }} %
                                        </span>
                                    @else
                                        <span class="text-muted">—</span>
                                    @endif
                                </div>
                                <div class="col-12 mt-2 pt-2 border-top">
                                    <span class="text-muted">Pays le plus représenté cette période :</span>
                                    <strong>{{ $comparison['top_country_now'] ?: '—' }}</strong>
                                    @if($comparison['top_country_prev'] && $comparison['top_country_now'] !== $comparison['top_country_prev'])
                                        <span class="text-muted">(précédent : {{ $comparison['top_country_prev'] }})</span>
                                    @endif
                                </div>
                            </div>
                        @else
                            <p class="text-muted mb-0 small">Aucune donnée pour la période précédente ; pas de comparaison possible.</p>
                        @endif
                    </div>

                    {{-- Répartition par pays --}}
                    <div class="mb-4">
                        <h6 class="mb-2">Répartition par pays</h6>
                        <div class="table-responsive">
                            <table class="table table-sm table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th>Pays</th>
                                        <th class="text-end">Nombre de visites</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($byCountry as $row)
                                        <tr>
                                            <td>{{ $row->country ?: 'Inconnu' }}</td>
                                            <td class="text-end">{{ number_format($row->cnt, 0, ',', ' ') }}</td>
                                        </tr>
                                    @empty
                                        <tr><td colspan="2" class="text-muted">Aucune donnée pour cette période.</td></tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- Liste des visites --}}
                    <h6 class="mb-2">Détail des visites</h6>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>Date / Heure</th>
                                    <th>Pays</th>
                                    <th>IP</th>
                                    <th class="text-end">Pages vues</th>
                                    <th>Durée</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($visits as $v)
                                    <tr>
                                        <td>{{ $v->first_seen_at->format('d/m/Y H:i') }}</td>
                                        <td>{{ $v->country ?: 'Inconnu' }}</td>
                                        <td><code class="small">{{ $v->ip_address }}</code></td>
                                        <td class="text-end">{{ $v->page_views_count }}</td>
                                        <td>{{ $v->formatted_duration }}</td>
                                    </tr>
                                @empty
                                    <tr><td colspan="5" class="text-muted">Aucune visite pour cette période.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center mt-3">
                        {{ $visits->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('analytics-period').addEventListener('change', function() {
            document.getElementById('wrap-month').style.display = this.value === 'month' ? 'block' : 'none';
        });
        document.getElementById('wrap-month').style.display = document.getElementById('analytics-period').value === 'month' ? 'block' : 'none';
    </script>
@endsection
