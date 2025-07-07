@extends('index')

@section('title', 'AIRID --GAVI-SIRI Project ')


@section('content')
    <div id="banner-area" class="banner-area"
        style="background-image:url({{ asset('storage/assets_vendor/images/banner/banner1.jpg') }})">
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

                    The <strong>GAVI-SIRI</strong> project is a multi-country operational research initiative
                    evaluating a new strategy to optimize the timing of malaria vaccine delivery
                    in areas with highly seasonal malaria transmission. In <strong>Benin</strong>, the project is led
                    by the <strong>Centre de Recherche Entomologique de Cotonou (CREC)</strong> in collaboration with
                    the <strong>African Institute for Research in Infectious Diseases (AIRID)</strong> and the
                    <strong>national
                        immunisation and malaria control programmes</strong>. AIRID plays a central
                    role in coordinating <strong>implementation of field research activities.</strong>
                </p>

                <p class="text-justify mt-2">
                    The project aims to determine the feasibility, impact, and cost-effectiveness
                    of intensifying malaria vaccine delivery ahead of the rainy season
                    to enhance protection in young children.
                </p>

                <div class="col-12">
                    <h5 class="title-section mt-2">Context</h5>


                    <p class="text-justify mt-2">
                        In regions like central Benin, where malaria cases spike during the rainy season,
                        there may be substantial benefit to aligning vaccine delivery with this high-risk
                        period. The project compares a <strong>“seasonal intensification”</strong> strategy in the
                        <strong>Dassa-Glazoué </strong>
                        health zone to standard age-based vaccination in <strong>Tchaourou</strong>. Vaccination efforts are
                        intensified
                        in May and June, and the timing of the <strong>fourth vaccine dose </strong>is adjusted to ensure
                        maximum protection
                        during peak transmission months.
                    </p>
                </div>


                <div class="col-12">
                    <h5 class="title-section mt-2">Key Objectives</h5>


                    <ul class="text-justify mt-2">
                        <li>
                            Improve malaria vaccine <strong>uptake and scheduling</strong> among children under 2
                        </li>
                        <li>
                            Enhance <strong>protection during peak malaria season</strong>
                        </li>
                        <li>
                            Assess <strong>feasibility, community acceptance</strong>, and <strong>operational
                                challenges</strong>
                        </li>
                        <li>
                            Determine the <strong>cost-effectiveness</strong> of seasonal delivery compared to routine
                            age-based vaccination
                        </li>
                    </ul>
                </div>


                <div class="col-12">
                    <h5 class="title-section mt-2">Evaluation Components</h5>

                    <ul class="text-justify mt-2">
                        <li>
                            <strong>Qualitative research</strong> with caregivers, health workers, and community leaders
                        </li>
                        <li>
                            <strong>Health facility data collection</strong> to assess malaria incidence
                        </li>
                        <li>
                            <strong>Coverage surveys</strong> to measure uptake and timing of vaccine doses
                        </li>
                        <li>
                            <strong>Cost analysis and modelling</strong> to assess financial sustainability and health
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
                        <strong>Gavi, the Vaccine Alliance</strong>
                       </li>
                       <li>
                        <strong>Global Health EDCTP3</strong>
                       </li>
                    </ul>
                </div>

                <div class="col-12">
                    <h5 class="title-section mt-2">Funders</h5>

                    <ul class="text-justify mt-2">
                       <li>
                        <strong>Gavi, the Vaccine Alliance</strong>
                       </li>
                       <li>
                        <strong>Global Health EDCTP3</strong>
                       </li>
                    </ul>
                </div>


                <div class="col-12">
                    <h5 class="title-section mt-2">Timeline</h5>

                    <p class="text-justify mt-2">
                     The study began in <strong>May 2025</strong>, with preliminary results expected in <strong> early 2026</strong>.
                      Outcomes will inform malaria 
                     vaccine policy and delivery strategies across sub-Saharan Africa.
                    </p>
                </div>


            </div>
        </div>
    </section>
@endsection
