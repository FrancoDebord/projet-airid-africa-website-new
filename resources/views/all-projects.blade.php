@extends('index')

@section('title', 'AIRID --All Projects')

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
        .filters-section {
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
        }

        /* ============================================
           CARTES DE PROJETS MODERNES
           ============================================ */
        .project-card-modern {
            background: #fff;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .project-card-modern:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.2);
        }

        .project-card-image {
            position: relative;
            height: 250px;
            overflow: hidden;
        }

        .project-card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .project-card-modern:hover .project-card-image img {
            transform: scale(1.15);
        }

        .project-status-badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-size: var(--airid-tagline-size);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .status-ongoing {
            background: #27ae60;
            color: #fff;
        }

        .status-ended {
            background: #3498db;
            color: #fff;
        }

        .status-abandoned {
            background: #e74c3c;
            color: #fff;
        }

        .project-card-body {
            padding: 1.5rem;
            background: #c7c3c3;

            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .project-card-desc {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            min-height: 2.8em;
            margin-bottom: 0.75rem;
            font-size: var(--airid-text-size);
            line-height: 1.4;
            color: var(--airid-text-color);
        }

        .project-card-title {
            font-size: var(--airid-h3-size);
            font-weight: 700;
            color: var(--airid-title-color);
            margin-bottom: 0.75rem;
            line-height: 1.35;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            min-height: 2.7em;
        }

        .project-card-title a {
            color: var(--airid-title-color);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .project-card-title a:hover {
            color: #c20102;
        }

        /* Date et "View Details" sur la même ligne */
        .project-card-bottom-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            margin-top: auto;
            padding-top: 1rem;
            border-top: 1px solid #f0f0f0;
        }

        .project-card-meta {
            display: flex;
            align-items: center;
            color: var(--airid-text-color);
            font-size: var(--airid-text-size);
        }

        .project-card-meta i {
            color: #c20102;
        }

        .project-card-footer {
            margin-top: 0;
            flex-shrink: 0;
        }

        .project-card-footer a {
            color: #c20102;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
        }

        .project-card-footer a:hover {
            gap: 1rem;
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

        /* Espace entre la 1re rangée et les rangées suivantes */
        #projects-grid .projects-second-row {
            margin-top: 1.5rem;
        }
        @media (min-width: 992px) {
            #projects-grid .projects-second-row {
                margin-top: 2rem;
            }
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

            .project-card-image {
                height: 200px;
            }
        }
    </style>
@endsection

@section('content')
    <!-- Banner Section -->
    <div id="banner-area" class="banner-area"
        style="background-image:url({{ asset('storage/assets_vendor/images/banner/banner2_new.png') }})">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title top_title fade-in-up">All Projects</h1>
                            <p class="text-white mt-3 fade-in-up tagline mb-0"style="font-size: 1.4rem;" >
                                Discover our research projects and their impact
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section Filtres -->
    <section class="filters-section">
        <div class="container">
            <div class="filter-group">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input
                        type="text"
                        id="project-search"
                        placeholder="Search projects by title..."
                        autocomplete="off"
                    >
                </div>
                <div class="filter-buttons">
                    <button class="filter-btn active" data-filter="all">
                        <i class="fas fa-th me-2"></i>All
                    </button>
                    <button class="filter-btn" data-filter="ongoing">
                        <i class="fas fa-play-circle me-2"></i>Ongoing
                    </button>
                    <button class="filter-btn" data-filter="ended">
                        <i class="fas fa-check-circle me-2"></i>Completed
                    </button>
                </div>
            </div>
            <div class="results-count mt-3">
                <span id="results-count-text">Showing <strong id="results-number">{{ $all_projects->count() }}</strong> project(s)</span>
            </div>
        </div>
    </section>

    <!-- Section Projets -->
    <section id="projects-section" class="py-5">
        <div class="container">
            <div class="row text-center mb-5 fade-in-up">
                <div class="col-12">
                    <h2 class="section-title">Work of Excellence</h2>
                    <p class="section-sub-title mb-0">Our Research Projects</p>
                    <div class="title-divider mx-auto mt-3 mb-4" style="width: 100px; height: 4px; background: linear-gradient(135deg, #c20102 0%, #8b0101 100%); border-radius: 2px;"></div>
                </div>
            </div>

            <!-- Grille de Projets -->
            <div class="row g-4" id="projects-grid">
                @forelse ($all_projects as $index => $projet)
                    <div class="col-lg-3 col-md-6 project-item fade-in-up {{ $index >= 4 ? 'projects-second-row' : '' }}"
                         data-status="{{ $projet->etat_projet ?? 'ongoing' }}"
                         data-title="{{ strtolower($projet->short_title_project) }}"
                         style="transition-delay: {{ ($index % 3) * 0.1 }}s">
                        <div class="project-card-modern">
                            <div class="project-card-image">
                                <a href="{{ route('detailProject', ['id' => $projet->id, 'slug' => Str::slug($projet->short_title_project)]) }}">
                                    <img
                                        loading="lazy"
                                        src="{{ asset('storage/assets/projects/' . $projet->photo_couverture) }}"
                                        alt="{{ $projet->short_title_project }}"
                                    >
                                </a>
                                @if($projet->etat_projet)
                                    <span class="project-status-badge status-{{ $projet->etat_projet }}">
                                        @if($projet->etat_projet == 'ongoing')
                                            <i class="fas fa-play-circle me-1"></i>Ongoing
                                        @elseif($projet->etat_projet == 'ended')
                                            <i class="fas fa-check-circle me-1"></i>Completed
                                        @else
                                            <i class="fas fa-times-circle me-1"></i>Abandoned
                                        @endif
                                    </span>
                                @endif
                            </div>
                            <div class="project-card-body">
                                <h3 class="project-card-title">
                                    <a href="{{ route('detailProject', ['id' => $projet->id, 'slug' => Str::slug($projet->short_title_project)]) }}">
                                        {{ $projet->short_title_project }}
                                    </a>
                                </h3>
                                @if($projet->resume)
                                    <p class="project-card-desc">
                                        {{ Str::limit(strip_tags($projet->resume), 150) }}
                                    </p>
                                @else
                                    <p class="project-card-desc">&nbsp;</p>
                                @endif
                                <div class="project-card-bottom-row">
                                    <div class="project-card-meta">
                                        <span>
                                            <i class="far fa-calendar-alt me-1"></i>
                                            {{ $projet->date_debut_project ? date('M j, Y', strtotime($projet->date_debut_project)) : 'Not yet started' }}
                                        </span>
                                    </div>
                                    <div class="project-card-footer">
                                        <a href="{{ route('detailProject', ['id' => $projet->id, 'slug' => Str::slug($projet->short_title_project)]) }}">
                                            View Details
                                            <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="no-results fade-in-up">
                            <i class="fas fa-folder-open"></i>
                            <h3 class="mt-3 mb-2 section-title">No projects found</h3>
                            <p>There are no projects available at the moment.</p>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Message Aucun Résultat (caché par défaut) -->
            <div class="row d-none" id="no-results-message">
                <div class="col-12">
                    <div class="no-results">
                        <i class="fas fa-search"></i>
                        <h3 class="mt-3 mb-2 section-title">No projects match your search</h3>
                        <p>Try adjusting your filters or search terms.</p>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            @if($all_projects->hasPages())
                <div class="pagination-modern fade-in-up">
                    {{ $all_projects->links() }}
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
            const searchInput = document.getElementById('project-search');
            const filterButtons = document.querySelectorAll('.filter-btn');
            const projectItems = document.querySelectorAll('.project-item');
            const resultsNumber = document.getElementById('results-number');
            const resultsCountText = document.getElementById('results-count-text');
            const projectsGrid = document.getElementById('projects-grid');
            const noResultsMessage = document.getElementById('no-results-message');

            let currentFilter = 'all';
            let currentSearch = '';

            // Gestion des filtres
            filterButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    // Mettre à jour les boutons actifs
                    filterButtons.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');

                    currentFilter = this.getAttribute('data-filter');
                    filterProjects();
                });
            });

            // Gestion de la recherche
            if (searchInput) {
                searchInput.addEventListener('input', function() {
                    currentSearch = this.value.toLowerCase().trim();
                    filterProjects();
                });
            }

            // Fonction de filtrage
            function filterProjects() {
                let visibleCount = 0;
                let hasVisible = false;

                projectItems.forEach(item => {
                    const status = item.getAttribute('data-status') || 'ongoing';
                    const title = item.getAttribute('data-title') || '';

                    const matchesFilter = currentFilter === 'all' || status === currentFilter;
                    const matchesSearch = !currentSearch || title.includes(currentSearch);

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
                    if (projectsGrid) projectsGrid.style.display = '';
                    if (noResultsMessage) noResultsMessage.classList.add('d-none');
                } else {
                    if (projectsGrid) projectsGrid.style.display = 'none';
                    if (noResultsMessage) noResultsMessage.classList.remove('d-none');
                }
            }

            // Initialiser le filtrage
            filterProjects();
        });
    </script>
@endsection
