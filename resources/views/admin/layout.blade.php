<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin-airid</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="196x196" href="{{ asset('storage/assets/logo/airid.png') }}">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>

   <style>
    body {
        background-color: #f8f9fa;
    }
</style>
    <div class="container-fluid position-relative d-flex p-0">


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-white navbar-light">
                <a href="{{ route('admin.dashboard') }}" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary">AIRID Admin</h3>
                </a>
                    @php
                    $personnel = Auth::guard('personnel')->user();
                @endphp
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; font-size: 18px; font-weight: bold;">
                            @if($personnel)
                                {{ substr($personnel->prenom_personnel ?? '', 0, 1) . substr($personnel->nom_personnel ?? '', 0, 1) }}
                            @else
                                AD
                            @endif
                        </div>
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        @if($personnel)
                            <h6 class="mb-0" style="color: black">{{ $personnel->prenom_personnel ?? '' }} {{ $personnel->nom_personnel ?? '' }}</h6>
                            <span>{{ $personnel->posteOccupe->intitule_poste ?? 'Staff' }}</span>
                        @else
                            <h6 class="mb-0" style="color: black">Admin</h6>
                            <span>Staff</span>
                        @endif
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="{{ route('admin.dashboard') }}" class="nav-item nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-users me-2"></i>Staff</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{ route('admin.staff.index') }}" class="dropdown-item">Liste Staff</a>
                            <a href="{{ route('admin.staff.create') }}" class="dropdown-item">Ajouter Staff</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-book me-2"></i>Publications</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{ route('admin.publications.index') }}" class="dropdown-item">Liste Publications</a>
                            <a href="{{ route('admin.publications.create') }}" class="dropdown-item">Ajouter Publication</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-briefcase me-2"></i>Vacancies</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{ route('admin.vacancies.index') }}" class="dropdown-item" >Liste Vacancies</a>
                            <a href="{{ route('admin.vacancies.create') }}" class="dropdown-item" >Ajouter Vacancy</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-handshake me-2"></i>Partenaires</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{ route('admin.partners.index') }}" class="dropdown-item">Liste Partenaires</a>
                            <a href="{{ route('admin.partners.create') }}" class="dropdown-item">Ajouter Partenaire</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-project-diagram me-2"></i>Projets</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{ route('admin.projects.index') }}" class="dropdown-item">Liste Projets</a>
                            <a href="{{ route('admin.projects.create') }}" class="dropdown-item">Ajouter Projet</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-newspaper me-2"></i>News</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{ route('admin.news.index') }}" class="dropdown-item">Liste News</a>
                            <a href="{{ route('admin.news.create') }}" class="dropdown-item">Ajouter News</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-blog me-2"></i>Blog</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{ route('admin.blogs.index') }}" class="dropdown-item">Liste Blogs</a>
                            <a href="{{ route('admin.blogs.create') }}" class="dropdown-item">Ajouter Blog</a>
                        </div>
                    </div>
                    <div class="nav-item mt-3 pt-3 border-top">
                        <form action="{{ route('admin.logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link text-danger w-100 text-start p-0" style="border: none; background: none;">
                                <i class="fa fa-sign-out-alt me-2"></i>Déconnexion
                            </button>
                        </form>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-white navbar-light sticky-top px-4 py-0">
                <a href="{{ route('admin.dashboard') }}" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0" style="color: darkred">
                    <i class="fa fa-bars"></i>
                </a>
               
                <div class="navbar-nav align-items-center ms-auto">
                   
                   
                    @php
                        $personnel = Auth::guard('personnel')->user();
                    @endphp
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-lg-2" style="width: 40px; height: 40px; font-size: 18px; font-weight: bold;">
                                @if($personnel)
                                    {{ substr($personnel->prenom_personnel ?? '', 0, 1) . substr($personnel->nom_personnel ?? '', 0, 1) }}
                                @else
                                    AD
                                @endif
                            </div>
                            {{-- <span class="d-none d-lg-inline-flex">{{ $personnel->prenom_personnel }} {{ $personnel->nom_personnel }}</span> --}}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-white border-0 rounded-0 rounded-bottom m-0">
                            @if($personnel)
                                <a href="{{ route('admin.staff.edit', $personnel->id) }}" class="dropdown-item">My Profile</a>
                            @endif
                            {{-- <a href="{{ route('detail-staff', ['id' => session('admin_personnel')->id, 'slug' => \Illuminate\Support\Str::slug(session('admin_personnel')->nom_personnel)]) }}" class="dropdown-item">View Profile</a> --}}
                            <form action="{{ route('admin.logout') }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="dropdown-item">Log Out</button>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            @yield('content')

            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-white rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">AIRID</a>, All Right Reserved.
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->

<style>
    a{ color: black; }
    h6{ color: black; }

/* Styles pour tous les champs de formulaire */
.form-control,
.form-control:focus,
.form-control:active,
input.form-control,
input.form-control:focus,
input.form-control:active,
textarea.form-control,
textarea.form-control:focus,
textarea.form-control:active,
select.form-control,
select.form-control:focus,
select.form-control:active {
    background-color: white !important; 
    color: black !important;
    border-color: #ced4da !important;
}

.form-control::placeholder {
    color: #6c757d !important;
    opacity: 1;
}

.form-control:-webkit-autofill,
.form-control:-webkit-autofill:hover,
.form-control:-webkit-autofill:focus,
.form-control:-webkit-autofill:active {
    -webkit-box-shadow: 0 0 0 30px white inset !important;
    -webkit-text-fill-color: black !important;
    box-shadow: 0 0 0 30px white inset !important;
}

</style>
        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/chart/chart.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
