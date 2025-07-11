@extends('index')

@section('title', "Board of Directors' Message")


@section('content')
    <div id="banner-area" class="banner-area"
        style="background-image:url({{ asset('storage/assets_vendor/images/banner/banner2_new.png') }})">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title top_title">Board of Directors' Message </h1>
                            {{-- <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Board of Directors'</a></li>
                                </ol>
                            </nav> --}}
                        </div>
                    </div><!-- Col end -->
                </div><!-- Row end -->
            </div><!-- Container end -->
        </div><!-- Banner text end -->
    </div><!-- Banner area end -->


    <section id="main-container" class="main-container pb-2">
        <div class="container">

            <div class="row">



                <div class="col-12">
                    <p class="text-justify">
                        <strong> Welcome to the African Institute for Research in Infectious Diseases (AIRID).</strong>
                    </p>

                    <p class="text-justify mt-2">
                        AIRID was established with a firm conviction: <strong>Africa must lead the scientific response to
                            its own health challenges.</strong>
                        We are proud to guide an institution built to empower African researchers, generate locally relevant
                        solutions,
                        and contribute meaningfully to global health. Our guiding vision is simple yet powerful:
                        <strong>Bold science, led by Africans, for a healthy Africa.</strong>
                    </p>

                    <p class="text-justify mt-2">

                        Our work focuses on addressing the continent’s most pressing public health threats—malaria,
                        neglected tropical diseases, antimicrobial resistance, and emerging infections—through rigorous,
                        high-impact research. We bring together expertise in:
                    </p>

                    <ul class="text-justify mt-2 ">
                        <li class="">
                            Evaluation of public health products and support for regulatory approval
                        </li>
                        <li class="">
                            Public health entomology and development of novel vector control tools
                        </li>
                        <li class="">
                            Surveillance of infectious diseases and evaluation of diagnostic tools
                        </li>
                        <li class="">
                            Molecular epidemiology and genetic analysis of pathogens and vectors
                        </li>
                        <li class="">
                            Evidence-based health policy support and multi-sectoral engagement
                        </li>
                        <li class="">
                            Health promotion and community-centered approaches to disease prevention
                        </li>
                        <li class="">
                            Health economics and cost-effectiveness analysis of interventions
                        </li>
                        <li class="">
                            Capacity building and training of the next generation of African scientists
                        </li>



                    </ul>

                    <p class="text-justify mt-2">
                        AIRID’s scientific operations are powered by a growing portfolio of advanced GLP-compliant
                        facilities, including:
                    </p>

                    <ul class=" mt-2 text-justify">
                        <li class="">
                            An Insecticide Bioassay Laboratory for vector control tool evaluation
                        </li>

                        <li class="">A GLP-compliant Insectary for mosquito colony maintenance</li>
                        <li class="">A Molecular Laboratory for pathogen and resistance analysis</li>
                        <li class="">A Semi-Field Station for real-world intervention trials</li>
                    </ul>

                    <p class="text-justify mt-2">
                        Looking ahead, <strong>2026 will mark a major milestone</strong> in our growth. We will establish:
                    </p>

                    <ul class=" mt-2 text-justify">
                        <li class="">
                            A cutting-edge Analytical Chemistry Laboratory for high-precision insecticide and residue analysis
                        </li>

                        <li class="">A Mosquito–Plasmodium Infection Laboratory, enabling controlled transmission studies essential for vaccine and drug evaluation</li>
                    </ul>

                     <p class="text-justify mt-2">
                       These expansions will further strengthen AIRID’s role as a regional leader in regulatory science, translational research, and global health innovation—enhancing our ability to generate data that informs policy, guides interventions, and saves lives.
                    </p>
                     <p class="text-justify mt-2">
                        To our partners, funders, and collaborators: thank you for your support and shared vision. To Africa’s emerging scientists: AIRID is your platform to lead, innovate, and shape the future.
                    </p>

                    <p class="">

                        <strong>The Board of Directors</strong> <br>

                        <span  style="font-style: italic">African Institute for Research in Infectious Diseases (AIRID)</ class="italic">
                    </p>

                </div>
            </div>
        </div>
    </section>
@endsection
