@extends('index')

@section('title', 'Field Research Platforms | AIRID Africa')

@section('css')
    <style>
        .frp-banner { background-size: cover; background-position: center; }
        .frp-intro {
            background: linear-gradient(135deg, rgba(194, 1, 2, 0.06) 0%, rgba(139, 1, 1, 0.06) 100%);
            padding: 2rem 1.75rem;
            border-radius: 16px;
            margin: 2rem 0 2.5rem;
            border-left: 5px solid #c20102;
        }
        .frp-intro .section-lead { font-size: 1.05rem; line-height: 1.7; color: #333; margin-bottom: 0.75rem; }
        .frp-intro .section-lead:last-child { margin-bottom: 0; }

        .frp-section-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .frp-section-title i { color: #c20102; }

        /* Cartes : une par ligne, image à gauche, contenu + bouton à droite */
        .frp-card-link {
            display: flex;
            flex-direction: row;
            align-items: stretch;
            background: #fff;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            border: 1px solid #eee;
            text-decoration: none;
            color: inherit;
            transition: all 0.3s ease;
            min-height: 340px;
        }
        /* Inversé : contenu à gauche, image à droite */
        .frp-card-link.frp-card-link--image-right {
            flex-direction: row-reverse;
        }
        @media (max-width: 767px) {
            .frp-card-link { flex-direction: column; min-height: auto; }
            .frp-card-link.frp-card-link--image-right { flex-direction: column; }
        }
        .frp-card-link:hover {
            box-shadow: 0 12px 32px rgba(194, 1, 2, 0.18);
            border-color: #c20102;
            transform: translateY(-4px);
            text-decoration: none;
            color: inherit;
        }

        .frp-card-img-wrap {
            flex: 0 0 500px;
            min-height: 340px;
            overflow: hidden;
            background: #f0f0f0;
        }
        @media (max-width: 767px) {
            .frp-card-img-wrap { flex: 0 0 auto; width: 100%; min-height: 320px; }
        }
        .frp-card-img-wrap img {
            width: 100%;
            height: 100%;
            min-height: 340px;
            object-fit: cover;
            transition: transform 0.4s ease;
        }
        @media (max-width: 767px) {
            .frp-card-img-wrap img { min-height: 320px; }
        }
        .frp-card-link:hover .frp-card-img-wrap img {
            transform: scale(1.05);
        }

        .frp-card-body {
            flex: 1;
            padding: 1.5rem 1.5rem 1.5rem 1.75rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            padding-right: 4rem;
        }
        @media (max-width: 767px) {
            .frp-card-body { padding: 1.35rem 1.25rem 1.35rem 1.25rem; padding-right: 3.5rem; }
        }
        .frp-card-title {
            font-size: 1.35rem;
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 0.75rem;
        }
        .frp-card-link:hover .frp-card-title { color: #c20102; }
        .frp-card-desc {
            font-size: 1rem;
            line-height: 1.65;
            color: #444;
            margin-bottom: 0;
            max-width: 100%;
        }
        .frp-card-arrow {
            position: absolute;
            right: 1.5rem;
            top: 50%;
            transform: translateY(-50%);
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: rgba(194, 1, 2, 0.1);
            color: #c20102;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            flex-shrink: 0;
            transition: all 0.3s ease;
        }
        .frp-card-link:hover .frp-card-arrow {
            background: #c20102;
            color: #fff;
            transform: translateY(-50%) translateX(4px);
        }

        /* Espace après chaque carte */
        .frp-card-row .col-12 {
            margin-bottom: 2.5rem;
        }
        .frp-card-row .col-12:last-child {
            margin-bottom: 0;
        }

        .fade-in-up { opacity: 0; transform: translateY(24px); transition: opacity 0.6s ease, transform 0.6s ease; }
        .fade-in-up.visible { opacity: 1; transform: translateY(0); }
    </style>
@endsection

@section('content')
    <div id="banner-area" class="banner-area frp-banner"
        style="background-image:url({{ asset('storage/assets_vendor/images/banner/banner2_new.png') }})">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title top_title fade-in-up">Field Research Platforms</h1>
                            <p class="text-white mt-3 fade-in-up tagline mb-0" style="font-size: 1.4rem;">
                                Semi-field and community-based research infrastructure
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="py-5">
        <div class="container">
            <div class="frp-intro fade-in-up">
                <p class="section-lead">
                    AIRID's Field Research Platforms bring together semi-field and community-level research infrastructure. These platforms support the evaluation of vector control interventions under near-field conditions, from experimental hut stations to field laboratories and community evaluation sites.
                </p>
                <p class="section-lead">
                    Select a platform below to discover its role, infrastructure, and how it supports AIRID's mission to generate high-quality, policy-relevant evidence.
                </p>
            </div>

            <h2 class="frp-section-title fade-in-up"><i class="fas fa-th-large"></i> Explore our platforms</h2>

            <div class="row g-4 frp-card-row fade-in-up">
                <div class="col-12">
                    <a href="{{ route('experimentalHutStationPage') }}" class="frp-card-link">
                        <div class="frp-card-img-wrap">
                            <img src="{{ asset('storage/assets/facility/field-station/DJI_0152.jpg') }}" alt="Experimental Hut Station" loading="lazy">
                        </div>
                        <div class="frp-card-body">
                            <h3 class="frp-card-title">Experimental Hut Station</h3>
                            <p class="frp-card-desc">World-class semi-field research platform in Covè for evaluating ITNs, IRS, spatial repellents and novel tools under near-field conditions.</p>
                            <span class="frp-card-arrow"><i class="fas fa-arrow-right"></i></span>
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a href="{{ route('fieldStationLabPage') }}" class="frp-card-link frp-card-link--image-right">
                        <div class="frp-card-img-wrap">
                            <img src="{{ asset('storage/assets/facility/field-station/DJI_0160.jpg') }}" alt="Field Site Laboratory" loading="lazy">
                        </div>
                        <div class="frp-card-body">
                            <h3 class="frp-card-title">Field Site Laboratory</h3>
                            <p class="frp-card-desc">Depending on the manufacturer’s claims, new insecticidal products to be submitted for WHO prequalification will be evaluated in line with current WHO efficacy guidelines, using laboratory, semi-field, or community trials as appropriate.</p>
                            <span class="frp-card-arrow"><i class="fas fa-arrow-right"></i></span>
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a href="{{ route('pageFacility', 'community-evaluation') }}" class="frp-card-link">
                        <div class="frp-card-img-wrap">
                            <img src="{{ asset('storage/assets/facility/field-station/DJI_0191.jpg') }}" alt="Community Evaluation Platforms" loading="lazy">
                        </div>
                        <div class="frp-card-body">
                            <h3 class="frp-card-title">Community Evaluation Platforms</h3>
                            <p class="frp-card-desc">Community- and health-facility-based platforms for evaluating vector control interventions and implementation research in real-world settings.</p>
                            <span class="frp-card-arrow"><i class="fas fa-arrow-right"></i></span>
                        </div>
                    </a>
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
