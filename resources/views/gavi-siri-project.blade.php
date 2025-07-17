@extends('index')

@section('title', 'AIRID --GAVI-SIRI Project ')


@section('content')
    <div id="banner-area" class="banner-area"
        style="background-image:url({{ asset('storage/assets_vendor/images/banner/banner2_new.png') }})">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title top_title">GAVI-SIRI Project</h1>

                        </div>
                    </div><!-- Col end -->
                </div><!-- Row end -->
            </div><!-- Container end -->
        </div><!-- Banner text end -->
    </div><!-- Banner area end -->


    <section id="main-container" class="main-container">
        <div class="container">
            <div class="row">

                <div class="col-12">
                    <span class="title-section" style="font-size: 1.2em; font-weight: bold">Seasonal Intensification of
                        Malaria Vaccine Delivery in Benin; feasibility, impact, and cost effectiveness</span>
                </div>
                <div class="col-12    mt-3">
                    <div class="row">
                        <div class="col-12  text-center">
                            <img src="{{ asset('storage/assets/projects/gavi_siri.jpg') }}" class="img-thumbnail "
                                style="height: 420px" alt="">
                        </div>
                    </div>
                </div>

                <p class="text-justify mt-3">

                    The GAVI-SIRI project is a multi-country operational research initiative
                    evaluating a new strategy to optimize the timing of malaria vaccine delivery
                    in areas with highly seasonal malaria transmission. In Benin, the project is led
                    by the Centre de Recherche Entomologique de Cotonou (CREC) in collaboration with
                    the African Institute for Research in Infectious Diseases (AIRID) and the
                    national
                    immunisation and malaria control programmes. AIRID plays a central
                    role in coordinating implementation of field research activities.
                </p>

                <p class="text-justify mt-2">
                    The project aims to determine the feasibility, impact, and cost-effectiveness
                    of intensifying malaria vaccine delivery ahead of the rainy season
                    to enhance protection in young children.
                </p>

                <div class="col-12">
                    <h5 class="title-section mt-2">Principal Investigator</h5>
                    <p class="text-justify mt-2">
                        Dr Corine Ngufor
                    </p>
                </div>

                
                <div class="col-12">
                    <h5 class="title-section mt-2">Context</h5>


                    <p class="text-justify mt-2">
                        In regions like central Benin, where malaria cases spike during the rainy season,
                        there may be substantial benefit to aligning vaccine delivery with this high-risk
                        period. The project compares a “seasonal intensification” strategy in the
                        Dassa-Glazoué
                        health zone to standard age-based vaccination in Tchaourou. Vaccination efforts are
                        intensified
                        in May and June, and the timing of the fourth vaccine dose is adjusted to ensure
                        maximum protection
                        during peak transmission months.
                    </p>
                </div>


                <div class="col-12">
                    <h5 class="title-section mt-2">Key Objectives</h5>


                    <ul class="text-justify mt-2">
                        <li>
                            Improve malaria vaccine uptake and scheduling among children under 2
                        </li>
                        <li>
                            Enhance protection during peak malaria season
                        </li>
                        <li>
                            Assess feasibility, community acceptance, and operational
                            challenges
                        </li>
                        <li>
                            Determine the cost-effectiveness of seasonal delivery compared to routine
                            age-based vaccination
                        </li>
                    </ul>
                </div>


                <div class="col-12">
                    <h5 class="title-section mt-2">Evaluation Components</h5>

                    <ul class="text-justify mt-2">
                        <li>
                            Qualitative research with caregivers, health workers, and community leaders
                        </li>
                        <li>
                            Health facility data collection to assess malaria incidence
                        </li>
                        <li>
                            Coverage surveys to measure uptake and timing of vaccine doses
                        </li>
                        <li>
                            Cost analysis and modelling to assess financial sustainability and health
                            impact
                        </li>
                    </ul>
                </div>

                <div class="col-12">
                    <h5 class="title-section mt-2">Project Partners</h5>

                    <ul class="text-justify mt-2">
                        <li>
                            Ministry of Health (Benin)
                        </li>
                        <li>
                            Centre de Recherche Entomologique de Cotonou (CREC)
                        </li>
                        <li>
                            African Institute for Research in Infectious Diseases (AIRID)
                        </li>
                        <li>
                            London School of Hygiene & Tropical Medicine (LSHTM)
                        </li>
                        <li>
                            European Vaccine Initiative (EVI)
                        </li>
                        <li>
                            WHO/TDR
                        </li>
                        <li>
                            Université de Thiès (Senegal)
                        </li>
                        <li>
                            Université Gamal Abdel Nasser (Guinea)
                        </li>
                    </ul>
                </div>

                <div class="col-12">
                    <h5 class="title-section mt-2">Funders</h5>

                    <ul class="text-justify mt-2">
                        <li>
                            Gavi, the Vaccine Alliance
                        </li>
                        <li>
                            Global Health EDCTP3
                        </li>
                    </ul>
                </div>

                <div class="col-12">
                    <h5 class="title-section mt-2">Budget</h5>

                    <p class="text-justify mt-2">
                        USD 2,070,791
                    </p>
                </div>


                <div class="col-12">
                    <h5 class="title-section mt-2">Timeline</h5>

                    <p class="text-justify mt-2">
                        The study began in May 2025, with preliminary results expected in early 2026.
                        Outcomes will inform malaria
                        vaccine policy and delivery strategies across sub-Saharan Africa.
                    </p>
                </div>


            </div>
        </div>
    </section>
@endsection
