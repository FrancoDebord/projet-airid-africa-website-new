@extends('index')

@section('title', 'ATSB Project')

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
                            <h1 class="banner-title top_title fade-in-up">ATSB Project</h1>
                            <p class="text-white mt-3 fade-in-up" style="font-size: 1.2rem;">
                                Addressing Key Biological Knowledge Gaps Related to the Attractive Targeted Sugar Bait (ATSB) Vector Control Paradigm
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
                    <i class="fas fa-flask"></i>Project Overview
                </h2>
                <div class="section-content">
                    <p>
                        AIRID, in partnership with CREC-LSHTM and global
                        collaborators, is conducting a major research initiative
                        to investigate the biological factors that influence the success
                        of Attractive Targeted Sugar Baits (ATSBs)—a novel vector control tool
                        designed to kill mosquitoes seeking sugar meals. While previous trials
                        in Kenya, Mali, and Zambia showed limited impact on malaria incidence,
                        this new project aims to generate critical evidence
                        to determine whether continued investment in ATSBs is justified.
                    </p>
                </div>
            </div>

            <div class="content-section fade-in-up">
                <h3 class="section-subtitle">Location</h3>
                <div class="section-content">
                    <p>Benin (Cotonou, Zogbodomey, Bassila)</p>
                </div>
            </div>

            <div class="content-section fade-in-up">
                <h3 class="section-subtitle">Principal Investigator</h3>
                <div class="section-content">
                    <p>Dr Corine Ngufor</p>
                </div>
            </div>

            <div class="content-section fade-in-up">
                <h3 class="section-subtitle">Partners</h3>
                <div class="section-content">
                    <ul>
                        <li>London School of Hygiene & Tropical Medicine (LSHTM), UK</li>
                        <li>Kenya Medical Research Institute (KEMRI)</li>
                        <li>International Centre of Insect Physiology and Ecology (ICIPE), Kenya</li>
                        <li>Wagman Global Health Consulting, USA</li>
                        <li>Funded by: Bill & Melinda Gates Foundation</li>
                    </ul>
                </div>
            </div>

            <div class="content-section fade-in-up">
                <h3 class="section-subtitle">Funder</h3>
                <div class="section-content">
                    <p>Gates Foundation through the Innovative Vector Control Consortium (IVCC)</p>
                </div>
            </div>

            <div class="content-section fade-in-up">
                <h3 class="section-subtitle">Project Objectives</h3>
                <div class="section-content">
                    <p>The study aims to answer three key questions:</p>
                    <ol>
                        <li>How frequently do malaria mosquitoes feed on ATSBs under laboratory and field conditions?</li>
                        <li>How does environmental vegetation (i.e. natural sugar sources) influence bait station attractiveness and feeding rates?</li>
                        <li>How far can mosquitoes be attracted to bait stations under realistic conditions?</li>
                    </ol>
                </div>
            </div>

            <div class="content-section fade-in-up">
                <h3 class="section-subtitle">Research Activities</h3>
                <div class="section-content">
                    <p>This Project is structured into 3 Work packages:</p>
                    
                    <div class="info-card">
                        <h4 class="info-card-title">Work Package 1: Laboratory and Semi-Field Studies</h4>
                        <ul>
                            <li>Laboratory assays to validate sugar bait prototypes using resistant and susceptible mosquito strains in Benin.</li>
                            <li>Semi-field experimental hut trials assessing how mosquito age, physiological state, and human host presence affect bait feeding rates.</li>
                        </ul>
                    </div>

                    <div class="info-card">
                        <h4 class="info-card-title">Work Package 2: Village-Based Trials</h4>
                        <ul>
                            <li>Conducted in two ecologically distinct areas:
                                <ul>
                                    <li>Zogbodomey (high vegetation)</li>
                                    <li>Bassila (low vegetation)</li>
                                </ul>
                            </li>
                            <li>Bait stations placed in households to evaluate feeding rates in natural settings.</li>
                            <li>Analysis of mosquito species, Plasmodium infection, insecticide resistance, and plant meal sources.</li>
                        </ul>
                    </div>

                    <div class="info-card">
                        <h4 class="info-card-title">Work Package 3: ASB Attraction Distance</h4>
                        <ul>
                            <li>Use of sticky traps placed around baited tents to measure how far mosquitoes are attracted to sugar baits.</li>
                            <li>Comparison of attraction in high vs. low vegetation areas and with/without a human host.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="content-section fade-in-up">
                <h3 class="section-subtitle">Impact</h3>
                <div class="section-content">
                    <p>
                        This research will fill key biological knowledge
                        gaps around mosquito sugar-feeding behaviour and the
                        field performance of ATSBs. Findings will help determine whether ATSBs should be
                        advanced as a new class of malaria vector control tools in Africa.
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
