@extends('index')

@section('title', 'AIRID --DuraNet® Plus Multi-Country Durability Study Project')

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
                            <h1 class="banner-title top_title fade-in-up">DuraNet® Plus Multi-Country Durability Study Project</h1>
                            <p class="text-white mt-3 fade-in-up" style="font-size: 1.2rem;">
                                Evaluating the longevity and efficacy of next-generation mosquito nets
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
                    <i class="fas fa-project-diagram"></i>Project Overview
                </h2>
                <div class="section-content">
                    <p>
                        The DuraNet® Plus Durability Study is a major multi-country
                        operational research project evaluating the long-term physical
                        and insecticidal durability of DuraNet® Plus—a WHO-prequalified
                        long-lasting insecticidal net (LLIN) that combines alpha-cypermethrin
                        and piperonyl butoxide (PBO) to improve protection against pyrethroid-resistant malaria
                        vectors.
                    </p>
                    <p>
                        The study is conducted across Benin, Cameroon, and Tanzania,
                        representing diverse malaria transmission settings in West, Central,
                        and East Africa. It compares the performance of DuraNet® Plus to a standard
                        pyrethroid-only LLIN (DuraNet®) over a three-year period of household use.
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
                <h3 class="section-subtitle">Role of AIRID</h3>
                <div class="section-content">
                    <p>
                        AIRID is a core partner in this multi-country study, contributing
                        to field implementation, entomological evaluations, and cross-site
                        coordination. The experimental hut trials in Benin—used to assess bioefficacy
                        under natural conditions—are conducted at AIRID's Semi-Field Station in Covè.
                    </p>
                </div>
            </div>

            <div class="content-section fade-in-up">
                <h3 class="section-subtitle">Lead Partner</h3>
                <div class="section-content">
                    <p>
                        PAMVERC-BENIN (Pan-African Malaria Vector Research Consortium)
                        serves as the lead partner, coordinating study design, data quality assurance,
                        and overall project implementation across countries.
                    </p>
                </div>
            </div>

            <div class="content-section fade-in-up">
                <h3 class="section-subtitle">Study Objectives</h3>
                <div class="section-content">
                    <ul>
                        <li>Assess net attrition, fabric integrity, insecticidal content, and bioefficacy over time</li>
                        <li>Compare the durability and effectiveness of DuraNet® Plus to conventional pyrethroid-only LLINs</li>
                        <li>Monitor PBO performance against resistant mosquito populations</li>
                        <li>Provide high-quality evidence to guide procurement and policy decisions at national and global levels</li>
                    </ul>
                </div>
            </div>

            <div class="content-section fade-in-up">
                <h3 class="section-subtitle">Evaluation Components</h3>
                <div class="section-content">
                    <ul>
                        <li>Household surveys to monitor net usage, wear-and-tear, and user acceptability</li>
                        <li>Chemical analysis and bioassays to assess active ingredient content and mosquito knockdown</li>
                        <li>Experimental hut trials with free-flying resistant mosquitoes</li>
                        <li>Qualitative research on user perception and behaviour</li>
                    </ul>
                </div>
            </div>

            <div class="content-section fade-in-up">
                <h3 class="section-subtitle">Study Locations</h3>
                <div class="section-content">
                    <ul>
                        <li>Benin – Zakpota District</li>
                        <li>Cameroon – Mbalmayo District</li>
                        <li>Tanzania – Muheza District</li>
                    </ul>
                    <p>
                        Each country includes approximately 1,800 households, with two follow-up cohorts 
                        (non-destructive and destructive sampling) monitored over 36 months.
                    </p>
                </div>
            </div>

            <div class="content-section fade-in-up">
                <h3 class="section-subtitle">Project Partners</h3>
                <div class="section-content">
                    <ul>
                        <li>Pan-African Malaria Vector Research Consortium PAMVERC-BENIN (Lead)</li>
                        <li>African Institute for Research in Infectious Diseases (AIRID)</li>
                        <li>Centre de Recherche Entomologique de Cotonou (CREC), Benin</li>
                        <li>Centre for Research in Infectious Diseases (CRID), Cameroon</li>
                        <li>National Institute for Medical Research (NIMR), Tanzania</li>
                        <li>Shobikaa Impex Pvt. Ltd. (Product manufacturer and funder)</li>
                    </ul>
                </div>
            </div>

            <div class="content-section fade-in-up">
                <h3 class="section-subtitle">Timeline</h3>
                <div class="section-content">
                    <p>
                        2023–2025 – Ongoing follow-up and data collection<br>
                        Final results expected by late 2025
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
