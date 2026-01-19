@extends('index')

@section('title', 'AIRID -- Detail Staff')

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
           STAFF PROFILE HEADER
           ============================================ */
        .staff-profile-header {
            background: linear-gradient(135deg, rgba(194, 1, 2, 0.05) 0%, rgba(139, 1, 1, 0.05) 100%);
            padding: 3rem 2rem;
            border-radius: 20px;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 2rem;
        }

        .staff-photo-wrapper {
            flex-shrink: 0;
        }

        .staff-photo {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid #c20102;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }

        .staff-info {
            flex: 1;
        }

        .staff-name {
            font-size: 2.2rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 0.5rem;
        }

        .staff-title {
            font-size: 1.1rem;
            color: #7f8c8d;
            margin-bottom: 0.5rem;
        }

        .staff-position {
            font-size: 1.2rem;
            color: #c20102;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .staff-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            margin-top: 1rem;
        }

        .staff-meta-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #7f8c8d;
            font-size: 0.95rem;
        }

        .staff-meta-item i {
            color: #c20102;
            width: 20px;
        }

        .staff-social {
            display: flex;
            gap: 0.75rem;
            margin-top: 1rem;
        }

        .staff-social a {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #7f8c8d;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .staff-social a:hover {
            background: #c20102;
            color: #fff;
            transform: translateY(-3px);
            box-shadow: 0 4px 15px rgba(194, 1, 2, 0.3);
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

        .section-content {
            line-height: 1.8;
            color: #555;
        }

        .section-content p {
            margin-bottom: 1rem;
        }

        /* ============================================
           INFO GRID
           ============================================ */
        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-top: 1.5rem;
        }

        .info-item {
            background: #f8f9fa;
            padding: 1.5rem;
            border-radius: 10px;
            border-left: 4px solid #c20102;
        }

        .info-item-label {
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .info-item-label i {
            color: #c20102;
        }

        .info-item-value {
            color: #555;
        }

        /* ============================================
           PROJECTS/PUBLICATIONS LIST
           ============================================ */
        .item-list {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .list-item {
            padding: 1rem;
            background: #f8f9fa;
            border-radius: 10px;
            border-left: 4px solid #c20102;
            transition: all 0.3s ease;
        }

        .list-item:hover {
            background: #fff;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transform: translateX(5px);
        }

        .list-item-title {
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 0.25rem;
        }

        .list-item-title a {
            color: #2c3e50;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .list-item-title a:hover {
            color: #c20102;
        }

        .list-item-meta {
            font-size: 0.9rem;
            color: #7f8c8d;
        }

        /* ============================================
           RESPONSIVE
           ============================================ */
        @media (max-width: 768px) {
            .staff-profile-header {
                flex-direction: column;
                text-align: center;
            }

            .staff-photo {
                width: 150px;
                height: 150px;
            }

            .staff-name {
                font-size: 1.5rem;
            }

            .info-grid {
                grid-template-columns: 1fr;
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
                            <h1 class="banner-title top_title fade-in-up">Team Member</h1>
                            <p class="text-white mt-3 fade-in-up" style="font-size: 1.2rem;">
                                Meet our dedicated research team
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section Profil -->
    <section class="py-5">
        <div class="container">
            <!-- Header du Profil -->
            <div class="staff-profile-header fade-in-up">
                <div class="staff-photo-wrapper">
                    <img loading="lazy"
                         src="{{ asset('storage/assets/staff/' . $staff->photo_personnel) }}"
                         alt="{{ $staff->prenom_personnel . ' ' . $staff->nom_personnel }}"
                         class="staff-photo">
                </div>
                <div class="staff-info">
                    <h1 class="staff-name">
                        {{ $staff->titre . ' ' . $staff->prenom_personnel . ' ' . $staff->nom_personnel }}
                    </h1>
                    @if($staff->posteOccupe)
                        <div class="staff-position">
                            <i class="fas fa-briefcase me-2"></i>{{ $staff->posteOccupe->intitule_poste }}
                        </div>
                    @endif
                    @if($staff->departement)
                        <div class="staff-title">
                            <i class="fas fa-building me-2" style="color: #c20102;"></i>
                            {{ $staff->departement->nom_departement }}
                        </div>
                    @endif
                    <div class="staff-meta">
                        @if($staff->email_personnel)
                            <div class="staff-meta-item">
                                <i class="fas fa-envelope"></i>
                                <a href="mailto:{{ $staff->email_personnel }}" style="color: #7f8c8d; text-decoration: none;">
                                    {{ $staff->email_personnel }}
                                </a>
                            </div>
                        @endif
                        @if($staff->telephone_personnel)
                            <div class="staff-meta-item">
                                <i class="fas fa-phone"></i>
                                <a href="tel:{{ $staff->telephone_personnel }}" style="color: #7f8c8d; text-decoration: none;">
                                    {{ $staff->telephone_personnel }}
                                </a>
                            </div>
                        @endif
                    </div>
                    <div class="staff-social">
                        <a href="#" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" target="_blank" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                        @if($staff->email_personnel)
                            <a href="mailto:{{ $staff->email_personnel }}" title="Email"><i class="fas fa-envelope"></i></a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Colonne Principale -->
                <div class="col-lg-8">
                    <!-- Biographie -->
                    @if($staff->biographie_personnel)
                        <div class="content-section fade-in-up">
                            <h2 class="section-title">
                                <i class="fas fa-user"></i>Biography
                            </h2>
                            <div class="section-content">
                                {!! $staff->biographie_personnel !!}
                            </div>
                        </div>
                    @endif

                    <!-- Qualifications -->
                    @if($staff->qualifications_personnel)
                        <div class="content-section fade-in-up">
                            <h2 class="section-title">
                                <i class="fas fa-graduation-cap"></i>Qualifications
                            </h2>
                            <div class="section-content">
                                {!! $staff->qualifications_personnel !!}
                            </div>
                        </div>
                    @endif

                    <!-- Recherche -->
                    @if($staff->interets_recherche)
                        <div class="content-section fade-in-up">
                            <h2 class="section-title">
                                <i class="fas fa-microscope"></i>Research Interests
                            </h2>
                            <div class="section-content">
                                {!! $staff->interets_recherche !!}
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Informations -->
                    <div class="content-section fade-in-up">
                        <h2 class="section-title">
                            <i class="fas fa-info-circle"></i>Information
                        </h2>
                        <div class="info-grid">
                            @if($staff->departement)
                                <div class="info-item">
                                    <div class="info-item-label">
                                        <i class="fas fa-building"></i>Department
                                    </div>
                                    <div class="info-item-value">
                                        {{ $staff->departement->nom_departement }}
                                    </div>
                                </div>
                            @endif
                            @if($staff->posteOccupe)
                                <div class="info-item">
                                    <div class="info-item-label">
                                        <i class="fas fa-briefcase"></i>Position
                                    </div>
                                    <div class="info-item-value">
                                        {{ $staff->posteOccupe->intitule_poste }}
                                    </div>
                                </div>
                            @endif
                            @if($staff->email_personnel)
                                <div class="info-item">
                                    <div class="info-item-label">
                                        <i class="fas fa-envelope"></i>Email
                                    </div>
                                    <div class="info-item-value">
                                        <a href="mailto:{{ $staff->email_personnel }}" style="color: #555;">
                                            {{ $staff->email_personnel }}
                                        </a>
                                    </div>
                                </div>
                            @endif
                            @if($staff->telephone_personnel)
                                <div class="info-item">
                                    <div class="info-item-label">
                                        <i class="fas fa-phone"></i>Phone
                                    </div>
                                    <div class="info-item-value">
                                        <a href="tel:{{ $staff->telephone_personnel }}" style="color: #555;">
                                            {{ $staff->telephone_personnel }}
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Projets (si disponibles) -->
                    @php
                        $staffProjects = $staff->projects ?? collect();
                    @endphp
                    @if($staffProjects && $staffProjects->count() > 0)
                        <div class="content-section fade-in-up">
                            <h2 class="section-title">
                                <i class="fas fa-project-diagram"></i>Projects
                            </h2>
                            <div class="item-list">
                                @foreach($staffProjects->take(5) as $project)
                                    <div class="list-item">
                                        <div class="list-item-title">
                                            <a href="{{ route('detailProject', ['id' => $project->id, 'slug' => \Str::slug($project->short_title_project)]) }}">
                                                {{ $project->short_title_project }}
                                            </a>
                                        </div>
                                        @if($project->date_debut_project)
                                            <div class="list-item-meta">
                                                <i class="far fa-calendar me-1"></i>
                                                {{ date('Y', strtotime($project->date_debut_project)) }}
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
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