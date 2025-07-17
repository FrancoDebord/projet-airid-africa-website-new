@extends('index')

@section('title', 'AIRID --Analytical and Chemistry Labs')


@section('content')
    <div id="banner-area" class="banner-area"
        style="background-image:url({{ asset('storage/assets_vendor/images/banner/banner2_new.png') }})">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title top_title">Mosquito Plasmodium Infection Laboratory</h1>
                           
                        </div>
                    </div><!-- Col end -->
                </div><!-- Row end -->
            </div><!-- Container end -->
        </div><!-- Banner text end -->
    </div><!-- Banner area end -->

    <section class="content main-container">
        <div class="container">
            <div class="row">

                <div class="col-12 mt-2">
                    <h4 class="text-bold border p-3 text-center text-danger">
                        Mosquito Plasmodium Infection Laboratory <span style="font-style: italic">(Under Development)</span>
                    </h4>

                    <hr>

                    <p class="mt-3 text-justify">
                        <strong> Establishing a regional platform for controlled malaria transmission research </strong>
                    </p>
                    <hr>

                    <p class="text-justify mt-2">

                       AIRID is in the process of developing a high-containment laboratory
                        dedicated to the experimental infection of mosquitoes with human malaria 
                        parasites (Plasmodium falciparum and P. vivax). Once completed, this facility
                         will enable controlled, reproducible studies essential
                        for evaluating transmission-blocking interventions, malaria vaccine candidates, and antimalarial therapies.
                    </p>
                    <p class="text-justify mt-2">
                       Designed to meet biosafety level 2+ (BSL-2+) standards, the laboratory
                        will operate under strict containment protocols and align with WHO and 
                        Good Laboratory Practice (GLP) guidelines. It will be one of the few facilities
                         of its kind in West Africa,
                        offering advanced capacity for vector–parasite interaction studies  and translational malaria research.
                    </p>
                </div>


                <div class="col-12">

                    <h5 class="title-section">Planned Research Capabilities</h5>

                    <ul class="text-justify mt-2">
                            <li>
                                Direct Membrane Feeding Assays (DMFA): Controlled mosquito infections using gametocyte-infected blood to assess transmission potential
                            </li>
                            <li>
                                Direct Skin Feeding (DSF): In vivo infections under ethical approval to simulate natural transmission dynamics
                            </li>
                            <li>
                                Oocyst and Sporozoite Detection: Quantification through dissection, microscopy, and molecular techniques (e.g., qPCR)
                            </li>
                            <li>
                                Transmission-Blocking Intervention Evaluation: Testing of vaccines, drugs, and monoclonal antibodies for their ability to prevent mosquito infection
                            </li>
                            <li>
                                Vector–Parasite Compatibility Studies: Investigation of infection thresholds, genetic susceptibility, and vector adaptation mechanisms
                            </li>
                    </ul>


                    <h5 class="title-section">Infrastructure (In Progress)</h5>

                    <p class="text-justify mt-2">
                       The lab will feature: 
                    </p>
                    <ul class="text-justify mt-2">
                        <li>
                            Incubators and environmental chambers for parasite development and mosquito maintenance
                        </li>
                        <li>
                           Membrane feeding stations with precision-controlled water baths
                        </li>
                        <li>
                           Dissection and microscopy suites for specimen processing
                        </li>
                        <li>
                            Parasite culture systems for gametocyte production
                        </li>
                        <li>
                            Biosafety cabinets, PPE areas, and containment zones for infection control
                        </li>
                        <li>
                            Real-time environmental monitoring  and waste management systems for biosafety compliance
                        </li>
                      
                    </ul>

                    <h5 class="title-section mt-1">Why It matters</h5>

                    <p class="text-justify mt-2">
                     The development of this facility is a major step toward making AIRID a regional leader in malaria 
                     transmission research. Once operational, the laboratory will:
                    </p>

                    <ul class="text-justify mt-2">
                        <li>
                            Enable local evaluation of vaccine and drug candidates
                        </li>
                        <li>
                            Support data generation for clinical trials and WHO policy guidance
                        </li>
                        <li>
                            Strengthen Africa-led contributions to global malaria elimination strategies
                        </li>
                       
                    </ul>

                    <p class="text-justify mt-2">
                       By establishing this advanced capability, AIRID is building 
                       the foundation for high-impact research that will accelerate 
                       innovation and help close the gap between discovery and implementation.
                    </p>
                  





                </div>



            </div>
        </div>
    </section>


@endsection
