@extends('index')

@section('title', 'AIRID --Video Library')

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
           CARTES VIDÉO MODERNES
           ============================================ */
        .video-card {
            background: #fff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 5px 25px rgba(0,0,0,0.08);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .video-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }

        .video-wrapper {
            position: relative;
            width: 100%;
            padding-bottom: 56.25%; /* 16:9 Aspect Ratio */
            background: #000;
            overflow: hidden;
        }

        .video-wrapper iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }

        .video-info {
            padding: 1.5rem;
            flex-grow: 1;
            display: flex;
            background-color: #c7c3c3;
            flex-direction: column;
        }

        .video-title {
            font-size: var(--airid-h3-size);
            font-weight: 700;
            color: var(--airid-title-color);
            margin-bottom: 0.75rem;
            line-height: 1.4;
            /* Limiter à 2 lignes max avec "..." si le titre dépasse */
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .video-date {
            color: var(--airid-text-color);
            font-size: var(--airid-text-size);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-top: auto;
        }

        .video-date i {
            color: #c20102;
        }

        /* Titre sur deux lignes avec léger espace entre les lignes */
        .section-title-two-lines .d-block {
            line-height: 1.3;
        }
        .section-title-two-lines .d-block:first-child {
            margin-bottom: 0.25em;
        }

        /* Espace après chaque ligne de cadres (cartes) */
        .video-rows-spaced > [class*="col-"] {
            margin-bottom: 2rem;
        }
        .video-rows-spaced > [class*="col-"]:last-child {
            margin-bottom: 0;
        }

        /* ============================================
           MESSAGE AUCUN RÉSULTAT
           ============================================ */
        .no-results {
            text-align: center;
            padding: 4rem 2rem;
            color: var(--airid-text-color);
        }

        .no-results i {
            font-size: var(--airid-h2-size);
            margin-bottom: 1rem;
            color: #bdc3c7;
        }

        /* ============================================
           RESPONSIVE
           ============================================ */
        @media (max-width: 768px) {
            .video-info {
                padding: 1rem;
            }

            .video-title {
                font-size: var(--airid-text-size);
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
                            <h1 class="banner-title top_title fade-in-up">Video Library</h1>
                            <p class="text-white mt-3 fade-in-up tagline mb-0" style="font-size: 1.4rem;">
                                Watch our research presentations and events
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section Vidéos -->
    <section class="py-5">
        <div class="container">
            <div class="row text-center mb-5 fade-in-up">
                <div class="col-12">
                    <h2 class="section-title section-title-two-lines">
                        <span class="d-block">Our</span>
                        <span class="d-block">Videos</span>
                    </h2>
                    <p class="section-lead mb-4">
                        Educational content, research presentations, and event recordings
                    </p>
                    <div class="title-divider mx-auto mt-3 mb-4" style="width: 100px; height: 4px; background: linear-gradient(135deg, #c20102 0%, #8b0101 100%); border-radius: 2px;"></div>
                </div>
            </div>

            <div class="row g-4 video-rows-spaced">
                @forelse ($all_videos as $index => $video)
                    <div class="col-lg-4 col-md-6 fade-in-up" style="transition-delay: {{ ($index % 3) * 0.1 }}s">
                        <div class="video-card">
                            <div class="video-wrapper">
                                <iframe
                                    src="{{ $video->lien_youtube_video }}"
                                    title="{{ $video->title_video }}"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    referrerpolicy="strict-origin-when-cross-origin"
                                    allowfullscreen>
                                </iframe>
                            </div>
                            <div class="video-info">
                                <h3 class="video-title">{{ $video->title_video }}</h3>
                                @if($video->date_video)
                                    <div class="video-date">
                                        <i class="far fa-calendar-alt"></i>
                                        <span>{{ date('F j, Y', strtotime($video->date_video)) }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 fade-in-up">
                        <div class="no-results">
                            <i class="fas fa-video"></i>
                            <h3 class="mt-3 mb-2 section-title">No videos available</h3>
                            <p>Videos will be displayed here once they are added to the library.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    @include('partials.partenaires')
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
