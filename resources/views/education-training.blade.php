@extends('index')

@section('title', 'Training & Capacity Strengthening | AIRID Africa')

@section('css')
    <style>
        .fade-in-up { opacity: 0; transform: translateY(24px); transition: opacity 0.6s ease, transform 0.6s ease; }
        .fade-in-up.visible { opacity: 1; transform: translateY(0); }
        .trl-banner { background-size: cover; background-position: center; }
        .trl-intro {
            background: linear-gradient(135deg, rgba(194, 1, 2, 0.06) 0%, rgba(139, 1, 1, 0.06) 100%);
            padding: 2rem 1.75rem;
            border-radius: 16px;
            margin: 2rem 0 1.5rem;
            border-left: 5px solid #c20102;
        }
        .trl-intro .section-lead { font-size: 1.05rem; line-height: 1.7; color: #333; margin-bottom: 0.75rem; }
        .trl-intro .section-lead:last-child { margin-bottom: 0; }
        .trl-section-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1a1a1a;
            margin: 2rem 0 1.25rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .trl-section-title i { color: #c20102; }
        .trl-tile {
            background: #fff;
            border-radius: 14px;
            padding: 1.5rem 1.75rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            border-left: 4px solid #c20102;
        }
        .trl-tile h3, .trl-tile .trl-tile-heading { font-size: 1.2rem; font-weight: 700; color: #1a1a1a; margin-bottom: 0.75rem; }
        .trl-tile-heading { display: flex; align-items: flex-start; gap: 0.5rem; }
        .trl-tile-heading i { color: #c20102; flex-shrink: 0; margin-top: 0.15rem; }
        .trl-tile p, .trl-tile .section-lead { font-size: 1rem; line-height: 1.65; color: #444; margin-bottom: 0.6rem; }
        .trl-tile p:last-child, .trl-tile .section-lead:last-of-type { margin-bottom: 0; }
        .trl-tile ul { list-style: none; padding: 0; margin: 0.5rem 0 0.75rem 0; }
        .trl-tile ul li { padding: 0.25rem 0 0.25rem 1.4rem; position: relative; font-size: 1rem; line-height: 1.55; color: #444; }
        .trl-tile ul li::before { content: '✓'; position: absolute; left: 0; color: #c20102; font-weight: 700; }
        /* Cartes cliquables */
        .trl-card-link {
            display: block;
            background: #fff;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            border: 1px solid #eee;
            text-decoration: none;
            color: inherit;
            transition: all 0.3s ease;
            height: 100%;
        }
        .trl-card-link:hover {
            box-shadow: 0 12px 32px rgba(194, 1, 2, 0.18);
            border-color: #c20102;
            transform: translateY(-6px);
            text-decoration: none;
            color: inherit;
        }
        .trl-card-img-wrap {
            width: 100%;
            height: 280px;
            min-height: 260px;
            overflow: hidden;
            background: #f0f0f0;
        }
        .trl-card-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }
        .trl-card-link:hover .trl-card-img-wrap img { transform: scale(1.06); }
        .trl-card-body {
            padding: 1.5rem 1.35rem;
            position: relative;
            padding-right: 3rem;
        }
        .trl-card-title { font-size: 1.2rem; font-weight: 700; color: #1a1a1a; margin-bottom: 0.5rem; }
        .trl-card-link:hover .trl-card-title { color: #c20102; }
        .trl-card-desc { font-size: 0.95rem; line-height: 1.55; color: #555; margin-bottom: 0; }
        @media (max-width: 991px) {
            .trl-card-img-wrap { height: 260px; min-height: 240px; }
        }
        @media (max-width: 767px) {
            .trl-card-img-wrap { height: 240px; min-height: 220px; }
        }
        @media (max-width: 375px) {
            .trl-card-img-wrap { height: 220px; min-height: 200px; }
        }
        .trl-card-arrow {
            position: absolute;
            right: 1.25rem;
            top: 50%;
            transform: translateY(-50%);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(194, 1, 2, 0.1);
            color: #c20102;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        .trl-card-link:hover .trl-card-arrow {
            background: #c20102;
            color: #fff;
            transform: translateY(-50%) translateX(4px);
        }
    </style>
@endsection

@section('content')
    <div id="banner-area" class="banner-area trl-banner"
        style="background-image:url({{ asset('storage/assets_vendor/images/banner/banner2_new.png') }})">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title top_title fade-in-up">Training & Capacity Strengthening</h1>
                            <p class="text-white mt-3 fade-in-up tagline mb-0" style="font-size: 1.4rem;">
                                Building Sustainable African Research Capacity for Public Health Impact
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="py-4">
        <div class="container">
            <div class="trl-intro fade-in-up">
                <p class="section-lead">Training and capacity strengthening are central to AIRID’s mission. The Institute is committed to developing skilled scientists, technical staff, and institutional systems that enable high-quality, independent research and evidence-based public health action across Africa.</p>
                <p class="section-lead">AIRID’s approach goes beyond short-term training. Capacity strengthening is embedded within research programmes, facilities, and partnerships to ensure lasting impact at individual, institutional, and system levels.</p>
            </div>

            <h2 class="trl-section-title fade-in-up" id="training-pathways"><i class="fas fa-th-large"></i> Explore training pathways</h2>
            <div class="row g-4 fade-in-up">
                <div class="col-md-6 col-lg-4">
                    <a href="#our-approach" class="trl-card-link">
                        <div class="trl-card-img-wrap">
                            <img src="{{ asset('storage/assets_vendor/images/banner/IMG_7427.jpg') }}" alt="Overview">
                        </div>
                        <div class="trl-card-body">
                            <h3 class="trl-card-title">Overview</h3>
                            <p class="trl-card-desc">Our capacity strengthening approach and training pathways at a glance.</p>
                            <span class="trl-card-arrow"><i class="fas fa-arrow-right"></i></span>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4">
                    <a href="{{ route('pageTraining', 'graduate-programmes') }}" class="trl-card-link">
                        <div class="trl-card-img-wrap">
                            <img src="{{ asset('storage/assets_vendor/images/banner/IMG_7450.jpg') }}" alt="Graduate Programmes">
                        </div>
                        <div class="trl-card-body">
                            <h3 class="trl-card-title">Graduate Programmes</h3>
                            <p class="trl-card-desc">MSc and PhD opportunities (under development) in public health, epidemiology, and parasitology.</p>
                            <span class="trl-card-arrow"><i class="fas fa-arrow-right"></i></span>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4">
                    <a href="{{ route('pageTraining', 'short-courses-cpd') }}" class="trl-card-link">
                        <div class="trl-card-img-wrap">
                            <img src="{{ asset('storage/assets_vendor/images/banner/IMG_7460.jpg') }}" alt="Short Courses">
                        </div>
                        <div class="trl-card-body">
                            <h3 class="trl-card-title">Short Courses &amp; CPD</h3>
                            <p class="trl-card-desc">Targeted, applied training for infectious disease control and public health practice. Overview, who it's for, delivery and catalogue.</p>
                            <span class="trl-card-arrow"><i class="fas fa-arrow-right"></i></span>
                        </div>
                    </a>
                </div>
            </div>

            <h2 class="trl-section-title fade-in-up" id="our-approach"><i class="fas fa-bullseye"></i> Our Capacity Strengthening Approach</h2>
            <div class="trl-tile fade-in-up">
                <p class="section-lead">AIRID adopts an integrated approach that links training directly to real research delivery. Capacity strengthening activities are designed to:</p>
                <ul>
                    <li>Build practical, hands-on skills through participation in active research</li>
                    <li>Strengthen institutional systems and quality frameworks</li>
                    <li>Support career development and scientific leadership</li>
                    <li>Promote African ownership of research agendas and outputs</li>
                </ul>
                <p class="section-lead mb-0">This approach ensures that training contributes to sustainable capability rather than isolated skill acquisition.</p>
            </div>

            <h2 class="trl-section-title fade-in-up"><i class="fas fa-route"></i> Training Pathways</h2>
            <p class="section-lead fade-in-up">AIRID supports multiple training pathways tailored to different career stages and professional needs.</p>

            <div class="row g-4 fade-in-up">
                <div class="col-lg-6">
                    <div class="trl-tile h-100">
                        <h3>Early-Career Researchers and Students</h3>
                        <p>AIRID provides structured opportunities for undergraduate, MSc, and PhD students to gain practical research experience through:</p>
                        <ul>
                            <li>Supervised research projects embedded within ongoing studies</li>
                            <li>Mentorship by experienced scientists and Centre Directors</li>
                            <li>Exposure to laboratory, semi-field, field, and data platforms</li>
                            <li>Training in research ethics, data integrity, and scientific communication</li>
                        </ul>
                        <p class="mb-0">These pathways aim to develop the next generation of African researchers with strong methodological foundations.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="trl-tile h-100">
                        <h3>Postdoctoral Fellows and Research Scientists</h3>
                        <p>For postdoctoral fellows and early-career scientists, AIRID offers opportunities to:</p>
                        <ul>
                            <li>Lead components of research projects</li>
                            <li>Develop grant-writing and project management skills</li>
                            <li>Supervise students and junior staff</li>
                            <li>Engage with national and international collaborators</li>
                        </ul>
                        <p class="mb-0">This supports progression towards independent research leadership.</p>
                    </div>
                </div>
            </div>

            <div class="trl-tile fade-in-up">
                <h3>Technical and Laboratory Training</h3>
                <p>AIRID provides hands-on technical training aligned with its research platforms, including:</p>
                <ul>
                    <li>Entomological methods and insectary management</li>
                    <li>Laboratory bioassays and vector control evaluation</li>
                    <li>Molecular and diagnostic techniques</li>
                    <li>Analytical chemistry and quality control methods</li>
                    <li>Data management, analysis, and modelling</li>
                </ul>
                <p class="mb-0">Training is delivered through supervised practice, short courses, and on-the-job mentorship within AIRID facilities.</p>
            </div>



            <h2 class="trl-section-title fade-in-up"><i class="fas fa-users"></i> Mentorship and Leadership Development</h2>
            <div class="trl-tile fade-in-up">
                <p class="section-lead">AIRID places strong emphasis on mentorship as a cornerstone of capacity strengthening. This includes:</p>
                <ul>
                    <li>Structured mentorship relationships</li>
                    <li>Leadership development for emerging scientists</li>
                    <li>Support for women and under-represented groups in research</li>
                    <li>Exposure to policy engagement and global health forums</li>
                </ul>
                <p class="mb-0">Mentorship is integrated into research teams and leadership structures to foster long-term professional growth.</p>
            </div>

            <h2 class="trl-section-title fade-in-up"><i class="fas fa-th-large"></i> Capacity strengthening at a glance</h2>
            <div class="row g-4 fade-in-up">
                <div class="col-lg-4">
                    <div class="trl-tile h-100">
                        <h3 class="trl-tile-heading"><i class="fas fa-handshake"></i> Partnerships for Capacity Strengthening</h3>
                        <p class="section-lead mb-0">AIRID works in partnership with universities and research institutions, national disease control programmes, regional and international research networks, and industry and innovation partners. Through these partnerships, AIRID supports joint training initiatives, staff exchanges, co-supervision of students, and shared learning platforms.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="trl-tile h-100">
                        <h3 class="trl-tile-heading"><i class="fas fa-flag"></i> Commitment to African-Led Capacity Development</h3>
                        <p class="section-lead mb-0">AIRID is committed to strengthening African research leadership and reducing dependency on external expertise. Training and capacity strengthening are designed to support: local ownership of research agendas; retention of skilled scientists within African institutions; and equitable partnerships in global health research. This commitment underpins AIRID’s vision of African-led science delivering global impact.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="trl-tile h-100">
                        <h3 class="trl-tile-heading"><i class="fas fa-building"></i> Institutional Capacity Strengthening</h3>
                        <p class="section-lead mb-0">In addition to individual training, AIRID supports institutional capacity strengthening by: developing and implementing quality systems and SOPs; strengthening laboratory and research governance structures; supporting data governance and information management systems; and building administrative and grant management capacity. This ensures that partner institutions and research units can sustainably deliver high-quality research.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) { entry.target.classList.add('visible'); observer.unobserve(entry.target); }
                });
            }, { threshold: 0.1, rootMargin: '0px 0px -30px 0px' });
            document.querySelectorAll('.fade-in-up').forEach(function(el) { observer.observe(el); });
        });
    </script>
@endsection
