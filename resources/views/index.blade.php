
<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Basic Page Needs
================================================== -->
    <meta charset="utf-8">
    <title>
        @yield('title', 'AIRID AFRICA --Home')
    </title>

    <!-- Mobile Specific Metas
================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Construction Html5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name=author content="Themefisher">
    <meta name=generator content="Themefisher Constra HTML Template v1.0">

    <!-- Favicon
================================================== -->
    <link rel="icon" type="image/png" href="{{ asset('storage/assets/logo/airid.png') }}">

    <!-- CSS
================================================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('storage/assets_vendor/plugins/bootstrap/bootstrap.min.css') }}">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="{{ asset('storage/assets_vendor/plugins/fontawesome/css/all.min.css') }}">
    <!-- Animation -->
    <link rel="stylesheet" href="{{ asset('storage/assets_vendor/plugins/animate-css/animate.css') }}">
    <!-- slick Carousel -->
    <link rel="stylesheet" href="{{ asset('storage/assets_vendor/plugins/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/assets_vendor/plugins/slick/slick-theme.css') }}">
    <!-- Colorbox -->
    <link rel="stylesheet" href="{{ asset('storage/assets_vendor/plugins/colorbox/colorbox.css') }}">
    <!-- Template styles-->
    <link rel="stylesheet" href="{{ asset('storage/assets_vendor/css/style.css') }}">

</head>

<body>
    <div class="body-inner">

        <div id="top-bar" class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <ul class="top-info text-center text-md-left">
                            <li><i class="fas fa-map-marker-alt"></i>
                                <p class="info-text">Akpakpa Donaten, Cotonou, Benin Republic</p>
                            </li>
                        </ul>
                    </div>
                    <!--/ Top info end -->

                    <div class="col-lg-4 col-md-4 top-social text-center text-md-right">
                        <ul class="list-unstyled">
                            <li>
                                <a title="Facebook" href="https://facebbok.com/themefisher.com">
                                    <span class="social-icon"><i class="fab fa-facebook-f"></i></span>
                                </a>
                                <a title="Twitter" href="https://twitter.com/themefisher.com">
                                    <span class="social-icon"><i class="fab fa-twitter"></i></span>
                                </a>
                                <a title="Instagram" href="https://instagram.com/themefisher.com">
                                    <span class="social-icon"><i class="fab fa-instagram"></i></span>
                                </a>
                                <a title="Linkdin" href="https://www.linkedin.com/in/airid-social-135746357/">
                                    <span class="social-icon"><i class="fab fa-github"></i></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!--/ Top social end -->
                </div>
                <!--/ Content row end -->
            </div>
            <!--/ Container end -->
        </div>
        <!--/ Topbar end -->
        <!-- Header start -->
     @include('partials.header')
        <!--/ Header end -->

    

        @yield('content')

        
        <footer id="footer" class="footer bg-overlay">
            <div class="footer-main">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-lg-4 col-md-6 footer-widget footer-about">
                            <h3 class="widget-title">About Us</h3>
                            <img loading="lazy" width="200px" class="footer-logo" src="{{ asset("storage/assets/logo/airid1.jpg") }}"
                                alt="Constra">
                            <p>The African Institute for Research in Infectious Diseases is a leading African research center dedicated to advancing scientific knowledge and innovative solutions in the fight against infectious diseases.</p>
                            <div class="footer-social">
                                <ul>
                                    <li><a href="https://facebook.com/themefisher" aria-label="Facebook"><i
                                                class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="https://twitter.com/themefisher" aria-label="Twitter"><i
                                                class="fab fa-twitter"></i></a>
                                    </li>
                                    <li><a href="https://instagram.com/themefisher" aria-label="Instagram"><i
                                                class="fab fa-instagram"></i></a></li>
                                    <li><a href="https://github.com/themefisher" aria-label="Github"><i
                                                class="fab fa-github"></i></a></li>
                                </ul>
                            </div><!-- Footer social end -->
                        </div><!-- Col end -->

                        <div class="col-lg-4 col-md-6 footer-widget mt-5 mt-md-0">
                            <h3 class="widget-title">Get in touch with us</h3>
                            <div class="working-hours">

                                Secrétariat AIRID, Maison 115, Rue 1543 Donaten, AKPAKPA, (Rue SOBEPEC, 4e Von à gauche, dernier immeuble à gauche), Cotonou, Benin
                                <br><br> Email :  <span class="text-right"> <a href="mailto:info@airid-africa.com" >info@airid-africa.com</a> </span>
                                <br> Phone number: <span class="text-right"> <a href="tel:(+229) 01 67 16 44 99" > (+229) 01 67 16 44 99</a> </span>
                            </div>
                        </div><!-- Col end -->

                        <div class="col-lg-3 col-md-6 mt-5 mt-lg-0 footer-widget">
                            <h3 class="widget-title">Quick  links</h3>
                            <ul class="list-arrow">
                                <li><a href="{{ route("aboutPage") }}">About us</a></li>
                                <li><a href="{{ route("allProjectsPage") }}">All our projects</a></li>
                                <li><a href="#">News</a></li>
                                <li><a href="{{ route("allServicesPage") }}">All departments</a></li>
                                <li><a href="{{ route("allPublicationsPage") }}">Scientific Publications</a></li>
                            </ul>
                        </div><!-- Col end -->
                    </div><!-- Row end -->
                </div><!-- Container end -->
            </div><!-- Footer main end -->

            <div class="copyright">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="copyright-info">
                                <span>Copyright &copy;
                                    <script>
                                        document.write(new Date().getFullYear())
                                    </script>

                                AIRID
                                </span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="footer-menu text-center text-md-right">
                                <ul class="list-unstyled">
                                    <li><a href="#">Contact Us</a></li>
                                    <li><a href="#">Our Vision & Mission</a></li>
                                    <li><a href="#">Our Staff</a></li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- Row end -->

                    <div id="back-to-top" data-spy="affix" data-offset-top="10" class="back-to-top position-fixed">
                        <button class="btn btn-primary" title="Back to Top">
                            <i class="fa fa-angle-double-up"></i>
                        </button>
                    </div>

                </div><!-- Container end -->
            </div><!-- Copyright end -->
        </footer><!-- Footer end -->


        <!-- Javascript Files
  ================================================== -->

        <!-- initialize jQuery Library -->
        <script src="{{ asset("storage/assets_vendor/plugins/jQuery/jquery.min.js")}}"></script>
        <!-- Bootstrap jQuery -->
        <script src="{{ asset("storage/assets_vendor/plugins/bootstrap/bootstrap.min.js")}}" defer></script>
        <!-- Slick Carousel -->
        <script src="{{ asset("storage/assets_vendor/plugins/slick/slick.min.js")}}"></script>
        <script src="{{ asset("storage/assets_vendor/plugins/slick/slick-animation.min.js")}}"></script>
        <!-- Color box -->
        <script src="{{ asset("storage/assets_vendor/plugins/colorbox/jquery.colorbox.js")}}"></script>
        <!-- shuffle -->
        <script src="{{ asset("storage/assets_vendor/plugins/shuffle/shuffle.min.js")}}" defer></script>


        <!-- Google Map API Key-->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer></script>
        <!-- Google Map Plugin-->
        <script src="{{ asset("storage/assets_vendor/plugins/google-map/map.js")}}" defer></script>

        <!-- Template custom -->
        <script src="{{ asset("storage/assets_vendor/js/script.js")}}"></script>

    </div><!-- Body inner end -->
</body>

</html>
