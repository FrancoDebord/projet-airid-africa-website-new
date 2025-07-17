@extends('index')

@section('title', 'AIRID --Experimental Huts Station')


@section('content')
    <div id="banner-area" class="banner-area"
        style="background-image:url({{ asset('storage/assets_vendor/images/banner/banner2_new.png') }})">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title top_title">Our Experimental Huts Station</h1>

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
                    <h4 class="text-bold border p-3 text-center text-danger">Semi-Station</h4>

                    <p class="mt-3 text-justify">

                        The Semi-Field Station at AIRID, located in Covè, Benin (📍 7.2164° N,
                            2.3408° E) , is a
                        world-class research platform that simulates real-life environmental conditions
                        while
                        maintaining the experimental control needed for rigorous scientific evaluation. Set
                        in
                        a vast rice-growing region with high mosquito density, this station enables
                        semi-field
                        trials of vector control tools under realistic ecological and household conditions.

                        {{-- A total of 84 experimental huts of the WHOPES West African design belonging
                        to the CREC/LSHTM Facility have been constructed at the experimental hut stations. --}}

                    </p>

                    <p class="mt-2 text-justify">
                        It is a critical testing ground for interventions such as insecticide-treated nets (ITNs),
                            indoor residual spraying (IRS), spatial repellents, and attractive targeted
                            sugar baits (ATSBs).
                        All studies are conducted in compliance with WHO protocols and Good
                            Laboratory Practice (GLP) standards.
                    </p>
                </div>

                <div class="col-12">
                    <h5 class="title-section mt-2">Local Vector Population</h5>
                </div>

                <div class="col-12">

                    {{-- <div class="row">
                        <div class=" col-12 mt-3 text-center">
                            <img src="{{ asset('storage/assets/facility/field-station/DJI_0152.jpg') }}"
                                class=" img-research-activities " alt="">
                        </div>
                    </div> --}}

                    {{-- <h5 class="title-section mt-3">Overview</h5> --}}

                    <p class="text-justify mt-3">
                        Covè provides ideal conditions for semi-field testing due to its abundant,
                            free-flying mosquito population, dominated by :
                    </p>
                    <ul class="text-justify mt-2">
                        <li>
                            Anopheles gambiae sensu lato, especially An. coluzzii and An. gambiae s.s.
                        </li>
                        <li>
                            Populations with high levels of insecticide resistance, ideal for evaluating next-generation
                            tools
                        </li>
                        <li>
                            Stable year-round presence, particularly in the rainy season, due to extensive rice cultivation
                        </li>
                    </ul>

                    <h5 class="title-section">Core Research Activities</h5>

                    <ul class="text-justify mt-2">
                        <li>
                            Experimental hut evaluations of ITNs, IRS, spatial repellents, and innovative tools
                        </li>
                        <li>
                            Mosquito behavior monitoring, including host-seeking, feeding, exiting, and mortality
                        </li>
                        <li>
                            Longitudinal assessment of residual efficacy and insecticide performance over time
                        </li>
                        <li>
                            Release recapture evaluation of vector control products using mosquitoes of known
                            characteristics
                        </li>
                        <li>
                            Data generation to support WHO PQT submissions, national policy development, and donor
                            investment
                        </li>

                    </ul>

                    <h5 class="title-section">Infrastructures</h5>

                    <p class="text-justify mt-2">
                        AIRID’s Semi-Field Station includes:
                    </p>

                    <ul class="text-justify mt-2">
                        <li>
                            84 experimental huts built to WHO standards (72 West African style, 12 Open
                            Eave style)
                        </li>
                        <li>
                            Mosquito release chambers  for controlled release-recapture studies
                        </li>
                        <li>
                            A fully equipped weather station for real-time measurement of temperature,
                            humidity, wind speed, and rainfall
                        </li>
                        <li>
                            On-site data and specimen processing labs for immediate analysis
                        </li>
                        <li>
                            Backup power systems to ensure continuous environmental control and data
                            recording
                        </li>

                    </ul>

                    <h5 class="title-section mt-1">Why It matters</h5>

                    <p class="text-justify mt-2">
                        By bridging the gap between lab and field, AIRID’s Semi-Field Station delivers
                        high-quality evidence on how
                        tools perform in real-world African settings. This evidence is critical to:
                    </p>
                    <ul class="mt-2 text-justify">
                        <li>
                            Inform national malaria control strategies
                        </li>
                        <li>
                            Support product registration and WHO prequalification
                        </li>
                        <li>
                            Guide donor and government investments in effective interventions
                        </li>
                    </ul>

                    <p class="text-justify mt-2">
                        As a cornerstone of AIRID’s research infrastructure,
                        the Semi-Field Station reflects our commitment to African-led, evidence-based
                            innovation
                        in the fight against malaria and vector-borne diseases.
                    </p>
                </div>


                <div class="col-12">

                    <h5 class="title-section mt-3">Some images of our semi-field station</h5>
                </div>

                <div class="col-12">
                    <div class="row">
                        <div class="col-12 col-sm-6 ">
                            <img src="{{ asset('storage/assets/facility/field-station/DJI_0152.jpg') }}"
                                alt="Image Experimental Hut station" class="img-fluid img-thumbnail">
                            <p class="mt-2 bg-danger p-2 text-white text-center">
                                <strong>Experimental Huts</strong>
                            </p>
                        </div>

                        <div class="col-12 col-sm-6 ">
                            <img src="{{ asset('storage/assets/facility/field-station/DJI_0160.jpg') }}"
                                alt="Image  Experimental Hut station" class="img-fluid img-thumbnail">
                            <p class="mt-2 bg-danger p-2 text-white text-center">
                                <strong>Experimental Huts</strong>
                            </p>
                        </div>

                        <div class="col-12 col-sm-6 ">
                            <img src="{{ asset('storage/assets/facility/field-station/DJI_0191.jpg') }}"
                                alt="Image  Experimental Hut station" class="img-fluid img-thumbnail">
                            <p class="mt-2 bg-danger p-2 text-white text-center">
                                <strong>Experimental Huts</strong>
                            </p>
                        </div>
                        <div class="col-12 col-sm-6 ">
                            <img src="{{ asset('storage/assets/facility/field-station/DJI_0170.jpg') }}"
                                alt="Image  Experimental Hut station" class="img-fluid img-thumbnail">
                            <p class="mt-2 bg-danger p-2 text-white text-center">
                                <strong>Experimental Huts</strong>
                            </p>
                        </div>
                        <div class="col-12 col-sm-6 ">
                            <img src="{{ asset('storage/assets/facility/field-station/DJI_0171.jpg') }}"
                                alt="Image  Experimental Hut station" class="img-fluid img-thumbnail">
                            <p class="mt-2 bg-danger p-2 text-white text-center">
                                <strong>Experimental Huts</strong>
                            </p>
                        </div>
                        <div class="col-12 col-sm-6 ">
                            <img src="{{ asset('storage/assets/facility/field-station/DJI_0173.jpg') }}"
                                alt="Image  Experimental Hut station" class="img-fluid img-thumbnail">
                            <p class="mt-2 bg-danger p-2 text-white text-center">
                                <strong>Experimental Huts</strong>
                            </p>
                        </div>
                    </div>
                </div>





            </div>
        </div>
    </section>




@endsection
