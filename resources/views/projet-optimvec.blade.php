@extends('index')

@section('title', 'AIRID --OPTIMVEC Project')

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
                            <h1 class="banner-title top_title fade-in-up">OPTIMVEC Project</h1>
                            <p class="text-white mt-3 fade-in-up" style="font-size: 1.2rem;">
                                Optimising Complementary Insecticide-Based Strategies for Malaria Vector Control
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
                    <i class="fas fa-chart-line"></i>Project Overview
                </h2>
                <div class="section-content">
                    <p>
                        The OPTIMVEC project is a cutting-edge research initiative
                        designed to address the challenge of residual malaria transmission 
                        that persists during the third year after mass distribution of insecticide-treated 
                        nets (ITNs). As ITNs age and lose efficacy—especially in areas with widespread 
                        insecticide resistance—new strategies are urgently needed to maintain protection. 
                        The project aims to identify and optimise insecticide-based interventions that 
                        can complement ITNs and enhance overall vector control effectiveness.
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
                <h3 class="section-subtitle">Project Objectives</h3>
                <div class="section-content">
                    <ul>
                        <li>Assess the synergistic or antagonistic effects of combining insecticides through laboratory bioassays.</li>
                        <li>Evaluate the efficacy of supplementary vector control tools (e.g., spatial repellents, IRS) with aged ITNs.</li>
                        <li>Model the public health impact of various intervention combinations under diverse conditions.</li>
                        <li>Explore the influence of environmental variables and resistance on intervention outcomes.</li>
                    </ul>
                </div>
            </div>

            <div class="content-section fade-in-up">
                <h3 class="section-subtitle">Core Activities</h3>
                <div class="section-content">
                    <div class="info-card">
                        <h4 class="info-card-title">Laboratory Research</h4>
                        <ul>
                            <li>Testing insecticide combinations against both pyrethroid-susceptible and -resistant mosquitoes.</li>
                            <li>Synergist bioassays (e.g., PBO + pyrethroids).</li>
                            <li>Behavioural assays on mosquito responses to spatial repellents and ITNs.</li>
                        </ul>
                    </div>

                    <div class="info-card">
                        <h4 class="info-card-title">Experimental Hut Trials</h4>
                        <ul>
                            <li>Pairing transfluthrin passive emanators with aged ITNs.</li>
                            <li>Trials in huts with different structural designs.</li>
                            <li>Controlled mosquito release studies with resistant and susceptible strains.</li>
                        </ul>
                    </div>

                    <div class="info-card">
                        <h4 class="info-card-title">Modelling & Environmental Analysis</h4>
                        <ul>
                            <li>Simulations of malaria burden reduction with various intervention mixes.</li>
                            <li>Analysis of temperature, humidity, and housing factors.</li>
                            <li>Identification of optimal tool combinations for specific settings.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="content-section fade-in-up">
                <h3 class="section-subtitle">AIRID's Role</h3>
                <div class="section-content">
                    <p>
                        AIRID plays a central role in implementing experimental hut studies
                        and supporting laboratory evaluations in Benin. Its field infrastructure 
                        and expertise are essential to testing innovative strategies 
                        that can inform national and global policies.
                    </p>
                </div>
            </div>

            <div class="content-section fade-in-up">
                <h3 class="section-subtitle">Partners & Funders</h3>
                <div class="section-content">
                    <ul>
                        <li>Lead Institution: Centre de Recherche Entomologique de Cotonou (CREC)</li>
                        <li>Research Collaborator: African Institute for Research in Infectious Diseases (AIRID)</li>
                        <li>Modelling Consultant: Imperial College London</li>
                        <li>Funder: Bill & Melinda Gates Foundation</li>
                    </ul>
                </div>
            </div>

            <div class="content-section fade-in-up">
                <h3 class="section-subtitle">Funder</h3>
                <div class="section-content">
                    <ul>
                        <li>Budget: USD 1,200,352</li>
                        <li>Timeline: January 2025 – December 2027</li>
                    </ul>
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
