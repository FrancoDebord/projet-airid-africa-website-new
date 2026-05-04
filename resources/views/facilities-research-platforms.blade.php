@extends('index')

@section('title', 'Facilities & Research Platforms | AIRID Africa')

@section('css')
    <style>
        .fac-banner { background-size: cover; background-position: center; }
        .fac-intro {
            background: linear-gradient(135deg, rgba(194, 1, 2, 0.06) 0%, rgba(139, 1, 1, 0.06) 100%);
            padding: 2.5rem 2rem;
            border-radius: 20px;
            margin: 2rem 0;
            border-left: 5px solid #c20102;
        }
        .fac-intro .section-lead { font-size: var(--airid-text-size); line-height: var(--airid-text-line-height); color: var(--airid-text-color); margin-bottom: 1rem; }
        .fac-intro .section-lead:last-child { margin-bottom: 0; }

        .fac-section-title {
            font-size: var(--airid-h2-size);
            font-weight: 700;
            color: var(--airid-title-color);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .fac-section-title i { color: #c20102; }

        .fac-tile {
            background: #fff;
            border-radius: 14px;
            padding: 1.75rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            border-left: 4px solid #c20102;
            margin-bottom: 1.5rem;
            transition: box-shadow 0.25s ease;
        }
        .fac-tile:hover { box-shadow: 0 8px 28px rgba(0,0,0,0.12); }
        .fac-tile-icon {
            width: 52px;
            height: 52px;
            border-radius: 12px;
            background: rgba(194, 1, 2, 0.1);
            color: #c20102;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.35rem;
            margin-bottom: 1rem;
        }
        .fac-tile h3 {
            font-size: var(--airid-h3-size);
            font-weight: 700;
            color: var(--airid-title-color);
            margin-bottom: 0.75rem;
        }
        .fac-tile .fac-tagline {
            font-size: var(--airid-tagline-size);
            font-weight: 600;
            color: #c20102;
            margin-bottom: 0.75rem;
        }
        .fac-tile p, .fac-tile .section-lead {
            font-size: var(--airid-text-size);
            line-height: var(--airid-text-line-height);
            color: var(--airid-text-color);
            margin-bottom: 0.75rem;
        }
        .fac-tile p:last-child, .fac-tile .section-lead:last-of-type { margin-bottom: 0; }
        .fac-tile ul {
            list-style: none;
            padding: 0;
            margin: 0 0 0.75rem 0;
        }
        .fac-tile ul li {
            padding: 0.25rem 0 0.25rem 1.5rem;
            position: relative;
            font-size: var(--airid-text-size);
            line-height: 1.6;
            color: var(--airid-text-color);
        }
        .fac-tile ul li::before { content: '✓'; position: absolute; left: 0; color: #c20102; font-weight: 700; }

        /* Cartes "visiter la page" avec icône de direction */
        .fac-quick-link-card {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem 1.25rem;
            background: #fff;
            border: 1px solid #eee;
            border-radius: 10px;
            text-decoration: none;
            color: var(--airid-text-color);
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        }
        .fac-quick-link-card:hover {
            border-color: #c20102;
            color: #c20102;
            box-shadow: 0 4px 12px rgba(194, 1, 2, 0.15);
            transform: translateY(-2px);
            text-decoration: none;
        }
        .fac-quick-link-icon {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            background: rgba(194, 1, 2, 0.1);
            color: #c20102;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            flex-shrink: 0;
        }
        .fac-quick-link-card:hover .fac-quick-link-icon {
            background: #c20102;
            color: #fff;
        }
        .fac-quick-link-label { font-weight: 600; font-size: var(--airid-text-size); flex: 1; }
        .fac-quick-link-arrow { color: #adb5bd; font-size: 0.9rem; transition: transform 0.3s ease; }
        .fac-quick-link-card:hover .fac-quick-link-arrow { color: #c20102; transform: translateX(4px); }

        .fade-in-up { opacity: 0; transform: translateY(24px); transition: opacity 0.6s ease, transform 0.6s ease; }
        .fade-in-up.visible { opacity: 1; transform: translateY(0); }
        .fac-row-2 { margin-top: 1.5rem; }
        @media (min-width: 992px) { .fac-row-2 { margin-top: 2rem; } }

        .fac-section-row { margin-bottom: 2rem; }
        .fac-section-row .fac-tile { margin-bottom: 0; }
        .fac-section-image {
            border-radius: 14px;
            overflow: hidden;
            margin-bottom: 1.25rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            border: 3px solid #c20102;
            background: #f0f0f0;
        }
        .fac-section-row .fac-section-image {
            margin-bottom: 0;
            min-height: 240px;
            height: 100%;
            display: block;
        }
        .fac-section-row .fac-section-image img {
            width: 100%;
            height: 100%;
            min-height: 240px;
            object-fit: cover;
            object-position: center;
            display: block;
        }
        @media (min-width: 992px) {
            .fac-section-row .fac-section-image {
                min-height: 280px;
            }
            .fac-section-row .fac-section-image img {
                min-height: 280px;
            }
        }
    </style>
@endsection

@section('content')
    <div id="banner-area" class="banner-area fac-banner"
        style="background-image:url({{ asset('storage/assets_vendor/images/banner/banner2_new.png') }})">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title top_title fade-in-up">Insecticide Testing Facilities</h1>
                            <p class="text-white mt-3 fade-in-up tagline mb-0" style="font-size: 1.4rem;">
                                Infrastructure Designed to Deliver High-Quality, Policy-Relevant Science
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="py-5">
        <div class="container">
            {{-- <div class="fac-intro fade-in-up">
                <p class="section-lead">
                    AIRID's research is underpinned by a network of specialised laboratories, semi-field platforms, and field research sites designed to support rigorous, ethical, and reproducible infectious disease research. These facilities enable AIRID to generate high-quality evidence across laboratory, experimental, and real-world settings, supporting national programmes, product developers, and global health partners.
                </p>
                <p class="section-lead">
                    All facilities are managed by dedicated technical teams and operate under defined quality systems aligned with international scientific, ethical, and regulatory standards.
                </p>
            </div> --}}

            {{-- <h2 class="fac-section-title fade-in-up"><i class="fas fa-layer-group"></i> Integrated Research Platforms</h2>
            <div class="row align-items-stretch g-4 fac-section-row fade-in-up">
                <div class="col-lg-6 order-2 order-lg-1">
                    <div class="fac-tile h-100">
                        <span class="fac-tile-icon"><i class="fas fa-flask"></i></span>
                        <p class="section-lead mb-0">AIRID operates an integrated system of research platforms that support the full research lifecycle, including:</p>
                        <ul>
                            <li>Laboratory-based experimental research</li>
                            <li>Semi-field and experimental hut evaluations</li>
                            <li>Community- and health-facility-based field studies</li>
                            <li>Clinical and community trial implementation</li>
                            <li>Data management, analytics, and modelling</li>
                        </ul>
                        <p class="section-lead mb-0">This integrated approach ensures that research findings are scientifically robust, operationally relevant, and directly applicable to public health policy and programme decision-making.</p>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2">
                    <div class="fac-section-image h-100">
                        <img src="{{ asset('storage/assets_vendor/images/banner/banner2_new.png') }}" alt="Integrated Research Platforms" loading="lazy">
                    </div>
                </div>
            </div> --}}

            <h2 class="fac-section-title fade-in-up fac-row-2"><i class="fas fa-vial"></i> Insecticide Bioassay and Testing Laboratories</h2>
            <div class="row align-items-stretch g-4 fac-section-row fade-in-up">
                <div class="col-lg-6 order-2 order-lg-1">
                    <div class="fac-section-image h-100">
                        <img src="{{ asset('storage/assets_vendor/images/banner/IMG_2778.jpg') }}" alt="Insecticide Bioassay and Testing Laboratories" loading="lazy">
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2">
                    <div class="fac-tile h-100">
                        <p class="fac-tagline">Standardised Evaluation of Vector Control Interventions</p>
                        <p>The Insecticide Bioassay and Testing Laboratories provide core capacity for the controlled evaluation of vector control tools and strategies. These laboratories form the foundation of AIRID's vector control research and support both pre- and post-market evaluations.</p>
                        <p><strong>Scope of Activities</strong></p>
                        <ul>
                            <li>WHO cone, tunnel, and regeneration assays for insecticide-treated nets</li>
                            <li>Evaluation of indoor residual spraying (IRS) efficacy and residual activity</li>
                            <li>Testing of larvicides, attractive targeted sugar baits (ATSBs), topical repellents, and spatial repellents</li>
                            <li>Insecticide susceptibility and resistance testing</li>
                        </ul>
                        <p>All testing is conducted in accordance with OECD Principles of Good Laboratory Practice (GLP) and World Health Organization guidelines.</p>
                        <p><strong>Infrastructure</strong></p>
                        <ul>
                            <li>Controlled-temperature testing rooms</li>
                            <li>Calibrated exposure chambers</li>
                            <li>Chemical preparation and secure storage areas</li>
                            <li>Fume hoods and ventilated workspaces</li>
                            <li>Dedicated IRS substrate treatment zones</li>
                        </ul>
                    </div>
                </div>
            </div>

            {{-- Insectaries | Semi-Field Experimental Hut Station --}}
            <div class="row g-4 fade-in-up fac-row-2">
                <div class="col-lg-6">
                    <div class="fac-tile h-100">
                        <span class="fac-tile-icon"><i class="fas fa-bug"></i></span>
                        <h3>Insectaries</h3>
                        <p class="fac-tagline">High-Quality Mosquito Rearing for Entomological Research</p>
                        <p>AIRID's Insectaries support the rearing and maintenance of well-characterised mosquito colonies of Anopheles, Aedes, and Culex species used across laboratory, semi-field, and experimental studies.</p>
                        <p><strong>Key Functions</strong></p>
                        <ul>
                            <li>Maintenance of insecticide-susceptible and field-derived resistant colonies</li>
                            <li>Support for behavioural, ecological, and vector competence studies</li>
                            <li>Provision of mosquitoes for laboratory assays, semi-field trials, and experimental hut evaluations</li>
                            <li>Monitoring of life-history traits including longevity, fecundity, and emergence</li>
                            <li>Strain selection and characterisation aligned with specific research objectives</li>
                        </ul>
                        <p><strong>Infrastructure and Standards</strong></p>
                        <ul>
                            <li>Temperature- and humidity-controlled rearing rooms</li>
                            <li>Larval and pupal rearing systems</li>
                            <li>Adult holding cages with controlled blood-feeding systems</li>
                            <li>Dedicated preparation, cleaning, and waste-management areas</li>
                        </ul>
                        <p class="mb-0">Mosquito colonies maintained within the insectary underpin the reproducibility and scientific integrity of AIRID's entomological research.</p>
                        <a href="{{ route('insectaryPage') }}" class="fac-quick-link-card d-inline-flex mt-3">
                            <span class="fac-quick-link-icon"><i class="fas fa-arrow-right"></i></span>
                            <span class="fac-quick-link-label">Mosquito strains maintained at the AIRID insectary</span>
                            <span class="fac-quick-link-arrow"><i class="fas fa-arrow-right"></i></span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="fac-tile h-100">
                        <span class="fac-tile-icon"><i class="fas fa-home"></i></span>
                        <h3>Semi-Field Experimental Hut Station</h3>
                        <p class="fac-tagline">Bridging Laboratory Findings and Field Performance</p>
                        <p>AIRID operates a Semi-Field Experimental Hut Station in Covè, Benin, comprising a large network of WHO-standard experimental huts and associated research infrastructure. This platform enables evaluation of vector control interventions under near-field conditions using local mosquito populations.</p>
                        <p><strong>Core Activities</strong></p>
                        <ul>
                            <li>Experimental hut evaluations of insecticide-treated nets, IRS, spatial repellents, and novel tools</li>
                            <li>Behavioural studies of mosquito host-seeking, feeding, and exiting behaviour</li>
                            <li>Longitudinal assessment of intervention durability and residual efficacy</li>
                            <li>Controlled release–recapture studies using resistant vector populations</li>
                        </ul>
                        <p><strong>Infrastructure</strong></p>
                        <ul>
                            <li>84 experimental huts (West African and open-eave designs)</li>
                            <li>Mosquito release chambers</li>
                            <li>On-site meteorological monitoring systems</li>
                            <li>Specimen processing and data recording laboratories</li>
                            <li>Backup power systems to ensure uninterrupted operations</li>
                        </ul>  <br> <br><br>
                        <a href="{{ route('experimentalHutStationPage') }}" class="btn btn-outline-danger mt-2">Experimental Hut Station <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>

            {{-- <h2 class="fac-section-title fade-in-up fac-row-2"><i class="fas fa-microscope"></i> Mosquito Plasmodium Infection Laboratory (Under Development)</h2>
            <div class="fac-tile fade-in-up">
                <p class="fac-tagline">Supporting Transmission and Infection Research</p>
                <p>AIRID is developing a Mosquito Plasmodium Infection Laboratory to support experimental infection studies relevant to malaria transmission and transmission-blocking interventions.</p>
                <p><strong>Planned Capabilities</strong></p>
                <ul>
                    <li>Direct membrane and skin feeding assays</li>
                    <li>Oocyst and sporozoite detection using microscopy and molecular methods</li>
                    <li>Evaluation of vaccines, drugs, and monoclonal antibodies for transmission-blocking efficacy</li>
                    <li>Vector–parasite compatibility and threshold studies</li>
                </ul>
                <p class="mb-0">This facility will substantially strengthen AIRID's contribution to translational malaria research in West Africa.</p>
            </div> --}}

            {{-- Section Molecular Lab | Analytical Chemistry Lab (commentée) --}}

            <h2 class="fac-section-title fade-in-up fac-row-2"><i class="fas fa-shield-alt"></i> Quality, Compliance, and Operational Standards</h2>
            <div class="fac-tile fade-in-up">
                <p class="mb-0">All AIRID facilities operate under institute-wide quality systems and standard operating procedures designed to ensure: scientific rigour and reproducibility; ethical and regulatory compliance; staff safety and data integrity; alignment with GLP and WHO guidance where applicable. Continuous training, internal oversight, and system review underpin all facility operations.</p>
            </div>

            {{-- Deux cadres parallèles : droite = Capacity Strengthening, gauche = Collaboration (ordre droite vers gauche) --}}
            <div class="row g-4 fade-in-up fac-row-2">
                <div class="col-lg-6 order-lg-2">
                    <div class="fac-tile h-100">
                        <span class="fac-tile-icon"><i class="fas fa-graduation-cap"></i></span>
                        <h3>Facilities as Platforms for Capacity Strengthening</h3>
                        <p class="mb-0">AIRID's facilities also function as training and mentorship platforms, supporting: practical training of early-career scientists and technicians; skills transfer in entomological, laboratory, and analytical methods; institutional strengthening of research systems. This ensures that infrastructure investments contribute to sustainable African research capacity.</p>
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="fac-tile h-100">
                        <span class="fac-tile-icon"><i class="fas fa-handshake"></i></span>
                        <h3>Enabling Collaboration and Partnership</h3>
                        <p class="mb-0">AIRID's facilities are designed to support collaborative research with: national disease control programmes; academic and research institutions; industry and product developers; regional and global health organisations. By providing high-quality, independent research environments, AIRID serves as a trusted partner for evidence generation and evaluation.</p>
                    </div>
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
