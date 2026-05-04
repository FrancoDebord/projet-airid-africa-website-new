@extends('index')

@section('title', 'Research Activities --AIRID')

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
           SECTION INTRO
           ============================================ */
        .research-intro {
            background: linear-gradient(135deg, rgba(194, 1, 2, 0.05) 0%, rgba(139, 1, 1, 0.05) 100%);
            padding: 4rem 0;
            border-radius: 20px;
            margin: 2rem 0;
        }

        /* ============================================
           CARTES DE DOMAINES DE RECHERCHE
           ============================================ */
        .research-domain-card {
            background: #fff;
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 5px 25px rgba(0,0,0,0.08);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            height: 100%;
            border-top: 5px solid #c20102;
            position: relative;
            overflow: hidden;
        }

        .research-domain-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(135deg, #c20102 0%, #8b0101 100%);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.4s ease;
        }

        .research-domain-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }

        .research-domain-card:hover::before {
            transform: scaleX(1);
        }

        .domain-icon {
            width: 80px;
            height: 80px;
            border-radius: 20px;
            background: linear-gradient(135deg, #c20102 0%, #8b0101 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: var(--airid-h2-size);
            margin-bottom: 1.5rem;
            transition: transform 0.3s ease;
        }

        .research-domain-card:hover .domain-icon {
            transform: scale(1.1) rotate(5deg);
        }

        .domain-number {
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: rgba(194, 1, 2, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: var(--airid-h3-size);
            font-weight: 700;
            color: #c20102;
        }

        .domain-title {
            font-size: var(--airid-h2-size);
            font-weight: 700;
            color: var(--airid-title-color);
            margin-bottom: 1rem;
            line-height: 1.4;
        }

        .domain-description {
            font-size: var(--airid-text-size);
            line-height: var(--airid-text-line-height);
            color: var(--airid-text-color);
        }

        .domain-features {
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid #f0f0f0;
        }

        .domain-features ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .domain-features li {
            padding: 0.5rem 0;
            color: #555;
            display: flex;
            align-items: start;
            gap: 0.75rem;
        }

        .domain-features li::before {
            content: '✓';
            color: #c20102;
            font-weight: 700;
            font-size: var(--airid-text-size);
        }

        /* ============================================
           STATISTIQUES
           ============================================ */
        .stats-section {
            background: linear-gradient(135deg, #c20102 0%, #8b0101 100%);
            padding: 4rem 0;
            margin: 3rem 0;
            border-radius: 20px;
            position: relative;
            overflow: hidden;
        }

        .stats-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><circle cx="50" cy="50" r="2" fill="rgba(255,255,255,0.1)"/></svg>');
            opacity: 0.3;
        }

        .stat-card {
            text-align: center;
            color: #fff;
            position: relative;
            z-index: 2;
        }

        .stat-number {
            font-size: var(--airid-h1-size);
            font-weight: 700;
            margin-bottom: 0.5rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }

        .stat-label {
            font-size: var(--airid-tagline-size);
            opacity: 0.95;
            font-weight: 600;
        }

        /* ============================================
           RESPONSIVE
           ============================================ */
        @media (max-width: 768px) {
            .research-domain-card {
                padding: 2rem;
            }

            .domain-icon {
                width: 60px;
                height: 60px;
                font-size: var(--airid-h3-size);
            }

            .stat-number {
                font-size: var(--airid-h2-size);
            }
        }

        /* ============================================
           BOUTONS AIRID
           ============================================ */
        .btn-airid-primary {
            background: linear-gradient(135deg, #c20102 0%, #8b0101 100%);
            border: none;
            color: #fff;
            transition: all 0.3s ease;
        }

        .btn-airid-primary:hover {
            background: linear-gradient(135deg, #8b0101 0%, #c20102 100%);
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(194, 1, 2, 0.4);
        }

        .btn-airid-outline {
            background: transparent;
            border: 2px solid #c20102;
            color: #c20102;
            transition: all 0.3s ease;
        }

        .btn-airid-outline:hover {
            background: linear-gradient(135deg, #c20102 0%, #8b0101 100%);
            border-color: #c20102;
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(194, 1, 2, 0.4);
        }

        /* Carte lien Insecticide Testing */
        .facility-cta-card {
            display: block;
            background: #fff;
            border-radius: 20px;
            padding: 2rem 2.5rem;
            box-shadow: 0 5px 25px rgba(0,0,0,0.08);
            border-top: 5px solid #c20102;
            text-decoration: none;
            color: inherit;
            transition: all 0.4s ease;
            margin-top: 1rem;
        }

        .facility-cta-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
            color: inherit;
            border-top-color: #8b0101;
        }

        .facility-cta-icon {
            width: 70px;
            height: 70px;
            border-radius: 18px;
            background: linear-gradient(135deg, #c20102 0%, #8b0101 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 1.75rem;
            flex-shrink: 0;
        }

        .facility-cta-card:hover .facility-cta-icon {
            transform: scale(1.08);
            transition: transform 0.3s ease;
        }

        .facility-cta-title {
            font-size: var(--airid-h2-size);
            font-weight: 700;
            color: var(--airid-title-color);
            margin-bottom: 0.5rem;
        }

        .facility-cta-desc {
            font-size: var(--airid-text-size);
            line-height: var(--airid-text-line-height);
            color: var(--airid-text-color);
            margin-bottom: 0;
        }

        .facility-cta-arrow-wrap {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            background: #c20102;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            flex-shrink: 0;
            transition: all 0.3s ease;
            border: 2px solid #c20102;
        }

        .facility-cta-card:hover .facility-cta-arrow-wrap {
            background: #8b0101;
            border-color: #8b0101;
            transform: translateX(6px);
        }

        .facility-cta-arrow-wrap .facility-cta-arrow {
            color: #fff;
            font-size: 1.1rem;
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
                            <h1 class="banner-title top_title fade-in-up">Research Activities</h1>
                            <p class="text-white mt-3 fade-in-up tagline mb-0" style="font-size: 1.4rem;">
                                Advancing science through innovative research and evidence-based solutions
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section Introduction -->
    <section class="py-5">
        <div class="container">
            <div class="research-intro fade-in-up">
                <div class="row text-center">
                    <div class="col-lg-10 mx-auto">
                        <h1 class="section-title mb-4">
                            <i class="fas fa-flask me-3" style="color: #c20102;"></i>
                            Our Research Domains
                        </h1>
                        <p class="section-lead mb-0" style="font-size: var(--airid-text-size); line-height: var(--airid-text-line-height); color: var(--airid-text-color);">
                            AIRID conducts multidisciplinary research across five key domains,
                            each contributing to our mission of reducing the burden of infectious diseases in Africa.
                            Our work spans from laboratory-based studies to community-level interventions,
                            ensuring that scientific discoveries translate into real-world impact.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Domaines de Recherche -->
    <section class="py-5" style="background: #f8f9fa;">
        <div class="container">
            <div class="row g-4">
                <!-- Domaine 1 -->
                <div class="col-lg-6 fade-in-up">
                    <div class="research-domain-card">
                        <div class="domain-number">1</div>
                        <div class="domain-icon">
                            <i class="fas fa-bug"></i>
                        </div>
                        <h3 class="domain-title">Vector Control and Public Health Entomology</h3>
                        <p class="domain-description">
                            AIRID conducts cutting-edge research to develop and evaluate innovative tools for the control
                            of disease vectors such as mosquitoes. Our expertise includes testing insecticide-treated nets (ITNs),
                            indoor residual sprays (IRS), attractive targeted sugar baits (ATSBs), and spatial repellents under
                            both laboratory and semi-field conditions.
                        </p>
                        <div class="domain-features">
                            <ul>
                                <li>Testing of vector control products (ITNs, IRS, ATSBs)</li>
                                <li>Insecticide resistance monitoring</li>
                                <li>Vector behavior investigation</li>
                                <li>Regulatory approval support</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Domaine 2 -->
                <div class="col-lg-6 fade-in-up" style="transition-delay: 0.1s">
                    <div class="research-domain-card">
                        <div class="domain-number">2</div>
                        <div class="domain-icon">
                            <i class="fas fa-dna"></i>
                        </div>
                        <h3 class="domain-title">Disease Surveillance, Diagnostics, and Molecular Epidemiology</h3>
                        <p class="domain-description">
                            We strengthen national and regional disease control efforts through integrated surveillance
                            and molecular research. Our teams evaluate the accuracy and usability of diagnostic tools,
                            conduct epidemiological studies to map disease burden, and apply molecular techniques to identify
                            pathogens and track resistance mutations.
                        </p>
                        <div class="domain-features">
                            <ul>
                                <li>Diagnostic tool evaluation</li>
                                <li>Epidemiological studies</li>
                                <li>Molecular pathogen identification</li>
                                <li>Transmission dynamics analysis</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Domaine 3 -->
                <div class="col-lg-6 fade-in-up" style="transition-delay: 0.2s">
                    <div class="research-domain-card">
                        <div class="domain-number">3</div>
                        <div class="domain-icon">
                            <i class="fas fa-balance-scale"></i>
                        </div>
                        <h3 class="domain-title">Health Policy, Systems, and Economics</h3>
                        <p class="domain-description">
                            AIRID is committed to transforming scientific evidence into actionable public health policy.
                            We work alongside national governments, donors, and technical partners to assess the impact,
                            feasibility, and cost-effectiveness of interventions. Our work supports policy formulation,
                            resource allocation, and program design.
                        </p>
                        <div class="domain-features">
                            <ul>
                                <li>Policy impact assessment</li>
                                <li>Cost-effectiveness analysis</li>
                                <li>Implementation research</li>
                                <li>Stakeholder consultation</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Domaine 4 -->
                <div class="col-lg-6 fade-in-up" style="transition-delay: 0.3s">
                    <div class="research-domain-card">
                        <div class="domain-number">4</div>
                        <div class="domain-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3 class="domain-title">Community Health, Social Science & Community Acceptance</h3>
                        <p class="domain-description">
                            We believe that impactful and sustainable health interventions must be grounded in the lived
                            experiences and perspectives of the communities they serve. AIRID designs and conducts research
                            that emphasizes community engagement, social science, and behavioral insight.
                        </p>
                        <div class="domain-features">
                            <ul>
                                <li>Community engagement research</li>
                                <li>Behavioral insight studies</li>
                                <li>Participatory approaches</li>
                                <li>Cultural sensitivity in health promotion</li>
                            </ul>
                        </div>
                    </div>
                </div>






                <!-- Domaine 5 -->
                <div class="col-lg-12 fade-in-up" style="transition-delay: 0.4s">
                    <div class="research-domain-card">
                        <div class="domain-number">5</div>
                        <div class="row align-items-center">
                            <div class="col-lg-2 text-center mb-3 mb-lg-0">
                                <div class="domain-icon mx-auto">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                            </div>
                            <div class="col-lg-10">
                                <h3 class="domain-title">Data Science, Analytics, and Modelling</h3>
                                <p class="domain-description">
                                    AIRID leverages data science to transform research into actionable insights. We employ
                                    statistical modelling, geospatial mapping, and predictive analytics to understand disease
                                    patterns, project intervention outcomes, and improve surveillance systems. By integrating data
                                    from laboratory, field, and health system sources, we support real-time decision-making and
                                    enhance program efficiency.
                                </p>
                                <div class="domain-features">
                                    <ul>
                                        <li>Statistical modelling and predictive analytics</li>
                                        <li>Geospatial mapping and disease pattern analysis</li>
                                        <li>Real-time data integration and decision support</li>
                                        <li>Program efficiency optimization</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Carte Insecticide Testing -->
                <div class="col-lg-12 fade-in-up" style="transition-delay: 0.5s">
                    <a href="{{ route('facilitiesLanding') }}" class="facility-cta-card">
                        <div class="row align-items-center g-3">
                            <div class="col-auto">
                                <div class="facility-cta-icon">
                                    <i class="fas fa-flask"></i>
                                </div>
                            </div>
                            <div class="col">
                                <h3 class="facility-cta-title">Insecticide Testing</h3>
                                <p class="facility-cta-desc mb-0">The Insecticide Bioassay and Testing Laboratories provide core capacity for the controlled evaluation of vector control tools and strategies. Scope includes WHO cone, tunnel and regeneration assays for insecticide-treated nets; IRS efficacy and residual activity; testing of larvicides, ATSBs, repellents; and insecticide susceptibility testing—all in accordance with OECD GLP and WHO guidelines.</p>
                            </div>
                            <div class="col-auto">
                                <span class="facility-cta-arrow-wrap"><i class="fas fa-arrow-right facility-cta-arrow"></i></span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Statistiques -->
    <section class="stats-section fade-in-up">
        <div class="container">
            <div class="row text-center mb-4">
                <div class="col-12">
                    <h2 class="text-white mb-3 section-title" style="color: #fff !important;">
                        <i class="fas fa-chart-bar me-3"></i>
                        Research Impact
                    </h2>
                    <p class="text-white opacity-90 tagline mb-0">
                        Our research activities contribute to evidence-based solutions across Africa
                    </p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="stat-card">
                        <div class="stat-number" data-count="20">0</div>
                        <div class="stat-label">Active Projects</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-card">
                        <div class="stat-number" data-count="5">0</div>
                        <div class="stat-label">Research Domains</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-card">
                        <div class="stat-number" data-count="75">0</div>
                        <div class="stat-label">Team Members</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-card">
                        <div class="stat-number" data-count="20">0</div>
                        <div class="stat-label">Partners</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center fade-in-up">
                    <h2 class="section-title mb-4">
                        Interested in Our Research?
                    </h2>
                    <p class="section-lead mb-4">
                        Explore our projects, publications, and facilities to learn more about our work
                    </p>
                    <div class="d-flex flex-wrap justify-content-center gap-3">
                        <a href="{{ route('allProjectsPage') }}" class="btn btn-airid-primary px-5 py-3 fw-bold" style="border-radius: 50px;">
                            <i class="fas fa-folder-open me-2"></i>
                            View Our Projects
                        </a>
                        <a href="{{ route('allPublicationsPage') }}" class="btn btn-airid-outline px-5 py-3 fw-bold" style="border-radius: 50px; border-width: 2px;">
                            <i class="fas fa-book me-2"></i>
                            Read Publications
                        </a>
                        <a href="{{ route('contactPage') }}" class="btn btn-airid-outline px-5 py-3 fw-bold" style="border-radius: 50px; border-width: 2px;">
                            <i class="fas fa-envelope me-2"></i>
                            Contact Us
                        </a>
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

            // ============================================
            // ANIMATION DES STATISTIQUES
            // ============================================
            function animateCounter(element) {
                const target = parseInt(element.getAttribute('data-count'));
                const duration = 2000;
                const step = target / (duration / 16);
                let current = 0;

                const timer = setInterval(function() {
                    current += step;
                    if (current >= target) {
                        current = target;
                        clearInterval(timer);
                    }
                    element.textContent = Math.floor(current);
                }, 16);
            }

            const statsObserver = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const statNumbers = entry.target.querySelectorAll('.stat-number');
                        statNumbers.forEach(stat => {
                            if (!stat.classList.contains('counted')) {
                                stat.classList.add('counted');
                                animateCounter(stat);
                            }
                        });
                        statsObserver.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.5 });

            const statsSection = document.querySelector('.stats-section');
            if (statsSection) {
                statsObserver.observe(statsSection);
            }
        });
    </script>
@endsection
