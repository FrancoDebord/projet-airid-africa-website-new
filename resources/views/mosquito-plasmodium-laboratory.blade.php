@extends('index')

@section('title', 'AIRID --Mosquito Plasmodium Infection Laboratory')

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
                            <h1 class="banner-title top_title fade-in-up">Mosquito Plasmodium Infection Laboratory</h1>
                            <p class="text-white mt-3 fade-in-up" style="font-size: 1.2rem;">
                                Establishing a regional platform for controlled malaria transmission research <span style="font-style: italic">(Under Development)</span>
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
                    <i class="fas fa-microscope"></i>Mosquito Plasmodium Infection Laboratory <span style="font-style: italic; font-size: 1rem;">(Under Development)</span>
                </h2>
                <div class="section-content">
                    <p>
                        AIRID is in the process of developing a high-containment laboratory
                        dedicated to the experimental infection of mosquitoes with human malaria
                        parasites (Plasmodium falciparum and P. vivax). Once completed, this facility
                        will enable controlled, reproducible studies essential
                        for evaluating transmission-blocking interventions, malaria vaccine candidates, and antimalarial therapies.
                    </p>
                    <p>
                        Designed to meet biosafety level 2+ (BSL-2+) standards, the laboratory
                        will operate under strict containment protocols and align with WHO and
                        Good Laboratory Practice (GLP) guidelines. It will be one of the few facilities
                        of its kind in West Africa,
                        offering advanced capacity for vector–parasite interaction studies and translational malaria research.
                    </p>
                </div>
            </div>

            <div class="content-section fade-in-up">
                <h3 class="section-subtitle">Planned Research Capabilities</h3>
                <div class="section-content">
                    <ul>
                        <li>Direct Membrane Feeding Assays (DMFA): Controlled mosquito infections using gametocyte-infected blood to assess transmission potential</li>
                        <li>Direct Skin Feeding (DSF): In vivo infections under ethical approval to simulate natural transmission dynamics</li>
                        <li>Oocyst and Sporozoite Detection: Quantification through dissection, microscopy, and molecular techniques (e.g., qPCR)</li>
                        <li>Transmission-Blocking Intervention Evaluation: Testing of vaccines, drugs, and monoclonal antibodies for their ability to prevent mosquito infection</li>
                        <li>Vector–Parasite Compatibility Studies: Investigation of infection thresholds, genetic susceptibility, and vector adaptation mechanisms</li>
                    </ul>
                </div>
            </div>

            <div class="content-section fade-in-up">
                <h3 class="section-subtitle">Infrastructure (In Progress)</h3>
                <div class="section-content">
                    <p>The lab will feature:</p>
                    <ul>
                        <li>Incubators and environmental chambers for parasite development and mosquito maintenance</li>
                        <li>Membrane feeding stations with precision-controlled water baths</li>
                        <li>Dissection and microscopy suites for specimen processing</li>
                        <li>Parasite culture systems for gametocyte production</li>
                        <li>Biosafety cabinets, PPE areas, and containment zones for infection control</li>
                        <li>Real-time environmental monitoring and waste management systems for biosafety compliance</li>
                    </ul>
                </div>
            </div>

            <div class="content-section fade-in-up">
                <h3 class="section-subtitle">Why It Matters</h3>
                <div class="section-content">
                    <p>
                        The development of this facility is a major step toward making AIRID a regional leader in malaria
                        transmission research. Once operational, the laboratory will:
                    </p>
                    <ul>
                        <li>Enable local evaluation of vaccine and drug candidates</li>
                        <li>Support data generation for clinical trials and WHO policy guidance</li>
                        <li>Strengthen Africa-led contributions to global malaria elimination strategies</li>
                    </ul>
                    <p>
                        By establishing this advanced capability, AIRID is building
                        the foundation for high-impact research that will accelerate
                        innovation and help close the gap between discovery and implementation.
                    </p>
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
