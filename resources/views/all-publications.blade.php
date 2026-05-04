@extends('index')

@section('title', 'All Publications --AIRID')

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
        .publications-filters {
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
            color: var(--airid-text-color);
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
            color: var(--airid-text-color);
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
            color: var(--airid-text-color);
            font-weight: 600;
            padding: 0.5rem 0;
            text-align: center;
        }

        /* ============================================
           CARTES DE PUBLICATIONS MODERNES
           ============================================ */
        .publication-card {
            background: #fff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 5px 25px rgba(0,0,0,0.08);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            height: 100%;
            display: flex;
            flex-direction: column;
            border-top: 4px solid #c20102;
        }

        .publication-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }

        .publication-header {
            background: linear-gradient(135deg, rgba(194, 1, 2, 0.05) 0%, rgba(139, 1, 1, 0.05) 100%);
            padding: 1.5rem;
            border-bottom: 1px solid #f0f0f0;
        }

        .publication-year {
            display: inline-block;
            padding: 0.4rem 1rem;
            background: #c20102;
            color: #fff;
            border-radius: 50px;
            font-weight: 700;
            font-size: var(--airid-text-size);
            margin-bottom: 1rem;
        }

        .publication-title {
            font-size: var(--airid-h3-size);
            font-weight: 700;
            color: var(--airid-title-color);
            line-height: 1.4;
            margin-bottom: 0.5rem;
            /* Limiter à 2 lignes max avec "..." si le titre dépasse */
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .publication-title a {
            color: var(--airid-title-color);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .publication-title a:hover {
            color: #c20102;
        }

        /* Titre de section sur deux lignes avec espace entre les lignes */
        .section-title-two-lines .d-block {
            line-height: 1.3;
        }
        .section-title-two-lines .d-block:first-child {
            margin-bottom: 0.25em;
        }

        /* Espace après chaque ligne de cadres (cartes) */
        .publications-rows-spaced > [class*="col-"] {
            margin-bottom: 2rem;
        }
        .publications-rows-spaced > [class*="col-"]:last-child {
            margin-bottom: 0;
        }

        .publication-body {
            padding: 1.5rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        /* Authors : limité à 2 lignes avec "..." si la liste dépasse */
        .publication-authors {
            color: var(--airid-text-color);
            font-size: 0.9rem;
            line-height: 1.5;
            margin-bottom: 1rem;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .publication-authors strong {
            color: var(--airid-title-color);
        }

        /* Description : hauteur fixe (4 lignes) + points de suspension quand tronqué */
        .publication-abstract-wrap {
            min-height: 6rem;
            margin-bottom: 1.5rem;
        }
        .publication-abstract {
            color: var(--airid-text-color);
            font-size: 0.9rem;
            line-height: 1.5;
            min-height: 6rem;
            height: 6rem;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 4;
            -webkit-box-orient: vertical;
            line-clamp: 4;
        }

        .publication-actions {
            display: flex;
            gap: 0.75rem;
            flex-wrap: wrap;
            margin-top: auto;
            padding-top: 1rem;
            border-top: 1px solid #f0f0f0;
        }

        .publication-btn {
            flex: 1;
            min-width: 120px;
            padding: 0.6rem 1.2rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: var(--airid-text-size);
            text-decoration: none;
            text-align: center;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn-view {
            background: linear-gradient(135deg, #c20102 0%, #8b0101 100%);
            color: #fff;
            border: none;
        }

        .btn-view:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(194, 1, 2, 0.4);
            color: #fff;
        }

        .btn-download {
            background: #f8f9fa;
            color: var(--airid-title-color);
            border: 2px solid #e0e0e0;
        }

        .btn-download:hover {
            background: #e9ecef;
            border-color: #c20102;
            color: #c20102;
            transform: translateY(-2px);
        }

        /* ============================================
           MESSAGE AUCUN RÉSULTAT
           ============================================ */
        .no-results {
            text-align: center;
            padding: 4rem 2rem;
            color: var(--airid-text-color);
        }

        .no-results i {
            font-size: 4rem;
            margin-bottom: 1rem;
            color: #bdc3c7;
        }

        /* ============================================
           PAGINATION MODERNE
           ============================================ */
        .pagination-modern {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.5rem;
            margin-top: 3rem;
        }

        .pagination-modern .page-link {
            border-radius: 50px;
            border: 2px solid #e0e0e0;
            color: var(--airid-text-color);
            padding: 0.5rem 1rem;
            margin: 0 0.25rem;
            transition: all 0.3s ease;
        }

        .pagination-modern .page-link:hover {
            background: #c20102;
            border-color: #c20102;
            color: #fff;
            transform: translateY(-2px);
        }

        .pagination-modern .page-item.active .page-link {
            background: #c20102;
            border-color: #c20102;
            color: #fff;
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

            .publication-actions {
                flex-direction: column;
            }

            .publication-btn {
                width: 100%;
            }

            .publication-card {
                margin-bottom: 1.5rem;
            }

            .publication-title {
                font-size: 1.1rem;
            }
        }

        @media (min-width: 992px) {
            .publication-card {
                min-height: 450px;
            }
        }

        @media (min-width: 1200px) {
            .publication-card {
                min-height: 480px;
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
                            <h1 class="banner-title top_title fade-in-up">Scientific Publications</h1>
                            <p class="text-white mt-3 fade-in-up tagline mb-0" style="font-size: 1.4rem;">
                                Discover our research contributions to the scientific community
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section Filtres -->
    <section class="publications-filters">
        <div class="container">
            <div class="filter-group">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input
                        type="text"
                        id="publication-search"
                        placeholder="Search by title, authors..."
                        autocomplete="off"
                    >
                </div>
                <div class="filter-buttons">
                    <button class="filter-btn active" data-filter="all">
                        <i class="fas fa-th me-2"></i>All
                    </button>
                    @php
                        // Récupérer toutes les années uniques depuis la collection
                        $years = collect();
                        foreach($all_publications as $pub) {
                            if($pub->annee_publication) {
                                $years->push($pub->annee_publication);
                            }
                        }
                        $uniqueYears = $years->unique()->sort()->reverse()->take(5);
                    @endphp
                    @foreach($uniqueYears as $year)
                        <button class="filter-btn" data-filter="{{ $year }}">
                            <i class="far fa-calendar-alt me-2"></i>{{ $year }}
                        </button>
                    @endforeach
                </div>
            </div>
            <div class="results-count">
                <span id="results-count-text">Showing <strong id="results-number">{{ $all_publications->count() }}</strong> publication(s)</span>
            </div>
        </div>
    </section>

    <!-- Section Publications -->
    <section class="py-5">
        <div class="container">
            <div class="row text-center mb-5 fade-in-up">
                <div class="col-12">
                    <h2 class="section-title section-title-two-lines">
                        <span class="d-block">Our</span>
                        <span class="d-block">Publications</span>
                    </h2>
                    <p class="section-lead mb-4">
                        Peer-reviewed research articles and scientific contributions
                    </p>
                    <div class="title-divider mx-auto mt-3 mb-4" style="width: 100px; height: 4px; background: linear-gradient(135deg, #c20102 0%, #8b0101 100%); border-radius: 2px;"></div>
                </div>
            </div>

            <div class="row g-4 publications-rows-spaced" id="publications-grid">
                @forelse ($all_publications as $index => $publication)
                    <div class="col-lg-4 col-md-6 col-12 publication-item fade-in-up"
                         data-year="{{ $publication->annee_publication }}"
                         data-title="{{ strtolower($publication->titre_publication) }}"
                         data-authors="{{ strtolower($publication->auteurs) }}"
                         style="transition-delay: {{ ($index % 3) * 0.1 }}s">
                        <div class="publication-card">
                            <div class="publication-header">
                                <span class="publication-year">{{ $publication->annee_publication }}</span>
                                <h3 class="publication-title">
                                    @if($publication->url_publication)
                                        <a href="{{ $publication->url_publication }}" target="_blank" rel="noopener noreferrer">
                                            {{ $publication->titre_publication }}
                                        </a>
                                    @else
                                        {{ $publication->titre_publication }}
                                    @endif
                                </h3>
                            </div>
                            <div class="publication-body">
                                <div class="publication-authors">
                                    <strong><i class="fas fa-users me-2" style="color: #c20102;"></i>Authors:</strong>
                                    {{ $publication->auteurs }}
                                </div>

                                <div class="publication-actions">
                                    @if($publication->url_publication)
                                        <a href="{{ $publication->url_publication }}"
                                           target="_blank"
                                           rel="noopener noreferrer"
                                           class="publication-btn btn-view">
                                            <i class="fas fa-external-link-alt"></i>
                                            View Article
                                        </a>
                                    @endif
                                    @if($publication->fichier_publication)
                                        <a href="{{ asset('storage/assets/publications/pdf/' . $publication->fichier_publication) }}"
                                           target="_blank"
                                           class="publication-btn btn-download">
                                            <i class="fas fa-download"></i>
                                            Download PDF
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 fade-in-up">
                        <div class="no-results">
                            <i class="fas fa-book-open"></i>
                            <h3 class="mt-3 mb-2 section-title">No publications registered yet</h3>
                            <p>Publications will be displayed here once they are added to the system.</p>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Message Aucun Résultat (caché par défaut) -->
            <div class="row d-none" id="no-results-message">
                <div class="col-12">
                    <div class="no-results">
                        <i class="fas fa-search"></i>
                        <h3 class="mt-3 mb-2 section-title">No publications match your search</h3>
                        <p>Try adjusting your filters or search terms.</p>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            @if($all_publications->hasPages())
                <div class="pagination-modern fade-in-up">
                    {{ $all_publications->links() }}
                </div>
            @endif
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
            const searchInput = document.getElementById('publication-search');
            const filterButtons = document.querySelectorAll('.filter-btn');
            const publicationItems = document.querySelectorAll('.publication-item');
            const resultsNumber = document.getElementById('results-number');
            const resultsCountText = document.getElementById('results-count-text');
            const publicationsGrid = document.getElementById('publications-grid');
            const noResultsMessage = document.getElementById('no-results-message');

            let currentFilter = 'all';
            let currentSearch = '';

            // Gestion des filtres
            filterButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    filterButtons.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');

                    currentFilter = this.getAttribute('data-filter');
                    filterPublications();
                });
            });

            // Gestion de la recherche
            if (searchInput) {
                searchInput.addEventListener('input', function() {
                    currentSearch = this.value.toLowerCase().trim();
                    filterPublications();
                });
            }

            // Fonction de filtrage
            function filterPublications() {
                let visibleCount = 0;
                let hasVisible = false;

                publicationItems.forEach(item => {
                    const year = item.getAttribute('data-year') || '';
                    const title = item.getAttribute('data-title') || '';
                    const authors = item.getAttribute('data-authors') || '';

                    const matchesFilter = currentFilter === 'all' || year === currentFilter;
                    const matchesSearch = !currentSearch ||
                        title.includes(currentSearch) ||
                        authors.includes(currentSearch);

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
                    if (publicationsGrid) publicationsGrid.style.display = '';
                    if (noResultsMessage) noResultsMessage.classList.add('d-none');
                } else {
                    if (publicationsGrid) publicationsGrid.style.display = 'none';
                    if (noResultsMessage) noResultsMessage.classList.remove('d-none');
                }
            }

            // Initialiser le filtrage
            filterPublications();
        });
    </script>
@endsection
