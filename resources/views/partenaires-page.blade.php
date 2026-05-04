@extends('index')

@section('title', 'AIRID --Our Partners')

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
        .partners-filters {
            background: #f8f9fa;
            padding: 2rem 0;
            border-bottom: 1px solid #e0e0e0;
        }

        .filter-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem;
            justify-content: center;
        }

        .filter-btn {
            padding: 0.75rem 1.5rem;
            border: 2px solid #e0e0e0;
            background: #fff;
            border-radius: 50px;
            color: var(--airid-text-color);
            font-weight: 600;
            transition: all 0.3s ease;
            cursor: pointer;
            font-size: 0.95rem;
        }

        .filter-btn:hover,
        .filter-btn.active {
            background: #c20102;
            border-color: #c20102;
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(194, 1, 2, 0.3);
        }

        .results-count {
            text-align: center;
            color: var(--airid-text-color);
            font-weight: 600;
            margin-top: 1rem;
        }

        /* ============================================
           CARTES DE PARTENAIRES MODERNES
           ============================================ */
        .partner-card-modern {
            background: #fff;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 5px 25px rgba(0,0,0,0.08);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            height: 100%;
            text-align: center;
            border: 2px solid #f0f0f0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .partner-card-modern:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
            border-color: #c20102;
        }

        .partner-logo-wrapper {
            height: 150px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            transition: transform 0.3s ease;
        }

        .partner-card-modern:hover .partner-logo-wrapper {
            transform: scale(1.05);
        }

        .partner-logo-modern {
            max-height: 120px;
            max-width: 200px;
            object-fit: contain;
            filter: grayscale(0%);
            opacity: 1;
            transition: all 0.3s ease;
        }

        .partner-card-modern:hover .partner-logo-modern {
            filter: grayscale(0%);
            opacity: 1;
            transform: scale(1.05);
        }

        .partner-name {
            font-size: var(--airid-text-size);
            font-weight: 700;
            color: var(--airid-title-color);
            margin-bottom: 0.5rem;
        }

        .partner-name a {
            color: var(--airid-title-color);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .partner-name a:hover {
            color: #c20102;
        }

        .partner-type-badge {
            display: inline-block;
            padding: 0.4rem 1rem;
            border-radius: 50px;
            font-size: var(--airid-tagline-size);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-top: 0.5rem;
        }

        .badge-funding {
            background: rgba(39, 174, 96, 0.1);
            color: #27ae60;
        }

        .badge-industry {
            background: rgba(52, 152, 219, 0.1);
            color: #3498db;
        }

        .badge-accreditation {
            background: rgba(155, 89, 182, 0.1);
            color: #9b59b6;
        }

        .badge-work {
            background: rgba(241, 196, 15, 0.1);
            color: #f1c40f;
        }

        .partner-links {
            margin-top: 1rem;
            display: flex;
            gap: 0.75rem;
            justify-content: center;
        }

        .partner-link-icon {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--airid-text-color);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .partner-link-icon:hover {
            background: #c20102;
            color: #fff;
            transform: translateY(-3px);
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
           RESPONSIVE
           ============================================ */
        @media (max-width: 768px) {
            .partner-logo-wrapper {
                height: 120px;
            }

            .partner-logo-modern {
                max-height: 100px;
                max-width: 150px;
            }

            .filter-buttons {
                gap: 0.5rem;
            }

            .filter-btn {
                padding: 0.5rem 1rem;
                font-size: var(--airid-tagline-size);
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
                            <h1 class="banner-title top_title fade-in-up">Our Partners</h1>
                            <p class="text-white mt-3 fade-in-up tagline mb-0" style="font-size: 1.4rem;">
                                Building strong partnerships for impactful research
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section Filtres -->
    <section class="partners-filters">
        <div class="container">
            <div class="filter-buttons">
                <button class="filter-btn active" data-filter="all">
                    <i class="fas fa-th me-2"></i>All Partners
                </button>
                <button class="filter-btn" data-filter="funding_partner">
                    <i class="fas fa-hand-holding-usd me-2"></i>Funding Partners
                </button>
                <button class="filter-btn" data-filter="industry_partner">
                    <i class="fas fa-industry me-2"></i>Industry Partners
                </button>
                <button class="filter-btn" data-filter="accreditation_partner">
                    <i class="fas fa-certificate me-2"></i>Accreditation Body
                </button>
                <button class="filter-btn" data-filter="Work partner">
                    <i class="fas fa-handshake me-2"></i>Research Partners
                </button>
            </div>
            <div class="results-count">
                <span id="results-count-text">Showing <strong id="results-number">{{ $all_partenaires->count() ?? 0 }}</strong> partner(s)</span>
            </div>
        </div>
    </section>

    <!-- Section Partenaires -->
    <section class="py-5">
        <div class="container">
            <div class="row text-center mb-5 fade-in-up">
                <div class="col-12">
                    <h3 class="section-title">Our Valued Partners</h3>
                    <p class="section-lead mb-4">
                        We collaborate with leading organizations worldwide to advance infectious disease research
                    </p>
                    <div class="title-divider mx-auto mt-3 mb-4" style="width: 100px; height: 4px; background: linear-gradient(135deg, #c20102 0%, #8b0101 100%); border-radius: 2px;"></div>
                </div>
            </div>

            <div class="row mb-5 fade-in-up">
                <div class="col-12">
                    <div class="partnership-contact-card" style="background: #fff; border-radius: 14px; padding: 1.5rem 2rem; box-shadow: 0 4px 20px rgba(0,0,0,0.08); border-left: 5px solid #c20102;">
                        <h3 class="mb-3" style="font-size: 1.2rem; font-weight: 700; color: #1a1a1a;"><i class="fas fa-envelope me-2" style="color: #c20102;"></i> Partnership enquiries</h3>
                        <p class="mb-2" style="font-size: 1rem; line-height: 1.6; color: #444;">Interested in partnering with AIRID? Contact our partnerships team for collaboration opportunities, funding discussions, or research partnerships.</p>
                        <p class="mb-0">
                            <a href="mailto:partnerships@airid-africa.com" class="btn btn-danger">
                                <i class="fas fa-envelope me-1"></i> partnerships@airid-africa.com
                            </a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="row g-4" id="partners-grid">
                @forelse ($all_partenaires as $index => $partenaire)
                    @php
                        $typeClass = 'badge-' . str_replace('_', '-', strtolower($partenaire->type_partenaire ?? 'industry'));
                        // Mapping des labels
                        $typeMapping = [
                            'accreditation_partner' => 'Accreditation Body',
                            'Work partner' => 'Research Partners',
                            'funding_partner' => 'Funding Partners',
                            'industry_partner' => 'Industry Partners',
                        ];
                        $typeLabel = $typeMapping[$partenaire->type_partenaire ?? 'industry_partner'] ?? ucfirst(str_replace('_', ' ', $partenaire->type_partenaire ?? 'Industry Partners'));
                    @endphp
                    <div class="col-lg-3 col-md-4 col-sm-6 partner-item fade-in-up"
                         data-type="{{ $partenaire->type_partenaire ?? 'industry_partner' }}"
                         style="transition-delay: {{ ($index % 4) * 0.1 }}s">
                        <div class="partner-card-modern">
                            <div class="partner-logo-wrapper">
                                <a href="{{ $partenaire->site_web ?? '#' }}" target="_blank" rel="noopener noreferrer">
                                    <img
                                        loading="lazy"
                                        src="{{ asset('storage/assets/logo/' . $partenaire->logo_partenaire) }}"
                                        alt="{{ $partenaire->nom_partenaire }}"
                                        class="partner-logo-modern"
                                    >
                                </a>
                            </div>
                            <h4 class="partner-name">
                                <a href="{{ $partenaire->site_web ?? '#' }}" target="_blank" rel="noopener noreferrer">
                                    {{ $partenaire->nom_partenaire }}
                                </a>
                            </h4>


                            <div class="partner-links">
                                @if($partenaire->site_web)
                                    <a href="{{ $partenaire->site_web }}" target="_blank" rel="noopener noreferrer"
                                       class="partner-link-icon" title="Website">
                                        <i class="fas fa-globe"></i>
                                    </a>
                                @endif
                                @if($partenaire->linkedin)
                                    <a href="{{ $partenaire->linkedin }}" target="_blank" rel="noopener noreferrer"
                                       class="partner-link-icon" title="LinkedIn">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 fade-in-up">
                        <div class="no-results">
                            <i class="fas fa-handshake"></i>
                            <h3 class="mt-3 mb-2 section-title">No partners registered yet</h3>
                            <p>Partners will be displayed here once they are added to the system.</p>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Message Aucun Résultat (caché par défaut) -->
            <div class="row d-none" id="no-results-message">
                <div class="col-12">
                    <div class="no-results">
                        <i class="fas fa-filter"></i>
                        <h3 class="mt-3 mb-2 section-title">No partners match your filter</h3>
                        <p>Try selecting a different partner category.</p>
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
        // SYSTÈME DE FILTRES
        // ============================================
        document.addEventListener('DOMContentLoaded', function() {
            const filterButtons = document.querySelectorAll('.filter-btn');
            const partnerItems = document.querySelectorAll('.partner-item');
            const resultsNumber = document.getElementById('results-number');
            const partnersGrid = document.getElementById('partners-grid');
            const noResultsMessage = document.getElementById('no-results-message');

            let currentFilter = 'all';

            // Gestion des filtres
            filterButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    // Mettre à jour les boutons actifs
                    filterButtons.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');

                    currentFilter = this.getAttribute('data-filter');
                    filterPartners();
                });
            });

            // Fonction de filtrage
            function filterPartners() {
                let visibleCount = 0;
                let hasVisible = false;

                partnerItems.forEach(item => {
                    const type = item.getAttribute('data-type') || 'industry_partner';

                    // Normaliser les types pour la comparaison
                    const normalizedFilter = currentFilter === 'Work partner' ? 'Work partner' : currentFilter;
                    const normalizedType = type === 'Work partner' ? 'Work partner' : type;

                    const matchesFilter = currentFilter === 'all' || normalizedType === normalizedFilter;

                    if (matchesFilter) {
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
                    if (partnersGrid) partnersGrid.style.display = '';
                    if (noResultsMessage) noResultsMessage.classList.add('d-none');
                } else {
                    if (partnersGrid) partnersGrid.style.display = 'none';
                    if (noResultsMessage) noResultsMessage.classList.remove('d-none');
                }
            }

            // Initialiser le filtrage
            filterPartners();
        });
    </script>
@endsection
