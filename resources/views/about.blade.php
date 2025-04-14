@extends('index')

@section('title', 'AIRID -About Us')



@section('content')
    <div id="banner-area" class="banner-area"
        style="background-image:url({{ asset('storage/assets_vendor/images/banner/banner1.jpg') }})">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title">About AIRID </h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Staff</a></li>
                                </ol>
                            </nav>
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
                    <h5 class="section-sub-title">High Quality Infectious Diseases Resarch for Africa led by Africans</h5>

                    <p class="text-justify">

                        The African Institute for Research in Infectious Diseases is a leading African research center
                        dedicated to advancing scientific knowledge and innovative solutions in the fight against infectious
                        diseases. Through cutting-edge scientific research, innovative healthcare solutions, and strong
                        collaborations, we aim to develop sustainable public health strategies, and strengthen
                        capacity-building efforts to combat diseases that disproportionately affect communities across
                        Africa. <br>

                        With a multidisciplinary team of experts in epidemiology, microbiology, immunology, biotechnology,
                        Public health entomology, Virology, Parasitology, Social Sciences and public health, we work
                        collaboratively with global and local partners to drive impactful research and translate scientific
                        discoveries into real-world applications. Our focus areas include: <br> <br>

                        ✔️ Disease Surveillance <br>
                        ✔️ Control of vector-borne diseases <br>
                        ✔️ Public health <br>
                        ✔️Epidemiology <br>
                        ✔️Capacity building <br>
                        ✔️ Innovations <br>
                        <br>

                        At African Institute for Research in Infectious Diseases, we are committed to shaping a healthier
                        future for Africa through science, innovation, and collaboration. Join us in our mission to
                        transform infectious disease research and improve public health outcomes across the continent. We
                        believe that research-driven solutions and partnerships are essential to improving health outcomes
                        across Africa.

                    </p>
                </div>


            </div>
        </div>
    </section>

    @include('partials.all-departments-partials')

@endsection
