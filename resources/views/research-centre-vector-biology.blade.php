@extends('index')

@section('title', 'Centre for Vector Biology and Intervention Research | AIRID Africa')

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
                            <h1 class="banner-title top_title fade-in-up">Centre for Vector Biology and Intervention Research</h1>
                            <p class="text-white mt-3 fade-in-up tagline mb-0" style="font-size: 1.4rem;">
                                Generating Evidence to Strengthen Vector Control and Disease Prevention
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
                    AIRID’s flagship scientific platform for high-quality evidence on vector biology, surveillance, and intervention performance to support the prevention and control of malaria and other vector-borne diseases.
                </p>
                <p class="section-lead">
                    The Centre conducts laboratory, semi-field, and field-based research and provides independent evaluation of vector control tools and strategies, supporting national programmes, regional initiatives, and global policy so that interventions are effective, durable, and appropriate for real-world use.
                </p>
            </div>

            <nav class="centre-nav fade-in-up" aria-label="Page sections">
                <div class="nav-label"><i class="fas fa-th-list"></i> On this page</div>
                <div class="nav-grid">
                    <a href="#mandate" class="nav-link-item"><i class="fas fa-gavel"></i> Mandate</a>
                    <a href="#scope" class="nav-link-item"><i class="fas fa-compass"></i> Scope</a>
                    <a href="#units" class="nav-link-item"><i class="fas fa-sitemap"></i> Research Units</a>
                    <a href="#platforms" class="nav-link-item"><i class="fas fa-flask"></i> Platforms & Methods</a>
                    <a href="#contribution" class="nav-link-item"><i class="fas fa-handshake"></i> Contribution</a>
                    <a href="#ethics" class="nav-link-item"><i class="fas fa-shield-alt"></i> Ethics & Leadership</a>
                </div>
            </nav>

            <div class="centre-section fade-in-up" id="mandate">
                <h2><i class="fas fa-gavel"></i> Mandate</h2>
                <p class="mb-0">
                    To generate robust, policy-relevant evidence that informs vector control strategies and supports effective deployment in diverse contexts. The Centre addresses insecticide resistance, changing vector behaviour, and the need for integrated vector management.
                </p>
            </div>

            <div class="centre-section fade-in-up" id="scope">
                <h2><i class="fas fa-compass"></i> Scope of Work</h2>
                <p>Comprehensive research across the full evaluation pathway:</p>
                <ul class="centre-list">
                    <li>Laboratory, semi-field, and community-based research</li>
                    <li>Evaluation of vector control tools and strategies</li>
                    <li>Clinical and community-based intervention studies</li>
                    <li>Molecular and genomic surveillance of vectors and pathogens</li>
                    <li>Contribution to national, regional, and global policy and regulatory processes</li>
                </ul>
                <p class="mb-0">Activities generate independent, high-quality evidence for informed decision-making and sustainable public health impact.</p>
            </div>

            <div class="centre-section fade-in-up" id="units">
                <h2><i class="fas fa-sitemap"></i> Research Units</h2>

                <div class="centre-unit-card">
                    <h3><i class="fas fa-bug"></i> Vector Control Unit</h3>
                    <p class="unit-tagline">Evaluating the Performance of Vector Control Interventions</p>
                    <p>Evaluates efficacy, durability, and operational performance of vector control interventions in laboratory, semi-field, and field settings.</p>
                    <ul class="centre-list">
                        <li>Laboratory and semi-field evaluation of tools</li>
                        <li>Community-based field trials and durability monitoring</li>
                        <li>Insecticide resistance monitoring and characterisation</li>
                        <li>Vector behaviour, ecology, and intervention interaction</li>
                        <li>Post-market surveillance; support to WHO prequalification and NMCPs</li>
                    </ul>
                    <p class="mb-0">Central role in evidence on next-generation tools and resistance management.</p>
                </div>

                <div class="centre-unit-card">
                    <h3><i class="fas fa-dna"></i> Molecular Surveillance Unit</h3>
                    <p class="unit-tagline">Strengthening Surveillance through Molecular and Genomic Evidence</p>
                    <p>Provides laboratory-based and molecular evidence for disease surveillance, resistance monitoring, and outbreak response.</p>
                    <ul class="centre-list">
                        <li>Molecular identification of vectors and pathogens</li>
                        <li>Surveillance of insecticide and drug resistance markers</li>
                        <li>Genomic and sequencing-based analyses</li>
                        <li>Diagnostic validation and laboratory quality assurance</li>
                        <li>Biobanking, sample management; support to outbreak investigation</li>
                    </ul>
                    <p class="mb-0">Strengthens integration of molecular data into routine surveillance and policy.</p>
                </div>

                <div class="centre-unit-card">
                    <h3><i class="fas fa-clipboard-list"></i> Clinical Trials Unit</h3>
                    <p class="unit-tagline">High-Quality Clinical and Community-Based Trials</p>
                    <p>Designs and implements ethically approved clinical and community-based trials for public health interventions relevant to vector-borne disease control.</p>
                    <ul class="centre-list">
                        <li>Design and coordination of clinical and field trials</li>
                        <li>Regulatory and ethics submissions and approvals</li>
                        <li>Participant recruitment, follow-up, retention; safety monitoring</li>
                        <li>Trial data management, analysis, and reporting</li>
                    </ul>
                    <p class="mb-0">All trials follow Good Clinical Practice (GCP) and national and international regulatory standards.</p>
                </div>
            </div>

            <div class="centre-section fade-in-up" id="platforms">
                <h2><i class="fas fa-flask"></i> Research Platforms and Methods</h2>
                <p>The Centre integrates multiple platforms for comprehensive evaluation:</p>
                <ul class="centre-list">
                    <li>Controlled laboratory experimentation</li>
                    <li>Semi-field and experimental hut evaluations</li>
                    <li>Community-based field studies</li>
                    <li>Entomological, epidemiological, and molecular methods</li>
                    <li>Quantitative and qualitative data collection</li>
                </ul>
                <p class="mb-0">Findings are scientifically rigorous, operationally relevant, and applicable to programme and policy decisions.</p>
            </div>

            <div class="centre-section fade-in-up" id="contribution">
                <h2><i class="fas fa-handshake"></i> Contribution to Policy and Practice</h2>
                <p class="mb-0">
                    The Centre contributes through collaboration with national malaria control programmes, technical engagement with regional and global stakeholders, contribution to guideline development, and dissemination via reports, publications, and technical briefs. Evidence supports informed choices on intervention selection, resistance management, and integrated vector control strategies.
                </p>
            </div>

            <div class="row g-4 fade-in-up" id="ethics">
                <div class="col-lg-6">
                    <div class="centre-mini-card">
                        <h3><i class="fas fa-shield-alt"></i> Ethics, Quality, and Scientific Integrity</h3>
                        <p class="mb-0">
                            All research adheres to approved protocols and national and international ethical, regulatory, and quality standards. Strong quality assurance, ethical oversight, and data integrity underpin design, implementation, analysis, and dissemination.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="centre-mini-card">
                        <h3><i class="fas fa-users-cog"></i> Leadership and Governance</h3>
                        <p class="mb-0">
                            The Centre is led by a Centre Director, with Units coordinated by Unit Heads. It reports through AIRID’s research governance structure for strategic alignment, accountability, and scientific excellence. Cross-centre collaboration is promoted to maximise multidisciplinary learning and efficient use of resources.
                        </p>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12 text-center">
                    <a href="{{ route('researchActivitiesPage') }}" class="btn btn-danger btn-lg"><i class="fas fa-flask me-2"></i>Research activities</a>
                    <a href="{{ route('researchPolicyPracticePage') }}" class="btn btn-outline-danger btn-lg ms-2"><i class="fas fa-balance-scale me-2"></i>Policy & systems research</a>
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
