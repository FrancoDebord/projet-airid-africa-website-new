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

                    <h3 class="title-section">1. Vector Control and Public Health Entomology</h3>

                    <p class="text-justify mt-2">
                        AIRID conducts cutting-edge research to develop and evaluate
                        innovative tools for the control of disease vectors such as mosquitoes.
                        Our expertise includes testing insecticide-treated nets (ITNs), indoor residual sprays (IRS),
                        attractive targeted sugar baits (ATSBs), and spatial repellents under both laboratory and semi-field
                        conditions. We monitor insecticide resistance, investigate vector behavior, and support the
                        regulatory approval process for novel products. This work ensures that vector control programs
                        across
                        Africa are informed by high-quality, context-specific evidence.
                    </p>

                </div>

                <div class="col-12">

                    <h3 class="title-section">2. Disease Surveillance, Diagnostics, and Molecular Epidemiology</h3>

                    <p class="text-justify mt-2">
                        We strengthen national and regional disease control efforts
                        through integrated surveillance and molecular research.
                        Our teams evaluate the accuracy and usability of diagnostic tools,
                        conduct epidemiological studies to map disease burden, and apply molecular techniques
                        to identify pathogens, track resistance mutations, and study transmission dynamics.
                        These activities help guide timely public health responses and enhance the effectiveness
                        of disease elimination strategies
                        for malaria, arboviruses, and other infectious diseases.
                    </p>

                </div>

                <div class="col-12">

                    <h3 class="title-section">3. Health Policy, Systems, and Economics</h3>

                    <p class="text-justify mt-2">
                        AIRID is committed to transforming scientific evidence
                        into actionable public health policy. We work alongside national governments,
                        donors, and technical partners to assess the impact, feasibility, and cost-effectiveness
                        of interventions. Our work supports policy formulation, resource allocation, and program
                        design through implementation research, stakeholder consultation, and strategic planning.
                        By aligning research with policy priorities, we ensure that health systems
                        are strengthened and investments are guided by evidence.
                    </p>

                </div>


                <div class="col-12">

                    <h3 class="title-section">4. Community Health, Social Science & Community Acceptance</h3>

                    <p class="text-justify mt-2">
                        We believe that impactful and sustainable health interventions
                        must be grounded in the lived experiences and perspectives of the communities
                        they serve. AIRID designs and conducts research that emphasizes community engagement,
                        social science, and behavioral insight to understand how people perceive, accept,
                        and respond to public health interventions. Through participatory approaches,
                        stakeholder dialogue, and culturally sensitive health promotion, we aim to improve
                        uptake, equity, and long-term
                        effectiveness of disease control strategies across Africa.
                    </p>

                </div>

                <div class="col-12">

                    <h3 class="title-section">5. Data Science, Analytics, and Modelling</h3>

                    <p class="text-justify mt-2">
                        AIRID leverages data science to transform
                        research into actionable insights. We employ statistical modelling,
                        geospatial mapping, and predictive analytics to understand disease patterns,
                        project intervention outcomes, and improve surveillance systems. By integrating
                        data from laboratory, field, and health system sources, we support real-time
                        decision-making and enhance program efficiency. Our analytics team works across
                        projects to ensure that data drives impact
                        at every level—from local interventions to national health strategies
                    </p>

                </div>




            </div><!-- Sidebar end -->
        </div><!-- Sidebar Col end -->

        </div><!-- Main row end -->

        </div><!-- Conatiner end -->


    </section>

@endsection
