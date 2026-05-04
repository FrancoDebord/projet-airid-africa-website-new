@extends('index')

@section('title', 'Home | AIRID Africa')

@section('css')
<style>
    /* Home page: confident, institutional, uncluttered - pas d'espace vide */
    .home-hero { background: linear-gradient(135deg, rgba(194,1,2,0.08) 0%, rgba(139,1,1,0.04) 50%, #f8f9fa 100%); padding: 1.25rem 0; }
    .home-hero .row-cadres { align-items: stretch; --bs-gutter-x: 0.75rem; --bs-gutter-y: 0.75rem; }
    .hero-frame, .section-frame.hero-parallel { height: 100%; min-height: 0; display: flex; flex-direction: column; }
    .hero-frame { background: #fff; border-radius: 10px; padding: 0.85rem 1rem; position: relative; overflow: hidden; box-shadow: 0 15px 45px rgba(0,0,0,0.07), 0 0 0 1px rgba(194,1,2,0.1); border-left: 4px solid #c20102; transition: box-shadow 0.4s ease, transform 0.4s ease; animation: heroFrameIn 0.8s ease-out; text-align: left; }
    .hero-frame::before { content: ''; position: absolute; top: 0; right: 0; width: 120px; height: 120px; background: radial-gradient(circle, rgba(194,1,2,0.06) 0%, transparent 70%); border-radius: 50%; pointer-events: none; }
    .hero-frame:hover { box-shadow: 0 20px 55px rgba(0,0,0,0.1), 0 0 0 1px rgba(194,1,2,0.15); transform: translateY(-3px); }
    @keyframes heroFrameIn { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
    .home-hero h1 { font-size: clamp(0.95rem, 1.8vw, 1.15rem); font-weight: 700; color: #1a1a1a; line-height: 1.25; margin-bottom: 0.3rem; position: relative; z-index: 1; text-align: left; }
    .home-hero .tagline { font-size: 0.8rem; font-weight: 600; color: #c20102; margin-bottom: 0.5rem; position: relative; z-index: 1; display: inline-block; padding-bottom: 0.2rem; border-bottom: 2px solid rgba(194,1,2,0.2); text-align: left; }
    .home-hero .intro { font-size: 0.75rem; color: #444; line-height: 1.5; max-width: 100%; margin-bottom: 0.75rem; position: relative; z-index: 1; text-align: left; }
    .home-hero .btn-hero { padding: 0.35rem 0.75rem; font-size: 0.75rem; font-weight: 600; border-radius: 6px; transition: all 0.3s; position: relative; z-index: 1; margin-top: auto; }
    .home-hero .btn-hero.btn-outline-danger { border-width: 2px; }
    .home-hero .btn-hero:hover { transform: translateY(-2px); }

    .home-section { padding: 2rem 0; }
    .home-section.alt { background: #f8f9fa; }
    .home-section h2 { font-size: 1.75rem; font-weight: 700; color: #1a1a1a; margin-bottom: 0.35rem; }
    .home-section .section-lead { font-size: 1.1rem; color: #555; line-height: 1.6; max-width: 800px; margin-bottom: 0.75rem; }
    .home-section .section-divider { width: 60px; height: 4px; background: linear-gradient(90deg, #c20102, #8b0101); border-radius: 2px; margin-bottom: 0.75rem; }
    .home-section ul.focus-list { list-style: none; padding: 0; margin: 0 0 0.75rem; }
    .home-section ul.focus-list li { position: relative; padding-left: 1.5rem; margin-bottom: 0.35rem; color: #444; line-height: 1.5; }
    .home-section ul.focus-list li::before { content: ''; position: absolute; left: 0; top: 0.5rem; width: 6px; height: 6px; background: #c20102; border-radius: 50%; }
    .home-section .section-link { font-weight: 600; color: #c20102; text-decoration: none; display: inline-flex; align-items: center; gap: 0.35rem; transition: gap 0.3s; }
    .home-section .section-link:hover { color: #8b0101; gap: 0.5rem; }
    .home-hero .section-link-btn,
    #who-we-are .section-link-btn {
        background: #c20102 !important; color: #fff !important; padding: 0.5rem 1rem; border-radius: 8px;
        transition: background 0.3s, transform 0.3s, box-shadow 0.3s; border: none;
    }
    .home-hero .section-link-btn:hover,
    #who-we-are .section-link-btn:hover {
        background: #8b0101 !important; color: #fff !important; transform: translateY(-2px); box-shadow: 0 4px 14px rgba(194,1,2,0.35); gap: 0.5rem;
    }
    .home-section .section-lead.mb-3 { margin-bottom: 0.5rem !important; }

    /* Cadre Who We Are : même style que hero, texte réduit (pour ligne parallèle) */
    .section-frame { background: #fff; border-radius: 10px; padding: 0.85rem 1rem; position: relative; overflow: hidden; box-shadow: 0 15px 45px rgba(0,0,0,0.07), 0 0 0 1px rgba(194,1,2,0.1); border-left: 4px solid #c20102; transition: box-shadow 0.4s ease, transform 0.4s ease; animation: heroFrameIn 0.6s ease-out; text-align: left; }
    .section-frame:hover { box-shadow: 0 20px 55px rgba(0,0,0,0.1), 0 0 0 1px rgba(194,1,2,0.15); transform: translateY(-3px); }
    .section-frame.hero-parallel { min-height: 0; }
    .section-frame h2 { font-size: clamp(0.95rem, 1.8vw, 1.15rem); margin-bottom: 0.2rem; text-align: left; font-weight: 700; color: #1a1a1a; }
    .section-frame .section-divider { width: 40px; height: 3px; margin-bottom: 0.4rem; }
    .section-frame .section-lead { font-size: 0.75rem; line-height: 1.45; max-width: 100%; margin-bottom: 0.35rem; text-align: left; color: #555; }
    .section-frame .focus-list { margin-bottom: 0.35rem; }
    .section-frame .focus-list li { font-size: 0.72rem; margin-bottom: 0.2rem; line-height: 1.4; }
    .section-frame .focus-list li::before { top: 0.35rem; width: 4px; height: 4px; }
    .section-frame .section-link { font-size: 0.8rem; }
    .section-frame .mb-1 { font-size: 0.72rem !important; margin-bottom: 0.25rem !important; }

    /* Triple cadres : Facilities, Training, Impact - animés + bouton Plus */
    .home-triple-cadres { padding: 1.5rem 0; }
    .home-triple-cadres .row-cadres-3 { align-items: stretch; --bs-gutter-x: 0.75rem; --bs-gutter-y: 0.75rem; }
    .home-triple-cadres .section-frame { opacity: 0; transform: translateY(24px); animation: tripleFrameIn 0.6s ease-out forwards; }
    .home-triple-cadres .col-lg-4:nth-child(1) .section-frame { animation-delay: 0.1s; }
    .home-triple-cadres .col-lg-4:nth-child(2) .section-frame { animation-delay: 0.2s; }
    .home-triple-cadres .col-lg-4:nth-child(3) .section-frame { animation-delay: 0.3s; }
    @keyframes tripleFrameIn { to { opacity: 1; transform: translateY(0); } }
    .home-triple-cadres .btn-plus { display: inline-flex; align-items: center; gap: 0.4rem; padding: 0.4rem 0.85rem; font-size: 0.8rem; font-weight: 600; color: #c20102; background: transparent; border: 2px solid #c20102; border-radius: 6px; text-decoration: none; transition: all 0.3s ease; margin-top: 0.5rem; }
    .home-triple-cadres .btn-plus:hover { color: #fff; background: #c20102; transform: translateY(-2px); box-shadow: 0 4px 12px rgba(194,1,2,0.3); }
    .home-triple-cadres .btn-plus i { font-size: 0.75rem; transition: transform 0.3s; }
    .home-triple-cadres .btn-plus:hover i { transform: translateX(3px); }

    .home-news-card { background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.06); transition: box-shadow 0.3s; height: 100%; display: flex; flex-direction: column; border: 1px solid #eee; }
    .home-news-card:hover { box-shadow: 0 8px 30px rgba(0,0,0,0.1); }
    .home-news-card .card-img-wrap { height: 160px; overflow: hidden; background: #e9ecef; }
    .home-news-card .card-img-wrap img { width: 100%; height: 100%; object-fit: cover; }
    .home-news-card .card-body { padding: 1.25rem; flex: 1; display: flex; flex-direction: column; }
    .home-news-card .card-title { font-size: 1rem; font-weight: 700; color: #1a1a1a; margin-bottom: 0.5rem; line-height: 1.35; }
    .home-news-card .card-meta { font-size: 0.85rem; color: #888; margin-top: auto; }

    /* News & Insights : 3 cadres carrés, très petits, infos organisées (sans description longue) */
    .news-updates-row.news-mini-cards { max-width: 540px; margin-left: auto; margin-right: auto; }
    .news-updates-row.news-mini-cards .project-card { max-width: 180px; margin-left: auto; margin-right: auto; }
    .news-updates-row.news-mini-cards .project-card {
        overflow: hidden; border-radius: 10px;
        aspect-ratio: 1 / 1;
        position: relative;
    }
    .news-updates-row.news-mini-cards .project-card > a { position: absolute; inset: 0; display: block; text-decoration: none; }
    .news-updates-row.news-mini-cards .project-card .project-img,
    .news-updates-row.news-mini-cards .project-card .project-img.w-100,
    .news-updates-row.news-mini-cards .project-card .bg-gradient {
        position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover;
    }
    .news-updates-row.news-mini-cards .project-overlay {
        position: absolute; inset: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, rgba(194,1,2,0.4) 40%, transparent 65%);
        display: flex; flex-direction: column; justify-content: flex-end;
        padding: 0.6rem 0.75rem;
    }
    .news-updates-row.news-mini-cards .project-overlay p { display: none; }
    .news-updates-row.news-mini-cards .project-overlay .badge:first-of-type { align-self: flex-start; font-size: 0.65rem; padding: 0.2rem 0.45rem; margin-bottom: 0.25rem; }
    .news-updates-row.news-mini-cards .project-overlay h5 { font-size: 0.8rem; margin-bottom: 0.25rem; line-height: 1.25; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
    .news-updates-row.news-mini-cards .project-overlay small { font-size: 0.7rem; margin-bottom: 0.2rem; opacity: 0.95; }
    .news-updates-row.news-mini-cards .project-overlay .mt-3 { margin-top: 0.35rem !important; }
    .news-updates-row.news-mini-cards .project-overlay .mt-3 .badge { font-size: 0.65rem; padding: 0.25rem 0.5rem; background: #1a1a1a !important; color: #fff !important; }
    @keyframes heartbeat {
        0%, 100% { transform: scale(1); }
        14% { transform: scale(1.04); }
        28% { transform: scale(1); }
        42% { transform: scale(1.02); }
        56% { transform: scale(1); }
    }
    .news-updates-row .card-heartbeat .project-card { animation: heartbeat 1.4s ease-in-out infinite; }

    /* Flagship Projects – disposition complète : en-tête 2 colonnes + grille bento */
    #flagship-projects { padding: 2.5rem 0; }
    #flagship-projects .flagship-header { display: grid; grid-template-columns: 1fr; gap: 1rem; margin-bottom: 1.75rem; align-items: start; }
    @media (min-width: 992px) {
        #flagship-projects .flagship-header { grid-template-columns: 1fr auto; align-items: end; gap: 1.5rem; }
        #flagship-projects .flagship-header .section-lead { margin-bottom: 0; max-width: 720px; }
        #flagship-projects .flagship-header .flagship-cta { text-align: right; }
    }
    #flagship-projects .flagship-cta .section-link { padding: 0.6rem 1.25rem; background: #fff; color: #c20102; border: 2px solid #c20102; border-radius: 8px; font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem; transition: all 0.3s ease; box-shadow: 0 4px 14px rgba(0,0,0,0.06); }
    #flagship-projects .flagship-cta .section-link:hover { background: #c20102; color: #fff; transform: translateY(-2px); box-shadow: 0 8px 24px rgba(194,1,2,0.25); }
    #flagship-projects .flagship-cta .section-link i { font-size: 0.8rem; transition: transform 0.3s; }
    #flagship-projects .flagship-cta .section-link:hover i { transform: translateX(4px); }

    .flagship-grid { display: grid; gap: 1rem; grid-template-columns: 1fr; grid-auto-rows: 200px; }
    @media (min-width: 576px) { .flagship-grid { grid-template-columns: repeat(2, 1fr); grid-auto-rows: 180px; } }
    @media (min-width: 992px) {
        .flagship-grid { grid-template-columns: repeat(4, 1fr); grid-template-rows: 200px 200px 180px; gap: 1.25rem; }
        .flagship-grid .flagship-tile-featured { grid-column: 1 / 3; grid-row: 1 / 3; }
        .flagship-grid .flagship-tile:nth-child(2) { grid-column: 3; grid-row: 1; }
        .flagship-grid .flagship-tile:nth-child(3) { grid-column: 4; grid-row: 1; }
        .flagship-grid .flagship-tile:nth-child(4) { grid-column: 3; grid-row: 2; }
        .flagship-grid .flagship-tile:nth-child(5) { grid-column: 4; grid-row: 2; }
        .flagship-grid .flagship-tile:nth-child(6) { grid-column: 1 / -1; grid-row: 3; }
    }

    .flagship-tile { position: relative; border-radius: 12px; overflow: hidden; display: block; text-decoration: none; background: #dee2e6; box-shadow: 0 6px 20px rgba(0,0,0,0.07); transition: box-shadow 0.35s ease, transform 0.35s ease; }
    .flagship-tile:hover { box-shadow: 0 14px 36px rgba(0,0,0,0.12), 0 0 0 2px rgba(194,1,2,0.25); transform: translateY(-3px); }
    .flagship-tile img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease; }
    .flagship-tile:hover img { transform: scale(1.06); }
    .flagship-tile .flagship-overlay { position: absolute; inset: 0; background: linear-gradient(to top, rgba(242, 161, 161, 0.85) 0%, rgba(0,0,0,0.35) 50%, transparent 70%); display: flex; flex-direction: column; justify-content: flex-end; padding: 1rem 1.25rem; }
    .flagship-tile .flagship-overlay h3 { font-size: 0.95rem; font-weight: 700; color: #fff; margin: 0; line-height: 1.3; text-shadow: 0 2px 8px rgba(194,1,2,0.6), 0 1px 3px rgba(0,0,0,0.2); }
    .flagship-tile-featured .flagship-overlay h3 { font-size: 1.25rem; line-height: 1.35; text-shadow: 0 2px 10px rgba(194,1,2,0.65), 0 1px 4px rgba(0,0,0,0.25); }
    .flagship-tile .flagship-overlay .tile-hint { font-size: 0.75rem; font-weight: 600; color: rgba(255,255,255,0.9); margin-top: 0.4rem; display: inline-flex; align-items: center; gap: 0.35rem; opacity: 0; transform: translateY(6px); transition: opacity 0.3s, transform 0.3s; }
    .flagship-tile:hover .flagship-overlay .tile-hint { opacity: 1; transform: translateY(0); }
    .flagship-tile .flagship-overlay .tile-hint i { color: #c20102; font-size: 0.65rem; }
    @media (max-width: 575px) { .flagship-grid .flagship-tile { min-height: 200px; } .flagship-tile .flagship-overlay h3 { font-size: 0.9rem; } }

    #newsletter-section.home-newsletter-band { background: linear-gradient(135deg, #c20102 0%, #8b0101 100%); color: #fff; padding: 1.75rem 0; }
    #newsletter-section.home-newsletter-band h3 { color: #fff; font-size: 1.5rem; font-weight: 700; margin-bottom: 0.5rem; }
    #newsletter-section.home-newsletter-band .form-control { border-radius: 8px; border: none; padding: 0.75rem 1.25rem; }
    #newsletter-section.home-newsletter-band .btn-light { border-radius: 8px; padding: 0.75rem 1.5rem; font-weight: 600; color: #c20102; }

    .home-cta-band { background: #1a1a1a; color: #fff; padding: 2rem 0; text-align: center; }
    .home-cta-band h2 { color: #fff; font-size: 1.75rem; font-weight: 700; margin-bottom: 0.5rem; }
    .home-cta-band p { color: rgba(255,255,255,0.85); font-size: 1.05rem; max-width: 640px; margin: 0 auto 0.75rem; line-height: 1.6; }
    .home-cta-band .btn-danger { padding: 0.75rem 2rem; font-weight: 600; border-radius: 8px; }

    /* Work With Us : rectangle horizontal, gauche = titre + intro, droite = 5 opportunités */
    #work-with-us { padding: 2rem 0; }
    #work-with-us .work-with-us-card {
        background: #fff; border-radius: 12px; padding: 1.5rem 2rem; margin: 0; width: 100%;
        box-shadow: 0 12px 40px rgba(0,0,0,0.08), 0 0 0 1px rgba(194,1,2,0.08);
        border-left: 5px solid #c20102;
        transition: box-shadow 0.35s ease, transform 0.35s ease;
        display: grid; grid-template-columns: 1fr 1.4fr; gap: 2rem; align-items: start;
    }
    #work-with-us .work-with-us-card:hover { box-shadow: 0 18px 50px rgba(0,0,0,0.1), 0 0 0 1px rgba(194,1,2,0.12); transform: translateY(-2px); }
    #work-with-us .work-with-us-left h2 { font-size: 1.65rem; font-weight: 700; color: #1a1a1a; margin-bottom: 0.4rem; }
    #work-with-us .work-with-us-left .section-divider { width: 56px; height: 4px; background: linear-gradient(90deg, #c20102, #8b0101); border-radius: 2px; margin-bottom: 1rem; }
    #work-with-us .work-with-us-left .section-lead { font-size: 1.05rem; color: #444; line-height: 1.6; margin-bottom: 0.75rem; }
    #work-with-us .work-with-us-left .section-lead.mb-3 { margin-bottom: 1rem !important; font-style: italic; color: #555; }
    #work-with-us .work-with-us-opportunities {
        list-style: none; padding: 0; margin: 0;
        display: flex; flex-direction: column; gap: 0.5rem;
    }
    #work-with-us .work-with-us-opportunities li {
        display: flex; align-items: center; gap: 0.85rem; padding: 0.4rem 0;
        font-size: 0.98rem; color: #333; line-height: 1.4;
    }
    #work-with-us .work-with-us-opportunities li i {
        flex-shrink: 0; width: 34px; height: 34px; display: flex; align-items: center; justify-content: center;
        background: linear-gradient(135deg, rgba(194,1,2,0.12), rgba(139,1,1,0.08)); color: #c20102;
        border-radius: 10px; font-size: 0.9rem;
    }
    #work-with-us .work-with-us-cta { display: flex; flex-wrap: wrap; align-items: center; gap: 1rem; margin-top: 0.75rem; }
    #work-with-us .work-with-us-cta .section-link { font-size: 1rem; padding: 0.5rem 0; }
    #work-with-us .work-with-us-cta .btn-work-with-us {
        display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.6rem 1.35rem; font-weight: 600; font-size: 0.95rem;
        background: #c20102; color: #fff; border: none; border-radius: 8px; text-decoration: none;
        transition: background 0.3s, transform 0.3s, box-shadow 0.3s;
    }
    #work-with-us .work-with-us-cta .btn-work-with-us:hover { background: #8b0101; color: #fff; transform: translateY(-2px); box-shadow: 0 6px 20px rgba(194,1,2,0.35); }
    @media (max-width: 991px) {
        #work-with-us .work-with-us-card { grid-template-columns: 1fr; }
    }
    @media (max-width: 768px) {
        #work-with-us .work-with-us-card { padding: 1.25rem 1.25rem; gap: 1.25rem; }
        #work-with-us .work-with-us-left h2 { font-size: 1.4rem; }
        #work-with-us .work-with-us-opportunities li { font-size: 0.95rem; }
        #work-with-us .work-with-us-opportunities li i { width: 32px; height: 32px; font-size: 0.85rem; }
    }

    /* Partnerships : pas de cadre, logos plus grands, pas de zoom au survol */
    #partnerships .container { max-width: 100%; }
    #partnerships .section-lead { max-width: 100%; }
    .partners-band { overflow: hidden; padding: 1.25rem 0; }
    .partners-track { display: flex; align-items: center; gap: 3.5rem; animation: scroll-partners 60s linear infinite; }
    .partners-track .partner-item { flex: 0 0 auto; }
    .partners-track .partner-item img {
        max-height: 100px; max-width: 220px; object-fit: contain;
        filter: grayscale(0.25); opacity: 0.9;
    }
    .partners-track .partner-item:hover img { filter: grayscale(0); opacity: 1; }
    @keyframes scroll-partners { 0% { transform: translateX(0); } 100% { transform: translateX(-50%); } }

    @media (max-width: 991px) {
        .home-hero .hero-frame, .home-hero .section-frame.hero-parallel { min-height: auto; }
    }
    /* Facts (count) : section réduite */
    #facts.facts-area { padding: 1rem 0 !important; }
    #facts .facts-wrapper .row { --bs-gutter-y: 0.5rem; }
    #facts .ts-facts-img { margin-bottom: 0.4rem !important; }
    #facts .ts-facts-img img,
    #facts .fact-icon { max-width: 42px; max-height: 42px; width: auto; height: auto; object-fit: contain; }
    #facts .ts-facts-num { font-size: 1.2rem; font-weight: 700; margin-bottom: 0.15rem; }
    #facts .ts-facts-title { font-size: 0.8rem; font-weight: 600; margin: 0; line-height: 1.3; }

    @media (max-width: 768px) {
        .home-hero { padding: 1.5rem 0; }
        .home-hero h1 { font-size: 1rem; }
        .home-hero .tagline { font-size: 0.85rem; }
        .home-hero .intro { font-size: 0.8rem; }
        .section-frame h2 { font-size: 1rem; }
        .section-frame .section-lead, .section-frame .focus-list li { font-size: 0.8rem; }
        .home-section { padding: 1.5rem 0; }
        .home-project-tile { height: 180px; }
        .home-triple-cadres .col-lg-4 { margin-bottom: 0.75rem; }
        .home-triple-cadres .btn-plus { font-size: 0.85rem; padding: 0.5rem 1rem; }
        #facts .ts-facts-num { font-size: 1.05rem; }
        #facts .ts-facts-title { font-size: 0.75rem; }
        #facts .fact-icon { max-width: 36px; max-height: 36px; }
    }
</style>
@endsection

@section('content')
    {{-- Carousel en haut de page --}}
    @include('partials.carroussel')

    {{-- 1. HERO + WHO WE ARE sur la même ligne (cadres parallèles) --}}


    {{-- 4. Triple cadres : Facilities, Training, Impact (animés + bouton En savoir plus) --}}
    <section class="home-section home-triple-cadres alt" id="facilities-training-impact">
        <div class="container">
            <div class="row row-cadres-3 g-4">
                <div class="col-lg-4">
                    <div class="section-frame hero-parallel">
                        <h2>Facilities & Research Platforms</h2>
                        <div class="section-divider"></div>
                        <p class="section-lead">AIRID operates specialised research platforms supporting high-quality science:</p>
                        <ul class="focus-list">
                            <li>Advanced molecular laboratories</li>
                            <li>Insecticide testing platforms</li>
                            <li>Experimental hut and field evaluation sites</li>
                            <li>Analytical chemistry & data infrastructure</li>
                        </ul>
                        <a href="{{ route('facilitiesLanding') }}" class="btn-plus">En savoir plus <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="section-frame hero-parallel">
                        <h2>Training & Capacity Strengthening</h2>
                        <div class="section-divider"></div>
                        <p class="section-lead">AIRID builds sustainable African research and public health capacity through:</p>
                        <ul class="focus-list">
                            <li>Postgraduate training (MSc, PhD) with Universities</li>
                            <li>Short courses and continuing professional development</li>
                            <li>Hands-on training in research projects</li>
                            <li>Mentorship and leadership development</li>
                        </ul>
                        <a href="{{ route('educationTrainingPage') }}" class="btn-plus">En savoir plus <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="section-frame hero-parallel">
                        <h2>Impact & Influence</h2>
                        <div class="section-divider"></div>
                        <p class="section-lead"><strong>Evidence That Shapes Policy and Programmes.</strong> AIRID's work contributes to:</p>
                        <ul class="focus-list">
                            <li>National disease control strategies</li>
                            <li>Optimisation of intervention delivery</li>
                            <li>Evaluation of new and existing public health tools</li>
                            <li>Surveillance and decision-making systems</li>
                        </ul>
                        <a href="{{ route('researchActivitiesPage') }}" class="btn-plus">En savoir plus <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 8. FLAGSHIP PROJECTS – disposition bento : 1 grand + 4 petits + 1 bandeau --}}
    <section class="home-section alt" id="flagship-projects">
        <div class="container">
            <div class="flagship-header">
                <div>
                    <h5>Flagship Projects</h5>
                    <div class="section-divider"></div>
                    <p class="section-lead">AIRID leads and contributes to major research initiatives in public health: vector control optimisation, evaluation of malaria and vector-borne disease tools, intervention durability and performance, and evidence for vaccines and delivery. These flagship projects reflect our role as a trusted evidence partner.</p>
                </div>
                <div class="flagship-cta">
                    <a href="{{ route('allProjectsPage') }}" class="section-link">Research Projects (ongoing & completed) <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="flagship-grid">
                @foreach($all_recents_projects->take(6) as $index => $projet)
                    <a href="{{ route('detailProject', ['id' => $projet->id, 'slug' => Str::slug($projet->short_title_project ?? $projet->titre_project ?? 'project')]) }}" class="flagship-tile {{ $index === 0 ? 'flagship-tile-featured' : '' }}">
                        @if($projet->photo_couverture ?? null)
                            <img src="{{ asset('storage/assets/projects/' . $projet->photo_couverture) }}" alt="{{ $projet->short_title_project ?? $projet->titre_project }}" loading="lazy">
                        @else
                            <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 400 240' fill='%23e9ecef'%3E%3Crect width='400' height='240' fill='%23dee2e6'/%3E%3Ctext x='50%25' y='50%25' dominant-baseline='middle' text-anchor='middle' font-family='sans-serif' font-size='18' fill='%236c757d'%3EProject%3C/text%3E%3C/svg%3E" alt="Project">
                        @endif
                        <div class="flagship-overlay">
                            <h3>{{ Str::limit($projet->short_title_project ?? $projet->titre_project ?? 'Project', $index === 0 ? 80 : 50) }}</h3>
                            <span class="tile-hint">View project <i class="fas fa-arrow-right"></i></span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>




    <!-- Section Vacancy, News, Publication -->

    @include('partials.count')

    {{-- 9. PARTNERSHIPS --}}
    <section class="home-section" id="partnerships">
        <div class="container">
            <h2>Partnerships</h2>
            <div class="section-divider"></div>
            <p class="section-lead"><strong>Working Together for Greater Impact</strong><br>AIRID collaborates with governments and national programmes, academic and research institutions, funders and development partners, industry and innovation partners, and communities and local stakeholders. Partnerships are built on transparency, equity, and shared commitment to impact.</p>
            <a href="{{ route('partnersPage') }}" class="section-link d-inline-block mb-2">Partnerships <i class="fas fa-arrow-right"></i></a>
            @if($all_partenaires->isNotEmpty())
                <div class="partners-band">
                    <div class="partners-track">
                        @foreach($all_partenaires as $p)
                            <div class="partner-item">
                                <a href="{{ $p->site_web ?? '#' }}" target="_blank" rel="noopener">
                                    <img src="{{ asset('storage/assets/logo/' . $p->logo_partenaire) }}" alt="{{ $p->nom_partenaire }}" loading="lazy">
                                </a>
                            </div>
                        @endforeach
                        @foreach($all_partenaires as $p)
                            <div class="partner-item">
                                <a href="{{ $p->site_web ?? '#' }}" target="_blank" rel="noopener">
                                    <img src="{{ asset('storage/assets/logo/' . $p->logo_partenaire) }}" alt="{{ $p->nom_partenaire }}">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>

    {{-- 10. WORK WITH US --}}
    <section class="home-section alt" id="work-with-us">
        <div class="container">
            <div class="work-with-us-card">
                <div class="work-with-us-left">
                    <h2>Work With Us</h2>
                    <div class="section-divider"></div>
                    <p class="section-lead"><strong>Join Us or Collaborate with AIRID</strong><br>AIRID offers opportunities to:</p>
                    <p class="section-lead mb-3">We welcome engagement from individuals and organisations aligned with our mission.</p>
                    <div class="work-with-us-cta">
                        <a href="{{ route('vacanciesPage') }}" class="section-link">View vacancies <i class="fas fa-arrow-right"></i></a>
                        <a href="{{ route('getInvolvedPage') }}" class="btn-work-with-us">Get Involved <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <ul class="work-with-us-opportunities">
                    <li><i class="fas fa-user-plus"></i> Join our team</li>
                    <li><i class="fas fa-handshake"></i> Collaborate on research and training</li>
                    <li><i class="fas fa-graduation-cap"></i> Participate in short courses and academic programmes</li>
                    <li><i class="fas fa-flask"></i> Apply for research studentships</li>
                    <li><i class="fas fa-book-open"></i> Partner on policy-relevant research</li>
                </ul>
            </div>
        </div>
    </section>

    {{-- 11. CALL TO ACTION (final band) --}}
    {{-- <section class="home-cta-band">
        <div class="container">
            <h2>Partner with AIRID to Advance Evidence-Driven Public Health</h2>
            <p>Whether you are a researcher, policymaker, funder, or practitioner, AIRID welcomes collaboration to generate evidence that delivers impact.</p>
            <a href="{{ route('getInvolvedPage') }}" class="btn btn-danger">Get Involved</a>
        </div>
    </section> --}}
@endsection

@section('js')
<script>
document.addEventListener('DOMContentLoaded', function() {
    var els = document.querySelectorAll('.home-section, .home-hero, .home-cta-band');
    var observer = new IntersectionObserver(function(entries) {
        entries.forEach(function(e) {
            if (e.isIntersecting) e.target.classList.add('visible');
        });
    }, { threshold: 0.08, rootMargin: '0px 0px -40px 0px' });
    els.forEach(function(el) { observer.observe(el); });
});

// Carousel : défilement automatique (autoplay)
(function() {
    function initCarouselAutoplay() {
        if (typeof jQuery === 'undefined' || typeof jQuery.fn.slick === 'undefined') return;
        var $carousel = jQuery('.banner-carousel-1');
        if (!$carousel.length) return;
        if ($carousel.hasClass('slick-initialized')) {
            $carousel.slick('unslick');
        }
        $carousel.slick({
            autoplay: true,
            autoplaySpeed: 5000,
            infinite: true,
            speed: 600,
            fade: false,
            dots: true,
            arrows: true,
            adaptiveHeight: false
        });
    }
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function() { setTimeout(initCarouselAutoplay, 100); });
    } else {
        setTimeout(initCarouselAutoplay, 100);
    }
})();
</script>
@endsection
