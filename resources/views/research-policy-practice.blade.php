@extends('index')

@section('title', 'Research Centres | AIRID Africa')

@section('css')
    <style>
        .rc-banner { background-size: cover; background-position: center; }
        .rc-intro {
            background: linear-gradient(135deg, rgba(194, 1, 2, 0.06) 0%, rgba(139, 1, 1, 0.06) 100%);
            padding: 2.5rem 2rem;
            border-radius: 20px;
            margin: 2rem 0;
            border-left: 5px solid #c20102;
        }
        .rc-intro .section-lead {
            font-size: var(--airid-text-size);
            line-height: var(--airid-text-line-height);
            color: var(--airid-text-color);
            margin-bottom: 1rem;
        }
        .rc-intro .section-lead:last-child { margin-bottom: 0; }

        .rc-section-title {
            font-size: var(--airid-h2-size);
            font-weight: 700;
            color: var(--airid-title-color);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .rc-section-title i { color: #c20102; }

        /* Tiles / cards des 3 centres + thèmes + gouvernance */
        .rc-tile {
            background: #fff;
            border-radius: 14px;
            padding: 1.75rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            border-left: 4px solid #c20102;
            height: 100%;
            transition: box-shadow 0.25s ease, transform 0.25s ease;
            display: flex;
            flex-direction: column;
        }
        .rc-tile:hover {
            box-shadow: 0 8px 28px rgba(0,0,0,0.12);
            transform: translateY(-2px);
        }
        .rc-tile-link {
            text-decoration: none;
            color: inherit;
            display: flex;
            flex-direction: column;
            height: 100%;
        }
        .rc-tile-link:hover { text-decoration: none; color: inherit; }
        .rc-tile-icon {
            width: 56px;
            height: 56px;
            border-radius: 12px;
            background: rgba(194, 1, 2, 0.1);
            color: #c20102;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }
        .rc-tile-link:hover .rc-tile-icon {
            background: #c20102;
            color: #fff;
        }
        .rc-tile-title {
            font-size: var(--airid-h3-size);
            font-weight: 700;
            color: var(--airid-title-color);
            margin-bottom: 0.5rem;
            line-height: 1.3;
        }
        .rc-tile-tagline {
            font-size: var(--airid-tagline-size);
            font-weight: 600;
            color: #c20102;
            margin-bottom: 0.75rem;
        }
        .rc-tile-desc {
            font-size: var(--airid-text-size);
            line-height: var(--airid-text-line-height);
            color: var(--airid-text-color);
            flex: 1;
            margin-bottom: 1rem;
        }
        .rc-tile-cta {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
            font-weight: 600;
            color: #c20102;
            margin-top: auto;
        }
        .rc-tile-cta i { transition: transform 0.25s ease; }
        .rc-tile-link:hover .rc-tile-cta i { transform: translateX(4px); }

        /* Cadre informatif (thèmes, gouvernance) – pas de lien */
        .rc-tile-static .rc-tile-title { margin-bottom: 0.75rem; }
        .rc-tile-static .rc-list {
            list-style: none;
            padding: 0;
            margin: 0 0 0.5rem 0;
            font-size: var(--airid-text-size);
            line-height: 1.6;
            color: var(--airid-text-color);
        }
        .rc-tile-static .rc-list li {
            padding: 0.25rem 0 0.25rem 1.5rem;
            position: relative;
        }
        .rc-tile-static .rc-list li::before {
            content: '✓';
            position: absolute;
            left: 0;
            color: #c20102;
            font-weight: 700;
        }
        .rc-tile-static .rc-tile-desc { margin-bottom: 0; }

        .fade-in-up { opacity: 0; transform: translateY(24px); transition: opacity 0.6s ease, transform 0.6s ease; }
        .fade-in-up.visible { opacity: 1; transform: translateY(0); }

        .rc-row-2 { margin-top: 1.5rem; }
        @media (min-width: 992px) { .rc-row-2 { margin-top: 2rem; } }
    </style>
@endsection

@section('content')
    <div id="banner-area" class="banner-area rc-banner"
        style="background-image:url({{ asset('storage/assets_vendor/images/banner/banner2_new.png') }})">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title top_title fade-in-up">Research Centres</h1>
                            <p class="text-white mt-3 fade-in-up tagline mb-0" style="font-size: 1.4rem;">
                                Integrated Research Centres Delivering Policy-Relevant Evidence
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="py-5">
        <div class="container">
            {{-- Introduction --}}
            <div class="rc-intro fade-in-up">
                <p class="section-lead">
                    At African Institute for Research in Infectious Diseases (AIRID), research and innovation are organised through three interconnected Research Centres. Together, they generate independent, high-quality evidence to support infectious disease control, strengthen health systems, and inform policy and programme decision-making across Africa.
                </p>
                <p class="section-lead">
                    Each Centre brings distinct expertise while operating within a shared institutional framework of ethics, quality assurance, and scientific excellence. The Centres work collaboratively across the research lifecycle—from study design and implementation to analysis, dissemination, and policy engagement.
                </p>
            </div>

            {{-- Our Research Centres – 3 cartes avec icônes et "Explore the Centre" --}}
            <h2 class="rc-section-title fade-in-up">
                <i class="fas fa-building"></i> Our Research Centres
            </h2>
            <div class="row g-4 fade-in-up">
                <div class="col-lg-4 col-md-6">
                    <a href="{{ route('researchCentreVectorBiologyPage') }}" class="rc-tile rc-tile-link">
                        <span class="rc-tile-icon"><i class="fas fa-bug"></i></span>
                        <h3 class="rc-tile-title">Centre for Vector Biology and Intervention Research</h3>
                        <p class="rc-tile-tagline">Advancing evidence for vector-borne disease control</p>
                        <p class="rc-tile-desc">
                            Generates independent evidence on vector biology, surveillance, and the performance of vector control interventions through laboratory, semi-field, and field-based research, supporting effective and durable disease control strategies.
                        </p>
                        <span class="rc-tile-cta">Explore the Centre <i class="fas fa-arrow-right"></i></span>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="{{ route('researchCentrePolicyPracticePage') }}" class="rc-tile rc-tile-link">
                        <span class="rc-tile-icon"><i class="fas fa-handshake"></i></span>
                        <h3 class="rc-tile-title">Centre for Policy, Systems and Implementation Research</h3>
                        <p class="rc-tile-tagline">Translating evidence into policy and practice</p>
                        <p class="rc-tile-desc">
                            Examines how health interventions perform within real-world systems and supports evidence-informed policy, programme delivery, and sustainable scale-up through applied policy, systems, and implementation research.
                        </p>
                        <span class="rc-tile-cta">Explore the Centre <i class="fas fa-arrow-right"></i></span>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="{{ route('researchCentreDataSciencePage') }}" class="rc-tile rc-tile-link">
                        <span class="rc-tile-icon"><i class="fas fa-chart-line"></i></span>
                        <h3 class="rc-tile-title">Centre for Data Science, Analytics and Modelling</h3>
                        <p class="rc-tile-tagline">Advanced analytics for evidence-based decision-making</p>
                        <p class="rc-tile-desc">
                            Provides analytical, statistical, and modelling expertise to support interpretation of research findings, scenario analysis, and data-driven decision-making for policymakers and programme managers.
                        </p>
                        <span class="rc-tile-cta">Explore the Centre <i class="fas fa-arrow-right"></i></span>
                    </a>
                </div>
            </div>

            {{-- Cross-Cutting Research Themes – cadre informatif --}}
            <div class="row g-4 fade-in-up rc-row-2">
                <div class="col-12">
                    <div class="rc-tile rc-tile-static">
                        <span class="rc-tile-icon"><i class="fas fa-layer-group"></i></span>
                        <h3 class="rc-tile-title">Cross-Cutting Research Themes</h3>
                        <p class="rc-tile-desc">
                            Across all Research Centres and Units, AIRID integrates cross-cutting themes to ensure quality, equity, and impact. These include:
                        </p>
                        <ul class="rc-list">
                            <li>Ethics, safeguarding, and community protection</li>
                            <li>Equity, gender, and social inclusion</li>
                            <li>Climate and environmental health</li>
                            <li>Capacity strengthening and mentorship</li>
                            <li>Data governance and open science</li>
                            <li>Knowledge translation and policy engagement</li>
                            <li>Monitoring, evaluation, and learning</li>
                        </ul>
                        <p class="rc-tile-desc mb-0">
                            These themes are embedded throughout research design, implementation, analysis, and dissemination.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Governance of Research Activities – cadre informatif --}}
            <div class="row g-4 fade-in-up rc-row-2">
                <div class="col-12">
                    <div class="rc-tile rc-tile-static">
                        <span class="rc-tile-icon"><i class="fas fa-sitemap"></i></span>
                        <h3 class="rc-tile-title">Governance of Research Activities</h3>
                        <p class="rc-tile-desc mb-0">
                            Each Research Centre is led by a Centre Director, with specialised Units coordinated by Unit Heads. Centres report to the Executive Director, ensuring strategic alignment, quality assurance, and accountability. This governance structure supports multidisciplinary collaboration, efficient use of resources, and high-quality research delivery across AIRID.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Liens utiles --}}
            <div class="row mt-5 fade-in-up">
                <div class="col-12 text-center">
                    <a href="{{ route('researchActivitiesPage') }}" class="btn btn-danger btn-lg">
                        <i class="fas fa-flask me-2"></i>Research activities &amp; domains
                    </a>
                    <a href="{{ route('allProjectsPage') }}" class="btn btn-outline-danger btn-lg ms-2">
                        <i class="fas fa-project-diagram me-2"></i>Research projects
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) { entry.target.classList.add('visible'); observer.unobserve(entry.target); }
                });
            }, { threshold: 0.1, rootMargin: '0px 0px -30px 0px' });
            document.querySelectorAll('.fade-in-up').forEach(function(el) { observer.observe(el); });
        });
    </script>
@endsection
