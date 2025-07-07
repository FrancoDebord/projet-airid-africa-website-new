@extends('index')

@section('title', 'AIRID --Our Insectary ')


@section('content')
    <div id="banner-area" class="banner-area"
        style="background-image:url({{ asset('storage/assets_vendor/images/banner/banner1.jpg') }})">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title top_title">Our Insectary</h1>
                            {{-- <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Our Insectary</a></li>
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
                    <h4 class="text-bold border p-3 text-center text-danger">Insectary</h4>

                    <p class="mt-3 text-justify"> 
                        {{-- We raise different strains of mosquitoes in our insectary that we hold
                        from different regions. --}}

                        AIRID’s research is supported by a growing network of specialized laboratories and field sites
                        designed to
                        deliver high-quality, Africa-led scientific research. Each facility plays a critical role in
                        generating evidence
                        for disease control, product evaluation, and innovation. Our facilities are staffed by dedicated
                        teams of supervisors,
                        research assistants, and technicians who ensure operational excellence
                        and adherence to international standards.
                    </p>
                    </p>
                </div>

                  <div class="col-12">

                    <div class=" col-12  text-center">
                        <img src="{{ asset('storage/assets/facility/insectary/IMG_1372.jpg') }}"
                            class=" img-research-activities " alt="">
                    </div>

                    <h5 class="title-section mt-2">Overview</h5>

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



                 <h5 class="title-section mt-2">Our mosquito strains</h5>
                <div class="col-12 mt-3">

                    <table class="table table-bordered table-striped text-center ">
                        <thead class="thead-dark" style="background-color: black; color: white;">
                            <tr>
                                <th class="text-left">Strains </th>
                                <th class="text-left">Colony name </th>
                                <th class="text-center">Species </th>
                                <th class="text-left">Origin </th>
                                <th class="text-left">Source of collection </th>
                                <th class="text-left">Year established. </th>
                                <th class="text-center">Status </th>
                                <th class="text-left">Insecticide resistance mechanism(s) </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-left"><strong>Anopheles gambiae kisumu</strong></td>
                                <td style="width: 5%;"><strong>An. gambiae Kisumu</strong></td>
                                <td><strong>An. gambiae</strong></td>
                                <td class="text-left"><strong>Kenya</strong></td>
                                <td class="text-left"><strong>BEI Ressources</strong></td>
                                <td style="width: 5%;"><strong>2006</strong></td>
                                <td><strong>Susceptible </strong></td>
                                <td class="text-left"><strong>None</strong></td>
                            </tr>
                            <tr>
                                <td class="text-left"><strong>Anopheles VKPer </strong></td>
                                <td style="width: 5%;"><strong> An. gambiae Vkper</strong></td>
                                <td><strong>An. gambiae</strong></td>
                                <td class="text-left"><strong> Kou Valley (Burkina-Faso)</strong></td>

                                <td class="text-left"><strong>IRSS, Burkina Faso</strong></td>
                                <td style="width: 5%;"><strong>2004</strong></td>
                                <td><strong>Resistant</strong></td>
                                <td class="text-left"><strong> Kdr (L1014F)</strong></td>
                            </tr>
                            <tr>
                                <td class="text-left" "=""><strong>Anopheles Covè </strong></td>
                                                        <td><strong>An. gambiae Covè</strong></td>
                                                        <td><strong>An. gambiae - An. gambiae coluzzii</strong></td>
                                                         <td class="text-left"><strong>Benin</strong></td>

                                                         <td class="text-left" "=""><strong>Covè; Benin</strong></td>
                                <td><strong>2014</strong></td>
                                <td><strong>Resistant</strong></td>
                                <td class="text-left"><strong>Kdr (L1014F); Metabolic resistance (CYP6P3)</strong></td>
                            </tr>
                            <tr>
                                <td class="text-left" "=""><strong>Anopheles Akron </strong></td>
                                                        <td style="width: 5%;"><strong>An. gambiae Akron</strong></td>
                                                        <td><strong>An. gambiae coluzzii</strong></td>
                                                         <td class="text-left"><strong>Benin</strong></td>

                                                         <td class="text-left" "=""><strong>BEI Ressources</strong></td>
                                <td style="width: 5%;"><strong>2018</strong></td>
                                <td><strong>Resistant</strong></td>
                                <td class="text-left"><strong>Ace-1 mutation; Kdr (L1014F).</strong></td>
                            </tr>
                            <tr>
                                <td class="text-left" "=""><strong>Aedes ROCK</strong></td>
                                                        <td style="width: 5%;"><strong>Aedes  ROCK</strong></td>
                                                        <td><strong>Aedes aegypti</strong></td>
                                                         <td class="text-left"><strong>New York</strong></td>

                                                         <td class="text-left" "=""><strong>BEI Ressources</strong></td>
                                <td style="width: 5%;"><strong>2018</strong></td>
                                <td><strong>Susceptible </strong></td>
                                <td class="text-left"><strong>None</strong></td>
                            </tr>
                            <tr>
                                <td class="text-left" style="width: 10%;"><strong> Aedes Dandji </strong></td>
                                <td style="width: 5%;"><strong>Aedes Dandji</strong></td>
                                <td><strong>Aedes aegypti</strong></td>
                                <td class="text-left"><strong>Benin</strong></td>

                                <td class="text-left" style="width: 10%;"><strong> Dandji; Benin </strong></td>
                                <td style="width: 5%;"><strong>2018</strong></td>
                                <td><strong>Resistant</strong></td>
                                <td class="text-left"><strong>Not characterized</strong></td>
                            </tr>
                            <tr>
                                <td class="text-left"><strong>Culex Dandji</strong> </td>
                                <td style="width: 5%;"><strong>Culex Dandji</strong></td>
                                <td><strong>Culex quinquefasciatus</strong></td>
                                <td class="text-left"><strong>Benin</strong></td>

                                <td class="text-left">Dandji; Benin </td>
                                <td style="width: 5%;"><strong>2020</strong></td>
                                <td><strong>Resistant</strong></td>
                                <td class="text-left"><strong> Not characterized</strong></td>
                            </tr>
                            <tr>
                                <td class="text-left"><strong>Culex Covè </strong></td>
                                <td style="width: 5%;"><strong>Culex Covè</strong></td>
                                <td><strong>Culex quinquefasciatus</strong></td>
                                <td class="text-left"><strong>Benin</strong></td>

                                <td class="text-left">Covè; Benin </td>
                                <td style="width: 5%;"><strong>2020</strong></td>
                                <td><strong>Resistant</strong></td>
                                <td class="text-left"><strong> Not characterized</strong></td>
                            </tr>
                            <tr>
                                <td class="text-left"><strong>FUMOZ</strong></td>
                                <td style="width: 5%;"><strong>Anopheles FUMOZ</strong></td>
                                <td><strong>Anopheles funestus</strong></td>
                                <td class="text-left"><strong>Mozambique</strong></td>

                                <td class="text-left">BEI Ressources </td>
                                <td style="width: 5%;"><strong>2021</strong></td>
                                <td><strong>Resistant</strong></td>
                                <td class="text-left"><strong> Metabolic resistance (CYP6P9a and CYP6P9b)</strong></td>
                            </tr>
                        </tbody>
                    </table>


                </div>

                <div class="mt-2 col-12 mb-3">
                    <h5 class="title-section mt-2">Few images of our insectary installations : </h5>
                </div>

                <div class="col-12 col-sm-6 ">
                    <img src="{{ asset('storage/assets/facility/insectary/IMG_1342.jpg') }}" alt="Image Insectary"
                        class="img-fluid img-thumbnail" />

                    <p class="mt-2 bg-danger p-2 text-white text-center">
                        <strong>Insectary Entrance</strong>
                    </p>
                </div>
                <div class="col-12 col-sm-6 ">
                    <img src="{{ asset('storage/assets/facility/insectary/IMG_1368.jpg') }}" alt="Image Insectary"
                        class="img-fluid img-thumbnail" />

                    <p class="mt-2 bg-danger p-2 text-white text-center"> <strong>Insectary</strong></p>
                </div>

                <div class="col-12 col-sm-6 ">
                    <img src="{{ asset('storage/assets/facility/insectary/IMG_1379.jpg') }}" alt="Image Insectary"
                        class="img-fluid img-thumbnail" />
                    <p class="mt-2 bg-danger p-2 text-white text-center"> <strong>Insectary</strong></p>
                </div>

                <div class="col-12 mt-3">
                    <p class="text-justify" style="font-style: italic">Our mosquito strains have important characteristics
                        (for example, susceptibility or resistance to insecticides) that are essential for the testing of
                        Malaria vector control products. The insectary is designed to prevent any forms of contamination
                        between mosquito strains.

                        We can provide you with mosquito eggs, larvae or adults.</p>
                </div>




            </div>
        </div>
    </section>


@endsection
