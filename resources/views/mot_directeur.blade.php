@extends('index')

@section('title',"Director's Message")
    

@section('content')
     <div id="banner-area" class="banner-area"
        style="background-image:url({{ asset('storage/assets_vendor/images/banner/banner2_new.png') }})">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title top_title">Director's Message </h1>
                            {{-- <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Director's Message</a></li>
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

                <div class="col-12 col-md-6 justify-content-center">
                        <img src="{{ asset("storage/assets/staff/avatar_femme_default.jpg") }}" class="img-thumbnail img-" alt="photo Dr " >
                </div>

                <div class="col-12 col-md-6">
                    <p class="text-justify">
                       <strong> Welcome to the African Institute for Research in Infectious Diseases (AIRID).</strong>
                    </p>

                    <p class="text-justify mt-2">
                        It is with great pride and purpose that I introduce you to an institution built on the belief that Africa holds the key to solving its most pressing health challenges. At AIRID, we are committed to advancing science that is not only excellent but also locally driven, contextually relevant, and globally impactful.
                    </p>

                    <p class="text-justify mt-2">
                        Our work is rooted in a simple but powerful vision: <strong>bold science, led by Africans, for a healthy Africa</strong> . We focus on conducting high-quality research, training the next generation of African scientists, and delivering innovative solutions that strengthen disease control programs and inform health policies. From malaria to emerging infections, AIRID is at the forefront of the fight against diseases that continue to burden our communities.
                    </p>

                    <p class="text-justify mt-2">
                        As we grow, we are investing in state-of-the-art laboratories, nurturing cross-sectoral partnerships, and expanding our impact through collaborative projects across the continent.  To our partners, funders, and collaborators: thank you for believing in our mission. To the young African scientists looking for a place to grow and lead—this institute was built with you in mind.
                    </p>

                    <p class="">
                        Together, we can shape a healthier future for Africa, powered by science and driven by African leadership.
                    </p>

                    <p class="">
                         
                        <strong>Dr. </strong> <br>

                        <span>Director, AIRID</span>
                    </p>

                </div>
            </div>
        </div>
    </section>
@endsection