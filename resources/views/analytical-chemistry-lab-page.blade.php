@extends('index')

@section('title', 'AIRID — Analytical and Chemistry Laboratory')

@section('css')
    @include('partials.modern-css')
    <style>
        .acl-row { margin-bottom: 2rem; }
        .acl-image { border-radius: 14px; overflow: hidden; margin-bottom: 1.25rem; border: 3px solid #c20102; box-shadow: 0 4px 20px rgba(0,0,0,0.08); background: #f0f0f0; height: 100%; min-height: 240px; display: block; }
        .acl-row .acl-image { margin-bottom: 0; }
        .acl-image img { width: 100%; height: 100%; min-height: 240px; object-fit: cover; object-position: center; display: block; }
        @media (min-width: 992px) { .acl-row .acl-image { min-height: 280px; } .acl-row .acl-image img { min-height: 280px; } }
        .acl-section { margin-bottom: 3rem; }
        .acl-section:last-of-type { margin-bottom: 0; }

        /* Notice / cadre d'introduction */
        .acl-notice {
            background: linear-gradient(135deg, rgba(194, 1, 2, 0.06) 0%, rgba(139, 1, 1, 0.08) 100%);
            border: 1px solid rgba(194, 1, 2, 0.25);
            border-left: 5px solid #c20102;
            border-radius: 12px;
            padding: 1.75rem 2rem;
            margin-bottom: 3rem;
            box-shadow: 0 2px 12px rgba(0,0,0,0.04);
        }
        .acl-notice p { margin-bottom: 1rem; color: #333; line-height: 1.7; }
        .acl-notice p:last-child { margin-bottom: 0; }

        /* Cadres pour les sections */
        .acl-cadre {
            background: linear-gradient(135deg, rgba(194, 1, 2, 0.06) 0%, rgba(139, 1, 1, 0.08) 100%);
            border: 1px solid rgba(194, 1, 2, 0.25);
            border-left: 5px solid #c20102;
            border-radius: 12px;
            padding: 1.75rem 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 2px 12px rgba(0,0,0,0.04);
        }
        .acl-cadre:last-child { margin-bottom: 0; }
        .acl-cadre .acl-cadre-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .acl-cadre .acl-cadre-title i { color: #c20102; }
        .acl-cadre p { margin-bottom: 1rem; color: #333; line-height: 1.7; }
        .acl-cadre p:last-of-type { margin-bottom: 0; }
        .acl-cadre ul { margin-bottom: 1rem; padding-left: 1.5rem; color: #333; line-height: 1.7; }
        .acl-cadre ul:last-of-type { margin-bottom: 0; }
        .acl-cadre li { margin-bottom: 0.35rem; }
    </style>
@endsection

@section('content')
    <div id="banner-area" class="banner-area"
        style="background-image:url({{ asset('storage/assets_vendor/images/banner/banner2_new.png') }})">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title top_title fade-in-up">Analytical and Chemistry Laboratory</h1>
                            <p class="text-white mt-3 fade-in-up" style="font-size: 1.4rem;">
                                Chemical Evidence to Support Evaluation of Vector Control Interventions
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="py-5">
        <div class="container">
            {{-- Notice d'introduction --}}
            <div class="acl-notice fade-in-up">
                <p>
                    The Analytical and Chemistry Laboratory provides core capacity for chemical analysis of vector control products and treated materials. The laboratory generates robust chemical evidence to support evaluation of product quality, chemical durability, and performance over time.
                </p>
                <p class="mb-0">
                    By complementing biological efficacy data with precise chemical measurements, the laboratory strengthens AIRID’s ability to deliver comprehensive, policy- and regulator-relevant evaluation of vector control interventions.
                </p>
            </div>

            {{-- Purpose and Role within AIRID --}}
            <h2 class="section-title fade-in-up">
                <i class="fas fa-bullseye"></i> Purpose and Role within AIRID
            </h2>
            <div class="row align-items-stretch g-4 acl-row fade-in-up">
                <div class="col-lg-6 order-2 order-lg-1">
                    <div class="content-section h-100">
                        <div class="section-content">
                            <p>
                                The Analytical and Chemistry Laboratory supports AIRID’s vector control and intervention research by providing quantitative and qualitative chemical analysis of insecticide-treated products and formulations.
                            </p>
                            <p>
                                It plays a critical role in linking chemical content and integrity with entomological and epidemiological outcomes, ensuring that conclusions on intervention performance are scientifically robust and operationally meaningful.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2">
                    <div class="acl-image h-100">
                        <img src="{{ asset('storage/assets_vendor/images/banner/42PM.jpg') }}" alt="Analytical and Chemistry Laboratory" loading="lazy">
                    </div>
                </div>
            </div>

            {{-- Core Activities --}}
            <h3 class="section-subtitle fade-in-up">Core Activities</h3>
            <div class="row align-items-stretch g-4 acl-row fade-in-up">
                <div class="col-lg-6 order-2 order-lg-1">
                    <div class="acl-image h-100">
                        <img src="{{ asset('storage/assets_vendor/images/banner/IMG_2846.jpg') }}" alt="Core Activities" loading="lazy">
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2">
                    <div class="content-section h-100">
                        <div class="section-content">
                            <p>The laboratory undertakes a range of analytical and chemistry activities, including:</p>
                            <ul>
                                <li>Quantification of active ingredients in vector control interventions</li>
                                <li>Assessment of chemical integrity and degradation over time</li>
                                <li>Evaluation of release profiles and wash resistance of treated materials</li>
                                <li>Analytical method development and validation</li>
                                <li>Quality assurance and verification of analytical results</li>
                                <li>Chemical support for durability monitoring and post-market surveillance</li>
                            </ul>
                            <p>These activities provide essential evidence on product performance and longevity under laboratory and field conditions.</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Infrastructure and Technical Capacity --}}
            <h3 class="section-subtitle fade-in-up">Infrastructure and Technical Capacity</h3>
            <div class="row align-items-stretch g-4 acl-row fade-in-up">
                <div class="col-lg-6 order-2 order-lg-1">
                    <div class="content-section h-100">
                        <div class="section-content">
                            <p>The Analytical and Chemistry Laboratory is equipped with specialised instrumentation and infrastructure to support high-quality chemical analysis, including:</p>
                            <ul>
                                <li><strong>Agilent 1260 High-Performance Liquid Chromatography (HPLC)</strong> system with Diode Array Detector (DAD) for precise quantification and profiling of active ingredients</li>
                                <li>Sample preparation and extraction workspaces</li>
                                <li>Secure chemical storage and reagent handling areas</li>
                                <li>Data acquisition and analysis systems supporting validated workflows</li>
                                <li>Controlled laboratory environments to ensure analytical reproducibility</li>
                            </ul>
                            <p>Standardised protocols and calibration procedures are applied to ensure accuracy, precision, and traceability of results.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2">
                    <div class="acl-image h-100">
                        <img src="{{ asset('storage/assets_vendor/images/banner/PM2.jpg') }}" alt="Infrastructure and Technical Capacity" loading="lazy">
                    </div>
                </div>
            </div>

            {{-- Integration with Other AIRID Platforms --}}
            <div class="acl-cadre fade-in-up">
                <h3 class="acl-cadre-title"><i class="fas fa-link"></i> Integration with Other AIRID Platforms</h3>
                <p>The Analytical and Chemistry Laboratory operates in close integration with AIRID’s:</p>
                <ul>
                    <li><strong>Insecticide Bioassay and Testing Laboratories</strong>, linking chemical content with biological efficacy</li>
                    <li><strong>Insectaries and semi-field platforms</strong>, supporting interpretation of performance outcomes</li>
                    <li><strong>Experimental Hut Station</strong>, enabling combined chemical, entomological, and behavioural evaluation</li>
                    <li><strong>Field durability and surveillance studies</strong>, supporting longitudinal assessment of intervention performance including chemical durability of ITNs</li>
                </ul>
                <p class="mb-0">This integrated platform ensures continuity across chemical, biological, and operational evaluation pathways.</p>
            </div>

            {{-- Contribution to Decision-Making and Product Evaluation --}}
            <div class="acl-cadre fade-in-up">
                <h3 class="acl-cadre-title"><i class="fas fa-chart-line"></i> Contribution to Decision-Making and Product Evaluation</h3>
                <p>Chemical data generated by the laboratory contribute to:</p>
                <ul>
                    <li>Evaluation of product quality and consistency</li>
                    <li>Interpretation of efficacy and durability results</li>
                    <li>Resistance management and intervention optimisation</li>
                    <li>Regulatory submissions and policy-relevant assessments</li>
                </ul>
                <p class="mb-0">Outputs are designed to support programme managers, regulators, technical partners, and global policy processes.</p>
            </div>

            {{-- Quality, Ethics, and Scientific Integrity --}}
            <div class="acl-cadre fade-in-up">
                <h3 class="acl-cadre-title"><i class="fas fa-shield-alt"></i> Quality, Ethics, and Scientific Integrity</h3>
                <p>All analytical activities are conducted under approved protocols and comply with:</p>
                <ul>
                    <li>Institutional quality management systems</li>
                    <li>Applicable national and international standards for chemical analysis</li>
                    <li>Standard operating procedures for sample handling, analysis, and reporting</li>
                </ul>
                <p class="mb-0">Strong quality assurance and documentation processes underpin all analytical work, ensuring confidence in results and reproducibility.</p>
            </div>

            {{-- Capacity Strengthening and Collaboration --}}
            <div class="acl-cadre fade-in-up">
                <h3 class="acl-cadre-title"><i class="fas fa-users"></i> Capacity Strengthening and Collaboration</h3>
                <p>The Analytical and Chemistry Laboratory also supports:</p>
                <ul>
                    <li>Training of analytical chemists and laboratory scientists</li>
                    <li>Method development and technology transfer</li>
                    <li>Collaborative research with industry, academic, and public health partners</li>
                </ul>
                <p class="mb-0">Through these activities, the laboratory contributes to sustainable analytical chemistry capacity for vector control research in the region.</p>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
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
    </script>
@endsection
