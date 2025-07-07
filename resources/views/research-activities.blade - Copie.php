@extends('index')

@section('title', 'Research Activities')


@section('content')
    <div id="banner-area" class="banner-area"
        style="background-image:url({{ asset('storage/assets_vendor/images/banner/banner1.jpg') }})">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title top_title">Research Activities</h1>
                            {{-- <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Vacancies</li>
                                </ol>
                            </nav> --}}
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
                    {{-- <p class="text-justify p-3 text-center font-weight-bold" style="border: 1px dashed #c20102">Content of this page coming soon</p> --}}



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

                    <h3 class="title-section">1. Insecticide Testing Laboratory</h3>

                    <div class=" col-12  text-center">
                        <img src="{{ asset('storage/assets/facility/bioassay-lab/lab_nadia.jpg') }}"
                            class=" img-research-activities " alt="">
                    </div>



                    <h5 class="title-section">Overview</h5>

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
                    <h3 class="title-section">2. Insectary</h3>

                    <div class=" col-12  text-center">
                        <img src="{{ asset('storage/assets/facility/insectary/IMG_1372.jpg') }}"
                            class=" img-research-activities " alt="">
                    </div>

                    <h5 class="">Overview</h5>

                    <p class="text-justify mt-2">
                        The Insectary at AIRID is a high-quality entomological facility that supports
                        the rearing, maintenance, and manipulation of mosquito colonies essential for
                        a wide range of vector biology research. It provides standardized and well-characterized
                        colonies of Anopheles, Aedes, and Culex mosquitoes used in laboratory bioassays,
                        behavioral experiments, vector competence studies, and infection trials.
                    </p>

                    <p class="text-justify mt-2">
                        All rearing activities are conducted under <strong>Good Laboratory Practice (GLP)-compliant</strong>
                        conditions, with rigorous quality control and environmental monitoring. The insectary
                        plays a foundational role in maintaining colony integrity and
                        ensuring reproducibility and reliability in entomological research.
                    </p>

                    <h5 class="title-section">Key Activities</h5>

                    <ul class="text-justify mt-2">
                        <li>
                            Maintenance of <strong>insecticide-susceptible</strong> and field-derived resistant mosquito
                            strains
                        </li>
                        <li>
                            Support for experimental mosquito infections with Plasmodium and other pathogens
                        </li>
                        <li>
                            Monitoring of life-history traits (e.g., longevity, fecundity, emergence rates)
                        </li>
                        <li>
                            Selection and characterization of specific mosquito lines with desired traits (e.g., resistance,
                            species complex)
                        </li>
                    </ul>

                    <h5 class="title-section">Infrastructure</h5>

                    <p class="text-justify mt-2">
                        The insectary includes:
                    </p>

                    <ul class="text-justify mt-2">
                        <li>
                            <strong>Temperature- and humidity-controlled rearing rooms</strong>
                        </li>
                        <li>
                            <strong>Larval and pupal trays</strong> for aquatic stage development
                        </li>
                        <li>
                            <strong>Adult holding cages</strong> for mating and oviposition
                        </li>
                        <li>
                            <strong>Blood-feeding stations</strong>, including membrane feeders and animal hosts (where
                            approved)
                        </li>
                        <li>
                            <strong>Dedicated preparation and waste-handling areas</strong>
                        </li>
                        <li>
                            <strong>Colony record systems</strong> for tracking strain lineage, performance, and health
                        </li>
                    </ul>

                    <h5 class="title-section">Why It Matters</h5>

                    <p class="text-justify mt-2">
                        A well-maintained insectary is the backbone of high-quality vector control research.
                        It ensures the availability of consistent, healthy mosquito populations for experimental
                        use—whether for evaluating insecticide efficacy, understanding transmission dynamics, or
                        developing new tools. By maintaining both susceptible and resistant colonies, AIRID is positioned
                        to test how products perform against real-world resistance profiles, helping national
                        and global partners make informed decisions on vector control strategies.
                    </p>
                </div>

                <div class="col-12">
                    <h3 class="title-section">3. Molecular Laboratory</h3>


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


            </div><!-- Sidebar end -->
        </div><!-- Sidebar Col end -->

        </div><!-- Main row end -->

        </div><!-- Conatiner end -->


    </section>

@endsection
