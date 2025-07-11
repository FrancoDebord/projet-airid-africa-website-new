@extends('index')

@section('title', 'AIRID -About Us')



@section('content')
    <div id="banner-area" class="banner-area"
        style="background-image:url({{ asset('storage/assets_vendor/images/banner/banner2_new.png') }})">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title top_title">About AIRID </h1>
                            {{-- <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">About AIRID</a></li>
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
            {{-- <div class="row">

                <div class="col-12">
                    <h4 class="section-sub-title">High Quality Infectious Diseases Resarch for Africa led by Africans</h4>

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



            </div> --}}


            <div class="row">

                <div class="col-12">

                        <p class="" style="text-align: justify">
                        {{-- The African Institute for Research in Infectious Diseases is a leading African research center
                        dedicated to advancing scientific knowledge and innovative solutions in the fight against
                        infectious diseases. Through cutting-edge scientific research, innovative healthcare solutions,
                        and strong collaborations, we aim to develop sustainable public health strategies, and
                        strengthen capacity-building efforts to combat diseases that disproportionately affect
                        communities across Africa.
                        With a multidisciplinary team of experts in epidemiology, microbiology, immunology,
                        biotechnology, Public health entomology, Virology, Parasitology, Social Sciences and public
                        health, we work collaboratively with global and local partners to drive impactful research and
                        translate scientific discoveries into real-world applications. --}}

                        <strong>The African Institute for Research in Infectious Diseases (AIRID)</strong> is a pioneering non-governmental research institution based in Benin, West Africa. Established in 2021, AIRID is committed to addressing the continent’s most pressing health challenges through cutting-edge 
                        scientific research, innovative solutions, and strong partnerships.

                    </p>

                    <p class="" style="text-align: justify">
                        At AIRID, we believe that Africa’s public health priorities are best addressed through African leadership, expertise, and innovation. Sustainable solutions to the continent’s health challenges must be rooted in local knowledge and scientific excellence. Our mission is to generate high-impact research that informs national and regional policies, enhances disease control strategies, 
                        and contributes meaningfully to global efforts to eliminate infectious diseases and improve health equity.
                    </p>

                    <h4 class="title-section">Our History</h4>

                    <p class="text-justify">
                        The African Institute for Research in Infectious Diseases (AIRID) was established in
                        2021
                        to address the burden of infectious diseases in Africa. It was created through
                        collaboration between
                        local health authorities, international research institutions, and development partners.
                        AIRID strengthens research capacity and fosters partnerships to design and evaluate
                        interventions
                        tailored
                        to African populations. Its work focuses on interdisciplinary research, building local
                        expertise,
                        and translating findings into impactful public health programs.

                    </p>
                </div>
                <div class="col-12">
                    <h4 class="title-section">Our Vision</h4>

                    <p class="text-justify">
                        {{-- AIRID aims to be a leading center of excellence in infectious disease research,
                        recognized for
                        innovative,
                        impactful work that builds local capacity and fosters collaboration. By combining
                        scientific rigor
                        with
                        community engagement, AIRID strives to eliminate endemic diseases and promote health
                        equity across
                        Africa. --}}

                        To become Africa’s leading center of excellence in infectious disease research, training, and innovation—shaping the future of global health through African-led science.
                    </p>
                </div>

                <div class="col-12">
                    <h4 class="title-section">Our Mission</h4>

                    <p class="text-justify">
                        {{-- AIRID’s mission is to generate evidence-based knowledge that informs public health
                        policies and
                        interventions for controlling and eliminating infectious diseases in Africa. The
                        institute is
                        dedicated to: --}}

                        To conduct world-class research, build local scientific capacity, and deliver data-driven 
                        solutions to reduce the burden of infectious diseases in Africa.
{{-- 
                    <ul>
                        <li>Conducting research on tropical infectious diseases</li>
                        <li>Evaluating tools and interventions for diagnosis, prevention, and treatment</li>
                        <li>Raising awareness and building capacity among researchers</li>
                        <li>Promoting partnerships and community engagement to support disease control efforts
                        </li>
                        <li>Advancing health research excellence in Africa through African leadership</li>
                    </ul> --}}
                    </p>
                </div>


                <div class="col-12">
                    <h4 class="title-section">What we do</h4>

                    <p class="text-justify">
                      

                    <ul  class="text-justify list-group list-group-flush">
                        <li class="mt-2 list-group-item">
                            <strong>Applied Research :</strong> We design and implement research studies that tackle real-world challenges in malaria, 
                            neglected tropical diseases, HIV, Tuberculosis, emerging infections, and antimicrobial resistance.
                        </li>

                        <li class="mt-2 list-group-item">
                            <strong>Innovation & Evaluation :</strong> We evaluate new tools, technologies, and interventions for
                             prevention and control and control of infectious diseases, including diagnostics, 
                            vector control tools such as insecticide-treated nets, vaccines, chemoprevention etc.
                        </li>

                        <li class="mt-2 list-group-item">
                            <strong>Capacity Strengthening :</strong> We train the next generation of African scientists 
                            and public health professionals through internships, postgraduate programs, and hands-on research experiences.
                        </li>

                        <li class="mt-2 list-group-item">
                            <strong>Policy Engagement : </strong> We work closely with national and regional governments, WHO,
                             and global health partners to ensure our research informs policies and program implementation.
                        </li>
                    </ul>
                    </p>
                </div>



                {{-- <div class="col-12">
                    <h4 class="title-section">Within the framework of training and capacity building</h4>

                    <p class="">
                        We aim to :

                    <ul>
                        <li> Organize and participate in workshops and consultations on infectious disease
                            research issues,
                            medical entomology seminars, training in research techniques and refresher courses
                            for
                            researchers on new research techniques</li>
                        <li>Organizing training for young researchers in general</li>
                    </ul>
                    </p>
                </div> --}}

                {{-- <div class="col-12">
                    <h4 class="title-section">Networking and partnerships</h4>

                    <p class="">
                        We aim to :

                    <ul>
                        <li>Create a network of African researchers involved in the fight against infectious
                            diseases</li>
                        <li>Organize meetings between researchers to discuss the fight against vector-borne and
                            infectious
                            diseases</li>
                        <li>Partnering with foreign organizations in the fight against infectious diseases</li>
                    </ul>
                    </p>
                </div> --}}

                {{-- <div class="col-12">
                    <h4 class="title-section">As part of the philantropy</h4>

                    <p class="">
                        We aim to :

                    <ul>
                        <li>Supporting children from disadvantaged backgrounds, especially girls, in school and
                            in the
                            scientific field</li>
                        <li>Supporting economically disadvantaged social groups and people affected by pandemics
                        </li>
                        <li>Helping to support people affected by diseases such as HIV, tuberculosis and malaria
                        </li>
                        <li>Help support preventive and curative measures for pregnant women exposed to
                            infectious diseases
                        </li>
                    </ul>
                    </p>
                </div> --}}

            </div>
        </div>
    </section>



    @include('partials.all-departments-partials')

@endsection
