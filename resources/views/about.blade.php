@extends('index')

@section('title', 'AIRID -About Us')

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
           SECTION INTRO
           ============================================ */
        .about-intro {
            background: #fff;
            padding: 3rem 2.5rem;
            border-radius: 15px;
            margin: 2rem 0;
            box-shadow: 0 5px 25px rgba(0,0,0,0.08);
            border-left: 5px solid #c20102;
        }

        /* ============================================
           CARTES VISION, MISSION, VALEURS
           ============================================ */
        .vmv-card {
            background: #fff;
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 5px 25px rgba(0,0,0,0.08);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            height: 100%;
            border-top: 5px solid #c20102;
            position: relative;
            overflow: hidden;
        }

        .vmv-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(135deg, #c20102 0%, #8b0101 100%);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.4s ease;
        }

        .vmv-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }

        .vmv-card:hover::before {
            transform: scaleX(1);
        }

        .vmv-icon {
            width: 80px;
            height: 80px;
            border-radius: 20px;
            background: linear-gradient(135deg, #c20102 0%, #8b0101 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
            transition: transform 0.3s ease;
        }

        .vmv-card:hover .vmv-icon {
            transform: scale(1.1) rotate(5deg);
        }

        .vmv-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 1rem;
        }

        .vmv-description {
            color: #7f8c8d;
            line-height: 1.8;
            font-size: 1.05rem;
        }

        /* ============================================
           TIMELINE
           ============================================ */
        .timeline {
            position: relative;
            padding: 2rem 0;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 50%;
            top: 0;
            bottom: 0;
            width: 4px;
            background: linear-gradient(135deg, #c20102 0%, #8b0101 100%);
            transform: translateX(-50%);
        }

        .timeline-item {
            position: relative;
            margin-bottom: 3rem;
            display: flex;
            align-items: center;
        }

        .timeline-item:nth-child(odd) {
            flex-direction: row;
        }

        .timeline-item:nth-child(even) {
            flex-direction: row-reverse;
        }

        .timeline-content {
            width: 45%;
            background: #fff;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            position: relative;
        }

        .timeline-item:nth-child(odd) .timeline-content {
            margin-right: auto;
        }

        .timeline-item:nth-child(even) .timeline-content {
            margin-left: auto;
        }

        .timeline-dot {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #c20102;
            border: 4px solid #fff;
            box-shadow: 0 0 0 4px #c20102;
            z-index: 2;
        }

        .timeline-year {
            font-size: 1.5rem;
            font-weight: 700;
            color: #c20102;
            margin-bottom: 0.5rem;
        }

        .timeline-text {
            color: #7f8c8d;
            line-height: 1.8;
        }

        /* ============================================
           SECTION "WHAT WE DO"
           ============================================ */
        .what-we-do-card {
            background: #fff;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            height: 100%;
            border-left: 4px solid #c20102;
        }

        .what-we-do-card:hover {
            transform: translateX(10px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.12);
        }

        .what-we-do-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .what-we-do-title::before {
            content: '✓';
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: #c20102;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 1rem;
        }

        .what-we-do-text {
            color: #7f8c8d;
            line-height: 1.8;
        }

        /* ============================================
           RESPONSIVE
           ============================================ */
        @media (max-width: 768px) {
            .timeline::before {
                left: 2rem;
            }

            .timeline-item {
                flex-direction: row !important;
            }

            .timeline-content {
                width: calc(100% - 4rem);
                margin-left: 4rem !important;
                margin-right: 0 !important;
            }

            .timeline-dot {
                left: 2rem;
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
                            <h1 class="banner-title top_title fade-in-up">About AIRID</h1>
                            <p class="text-white mt-3 fade-in-up" style="font-size: 1.2rem;">
                                Pioneering African-led research for infectious disease control
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section Introduction -->
    <section class="py-5">
        <div class="container">
            <div class="about-intro fade-in-up">
                <p class="mb-4" style="font-size: 1.2rem; color: #2c3e50; line-height: 1.9; text-align: justify; font-weight: 400;">
                    The African Institute for Research in Infectious Diseases (AIRID) is a pioneering non-governmental research institution based in Benin, West Africa. Established in 2021, AIRID is committed to addressing the continent's most pressing health challenges through cutting-edge scientific research, innovative solutions, and strong partnerships.
                </p>
                <p style="color: #555; font-size: 1.05rem; line-height: 1.9; text-align: justify; margin-bottom: 0;">
                    At AIRID, we believe that Africa's public health priorities are best addressed through African leadership, expertise, and innovation. Sustainable solutions to the continent's health challenges must be rooted in local knowledge and scientific excellence. Our mission is to generate high-impact research that informs national and regional policies, enhances disease control strategies, and contributes meaningfully to global efforts to eliminate infectious diseases and improve health equity.
                </p>
            </div>
        </div>
    </section>

    <!-- Timeline Section -->
    <section class="py-5" style="background: #f8f9fa;">
        <div class="container">
            <div class="row text-center mb-5 fade-in-up">
                <div class="col-12">
                    <h2 class="section-title" style="font-size: 2.5rem; font-weight: 700; color: #2c3e50;">Our History</h2>
                    <div class="title-divider mx-auto mt-3 mb-4" style="width: 100px; height: 4px; background: linear-gradient(135deg, #c20102 0%, #8b0101 100%); border-radius: 2px;"></div>
                </div>
            </div>

            <div class="timeline">
                <div class="timeline-item fade-in-up">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <div class="timeline-year">2021</div>
                        <div class="timeline-text">
                            The African Institute for Research in Infectious Diseases (AIRID) was established to address the burden of infectious diseases in Africa. It was created through collaboration between local health authorities, international research institutions, and development partners.
                        </div>
                    </div>
                </div>

                <div class="timeline-item fade-in-up" style="transition-delay: 0.2s">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <div class="timeline-year">2021 - Present</div>
                        <div class="timeline-text">
                            AIRID strengthens research capacity and fosters partnerships to design and evaluate interventions tailored to African populations. Its work focuses on interdisciplinary research, building local expertise, and translating findings into impactful public health programs.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Vision, Mission Section -->
    <section class="py-5">
        <div class="container">
            <div class="row text-center mb-5 fade-in-up">
                <div class="col-12">
                    <h2 class="section-title" style="font-size: 2.5rem; font-weight: 700; color: #2c3e50;">Our Vision & Mission</h2>
                    <div class="title-divider mx-auto mt-3 mb-4" style="width: 100px; height: 4px; background: linear-gradient(135deg, #c20102 0%, #8b0101 100%); border-radius: 2px;"></div>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-6 fade-in-up">
                    <div class="vmv-card">
                        <div class="vmv-icon">
                            <i class="fas fa-eye"></i>
                        </div>
                        <h3 class="vmv-title">Our Vision</h3>
                        <p class="vmv-description">
                            To become Africa's leading center of excellence in infectious disease research, training, and innovation—shaping the future of global health through African-led science.
                        </p>
                    </div>
                </div>

                <div class="col-lg-6 fade-in-up" style="transition-delay: 0.1s">
                    <div class="vmv-card">
                        <div class="vmv-icon">
                            <i class="fas fa-bullseye"></i>
                        </div>
                        <h3 class="vmv-title">Our Mission</h3>
                        <p class="vmv-description">
                            To conduct world-class research, build local scientific capacity, and deliver data-driven solutions to reduce the burden of infectious diseases in Africa.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- What We Do Section -->
    <section class="py-5" style="background: #f8f9fa;">
        <div class="container">
            <div class="row text-center mb-5 fade-in-up">
                <div class="col-12">
                    <h2 class="section-title" style="font-size: 2.5rem; font-weight: 700; color: #2c3e50;">What We Do</h2>
                    <div class="title-divider mx-auto mt-3 mb-4" style="width: 100px; height: 4px; background: linear-gradient(135deg, #c20102 0%, #8b0101 100%); border-radius: 2px;"></div>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-6 fade-in-up">
                    <div class="what-we-do-card">
                        <h4 class="what-we-do-title">Applied Research</h4>
                        <p class="what-we-do-text">
                            We design and implement research studies that tackle real-world challenges in malaria, neglected tropical diseases, HIV, Tuberculosis, emerging infections, and antimicrobial resistance.
                        </p>
                    </div>
                </div>

                <div class="col-lg-6 fade-in-up" style="transition-delay: 0.1s">
                    <div class="what-we-do-card">
                        <h4 class="what-we-do-title">Innovation & Evaluation</h4>
                        <p class="what-we-do-text">
                            We evaluate new tools, technologies, and interventions for prevention and control of infectious diseases, including diagnostics, vector control tools such as insecticide-treated nets, vaccines, chemoprevention etc.
                        </p>
                    </div>
                </div>

                <div class="col-lg-6 fade-in-up" style="transition-delay: 0.2s">
                    <div class="what-we-do-card">
                        <h4 class="what-we-do-title">Capacity Strengthening</h4>
                        <p class="what-we-do-text">
                            We train the next generation of African scientists and public health professionals through internships, postgraduate programs, and hands-on research experiences.
                        </p>
                    </div>
                </div>

                <div class="col-lg-6 fade-in-up" style="transition-delay: 0.3s">
                    <div class="what-we-do-card">
                        <h4 class="what-we-do-title">Policy Engagement</h4>
                        <p class="what-we-do-text">
                            We work closely with national and regional governments, WHO, and global health partners to ensure our research informs policies and program implementation.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>



    @include('partials.all-departments-partials')
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
