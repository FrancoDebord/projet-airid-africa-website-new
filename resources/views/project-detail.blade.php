@extends('index')

@section('title', 'AIRID --Detail Project')

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
           HERO IMAGE
           ============================================ */
        .project-hero-image {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0,0,0,0.15);
            margin-bottom: 2rem;
        }

        .project-hero-image img {
            width: 100%;
            height: 400px;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .project-hero-image:hover img {
            transform: scale(1.05);
        }

        /* ============================================
           PROJECT HEADER
           ============================================ */
        .project-header {
            background: linear-gradient(135deg, rgba(194, 1, 2, 0.05) 0%, rgba(139, 1, 1, 0.05) 100%);
            padding: 2rem;
            border-radius: 15px;
            margin-bottom: 2rem;
        }

        /* Meta + badge sur la même ligne */
        .project-header-top {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .project-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            margin-bottom: 0;
        }

        .project-meta-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: var(--airid-text-size);
            color: var(--airid-text-color);
        }

        .project-meta-item i {
            color: #c20102;
            width: 20px;
        }

        .project-status-badge {
            display: inline-block;
            padding: 0.5rem 1.2rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: var(--airid-tagline-size);
            margin-bottom: 0;
            flex-shrink: 0;
        }

        .badge-ongoing {
            background: rgba(39, 174, 96, 0.1);
            color: #27ae60;
        }

        .badge-ended {
            background: rgba(149, 165, 166, 0.1);
            color: #95a5a6;
        }

        .project-title {
            font-size: var(--airid-h1-size);
            font-weight: 700;
            color: var(--airid-title-color);
            line-height: 1.3;
            margin-bottom: 0.5rem;
        }

        .project-short-title {
            font-size: var(--airid-tagline-size);
            color: var(--airid-text-color);
            font-weight: 600;
        }

        /* ============================================
           PROJECT CONTENT
           ============================================ */
        .project-content {
            background: #fff;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.08);
            margin-bottom: 2rem;
        }

        .project-content h2,
        .project-content h3,
        .project-content h4 {
            font-size: var(--airid-h2-size);
            color: var(--airid-title-color);
            margin-top: 2rem;
            margin-bottom: 1rem;
            font-weight: 700;
        }

        .project-content h2 {
            border-bottom: 3px solid #c20102;
            padding-bottom: 0.5rem;
        }

        .project-content p {
            font-size: var(--airid-text-size);
            line-height: var(--airid-text-line-height);
            color: var(--airid-text-color);
            margin-bottom: 1rem;
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
            font-size: var(--airid-h3-size);
            font-weight: 700;
            color: var(--airid-title-color);
            margin-bottom: 1.5rem;
            padding-bottom: 0.75rem;
            border-bottom: 3px solid #c20102;
        }

        /* ============================================
           OTHER PROJECTS
           ============================================ */
        .other-project-item {
            display: flex;
            gap: 1rem;
            padding: 1rem;
            border-radius: 10px;
            transition: all 0.3s ease;
            margin-bottom: 1rem;
            border: 2px solid #f0f0f0;
        }

        .other-project-item:hover {
            background: #f8f9fa;
            border-color: #c20102;
            transform: translateX(5px);
        }

        .other-project-thumb {
            width: 100px;
            height: 80px;
            border-radius: 10px;
            overflow: hidden;
            flex-shrink: 0;
        }

        .other-project-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .other-project-item:hover .other-project-thumb img {
            transform: scale(1.1);
        }

        .other-project-info {
            flex: 1;
        }

        .other-project-title {
            font-size: var(--airid-text-size);
            font-weight: 600;
            color: var(--airid-title-color);
            margin-bottom: 0.25rem;
            line-height: 1.4;
        }

        .other-project-title a {
            color: var(--airid-title-color);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .other-project-title a:hover {
            color: #c20102;
        }

        /* ============================================
           STUDY DIRECTOR CARD
           ============================================ */
        .director-card {
            text-align: center;
            padding: 1.5rem;
            background: linear-gradient(135deg, rgba(194, 1, 2, 0.02) 0%, rgba(139, 1, 1, 0.02) 100%);
            border-radius: 15px;
        }

        .director-image {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #c20102;
            margin: 0 auto 1rem;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        .director-name {
            font-size: var(--airid-h3-size);
            font-weight: 700;
            color: var(--airid-title-color);
            margin-bottom: 0.5rem;
        }

        .director-name a {
            color: var(--airid-title-color);
            text-decoration: none;
        }

        .director-name a:hover {
            color: #c20102;
        }

        .director-position {
            font-size: var(--airid-text-size);
            color: var(--airid-text-color);
            margin-bottom: 1rem;
        }

        .director-social {
            display: flex;
            justify-content: center;
            gap: 0.75rem;
        }

        .director-social a {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--airid-text-color);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .director-social a:hover {
            background: #c20102;
            color: #fff;
            transform: translateY(-3px);
        }

        /* ============================================
           RESPONSIVE
           ============================================ */
        @media (max-width: 768px) {
            .project-hero-image img {
                height: 250px;
            }

            .project-title {
                font-size: var(--airid-h2-size);
            }

            .project-meta {
                flex-direction: column;
                gap: 0.75rem;
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
                            <h1 class="banner-title top_title fade-in-up">Project Details</h1>
                            <p class="text-white mt-3 fade-in-up tagline mb-0" style="font-size: large" >
                                {{ $projet->short_title_project ?? 'Research Project' }}
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
                    <div class="project-hero-image fade-in-up">
                        <img loading="lazy"
                             src="{{ asset('storage/assets/projects/' . $projet->photo_couverture) }}"
                             alt="{{ $projet->short_title_project }}">
                    </div>

                    <!-- Header du Projet -->
                    <div class="project-header fade-in-up">
                        <div class="project-header-top">
                            <div class="project-meta">
                                <div class="project-meta-item">
                                    <i class="fas fa-calendar-alt"></i>
                                    <span>Started: {{ $projet->date_debut_project ? date("F j, Y", strtotime($projet->date_debut_project)) : 'N/A' }}</span>
                                </div>
                                
                                @if($projet->date_fin_project)
                                    <div class="project-meta-item">
                                        <i class="fas fa-calendar-check"></i>
                                        <span>Ended: {{ date("F j, Y", strtotime($projet->date_fin_project)) }}</span>
                                    </div>
                                @endif
                                @if($projet->category)
                                    <div class="project-meta-item">
                                        <i class="fas fa-folder"></i>
                                        <span>{{ $projet->category->nom_categorie ?? 'Project' }}: {{ $projet->short_title_project ?? 'Research Project' }}</span>
                                    </div>
                                @endif
                            </div>
                            @php
                                $statusClass = $projet->etat_projet === 'ongoing' ? 'badge-ongoing' : 'badge-ended';
                                $statusText = ucfirst($projet->etat_projet ?? 'ongoing');
                            @endphp
                            <span class="project-status-badge {{ $statusClass }}">
                                <i class="fas {{ $projet->etat_projet === 'ongoing' ? 'fa-spinner' : 'fa-check-circle' }} me-2"></i>
                                {{ $statusText }}
                            </span>
                        </div>

                        {{-- <h1 class="project-title">{{ $projet->long_title_project }}</h1>
                        @if($projet->short_title_project)
                            <p class="project-short-title">{{ $projet->short_title_project }}</p>
                        @endif --}}
                     </div>

                    <!-- Contenu du Projet -->
                    <div class="project-content fade-in-up">
                        @if($projet->resume)
                            <div class="mb-4">
                                <h2>Overview</h2>
                                <p class="section-lead">{{ $projet->resume }}</p>
                            </div>
                        @endif

                        <div>
                            <h2>Project Description</h2>
                            {!! $projet->description_riche ?? "<p class='text-justify'>No description available for this project.</p>" !!}
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Autres Projets -->
                    @if($others_projects && $others_projects->count() > 0)
                        <div class="sidebar-card fade-in-up">
                            <h3 class="sidebar-title">
                                <i class="fas fa-project-diagram me-2"></i>Other Projects
                            </h3>
                            @foreach($others_projects->take(5) as $other_projet)
                                <div class="other-project-item">
                                    <div class="other-project-thumb">
                                        <a href="{{ route('detailProject', ['id' => $other_projet->id, 'slug' => \Str::slug($other_projet->short_title_project)]) }}">
                                            <img loading="lazy"
                                                 alt="{{ $other_projet->short_title_project }}"
                                                 src="{{ asset('storage/assets/projects/' . $other_projet->photo_couverture) }}">
                                        </a>
                                        </div>
                                    <div class="other-project-info">
                                        <h4 class="other-project-title">
                                            <a href="{{ route('detailProject', ['id' => $other_projet->id, 'slug' => \Str::slug($other_projet->short_title_project)]) }}">
                                                {{ $other_projet->short_title_project }}
                                            </a>
                                            </h4>
                                        </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <!-- Study Director -->
                    @php
                        $supervisor = $projet->studyDirector ?? null;
                    @endphp
                    @if($supervisor)
                        <div class="sidebar-card fade-in-up">
                            <h3 class="sidebar-title">
                                <i class="fas fa-user-tie me-2" style="color: #c20102;"></i>Principal Investigator
                            </h3>
                            <div class="director-card">
                                    <img loading="lazy"
                                        src="{{ $supervisor->photo_url ?? '/storage/assets_vendor/images/team/placeholder.jpg' }}"
                                     alt="{{ $supervisor->prenom_personnel . ' ' . $supervisor->nom_personnel }}"
                                     class="director-image">
                                <h4 class="director-name">
                                    <a href="{{ route('detail-staff', ['id' => $supervisor->id, 'slug' => \Str::slug($supervisor->prenom_personnel . ' ' . $supervisor->nom_personnel)]) }}">
                                        {{ $supervisor->titre . ' ' . $supervisor->prenom_personnel . ' ' . $supervisor->nom_personnel }}
                                    </a>
                                </h4>
                                @if($supervisor->posteOccupe)
                                    <p class="director-position" style="color: #c20102;">{{ $supervisor->posteOccupe->intitule_poste }}</p>
                                @endif
                                {{-- <div class="director-social">
                                    <a href="#" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a>
                                    <a href="#" target="_blank" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                                </div> --}}
                            </div>
                        </div>
                    @endif

                    <!-- Project Manager -->
                    @php
                        $projectManager = $projet->projectManager ?? null;
                    @endphp
                    @if($projectManager)
                        <div class="sidebar-card fade-in-up">
                            <h3 class="sidebar-title">
                                <i class="fas fa-user-cog me-2" style="color: #c20102;"></i>Project Manager
                                    </h3>
                            <div class="director-card">
                                <img loading="lazy"
                                     src="{{ $projectManager->photo_url ?? asset('storage/assets_vendor/images/team/placeholder.jpg') }}"
                                     alt="{{ $projectManager->prenom_personnel . ' ' . $projectManager->nom_personnel }}"
                                     class="director-image">
                                <h4 class="director-name">
                                    <a href="{{ route('detail-staff', ['id' => $projectManager->id, 'slug' => \Str::slug($projectManager->prenom_personnel . ' ' . $projectManager->nom_personnel)]) }}">
                                        {{ $projectManager->titre . ' ' . $projectManager->prenom_personnel . ' ' . $projectManager->nom_personnel }}
                                    </a>
                                </h4>
                                @if($projectManager->posteOccupe)
                                    <p class="director-position" style="color: #c20102;">{{ $projectManager->posteOccupe->intitule_poste }}</p>
                                @endif
                                    </div>
                                </div>
                    @endif

                    <!-- Sponsor -->
                    @php
                        $sponsor = $projet->sponsor ?? null;
                    @endphp
                    @if($sponsor)
                        <div class="sidebar-card fade-in-up">
                            <h3 class="sidebar-title">
                                <i class="fas fa-handshake me-2"></i>Sponsor
                            </h3>
                            <div class="text-center">
                                @if($sponsor->logo_partenaire)
                                    <img loading="lazy"
                                         src="{{ asset('storage/assets/logo/' . $sponsor->logo_partenaire) }}"
                                         alt="{{ $sponsor->nom_partenaire }}"
                                         style="max-height: 100px; max-width: 200px; margin-bottom: 1rem;">
                                @endif
                                <h5 style="color: var(--airid-title-color); font-weight: 600;">{{ $sponsor->nom_partenaire }}</h5>
                                @if($sponsor->site_web)
                                    <a href="{{ $sponsor->site_web }}" target="_blank" class="btn btn-sm btn-outline-primary mt-2">
                                        <i class="fas fa-external-link-alt me-2"></i>Visit Website
                                    </a>
                                @endif
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
{{--
        <div class="container">
            <h3>Key Personnel associated</h3>
            <div class="row">

                @forelse ($projet->personnelsTeam??[] as $personnelsTeam)
                    <div class="col-lg-4 col-md-6 mb-5">
                        <div class="ts-service-box">
                            <div class="ts-service-image-wrapper">

                                    <img loading="lazy" class="w-100"
                                        src="{{ $personnelsTeam->photo_url ?? '/storage/assets_vendor/images/team/placeholder.jpg' }}"
                                        alt="service-image">

                            </div>
                            <div class="d-flex">
                                <div class="ts-service-box-img">

                                </div>
                                <div class="ts-service-info">
                                    <h3 class="service-box-title">{{ $personnelsTeam->titre." ".$personnelsTeam->prenom_personnel." ".$personnelsTeam->nom_personnel }}
                                    </h3>
                                    <p>{{ $personnelsTeam->posteOccupe->intitule_poste }}</p>

                                </div>
                            </div>
                        </div><!-- Service1 end -->
                    </div><!-- Col 1 end -->
                @empty

                    <div class="col-12">
                        <p class="alert alert-info p-3 text-center">
                            <i class="fa fa-exclamation-circle">&nbsp;</i> No staffs affiliated to this study
                        </p>
                    </div>
                @endforelse


            </div>
        </div> --}}
