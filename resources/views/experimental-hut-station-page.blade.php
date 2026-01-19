@extends('index')

@section('title', 'AIRID --Experimental Huts Station')

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
                            <h1 class="banner-title top_title fade-in-up">Our Experimental Huts Station</h1>
                            <p class="text-white mt-3 fade-in-up" style="font-size: 1.2rem;">
                                World-class semi-field research platform
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
                    <i class="fas fa-home"></i>Semi-Field Station
                </h2>
                <div class="section-content">
                    <p>
                        The Semi-Field Station at AIRID, located in Covè, Benin (📍 7.2164° N, 2.3408° E), is a
                        world-class research platform that simulates real-life environmental conditions
                        while maintaining the experimental control needed for rigorous scientific evaluation. Set
                        in a vast rice-growing region with high mosquito density, this station enables
                        semi-field trials of vector control tools under realistic ecological and household conditions.
                    </p>
                    <p>
                        It is a critical testing ground for interventions such as insecticide-treated nets (ITNs),
                        indoor residual spraying (IRS), spatial repellents, and attractive targeted
                        sugar baits (ATSBs). All studies are conducted in compliance with WHO protocols and Good
                        Laboratory Practice (GLP) standards.
                    </p>
                </div>
            </div>

            <div class="content-section fade-in-up">
                <h3 class="section-subtitle">Local Vector Population</h3>
                <div class="section-content">
                    <p>
                        Covè provides ideal conditions for semi-field testing due to its abundant,
                        free-flying mosquito population, dominated by:
                    </p>
                    <ul>
                        <li>Anopheles gambiae sensu lato, especially An. coluzzii and An. gambiae s.s.</li>
                        <li>Populations with high levels of insecticide resistance, ideal for evaluating next-generation tools</li>
                        <li>Stable year-round presence, particularly in the rainy season, due to extensive rice cultivation</li>
                    </ul>
                </div>
            </div>

            <div class="content-section fade-in-up">
                <h3 class="section-subtitle">Core Research Activities</h3>
                <div class="section-content">
                    <ul>
                        <li>Experimental hut evaluations of ITNs, IRS, spatial repellents, and innovative tools</li>
                        <li>Mosquito behavior monitoring, including host-seeking, feeding, exiting, and mortality</li>
                        <li>Longitudinal assessment of residual efficacy and insecticide performance over time</li>
                        <li>Release recapture evaluation of vector control products using mosquitoes of known characteristics</li>
                        <li>Data generation to support WHO PQT submissions, national policy development, and donor investment</li>
                    </ul>
                </div>
            </div>

            <div class="content-section fade-in-up">
                <h3 class="section-subtitle">Infrastructures</h3>
                <div class="section-content">
                    <p>AIRID's Semi-Field Station includes:</p>
                    <ul>
                        <li>84 experimental huts built to WHO standards (72 West African style, 12 Open Eave style)</li>
                        <li>Mosquito release chambers for controlled release-recapture studies</li>
                        <li>A fully equipped weather station for real-time measurement of temperature, humidity, wind speed, and rainfall</li>
                        <li>On-site data and specimen processing labs for immediate analysis</li>
                        <li>Backup power systems to ensure continuous environmental control and data recording</li>
                    </ul>
                </div>
            </div>

            <div class="content-section fade-in-up">
                <h3 class="section-subtitle">Why It Matters</h3>
                <div class="section-content">
                    <p>
                        By bridging the gap between lab and field, AIRID's Semi-Field Station delivers
                        high-quality evidence on how tools perform in real-world African settings. This evidence is critical to:
                    </p>
                    <ul>
                        <li>Inform national malaria control strategies</li>
                        <li>Support product registration and WHO prequalification</li>
                        <li>Guide donor and government investments in effective interventions</li>
                    </ul>
                    <p>
                        As a cornerstone of AIRID's research infrastructure,
                        the Semi-Field Station reflects our commitment to African-led, evidence-based
                        innovation in the fight against malaria and vector-borne diseases.
                    </p>
                </div>
            </div>

            <div class="content-section fade-in-up">
                <h3 style="font-size: 1.3rem; font-weight: 700; color: #2c3e50; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
                    <i class="fas fa-images" style="color: #c20102;"></i>Gallery
                </h3>
                <div class="image-gallery">
                    <div class="gallery-item">
                        <img src="{{ asset('storage/assets/facility/field-station/DJI_0152.jpg') }}" 
                             alt="Experimental Huts" 
                             class="gallery-image"
                             loading="lazy">
                        <div class="gallery-caption">
                            <strong>Experimental Huts</strong>
                        </div>
                    </div>
                    <div class="gallery-item">
                        <img src="{{ asset('storage/assets/facility/field-station/DJI_0160.jpg') }}" 
                             alt="Experimental Huts" 
                             class="gallery-image"
                             loading="lazy">
                        <div class="gallery-caption">
                            <strong>Experimental Huts</strong>
                        </div>
                    </div>
                    <div class="gallery-item">
                        <img src="{{ asset('storage/assets/facility/field-station/DJI_0191.jpg') }}" 
                             alt="Experimental Huts" 
                             class="gallery-image"
                             loading="lazy">
                        <div class="gallery-caption">
                            <strong>Experimental Huts</strong>
                        </div>
                    </div>
                    <div class="gallery-item">
                        <img src="{{ asset('storage/assets/facility/field-station/DJI_0170.jpg') }}" 
                             alt="Experimental Huts" 
                             class="gallery-image"
                             loading="lazy">
                        <div class="gallery-caption">
                            <strong>Experimental Huts</strong>
                        </div>
                    </div>
                    <div class="gallery-item">
                        <img src="{{ asset('storage/assets/facility/field-station/DJI_0171.jpg') }}" 
                             alt="Experimental Huts" 
                             class="gallery-image"
                             loading="lazy">
                        <div class="gallery-caption">
                            <strong>Experimental Huts</strong>
                        </div>
                    </div>
                    <div class="gallery-item">
                        <img src="{{ asset('storage/assets/facility/field-station/DJI_0173.jpg') }}" 
                             alt="Experimental Huts" 
                             class="gallery-image"
                             loading="lazy">
                        <div class="gallery-caption">
                            <strong>Experimental Huts</strong>
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
