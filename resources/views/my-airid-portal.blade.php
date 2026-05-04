@extends('index')

@section('title', 'My AIRID – Personal Portal')

@section('css')
<style>
    .portal-hero {
        background: linear-gradient(135deg, rgba(194,1,2,0.12) 0%, rgba(139,1,1,0.06) 50%, #f8f9fa 100%);
        padding: 2.5rem 0;
        text-align: center;
        border-bottom: 4px solid #c20102;
    }
    .portal-hero h1 { font-size: 2rem; font-weight: 700; color: #1a1a1a; margin-bottom: 0.5rem; }
    .portal-hero p { font-size: 1.1rem; color: #555; margin: 0; }
    .portal-intro {
        max-width: 720px;
        margin: 0 auto 2rem;
        padding: 0 1rem;
        font-size: 1rem;
        color: #555;
        line-height: 1.6;
    }
    .portal-grid {
        display: grid;
        gap: 1.5rem;
        grid-template-columns: 1fr;
        padding: 2rem 0;
    }
    @media (min-width: 576px) { .portal-grid { grid-template-columns: repeat(2, 1fr); } }
    @media (min-width: 992px) { .portal-grid { grid-template-columns: repeat(3, 1fr); gap: 2rem; } }
    .portal-card {
        display: block;
        background: #fff;
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 8px 28px rgba(0,0,0,0.08), 0 0 0 1px rgba(0,0,0,0.04);
        text-decoration: none;
        color: inherit;
        transition: box-shadow 0.35s ease, transform 0.35s ease;
        border-top: 4px solid #c20102;
    }
    .portal-card:hover {
        box-shadow: 0 16px 44px rgba(0,0,0,0.12), 0 0 0 2px rgba(194,1,2,0.2);
        transform: translateY(-4px);
        color: inherit;
        text-decoration: none;
    }
    .portal-card-icon {
        width: 64px;
        height: 64px;
        border-radius: 12px;
        background: linear-gradient(135deg, #c20102 0%, #8b0101 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 1.75rem;
        margin-bottom: 1rem;
    }
    .portal-card:hover .portal-card-icon { background: linear-gradient(135deg, #8b0101 0%, #5a0101 100%); }
    .portal-card h3 { font-size: 1.2rem; font-weight: 700; color: #1a1a1a; margin-bottom: 0.5rem; }
    .portal-card p { font-size: 0.95rem; color: #555; line-height: 1.5; margin: 0; }
    .portal-card-body { padding: 1.5rem; }
    .portal-card-cta {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        font-size: 0.9rem;
        font-weight: 600;
        color: #c20102;
        margin-top: 1rem;
    }
    .portal-card:hover .portal-card-cta { color: #8b0101; }
    .portal-card-cta i { font-size: 0.8rem; transition: transform 0.3s; }
    .portal-card:hover .portal-card-cta i { transform: translateX(4px); }

    .portal-search-wrap { padding: 1rem 0 0.5rem; max-width: 560px; margin: 0 auto; }
    .portal-search-wrap .form-control {
        border-radius: 10px;
        border: 2px solid #dee2e6;
        padding: 0.75rem 1rem 0.75rem 2.75rem;
        font-size: 1rem;
        transition: border-color 0.25s, box-shadow 0.25s;
    }
    .portal-search-wrap .form-control:focus {
        border-color: #c20102;
        box-shadow: 0 0 0 3px rgba(194,1,2,0.15);
        outline: 0;
    }
    .portal-search-inner { position: relative; }
    .portal-search-inner .search-icon {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: #6c757d;
        pointer-events: none;
        font-size: 1rem;
    }
    .portal-search-inner .form-control { padding-left: 2.75rem; }
    .portal-no-results { display: none; text-align: center; padding: 2.5rem 1rem; color: #555; font-size: 1.05rem; }
    .portal-no-results.visible { display: block; }
    .portal-card.portal-card-hidden { display: none !important; }
</style>
@endsection

@section('content')
    @php $portal_external = $portal_external ?? []; @endphp
    <div class="portal-hero">
        <div class="container">
            <h1>My AIRID</h1>
            <p>Personal view – Access to all AIRID sites and applications</p>
            <p class="portal-intro">Choose a card below to access the corresponding site or application.</p>
        </div>
    </div>

    <div class="container">
        <div class="portal-search-wrap">
            <div class="portal-search-inner">
                <span class="search-icon"><i class="fas fa-search"></i></span>
                <input type="text" class="form-control" id="portalSearch" placeholder="Search sites and applications..." autocomplete="off" aria-label="Search portal">
            </div>
        </div>
        <div class="portal-grid" id="portalGrid">
            {{-- AIRID public website --}}
            <a href="{{ route('index') }}" class="portal-card" data-search="airid website public institutional site news projects publications team partners">
                <div class="portal-card-body">
                    <div class="portal-card-icon"><i class="fas fa-globe"></i></div>
                    <h3>AIRID Website</h3>
                    <p>Public institutional site: news, projects, publications, team and partners.</p>
                    <span class="portal-card-cta">Open site <i class="fas fa-arrow-right"></i></span>
                </div>
            </a>

            {{-- Staff Platforms --}}
            <a href="{{ route('staffPlatforms.auth') }}" class="portal-card" data-search="staff platforms personal tools appraisals sop invoicing equipments training">
                <div class="portal-card-body">
                    <div class="portal-card-icon"><i class="fas fa-layer-group"></i></div>
                    <h3>Staff Platforms</h3>
                    <p>Access to personal platforms and tools reserved for AIRID staff.</p>
                    <span class="portal-card-cta">Access Platforms <i class="fas fa-arrow-right"></i></span>
                </div>
            </a>

            
            {{-- Conflict of Interest --}}
            <a href="{{ route('conflict.access.form') }}" class="portal-card" data-search="conflict of interest coi declaration management secure access code">
                <div class="portal-card-body">
                    <div class="portal-card-icon"><i class="fas fa-balance-scale"></i></div>
                    <h3>Conflict of Interest</h3>
                    <p>Declaration and management of conflicts of interest (COI) – secure access by code.</p>
                    <span class="portal-card-cta">Access COI <i class="fas fa-arrow-right"></i></span>
                </div>
            </a>

            {{-- Service Provider Registration Form (external) --}}
            <a href="{{ $portal_external['provider_registration_form'] ?? 'https://forms.gle/5rea4mDT8xRTy24J7' }}" class="portal-card portal-card-external" target="_blank" rel="noopener noreferrer" data-search="service provider registration form prestataires">
                <div class="portal-card-body">
                    <div class="portal-card-icon"><i class="fas fa-user-plus"></i></div>
                    <h3>Service Provider Registration</h3>
                    <p>AIRID service provider registration form.</p>
                    <span class="portal-card-cta">Open form <i class="fas fa-external-link-alt"></i></span>
                </div>
            </a>

        </div>
        <p class="portal-no-results" id="portalNoResults">No applications or sites match your search. Try different keywords.</p>
    </div>
@endsection

@section('js')
<script>
document.addEventListener('DOMContentLoaded', function() {
    var searchInput = document.getElementById('portalSearch');
    var grid = document.getElementById('portalGrid');
    var noResults = document.getElementById('portalNoResults');
    var cards = grid ? grid.querySelectorAll('.portal-card') : [];

    function runSearch() {
        var q = (searchInput.value || '').trim().toLowerCase();
        var visibleCount = 0;
        cards.forEach(function(card) {
            var text = (card.getAttribute('data-search') || '').toLowerCase();
            var match = !q || text.indexOf(q) !== -1;
            if (match) {
                card.classList.remove('portal-card-hidden');
                visibleCount++;
            } else {
                card.classList.add('portal-card-hidden');
            }
        });
        if (noResults) noResults.classList.toggle('visible', visibleCount === 0);
    }

    if (searchInput) {
        searchInput.addEventListener('input', runSearch);
        searchInput.addEventListener('keyup', runSearch);
    }
});
</script>
@endsection
