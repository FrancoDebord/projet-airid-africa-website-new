@php
    $byLevel = $staff->groupBy('niveau_poste')->sortKeys();
    $levelColors = [
        1 => 'org-level-1',  // Sommet (violet / rouge foncé)
        2 => 'org-level-2',  // Orange / bordeaux
        3 => 'org-level-3',  // Bleu
        4 => 'org-level-4',  // Vert
        5 => 'org-level-5',  // Autres niveaux
    ];
@endphp

<div class="org-chart-wrapper">
    <h2 class="section-title mb-4">
        <i class="fas fa-sitemap"></i> Organisational Chart
    </h2>
    <p class="section-lead mb-4">
        AIRID’s organisational structure and reporting lines. This chart is built from current staff data and updates automatically when new members are added.
    </p>

    @if($staff->isEmpty())
        <div class="org-chart-empty text-center py-5">
            <i class="fas fa-users fa-3x text-muted mb-3"></i>
            <p class="text-muted mb-0">No staff data available for the chart. Add staff in the admin panel to see the organisational structure here.</p>
        </div>
    @else
        <div class="org-chart">
            @foreach($byLevel as $niveau => $persons)
                @php $levelClass = $levelColors[$niveau] ?? 'org-level-5'; @endphp
                <div class="org-level" data-level="{{ $niveau }}">
                    @if(!$loop->first)
                        <div class="org-connector org-connector-vertical"></div>
                    @endif
                    <div class="org-row">
                        @foreach($persons as $person)
                            <div class="org-card-wrapper">
                                <a href="{{ route('detail-staff', ['id' => $person->id, 'slug' => \Str::slug($person->titre . ' ' . $person->prenom_personnel . ' ' . $person->nom_personnel) ]) }}" class="org-card {{ $levelClass }}">
                                    <div class="org-card-avatar">
                                        @if($person->photo_personnel)
                                            @php
                                                $photoName = basename($person->photo_personnel);
                                                $photoPath = 'assets/staff/' . $photoName;
                                                $placeholderUrl = asset('storage/assets_vendor/images/team/placeholder.jpg');
                                            @endphp
                                            <img src="{{ asset($photoPath) }}" alt="{{ $person->prenom_personnel }} {{ $person->nom_personnel }}" loading="lazy" onerror="this.onerror=null; this.src='{{ $placeholderUrl }}';">
                                        @else
                                            <img src="{{ asset('storage/assets_vendor/images/team/placeholder.jpg') }}" alt="{{ $person->prenom_personnel }} {{ $person->nom_personnel }}">
                                        @endif
                                    </div>
                                    <div class="org-card-body">
                                        <div class="org-card-name">{{ $person->titre }} {{ $person->prenom_personnel }} {{ $person->nom_personnel }}</div>
                                        @if($person->posteOccupe)
                                            <div class="org-card-position">{{ $person->posteOccupe->intitule_poste }}</div>
                                        @endif
                                        
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    @if(!$loop->last)
                        <div class="org-connector org-connector-down"></div>
                    @endif
                </div>
            @endforeach
        </div>
    @endif
</div>

<style>
    .org-chart-wrapper { font-size: var(--airid-text-size); color: var(--airid-text-color); }
    .org-chart-wrapper .section-title { font-size: var(--airid-h2-size); font-weight: 700; color: var(--airid-title-color); padding-bottom: 0.5rem; border-bottom: 3px solid #c20102; display: flex; align-items: center; gap: 0.5rem; }
    .org-chart-wrapper .section-title i { color: #c20102; }
    .org-chart-wrapper .section-lead { color: var(--airid-text-color); line-height: 1.6; }

    .org-chart-empty { background: #f8f9fa; border-radius: 12px; }

    .org-chart { display: flex; flex-direction: column; align-items: center; gap: 0; padding: 1rem 0; }
    .org-level { display: flex; flex-direction: column; align-items: center; width: 100%; }
    .org-connector { flex-shrink: 0; }
    .org-connector-top { height: 0; }
    .org-connector-vertical { width: 2px; min-height: 28px; background: #adb5bd; margin: 0 auto; }
    .org-connector-down { width: 2px; height: 28px; background: #adb5bd; margin: 0 auto; }
    .org-row { display: flex; flex-wrap: wrap; justify-content: center; align-items: stretch; gap: 1.25rem; margin: 0.5rem 0; }
    .org-card-wrapper { display: flex; align-items: center; }

    .org-card { display: flex; flex-direction: column; align-items: center; width: 220px; min-height: 200px; background: #fff; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.1); border: 2px solid #dee2e6; padding: 1rem; text-decoration: none !important; color: inherit; transition: all 0.25s ease; }
    .org-card:hover { transform: translateY(-4px); box-shadow: 0 8px 28px rgba(0,0,0,0.12); text-decoration: none; color: inherit; }
    .org-card.org-level-1 { border-color: #6f42c1; }
    .org-card.org-level-1 .org-card-avatar { border-color: #6f42c1; }
    .org-card.org-level-1:hover { border-color: #5a32a3; box-shadow: 0 8px 28px rgba(111,66,193,0.25); }
    .org-card.org-level-2 { border-color: #fd7e14; }
    .org-card.org-level-2 .org-card-avatar { border-color: #fd7e14; }
    .org-card.org-level-2:hover { border-color: #e8590c; box-shadow: 0 8px 28px rgba(253,126,20,0.25); }
    .org-card.org-level-3 { border-color: #0d6efd; }
    .org-card.org-level-3 .org-card-avatar { border-color: #0d6efd; }
    .org-card.org-level-3:hover { border-color: #0b5ed7; box-shadow: 0 8px 28px rgba(13,110,253,0.25); }
    .org-card.org-level-4 { border-color: #198754; }
    .org-card.org-level-4 .org-card-avatar { border-color: #198754; }
    .org-card.org-level-4:hover { border-color: #146c43; box-shadow: 0 8px 28px rgba(25,135,84,0.25); }
    .org-card.org-level-5 { border-color: #c20102; }
    .org-card.org-level-5 .org-card-avatar { border-color: #c20102; }
    .org-card.org-level-5:hover { border-color: #a00102; box-shadow: 0 8px 28px rgba(194,1,2,0.25); }

    .org-card-avatar { width: 64px; height: 64px; border-radius: 50%; overflow: hidden; border: 3px solid #dee2e6; flex-shrink: 0; margin-bottom: 0.75rem; }
    .org-card-avatar img { width: 100%; height: 100%; object-fit: cover; }
    .org-card-body { text-align: center; flex: 1; display: flex; flex-direction: column; justify-content: flex-start; }
    .org-card-name { font-weight: 700; font-size: 0.95rem; color: #2c3e50; margin-bottom: 0.25rem; line-height: 1.3; }
    .org-card-position { font-size: 0.8rem; color: #c20102; font-weight: 600; margin-bottom: 0.35rem; }
    .org-card-desc { font-size: 0.75rem; color: #6c757d; line-height: 1.4; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; }

    @media (max-width: 768px) {
        .org-row { flex-direction: column; align-items: center; gap: 1rem; }
        .org-card { width: 100%; max-width: 280px; }
    }
</style>
