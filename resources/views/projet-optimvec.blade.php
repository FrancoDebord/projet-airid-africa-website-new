@extends('index')

@section('title', 'AIRID --OPTIMVEC Project ')


@section('content')
    <div id="banner-area" class="banner-area"
        style="background-image:url({{ asset('storage/assets_vendor/images/banner/banner2_new.png') }})">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title top_title">OPTIMVEC Project</h1>

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
                    <span class="title-section" style="font-size: 1.2em; font-weight: bold">Optimising Complementary
                        Insecticide-Based Strategies for Malaria Vector Control</span>
                </div>

                <div class="col-12 mt-2">
                    <h5 class="title-section mt-2">Principal Investigator</h5>
                    <p class="text-justify mt-2">
                        Dr Corine Ngufor
                    </p>
                </div>

                 <div class="col-12">
                    <h5 class="title-section mt-2">Background</h5>
                    <p class="text-justify mt-2">
                        The OPTIMVEC project is a cutting-edge research initiative
                         designed to address the challenge of residual malaria transmission 
                         that persists during the third year after mass distribution of insecticide-treated 
                         nets (ITNs). As ITNs age and lose efficacy—especially in areas with widespread 
                         insecticide resistance—new strategies are urgently needed to maintain protection. 
                         The project aims to identify and optimise insecticide-based interventions that 
                        can complement ITNs and enhance overall vector control effectiveness.
                    </p>
                </div>




                <div class="col-12">
                    <h5 class="title-section mt-2">Project Objectives</h5>


                    <ul class="text-justify mt-2">
                        <li>
                            Assess the synergistic or antagonistic effects of combining insecticides through laboratory bioassays.
                        </li>
                        <li>
                            Evaluate the efficacy of supplementary vector control tools (e.g., spatial repellents, IRS) with aged ITNs.
                        </li>
                        <li>
                           Model the public health impact of various intervention combinations under diverse conditions.
                        </li>
                        <li>
                            Explore the influence of environmental variables and resistance on intervention outcomes.
                        </li>
                    </ul>
                </div>


                <div class="col-12">
                    <h5 class="title-section mt-2">Core Activities</h5>

                    <p class="text-justify mt-2">
                       <strong> Laboratory Research</strong>
                    </p>
                    <ul class="text-justify mt-2">
                        <li>
                            Testing insecticide combinations against both pyrethroid-susceptible and -resistant mosquitoes.
                        </li>
                        <li>
                            Synergist bioassays (e.g., PBO + pyrethroids).
                        </li>
                        <li>
                            Behavioural assays on mosquito responses to spatial repellents and ITNs.
                        </li>
                    </ul>


                    <p class="text-justify mt-2">
                       <strong>Experimental Hut Trials</strong>
                    </p>
                    <ul class="text-justify mt-2">
                        <li>
                            Pairing transfluthrin passive emanators with aged ITNs.
                        </li>
                        <li>
                            Trials in huts with different structural designs.
                        </li>
                        <li>
                            Controlled mosquito release studies with resistant and susceptible strains.
                        </li>
                    </ul>


                    <p class="text-justify mt-2">
                        <strong>Modelling & Environmental Analysis</strong>
                    </p>


                    <ul class="text-justify mt-2">
                        <li>
                            Simulations of malaria burden reduction with various intervention mixes.
                        </li>
                        <li>
                            Analysis of temperature, humidity, and housing factors.
                        </li>
                        <li>
                            Identification of optimal tool combinations for specific settings.
                        </li>

                    </ul>
                </div>


                 <div class="col-12">
                    <h5 class="title-section mt-2">AIRID’s Role</h5>

                   <p class="text-justify mt-2">
                        AIRID plays a central role in implementing experimental hut studies
                         and supporting laboratory evaluations in Benin. Its field infrastructure 
                         and expertise are essential to testing innovative strategies 
                        that can inform national and global policies.
                    </p>
                </div>


                <div class="col-12">
                    <h5 class="title-section mt-2">Partners & Funders</h5>

                    <ul class="text-justify mt-2">

                        <li>
                            Lead Institution: Centre de Recherche Entomologique de Cotonou (CREC)
                        </li>
                        <li>
                            Research Collaborator: African Institute for Research in Infectious Diseases (AIRID)
                        </li>
                        <li>
                            Modelling Consultant: Imperial College London
                        </li>
                        <li>
                            Funder: Bill & Melinda Gates Foundation
                        </li>

                    </ul>
                </div>

                <div class="col-12">
                    <h5 class="title-section mt-2">Funder</h5>

                    <ul class="text-justify mt-2">
                        <li>
                            Budget: USD 1,200,352
                        </li>
                        <li>
                            Timeline: January 2025 – December 2027
                        </li>

                    </ul>
                </div>

            </div>
        </div>
    </section>
@endsection
