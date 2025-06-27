@extends('index')

@section('title', 'AIRID --Mission & Vision')



@section('content')
    <div id="banner-area" class="banner-area"
        style="background-image:url({{ asset('storage/assets_vendor/images/banner/banner1.jpg') }})">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title top_title">Mission & Vision</h1>
                            {{-- <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Mission & Vision</a></li>
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
                    <h5>Our History</h5>

                    <p class="">
                        The African Institute for Research in Infectious Diseases (AIRID) was established in 2021
                        to address the burden of infectious diseases in Africa. It was created through collaboration between
                        local health authorities, international research institutions, and development partners.
                        AIRID strengthens research capacity and fosters partnerships to design and evaluate interventions
                        tailored
                        to African populations. Its work focuses on interdisciplinary research, building local expertise,
                        and translating findings into impactful public health programs.

                    </p>
                </div>
                <div class="col-12">
                    <h5>Our Vision at AIRID</h5>

                    <p class="">
                        AIRID aims to be a leading center of excellence in infectious disease research, recognized for
                        innovative,
                        impactful work that builds local capacity and fosters collaboration. By combining scientific rigor
                        with
                        community engagement, AIRID strives to eliminate endemic diseases and promote health equity across
                        Africa.
                    </p>
                </div>

                <div class="col-12">
                    <h5>Our Mission at AIRID</h5>

                    <p class="">
                        AIRID’s mission is to generate evidence-based knowledge that informs public health policies and
                        interventions for controlling and eliminating infectious diseases in Africa. The institute is
                        dedicated to:

                    <ul>
                        <li>Conducting research on tropical infectious diseases</li>
                        <li>Evaluating tools and interventions for diagnosis, prevention, and treatment</li>
                        <li>Raising awareness and building capacity among researchers</li>
                        <li>Promoting partnerships and community engagement to support disease control efforts</li>
                        <li>Advancing health research excellence in Africa through African leadership</li>
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


    
    {{-- <section id="main-container" class="main-container pb-2">
        <div class="container">
            <div class="row">

                <div class="col-12">
                    <h5>Our Vision at AIRID</h5>

                    <p class="">
                        AIRID's vision is to be a leading research institute in Africa, providing real, value-driven
                        solutions that will enable Africa to acquire, manage and execute robust research programs for the
                        control and elimination of infectious diseases..
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
    </section> --}}

    @include('partials.partenaires')

@endsection
