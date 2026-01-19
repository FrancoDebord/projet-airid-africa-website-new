@extends('index')

@section('title', 'All Departments --AIRID')

@section('css')
    <style>
        /* ============================================
           ANIMATIONS AU SCROLL
           ============================================ */
        .fade-in-up {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }

        .fade-in-up.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* ============================================
           CARTES DE DÉPARTEMENTS MODERNES
           ============================================ */
        .department-card {
            background: #fff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 5px 25px rgba(0,0,0,0.08);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .department-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }

        .department-image-wrapper {
            position: relative;
            height: 280px;
            overflow: hidden;
        }

        .department-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .department-card:hover .department-image {
            transform: scale(1.15);
        }

        .department-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(194, 1, 2, 0.9) 0%, transparent 60%);
            display: flex;
            align-items: flex-end;
            justify-content: center;
            padding: 1.5rem;
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .department-card:hover .department-overlay {
            opacity: 1;
        }

        .view-details-btn {
            color: #fff;
            font-weight: 600;
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .department-content {
            padding: 2rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .department-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 1rem;
            line-height: 1.4;
        }

        .department-title a {
            color: #2c3e50;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .department-title a:hover {
            color: #c20102;
        }

        .department-description {
            color: #7f8c8d;
            line-height: 1.8;
            margin-bottom: 1.5rem;
            flex-grow: 1;
            font-size: 0.95rem;
        }

        .department-link {
            color: #c20102;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            transition: all 0.3s ease;
            margin-top: auto;
        }

        .department-link:hover {
            color: #8b0101;
            gap: 0.75rem;
        }

        .department-link i {
            transition: transform 0.3s ease;
        }

        .department-link:hover i {
            transform: translateX(5px);
        }

        /* ============================================
           RESPONSIVE
           ============================================ */
        @media (max-width: 768px) {
            .department-image-wrapper {
                height: 220px;
            }

            .department-content {
                padding: 1.5rem;
            }
        }
    </style>
@endsection

@section('content')
    <!-- Hero Section -->
    <div id="banner-area" class="banner-area"
        style="background-image:url({{ asset('storage/assets_vendor/images/banner/banner2_new.png') }})">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title top_title fade-in-up">All Departments</h1>
                            <p class="text-white mt-3 fade-in-up" style="font-size: 1.2rem;">
                                Discover our specialized research departments
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section Départements -->
    <section class="py-5">
        <div class="container">
            <div class="row text-center mb-5 fade-in-up">
                <div class="col-12">
                    <h2 class="section-title" style="font-size: 2.5rem; font-weight: 700; color: #2c3e50;">Our Departments</h2>
                    <p class="text-muted mb-4" style="font-size: 1.1rem;">
                        Explore our specialized research departments and their contributions to infectious disease research
                    </p>
                    <div class="title-divider mx-auto mt-3 mb-4" style="width: 100px; height: 4px; background: linear-gradient(135deg, #c20102 0%, #8b0101 100%); border-radius: 2px;"></div>
                </div>
            </div>

            <div class="row g-4">
                @forelse ($all_departements as $index => $departement)
                    <div class="col-lg-4 col-md-6 fade-in-up" style="transition-delay: {{ ($index % 3) * 0.1 }}s">
                        <div class="department-card">
                            <div class="department-image-wrapper">
                                <a href="{{ route('detailDepartementPage', ['id' => $departement->id, 'slug' => \Str::slug($departement->nom_departement)]) }}">
                                    <img 
                                        loading="lazy" 
                                        alt="{{ $departement->nom_departement }}" 
                                        class="department-image"
                                        src="{{ asset('storage/assets/departements/' . $departement->photo) }}"
                                    >
                                    <div class="department-overlay">
                                        <span class="view-details-btn">
                                            <i class="fas fa-arrow-right me-2"></i>
                                            View Details
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="department-content">
                                <h3 class="department-title">
                                    <a href="{{ route('detailDepartementPage', ['id' => $departement->id, 'slug' => \Str::slug($departement->nom_departement)]) }}">
                                        {{ $departement->nom_departement }}
                                    </a>
                                </h3>
                                <div class="department-description">
                                    {!! Str::limit(strip_tags($departement->description_accueil), 120) !!}
                                </div>
                                <a class="department-link" 
                                   href="{{ route('detailDepartementPage', ['id' => $departement->id, 'slug' => \Str::slug($departement->nom_departement)]) }}">
                                    Learn More
                                    <i class="fas fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 fade-in-up">
                        <div class="text-center py-5">
                            <i class="fas fa-building fa-4x text-muted mb-4"></i>
                            <h3 class="text-muted mb-3" style="font-weight: 600;">No departments registered yet</h3>
                            <p class="text-muted">Departments will be displayed here once they are added to the system.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        // ============================================
        // ANIMATIONS AU SCROLL
        // ============================================
        document.addEventListener('DOMContentLoaded', function() {
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            const animatedElements = document.querySelectorAll('.fade-in-up');
            animatedElements.forEach(el => {
                observer.observe(el);
            });
        });
    </script>
@endsection
