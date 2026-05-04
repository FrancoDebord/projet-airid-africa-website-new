
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
    <meta name="description" content="African Institute for Research In Infectious Diseases">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">

    <!-- Favicon
================================================== -->
    <link rel="icon" type="image/png" sizes="196x196" href="{{ asset('storage/assets/logo/airid.png') }}">

    <!-- CSS
================================================== -->
    <!-- Bootstrap -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
        {{-- <link rel="stylesheet" href="{{ asset('storage/assets_vendor/plugins/bootstrap/bootstrap.min.css') }}"> --}}
        <link rel="stylesheet" href="{{ asset('storage/assets_vendor/plugins/bootstrap/bootstrap-new-4.5.3.css') }}">
        {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"/> --}}

     
    <!-- FontAwesome -->
    <link rel="stylesheet" href="{{ asset('storage/assets_vendor/plugins/fontawesome/css/all.min.css') }}">
    <!-- Fallback CDN si les fichiers locaux ne se chargent pas (icônes footer, etc.) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Animation -->
    <link rel="stylesheet" href="{{ asset('storage/assets_vendor/plugins/animate-css/animate.css') }}">
    <!-- slick Carousel -->
    <link rel="stylesheet" href="{{ asset('storage/assets_vendor/plugins/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/assets_vendor/plugins/slick/slick-theme.css') }}">
    <!-- Colorbox -->
    <link rel="stylesheet" href="{{ asset('storage/assets_vendor/plugins/colorbox/colorbox.css') }}">
    <!-- Template styles-->
    <link rel="stylesheet" href="{{ asset('storage/assets_vendor/css/style.css') }}">
    <!-- Typographie projet : définie pour tout le site (référence: hero Advancing African-Led Science / Bold science / intro) -->
    <link rel="stylesheet" href="{{ asset('css/typography.css') }}">

    @yield('css')

</head>

{{-- <body style="background-image: url({{ asset("storage/assets/images/4-1.jpg") }}); background-position:cover; background-repeat:no-repeat"> --}}
<body style="">
    <div class="body-inner">

        <div id="top-bar" class="top-bar">
            {{-- <div class="container">
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
            </div> --}}
            <!--/ Container end -->
        </div>
        <!--/ Topbar end -->
        <!-- Header start -->
     @include('partials.header')
        <!--/ Header end -->

    

        @yield('content')

        @include('partials.footer')


        <!-- Javascript Files
  ================================================== -->

        <!-- initialize jQuery Library -->
        <script src="{{ asset("storage/assets_vendor/plugins/jQuery/jquery-new-slim.js")}}"></script>
        <script src="{{ asset("storage/assets_vendor/plugins/jQuery/popper.js")}}"></script>
        <!-- Bootstrap jQuery -->
        {{-- <script src="{{ asset("storage/assets_vendor/plugins/bootstrap/bootstrap.min.js")}}" defer></script> --}}
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> --}}
        <!-- jQuery -->
{{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<!-- Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script> --}}

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>

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
        
        {{-- <script src="{{ asset("storage/assets_vendor/plugins/jquery_marquee/jquery.marquee.min.js")}}" defer></script> --}}
        <!-- Template custom -->
        <script src="{{ asset("storage/assets_vendor/js/script.js")}}"></script>

        @yield('js')

    </div><!-- Body inner end -->
</body>

</html>
