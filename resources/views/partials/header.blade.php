<header id="header" class="header-one">
    <div class="bg-white" style="height: 100px;">
        <div class="container-fluid">
            <div class="logo-area">
                <div class="row align-items-center">
                    <div class="logo col-lg-3 text-center text-lg-left mb-3 mb-md-5 mb-lg-0">
                        <a class="d-block" href="{{ route('index') }}">
                            <img loading="lazy" src="{{ asset('storage/assets/logo/airid.png') }}" alt="AIRID">
                        </a>
                    </div><!-- logo end -->

                    <div class="col-lg-9 header-right d-none d-sm-block">
                        {{-- <ul class="top-info-box">
                            <li>
                                <div class="info-box">
                                    <div class="info-box-content">
                                        <p class="info-box-title">Call Us</p>
                                        <p class="info-box-subtitle">

                                            <a href="tel:(+229) 01 67 16 44 99"> (+229) 01 67 16 44 99/ 01 95 03 33 33</a>
                                           
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="info-box">
                                    <div class="info-box-content">
                                        <p class="info-box-title">Email Us</p>
                                        <p class="info-box-subtitle"> 
                                            <a href="mailto:info@airid-africa.com">info@airid-africa.com</a>
                                        </p>
                                    </div>
                                </div>
                            </li>

                        </ul><!-- Ul end --> --}}

                        <p class="slogan-p" id="slogan-p">
                            Bold Science. African-Led. Impact-Driven
                        </p>
                        {{-- <p class="slogan-fr" id="slogan-fr">
                            Science Audacieuse. Portée par l’Afrique. Axée sur l’Impact.
                        </p> --}}

                   
                    </div><!-- header right end -->
                </div><!-- logo area end -->

            </div><!-- Row end -->
        </div><!-- Container end -->
    </div>

    <div class="site-navigation">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-dark p-0">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target=".navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        @php
                            $menu = request()->segment(1, 'default');

                        @endphp
                        <div id="navbar-collapse" class="collapse navbar-collapse">
                            <ul class="nav navbar-nav mr-auto">

                                <li class="nav-item {{ $menu == 'defaut' ? 'active' : '' }}"><a class="nav-link"
                                        href="{{ route('index') }}">Home</a></li>

                                <li
                                    class="nav-item dropdown {{ $menu == 'about-us' || $menu == 'mission-vision' || $menu == 'staff' ? 'active' : '' }}">
                                    <a href="{{ route('index') }}" class="nav-link dropdown-toggle"
                                        data-toggle="dropdown">About AIRID <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li class="{{ $menu == 'mission-vision' ? 'active' : '' }}"><a href="{{ route('aboutPage') }}">Vision & Mission</a></li>
                                        {{-- <li class="{{ $menu == 'mission-vision' ? 'active' : '' }}"><a href="{{ route('MissionVisionPage2') }}">Vision & Mission</a></li> --}}
                                        <li class="{{ $menu == 'default' ? 'active' : '' }}"><a
                                                href="{{ route('motDirecteur') }}">Director's Message</a></li>
                                                
                                        <li class="{{ $menu == 'default' ? 'active' : '' }}"><a
                                                href="{{ route('motBoardOfDirectors') }}">Board of Directors' Message</a></li>

                                        {{-- <li class="{{ $menu == 'about-us' ? 'active' : '' }}"><a
                                                href="{{ route('aboutPage') }}">Who we are </a></li> --}}
                                        {{-- <li class="{{ $menu == 'mission-vision' ? 'active' : '' }}"><a
                                                href="{{ route('allServicesPage') }}">Departments</a></li> --}}
                                        <li {{ $menu == 'staff' ? 'active' : '' }}><a
                                                href="{{ route('staffAirid') }}">Our
                                                Team</a></li>
                                    </ul>
                                </li>


                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Our Work
                                        <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ route("researchActivitiesPage") }}">Research activities</a></li>
                                        {{-- <li><a href="{{ route('allProjectsPage') }}">Research Projects</a></li> --}}
                                        <li><a href="{{ route("educationTrainingPage") }}">Education & Trainings</a></li>
                                        <li><a href="{{ route('allPublicationsPage') }}">Publications</a></li>
                                        <li><a href="{{ route('partnersPage') }}">Partnerships</a></li>
                                        <li><a href="{{ route('vacanciesPage') }}">Working with us</a></li>
                                    </ul>
                                </li>

                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Facilities
                                        <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ route('bioAssayLab') }}">Insecticide testing Laboratories</a>
                                        </li>
                                        <li><a href="{{ route('molecularLabPage') }}">Molecular Lab</a></li>
                                        <li><a href="{{ route('insectaryPage') }}">Insectary</a></li>
                                        <li><a href="{{ route('experimentalHutStationPage') }}">Semi-field Station</a>
                                        </li>
                                        <li><a href="{{ route('mosquitoPlasmodiumLaboratoryPage') }}">Mosquito Plasmodium Infection Laboratory</a>
                                        </li>
                                        <li><a href="{{ route('analyticalCheminstryLabPage') }}">Analytical and
                                                Chemistry Lab</a></li>
                                        <li><a href="{{ route('fieldStationPage') }}">Field Station</a></li>
                                        <li><a href="{{ route('animalHousePage') }}">Animal House</a></li>

                                    </ul>
                                </li>

                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Research
                                        Projects
                                        <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ route("projetGaviSiriPage") }}">GAVI-SIRI </a></li>
                                        <li><a href="{{ route("projetOptimvecPage") }}">OPMTIMVEC</a></li>
                                        <li><a href="{{ route("projetATSBPage") }}">ATSB Knowledge Gaps</a></li>

                                        <li><a href="{{ route("projetVesterguaardITNPage") }}">VESTERGAARD ITN Testing</a></li>
                                        <li><a href="{{ route("projetDuranetPage") }}">Duranet Plus Community Evaluation</a></li>
                                        <li><a href="{{ route("projetSpatialRepellentsPage") }}">Spatial Repellents Project</a></li>

                                        <li class="dropdown-submenu">
                                            <a href="#!" class="dropdown-toggle" data-toggle="dropdown">Product Development</a>
                                            <ul class="dropdown-menu">
                                                 <li><a href="{{ route("interceptorProductDevelopmentPage") }}">Interceptor </a></li>
                                                <li><a href="{{ route("duranetProductDevelopmentPage") }}">Duranet</a></li>
                                                <li><a href="{{ route("yorkoolProductDevelopmentPage") }}">Yorkool</a></li>
                                                <li><a href="{{ route("healthPulseProductDevelopmentPage") }}">Health Pulse</a></li>
                                                <li><a href="{{ route("yorkoolG4ProductDevelopmentPage") }}">Yorkool G4</a></li>
                                            </ul>
                                        </li>
                                       
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle"
                                        data-toggle="dropdown">Research
                                        Units
                                        <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ route('pageCRECLSHTM') }}">CREC/LSHTM </a></li>
                                        <li><a href="{{ route("pamvercBeninPage") }}">PAMVERC-BENIN</a></li>
                                    </ul>
                                </li>



                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Medias
                                        <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        {{-- <li><a href="#">News</a></li> --}}
                                        <li><a href="{{ route("newsletterPage") }}">Newsletter</a></li>
                                        {{-- <li><a href="#">Events</a></li> --}}
                                        {{-- <li><a href="#">Blog</a></li> --}}
                                        <li><a href="{{ route('photosPage') }}">Our Gallery</a></li>
                                        <li><a href="{{ route('videoPage') }}">Video library</a></li>
                                        <li><a href="https://onlinetraining.airid-africa.com" target="_blank">Online
                                                Training
                                                Platform of AIRID</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item"><a class="nav-link"
                                        href="{{ route('contactPage') }}">Contact</a>
                                </li>
                            </ul>

                            {{-- <div class="nav-item link-crec-vacancies"><a class="nav-link" href="{{ route("vacanciesPage") }}">Vacancies </a>
                            </div>
                            <div class="nav-item link-crec"><a class="nav-link" href="{{ route("pageCRECLSHTM") }}">The Project CREC/LSHTM</a>
                            </div> --}}

                        </div>
                    </nav>
                </div>
                <!--/ Col end -->
            </div>
            <!--/ Row end -->

            {{-- <div class="nav-search">
                <span id="search"><i class="fa fa-search"></i></span>
            </div><!-- Search end --> --}}

            <div class="search-block" style="display: none;">
                <label for="search-field" class="w-100 mb-0">
                    <input type="text" class="form-control" id="search-field"
                        placeholder="Type what you want and enter">
                </label>
                <span class="search-close">&times;</span>
            </div><!-- Site search end -->
        </div>
        <!--/ Container end -->

    </div>
    <!--/ Navigation end -->
</header>
