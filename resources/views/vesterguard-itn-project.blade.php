@extends('index')

@section('title', 'VESTERGAARD ITN Testing Project')

@section('css')
    @include('partials.modern-css')
    <style>
        .project-parallel-card {
            background: #fff;
            border-radius: 14px;
            padding: 1.5rem 1.75rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            border-left: 4px solid #c20102;
            height: 100%;
        }
        .project-parallel-card .section-subtitle { margin-bottom: 0.75rem; }
        .project-parallel-card .section-content p { font-size: var(--airid-text-size); line-height: 1.6; color: var(--airid-text-color); }
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
                            <h1 class="banner-title top_title fade-in-up">VESTERGAARD ITN Testing</h1>
                            <p class="text-white mt-3 fade-in-up" style="font-size: 1.2rem;">
                                Supporting Innovation in Vector Control: R&D Collaboration with PAMVERC-BENIN and Vestergaard Sarl
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="py-5">
        <div class="container">
            <div class="content-section fade-in-up">
                <h2 class="section-title">
                    <i class="fas fa-handshake"></i>Project Overview
                </h2>
                <div class="section-content">
                    <p>
                        AIRID, through its involvement in the Pan-African Malaria Vector Research
                        Consortium (PAMVERC), plays a key role in supporting the research and
                        development (R&D) of next-generation insecticide-treated nets (ITNs)
                        developed by Vestergaard Sarl—a global leader in disease prevention technologies.
                    </p>
                </div>
            </div>

            <div class="content-section fade-in-up">
                <h3 class="section-subtitle">What We Do</h3>
                <div class="section-content">
                    <p>
                        As part of this collaboration, AIRID conducts rigorous evaluations of
                        Vestergaard's ITN products across three major research platforms:
                    </p>
                    <ul>
                        <li>
                            <strong>Laboratory Bioassays:</strong> Controlled tests to assess the bioefficacy of Vestergaard's
                            innovative insecticide formulations against local strains of malaria vectors, including
                            resistant populations.
                        </li>
                        <li>
                            <strong>Experimental Hut Trials:</strong> Semi-field studies in purpose-built huts
                            to measure mosquito mortality, blood-feeding inhibition,
                            and deterrence in realistic exposure scenarios.
                        </li>
                        <li>
                            <strong>Community-Level Field Studies:</strong> Longitudinal evaluations of net durability, bioefficacy, and
                            community acceptance under real-world conditions, in line with WHO guidelines.
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Our Impact & Collaborative Science – deux cadres parallèles --}}
            <div class="row g-4 fade-in-up">
                <div class="col-lg-6">
                    <div class="project-parallel-card">
                        <h3 class="section-subtitle"><i class="fas fa-chart-line text-danger me-2"></i>Our Impact</h3>
                        <div class="section-content">
                            <p class="mb-0">
                                By generating high-quality data on the performance and longevity of Vestergaard ITNs, AIRID helps accelerate the development, optimization, and regulatory approval of tools that strengthen malaria control and resistance management strategies across Africa.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="project-parallel-card">
                        <h3 class="section-subtitle"><i class="fas fa-handshake text-danger me-2"></i>Collaborative Science for African Health</h3>
                        <div class="section-content">
                            <p class="mb-0">
                                This partnership reinforces AIRID's commitment to science-led innovation, evidence-based public health, and African leadership in global health R&D. Through PAMVERC and other regional networks, AIRID is advancing a shared vision for sustainable malaria control driven by African institutions and local expertise.
                            </p>
                        </div>
                    </div>
                </div>
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
