<header id="header" class="header-one">
    <div class="bg-white">
        <div class="container-fluid">
            <div class="logo-area">
                <div class="row align-items-center">
                    <div class="logo col-lg-3 text-center text-lg-left mb-3 mb-md-5 mb-lg-0">
                        <a class="d-block" href="{{ route("index") }}">
                            <img loading="lazy" src="{{ asset('storage/assets/logo/airid.jpg') }}" alt="AIRID">
                        </a>
                    </div><!-- logo end -->

                    <div class="col-lg-9 header-right d-none d-sm-block">
                        <ul class="top-info-box">
                            <li>
                                <div class="info-box">
                                    <div class="info-box-content">
                                        <p class="info-box-title">Call Us</p>
                                        <p class="info-box-subtitle">(+229) 01 67 16 44 99/ 01 95 03 33 33</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="info-box">
                                    <div class="info-box-content">
                                        <p class="info-box-title">Email Us</p>
                                        <p class="info-box-subtitle">info@airid-africa.com</p>
                                    </div>
                                </div>
                            </li>

                        </ul><!-- Ul end -->
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
                                <li class="nav-item dropdown {{ ($menu =='default' || $menu =="about-us" || $menu =="mission-vision" || $menu == "staff" ) ? "active":""}}">
                                    <a href="{{ route("index") }}" class="nav-link dropdown-toggle" data-toggle="dropdown">Home <i
                                            class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li class="{{ $menu =="default"?"active":"" }}"><a href="{{ route("index") }}">Welcome to AIRID</a></li>
                                        <li class="{{ $menu =="about-us"?"active":"" }}"><a href="{{ route("aboutPage") }}">About AIRID</a></li>
                                        <li class="{{ $menu =="mission-vision"?"active":"" }}"><a href="{{ route("MissionVisionPage") }}">Vision & Mission</a></li>
                                        <li {{ $menu =="staff"?"active":"" }}><a href="{{ route("staffAirid") }}">Staff</a></li>
                                    </ul>
                                </li>

                                @forelse ($departements_menu as $menu_departement)
                                    @php
                                        $sous_departements = $menu_departement->sub_departements;

                                        $menu_2 = request()->segment(2, 'default');
                                        $tab = explode("-",$menu_2);

                                        $departement_id = 0; 

                                        if(count($tab) > 1){
                                            
                                            $departement_id = $tab[0];
                                        }
                                        

                                    @endphp

                                    <li class="nav-item {{ $departement_id ==$menu_departement->id ?"active":""  }} "><a class="nav-link"
                                            href="{{ route('detailDepartementPage', ['id' => $menu_departement->id, 'slug' => \Str::slug($menu_departement->nom_departement)]) }}">{{ $menu_departement->nom_departement }}</a>
                                    </li>

                                @empty
                                @endforelse



                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Medias <i
                                            class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ route("allPublicationsPage") }}">Publications</a></li>
                                        <li><a href="#">News</a></li>
                                        <li><a href="{{ route('photosPage') }}">Our Gallery</a></li>
                                        <li><a href="{{ route("videoPage") }}">Video library</a></li>
                                        <li class="{{ $menu =="all-projects"?"active":"" }}"><a href="{{ route("allProjectsPage") }}">Projects</a></li>
                                        <li><a href="https://onlinetraining.airid-africa.com" target="_blank">Online Training
                                                Platform of AIRID</a></li>
                                    </ul>
                                </li>

                                <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <!--/ Col end -->
            </div>
            <!--/ Row end -->

            <div class="nav-search">
                <span id="search"><i class="fa fa-search"></i></span>
            </div><!-- Search end -->

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
