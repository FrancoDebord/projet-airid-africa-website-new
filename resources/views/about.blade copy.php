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


    <div id="banner-area" class="banner-area"
        style="background-image:url({{ asset('storage/assets_vendor/images/banner/banner1.jpg') }})">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title">Mission & Vision</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Mission & Vision</a></li>
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
                    <h5>Our Vision at AIRID</h5>

                    <p class="">
                        AIRID aims to be a leading center of excellence in infectious disease research, recognized for innovative, impactful work that builds local capacity and fosters collaboration. By combining scientific rigor with community engagement, AIRID strives to eliminate endemic diseases and promote health equity across Africa.
                    </p>
                </div>

                <div class="col-12">
                    <h5>General statement on our mission</h5>

                    <p class="">
                        AIRID's mission is to improve the control of infectious diseases in Africa, by working in
                        partnership to achieve excellence in infectious disease research, education and the translation of
                        knowledge into policy and practice.
                    </p>
                </div>

                <div class="col-12">
                    <h5>Within the framework of the Research Work</h5>

                    <p class="">
                        We mainly aim to :

                    <ul>
                        <li>Conduct medical and scientific research into tropical and infectious diseases</li>
                        <li>Evaluate mosquito nets, anti-mosquito insecticides, entomological projects, vector control
                            products</li>
                        <li>Consulting in public health and vector-borne diseases</li>
                        <li>Monitor and support entomological projects</li>
                        <li>Raising awareness of infectious diseases, little-known tropical diseases and new infections</li>
                    </ul>
                    </p>
                </div>

                <div class="col-12">
                    <h5>Within the framework of training and capacity building</h5>

                    <p class="">
                        We aim to :

                    <ul>
                        <li> Organize and participate in workshops and consultations on infectious disease research issues,
                            medical entomology seminars, training in research techniques and refresher courses for
                            researchers on new research techniques</li>
                        <li>Organizing training for young researchers in general</li>
                    </ul>
                    </p>
                </div>

                <div class="col-12">
                    <h5>Networking and partnerships</h5>

                    <p class="">
                        We aim to :

                    <ul>
                        <li>Create a network of African researchers involved in the fight against infectious diseases</li>
                        <li>Organize meetings between researchers to discuss the fight against vector-borne and infectious
                            diseases</li>
                        <li>Partnering with foreign organizations in the fight against infectious diseases</li>
                    </ul>
                    </p>
                </div>

                <div class="col-12">
                    <h5>As part of the philantropy</h5>

                    <p class="">
                        We aim to :

                    <ul>
                        <li>Supporting children from disadvantaged backgrounds, especially girls, in school and in the
                            scientific field</li>
                        <li>Supporting economically disadvantaged social groups and people affected by pandemics</li>
                        <li>Helping to support people affected by diseases such as HIV, tuberculosis and malaria</li>
                        <li>Help support preventive and curative measures for pregnant women exposed to infectious diseases
                        </li>
                    </ul>
                    </p>
                </div>

            </div>
        </div>
    </section>

    @include('partials.all-departments-partials')

@endsection
