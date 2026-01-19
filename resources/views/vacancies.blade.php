@extends('index')

@section('title', 'Vacancies at AIRID')

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
            padding: 2rem 0;
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
            color: #7f8c8d;
            font-weight: 600;
            transition: all 0.3s ease;
            cursor: pointer;
            font-size: 0.9rem;
        }

        .filter-btn:hover,
        .filter-btn.active {
            background: #c20102;
            border-color: #c20102;
            color: #fff;
            transform: translateY(-2px);
        }

        .results-count {
            color: #7f8c8d;
            font-weight: 600;
            padding: 0.5rem 0;
            text-align: center;
        }

        /* ============================================
           CARTES D'OFFRES D'EMPLOI MODERNES
           ============================================ */
        .vacancy-card {
            background: #fff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 5px 25px rgba(0,0,0,0.08);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            height: 100%;
            display: flex;
            flex-direction: column;
            border-top: 4px solid #c20102;
            position: relative;
        }

        .vacancy-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }

        .vacancy-header {
            background: linear-gradient(135deg, rgba(194, 1, 2, 0.05) 0%, rgba(139, 1, 1, 0.05) 100%);
            padding: 1.5rem;
            border-bottom: 1px solid #f0f0f0;
        }

        .vacancy-badges {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .vacancy-badge {
            padding: 0.4rem 1rem;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
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
            font-size: 1.3rem;
            font-weight: 700;
            color: #2c3e50;
            line-height: 1.4;
            margin-bottom: 0.5rem;
        }

        .vacancy-title a {
            color: #2c3e50;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .vacancy-title a:hover {
            color: #c20102;
        }

        .vacancy-body {
            padding: 1.5rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .vacancy-info {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid #f0f0f0;
        }

        .vacancy-info-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #7f8c8d;
            font-size: 0.95rem;
        }

        .vacancy-info-item i {
            color: #c20102;
            width: 20px;
        }

        .vacancy-deadline {
            background: #fff3cd;
            border-left: 4px solid #ffc107;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
        }

        .vacancy-deadline.closed {
            background: #f8d7da;
            border-left-color: #dc3545;
        }

        .vacancy-deadline-text {
            font-weight: 600;
            color: #856404;
            margin-bottom: 0.25rem;
        }

        .vacancy-deadline.closed .vacancy-deadline-text {
            color: #721c24;
        }

        .vacancy-deadline-date {
            color: #856404;
            font-size: 0.9rem;
        }

        .vacancy-deadline.closed .vacancy-deadline-date {
            color: #721c24;
        }

        .vacancy-actions {
            display: flex;
            gap: 0.75rem;
            flex-wrap: wrap;
            margin-top: auto;
            padding-top: 1rem;
            border-top: 1px solid #f0f0f0;
        }

        .vacancy-btn {
            flex: 1;
            min-width: 140px;
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.9rem;
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
                            <h1 class="banner-title top_title fade-in-up">Job Opportunities</h1>
                            <p class="text-white mt-3 fade-in-up" style="font-size: 1.2rem;">
                                Join our team and contribute to groundbreaking research
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
                <span id="results-count-text">Showing <strong id="results-number">{{ $all_vacancies->count() }}</strong> vacancy(ies)</span>
            </div>
        </div>
    </section>

    <!-- Section Offres d'emploi -->
    <section class="py-5">
        <div class="container">
            <div class="row text-center mb-5 fade-in-up">
                <div class="col-12">
                    <h2 class="section-title" style="font-size: 2.5rem; font-weight: 700; color: #2c3e50;">Current Vacancies</h2>
                    <p class="text-muted mb-4" style="font-size: 1.1rem;">
                        Explore career opportunities at AIRID
                    </p>
                    <div class="title-divider mx-auto mt-3 mb-4" style="width: 100px; height: 4px; background: linear-gradient(135deg, #c20102 0%, #8b0101 100%); border-radius: 2px;"></div>
                </div>
            </div>

            <div class="row g-4" id="vacancies-grid">
                @forelse ($all_vacancies as $index => $vacancy)
                    @php
                        $isOpen = $vacancy->application_deadline && date('Y-m-d') <= $vacancy->application_deadline;
                        $daysLeft = $vacancy->application_deadline ? \Carbon\Carbon::parse($vacancy->application_deadline)->diffInDays(now(), false) : null;
                        $isUrgent = $isOpen && $daysLeft !== null && $daysLeft <= 7 && $daysLeft >= 0;
                    @endphp
                    <div class="col-lg-6 vacancy-item fade-in-up" 
                         data-status="{{ $isOpen ? 'open' : 'closed' }}"
                         data-title="{{ strtolower($vacancy->job_title ?? '') }}"
                         data-location="{{ strtolower($vacancy->location ?? '') }}"
                         data-contract="{{ strtolower($vacancy->contract_type ?? '') }}"
                         style="transition-delay: {{ ($index % 2) * 0.1 }}s">
                        <div class="vacancy-card">
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
                                    @if($vacancy->url_page)
                                        <a href="{{ url($vacancy->url_page) }}" target="_blank">
                                            {{ $vacancy->job_title }}
                                        </a>
                                    @else
                                        {{ $vacancy->job_title }}
                                    @endif
                                </h3>
                            </div>
                            <div class="vacancy-body">
                                <div class="vacancy-info">
                                    @if($vacancy->location)
                                        <div class="vacancy-info-item">
                                            <i class="fas fa-map-marker-alt"></i>
                                            <span>{{ $vacancy->location }}</span>
                                        </div>
                                    @endif
                                    @if($vacancy->contract_type)
                                        <div class="vacancy-info-item">
                                            <i class="fas fa-briefcase"></i>
                                            <span>{{ $vacancy->contract_type }}</span>
                                        </div>
                                    @endif
                                </div>

                                @if($vacancy->application_deadline)
                                    <div class="vacancy-deadline {{ !$isOpen ? 'closed' : '' }}">
                                        <div class="vacancy-deadline-text">
                                            <i class="fas fa-clock me-2"></i>
                                            {{ $isOpen ? 'Application Deadline' : 'Application Closed' }}
                                        </div>
                                        <div class="vacancy-deadline-date">
                                            {{ \Carbon\Carbon::parse($vacancy->application_deadline)->format('F d, Y') }}
                                            @if($isOpen && $daysLeft !== null)
                                                <span class="ms-2">
                                                    ({{ $daysLeft == 0 ? 'Today' : ($daysLeft == 1 ? '1 day left' : $daysLeft . ' days left') }})
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                @endif

                                <div class="vacancy-actions">
                                    @if($vacancy->url_page)
                                        <a href="{{ url($vacancy->url_page) }}" 
                                           target="_blank"
                                           class="vacancy-btn btn-details">
                                            <i class="fas fa-info-circle"></i>
                                            View Details
                                        </a>
                                    @endif

                                    @if($isOpen)
                                        @if($vacancy->application_file_fr || $vacancy->application_file_en)
                                            <div class="dropdown" style="flex: 1; min-width: 140px;">
                                                <button class="vacancy-btn btn-download dropdown-toggle w-100" 
                                                        type="button" 
                                                        id="dropdownMenuButton_{{ $vacancy->id }}" 
                                                        data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                    <i class="fas fa-download"></i>
                                                    Download
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton_{{ $vacancy->id }}">
                                                    @if($vacancy->application_file_fr)
                                                        <li>
                                                            <a class="dropdown-item" 
                                                               target="_blank"
                                                               href="{{ asset('storage/documents_recrutement/' . $vacancy->application_file_fr) }}">
                                                                <i class="fas fa-file-pdf me-2"></i>Français
                                                            </a>
                                                        </li>
                                                    @endif
                                                    @if($vacancy->application_file_en)
                                                        <li>
                                                            <a class="dropdown-item" 
                                                               target="_blank"
                                                               href="{{ asset('storage/documents_recrutement/' . $vacancy->application_file_en) }}">
                                                                <i class="fas fa-file-pdf me-2"></i>English
                                                            </a>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        @endif

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
                            <i class="fas fa-briefcase"></i>
                            <h3 class="mt-3 mb-2" style="color: #2c3e50;">No vacancies available</h3>
                            <p>Check back later for new opportunities.</p>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Message Aucun Résultat (caché par défaut) -->
            <div class="row d-none" id="no-results-message">
                <div class="col-12">
                    <div class="no-results">
                        <i class="fas fa-search"></i>
                        <h3 class="mt-3 mb-2" style="color: #2c3e50;">No vacancies match your search</h3>
                        <p>Try adjusting your filters or search terms.</p>
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
