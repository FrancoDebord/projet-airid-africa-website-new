@extends('index')

@section('title', 'AIRID -- Get Involved')

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
           HERO SECTION
           ============================================ */
        .hero-section {
            background: url("{{ asset('storage/assets_vendor/images/banner/banner2_new.png') }}") center/cover no-repeat;
            padding: 5rem 0;
            text-align: center;
            color: #fff;
            position: relative;
            overflow: hidden;
        }

        .hero-content {
            position: relative;
            z-index: 1;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .hero-subtitle {
            font-size: 1.5rem;
            font-weight: 300;
            margin-bottom: 2rem;
            opacity: 0.95;
        }

        .hero-icon {
            font-size: 4rem;
            margin-bottom: 1.5rem;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-20px);
            }
        }

        /* ============================================
           CARTES D'INFORMATIONS
           ============================================ */
        .info-card {
            background: #fff;
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 5px 25px rgba(0,0,0,0.08);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            height: 100%;
            text-align: center;
            border-top: 4px solid #c20102;
            position: relative;
            overflow: hidden;
        }

        .info-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(194, 1, 2, 0.05) 0%, transparent 70%);
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .info-card:hover::before {
            opacity: 1;
        }

        .info-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }

        .info-icon {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: linear-gradient(135deg, #c20102 0%, #8b0101 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 2.5rem;
            margin: 0 auto 1.5rem;
            transition: transform 0.3s ease;
            position: relative;
            z-index: 1;
        }

        .info-card:hover .info-icon {
            transform: scale(1.1) rotate(5deg);
        }

        .info-card h3 {
            color: #2c3e50;
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            position: relative;
            z-index: 1;
        }

        .info-card p {
            color: #7f8c8d;
            margin-bottom: 1.5rem;
            line-height: 1.8;
            font-size: 1.05rem;
            position: relative;
            z-index: 1;
        }

        .info-card a {
            color: #c20102;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
            position: relative;
            z-index: 1;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .info-card a:hover {
            color: #8b0101;
            text-decoration: underline;
        }

        /* ============================================
           SECTION MESSAGE PRINCIPAL
           ============================================ */
        .main-message-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 4rem 0;
        }

        .message-card {
            background: #fff;
            border-radius: 20px;
            padding: 3rem;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            border-left: 6px solid #c20102;
            position: relative;
        }

        .message-card::before {
            content: '"';
            position: absolute;
            top: -20px;
            left: 30px;
            font-size: 8rem;
            color: rgba(194, 1, 2, 0.1);
            font-family: Georgia, serif;
            line-height: 1;
        }

        .message-text {
            font-size: 1.3rem;
            line-height: 1.9;
            color: #2c3e50;
            font-style: italic;
            margin-bottom: 2rem;
            position: relative;
            z-index: 1;
        }

        .message-author {
            text-align: right;
            color: #7f8c8d;
            font-size: 1.1rem;
            font-weight: 600;
            position: relative;
            z-index: 1;
        }

        /* ============================================
           BOUTONS D'ACTION
           ============================================ */
        .action-buttons {
            display: flex;
            gap: 1.5rem;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 2rem;
        }

        .btn-action {
            background: linear-gradient(135deg, #c20102 0%, #8b0101 100%);
            border: none;
            border-radius: 50px;
            padding: 1rem 2.5rem;
            font-weight: 600;
            color: #fff;
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 1.1rem;
            box-shadow: 0 4px 15px rgba(194, 1, 2, 0.3);
        }

        .btn-action::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255,255,255,0.3);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .btn-action:hover::before {
            width: 300px;
            height: 300px;
        }

        .btn-action:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(194, 1, 2, 0.5);
            color: #fff;
            text-decoration: none;
        }

        .btn-action-secondary {
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
            box-shadow: 0 4px 15px rgba(44, 62, 80, 0.3);
            color: #fff !important;
        }

        .btn-action-secondary:hover {
            box-shadow: 0 8px 25px rgba(44, 62, 80, 0.5);
            color: #fff !important;
        }

        /* ============================================
           RESPONSIVE
           ============================================ */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }

            .hero-subtitle {
                font-size: 1.2rem;
            }

            .hero-icon {
                font-size: 3rem;
            }

            .message-card {
                padding: 2rem;
            }

            .message-text {
                font-size: 1.1rem;
            }

            .info-card {
                padding: 2rem;
                margin-bottom: 1.5rem;
            }

            .action-buttons {
                flex-direction: column;
                align-items: stretch;
            }

            .btn-action {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
@endsection

@section('content')
    <!-- Hero Section -->
    <div class="hero-section">
        <div class="container">
            <div class="hero-content fade-in-up">
                <div class="hero-icon">
                    <i class="fas fa-hand-holding-heart"></i>
                </div>
                <h1 class="hero-title">Get Involved</h1>
                <p class="hero-subtitle">Support African-Led Science and Health Innovation</p>
            </div>
        </div>
    </div>

    <!-- Section Message Principal -->
    <section class="main-message-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto fade-in-up">
                    <div class="message-card">
                        <p class="message-text">
                            By supporting AIRID, you are investing in African-led science, stronger health systems, and long-term solutions to infectious diseases.
                        </p>
                        <p class="message-author">
                            — 
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Informations de Contact -->
    <section class="py-5">
        <div class="container">
            <div class="row text-center mb-5 fade-in-up">
                <div class="col-12">
                    <h2 class="section-title" style="font-size: 2.5rem; font-weight: 700; color: #2c3e50;">How to Get Involved</h2>
                    <h3 class="section-sub-title" style="font-size: 1.3rem; color: #7f8c8d; font-weight: 500;">Donate or Partner with Us</h3>
                    <div class="title-divider mx-auto mt-3 mb-4" style="width: 100px; height: 4px; background: linear-gradient(135deg, #c20102 0%, #8b0101 100%); border-radius: 2px;"></div>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-6 col-md-6 fade-in-up">
                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <h3>Email Us</h3>
                        <p>
                            To donate or partner with us, reach us via email:
                        </p>
                        <a href="mailto:partnerships@airid-africa.com">
                            <i class="fas fa-envelope"></i>
                            partnerships@airid-africa.com
                        </a>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 fade-in-up" style="transition-delay: 0.1s">
                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <h3>Call Us</h3>
                        <p>
                            Contact us by phone for donations and partnerships:
                        </p>
                        <a href="tel:+2290167164499">
                            <i class="fas fa-phone"></i>
                            +229 01 67 16 44 99
                        </a>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-12 text-center fade-in-up" style="transition-delay: 0.2s">
                    <div class="action-buttons">
                        <a href="mailto:partnerships@airid-africa.com" class="btn-action">
                            <i class="fas fa-envelope"></i>
                            Send Email
                        </a>
                        <a href="tel:+2290167164499" class="btn-action btn-action-secondary">
                            <i class="fas fa-phone"></i>
                            Call Now
                        </a>
                        <a href="{{ route('contactPage') }}" class="btn-action btn-action-secondary">
                            <i class="fas fa-comments"></i>
                            Contact Form
                        </a>
                    </div>
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
