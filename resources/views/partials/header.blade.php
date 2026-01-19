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

                        <p class="slogan-p" id="slogan-p" style="margin-left: -5% ; font-size: 25px; font-weight: bold;    ">
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
                        <button class="navbar-toggler mobile-menu-toggle" type="button" 
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon">
                                <i class="fas fa-bars" ></i>
                            </span>
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
                                        {{-- <li><a href="{{ route('fieldStationPage') }}">Field Station</a></li> --}}
                                        <li><a href="{{ route('animalHousePage') }}">Animal House</a></li>

                                    </ul>
                                </li>

                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Research
                                        Projects
                                        <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        {{-- <li><a href="{{ route("allProjectsPage") }}">All Projects</a></li> --}}
                                        <li class="dropdown-divider"></li>
                                        <li><a href="{{ route("projetGaviSiriPage") }}">GAVI-SIRI </a></li>
                                        <li><a href="{{ route("projetOptimvecPage") }}">OPTIMVEC</a></li>
                                        <li><a href="{{ route("projetATSBPage") }}">ATSB Knowledge Gaps</a></li>

                                        <li><a href="{{ route("projetVesterguaardITNPage") }}">VESTERGAARD ITN Testing</a></li>
                                        <li><a href="{{ route("projetDuranetPage") }}">Duranet Plus Community Evaluation</a></li>
                                        {{-- <li><a href="{{ route("projetSpatialRepellentsPage") }}">Spatial Repellents Project</a></li> --}}

                                        {{-- <li class="dropdown-submenu">
                                            <a href="#!" class="dropdown-toggle" data-toggle="dropdown">Product Development</a>
                                            <ul class="dropdown-menu">
                                                 <li><a href="{{ route("interceptorProductDevelopmentPage") }}">Interceptor </a></li>
                                                <li><a href="{{ route("duranetProductDevelopmentPage") }}">Duranet</a></li>
                                                <li><a href="{{ route("yorkoolProductDevelopmentPage") }}">Yorkool</a></li>
                                                <li><a href="{{ route("healthPulseProductDevelopmentPage") }}">Health Pulse</a></li>
                                                <li><a href="{{ route("yorkoolG4ProductDevelopmentPage") }}">Yorkool G4</a></li>
                                            </ul>
                                        </li> --}}
                                       
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
                                <li class="nav-item">
                                    <a class="nav-link get-involved-btn" href="{{ route('getInvolvedPage') }}">
                                        <span class="btn-text">Get Involved</span>
                                        <span class="btn-icon"><i class="fas fa-hand-holding-heart"></i></span>
                                    </a>
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

<!-- Menu Mobile Sidebar -->
<div class="mobile-menu-sidebar" id="mobileMenuSidebar">
    <div class="mobile-menu-header">
        <div class="mobile-menu-logo">
            <img loading="lazy" src="{{ asset('storage/assets/logo/airid.png') }}" alt="AIRID">
        </div>
        <button class="mobile-menu-close" id="mobileMenuClose" aria-label="Fermer le menu">
            <i class="fas fa-times"></i>
        </button>
    </div>
    
    <div class="mobile-menu-content">
        @php
            $menu = request()->segment(1, 'default');
        @endphp
        
        <ul class="mobile-nav-list">
            <li class="mobile-nav-item {{ $menu == 'defaut' ? 'active' : '' }}">
                <a href="{{ route('index') }}" class="mobile-nav-link">Home</a>
            </li>

            <li class="mobile-nav-item mobile-nav-dropdown {{ $menu == 'about-us' || $menu == 'mission-vision' || $menu == 'staff' ? 'active' : '' }}">
                <a href="#" class="mobile-nav-link mobile-nav-toggle">
                    About AIRID <i class="fa fa-angle-down"></i>
                </a>
                <ul class="mobile-nav-submenu">
                    <li class="{{ $menu == 'mission-vision' ? 'active' : '' }}">
                        <a href="{{ route('aboutPage') }}">Vision & Mission</a>
                    </li>
                    <li class="{{ $menu == 'default' ? 'active' : '' }}">
                        <a href="{{ route('motDirecteur') }}">Director's Message</a>
                    </li>
                    <li class="{{ $menu == 'default' ? 'active' : '' }}">
                        <a href="{{ route('motBoardOfDirectors') }}">Board of Directors' Message</a>
                    </li>
                    <li {{ $menu == 'staff' ? 'active' : '' }}>
                        <a href="{{ route('staffAirid') }}">Our Team</a>
                    </li>
                </ul>
            </li>

            <li class="mobile-nav-item mobile-nav-dropdown">
                <a href="#" class="mobile-nav-link mobile-nav-toggle">
                    Our Work <i class="fa fa-angle-down"></i>
                </a>
                <ul class="mobile-nav-submenu">
                    <li><a href="{{ route("researchActivitiesPage") }}">Research activities</a></li>
                    <li><a href="{{ route("educationTrainingPage") }}">Education & Trainings</a></li>
                    <li><a href="{{ route('allPublicationsPage') }}">Publications</a></li>
                    <li><a href="{{ route('partnersPage') }}">Partnerships</a></li>
                    <li><a href="{{ route('vacanciesPage') }}">Working with us</a></li>
                </ul>
            </li>

            <li class="mobile-nav-item mobile-nav-dropdown">
                <a href="#" class="mobile-nav-link mobile-nav-toggle">
                    Facilities <i class="fa fa-angle-down"></i>
                </a>
                <ul class="mobile-nav-submenu">
                    <li><a href="{{ route('bioAssayLab') }}">Insecticide testing Laboratories</a></li>
                    <li><a href="{{ route('molecularLabPage') }}">Molecular Lab</a></li>
                    <li><a href="{{ route('insectaryPage') }}">Insectary</a></li>
                    <li><a href="{{ route('experimentalHutStationPage') }}">Semi-field Station</a></li>
                    <li><a href="{{ route('mosquitoPlasmodiumLaboratoryPage') }}">Mosquito Plasmodium Infection Laboratory</a></li>
                    <li><a href="{{ route('analyticalCheminstryLabPage') }}">Analytical and Chemistry Lab</a></li>
                    <li><a href="{{ route('animalHousePage') }}">Animal House</a></li>
                </ul>
            </li>

            <li class="mobile-nav-item mobile-nav-dropdown">
                <a href="#" class="mobile-nav-link mobile-nav-toggle">
                    Research Projects <i class="fa fa-angle-down"></i>
                </a>
                <ul class="mobile-nav-submenu">
                    <li><a href="{{ route("projetGaviSiriPage") }}">GAVI-SIRI</a></li>
                    <li><a href="{{ route("projetOptimvecPage") }}">OPTIMVEC</a></li>
                    <li><a href="{{ route("projetATSBPage") }}">ATSB Knowledge Gaps</a></li>
                    <li><a href="{{ route("projetVesterguaardITNPage") }}">VESTERGAARD ITN Testing</a></li>
                    <li><a href="{{ route("projetDuranetPage") }}">Duranet Plus Community Evaluation</a></li>
                </ul>
            </li>

            <li class="mobile-nav-item mobile-nav-dropdown">
                <a href="#" class="mobile-nav-link mobile-nav-toggle">
                    Research Units <i class="fa fa-angle-down"></i>
                </a>
                <ul class="mobile-nav-submenu">
                    <li><a href="{{ route('pageCRECLSHTM') }}">CREC/LSHTM</a></li>
                    <li><a href="{{ route("pamvercBeninPage") }}">PAMVERC-BENIN</a></li>
                </ul>
            </li>

            <li class="mobile-nav-item mobile-nav-dropdown">
                <a href="#" class="mobile-nav-link mobile-nav-toggle">
                    Medias <i class="fa fa-angle-down"></i>
                </a>
                <ul class="mobile-nav-submenu">
                    <li><a href="{{ route("newsletterPage") }}">Newsletter</a></li>
                    <li><a href="{{ route('photosPage') }}">Our Gallery</a></li>
                    <li><a href="{{ route('videoPage') }}">Video library</a></li>
                    <li><a href="https://onlinetraining.airid-africa.com" target="_blank">Online Training Platform of AIRID</a></li>
                </ul>
            </li>

            <li class="mobile-nav-item">
                <a href="{{ route('contactPage') }}" class="mobile-nav-link">Contact</a>
            </li>

            <li class="mobile-nav-item">
                <a href="{{ route('getInvolvedPage') }}" class="mobile-nav-link get-involved-mobile">
                    <span>Get Involved</span>
                    <i class="fas fa-hand-holding-heart"></i>
                </a>
            </li>
        </ul>
    </div>
</div>

<style>
    /* ============================================
       BOUTON GET INVOLVED ANIMÉ
       ============================================ */
    .navbar-nav {
        display: flex;
        flex-wrap: nowrap;
        align-items: center;
    }

    .nav-item .get-involved-btn {
        position: relative;
        background: linear-gradient(135deg, #ec9e9e 0%, #eb9c9c 100%);
        color: #fff !important;
        border-radius: 50px;
        padding: 0.45rem 1rem !important;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.3px;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
        box-shadow: 0 4px 15px rgba(194, 1, 2, 0.3);
        white-space: nowrap;
        font-size: 0.85rem;
        margin-left: 0.3rem;
    }

    .nav-item .get-involved-btn::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.2);
        transform: translate(-50%, -50%);
        transition: width 0.6s ease, height 0.6s ease;
    }

    .nav-item .get-involved-btn:hover::before {
        width: 300px;
        height: 300px;
    }

    .nav-item .get-involved-btn:hover {
        transform: translateY(-3px) scale(1.05);
        box-shadow: 0 8px 25px rgba(248, 247, 247, 0.5);
        color: #fff !important;
    }

    .nav-item .get-involved-btn:active {
        transform: translateY(-1px) scale(1.02);
    }

    .nav-item .get-involved-btn .btn-text {
        position: relative;
        z-index: 1;
        transition: transform 0.3s ease;
    }

    .nav-item .get-involved-btn .btn-icon {
        position: relative;
        z-index: 1;
        font-size: 1rem;
        animation: pulse 2s infinite;
        transition: transform 0.3s ease;
    }

    .nav-item .get-involved-btn:hover .btn-icon {
        transform: scale(1.2) rotate(10deg);
        animation: none;
    }

    @keyframes pulse {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.15);
        }
    }

    /* Animation d'entrée au chargement */
    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .nav-item .get-involved-btn {
        animation: slideInRight 0.6s ease-out;
    }

    /* Responsive */
    @media (max-width: 991px) {
        .nav-item .get-involved-btn {
            margin-left: 0;
            margin-top: 0.5rem;
            width: 100%;
            justify-content: center;
        }
    }

    @media (max-width: 768px) {
        .nav-item .get-involved-btn {
            padding: 0.4rem 1rem !important;
            font-size: 0.85rem;
        }
    }

    /* ============================================
       MENU MOBILE - SIDEBAR GAUCHE
       ============================================ */
    
    /* Sidebar menu mobile */
    .mobile-menu-sidebar {
        position: fixed;
        top: 0;
        left: -100%;
        width: 85%;
        max-width: 350px;
        background-color: #fff;
        z-index: 9999;
        transition: left 0.3s ease;
        overflow-y: auto;
        box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
    }

    .mobile-menu-sidebar.active {
        left: 0;
    }

    /* Header du menu mobile */
    .mobile-menu-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1.2rem 1.5rem;
        background-color: #f8f9fa;
        border-bottom: 2px solid #e9ecef;
        position: sticky;
        top: 0;
        z-index: 10;
    }

    .mobile-menu-logo img {
        max-height: 50px;
        width: auto;
    }

    /* Bouton de fermeture */
    .mobile-menu-close {
        background: none;
        border: none;
        font-size: 1.8rem;
        color: #333;
        cursor: pointer;
        padding: 0.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        transition: all 0.3s ease;
    }

    .mobile-menu-close:hover {
        background-color: #e9ecef;
        color: #EB1616;
        transform: rotate(90deg);
    }

    /* Contenu du menu */
    .mobile-menu-content {
        padding: 1rem 0;
    }

    .mobile-nav-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .mobile-nav-item {
        border-bottom: 1px solid #e9ecef;
    }

    .mobile-nav-link {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 1rem 1.5rem;
        color: #333;
        text-decoration: none;
        font-weight: 500;
        font-size: 0.95rem;
        transition: all 0.3s ease;
    }

    .mobile-nav-link:hover {
        background-color: #f8f9fa;
        color: #EB1616;
        padding-left: 2rem;
    }

    .mobile-nav-item.active > .mobile-nav-link {
        color: #EB1616;
        background-color: #fff5f5;
        border-left: 3px solid #EB1616;
    }

    .mobile-nav-toggle {
        cursor: pointer;
    }

    .mobile-nav-toggle i {
        transition: transform 0.3s ease;
        font-size: 0.9rem;
    }

    .mobile-nav-dropdown.active .mobile-nav-toggle i {
        transform: rotate(180deg);
    }

    /* Sous-menu */
    .mobile-nav-submenu {
        list-style: none;
        padding: 0;
        margin: 0;
        background-color: #f8f9fa;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease;
    }

    .mobile-nav-dropdown.active .mobile-nav-submenu {
        max-height: 1000px;
    }

    .mobile-nav-submenu li {
        border-bottom: 1px solid #e9ecef;
    }

    .mobile-nav-submenu li:last-child {
        border-bottom: none;
    }

    .mobile-nav-submenu a {
        display: block;
        padding: 0.85rem 1.5rem 0.85rem 2.5rem;
        color: #666;
        text-decoration: none;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }

    .mobile-nav-submenu a:hover {
        background-color: #fff;
        color: #EB1616;
        padding-left: 3rem;
    }

    .mobile-nav-submenu li.active a {
        color: #EB1616;
        font-weight: 600;
    }

    /* Bouton Get Involved mobile */
    .get-involved-mobile {
        background: linear-gradient(135deg, #ec9e9e 0%, #eb9c9c 100%);
        color: #fff !important;
        border-radius: 8px;
        margin: 1rem 1.5rem;
        justify-content: center;
        gap: 0.5rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.3px;
    }

    .get-involved-mobile:hover {
        background: linear-gradient(135deg, #eb9c9c 0%, #e89a9a 100%);
        color: #fff !important;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(235, 28, 28, 0.3);
    }

    /* Bouton toggle hamburger */
    .mobile-menu-toggle {
        border: none;
        background: none;
        padding: 0.5rem;
        cursor: pointer;
    }

    .mobile-menu-toggle .navbar-toggler-icon {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .mobile-menu-toggle .navbar-toggler-icon i {
        font-size: 1.5rem;
        color: #fff;
    }

    /* Masquer le menu mobile sur desktop */
    @media (min-width: 992px) {
        .mobile-menu-sidebar {
            display: none;
        }
        
        .mobile-menu-toggle {
            display: none;
        }
    }

    /* Afficher le menu mobile uniquement sur mobile */
    @media (max-width: 991px) {
        .navbar-collapse {
            display: none !important;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
        const mobileMenuSidebar = document.getElementById('mobileMenuSidebar');
        const mobileMenuClose = document.getElementById('mobileMenuClose');
        const mobileNavToggles = document.querySelectorAll('.mobile-nav-toggle');

        // Ouvrir le menu
        if (mobileMenuToggle) {
            mobileMenuToggle.addEventListener('click', function() {
                mobileMenuSidebar.classList.add('active');
                document.body.style.overflow = 'hidden';
            });
        }

        // Fermer le menu
        function closeMobileMenu() {
            mobileMenuSidebar.classList.remove('active');
            document.body.style.overflow = '';
        }

        if (mobileMenuClose) {
            mobileMenuClose.addEventListener('click', closeMobileMenu);
        }

        // Toggle des sous-menus
        mobileNavToggles.forEach(function(toggle) {
            toggle.addEventListener('click', function(e) {
                e.preventDefault();
                const parent = this.parentElement;
                parent.classList.toggle('active');
            });
        });

        // Fermer le menu lors du clic sur un lien
        const mobileNavLinks = document.querySelectorAll('.mobile-nav-link:not(.mobile-nav-toggle)');
        mobileNavLinks.forEach(function(link) {
            link.addEventListener('click', function() {
                if (!this.classList.contains('mobile-nav-toggle')) {
                    setTimeout(closeMobileMenu, 300);
                }
            });
        });
    });
</script>
