@extends('index')

@section('title', 'Centre for Data Science, Analytics and Modelling | AIRID Africa')

@section('css')
    @include('partials.research-centre-styles')
@endsection

@section('content')
    <div id="banner-area" class="banner-area centre-banner"
        style="background-image:url({{ asset('storage/assets_vendor/images/banner/banner2_new.png') }})">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title top_title fade-in-up">Centre for Data Science, Analytics and Modelling</h1>
                            <p class="text-white mt-3 fade-in-up tagline mb-0" style="font-size: 1.4rem;">
                                Turning Data into Insight to Inform Public Health Decisions
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="py-5">
        <div class="container">
            <div class="centre-intro fade-in-up">
                <p class="section-lead">
                    The Centre provides advanced analytical, statistical, and modelling capacity to support AIRID’s research, evaluation, and policy engagement.
                </p>
                <p class="section-lead">
                    As a cross-cutting analytical hub, it enables robust interpretation of complex data, supports evidence-based planning, and strengthens decision-making across infectious disease research and public health programmes.
                </p>
            </div>

            <nav class="centre-nav fade-in-up" aria-label="Page sections">
                <div class="nav-label"><i class="fas fa-th-list"></i> On this page</div>
                <div class="nav-grid">
                    <a href="#mandate" class="nav-link-item"><i class="fas fa-gavel"></i> Mandate</a>
                    <a href="#scope" class="nav-link-item"><i class="fas fa-compass"></i> Scope</a>
                    <a href="#units" class="nav-link-item"><i class="fas fa-sitemap"></i> Research Units</a>
                    <a href="#support" class="nav-link-item"><i class="fas fa-hands-helping"></i> Cross-Cutting Support</a>
                    <a href="#contribution" class="nav-link-item"><i class="fas fa-chart-line"></i> Contribution</a>
                    <a href="#ethics" class="nav-link-item"><i class="fas fa-shield-alt"></i> Ethics & Leadership</a>
                </div>
            </nav>

            <div class="centre-section fade-in-up" id="mandate">
                <h2><i class="fas fa-gavel"></i> Mandate</h2>
                <p class="mb-0">
                    To provide high-quality analytical and modelling expertise that supports evidence generation, interpretation, and translation into policy-relevant insights. The Centre ensures that AIRID’s research outputs are analytically rigorous, reproducible, and relevant to strategic decision-making.
                </p>
            </div>

            <div class="centre-section fade-in-up" id="scope">
                <h2><i class="fas fa-compass"></i> Scope of Work</h2>
                <p>The Centre supports all AIRID Research Centres with integrated analytical services and advanced tools. Core areas:</p>
                <ul class="centre-list">
                    <li>Statistical analysis and data management</li>
                    <li>Mathematical and transmission modelling</li>
                    <li>Geospatial and spatial epidemiological analysis</li>
                    <li>Predictive and scenario-based modelling</li>
                    <li>Dashboards and decision-support tools</li>
                    <li>Artificial intelligence and machine learning methods</li>
                </ul>
                <p class="mb-0">These activities strengthen AIRID’s capacity to generate actionable insights from diverse and complex datasets.</p>
            </div>

            <div class="centre-section fade-in-up" id="units">
                <h2><i class="fas fa-sitemap"></i> Research Units</h2>

                <div class="centre-unit-card">
                    <h3><i class="fas fa-database"></i> Data Science & Modelling Unit</h3>
                    <p class="unit-tagline">Strengthening Evidence through Advanced Analytics</p>
                    <p>Provides core analytical, statistical, and modelling expertise across AIRID’s research programmes.</p>
                    <ul class="centre-list">
                        <li>Management and curation of research datasets; data quality and reproducibility</li>
                        <li>Statistical analysis with reproducible workflows</li>
                        <li>Mathematical and transmission models for disease dynamics and intervention impact</li>
                        <li>Geospatial and spatial epidemiological analyses</li>
                        <li>Predictive and scenario-based modelling; dashboards and decision-support tools</li>
                    </ul>
                    <p class="mb-0">Supports retrospective analysis and forward-looking planning across disease and intervention contexts.</p>
                </div>

                <div class="centre-unit-card">
                    <h3><i class="fas fa-robot"></i> Artificial Intelligence & Machine Learning Unit</h3>
                    <p class="unit-tagline">Harnessing Advanced Analytics for Innovation and Efficiency</p>
                    <p>Develops and applies AI and machine learning methods to enhance automation, pattern recognition, and predictive intelligence.</p>
                    <ul class="centre-list">
                        <li>Machine learning and AI models for complex, high-dimensional data</li>
                        <li>AI for image, text, signal, and other unstructured public health data</li>
                        <li>Automated analytics pipelines for efficiency and scalability</li>
                        <li>Advanced predictive applications; responsible and ethical use of AI</li>
                        <li>Innovation, experimentation, and capacity strengthening in AI/ML</li>
                    </ul>
                    <p class="mb-0">Positions AIRID at the forefront of data-driven public health research in Africa.</p>
                </div>
            </div>

            <div class="centre-section fade-in-up" id="support">
                <h2><i class="fas fa-hands-helping"></i> Cross-Cutting Analytical Support</h2>
                <p>The Centre works with all AIRID Research Centres to embed analytical expertise across the research lifecycle:</p>
                <ul class="centre-list">
                    <li>Protocol development and sample size calculations</li>
                    <li>Data collection strategies and quality assurance</li>
                    <li>Integrated analyses across biological, clinical, and systems data</li>
                    <li>Translation of complex results into clear, decision-relevant outputs</li>
                </ul>
                <p class="mb-0">From study design to dissemination.</p>
            </div>

            <div class="centre-section fade-in-up" id="contribution">
                <h2><i class="fas fa-chart-line"></i> Contribution to Policy and Planning</h2>
                <p class="mb-0">
                    By generating robust analytical insights and predictive scenarios, the Centre supports strategic planning and prioritisation, optimisation of intervention strategies, resource allocation and budgeting, and monitoring and evaluation of programme performance. Outputs inform policymakers, programme managers, and partners at national, regional, and global levels.
                </p>
            </div>

            <div class="row g-4 fade-in-up" id="ethics">
                <div class="col-lg-6">
                    <div class="centre-mini-card">
                        <h3><i class="fas fa-shield-alt"></i> Ethics, Data Governance, and Scientific Integrity</h3>
                        <p class="mb-0">
                            All analytical activities adhere to AIRID’s data governance, ethical, and quality assurance frameworks: responsible data management and protection, transparency and reproducibility of analyses, ethical application of advanced analytics and AI, and compliance with national and international standards. Strong data governance underpins trust in AIRID’s analytical outputs.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="centre-mini-card">
                        <h3><i class="fas fa-users-cog"></i> Leadership and Collaboration</h3>
                        <p class="mb-0">
                            The Centre is led by a Centre Director and supported by Unit Heads, working closely with AIRID’s other Research Centres. This integrated structure promotes multidisciplinary research, efficient use of data resources, and continuous methodological innovation across the Institute.
                        </p>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12 text-center">
                    <a href="{{ route('researchActivitiesPage') }}" class="btn btn-danger btn-lg"><i class="fas fa-flask me-2"></i>Research activities</a>
                    <a href="{{ route('researchCentreVectorBiologyPage') }}" class="btn btn-outline-danger btn-lg ms-2"><i class="fas fa-bug me-2"></i>Vector Biology Centre</a>
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
