@extends('index')

@section('title', 'VESTERGAARD ITN Testing Project')


@section('content')
    <div id="banner-area" class="banner-area"
        style="background-image:url({{ asset('storage/assets_vendor/images/banner/banner2_new.png') }})">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title top_title">VESTERGAARD ITN Testing</h1>

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
                    <span class="title-section" style="font-size: 1.2em; font-weight: bold">Supporting Innovation in Vector
                        Control: R&D Collaboration with PAMVERC-BENIN and Vestergaard Sarl</span>
                </div>



                <div class="col-12 mt-2">
                    <p class="text-justify mt-2">
                        AIRID, through its involvement in the Pan-African Malaria Vector Research
                        Consortium (PAMVERC), plays a key role in supporting the research and
                        development (R&D) of next-generation insecticide-treated nets (ITNs)
                        developed by Vestergaard Sarl—a global leader in disease prevention technologies.
                    </p>
                </div>


                <div class="col-12">
                    <h5 class="title-section mt-2">What We Do</h5>

                    <p class="text-justify mt-2">
                        As part of this collaboration, AIRID conducts rigorous evaluations of
                        Vestergaard’s ITN products across three major research platforms:
                    </p>

                    <ul class="text-justify mt-2">
                        <li>
                            Laboratory Bioassays: Controlled tests to assess the bioefficacy of Vestergaard’s
                            innovative insecticide formulations against local strains of malaria vectors, including
                            resistant populations.
                        </li>
                        <li>
                            Experimental Hut Trials: Semi-field studies in purpose-built huts
                            to measure mosquito mortality, blood-feeding inhibition,
                            and deterrence in realistic exposure scenarios.
                        </li>
                        <li>
                            Community-Level Field Studies: Longitudinal evaluations of net durability, bioefficacy, and
                            community
                            acceptance under real-world conditions, in line with WHO guidelines.
                        </li>

                    </ul>
                </div>

                <div class="col-12">
                    <h5 class="title-section mt-2">Our Impact</h5>

                    <p class="text-justify mt-2">
                        By generating high-quality data on the performance and
                        longevity of Vestergaard ITNs, AIRID helps accelerate the
                        development, optimization, and regulatory approval
                        of tools that strengthen malaria control and resistance management strategies across Africa.
                    </p>
                </div>


                <div class="col-12">
                    <h5 class="title-section mt-2">Collaborative Science for African Health</h5>

                    <p class="text-justify mt-2">
                        This partnership reinforces AIRID’s commitment
                        to science-led innovation, evidence-based public health,
                        and African leadership in global health R&D. Through PAMVERC
                        and other regional networks, AIRID is advancing a shared vision for
                        sustainable malaria control driven by African institutions and local expertise.
                    </p>
                </div>


            </div>
        </div>
    </section>

@endsection
