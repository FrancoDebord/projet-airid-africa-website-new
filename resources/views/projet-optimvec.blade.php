@extends('index')

@section('title', 'AIRID --OPTIMVEC Project ')


@section('content')
    <div id="banner-area" class="banner-area"
        style="background-image:url({{ asset('storage/assets_vendor/images/banner/banner1.jpg') }})">
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
                    <span class="title-section" style="font-size: 1.2em; font-weight: bold">Optimizing Vector Control
                        Through Strategic Intervention Combinations</span>
                </div>
               

                <p class="text-justify mt-3">

                    The <strong>OPTIMVEC project</strong> is a cutting-edge research initiative designed to address
                    the challenge of <strong>residual malaria transmission</strong> during the third year after mass
                    distribution of insecticide-treated nets (ITNs). In <strong>Benin</strong>, the project is led by
                    the <strong>Centre de Recherche Entomologique de Cotonou (CREC)</strong> in collaboration with
                    the <strong>African Institute for Research in Infectious Diseases (AIRID)</strong>, with modelling
                    support from <strong>Imperial College London</strong>.
                </p>

                <p class="text-justify mt-2">
                    The project investigates the <strong>effectiveness, interaction, and public health value</strong> of
                    deploying additional indoor vector control tools—such as spatial repellents, IRS,
                    and treated wall linings—alongside <strong>aged (24-month-old) ITNs</strong>,
                    with the goal of improving protection during the later phase of the ITN coverage cycle.
                </p>

                <div class="col-12">
                    <h5 class="title-section mt-2">Project Objectives</h5>


                    <ul class="text-justify mt-2">
                        <li>
                            Assess <strong>synergistic or antagonistic effects</strong> of combining insecticide classes
                            using laboratory bioassays
                        </li>
                        <li>
                            Evaluate the <strong>efficacy of additional vector control tools</strong> (e.g. spatial
                            repellents, IRS) when paired
                            with aged ITNs through <strong> semi-field and experimental hut trials</strong>
                        </li>
                        <li>
                            Use <strong>mathematical modelling</strong> to project the <strong>public health impact</strong>
                            of various
                            intervention combinations under different ecological and housing conditions
                        </li>
                    </ul>
                </div>


                <div class="col-12">
                    <h5 class="title-section mt-2">Core Activities</h5>

                    <p class="text-justify mt-2">
                        <strong>Laboratory Research</strong>
                    </p>
                    <ul class="text-justify mt-2">
                        <li>
                            Susceptibility testing of local Anopheles vectors to transfluthrin
                        </li>
                        <li>
                            Evaluation of synergism between PBO and pyrethroids
                        </li>
                        <li>
                            Behavioural assays on interactions between spatial repellents and next-gen ITNs
                        </li>
                    </ul>


                    <p class="text-justify mt-2">
                        <strong>Semi-Field & Experimental Trials</strong>
                    </p>
                    <ul class="text-justify mt-2">
                        <li>
                            Release-recapture studies with resistant mosquitoes
                        </li>
                        <li>
                            Experimental hut comparisons across different hut designs (open vs. closed eaves)
                        </li>
                        <li>
                            Assessment of complementary use of IRS and SRs with 24-month-old ITNs
                        </li>
                    </ul>


                    <p class="text-justify mt-2">
                        <strong>Modelling & Environmental Analysis</strong>
                    </p>


                    <ul class="text-justify mt-2">
                        <li>
                            Simulation of malaria burden reduction under various product mixes
                        </li>
                        <li>
                            Evaluation of how <strong>temperature, humidity</strong>, and <strong>housing types</strong> affect intervention performance
                        </li>
                       
                    </ul>
                </div>


               

                <div class="col-12">
                    <h5 class="title-section mt-2">Project Partners</h5>

                    <ul class="text-justify mt-2">
                      
                        <li>
                            Centre de Recherche Entomologique de Cotonou (CREC) – Lead Institution
                        </li>
                        <li>
                            African Institute for Research in Infectious Diseases (AIRID) – Research Collaborator
                        </li>
                        <li>
                            Imperial College London – Modelling Consultant
                        </li>
                        
                    </ul>
                </div>

                <div class="col-12">
                    <h5 class="title-section mt-2">Funder</h5>

                    <ul class="text-justify mt-2">
                        <li>
                            <strong>Gates Foundation</strong>
                        </li>
                       
                    </ul>
                </div>

                


                <div class="col-12">
                    <h5 class="title-section mt-2">Budget</h5>

                    <p class="text-justify mt-2">
                       <strong>USD 1,200,352</strong>
                    </p>
                </div>

                <div class="col-12">
                    <h5 class="title-section mt-2">Timeline</h5>

                    <p class="text-justify mt-2">
                        <strong>January 2025 – December 2027</strong>
                    </p>
                </div>


            </div>
        </div>
    </section>
@endsection
