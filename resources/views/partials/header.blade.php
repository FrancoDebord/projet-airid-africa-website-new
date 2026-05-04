    <header id="header" class="header-one">
        <div class="bg-white" style="height: 100px;">
            <div class="container-fluid">
                <div class="logo-area">
                    <div class="row align-items-center">
                        <div class="logo col-lg-3 text-center text-lg-left mb-3 mb-md-5 mb-lg-0">
                            <a class="d-block" href="{{ route('index') }}">
                                <img loading="lazy" src="{{ asset('storage/assets/logo/airid.png') }}" alt="AIRID">
                            </a>
                        </div>
                        <div class="col-lg-8 header-right d-none d-sm-block">
                            <p class="slogan-p mb-0"
                                style="font-size: 21px; font-weight: 700; color: white; border-radius: 25px; padding: 8px 12px; margin-left: 5%;">

                                <strong>Bold Science. African-Led. Impact-Driven</strong>

                            </p>
                        </div>
                        {{-- <div class="col-lg-3 header-utility d-none d-lg-flex align-items-center justify-content-end gap-2">
                            <a href="{{ route('myAiridPortal') }}" class="btn btn-outline-secondary btn-sm" title="Personal view – all AIRID sites and applications">My AIRID</a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>

        <div class="site-navigation">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg navbar-dark p-0">
                            <button class="navbar-toggler mobile-menu-toggle" type="button" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
                            </button>

                            @php
                                $seg1 = request()->segment(1);
                                $menuActive = function (...$segments) use ($seg1) {
                                    return in_array($seg1, $segments, true);
                                };
                            @endphp

                            <div id="navbar-collapse" class="collapse navbar-collapse">
                                <ul class="nav navbar-nav mr-auto">

                                    {{-- 1. Home --}}
                                    <li class="nav-item {{ !$seg1 || $seg1 === '' ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ route('index') }}">Home</a>
                                    </li>

                                    {{-- 2. About AIRID --}}
                                    <li
                                        class="nav-item dropdown {{ $menuActive('about-us', 'about', 'mission-vision', 'our-team', 'directors-message', 'board-directors-message') ? 'active' : '' }}">
                                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">About <i
                                                class="fa fa-angle-down"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="{{ route('aboutPage') }}">Our Vision</a></li>
                                            <li><a href="{{ route('pageAbout', 'history') }}">Our History</a></li>
                                            <li><a href="{{ route('pageAbout', 'strategy') }}">Our Strategy</a></li>
                                            <li><a href="{{ route('staffAirid') }}">Our Team</a> </li>
                                            <li><a href="{{ route('motDirecteur') }}">Executive Director's Message</a></li>
                                            <li><a href="{{ route('motBoardOfDirectors') }}" class="no-capitalize">Board of Directors</a> </li>
                                            {{--<ul class="dropdown-menu">
                                                    <li><a href=""></a></li>
                                                    <li><a href="{{ route('pageAbout', 'scientific-advisory-board') }}">Scientific Advisory Board</a></li>
                                                </ul>--}}
                                            <li><a href="{{ route('pageAbout', 'code-of-conduct') }}" class="no-capitalize">Code of Conduct</a>
                                            </li>
                                        </ul>
                                    </li>
    <style>
        .no-capitalize {
        text-transform: none !important;
    }
    </style>
                                    {{-- 3. Research & Innovation --}}
                                    <li
                                        class="nav-item dropdown {{ $menuActive('research-policy-practice', 'research-centre-policy-practice', 'research-activities', 'research-centre-vector-biology', 'research-centre-data-science', 'our-projects', 'our-publications', 'gavi-siri', 'optimvec', 'atsb', 'duranet', 'pamverc') ? 'active' : '' }}">
                                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Research
                                            <i class="fa fa-angle-down"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="{{ route('researchPolicyPracticePage') }}">Research Centres</a>
                                            </li>
                                            <li><a href="{{ route('researchActivitiesPage') }}">Research activities</a></li>
                                            <li><a href="{{ route('allProjectsPage') }}">Research Projects</a></li>
                                            {{-- <li><a href="{{ route('projetGaviSiriPage') }}">GAVI-SIRI</a></li --}}
                                            {{-- <li><a href="{{ route('projetOptimvecPage') }}">OPTIMVEC</a></li> --}}
                                            {{-- <li><a href="{{ route('projetATSBPage') }}">ATSB</a></li> --}}
                                            <li><a href="{{ route('pamvercBeninPage') }}">PAMVERC-Benin</a></li>
                                            {{-- <li><a href="{{ route('projetDuranetPage') }}">DuraNet® Plus</a></li> --}}
                                            {{-- <li><a href="{{ route('projetVesterguaardITNPage') }}">Vector Control Product
                                                    Evaluations</a></li> --}}
                                            <li><a href="{{ route('allPublicationsPage') }}">Publications</a></li>
                                        </ul>
                                    </li>

                                    {{-- 4. Facilities & Platforms --}}
                                    <li
                                        class="nav-item dropdown {{ $menuActive('facilities', 'our-insectary', 'our-labs', 'our-experimental-huts', 'molecular-lab', 'analytical-chemistry-lab') ? 'active' : '' }}">
                                        <a href="#" class="nav-link dropdown-toggle"
                                            data-toggle="dropdown">Facilities<i class="fa fa-angle-down"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li class="dropdown-submenu">
                                                <a href="{{ route('facilitiesLanding') }}" class="dropdown-toggle" data-toggle="dropdown">Insecticide Testing Facilities</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{ route('bioAssayLab') }}">Bioassay Laboratory</a></li>
                                                    <li><a href="{{ route('insectaryPage') }}">Insectary</a></li>
                                                    <li><a href="{{ route('animalHousePage') }}">Animal House</a></li>

                                                    <li><a href="{{ route('pageFacility', 'flight-rooms') }}">Flight Rooms</a></li>
                                                    {{-- <li><a href="{{ route('pageFacility', 'chemical-storage') }}">Chemical Storage</a></li> --}}
                                                    <li><a href="{{ route('mosquitoPlasmodiumLaboratoryPage') }}">Mosquito Infection Lab</a></li>


                                                </ul>
                                            </li>
                                            <li><a href="{{ route('fieldStationPage') }}">Field Research Platforms</a></li>
                                            <li><a href="{{ route('molecularLabPage') }}">Molecular Laboratory</a></li>
                                            <li><a href="{{ route('analyticalCheminstryLabPage') }}">Analytical Chemistry
                                                    Laboratory</a></li>
                                            <li><a href="{{ route('pageFacility', 'data-it') }}">Data Management & IT
                                                    Platforms</a></li>
                                        </ul>
                                    </li>

                                    {{-- 5. GLP Testing Services --}}
                                    <li class="nav-item dropdown {{ $menuActive('glp') ? 'active' : '' }}">
                                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">GLP
                                            Testing<i class="fa fa-angle-down"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="{{ route('glpPage', 'why-glp') }}">Why GLP</a></li>
                                            <li><a href="{{ route('glpPage', 'services') }}">GLP Services</a></li>
                                            <li><a href="{{ route('glpPage', 'quality-assurance') }}">Quality Assurance
                                                    </a></li>
                                            <li><a href="{{ route('glpPage', 'certification-sanas') }}">GLP Certification</a></li>
                                            <li><a href="{{ route('glpPage', 'organogram') }}"> GLP Testing Plan</a></li>
                                            <li><a href="{{ route('glpPage', 'who-pq-products-tested-at-our-facility') }}">Our portfolio</a></li>
                                            <li><a href="{{ route('glpPage', 'faq') }}"> GLP FAQ</a></li>
                                        </ul>
                                    </li>

                                    {{-- 6. Training & Partnerships --}}
                                    <li
                                        class="nav-item dropdown {{ $menuActive('education-training', 'training') ? 'active' : '' }}">
                                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Training
                                            <i class="fa fa-angle-down"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="{{ route('educationTrainingPage') }}">Training &amp; Capacity Strengthening</a></li>
                                            {{-- <li><a href="{{ route('partnersPage') }}">Partnerships &amp; Partners</a></li>
                                            <li class="dropdown-submenu">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Work With Us</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{ route('vacanciesPage') }}">Vacancies &amp; Studentships</a></li>
                                                    <li><a href="{{ route('pageTraining', 'procurements-tenders') }}">Procurements & Tenders</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="{{ route('getInvolvedPage') }}">Philanthropy</a></li> --}}
                                        </ul>
                                    </li>
                                    <li
                                        class="nav-item dropdown {{ $menuActive('our-partners', 'vacancies-at-airid', 'get-involved', 'philanthropy') ? 'active' : '' }}">
                                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"> GET
                                            INVOLVED
                                            <i class="fa fa-angle-down"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="{{ route('partnersPage') }}">Partnerships</a></li>
                                            {{-- <li class="dropdown-submenu">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Work With Us</a>
                                                <ul class="dropdown-menu">
                                                </ul>
                                            </li> --}}

                                            <li><a href="{{ route('vacanciesPage') }}">Vacancies &amp; Studentships</a>
                                            </li>

                                            <li><a href="{{ route('philanthropyPage') }}">Philanthropy</a></li>
                                            <li><a href="{{ route('pageTraining', 'procurements-tenders') }}">Procurements & Tenders</a></li>


                                        </ul>
                                    </li>

                                    {{-- 7. News & Insights --}}
                                    <li
                                        class="nav-item dropdown {{ $menuActive('news', 'newsletter-airid', 'our-photos', 'our-videos') ? 'active' : '' }}">
                                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">News<i
                                                class="fa fa-angle-down"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                            {{-- <li><a href="{{ route('newsPage') }}">News and Announcements (news panels)</a></li> --}}
                                            <li><a href="{{ url('/news#resources') }}">News & Announcements </a></li>
                                            <li><a href="{{ route('newsletterPage') }}">Newsletters</a></li>
                                            {{-- <li><a href="{{ url('/news#events') }}">Events</a></li> --}}
                                            <li><a href="{{ route('photosPage') }}">Our Gallery</a></li>
                                            <li><a href="{{ route('videoPage') }}">Our Videos</a></li>
                                        </ul>
                                    </li>

                                    {{-- 8. Contact --}}
                                    <li class="nav-item {{ $menuActive('contact') ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ route('contactPage') }}">Contact</a>
                                    </li>
                                    {{-- Get Involved (bouton pilule comme sur la maquette) --}}
                                    <li class="nav-item d-none d-lg-block align-self-center ml-2">
                                        <button onclick="window.location='{{ route('getInvolvedPage') }}'"
                                            class="get-involved-btn">
                                            Donations <i class="fas fa-hand-holding-heart heart-beat"></i>
                                        </button>
                                    </li>

                                    <style>
                                        .get-involved-btn {
                                            background: #e8a0a8;
                                            border: none;
                                            border-radius: 8px;
                                            color: #fff;
                                            font-weight: 600;
                                            text-transform: uppercase;
                                            padding: 3px 8px;
                                            font-size: 10px;
                                            letter-spacing: 0.2px;
                                            display: inline-flex;
                                            align-items: center;
                                            gap: 3px;
                                            cursor: pointer;
                                            white-space: nowrap;
                                            transition: background 0.3s ease, transform 0.2s ease;
                                        }

                                        /* Hover bouton */
                                        .get-involved-btn:hover {
                                            background: #d63b3b;
                                            /* rouge */
                                            transform: translateY(-1px);
                                        }

                                        /* Icône cœur battant */
                                        .heart-beat {
                                            font-size: 10px;
                                            animation: heartbeat 1.2s infinite;
                                        }

                                        /* Animation battement */
                                        @keyframes heartbeat {
                                            0% {
                                                transform: scale(1);
                                            }

                                            20% {
                                                transform: scale(1.3);
                                            }

                                            40% {
                                                transform: scale(1);
                                            }

                                            60% {
                                                transform: scale(1.3);
                                            }

                                            80% {
                                                transform: scale(1);
                                            }

                                            100% {
                                                transform: scale(1);
                                            }
                                        }
                                    </style>
                                    <li class="nav-item d-lg-none">
                                        <a class="nav-link get-involved-btn" href="{{ route('getInvolvedPage') }}">
                                            <span class="btn-text">Get Involved</span>
                                            <span class="btn-icon"><i class="fas fa-hand-holding-heart"></i></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Mobile menu sidebar -->
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
            @include('partials.header-mobile-nav')
        </div>
    </div>

    <style>
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
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            box-shadow: 0 4px 15px rgba(194, 1, 2, 0.3);
            font-size: 0.85rem;
        }

        .nav-item .get-involved-btn:hover {
            color: #ed1b1b !important;
            transform: translateY(-2px);
        }

        .nav-item .get-involved-pill {
            text-decoration: none;
            transition: transform 0.2s, box-shadow 0.2s, background 0.25s ease;
        }

        .nav-item .get-involved-pill:hover {
            color: #fff !important;
            background: #dc3545 !important;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(220, 53, 69, 0.4);
        }

        @keyframes heartbeat {

            0%,
            100% {
                transform: scale(1);
            }

            14% {
                transform: scale(1.25);
            }

            28% {
                transform: scale(1);
            }

            42% {
                transform: scale(1.25);
            }

            56%,
            100% {
                transform: scale(1);
            }
        }

        .get-involved-heart-icon {
            animation: heartbeat 1.2s ease-in-out infinite;
            display: inline-block;
        }

        .dropdown-submenu {
            position: relative;
        }

        .dropdown-submenu>.dropdown-menu {
            top: 0;
            left: 100%;
            margin-top: -1px;
            margin-left: 0;
            display: none;
        }

        .dropdown-submenu:hover>.dropdown-menu {
            display: block;
        }

        .dropdown-submenu>a::after {
            display: block;
            content: " ";
            float: right;
            width: 0;
            height: 0;
            border-color: transparent;
            border-style: solid;
            border-width: 5px 0 5px 5px;
            border-left-color: #ccc;
            margin-top: 5px;
            margin-right: -10px;
        }

        /* Dropdown uniquement : première lettre en majuscule, reste en minuscule, pas en gras */
        .site-navigation .dropdown-menu a,
        .site-navigation .dropdown-menu .dropdown-toggle {
            text-transform: capitalize;
            font-size: 0.9rem;
            font-weight: 400 !important;
        }

        .site-navigation .dropdown-menu {
            padding: 0.4rem 0;
            min-width: 12rem;
        }

        .site-navigation .dropdown-menu .dropdown-menu {
            padding: 0.35rem 0;
        }

        .site-navigation .dropdown-menu a,
        .site-navigation .dropdown-menu .dropdown-toggle {
            padding: 0.4rem 1rem;
        }

        .site-navigation .dropdown-divider {
            display: none !important;
        }

        .header-utility .btn {
            white-space: nowrap;
        }

        .mobile-menu-sidebar {
            position: fixed;
            top: 0;
            left: -100%;
            width: 85%;
            max-width: 350px;
            height: 100vh;
            background: #fff;
            z-index: 9999;
            transition: left 0.3s ease;
            overflow-y: auto;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        }

        .mobile-menu-sidebar.active {
            left: 0;
        }

        .mobile-menu-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.2rem 1.5rem;
            background: #f8f9fa;
            border-bottom: 2px solid #e9ecef;
        }

        .mobile-menu-logo img {
            max-height: 50px;
            width: auto;
        }

        .mobile-menu-close {
            background: none;
            border: none;
            font-size: 1.8rem;
            color: #333;
            cursor: pointer;
            padding: 0.5rem;
        }

        .mobile-menu-close:hover {
            color: #EB1616;
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
        }

        .mobile-nav-link:hover {
            background: #474747;
            color: #EB1616;
        }

        .mobile-nav-submenu {
            list-style: none;
            padding: 0;
            margin: 0;
            background: #f8f9fa;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }

        .mobile-nav-submenu li {
            margin: 0;
            padding: 0;
        }

        .mobile-nav-dropdown.active .mobile-nav-submenu {
            max-height: 2000px;
        }

        .mobile-nav-submenu a {
            display: block;
            padding: 0.5rem 1.25rem 0.5rem 2rem;
            color: #666;
            text-decoration: none;
        }

        .mobile-nav-submenu a:hover {
            color: #EB1616;
        }

        .get-involved-mobile {
            background: linear-gradient(135deg, #f14f4f 0%, #eb9c9c 100%);
            color: #fff !important;
            border-radius: 8px;
            margin: 1rem 1.5rem;
            justify-content: center;
            font-weight: 600;
        }

        @media (max-width: 991px) {
            .navbar-collapse {
                display: none !important;
            }
        }

        @media (min-width: 992px) {
            .mobile-menu-sidebar {
                display: none !important;
            }

            .mobile-menu-toggle {
                display: none !important;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
            var mobileMenuSidebar = document.getElementById('mobileMenuSidebar');
            var mobileMenuClose = document.getElementById('mobileMenuClose');
            if (mobileMenuToggle) {
                mobileMenuToggle.addEventListener('click', function() {
                    if (mobileMenuSidebar) {
                        mobileMenuSidebar.classList.add('active');
                        document.body.style.overflow = 'hidden';
                    }
                });
            }
            if (mobileMenuClose) {
                mobileMenuClose.addEventListener('click', function() {
                    if (mobileMenuSidebar) {
                        mobileMenuSidebar.classList.remove('active');
                        document.body.style.overflow = '';
                    }
                });
            }
            document.querySelectorAll('.mobile-nav-toggle').forEach(function(toggle) {
                toggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    var dropdown = this.parentElement;
                    var wasActive = dropdown.classList.contains('active');
                    document.querySelectorAll('.mobile-nav-dropdown').forEach(function(d) {
                        d.classList.remove('active');
                    });
                    if (!wasActive) dropdown.classList.add('active');
                });
            });
            document.querySelectorAll('.mobile-nav-link:not(.mobile-nav-toggle)').forEach(function(link) {
                link.addEventListener('click', function() {
                    if (!this.classList.contains('mobile-nav-toggle') && mobileMenuSidebar)
                        setTimeout(function() {
                            mobileMenuSidebar.classList.remove('active');
                            document.body.style.overflow = '';
                        }, 300);
                });
            });
        });
    </script>
