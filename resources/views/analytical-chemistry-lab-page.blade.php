@extends('index')

@section('title', 'AIRID --Analytical and Chemistry Labs')


@section('content')
    <div id="banner-area" class="banner-area"
        style="background-image:url({{ asset('storage/assets_vendor/images/banner/banner1.jpg') }})">
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
                        <strong> Establishing local capacity for chemical analysis of vector control products</strong>
                    </p>
                    <hr>

                    <p class="text-justify mt-2">

                        AIRID is currently developing a state-of-the-art <strong> Chemistry Laboratory </strong>
                        dedicated to <strong>analytical testing and quality control</strong> of public health insecticide
                         products. Once operational, this laboratory will play a critical role in supporting 
                         national and regional decision-making on the use of insecticide-treated nets (ITNs), 
                         indoor residual sprays (IRS), and other vector control
                         tools by ensuring they meet international standards for <strong>content, stability, and performance</strong>.
                    </p>
                    <p class="text-justify mt-2">
                        The facility is being designed in alignment with <strong> Good Laboratory Practice (GLP)</strong>
                         principles and <strong>WHO prequalification guidelines</strong>, positioning it as 
                        a future hub for regulatory-quality product evaluation in West Africa.
                    </p>
                </div>


                <div class="col-12">

                    <h5 class="title-section">Planned Capabilities</h5>

                    <ul class="text-justify mt-2">
                            <li>
                                <strong>High-Performance Liquid Chromatography (HPLC):</strong> Accurate measurement of active ingredients in treated materials
                            </li>
                            <li>
                                <strong>Gas Chromatography (GC):</strong> Detection of volatile compounds in formulations and environmental samples
                            </li>
                            <li>
                                <strong>Stability and degradation testing:</strong> Assessment of product durability under different temperature and humidity conditions
                            </li>
                            <li>
                                <strong>Residue analysis:</strong> Evaluation of insecticide levels in field samples, such as wall surfaces and used nets
                            </li>
                            <li>
                                <strong>Product specification verification: </strong>Ensuring compliance with international standards for insecticide-treated products
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
                       reliable chemical analysis becomes critical for <strong>product evaluation,
                        procurement assurance</strong>, and <strong>program monitoring</strong>. 
                       Once operational, AIRID’s Chemistry Laboratory will:
                    </p>

                    <ul class="text-justify mt-2">
                        <li>
                            Enhance <strong>national quality assurance capacity</strong>
                        </li>
                        <li>
                            Contribute to <strong>WHO prequalification dossiers</strong>
                        </li>
                        <li>
                            Support <strong>field trials and durability monitoring</strong>
                        </li>
                        <li>
                            Build <strong>local expertise in regulatory science</strong>
                        </li>
                    </ul>

                    <p class="text-justify mt-2">
                        By strengthening regional infrastructure, AIRID aims 
                        to ensure that only <strong>safe, effective, and high-quality products</strong>
                         reach the communities most at risk—helping to 
                        improve public health outcomes and sustain progress in malaria control.
                    </p>
                  





                </div>



            </div>
        </div>
    </section>


@endsection
