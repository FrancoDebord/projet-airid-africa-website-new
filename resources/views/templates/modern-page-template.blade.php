{{-- Template moderne pour pages de laboratoires, installations et projets --}}
@extends('index')

@section('title', $pageTitle ?? 'AIRID')

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
           CONTENT SECTIONS
           ============================================ */
        .content-section {
            background: #fff;
            padding: 2.5rem;
            border-radius: 15px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.08);
            margin-bottom: 2rem;
            border-left: 5px solid #c20102;
        }

        /* Typo alignée sur typography.css (mêmes variables que la home) */
        .section-title {
            font-size: var(--airid-h2-size);
            font-weight: 700;
            color: var(--airid-title-color);
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

        .section-subtitle {
            font-size: var(--airid-h3-size);
            font-weight: 700;
            color: var(--airid-title-color);
            margin-top: 2rem;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .section-subtitle::before {
            content: '';
            width: 4px;
            height: 30px;
            background: #c20102;
            border-radius: 2px;
        }

        .section-content {
            font-size: var(--airid-text-size);
            line-height: var(--airid-text-line-height);
            color: var(--airid-text-color);
        }

        .section-content p {
            margin-bottom: 1.5rem;
            text-align: justify;
        }

        .section-content ul,
        .section-content ol {
            margin-bottom: 1.5rem;
            padding-left: 2rem;
        }

        .section-content li {
            margin-bottom: 0.75rem;
            line-height: 1.8;
        }

        .section-content li strong {
            color: #2c3e50;
            font-weight: 600;
        }

        /* ============================================
           IMAGE GALLERY
           ============================================ */
        .image-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }

        .gallery-item {
            position: relative;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 25px rgba(0,0,0,0.08);
            transition: all 0.4s ease;
        }

        .gallery-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }

        .gallery-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .gallery-item:hover .gallery-image {
            transform: scale(1.1);
        }

        .gallery-caption {
            padding: 1rem;
            background: #fff;
            text-align: center;
        }

        .gallery-caption strong {
            color: #2c3e50;
            font-weight: 600;
        }

        /* ============================================
           HERO IMAGE
           ============================================ */
        .hero-image {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0,0,0,0.15);
            margin-bottom: 2rem;
        }

        .hero-image img {
            width: 100%;
            height: 400px;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .hero-image:hover img {
            transform: scale(1.05);
        }

        /* ============================================
           INFO CARDS
           ============================================ */
        .info-card {
            background: #f8f9fa;
            padding: 1.5rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
            border-left: 4px solid #c20102;
        }

        .info-card-title {
            font-size: var(--airid-h3-size);
            font-weight: 700;
            color: var(--airid-title-color);
            margin-bottom: 0.75rem;
        }

        /* ============================================
           RESPONSIVE
           ============================================ */
        @media (max-width: 768px) {
            .content-section {
                padding: 1.5rem;
            }

            .image-gallery {
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
                            <h1 class="banner-title top_title fade-in-up">{{ $pageTitle ?? 'Page' }}</h1>
                            @if(isset($pageSubtitle))
                                <p class="text-white mt-3 fade-in-up tagline mb-0">
                                    {{ $pageSubtitle }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section Contenu -->
    <section class="py-5">
        <div class="container">
            @yield('page-content')
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
