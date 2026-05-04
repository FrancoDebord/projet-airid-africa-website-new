@extends('index')

@section('title', 'Procurements & Tenders | AIRID Africa')

@section('css')
    <style>
        /* ============================================
           ANIMATIONS AU SCROLL
           ============================================ */
        .fade-in-up {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }

        .fade-in-up.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* ============================================
           SECTION FILTRES
           ============================================ */
        .vacancies-filters {
            background: #f8f9fa;
            padding: 1.25rem 0;
            border-bottom: 1px solid #e0e0e0;
        }

        .filter-group {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            align-items: center;
        }

        .search-box {
            position: relative;
            flex: 1;
            min-width: 250px;
        }

        .search-box input {
            border-radius: 50px;
            border: 2px solid #e0e0e0;
            padding: 0.75rem 1.5rem 0.75rem 3rem;
            width: 100%;
            transition: all 0.3s ease;
        }

        .search-box input:focus {
            border-color: #c20102;
            box-shadow: 0 0 0 0.2rem rgba(194, 1, 2, 0.1);
        }

        .search-box i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #7f8c8d;
        }

        .filter-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        .filter-btn {
            padding: 0.5rem 1.5rem;
            border: 2px solid #e0e0e0;
            background: #fff;
            border-radius: 50px;
            color: var(--airid-tagline-color);
            font-weight: 600;
            transition: all 0.3s ease;
            cursor: pointer;
            font-size: var(--airid-text-size);
        }

        .filter-btn:hover,
        .filter-btn.active {
            background: #c20102;
            border-color: #c20102;
            color: #fff;
            transform: translateY(-2px);
        }

        .results-count {
            font-size: var(--airid-text-size);
            color: var(--airid-text-color);
            font-weight: 600;
            padding: 0.5rem 0;
            text-align: center;
        }

        /* ============================================
           CARTES D'OFFRES D'EMPLOI MODERNES
           ============================================ */
        .vacancy-card {
            background: #fff;
            border-radius: 12px;
            overflow: visible;
            box-shadow: 0 4px 16px rgba(0,0,0,0.07);
            transition: all 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
            border-top: 3px solid #c20102;
            position: relative;
        }
        .vacancy-card .vacancy-header { border-radius: 12px 12px 0 0; overflow: hidden; }
        .vacancy-actions { overflow: visible; }
        .vacancy-actions .dropdown { position: relative; }
        .vacancy-actions .dropdown-menu {
            position: absolute !important;
            top: 100% !important;
            bottom: auto !important;
            margin-top: 0.25rem;
            z-index: 1050;
        }

        .vacancy-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 24px rgba(0,0,0,0.12);
        }

        .vacancy-header {
            background: linear-gradient(135deg, rgba(194, 1, 2, 0.05) 0%, rgba(139, 1, 1, 0.05) 100%);
            padding: 1rem 1.25rem;
            border-bottom: 1px solid #f0f0f0;
        }

        .vacancy-badges {
            display: flex;
            flex-wrap: wrap;
            gap: 0.35rem;
            margin-bottom: 0.5rem;
        }

        .vacancy-badge {
            padding: 0.25rem 0.65rem;
            border-radius: 6px;
            font-size: var(--airid-tagline-size);
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
        }

        .badge-status {
            background: #27ae60;
            color: #fff;
        }

        .badge-status.closed {
            background: #95a5a6;
        }

        .badge-status.urgent {
            background: #e74c3c;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }

        .badge-contract {
            background: rgba(52, 152, 219, 0.1);
            color: #3498db;
        }

        .badge-location {
            background: rgba(155, 89, 182, 0.1);
            color: #9b59b6;
        }

        .badge-year {
            background: rgba(241, 196, 15, 0.1);
            color: #f1c40f;
        }

        .vacancy-title {
            font-size: var(--airid-h3-size);
            font-weight: 700;
            color: var(--airid-title-color);
            line-height: 1.35;
            margin-bottom: 0.25rem;
        }

        .vacancy-title a {
            color: var(--airid-title-color);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .vacancy-title a:hover {
            color: #c20102;
        }

        .vacancy-body {
            padding: 1rem 1.25rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .vacancy-info {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-bottom: 0.75rem;
            padding-bottom: 0.75rem;
            border-bottom: 1px solid #f0f0f0;
        }

        .vacancy-info-item {
            display: flex;
            align-items: center;
            gap: 0.4rem;
            font-size: var(--airid-text-size);
            color: var(--airid-text-color);
        }

        .vacancy-info-item i {
            color: #c20102;
            width: 16px;
            font-size: var(--airid-tagline-size);
        }

        .vacancy-deadline {
            background: #fff3cd;
            border-left: 3px solid #ffc107;
            padding: 0.6rem 0.85rem;
            border-radius: 6px;
            margin-bottom: 0.75rem;
        }

        .vacancy-deadline.closed {
            background: #f8d7da;
            border-left-color: #dc3545;
        }

        .vacancy-deadline-text {
            font-weight: 600;
            color: #856404;
            margin-bottom: 0.15rem;
            font-size: var(--airid-tagline-size);
        }

        .vacancy-deadline.closed .vacancy-deadline-text {
            color: #721c24;
        }

        .vacancy-deadline-date {
            color: #856404;
            font-size: var(--airid-text-size);
        }

        .vacancy-deadline.closed .vacancy-deadline-date {
            color: #721c24;
        }

        .vacancy-actions {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
            margin-top: auto;
            padding-top: 0.75rem;
            border-top: 1px solid #f0f0f0;
        }

        .vacancy-btn {
            flex: 1;
            min-width: 120px;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-weight: 600;
            font-size: var(--airid-text-size);
            text-decoration: none;
            text-align: center;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            border: none;
            cursor: pointer;
        }

        .btn-details {
            background: linear-gradient(135deg, #c20102 0%, #8b0101 100%);
            color: #fff;
        }

        .btn-details:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(194, 1, 2, 0.4);
            color: #fff;
        }

        .btn-apply {
            background: #27ae60;
            color: #fff;
        }

        .btn-apply:hover {
            background: #229954;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(39, 174, 96, 0.4);
            color: #fff;
        }

        .btn-download {
            background: #f8f9fa;
            color: #2c3e50;
            border: 2px solid #e0e0e0;
        }

        .btn-download:hover {
            background: #e9ecef;
            border-color: #c20102;
            color: #c20102;
            transform: translateY(-2px);
        }

        .btn-disabled {
            background: #e9ecef;
            color: #6c757d;
            cursor: not-allowed;
            opacity: 0.6;
        }

        .btn-details-closed {
            background: #e9ecef;
            color: #6c757d;
            border: none;
        }

        .btn-details-closed:hover {
            background: #dee2e6;
            color: #495057;
            transform: none;
            box-shadow: none;
        }

        .vacancy-card.closed-card {
            border-top-color: #95a5a6;
            opacity: 0.82;
        }

        .vacancy-card.closed-card .vacancy-header {
            background: linear-gradient(135deg, rgba(149, 165, 166, 0.08) 0%, rgba(108, 117, 125, 0.08) 100%);
        }

        /* ============================================
           MESSAGE AUCUN RÉSULTAT
           ============================================ */
        .no-results {
            text-align: center;
            padding: 4rem 2rem;
            color: #7f8c8d;
        }

        .no-results i {
            font-size: 4rem;
            margin-bottom: 1rem;
            color: #bdc3c7;
        }

        /* ============================================
           RESPONSIVE
           ============================================ */
        @media (max-width: 768px) {
            .filter-group {
                flex-direction: column;
            }

            .search-box {
                width: 100%;
            }

            .vacancy-actions {
                flex-direction: column;
            }

            .vacancy-btn {
                width: 100%;
            }
        }
    </style>
@endsection

@section('content')
    <!-- Hero Section -->
    <div id="banner-area" class="banner-area"
        style="background-image:url({{ asset('storage/assets_vendor/images/banner/banner2_new.png') }})">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title top_title fade-in-up">Procurements & Tenders</h1>
                            <p class="text-white mt-3 fade-in-up tagline mb-0" style="font-size: 1.4rem;">
                                Notices to suppliers and tender ’appels d’offres
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section Filtres -->
    <section class="vacancies-filters">
        <div class="container">
            <div class="filter-group">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input
                        type="text"
                        id="vacancy-search"
                        placeholder="Search by job title, location..."
                        autocomplete="off"
                    >
                </div>
                <div class="filter-buttons">
                    <button class="filter-btn active" data-filter="all">
                        <i class="fas fa-th me-2"></i>All
                    </button>
                    <button class="filter-btn" data-filter="open">
                        <i class="fas fa-check-circle me-2"></i>Open
                    </button>
                    <button class="filter-btn" data-filter="closed">
                        <i class="fas fa-times-circle me-2"></i>Closed
                    </button>
                </div>
            </div>
            <div class="results-count">
                <span id="results-count-text">Showing <strong id="results-number">{{ $all_vacancies->count() }}</strong> notice(s)</span>
            </div>
        </div>
    </section>

    <!-- Section Offres d'emploi -->
    @php
        $all_vacancies = ($all_vacancies ?? collect())->filter(fn($v) => strtoupper(trim($v->job_title ?? '')) === 'AVIS AUX FOURNISSEURS')->values();
    @endphp
    <section class="py-3 py-md-4">
        <div class="container">
            <div class="row text-center mb-3 fade-in-up">
                <div class="col-12">
                    <h2 class="section-title">Notice to Suppliers</h2>
                    <p class="section-lead mb-2">
                        Tenders and notices published by AIRID for suppliers and service providers
                    </p>
                    <div class="title-divider mx-auto mt-2 mb-3" style="width: 80px; height: 3px; background: linear-gradient(135deg, #c20102 0%, #8b0101 100%); border-radius: 2px;"></div>
                </div>
            </div>

            <div class="row g-3" id="vacancies-grid">
                @forelse ($all_vacancies ?? collect() as $index => $vacancy)
                    @php
                        $isOpen = $vacancy->application_deadline && date('Y-m-d') <= $vacancy->application_deadline;
                        $deadlineDate = $vacancy->application_deadline ? \Carbon\Carbon::parse($vacancy->application_deadline)->startOfDay() : null;
                        $daysLeftRaw = $deadlineDate ? $deadlineDate->diffInDays(now()->startOfDay(), false) : null;
                        $daysLeft = $daysLeftRaw !== null ? (int) round($daysLeftRaw) : null;
                        if ($daysLeft !== null && $daysLeft < 0) { $daysLeft = 0; }
                        $isUrgent = $isOpen && $daysLeft !== null && $daysLeft <= 7 && $daysLeft > 0;
                    @endphp
                    <div class="col-lg-6 vacancy-item fade-in-up"
                         data-status="{{ $isOpen ? 'open' : 'closed' }}"
                         data-title="{{ strtolower($vacancy->job_title ?? '') }}"
                         data-location="{{ strtolower($vacancy->location ?? '') }}"
                         data-contract="{{ strtolower($vacancy->contract_type ?? '') }}"
                         style="transition-delay: {{ ($index % 2) * 0.1 }}s">
                        <div class="vacancy-card {{ !$isOpen ? 'closed-card' : '' }}">
                            <div class="vacancy-header">
                                <div class="vacancy-badges">
                                    <span class="vacancy-badge badge-status {{ $isOpen ? ($isUrgent ? 'urgent' : '') : 'closed' }}">
                                        <i class="fas {{ $isOpen ? ($isUrgent ? 'fa-exclamation-triangle' : 'fa-check-circle') : 'fa-times-circle' }}"></i>
                                        {{ $isOpen ? ($isUrgent ? 'Urgent' : 'Open') : 'Closed' }}
                                    </span>
                                    @if($vacancy->contract_type)
                                        <span class="vacancy-badge badge-contract">
                                            <i class="fas fa-file-contract"></i>
                                            {{ $vacancy->contract_type }}
                                        </span>
                                    @endif
                                    @if($vacancy->location)
                                        <span class="vacancy-badge badge-location">
                                            <i class="fas fa-map-marker-alt"></i>
                                            {{ $vacancy->location }}
                                        </span>
                                    @endif
                                    @if($vacancy->application_lunch_date)
                                        <span class="vacancy-badge badge-year">
                                            <i class="far fa-calendar"></i>
                                            {{ date('Y', strtotime($vacancy->application_lunch_date)) }}
                                        </span>
                                    @endif
                                </div>
                                <h3 class="vacancy-title">
                                    <a href="{{ route('vacancyDetail', ['id' => $vacancy->id, 'slug' => Str::slug($vacancy->job_title ?? 'vacancy')]) }}">
                                        {{ $vacancy->job_title }}
                                    </a>
                                </h3>
                            </div>
                            <div class="vacancy-body">


                                @if($vacancy->application_deadline)
                                    <div class="vacancy-deadline {{ !$isOpen ? 'closed' : '' }}">
                                        <div class="vacancy-deadline-text">
                                            <i class="fas fa-clock me-2"></i>
                                            {{ $isOpen ? 'Application Deadline' : 'Application Closed' }}
                                        </div>
                                        <div class="vacancy-deadline-date">
                                            {{ \Carbon\Carbon::parse($vacancy->application_deadline)->format('l, F j, Y') }}
                                            @if($isOpen && $daysLeft !== null)
                                                @if($daysLeft > 0)
                                                    <span class="ms-2">({{ $daysLeft == 1 ? '1 day left' : (int)$daysLeft . ' days left' }})</span>
                                                @else
                                                    <span class="ms-2">(Today)</span>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                @endif

                                <div class="vacancy-actions">
                                    <a href="{{ route('vacancyDetail', ['id' => $vacancy->id, 'slug' => Str::slug($vacancy->job_title ?? 'vacancy')]) }}"
                                       class="vacancy-btn btn-details">
                                        <i class="fas fa-info-circle"></i>
                                        View Details
                                    </a>

                                    @if($isOpen)
                        @if($vacancy->email_apply)
                            <a href="mailto:{{ $vacancy->email_apply }}?subject={{ urlencode($vacancy->subject ?? 'Application for ' . $vacancy->job_title) }}"
                               class="vacancy-btn btn-apply">
                                <i class="fas fa-paper-plane"></i>
                                Apply Now
                            </a>
                        @endif
                    @else
                        <span class="vacancy-btn btn-disabled">
                            <i class="fas fa-lock"></i>
                            Applications Closed
                        </span>
                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 fade-in-up">
                        <div class="no-results">
                            <i class="fas fa-file-contract"></i>
                            <h3 class="mt-3 mb-2" style="color: #2c3e50;">No notices to suppliers at the moment</h3>
                            <p>Please check back later for notices and tenders.</p>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Message Aucun Résultat (caché par défaut) -->
            <div class="row d-none" id="no-results-message">
                <div class="col-12">
                    <div class="no-results">
                        <i class="fas fa-search"></i>
                        <h3 class="mt-3 mb-2" style="color: #2c3e50;">No notices match your search</h3>
                        <p>Try adjusting the filters or search terms.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        // ============================================
        // ANIMATIONS AU SCROLL
        // ============================================
        document.addEventListener('DOMContentLoaded', function() {
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            const animatedElements = document.querySelectorAll('.fade-in-up');
            animatedElements.forEach(el => {
                observer.observe(el);
            });
        });

        // ============================================
        // SYSTÈME DE FILTRES ET RECHERCHE
        // ============================================
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('vacancy-search');
            const filterButtons = document.querySelectorAll('.filter-btn');
            const vacancyItems = document.querySelectorAll('.vacancy-item');
            const resultsNumber = document.getElementById('results-number');
            const vacanciesGrid = document.getElementById('vacancies-grid');
            const noResultsMessage = document.getElementById('no-results-message');

            let currentFilter = 'all';
            let currentSearch = '';

            // Gestion des filtres
            filterButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    filterButtons.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');

                    currentFilter = this.getAttribute('data-filter');
                    filterVacancies();
                });
            });

            // Gestion de la recherche
            if (searchInput) {
                searchInput.addEventListener('input', function() {
                    currentSearch = this.value.toLowerCase().trim();
                    filterVacancies();
                });
            }

            // Fonction de filtrage
            function filterVacancies() {
                let visibleCount = 0;
                let hasVisible = false;

                vacancyItems.forEach(item => {
                    const status = item.getAttribute('data-status') || '';
                    const title = item.getAttribute('data-title') || '';
                    const location = item.getAttribute('data-location') || '';
                    const contract = item.getAttribute('data-contract') || '';

                    const matchesFilter = currentFilter === 'all' || status === currentFilter;
                    const matchesSearch = !currentSearch ||
                        title.includes(currentSearch) ||
                        location.includes(currentSearch) ||
                        contract.includes(currentSearch);

                    if (matchesFilter && matchesSearch) {
                        item.style.display = '';
                        visibleCount++;
                        hasVisible = true;
                    } else {
                        item.style.display = 'none';
                    }
                });

                // Mettre à jour le compteur
                if (resultsNumber) {
                    resultsNumber.textContent = visibleCount;
                }

                // Afficher/masquer le message "aucun résultat"
                if (hasVisible) {
                    if (vacanciesGrid) vacanciesGrid.style.display = '';
                    if (noResultsMessage) noResultsMessage.classList.add('d-none');
                } else {
                    if (vacanciesGrid) vacanciesGrid.style.display = 'none';
                    if (noResultsMessage) noResultsMessage.classList.remove('d-none');
                }
            }

            // Initialiser le filtrage
            filterVacancies();
        });
    </script>
@endsection


