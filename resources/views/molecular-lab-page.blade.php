@extends('index')

@section('title', 'AIRID --Molecular Labs')


@section('content')
    <div id="banner-area" class="banner-area"
        style="background-image:url({{ asset('storage/assets_vendor/images/banner/banner2_new.png') }})">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title top_title">Our Molecular Lab</h1>
                            {{-- <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Our Molecular Lab</a></li>
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
                    <h4 class="text-bold border p-3 text-center text-danger">Molecular Laboratory</h4>

                    <p class="mt-3 text-justify">
                        AIRID’s research is supported by a growing network of specialized laboratories and field sites
                        designed to
                        deliver high-quality, Africa-led scientific research. Each facility plays a critical role in
                        generating evidence
                        for disease control, product evaluation, and innovation. Our facilities are staffed by dedicated
                        teams of supervisors,
                        research assistants, and technicians who ensure operational excellence
                        and adherence to international standards.
                    </p>
                </div>

                <div class="col-12">


                    <div class=" col-12  text-center">
                        <img src="{{ asset('storage/assets/facility/molecular-lab/IMG_1314.jpg') }}"
                            class=" img-research-activities " alt="">
                    </div>

                    <h5 class="title-section">Overview</h5>

                    <p class="text-justify mt-2">
                        The Molecular Laboratory at AIRID serves as a center of excellence for the detection,
                        identification, and genetic characterization of pathogens and vectors. By leveraging advanced
                        molecular tools and high-throughput technologies, the laboratory supports
                        research in <strong>epidemiology, disease surveillance, vector resistance, and product
                            validation</strong>.
                    </p>


                    <p class="text-justify mt-2">
                        All procedures are conducted in compliance with <strong>international quality standards</strong>,
                        including <strong>Good Laboratory Practice (GLP)</strong>, and aligned with <strong>WHO protocols
                            for molecular
                            diagnostics and resistance monitoring</strong>. The lab plays a pivotal role in AIRID’s mission
                        to deliver data that informs control strategies and strengthens public health programs across
                        Africa.
                    </p>


                    <h5 class="title-section">Key Activities</h5>

                    <ul class="text-justify mt-2">
                        <li>
                            <strong>PCR and quantitative PCR (qPCR)</strong> for detecting Plasmodium spp., arboviruses
                            (e.g., dengue, Zika), and other infectious agents
                        </li>
                        <li>
                            <strong>Genotyping and sequencing </strong> to differentiate vector species and detect
                            resistance mutations (e.g., kdr, ace-1, metabolic markers)
                        </li>
                        <li>
                            <strong>Gene expression studies</strong> to explore mechanisms of resistance or infection
                            response
                        </li>
                        <li>
                            <strong>Knockdown and validation studies</strong> using RNAi and CRISPR tools (in development)
                        </li>
                        <li>
                            <strong>DNA and RNA extraction</strong>, quantification, and integrity assessments
                        </li>
                        <li>
                            <strong>Molecular quality control</strong> for cross-contamination prevention, reference sample
                            validation, and reagent performance
                        </li>
                    </ul>

                    <h5 class="title-section">Infrastructure</h5>

                    <p class="text-justify mt-2">
                        The Molecular Laboratory is fully equipped to handle sensitive, high-volume analyses and includes:
                    </p>

                    <ul class="text-justify mt-2">
                        <li>
                            <strong>Thermocyclers and real-time qPCR machines</strong>
                        </li>
                        <li>
                            <strong>Gel electrophoresis systems</strong> for nucleic acid visualization
                        </li>
                        <li>
                            <strong>Biosafety cabinets (Class II) </strong> for safe sample handling
                        </li>
                        <li>
                            <strong>Fluorimeters and spectrophotometers</strong> for nucleic acid quantification
                        </li>
                        <li>
                            <strong>Cold storage units</strong> (refrigerators, freezers, -80°C) for sample and reagent
                            preservation
                        </li>
                        <li>
                            <strong>Dedicated clean rooms</strong> and unidirectional workflow systems to minimize
                            contamination risk
                        </li>
                    </ul>

                    <h5 class="title-section">Why It Matters</h5>

                    <p class="text-justify mt-2">
                        The Molecular Laboratory provides the scientific foundation for many of
                        AIRID’s programs—from monitoring <strong>drug and insecticide resistance</strong>, to validating
                        diagnostic tools and <strong>tracking disease transmission</strong>. Its ability to produce precise,
                        rapid, and reproducible results enhances <strong> data-driven decision-making </strong>for
                        national control programs and international partners.
                    </p>

                    <p class="text-justify mt-2">
                        By integrating molecular biology with field studies and epidemiological data,
                        AIRID bridges the gap between bench science and real-world application—supporting
                        the continent’s capacity to detect, monitor, and respond to infectious disease threats.
                    </p>

                    <hr>
                </div>

                {{-- <div class="col-12 mt-3">

                    <p class="mt-2 bg-danger p-2 text-white text-center">Here are the tests we perform in our Molecular Lab
                        : </p>

                    <ul class="m-3">
                        <li>
                            <strong> KDR</strong>
                        </li>
                        <li>
                            <strong> ELISA blood meal analysis</strong>
                        </li>
                        <li>
                            <strong> Biochemistry</strong>
                        </li>
                        <li>
                            <strong> PCR</strong>
                        </li>
                        <li>
                            <strong> qPCR</strong>
                        </li>
                    </ul>
                </div> --}}

                <div class="mt-2 col-12 mb-3">
                    <h5 class="title-section">Few images of our installations : </h5>
                </div>

                <div class="col-12 col-sm-6 ">
                    <img src="{{ asset('storage/assets/facility/molecular-lab/IMG_1320.jpg') }}" alt="Image Molecular Lab"
                        class="img-fluid img-thumbnail" />

                    <p class="mt-2 bg-danger p-2 text-white text-center">
                        <strong>Molecular Lab Entrance</strong>
                    </p>
                </div>

                <div class="col-12 col-sm-6 ">
                    <img src="{{ asset('storage/assets/facility/molecular-lab/IMG_1307.jpg') }}" alt="Image Molecular Lab"
                        class="img-fluid img-thumbnail">
                    <p class="mt-2 bg-danger p-2 text-white text-center">
                        <strong>Molecular Lab QuantStudio</strong>
                    </p>
                </div>
                <div class="col-12 col-sm-6 ">
                    <img src="{{ asset('storage/assets/facility/molecular-lab/IMG_1314.jpg') }}" alt="Image Molecular Lab"
                        class="img-fluid img-thumbnail">
                    <p class="mt-2 bg-danger p-2 text-white text-center">
                        <strong>Molecular Lab Installations</strong>
                    </p>
                </div>
                <div class="col-12 col-sm-6 ">
                    <img src="{{ asset('storage/assets/facility/molecular-lab/IMG_1301.jpg') }}" alt="Image Molecular Lab"
                        class="img-fluid img-thumbnail">
                    <p class="mt-2 bg-danger p-2 text-white text-center">
                        <strong>Molecular Lab Installations</strong>
                    </p>
                </div>
                <div class="col-12 col-sm-6 ">
                    <img src="{{ asset('storage/assets/facility/molecular-lab/IMG_1300.jpg') }}" alt="Image Molecular Lab"
                        class="img-fluid img-thumbnail">
                    <p class="mt-2 bg-danger p-2 text-white text-center">
                        <strong>Molecular Lab Installations</strong>
                    </p>
                </div>
                <div class="col-12 col-sm-6 ">
                    <img src="{{ asset('storage/assets/facility/molecular-lab/IMG_1303.jpg') }}" alt="Image Molecular Lab"
                        class="img-fluid img-thumbnail">
                    <p class="mt-2 bg-danger p-2 text-white text-center">
                        <strong>Molecular Lab Installations</strong>
                    </p>
                </div>



            </div>
        </div>
    </section>


@endsection
