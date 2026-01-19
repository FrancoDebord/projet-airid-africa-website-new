@extends('index')

@section('title', 'Our Newsletter --AIRID')

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
           SECTION HERO NEWSLETTER
           ============================================ */
        .newsletter-hero {
            background: linear-gradient(135deg, #767474 0%, #ebb9b9 100%);
            padding: 80px 0;
            position: relative;
            overflow: hidden;
        }

        .newsletter-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><circle cx="50" cy="50" r="2" fill="rgba(255,255,255,0.1)"/></svg>');
            opacity: 0.3;
        }

        .newsletter-hero-content {
            position: relative;
            z-index: 2;
        }

        /* ============================================
           FORMULAIRE D'ABONNEMENT
           ============================================ */
        .subscribe-form-card {
            background: #fff;
            border-radius: 20px;
            padding: 3rem;
            box-shadow: 0 10px 40px rgba(0,0,0,0.15);
            margin-top: -60px;
            position: relative;
            z-index: 10;
        }

        .subscribe-form-card h3 {
            color: #2c3e50;
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .subscribe-form-card p {
            color: #7f8c8d;
            font-size: 1.1rem;
            margin-bottom: 2rem;
        }

        .newsletter-input-group {
            display: flex;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .newsletter-input-group .form-control {
            border-radius: 50px;
            border: 2px solid #e0e0e0;
            padding: 1rem 1.5rem;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .newsletter-input-group .form-control:focus {
            border-color: #c20102;
            box-shadow: 0 0 0 0.2rem rgba(194, 1, 2, 0.1);
        }

        .newsletter-btn-subscribe {
            border-radius: 50px;
            padding: 1rem 2.5rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            background: linear-gradient(135deg, #c20102 0%, #8b0101 100%);
            border: none;
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        .newsletter-btn-subscribe:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(194, 1, 2, 0.4);
        }

        /* ============================================
           CARTES D'INFORMATIONS
           ============================================ */
        .info-card {
            background: #fff;
            border-radius: 15px;
            padding: 2.5rem;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            height: 100%;
            border-top: 4px solid #c20102;
        }

        .info-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }

        .info-card-icon {
            font-size: 3rem;
            color: #c20102;
            margin-bottom: 1.5rem;
        }

        .info-card h4 {
            color: #2c3e50;
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .info-card p {
            color: #7f8c8d;
            line-height: 1.8;
        }

        /* ============================================
           SECTION ARCHIVES (STRUCTURE PRÊTE)
           ============================================ */
        .archive-card {
            background: #fff;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            height: 100%;
        }

        .archive-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }

        .archive-card-image {
            height: 200px;
            background: linear-gradient(135deg, #c20102 0%, #8b0101 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 3rem;
        }

        .archive-card-body {
            padding: 2rem;
        }

        .archive-card-date {
            color: #c20102;
            font-weight: 600;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .archive-card-title {
            color: #2c3e50;
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .archive-card-excerpt {
            color: #7f8c8d;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        /* ============================================
           MESSAGE DE SUCCÈS
           ============================================ */
        .alert-success-modern {
            background: linear-gradient(135deg, #27ae60 0%, #229954 100%);
            color: #fff;
            border: none;
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: 0 5px 20px rgba(39, 174, 96, 0.3);
            animation: slideDown 0.5s ease-out;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ============================================
           RESPONSIVE
           ============================================ */
        @media (max-width: 768px) {
            .subscribe-form-card {
                margin-top: -40px;
                padding: 2rem;
            }

            .newsletter-input-group {
                flex-direction: column;
            }

            .newsletter-btn-subscribe {
                width: 100%;
            }
        }
    </style>
@endsection

@section('content')
    <!-- Hero Section -->
    <div class="newsletter-hero">
        <div class="newsletter-hero-content">
            <div class="container">
                <div class="row text-center">
                    <div class="col-lg-12 fade-in-up">
                        <h1 class="text-white mb-3" style="font-size: 3rem; font-weight: 700;">
                            <i class="fas fa-envelope-open-text me-3"></i>
                            Our Newsletter
                        </h1>
                        <p class="text-white fs-4 opacity-90">
                            Stay updated with our latest research, news, and achievements
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Formulaire d'Abonnement -->
    <section class="py-5" style="background: #f8f9fa;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="subscribe-form-card fade-in-up">
                        @if (session('message'))
                            <div class="alert alert-success-modern mb-4" role="alert">
                                <i class="fas fa-check-circle me-2"></i>
                                <strong>{{ session('message') }}</strong>
                            </div>
                        @endif

                        <h3>
                            <i class="fas fa-paper-plane me-2" style="color: #c20102;"></i>
                            Subscribe to Our Newsletter
                        </h3>
                        <p>
                            Join our community and receive regular updates about our research activities, 
                            publications, events, and the latest developments in infectious disease research.
                        </p>

                        <form action="{{ route('subscribeNewsLetter') }}" method="POST" id="newsletter-subscribe-form">
                            @csrf
                            <input type="hidden" name="fill_robot">

                            <div class="newsletter-input-group">
                                <input 
                                    type="email" 
                                    name="email_newsletter" 
                                    id="newsletter-email" 
                                    class="form-control flex-grow-1"
                                    placeholder="Enter your email address"
                                    required
                                    aria-label="Email address"
                                >
                                <button type="submit" class="btn newsletter-btn-subscribe text-white">
                                    <i class="fas fa-paper-plane me-2"></i>
                                    Subscribe
                                </button>
                            </div>

                            <div class="form-text mt-2">
                                <i class="fas fa-shield-alt me-2" style="color: #c20102;"></i>
                                We respect your privacy. Your email will never be shared with third parties.
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Informations sur la Newsletter -->
    <section class="py-5">
        <div class="container">
            <div class="row text-center mb-5 fade-in-up">
                <div class="col-12">
                    <h2 class="mb-3" style="font-size: 2.5rem; font-weight: 700; color: #2c3e50;">
                        What You'll Receive
                    </h2>
                    <div class="title-divider mx-auto" style="width: 100px; height: 4px; background: linear-gradient(135deg, #c20102 0%, #8b0101 100%); border-radius: 2px;"></div>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-4 col-md-6 fade-in-up">
                    <div class="info-card">
                        <div class="info-card-icon">
                            <i class="fas fa-flask"></i>
                        </div>
                        <h4>Research Updates</h4>
                        <p>
                            Get the latest information about our ongoing research projects, 
                            breakthrough discoveries, and scientific publications.
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 fade-in-up" style="transition-delay: 0.1s">
                    <div class="info-card">
                        <div class="info-card-icon">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <h4>Events & Workshops</h4>
                        <p>
                            Stay informed about upcoming conferences, workshops, training programs, 
                            and other events organized by AIRID.
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 fade-in-up" style="transition-delay: 0.2s">
                    <div class="info-card">
                        <div class="info-card-icon">
                            <i class="fas fa-trophy"></i>
                        </div>
                        <h4>Achievements & News</h4>
                        <p>
                            Celebrate our milestones, awards, partnerships, and important announcements 
                            that shape the future of infectious disease research in Africa.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Archives (Structure prête pour extension future) -->
    <section class="py-5" style="background: #f8f9fa;">
        <div class="container">
            <div class="row text-center mb-5 fade-in-up">
                <div class="col-12">
                    <h2 class="mb-3" style="font-size: 2.5rem; font-weight: 700; color: #2c3e50;">
                        Newsletter Archives
                    </h2>
                    <p class="text-muted fs-5">
                        Browse through our previous newsletters
                    </p>
                    <div class="title-divider mx-auto mt-3" style="width: 100px; height: 4px; background: linear-gradient(135deg, #c20102 0%, #8b0101 100%); border-radius: 2px;"></div>
                </div>
            </div>

            <!-- Message temporaire - Structure prête pour futures newsletters -->
            <div class="row">
                <div class="col-12 text-center fade-in-up">
                    <div class="py-5">
                        <i class="fas fa-inbox fa-4x text-muted mb-4"></i>
                        <h3 class="text-muted mb-3" style="font-weight: 600;">Newsletters Coming Soon</h3>
                        <p class="text-muted fs-5 mb-4">
                            Our newsletter archives will be available here soon. 
                            Subscribe now to be notified when we publish our first newsletter!
                        </p>
                        <a href="#newsletter-subscribe-form" class="btn btn-primary px-5 py-3 fw-bold" style="border-radius: 50px;">
                            <i class="fas fa-arrow-up me-2"></i>
                            Subscribe Now
                        </a>
                    </div>
                </div>
            </div>

            <!-- Structure prête pour afficher les newsletters (à activer quand la table sera créée) -->
            {{-- 
            <div class="row g-4">
                @forelse ($newsletters as $newsletter)
                    <div class="col-lg-4 col-md-6 fade-in-up">
                        <div class="archive-card">
                            <div class="archive-card-image">
                                <i class="fas fa-newspaper"></i>
                            </div>
                            <div class="archive-card-body">
                                <div class="archive-card-date">
                                    <i class="far fa-calendar-alt me-2"></i>
                                    {{ $newsletter->published_at->format('F j, Y') }}
                                </div>
                                <h3 class="archive-card-title">{{ $newsletter->title }}</h3>
                                <p class="archive-card-excerpt">{{ Str::limit($newsletter->excerpt, 120) }}</p>
                                <a href="#" class="btn btn-outline-primary">
                                    Read More <i class="fas fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <!-- Message vide affiché ci-dessus -->
                @endforelse
            </div>
            --}}
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

        // ============================================
        // VALIDATION EN TEMPS RÉEL DU FORMULAIRE
        // ============================================
        document.addEventListener('DOMContentLoaded', function() {
            const emailInput = document.getElementById('newsletter-email');
            const form = document.getElementById('newsletter-subscribe-form');

            if (emailInput) {
                emailInput.addEventListener('input', function() {
                    const email = this.value.trim();
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                    if (email && !emailRegex.test(email)) {
                        this.classList.add('is-invalid');
                        this.classList.remove('is-valid');
                    } else if (email && emailRegex.test(email)) {
                        this.classList.remove('is-invalid');
                        this.classList.add('is-valid');
                    } else {
                        this.classList.remove('is-invalid', 'is-valid');
                    }
                });
            }

            // Smooth scroll vers le formulaire
            const subscribeLinks = document.querySelectorAll('a[href="#newsletter-subscribe-form"]');
            subscribeLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const formElement = document.getElementById('newsletter-subscribe-form');
                    if (formElement) {
                        formElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
                        emailInput?.focus();
                    }
                });
            });
        });
    </script>
@endsection