@extends('index')

@section('title', 'AIRID --Bioassay Labs')

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
                            <h1 class="banner-title top_title fade-in-up">Our Bioassay Labs</h1>
                            <p class="text-white mt-3 fade-in-up" style="font-size: 1.2rem;">
                                Insecticide Testing Laboratory
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
                    <i class="fas fa-flask"></i>Insecticide Testing Laboratory
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
                    <img src="{{ asset('storage/assets/facility/bioassay-lab/lab_nadia.jpg') }}" alt="Bioassay Lab">
                </div>
                <h3 class="section-subtitle">Overview</h3>
                <div class="section-content">
                    <p>
                        The Insecticide Bioassay Laboratory at AIRID is a core facility dedicated to evaluating the efficacy
                        of a wide range of vector control interventions under standardized laboratory conditions.
                        These include insecticide-treated nets (ITNs), indoor residual sprays (IRS),
                            attractive targeted sugar baits (ATSBs), spatial repellents, Topical repellents,
                        larvicides, and other novel tools.
                    </p>
                    <p>
                        All studies are conducted in accordance with the OECD Principles of Good Laboratory Practice
                        (GLP) and follow the World Health Organization (WHO)
                            prequalification guidelines, ensuring scientific rigour, data integrity, and regulatory
                        compliance.
                    </p>
                </div>
            </div>

            <div class="content-section fade-in-up">
                <h3 class="section-subtitle">What We Do</h3>
                <div class="section-content">
                    <ul>
                        <li>Perform WHO susceptibility bioassays (bottle bioassays and tube tests) to assess vector
                            resistance to new public health insecticides</li>
                        <li>Determine diagnostic concentrations of new public health insecticides</li>
                        <li>Evaluate regeneration time and wash resistance of new insecticide treated nets in WHO cone and
                            tunnel tests</li>
                        <li>Evaluate residual activity of IRS insecticides on different block substrates (mud, cement, wood,
                            tile etc)</li>
                        <li>Evaluate efficacy and residual activity of larvicides</li>
                        <li>Evaluate topical repellents in arm in cage experiments</li>
                        <li>Evaluate efficacy of new spatial repellent insecticides under controlled laboratory conditions.</li>
                        <li>Support product development and WHO prequalification dossiers</li>
                    </ul>
                </div>
            </div>

            <div class="content-section fade-in-up">
                <h3 class="section-subtitle">Why It Matters</h3>
                <div class="section-content">
                    <p>
                        The laboratory plays a vital role in AIRID's mission to generate high-quality,
                        policy-relevant data for national malaria control programs, international partners,
                        and product developers. It supports regulatory submissions, operational research, and innovation in
                        vector control—contributing
                        to better tools and strategies to fight vector-borne diseases.
                    </p>
                </div>
            </div>

            <div class="content-section fade-in-up">
                <h3 class="section-subtitle">Infrastructure</h3>
                <div class="section-content">
                    <p>
                        Equipped with controlled-temperature testing rooms, calibrated exposure chambers, chemical storage
                        rooms,
                        IRS block treatments rooms, fume hoods, incubators etc.
                    </p>
                </div>
                        </div>

            <div class="content-section fade-in-up">
                <h3 style="font-size: 1.3rem; font-weight: 700; color: #2c3e50; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
                    <i class="fas fa-images" style="color: #c20102;"></i>Gallery
                </h3>
                <div class="image-gallery">
                    <div class="gallery-item">
                            <img src="{{ asset('storage/assets/facility/bioassay-lab/lab_nadia.jpg') }}"
                             alt="Lab Photo" 
                             class="gallery-image"
                             loading="lazy">
                        <div class="gallery-caption">
                                <strong>Lab Photo</strong>
                        </div>
                    </div>
                    <div class="gallery-item">
                            <img src="{{ asset('storage/assets/facility/bioassay-lab/lab1.jpg') }}"
                             alt="Lab Photo" 
                             class="gallery-image"
                             loading="lazy">
                        <div class="gallery-caption">
                                <strong>Lab Photo</strong>
                        </div>
                    </div>
                    <div class="gallery-item">
                            <img src="{{ asset('storage/assets/facility/bioassay-lab/lab2.jpg') }}"
                             alt="Lab Photo" 
                             class="gallery-image"
                             loading="lazy">
                        <div class="gallery-caption">
                                <strong>Lab Photo</strong>
                        </div>
                    </div>
                    <div class="gallery-item">
                            <img src="{{ asset('storage/assets/facility/bioassay-lab/lab3.jpg') }}"
                             alt="Lab Photo" 
                             class="gallery-image"
                             loading="lazy">
                        <div class="gallery-caption">
                            <strong>Lab Photo</strong>
                        </div>
                    </div>
                    <div class="gallery-item">
                        <img src="{{ asset('storage/assets/facility/bioassay-lab/IMG_1487.jpg') }}" 
                             alt="ARM-IN-CAGE TEST" 
                             class="gallery-image"
                             loading="lazy">
                        <div class="gallery-caption">
                            <strong>ARM-IN-CAGE TEST</strong>
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
