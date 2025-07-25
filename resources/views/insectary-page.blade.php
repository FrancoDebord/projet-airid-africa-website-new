@extends('index')

@section('title', 'AIRID --Our Insectary ')


@section('content')
    <div id="banner-area" class="banner-area"
        style="background-image:url({{ asset('storage/assets_vendor/images/banner/banner2_new.png') }})">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title top_title">Our Insectary</h1>
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
                        All rearing activities are conducted under Good Laboratory Practice (GLP)-compliant
                        conditions, with rigorous quality control and environmental monitoring. The insectary
                        plays a foundational role in maintaining colony integrity and
                        ensuring reproducibility and reliability in entomological research.
                    </p>

                    <h5 class="title-section">Key Activities</h5>

                    <ul class="text-justify mt-2">
                        <li>
                            Maintenance of insecticide-susceptible and field-derived resistant mosquito
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
                            Temperature- and humidity-controlled rearing rooms
                        </li>
                        <li>
                            Larval and pupal trays for aquatic stage development
                        </li>
                        <li>
                            Adult holding cages for mating and oviposition
                        </li>
                        <li>
                            Blood-feeding stations, including membrane feeders and animal hosts (where
                            approved)
                        </li>
                        <li>
                            Dedicated preparation and waste-handling areas
                        </li>
                        <li>
                            Colony record systems for tracking strain lineage, performance, and health
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
                                <td class="text-left">Anopheles gambiae kisumu</td>
                                <td style="width: 5%;">An. gambiae Kisumu</td>
                                <td>An. gambiae</td>
                                <td class="text-left">Kenya</td>
                                <td class="text-left">BEI Ressources</td>
                                <td style="width: 5%;">2006</td>
                                <td>Susceptible </td>
                                <td class="text-left">None</td>
                            </tr>
                            <tr>
                                <td class="text-left">Anopheles VKPer </td>
                                <td style="width: 5%;"> An. gambiae Vkper</td>
                                <td>An. gambiae</td>
                                <td class="text-left"> Kou Valley (Burkina-Faso)</td>

                                <td class="text-left">IRSS, Burkina Faso</td>
                                <td style="width: 5%;">2004</td>
                                <td>Resistant</td>
                                <td class="text-left"> Kdr (L1014F)</td>
                            </tr>
                            <tr>
                                <td class="text-left" "="">Anopheles Covè </td>
                                                        <td>An. gambiae Covè</td>
                                                        <td>An. gambiae - An. gambiae coluzzii</td>
                                                         <td class="text-left">Benin</td>

                                                         <td class="text-left" "="">Covè; Benin</td>
                                <td>2014</td>
                                <td>Resistant</td>
                                <td class="text-left">Kdr (L1014F); Metabolic resistance (CYP6P3)</td>
                            </tr>
                            <tr>
                                <td class="text-left" "="">Anopheles Akron </td>
                                                        <td style="width: 5%;">An. gambiae Akron</td>
                                                        <td>An. gambiae coluzzii</td>
                                                         <td class="text-left">Benin</td>

                                                         <td class="text-left" "="">BEI Ressources</td>
                                <td style="width: 5%;">2018</td>
                                <td>Resistant</td>
                                <td class="text-left">Ace-1 mutation; Kdr (L1014F).</td>
                            </tr>
                            <tr>
                                <td class="text-left" "="">Aedes ROCK</td>
                                                        <td style="width: 5%;">Aedes  ROCK</td>
                                                        <td>Aedes aegypti</td>
                                                         <td class="text-left">New York</td>

                                                         <td class="text-left" "="">BEI Ressources</td>
                                <td style="width: 5%;">2018</td>
                                <td>Susceptible </td>
                                <td class="text-left">None</td>
                            </tr>
                            <tr>
                                <td class="text-left" style="width: 10%;"> Aedes Dandji </td>
                                <td style="width: 5%;">Aedes Dandji</td>
                                <td>Aedes aegypti</td>
                                <td class="text-left">Benin</td>

                                <td class="text-left" style="width: 10%;"> Dandji; Benin </td>
                                <td style="width: 5%;">2018</td>
                                <td>Resistant</td>
                                <td class="text-left">Not characterized</td>
                            </tr>
                            <tr>
                                <td class="text-left">Culex Dandji </td>
                                <td style="width: 5%;">Culex Dandji</td>
                                <td>Culex quinquefasciatus</td>
                                <td class="text-left">Benin</td>

                                <td class="text-left">Dandji; Benin </td>
                                <td style="width: 5%;">2020</td>
                                <td>Resistant</td>
                                <td class="text-left"> Not characterized</td>
                            </tr>
                            <tr>
                                <td class="text-left">Culex Covè </td>
                                <td style="width: 5%;">Culex Covè</td>
                                <td>Culex quinquefasciatus</td>
                                <td class="text-left">Benin</td>

                                <td class="text-left">Covè; Benin </td>
                                <td style="width: 5%;">2020</td>
                                <td>Resistant</td>
                                <td class="text-left"> Not characterized</td>
                            </tr>
                            <tr>
                                <td class="text-left">FUMOZ</td>
                                <td style="width: 5%;">Anopheles FUMOZ</td>
                                <td>Anopheles funestus</td>
                                <td class="text-left">Mozambique</td>

                                <td class="text-left">BEI Ressources </td>
                                <td style="width: 5%;">2021</td>
                                <td>Resistant</td>
                                <td class="text-left"> Metabolic resistance (CYP6P9a and CYP6P9b)</td>
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
                      <strong>  Insectary Entrance</strong>
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
