@extends('index')

@section('title', 'Education & Training')

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

        .section-subtitle {
            font-size: 1.4rem;
            font-weight: 700;
            color: #2c3e50;
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
            line-height: 1.9;
            color: #555;
            font-size: 1.05rem;
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
           CARDS
           ============================================ */
        .info-card {
            background: #f8f9fa;
            padding: 1.5rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
            border-left: 4px solid #c20102;
        }

        .info-card-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 0.75rem;
        }

        /* ============================================
           RESPONSIVE
           ============================================ */
        @media (max-width: 768px) {
            .content-section {
                padding: 1.5rem;
            }

            .section-title {
                font-size: 1.5rem;
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
                            <h1 class="banner-title top_title fade-in-up">Education & Training</h1>
                            <p class="text-white mt-3 fade-in-up" style="font-size: 1.2rem;">
                                Building African expertise for sustainable public health impact
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section Contenu -->
    <section class="py-5">
        <div class="container">
            <div class="content-section fade-in-up">
                <h2 class="section-title">
                    <i class="fas fa-graduation-cap"></i>Education & Training
                </h2>
                <div class="section-content">
                    <p>
                        At AIRID, we are committed to training the next generation of African scientists,
                        innovators, and public health professionals. Through a blend of academic development,
                        technical training, and practical experience, we are equipping individuals with the skills
                        to lead high-impact research and drive sustainable health improvements across the continent.
                    </p>
                </div>
            </div>

            <div class="content-section fade-in-up">
                <h3 class="section-subtitle">Graduate Programmes (Under Development)</h3>
                <div class="section-content">
                    <p>
                        AIRID is currently developing a suite of postgraduate training programmes
                        in collaboration with academic and institutional partners. These master's
                        degrees will respond directly to Africa's health priorities
                        and research needs. The planned programmes include:
                    </p>
                    <ul>
                        <li><strong>Master of Science in Public Health</strong></li>
                        <li><strong>Master of Science in Epidemiology</strong></li>
                        <li><strong>Master of Science in Medical Parasitology and Entomology</strong></li>
                    </ul>
                    <p>
                        Each programme will integrate academic coursework with practical
                        laboratory and field-based learning, preparing graduates to contribute to
                        evidence-based policy, research innovation, and public health implementation.
                    </p>
                </div>
            </div>

            <div class="content-section fade-in-up">
                <h3 class="section-subtitle">Technical Training and Professional Development</h3>
                <div class="section-content">
                    <p>
                        AIRID also offers a variety of structured learning opportunities for students,
                        early-career professionals, and practitioners:
                    </p>
                    <ul>
                        <li>
                            <strong>Internships and fellowships</strong> across core disciplines such
                            as vector biology, diagnostics, molecular biology, and data science
                        </li>
                        <li>
                            <strong>Short courses and workshops</strong> on GLP, field research methods, data analysis, and
                            ethics in health research
                        </li>
                        <li>
                            <strong>On-the-job mentorship</strong> through active research projects
                        </li>
                        <li>
                            <strong>Skills training</strong> for laboratory technicians, surveillance officers, and public
                            health program managers
                        </li>
                    </ul>
                </div>
            </div>

            <div class="content-section fade-in-up">
                <h3 class="section-subtitle">Why It Matters</h3>
                <div class="section-content">
                    <p>
                        AIRID's education and training initiatives are designed to build a
                        strong foundation for African scientific leadership. By combining
                        rigorous academic pathways with real-world experience and contextual
                        relevance, we aim to grow a new generation of African experts
                        equipped to lead the continent's public health transformation.
                    </p>
                </div>
            </div>

            <div class="content-section fade-in-up">
                <h2 class="section-title">
                    <i class="fas fa-book"></i>Short Courses
                </h2>
                <div class="section-content">
                    <p>
                        AIRID offers a growing portfolio of short courses designed to build
                        practical skills and technical expertise in infectious disease research
                        and public health practice. These courses are ideal for laboratory professionals, field researchers,
                        graduate students, program staff, and early-career scientists.
                    </p>

                    <h4 class="section-subtitle">List of Available Short Courses</h4>
                    <ol>
                        <li>
                            <strong>Good Laboratory Practice (GLP) for Public Health Research</strong>
                            - Principles and application of GLP standards in laboratory and semi-field research settings.
                        </li>
                        <li>
                            <strong>Laboratory Evaluation of Vector Control Products</strong>
                            - Hands-on training in bioassays, insecticide efficacy testing, and product quality control.
                        </li>
                        <li>
                            <strong>Experimental Hut Evaluation of Vector Control Products</strong>
                            - Design and implementation of WHO Phase II trials in semi-field settings using experimental huts.
                        </li>
                        <li>
                            <strong>Cluster Randomised Controlled Trials of Health Interventions</strong>
                            - Methods for designing, implementing, and analyzing community-level trials to evaluate public
                            health tools.
                        </li>
                        <li>
                            <strong>Molecular Diagnostics and Resistance Detection</strong>
                            - Techniques for detecting pathogens and resistance markers using PCR, genotyping, and molecular
                            assays.
                        </li>
                        <li>
                            <strong>Monitoring and Evaluation of Public Health Interventions</strong>
                            - Tools for assessing impact, implementation fidelity, and outcomes in disease control programs.
                        </li>
                        <li>
                            <strong>Research Ethics and Regulatory Compliance in Human Studies</strong>
                            - Ethical principles, consent procedures, and regulatory frameworks for human subjects research.
                        </li>
                        <li>
                            <strong>Data Analysis and Epidemiological Tools Using R and Excel</strong>
                            - Introduction to statistical analysis, data visualization, and interpretation using applied
                            datasets.
                        </li>
                        <li>
                            <strong>Health Economics and Cost-Effectiveness Analysis</strong>
                            - Evaluating the economic impact and value-for-money of health interventions and disease control
                            programs.
                        </li>
                        <li>
                            <strong>Community Engagement and Social Science in Health Research</strong>
                            - Participatory methods, stakeholder engagement, and behavioral insight to enhance research
                            relevance and acceptance.
                        </li>
                        <li>
                            <strong>Scientific Writing and Grant Proposal Development</strong>
                            - Skills for developing scientific manuscripts and competitive grant applications.
                        </li>
                        <li>
                            <strong>Quality Assurance Management</strong>
                            - Best practices in laboratory quality systems, documentation, audits, and continuous improvement.
                        </li>
                    </ol>

                    <div class="info-card">
                        <h4 class="info-card-title">
                            <i class="fas fa-info-circle me-2" style="color: #c20102;"></i>Course Format
                        </h4>
                        <p style="margin-bottom: 0;">
                            Courses are delivered in <strong>in-person</strong>, <strong>virtual</strong>, or <strong>hybrid formats</strong>, 
                            and typically run for <strong>3 days to 4 weeks</strong>. All participants receive 
                            a certificate of completion. Customised training sessions can also be designed on 
                            request for institutions or project teams.
                        </p>
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
