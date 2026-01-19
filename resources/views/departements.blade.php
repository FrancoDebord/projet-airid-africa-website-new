@extends('index')

@section('title', 'Department --Airid')

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
           DEPARTMENT HEADER
           ============================================ */
        .department-header {
            background: linear-gradient(135deg, rgba(194, 1, 2, 0.05) 0%, rgba(139, 1, 1, 0.05) 100%);
            padding: 2rem;
            border-radius: 15px;
            margin-bottom: 2rem;
        }

        .department-title {
            font-size: 2rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 1rem;
        }

        /* ============================================
           CONTENT SECTIONS
           ============================================ */
        .content-section {
            background: #fff;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.08);
            margin-bottom: 2rem;
        }

        .section-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 1.5rem;
            padding-bottom: 0.75rem;
            border-bottom: 3px solid #c20102;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .section-title i {
            color: #c20102;
        }

        /* ============================================
           SUB-DEPARTMENTS CARDS
           ============================================ */
        .sub-dept-card {
            background: #fff;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 25px rgba(0,0,0,0.08);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            height: 100%;
            border-top: 4px solid #c20102;
        }

        .sub-dept-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }

        .sub-dept-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .sub-dept-card:hover .sub-dept-image {
            transform: scale(1.1);
        }

        .sub-dept-content {
            padding: 1.5rem;
        }

        .sub-dept-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 0.75rem;
        }

        .sub-dept-title a {
            color: #2c3e50;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .sub-dept-title a:hover {
            color: #c20102;
        }

        .sub-dept-description {
            color: #7f8c8d;
            line-height: 1.7;
            margin-bottom: 1rem;
        }

        .sub-dept-link {
            color: #c20102;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
        }

        .sub-dept-link:hover {
            gap: 0.75rem;
        }

        .sub-dept-link i {
            transition: transform 0.3s ease;
        }

        .sub-dept-link:hover i {
            transform: translateX(5px);
        }

        /* ============================================
           SIDEBAR
           ============================================ */
        .sidebar-card {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.08);
            padding: 1.5rem;
            margin-bottom: 2rem;
        }

        .sidebar-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 1.5rem;
            padding-bottom: 0.75rem;
            border-bottom: 3px solid #c20102;
        }

        .other-dept-item {
            display: flex;
            gap: 1rem;
            padding: 1rem;
            border-radius: 10px;
            transition: all 0.3s ease;
            margin-bottom: 1rem;
            border: 2px solid #f0f0f0;
        }

        .other-dept-item:hover {
            background: #f8f9fa;
            border-color: #c20102;
            transform: translateX(5px);
        }

        .other-dept-thumb {
            width: 100px;
            height: 80px;
            border-radius: 10px;
            overflow: hidden;
            flex-shrink: 0;
        }

        .other-dept-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .other-dept-item:hover .other-dept-thumb img {
            transform: scale(1.1);
        }

        .other-dept-info {
            flex: 1;
        }

        .other-dept-title {
            font-size: 0.95rem;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 0.25rem;
            line-height: 1.4;
        }

        .other-dept-title a {
            color: #2c3e50;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .other-dept-title a:hover {
            color: #c20102;
        }

        /* ============================================
           RESPONSIVE
           ============================================ */
        @media (max-width: 768px) {
            .department-title {
                font-size: 1.5rem;
            }
        }
    </style>
@endsection

@section('content')
    <!-- Hero Section -->
    <div id="banner-area" class="banner-area"
        style="background-image:url({{ asset('storage/assets/departements/' . $departement->photo) }})">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title top_title fade-in-up">{{ $departement->nom_departement }}</h1>
                            <p class="text-white mt-3 fade-in-up" style="font-size: 1.2rem;">
                                Research Department
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section Contenu Principal -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <!-- Contenu Principal -->
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <!-- Image Hero -->
                    <div class="fade-in-up" style="border-radius: 20px; overflow: hidden; box-shadow: 0 10px 40px rgba(0,0,0,0.15); margin-bottom: 2rem;">
                        <img loading="lazy" 
                             src="{{ asset('storage/assets/departements/' . $departement->photo) }}"
                             alt="{{ $departement->nom_departement }}"
                             class="img-fluid"
                             style="width: 100%; height: 400px; object-fit: cover;">
                    </div>

                    <!-- Header du Département -->
                    <div class="department-header fade-in-up">
                        <h1 class="department-title">{{ $departement->nom_departement }}</h1>
                    </div>

                    <!-- Description -->
                    <div class="content-section fade-in-up">
                        <h2 class="section-title">
                            <i class="fas fa-info-circle"></i>About This Department
                        </h2>
                        <div class="section-content">
                            {!! $departement->description ?? '<p>No description available for this department.</p>' !!}
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Autres Départements -->
                    @if($others_departements && $others_departements->count() > 0)
                        <div class="sidebar-card fade-in-up">
                            <h3 class="sidebar-title">
                                <i class="fas fa-building me-2"></i>Other Departments
                            </h3>
                            @foreach($others_departements->take(5) as $other_depart)
                                <div class="other-dept-item">
                                    <div class="other-dept-thumb">
                                        <a href="{{ route('detailDepartementPage', ['id' => $other_depart->id, 'slug' => \Str::slug($other_depart->nom_departement)]) }}">
                                            <img loading="lazy" 
                                                 alt="{{ $other_depart->nom_departement }}"
                                                 src="{{ asset('storage/assets/departements/' . $other_depart->photo) }}">
                                        </a>
                                    </div>
                                    <div class="other-dept-info">
                                        <h4 class="other-dept-title">
                                            <a href="{{ route('detailDepartementPage', ['id' => $other_depart->id, 'slug' => \Str::slug($other_depart->nom_departement)]) }}">
                                                {{ $other_depart->nom_departement }}
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <!-- Chef de Département -->
                    @php
                        $supervisor = $departement->chefDepartement ?? null;
                    @endphp
                    @if($supervisor)
                        <div class="sidebar-card fade-in-up">
                            <h3 class="sidebar-title">
                                <i class="fas fa-user-tie me-2"></i>Department Head
                            </h3>
                            <div style="text-align: center; padding: 1.5rem; background: linear-gradient(135deg, rgba(194, 1, 2, 0.02) 0%, rgba(139, 1, 1, 0.02) 100%); border-radius: 15px;">
                                <img loading="lazy"
                                     src="{{ asset('storage/assets/staff/' . $supervisor->photo_personnel) }}"
                                     alt="{{ $supervisor->prenom_personnel . ' ' . $supervisor->nom_personnel }}"
                                     style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover; border: 4px solid #c20102; margin: 0 auto 1rem; box-shadow: 0 5px 20px rgba(0,0,0,0.1);">
                                <h4 style="font-size: 1.2rem; font-weight: 700; color: #2c3e50; margin-bottom: 0.5rem;">
                                    <a href="{{ route('detail-staff', ['id' => $supervisor->id, 'slug' => \Str::slug($supervisor->prenom_personnel . ' ' . $supervisor->nom_personnel)]) }}" 
                                       style="color: #2c3e50; text-decoration: none;">
                                        {{ $supervisor->titre . ' ' . $supervisor->prenom_personnel . ' ' . $supervisor->nom_personnel }}
                                    </a>
                                </h4>
                                @if($supervisor->posteOccupe)
                                    <p style="color: #7f8c8d; font-size: 0.95rem; margin-bottom: 1rem;">{{ $supervisor->posteOccupe->intitule_poste }}</p>
                                @endif
                                <div style="display: flex; justify-content: center; gap: 0.75rem;">
                                    <a href="#" target="_blank" style="width: 40px; height: 40px; border-radius: 50%; background: #f8f9fa; display: flex; align-items: center; justify-content: center; color: #7f8c8d; text-decoration: none; transition: all 0.3s ease;">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="#" target="_blank" style="width: 40px; height: 40px; border-radius: 50%; background: #f8f9fa; display: flex; align-items: center; justify-content: center; color: #7f8c8d; text-decoration: none; transition: all 0.3s ease;">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="#" target="_blank" style="width: 40px; height: 40px; border-radius: 50%; background: #f8f9fa; display: flex; align-items: center; justify-content: center; color: #7f8c8d; text-decoration: none; transition: all 0.3s ease;">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Sous-Départements -->
            @if($departement->sub_departements && $departement->sub_departements->count() > 0)
                <div class="row mt-5">
                    <div class="col-12">
                        <div class="content-section fade-in-up">
                            <h2 class="section-title">
                                <i class="fas fa-sitemap"></i>Sub-Departments
                            </h2>
                            <div class="row g-4">
                                @foreach($departement->sub_departements as $sous_departement)
                                    <div class="col-lg-4 col-md-6">
                                        <div class="sub-dept-card">
                                            <div style="position: relative; overflow: hidden; height: 200px;">
                                                <a href="{{ route('detailSubDepartement', ['id' => $sous_departement->id, 'slug' => \Str::slug($sous_departement->nom_sous_departement)]) }}">
                                                    <img loading="lazy" 
                                                         class="sub-dept-image"
                                                         src="{{ asset('storage/assets/sub_departements/' . $sous_departement->photo_sous_departement) }}"
                                                         alt="{{ $sous_departement->nom_sous_departement }}">
                                                </a>
                                            </div>
                                            <div class="sub-dept-content">
                                                <h3 class="sub-dept-title">
                                                    <a href="{{ route('detailSubDepartement', ['id' => $sous_departement->id, 'slug' => \Str::slug($sous_departement->nom_sous_departement)]) }}">
                                                        {{ $sous_departement->nom_sous_departement }}
                                                    </a>
                                                </h3>
                                                <p class="sub-dept-description">
                                                    {!! Str::limit($sous_departement->description_sous_departement, 120) !!}
                                                </p>
                                                <a class="sub-dept-link" 
                                                   href="{{ route('detailSubDepartement', ['id' => $sous_departement->id, 'slug' => \Str::slug($sous_departement->nom_sous_departement)]) }}">
                                                    Learn More
                                                    <i class="fas fa-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endif
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
