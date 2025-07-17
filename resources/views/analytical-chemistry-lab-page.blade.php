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
                            <h1 class="banner-title top_title">Our Analytical and Chemistry Lab</h1>
                            {{-- <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Our Analytical and Chemistry Lab</a></li>
                                </ol>
                            </nav> --}}
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
                        Chemistry Laboratory <span style="font-style: italic">(Under Development)</span>
                    </h4>

                    <hr>

                    <p class="mt-3 text-justify">
                       <strong>  Establishing local capacity for chemical analysis of vector control products </strong>
                    </p>
                    <hr>

                    <p class="text-justify mt-2">

                        AIRID is currently developing a state-of-the-art  Chemistry Laboratory 
                        dedicated to analytical testing and quality control of public health insecticide
                         products. Once operational, this laboratory will play a critical role in supporting 
                         national and regional decision-making on the use of insecticide-treated nets (ITNs), 
                         indoor residual sprays (IRS), and other vector control
                         tools by ensuring they meet international standards for content, stability, and performance.
                    </p>
                    <p class="text-justify mt-2">
                        The facility is being designed in alignment with  Good Laboratory Practice (GLP)
                         principles and WHO prequalification guidelines, positioning it as 
                        a future hub for regulatory-quality product evaluation in West Africa.
                    </p>
                </div>


                <div class="col-12">

                    <h5 class="title-section">Planned Capabilities</h5>

                    <ul class="text-justify mt-2">
                            <li>
                                High-Performance Liquid Chromatography (HPLC): Accurate measurement of active ingredients in treated materials
                            </li>
                            <li>
                                Gas Chromatography (GC): Detection of volatile compounds in formulations and environmental samples
                            </li>
                            <li>
                                Stability and degradation testing: Assessment of product durability under different temperature and humidity conditions
                            </li>
                            <li>
                                Residue analysis: Evaluation of insecticide levels in field samples, such as wall surfaces and used nets
                            </li>
                            <li>
                                Product specification verification: Ensuring compliance with international standards for insecticide-treated products
                            </li>
                    </ul>


                    <h5 class="title-section">Infrastructure (In Progress)</h5>

                    <p class="text-justify mt-2">
                        The lab will be equipped with: 
                    </p>
                    <ul class="text-justify mt-2">
                        <li>
                            HPLC and GC systems
                        </li>
                        <li>
                            Fume hoods and chemical-resistant benches
                        </li>
                        <li>
                            Precision balances, pipettes, and sample prep equipment
                        </li>
                        <li>
                            Cold storage and desiccation chambers
                        </li>
                        <li>
                            Calibration tools and quality control systems
                        </li>
                        <li>
                            Dedicated areas for reagent handling and contamination prevention
                        </li>
                      
                    </ul>

                    <h5 class="title-section mt-1">Why It matters</h5>

                    <p class="text-justify mt-2">
                       As countries scale up next-generation vector control tools, 
                       reliable chemical analysis becomes critical for product evaluation,
                        procurement assurance, and program monitoring. 
                       Once operational, AIRID’s Chemistry Laboratory will:
                    </p>

                    <ul class="text-justify mt-2">
                        <li>
                            Enhance national quality assurance capacity
                        </li>
                        <li>
                            Contribute to WHO prequalification dossiers
                        </li>
                        <li>
                            Support field trials and durability monitoring
                        </li>
                        <li>
                            Build local expertise in regulatory science
                        </li>
                    </ul>

                    <p class="text-justify mt-2">
                        By strengthening regional infrastructure, AIRID aims 
                        to ensure that only safe, effective, and high-quality products
                         reach the communities most at risk—helping to 
                        improve public health outcomes and sustain progress in malaria control.
                    </p>
                  





                </div>



            </div>
        </div>
    </section>


@endsection
