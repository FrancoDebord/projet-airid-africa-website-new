@extends('index')

@section('title', 'AIRID --Bioassay Labs')


@section('content')
    <div id="banner-area" class="banner-area"
        style="background-image:url({{ asset('storage/assets_vendor/images/banner/banner2_new.png') }})">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title top_title">Our Bioassay Labs</h1>
                            {{-- <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Our Bioassay Labs</a></li>
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

                <div class="col-12">
                    <h3 class="title-section">1. Insecticide Testing Laboratory</h3>
                    <p class="text-justify">
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
                        <img src="{{ asset('storage/assets/facility/bioassay-lab/lab_nadia.jpg') }}"
                            class=" img-research-activities " alt="">
                    </div>


                    <h5 class="title-section mt-5">Overview</h5>

                    <p class="text-justify mt-2">
                        The Insecticide Bioassay Laboratory at AIRID is a core facility dedicated to evaluating the efficacy
                        of a wide range of vector control interventions under standardized laboratory conditions.
                        These include <strong>insecticide-treated nets (ITNs), indoor residual sprays (IRS),
                            attractive targeted sugar baits (ATSBs), spatial repellents, Topical repellents,
                            larvicides,</strong>
                        and other novel tools.
                    </p>

                    <p class="text-justify mt-2">
                        All studies are conducted <strong>in accordance with the OECD Principles of Good Laboratory Practice
                            (GLP) </strong> and follow the <strong>World Health Organization (WHO)
                            prequalification guidelines</strong>, ensuring scientific rigour, data integrity, and regulatory
                        compliance.
                    </p>

                    <h5 class="title-section">What We Do</h5>

                    <ul class="text-justify mt-2">
                        <li>
                            Perform WHO susceptibility bioassays (bottle bioassays and tube tests) to assess vector
                            resistance to new public health insecticides
                        </li>
                        <li>
                            Determine diagnostic concentrations of new public health insecticides
                        </li>
                        <li>
                            Evaluate regeneration time and wash resistance of new insecticide treated nets in WHO cone and
                            tunnel tests
                        </li>
                        <li>
                            Evaluate residual activity of IRS insecticides on different block substrates (mud, cement, wood,
                            tile etc)
                        </li>
                        <li>
                            Evaluate efficacy and residual activity of larvicides
                        </li>
                        <li>
                            Evaluate topical repellents in arm in cage experiments
                        </li>
                        <li>
                            Evaluate efficacy of new spatial repellent insecticides under controlled laboratory conditions.
                        </li>
                        <li>
                            Support product development and WHO prequalification dossiers
                        </li>
                    </ul>

                    <h5 class="title-section mt-1">Why It matters</h5>

                    <p class="text-justify mt-2">
                        The laboratory plays a vital role in AIRID’s mission to generate high-quality,
                        policy-relevant data for national malaria control programs, international partners,
                        and product developers. It supports regulatory submissions, operational research, and innovation in
                        vector control—contributing
                        to better tools and strategies to fight vector-borne diseases.
                    </p>

                    <h5 class="title-section mt-1">Infrastructure</h5>

                    <p class="text-justify mt-2">
                        Equipped with controlled-temperature testing rooms, calibrated exposure chambers, chemical storage
                        rooms,
                        IRS block treatments rooms, fume hoods, incubators etc.
                    </p>

                </div>

                <div class="col-12">

                    <div class="row">

                        <div class="col-12">
                            <h5 class="title-section mt-1">Some images of our Bioassay labs</h5>
                        </div>


                        <div class="col-12 col-sm-6">
                            {{-- <img src="{{ asset("storage/assets/facility/bioassay-lab/IMG_1569.jpg") }}" alt="Image Bio Assay Lab" class="img-fluid img-thumbnail"/> --}}
                            <img src="{{ asset('storage/assets/facility/bioassay-lab/lab_nadia.jpg') }}"
                                alt="Image Bio Assay Lab" class="img-fluid img-thumbnail" />

                            <p class="mt-2 bg-danger p-2 text-white text-center">
                                <strong>Lab Photo</strong>
                            </p>
                        </div>
                        <div class="col-12 col-sm-6 ">
                            {{-- <img src="{{ asset("storage/assets/facility/bioassay-lab/IMG_1571.jpg") }}" alt="Image Bio Assay Lab" class="img-fluid img-thumbnail"> --}}
                            <img src="{{ asset('storage/assets/facility/bioassay-lab/lab1.jpg') }}"
                                alt="Image Bio Assay Lab" class="img-fluid img-thumbnail">
                            <p class="mt-2 bg-danger p-2 text-white text-center">
                                <strong>Lab Photo</strong>
                            </p>
                        </div>
                        <div class="col-12 col-sm-6 ">
                            {{-- <img src="{{ asset("storage/assets/facility/bioassay-lab/IMG_1467.jpg") }}" alt="Image Bio Assay Lab" class="img-fluid img-thumbnail"> --}}
                            <img src="{{ asset('storage/assets/facility/bioassay-lab/lab2.jpg') }}"
                                alt="Image Bio Assay Lab" class="img-fluid img-thumbnail">
                            <p class="mt-2 bg-danger p-2 text-white text-center">
                                <strong>Lab Photo</strong>
                            </p>
                        </div>
                        <div class="col-12 col-sm-6 ">
                            <img src="{{ asset('storage/assets/facility/bioassay-lab/lab3.jpg') }}"
                                alt="Image Bio Assay Lab" class="img-fluid img-thumbnail">
                            {{-- <img src="{{ asset("storage/assets/facility/bioassay-lab/IMG_1476.jpg") }}" alt="Image Bio Assay Lab" class="img-fluid img-thumbnail"> --}}
                            <p class="mt-2 bg-danger p-2 text-white text-center">
                                <strong>Lab Photo </strong>
                            </p>
                        </div>
                    </div>
                </div>



            </div>

            <div class="col-12 col-sm-6 ">
                <img src="{{ asset('storage/assets/facility/bioassay-lab/IMG_1487.jpg') }}" alt="Image Bio Assay Lab"
                    class="img-fluid img-thumbnail" />

                <p class="mt-2 bg-danger p-2 text-white text-center">
                    <strong>ARM-IN-CAGE TEST</strong>
                </p>
            </div> --}}



        </div>
        </div>
    </section>


@endsection
