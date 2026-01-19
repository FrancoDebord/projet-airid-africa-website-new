@extends('index')

@section('title', 'AIRID --GAVI-SIRI Project')

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
                            <h1 class="banner-title top_title fade-in-up">GAVI-SIRI Project</h1>
                            <p class="text-white mt-3 fade-in-up" style="font-size: 1.2rem;">
                                Seasonal Intensification of Malaria Vaccine Delivery in Benin; feasibility, impact, and cost effectiveness
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
                <div class="hero-image">
                    <img src="{{ asset('storage/assets/projects/gavi_siri.jpg') }}" alt="GAVI-SIRI Project">
                </div>
                <h2 class="section-title">
                    <i class="fas fa-syringe"></i>Project Overview
                </h2>
                <div class="section-content">
                    <p>
                        The GAVI-SIRI project is a multi-country operational research initiative
                        evaluating a new strategy to optimize the timing of malaria vaccine delivery
                        in areas with highly seasonal malaria transmission. In Benin, the project is led
                        by the Centre de Recherche Entomologique de Cotonou (CREC) in collaboration with
                        the African Institute for Research in Infectious Diseases (AIRID) and the
                        national immunisation and malaria control programmes. AIRID plays a central
                        role in coordinating implementation of field research activities.
                    </p>
                    <p>
                        The project aims to determine the feasibility, impact, and cost-effectiveness
                        of intensifying malaria vaccine delivery ahead of the rainy season
                        to enhance protection in young children.
                    </p>
                </div>
            </div>

            <div class="content-section fade-in-up">
                <h3 class="section-subtitle">Principal Investigator</h3>
                <div class="section-content">
                    <p>Dr Corine Ngufor</p>
                </div>
            </div>

            <div class="content-section fade-in-up">
                <h3 class="section-subtitle">Context</h3>
                <div class="section-content">
                    <p>
                        In regions like central Benin, where malaria cases spike during the rainy season,
                        there may be substantial benefit to aligning vaccine delivery with this high-risk
                        period. The project compares a "seasonal intensification" strategy in the
                        Dassa-Glazoué health zone to standard age-based vaccination in Tchaourou. Vaccination efforts are
                        intensified in May and June, and the timing of the fourth vaccine dose is adjusted to ensure
                        maximum protection during peak transmission months.
                    </p>
                </div>
            </div>

            <div class="content-section fade-in-up">
                <h3 class="section-subtitle">Key Objectives</h3>
                <div class="section-content">
                    <ul>
                        <li>Improve malaria vaccine uptake and scheduling among children under 2</li>
                        <li>Enhance protection during peak malaria season</li>
                        <li>Assess feasibility, community acceptance, and operational challenges</li>
                        <li>Determine the cost-effectiveness of seasonal delivery compared to routine age-based vaccination</li>
                    </ul>
                </div>
            </div>

            <div class="content-section fade-in-up">
                <h3 class="section-subtitle">Evaluation Components</h3>
                <div class="section-content">
                    <ul>
                        <li>Qualitative research with caregivers, health workers, and community leaders</li>
                        <li>Health facility data collection to assess malaria incidence</li>
                        <li>Coverage surveys to measure uptake and timing of vaccine doses</li>
                        <li>Cost analysis and modelling to assess financial sustainability and health impact</li>
                    </ul>
                </div>
            </div>

            <div class="content-section fade-in-up">
                <h3 class="section-subtitle">Project Partners</h3>
                <div class="section-content">
                    <ul>
                        <li>Ministry of Health (Benin)</li>
                        <li>Centre de Recherche Entomologique de Cotonou (CREC)</li>
                        <li>African Institute for Research in Infectious Diseases (AIRID)</li>
                        <li>London School of Hygiene & Tropical Medicine (LSHTM)</li>
                        <li>European Vaccine Initiative (EVI)</li>
                        <li>WHO/TDR</li>
                        <li>Université de Thiès (Senegal)</li>
                        <li>Université Gamal Abdel Nasser (Guinea)</li>
                    </ul>
                </div>
            </div>

            <div class="content-section fade-in-up">
                <h3 class="section-subtitle">Funders</h3>
                <div class="section-content">
                    <ul>
                        <li>Gavi, the Vaccine Alliance</li>
                        <li>Global Health EDCTP3</li>
                    </ul>
                </div>
            </div>

            <div class="content-section fade-in-up">
                <h3 class="section-subtitle">Budget</h3>
                <div class="section-content">
                    <p>USD 2,070,791</p>
                </div>
            </div>

            <div class="content-section fade-in-up">
                <h3 class="section-subtitle">Timeline</h3>
                <div class="section-content">
                    <p>
                        The study began in May 2025, with preliminary results expected in early 2026.
                        Outcomes will inform malaria vaccine policy and delivery strategies across sub-Saharan Africa.
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
