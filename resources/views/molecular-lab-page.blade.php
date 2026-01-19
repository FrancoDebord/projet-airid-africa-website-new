@extends('index')

@section('title', 'AIRID --Molecular Labs')

@section('css')
    @include('partials.modern-css')
@endsection

@section('content')
    <div id="banner-area" class="banner-area"
        style="background-image:url({{ asset('storage/assets_vendor/images/banner/banner2_new.png') }})">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title top_title fade-in-up">Our Molecular Lab</h1>
                            <p class="text-white mt-3 fade-in-up" style="font-size: 1.2rem;">
                                Center of excellence for molecular diagnostics
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
                    <i class="fas fa-dna"></i>Molecular Laboratory
                </h2>
                <div class="section-content">
                    <p>
                        AIRID's research is supported by a growing network of specialized laboratories and field sites
                        designed to deliver high-quality, Africa-led scientific research. Each facility plays a critical role in
                        generating evidence for disease control, product evaluation, and innovation. Our facilities are staffed by dedicated
                        teams of supervisors, research assistants, and technicians who ensure operational excellence
                        and adherence to international standards.
                    </p>
                </div>
            </div>

            <div class="content-section fade-in-up">
                <div class="hero-image">
                    <img src="{{ asset('storage/assets/facility/molecular-lab/IMG_1314.jpg') }}" alt="Molecular Lab">
                </div>
                <h3 class="section-subtitle">Overview</h3>
                <div class="section-content">
                    <p>
                        The Molecular Laboratory at AIRID serves as a center of excellence for the detection,
                        identification, and genetic characterization of pathogens and vectors. By leveraging advanced
                        molecular tools and high-throughput technologies, the laboratory supports
                        research in epidemiology, disease surveillance, vector resistance, and product validation.
                    </p>
                    <p>
                        All procedures are conducted in compliance with international quality standards,
                        including Good Laboratory Practice (GLP), and aligned with WHO protocols
                        for molecular diagnostics and resistance monitoring. The lab plays a pivotal role in AIRID's mission
                        to deliver data that informs control strategies and strengthens public health programs across
                        Africa.
                    </p>
                </div>
            </div>

            <div class="content-section fade-in-up">
                <h3 class="section-subtitle">Key Activities</h3>
                <div class="section-content">
                    <ul>
                        <li><strong>PCR and quantitative PCR (qPCR)</strong> for detecting Plasmodium spp., arboviruses
                            (e.g., dengue, Zika), and other infectious agents</li>
                        <li><strong>Genotyping and sequencing</strong> to differentiate vector species and detect
                            resistance mutations (e.g., kdr, ace-1, metabolic markers)</li>
                        <li><strong>Gene expression studies</strong> to explore mechanisms of resistance or infection
                            response</li>
                        <li><strong>Knockdown and validation studies</strong> using RNAi and CRISPR tools (in development)</li>
                        <li><strong>DNA and RNA extraction</strong>, quantification, and integrity assessments</li>
                        <li><strong>Molecular quality control</strong> for cross-contamination prevention, reference sample
                            validation, and reagent performance</li>
                    </ul>
                </div>
            </div>

            <div class="content-section fade-in-up">
                <h3 class="section-subtitle">Infrastructure</h3>
                <div class="section-content">
                    <p>The Molecular Laboratory is fully equipped to handle sensitive, high-volume analyses and includes:</p>
                    <ul>
                        <li><strong>Thermocyclers and real-time qPCR machines</strong></li>
                        <li><strong>Gel electrophoresis systems</strong> for nucleic acid visualization</li>
                        <li><strong>Biosafety cabinets (Class II)</strong> for safe sample handling</li>
                        <li><strong>Fluorimeters and spectrophotometers</strong> for nucleic acid quantification</li>
                        <li><strong>Cold storage units</strong> (refrigerators, freezers, -80°C) for sample and reagent
                            preservation</li>
                        <li><strong>Dedicated clean rooms</strong> and unidirectional workflow systems to minimize
                            contamination risk</li>
                    </ul>
                </div>
            </div>

            <div class="content-section fade-in-up">
                <h3 class="section-subtitle">Why It Matters</h3>
                <div class="section-content">
                    <p>
                        The Molecular Laboratory provides the scientific foundation for many of
                        AIRID's programs—from monitoring drug and insecticide resistance, to validating
                        diagnostic tools and tracking disease transmission. Its ability to produce precise,
                        rapid, and reproducible results enhances data-driven decision-making for
                        national control programs and international partners.
                    </p>
                    <p>
                        By integrating molecular biology with field studies and epidemiological data,
                        AIRID bridges the gap between bench science and real-world application—supporting
                        the continent's capacity to detect, monitor, and respond to infectious disease threats.
                    </p>
                </div>
            </div>

            <div class="content-section fade-in-up">
                <h3 style="font-size: 1.3rem; font-weight: 700; color: #2c3e50; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
                    <i class="fas fa-images" style="color: #c20102;"></i>Gallery
                </h3>
                <div class="image-gallery">
                    <div class="gallery-item">
                        <img src="{{ asset('storage/assets/facility/molecular-lab/IMG_1320.jpg') }}" 
                             alt="Molecular Lab Entrance" 
                             class="gallery-image"
                             loading="lazy">
                        <div class="gallery-caption">
                            <strong>Molecular Lab Entrance</strong>
                        </div>
                    </div>
                    <div class="gallery-item">
                        <img src="{{ asset('storage/assets/facility/molecular-lab/IMG_1307.jpg') }}" 
                             alt="Molecular Lab QuantStudio" 
                             class="gallery-image"
                             loading="lazy">
                        <div class="gallery-caption">
                            <strong>Molecular Lab QuantStudio</strong>
                        </div>
                    </div>
                    <div class="gallery-item">
                        <img src="{{ asset('storage/assets/facility/molecular-lab/IMG_1314.jpg') }}" 
                             alt="Molecular Lab Installations" 
                             class="gallery-image"
                             loading="lazy">
                        <div class="gallery-caption">
                            <strong>Molecular Lab Installations</strong>
                        </div>
                    </div>
                    <div class="gallery-item">
                        <img src="{{ asset('storage/assets/facility/molecular-lab/IMG_1301.jpg') }}" 
                             alt="Molecular Lab Installations" 
                             class="gallery-image"
                             loading="lazy">
                        <div class="gallery-caption">
                            <strong>Molecular Lab Installations</strong>
                        </div>
                    </div>
                    <div class="gallery-item">
                        <img src="{{ asset('storage/assets/facility/molecular-lab/IMG_1300.jpg') }}" 
                             alt="Molecular Lab Installations" 
                             class="gallery-image"
                             loading="lazy">
                        <div class="gallery-caption">
                            <strong>Molecular Lab Installations</strong>
                        </div>
                    </div>
                    <div class="gallery-item">
                        <img src="{{ asset('storage/assets/facility/molecular-lab/IMG_1303.jpg') }}" 
                             alt="Molecular Lab Installations" 
                             class="gallery-image"
                             loading="lazy">
                        <div class="gallery-caption">
                            <strong>Molecular Lab Installations</strong>
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
