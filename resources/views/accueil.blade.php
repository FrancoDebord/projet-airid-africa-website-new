@extends('index')


@section('css')

<style>
    /* Home page: confident, institutional, uncluttered - pas d'espace vide */
    .home-hero,
    .home-section,
    .home-triple-cadres,
    #news,
    #partnerships,
    #work-with-us {
        font-family: var(--airid-font-family);
    }

    .home-hero h1,
    .home-section h2,
    .section-title,
    .section-sub-title,
    .section-lead,
    .intro,
    .focus-list li {
        font-family: inherit;
    }

    .home-hero { background: linear-gradient(135deg, rgba(194,1,2,0.08) 0%, rgba(139,1,1,0.04) 50%, #f8f9fa 100%); padding: 1.25rem 0; }
    .home-hero .row-cadres { align-items: stretch; --bs-gutter-x: 0.75rem; --bs-gutter-y: 0.75rem; }
    .hero-frame, .section-frame.hero-parallel { height: 100%; min-height: 0; display: flex; flex-direction: column; }
    .hero-frame { background: #fff; border-radius: 10px; padding: 0.85rem 1rem; position: relative; overflow: hidden; box-shadow: 0 15px 45px rgba(0,0,0,0.07), 0 0 0 1px rgba(194,1,2,0.1); border-left: 4px solid #c20102; transition: box-shadow 0.4s ease, transform 0.4s ease; animation: heroFrameIn 0.8s ease-out; text-align: left; }
    .hero-frame::before { content: ''; position: absolute; top: 0; right: 0; width: 120px; height: 120px; background: radial-gradient(circle, rgba(194,1,2,0.06) 0%, transparent 70%); border-radius: 50%; pointer-events: none; }
    .hero-frame:hover { box-shadow: 0 20px 55px rgba(0,0,0,0.1), 0 0 0 1px rgba(194,1,2,0.15); transform: translateY(-3px); }
    @keyframes heroFrameIn { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
    .home-hero h1 { font-size: var(--airid-h1-size); font-weight: 700; color: var(--airid-title-color); line-height: 1.25; margin-bottom: 0.3rem; position: relative; z-index: 1; text-align: left; }
    .home-hero .tagline { font-size: var(--airid-tagline-size); font-weight: 600; color: #c20102; margin-bottom: 0.5rem; position: relative; z-index: 1; display: inline-block; padding-bottom: 0.2rem; border-bottom: 2px solid rgba(194,1,2,0.2); text-align: left; }
    .home-hero .intro { font-size: var(--airid-text-size); color: var(--airid-text-color); line-height: var(--airid-text-line-height); max-width: 100%; margin-bottom: 0.75rem; position: relative; z-index: 1; text-align: left; }
    .home-hero .btn-hero { padding: 0.4rem 0.85rem; font-size: 0.875rem; font-weight: 600; border-radius: 6px; transition: all 0.3s; position: relative; z-index: 1; margin-top: auto; }
    .home-hero .btn-hero.btn-outline-danger { border-width: 2px; }
    .home-hero .btn-hero:hover { transform: translateY(-2px); }

    .home-section { padding: 2rem 0; }
    .home-section.alt { background: #f8f9fa; }
    .home-section h2 { font-size: var(--airid-h2-size); font-weight: 700; color: var(--airid-title-color); margin-bottom: 0.35rem; }
    .home-section .section-lead { font-size: var(--airid-text-size); color: var(--airid-text-color); line-height: var(--airid-text-line-height); max-width: 800px; margin-bottom: 0.75rem; }
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
    .section-frame h2 { font-size: var(--airid-h2-size); margin-bottom: 0.2rem; text-align: left; font-weight: 700; color: var(--airid-title-color); }
    .section-frame .section-divider { width: 40px; height: 3px; margin-bottom: 0.4rem; }
    .section-frame .section-lead { font-size: var(--airid-text-size); line-height: var(--airid-text-line-height); max-width: 100%; margin-bottom: 0.35rem; text-align: left; color: var(--airid-text-color); }
    .section-frame .focus-list { margin-bottom: 0.35rem; }
    .section-frame .focus-list li { font-size: var(--airid-text-size); margin-bottom: 0.2rem; line-height: var(--airid-text-line-height); }
    .section-frame .focus-list li::before { top: 0.35rem; width: 4px; height: 4px; }
    .section-frame .section-link { font-size: var(--airid-tagline-size); }
    .section-frame .mb-1 { font-size: 0.8125rem !important; margin-bottom: 0.25rem !important; }

    /* Triple cadres : Facilities, Training, Impact - animés + bouton Plus */
    .home-triple-cadres { padding: 1.5rem 0; }
    .home-triple-cadres .row-cadres-3 { align-items: stretch; --bs-gutter-x: 0.75rem; --bs-gutter-y: 0.75rem; }
    .home-triple-cadres .section-frame { opacity: 0; transform: translateY(24px); animation: tripleFrameIn 0.6s ease-out forwards; }
    .home-triple-cadres .col-lg-4:nth-child(1) .section-frame { animation-delay: 0.1s; }
    .home-triple-cadres .col-lg-4:nth-child(2) .section-frame { animation-delay: 0.2s; }
    .home-triple-cadres .col-lg-4:nth-child(3) .section-frame { animation-delay: 0.3s; }
    @keyframes tripleFrameIn { to { opacity: 1; transform: translateY(0); } }
    .home-triple-cadres .btn-plus { display: inline-flex; align-items: center; gap: 0.4rem; padding: 0.45rem 0.9rem; font-size: var(--airid-tagline-size); font-weight: 600; color: #c20102; background: transparent; border: 2px solid #c20102; border-radius: 6px; text-decoration: none; transition: all 0.3s ease; margin-top: 0.5rem; }
    .home-triple-cadres .btn-plus:hover { color: #fff; background: #c20102; transform: translateY(-2px); box-shadow: 0 4px 12px rgba(194,1,2,0.3); }
    .home-triple-cadres .btn-plus i { font-size: 0.8125rem; transition: transform 0.3s; }
    .home-triple-cadres .btn-plus:hover i { transform: translateX(3px); }

    .home-news-card { background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.06); transition: box-shadow 0.3s; height: 100%; display: flex; flex-direction: column; border: 1px solid #eee; }
    .home-news-card:hover { box-shadow: 0 8px 30px rgba(0,0,0,0.1); }
    .home-news-card .card-img-wrap { height: 160px; overflow: hidden; background: #e9ecef; }
    .home-news-card .card-img-wrap img { width: 100%; height: 100%; object-fit: cover; }
    .home-news-card .card-body { padding: 1.25rem; flex: 1; display: flex; flex-direction: column; }
    .home-news-card .card-title { font-size: var(--airid-h3-size); font-weight: 700; color: var(--airid-title-color); margin-bottom: 0.5rem; line-height: 1.35; }
    .home-news-card .card-meta { font-size: var(--airid-text-size); color: #888; margin-top: auto; }

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
    .news-updates-carousel {
        max-width: 100%;
        margin: 0 auto;
        padding: 0 1.5rem;
    }
    .news-updates-carousel .carousel-inner {
        border-radius: 14px;
    }
    .news-updates-carousel .carousel-item {
        transition: transform 0.75s ease-in-out;
        will-change: transform;
    }
    .news-updates-carousel .carousel-card-wrap { padding: 0.25rem; }
    .news-updates-carousel .project-card {
        margin: 0 auto;
        background: #fff5f5;
        height: 300px;
        border: 1px solid rgba(194, 1, 2, 0.18);
    }
    .news-updates-carousel .project-img {
        height: 300px;
        object-fit: cover;
        filter: brightness(0.72) saturate(0.88);
    }
    .news-updates-carousel .latest-update-fallback {
        height: 300px;
        background: linear-gradient(135deg, #fecaca 0%, #f87171 52%, #dc2626 100%);
    }
    .news-updates-carousel .latest-update-overlay {
        background: linear-gradient(
            to top,
            rgba(153, 27, 27, 0.84) 0%,
            rgba(185, 28, 28, 0.64) 45%,
            rgba(239, 68, 68, 0.36) 75%,
            rgba(239, 68, 68, 0.14) 100%
        );
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        min-height: 100%;
    }
    .news-updates-carousel .latest-update-overlay h5,
    .news-updates-carousel .latest-update-overlay p,
    .news-updates-carousel .latest-update-overlay small {
        color: #fff !important;
        text-shadow: 0 2px 8px rgba(0, 0, 0, 0.65);
    }
    .news-updates-carousel .latest-update-overlay h5 {
        min-height: 2.6em;
        line-height: 1.3;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .news-updates-carousel .latest-update-type-badge {
        background: #dc2626 !important;
        color: #fff !important;
        border: 1px solid rgba(255, 255, 255, 0.35);
    }
    .news-updates-carousel .latest-update-cta-badge {
        background: #fee2e2 !important;
        color: #991b1b !important;
        border: 1px solid rgba(153, 27, 27, 0.25);
    }
    .news-updates-carousel .latest-update-summary {
        font-size: 0.9rem;
        min-height: 2.8em;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .news-updates-carousel .latest-update-card {
        animation: heartbeat 2.4s ease-in-out infinite;
        transform-origin: center;
        will-change: transform;
    }
    .news-updates-carousel .latest-update-card:hover {
        animation-duration: 1.6s;
    }
    .news-updates-carousel .carousel-indicators {
        margin-bottom: -2rem;
    }
    .news-updates-carousel .carousel-indicators li {
        width: 9px;
        height: 9px;
        border-radius: 50%;
        background-color: #c20102;
        opacity: 0.4;
    }
    .news-updates-carousel .carousel-indicators .active {
        opacity: 1;
    }
    .news-updates-carousel .carousel-control-prev,
    .news-updates-carousel .carousel-control-next {
        width: 42px;
        height: 42px;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(0, 0, 0, 0.45);
        border-radius: 50%;
    }
    .news-updates-carousel .carousel-control-prev { left: -6px; }
    .news-updates-carousel .carousel-control-next { right: -6px; }
    .news-updates-carousel .carousel-control-prev-icon,
    .news-updates-carousel .carousel-control-next-icon {
        width: 1rem;
        height: 1rem;
    }
    @media (max-width: 768px) {
        .news-updates-carousel {
            padding: 0 0.5rem;
        }
        .news-updates-carousel .carousel-control-prev,
        .news-updates-carousel .carousel-control-next {
            width: 36px;
            height: 36px;
        }
        .news-updates-carousel .carousel-control-prev { left: -2px; }
        .news-updates-carousel .carousel-control-next { right: -2px; }
    }
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
    #newsletter-section.home-newsletter-band h3 { color: #fff; font-size: var(--airid-h2-size); font-weight: 700; margin-bottom: 0.5rem; }
    #newsletter-section.home-newsletter-band .form-control { border-radius: 8px; border: none; padding: 0.75rem 1.25rem; }
    #newsletter-section.home-newsletter-band .btn-light { border-radius: 8px; padding: 0.75rem 1.5rem; font-weight: 600; color: #c20102; }

    .home-cta-band { background: #1a1a1a; color: #fff; padding: 2rem 0; text-align: center; }
    .home-cta-band h2 { color: #fff; font-size: var(--airid-h2-size); font-weight: 700; margin-bottom: 0.5rem; }
    .home-cta-band p { color: rgba(255,255,255,0.85); font-size: var(--airid-text-size); max-width: 640px; margin: 0 auto 0.75rem; line-height: var(--airid-text-line-height); }
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
    #work-with-us .work-with-us-left h2 { font-size: var(--airid-h2-size); font-weight: 700; color: #1a1a1a; margin-bottom: 0.4rem; }
    #work-with-us .work-with-us-left .section-divider { width: 56px; height: 4px; background: linear-gradient(90deg, #c20102, #8b0101); border-radius: 2px; margin-bottom: 1rem; }
    #work-with-us .work-with-us-left .section-lead { font-size: var(--airid-text-size); color: #444; line-height: var(--airid-text-line-height); margin-bottom: 0.75rem; }
    #work-with-us .work-with-us-left .section-lead.mb-3 { margin-bottom: 1rem !important; font-style: italic; color: #555; }
    #work-with-us .work-with-us-opportunities {
        list-style: none; padding: 0; margin: 0;
        display: flex; flex-direction: column; gap: 0.5rem;
    }
    #work-with-us .work-with-us-opportunities li {
        display: flex; align-items: center; gap: 0.85rem; padding: 0.4rem 0;
        font-size: var(--airid-text-size); color: #333; line-height: var(--airid-text-line-height);
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
    #facts .ts-facts-num { font-size: var(--airid-h3-size); font-weight: 700; margin-bottom: 0.15rem; }
    #facts .ts-facts-title { font-size: var(--airid-tagline-size); font-weight: 600; margin: 0; line-height: 1.3; }

    @media (max-width: 768px) {
        .home-hero { padding: 1.5rem 0; }
        /* Conserver les tailles institutionnelles (variables) au lieu de forcer du trop petit */
        .home-hero h1 { font-size: var(--airid-h1-size); }
        .home-hero .tagline { font-size: var(--airid-tagline-size); }
        .home-hero .intro { font-size: var(--airid-text-size); }
        .section-frame h2 { font-size: var(--airid-h2-size); }
        .section-frame .section-lead, .section-frame .focus-list li { font-size: var(--airid-text-size); }
        .home-section { padding: 1.5rem 0; }
        .home-project-tile { height: 180px; }
        .home-triple-cadres .col-lg-4 { margin-bottom: 0.75rem; }
        .home-triple-cadres .btn-plus { font-size: var(--airid-tagline-size); padding: 0.5rem 1rem; }
        #facts .ts-facts-num { font-size: var(--airid-h3-size); }
        #facts .ts-facts-title { font-size: var(--airid-tagline-size); }
        #facts .fact-icon { max-width: 36px; max-height: 36px; }
    }

    /* We Are Specialists In / What We Do : même typo que hero */
    #ts-service-area .section-title,
    #specialites .section-title { font-size: var(--airid-h2-size) !important; font-weight: 700 !important; color: var(--airid-title-color) !important; }
    #ts-service-area .section-sub-title,
    #specialites .section-sub-title { font-size: var(--airid-tagline-size) !important; color: var(--airid-tagline-color) !important; font-weight: 600 !important; }
    .ts-service-area .service-box-title,
    .ts-service-area .service-box-title a { font-size: var(--airid-h3-size) !important; font-weight: 700 !important; color: var(--airid-title-color) !important; }
    .ts-service-area .service-card p { font-size: var(--airid-text-size) !important; color: var(--airid-text-color) !important; line-height: var(--airid-text-line-height) !important; }

    /* Specialities – bloc Research That Informs Action (intro au-dessus des 6 cartes) */
    .specialities-intro-card {
        background: #fff;
        border-radius: 16px;
        padding: 1.75rem 2rem;
        box-shadow: 0 4px 24px rgba(0,0,0,0.06);
        border: 1px solid rgba(0,0,0,0.06);
    }
    .specialities-intro-title {
        font-size: var(--airid-h2-size);
        font-weight: 700;
        color: var(--airid-title-color);
        margin: 0 0 0.75rem 0;
        line-height: 1.3;
    }
    .specialities-intro-lead {
        font-size: var(--airid-text-size);
        color: var(--airid-text-color);
        line-height: var(--airid-text-line-height);
        margin: 0 0 0.75rem 0;
    }
    .specialities-intro-list {
        list-style: none;
        padding: 0;
        margin: 0 0 1rem 0;
    }
    .specialities-intro-list li {
        position: relative;
        padding-left: 1.35rem;
        margin-bottom: 0.4rem;
        font-size: var(--airid-text-size);
        color: var(--airid-text-color);
        line-height: var(--airid-text-line-height);
    }
    .specialities-intro-list li::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0.5rem;
        width: 6px;
        height: 6px;
        background: #c20102;
        border-radius: 50%;
    }
    .specialities-intro-closing {
        font-size: var(--airid-text-size);
        color: var(--airid-text-color);
        line-height: var(--airid-text-line-height);
        margin: 0 0 1.25rem 0;
    }
    .specialities-intro-link {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.9rem;
        font-weight: 600;
        color: #c20102;
        text-decoration: none;
        padding: 0.5rem 1.1rem;
        border: 2px solid #c20102;
        border-radius: 8px;
        transition: all 0.25s ease;
    }
    .specialities-intro-link:hover {
        color: #fff;
        background: #c20102;
        transform: translateX(4px);
    }
    .specialities-intro-link i { font-size: 0.8rem; transition: transform 0.25s; }
    .specialities-intro-link:hover i { transform: translateX(4px); }

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

        .fade-in {
            opacity: 0;
            transition: opacity 1s ease-out;
        }

        .fade-in.visible {
            opacity: 1;
        }

        /* ============================================
           SECTION NEWSLETTER MODERNE
           ============================================ */
        #newsletter-section {
            background: linear-gradient(135deg, #c20102 0%, #8b0101 100%);
            position: relative;
            overflow: hidden;
        }

        #newsletter-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><circle cx="50" cy="50" r="2" fill="rgba(255,255,255,0.1)"/></svg>');
            opacity: 0.3;
        }

        .subscribe-call-to-acton {
            position: relative;
            z-index: 2;
        }

        .subscribe-call-to-acton h3 {
            color: #fff;
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }

        .subscribe-call-to-acton h4 {
            color: #fff;
            font-size: 1.5rem;
            font-weight: 600;
            display: inline-block;
            padding: 0.5rem 1.5rem;
            background: rgba(255,255,255,0.2);
            border-radius: 50px;
            transition: all 0.3s ease;
        }

        .subscribe-call-to-acton h4:hover {
            background: rgba(255,255,255,0.3);
            transform: scale(1.05);
        }

        .newsletter-form {
            position: relative;
            z-index: 2;
        }

        .newsletter-form .form-control-lg {
            border-radius: 50px;
            border: none;
            padding: 1rem 1.5rem;
            font-size: 1rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .newsletter-form .form-control-lg:focus {
            box-shadow: 0 6px 20px rgba(0,0,0,0.15);
            transform: translateY(-2px);
        }

        .newsletter-form .btn-primary {
            border-radius: 50px;
            padding: 1rem 2.5rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
            border: none;
        }

        .newsletter-form .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 25px rgba(0,0,0,0.3);
        }

        /* ============================================
           SECTION PROJETS AMÉLIORÉE
           ============================================ */
        .project-card {
            height: 300px;
            border-radius: 15px;
            overflow: hidden;
            position: relative;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        .project-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 15px 40px rgba(0,0,0,0.2);
        }

        .project-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .project-card:hover .project-img {
            transform: scale(1.15);
        }

        .project-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(194, 1, 2, 0.9) 0%, transparent 60%);
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            opacity: 1;
            transition: opacity 0.4s ease;
            padding: 1.5rem;
        }

        .project-card:hover .project-overlay {
            opacity: 1;
            background: linear-gradient(to top, rgba(194, 1, 2, 0.95) 0%, transparent 50%);
        }

        /* Animation heartbeat pour les cadres Latest Updates */
        .latest-update-card {
            animation: heartbeat 2s ease-in-out infinite;
            cursor: pointer;
        }

        .latest-update-card:hover {
            animation: heartbeat-fast 1s ease-in-out infinite;
        }

        .project-overlay h5 {
            color: #fff;
            font-size: clamp(0.88rem, 1.5vw, 1.05rem);
            font-weight: 700;
            margin-bottom: 0.5rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .project-overlay small {
            color: rgba(255,255,255,0.95);
            font-size: 0.8rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .project-overlay small i {
            font-size: 0.8rem;
        }

        .project-overlay p {
            font-size: 0.875rem !important;
            line-height: 1.55;
        }

        /* En-tête section Flagship Projects */
        .flagship-section-header .section-title { margin-bottom: 0.5rem; }
        .flagship-section-header .title-divider { width: 60px; height: 4px; background: linear-gradient(90deg, #c20102, #8b0101); border-radius: 2px; }
        .flagship-section-header .flagship-intro { max-width: 720px; margin-left: auto; margin-right: auto; line-height: 1.6; color: #444; }

        /* ============================================
           FLAGSHIP PROJECT CARDS (image + bandeau bleu + View Project)
           ============================================ */
        /* Espace entre la 1re rangée et les rangées suivantes */
        .flagship-project-cards .flagship-second-row {
            margin-top: 1.5rem;
        }
        @media (min-width: 992px) {
            .flagship-project-cards .flagship-second-row {
                margin-top: 2rem;
            }
        }
        .flagship-project-cards > [class*="col-"] {
            display: flex;
        }
        .flagship-project-cards .flagship-project-card {
            display: flex;
            flex-direction: column;
            width: 100%;
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
        }
        .flagship-project-cards .flagship-project-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 32px rgba(0,0,0,0.12);
        }
        .flagship-card-image-wrap {
            position: relative;
            height: 200px;
            background: #e9ecef;
            flex-shrink: 0;
        }
        .flagship-card-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
            display: block;
        }
        .flagship-project-card:hover .flagship-card-img {
            transform: scale(1.05);
        }
        .flagship-badge-status {
            position: absolute;
            top: 12px;
            right: 12px;
            color: #fff;
            font-size: 0.75rem;
            font-weight: 600;
            padding: 0.35rem 0.75rem;
            border-radius: 50px;
        }
        .flagship-badge-status--ended { background: #4caf50; }      /* Completed */
        .flagship-badge-status--ongoing { background: #ffb300; }    /* Ongoing */
        .flagship-badge-status--abandoned { background: #9e9e9e; }  /* Abandoned */
        .flagship-card-footer {
            background: #c7c3c3;
            color: #fff;
            padding: 1rem 1rem 1.1rem;
            text-align: left;
            min-height: 120px;
            display: flex;
            flex-direction: column;
            flex: 1;
        }
        .flagship-card-title {
            font-size: clamp(0.85rem, 1.3vw, 1rem);
            font-weight: 700;
            color: #141313;
            margin: 0 0 0.35rem 0;
            line-height: 1.25;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .flagship-card-desc {
            font-size: 0.75rem;
            color: #101010;
            margin: 0 0 0.5rem 0;
            line-height: 1.35;
            font-weight: 400;
            flex: 1;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .flagship-card-cta {
            margin-top: auto;
            padding-top: 0.5rem;
        }
        .flagship-cta-text {
            font-size: 0.85rem;
            color: #c20102;
            font-weight: 400;
        }
        .flagship-cta-btn {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #c20102;
            color: #fff;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
            flex-shrink: 0;
            transition: background 0.3s, transform 0.3s;
        }
        .flagship-cta-btn i {
            color: #fff;
        }
        .flagship-project-card:hover .flagship-cta-btn {
            background: #a00102;
            transform: translateX(4px);
        }

        /* ============================================
           SECTIONS TITRES
           ============================================ */
        .section-title {
            font-size: var(--airid-h2-size);
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 0.5rem;
            position: relative;
        }

        .section-sub-title {
            font-size: var(--airid-tagline-size);
            color: #555;
            font-weight: 600;
        }

        /* ============================================
           DIVIDER SOUS TITRES
           ============================================ */
        .title-divider {
            width: 80px;
            height: 4px;
            background: linear-gradient(135deg, #c20102 0%, #8b0101 100%);
            border-radius: 2px;
        }

        /* ============================================
           BOUTON MODERNE
           ============================================ */
        .btn-primary {
            background: linear-gradient(135deg, #c20102 0%, #8b0101 100%);
            border: none;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-primary::before {
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

        .btn-primary:hover::before {
            width: 300px;
            height: 300px;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(194, 1, 2, 0.4);
        }

        /* ============================================
           RESPONSIVE
           ============================================ */
        @media (max-width: 992px) {
            .project-card {
                height: 260px;
            }
            .section-title {
                font-size: var(--airid-h2-size);
            }
        }

        @media (max-width: 768px) {
            .project-card {
                height: 220px;
            }
            .subscribe-call-to-acton h3 {
                font-size: 1.5rem;
            }
            .subscribe-call-to-acton h4 {
                font-size: 1.2rem;
            }
        }

        /* ============================================
           MESSAGE DE SUCCÈS
           ============================================ */
        #newsletter-section-message {
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
           CARTES NEWS - PETITS CARRÉS ANIMÉS
           ============================================ */
        .news-card {
            position: relative;
            background: #fff;
            border-radius: 15px;
            padding: 1.5rem;
            height: 100%;
            min-height: 280px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            border: 1px solid #f0f0f0;
        }

        .news-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(135deg, #c20102 0%, #8b0101 100%);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.4s ease;
        }

        .news-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .news-card:hover::before {
            transform: scaleX(1);
        }

        .news-card-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            background: linear-gradient(135deg, #c20102 0%, #8b0101 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.2rem;
            transition: all 0.4s ease;
            box-shadow: 0 4px 15px rgba(194, 1, 2, 0.3);
        }

        .news-card:hover .news-card-icon {
            transform: rotate(5deg) scale(1.1);
            box-shadow: 0 6px 20px rgba(194, 1, 2, 0.4);
        }

        .news-card-icon i {
            font-size: 1.8rem;
            color: #fff;
        }

        .news-card-content {
            flex: 1;
        }

        .news-card-title {
            font-size: clamp(0.88rem, 1.5vw, 1rem);
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 0.8rem;
            line-height: 1.3;
        }

        .news-card-text {
            font-size: 0.875rem;
            color: #444;
            line-height: 1.55;
            margin-bottom: 1rem;
            min-height: 48px;
        }

        .news-card-date {
            font-size: 0.8rem;
            color: #666;
            display: flex;
            align-items: center;
            margin-top: auto;
        }

        .news-card-link {
            position: absolute;
            bottom: 1.5rem;
            right: 1.5rem;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #c20102 0%, #8b0101 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(194, 1, 2, 0.3);
        }

        .news-card-link:hover {
            transform: scale(1.15) rotate(90deg);
            box-shadow: 0 6px 20px rgba(194, 1, 2, 0.5);
            color: #fff;
        }

        .news-card-link-full {
            width: auto;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            position: static;
            margin-top: 1rem;
            display: inline-flex;
            align-items: center;
        }

        .news-card-link-full:hover {
            transform: translateX(5px);
        }

        .news-card-more {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border: 2px dashed #dee2e6;
        }

        .news-card-more:hover {
            border-color: #c20102;
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .news-card {
                min-height: 250px;
                padding: 1.2rem;
            }

            .news-card-icon {
                width: 50px;
                height: 50px;
            }

            .news-card-icon i {
                font-size: 1.5rem;
            }

            .news-card-title {
                font-size: 0.9rem;
            }

            .news-card-text {
                font-size: 0.875rem;
            }
        }

        /* ============================================
           ANIMATION CUBES NEWS DANS CARROUSEL
           ============================================ */
        .banner-carousel {
            position: relative !important;
            overflow: visible !important;
        }

        .banner-carousel .slick-list,
        .banner-carousel .slick-track {
            overflow: visible !important;
        }

        .banner-carousel .slick-slide {
            overflow: visible !important;
        }

        .banner-carousel-item {
            position: relative !important;
        }

        .banner-carousel-item .slider-content {
            position: relative;
            z-index: 1;
        }

        .news-cards-overlay-slide {
            position: absolute !important;
            top: 0 !important;
            left: 0 !important;
            right: 0 !important;
            bottom: 0 !important;
            width: 100% !important;
            height: 100% !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            z-index: 10 !important;
            pointer-events: none;
            padding: 0;
        }

        .news-cards-overlay-slide .news-card-cube {
            pointer-events: all;
        }

        .news-cards-overlay .container {
            position: relative;
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
        }

        .news-cards-overlay .news-card-cube {
            pointer-events: all;
        }

        .news-cards-container {
            position: relative;
            width: 100% !important;
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 0;
        }

        @media (max-width: 1200px) {
            .news-cards-overlay {
                padding: 0 15px;
            }
        }

        /* Force la visibilité des cartes */
        .news-cards-overlay,
        .news-cards-overlay * {
            visibility: visible !important;
        }

        .news-card-cube {
            visibility: visible !important;
        }

        /* Cartes cubes avec animation */
        .news-card-cube {
            position: relative;
            background: rgba(255, 255, 255, 0.1) !important;
            backdrop-filter: blur(25px) saturate(200%);
            -webkit-backdrop-filter: blur(25px) saturate(200%);
            border-radius: 15px;
            padding: 1.5rem;
            height: 100%;
            min-height: 280px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2), 0 0 0 1px rgba(255, 255, 255, 0.2) inset;
            overflow: hidden;
            display: flex !important;
            flex-direction: column;
            border: 1px solid rgba(255, 255, 255, 0.2);
            opacity: 0;
            transform-style: preserve-3d;
            perspective: 1000px;
            visibility: visible !important;
            transition: all 0.3s ease;
        }

        .news-card-cube:hover {
            background: rgba(255, 255, 255, 0.25) !important;
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.3), 0 0 0 1px rgba(255, 255, 255, 0.3) inset;
        }

        /* Animation de dispersion puis convergence */
        @keyframes cubeDisperseConverge1 {
            0% {
                opacity: 1;
                transform: translate(-100vw, -100vh) rotateX(-90deg) rotateY(-90deg) scale(0.3);
            }
            30% {
                opacity: 1;
                transform: translate(-50vw, -50vh) rotateX(-45deg) rotateY(-45deg) scale(0.6);
            }
            60% {
                opacity: 1;
                transform: translate(20px, 20px) rotateX(10deg) rotateY(10deg) scale(1.1);
            }
            80% {
                transform: translate(-5px, -5px) rotateX(-5deg) rotateY(-5deg) scale(1.05);
            }
            100% {
                opacity: 1;
                transform: translate(0, 0) rotateX(0deg) rotateY(0deg) scale(1);
            }
        }

        @keyframes cubeDisperseConverge2 {
            0% {
                opacity: 1;
                transform: translate(100vw, -100vh) rotateX(-90deg) rotateY(90deg) scale(0.3);
            }
            30% {
                opacity: 1;
                transform: translate(50vw, -50vh) rotateX(-45deg) rotateY(45deg) scale(0.6);
            }
            60% {
                opacity: 1;
                transform: translate(-20px, 20px) rotateX(10deg) rotateY(-10deg) scale(1.1);
            }
            80% {
                transform: translate(5px, -5px) rotateX(-5deg) rotateY(5deg) scale(1.05);
            }
            100% {
                opacity: 1;
                transform: translate(0, 0) rotateX(0deg) rotateY(0deg) scale(1);
            }
        }

        @keyframes cubeDisperseConverge3 {
            0% {
                opacity: 1;
                transform: translate(-100vw, 100vh) rotateX(90deg) rotateY(-90deg) scale(0.3);
            }
            30% {
                opacity: 1;
                transform: translate(-50vw, 50vh) rotateX(45deg) rotateY(-45deg) scale(0.6);
            }
            60% {
                opacity: 1;
                transform: translate(20px, -20px) rotateX(-10deg) rotateY(10deg) scale(1.1);
            }
            80% {
                transform: translate(-5px, 5px) rotateX(5deg) rotateY(-5deg) scale(1.05);
            }
            100% {
                opacity: 1;
                transform: translate(0, 0) rotateX(0deg) rotateY(0deg) scale(1);
            }
        }

        @keyframes cubeDisperseConverge4 {
            0% {
                opacity: 0;
                transform: translate(100vw, 100vh) rotateX(90deg) rotateY(90deg) scale(0.3);
            }
            5% {
                opacity: 1;
            }
            30% {
                opacity: 1;
                transform: translate(50vw, 50vh) rotateX(45deg) rotateY(45deg) scale(0.6);
            }
            60% {
                opacity: 1;
                transform: translate(-20px, -20px) rotateX(-10deg) rotateY(-10deg) scale(1.1);
            }
            80% {
                opacity: 1;
                transform: translate(5px, 5px) rotateX(5deg) rotateY(5deg) scale(1.05);
            }
            100% {
                opacity: 1;
                transform: translate(0, 0) rotateX(0deg) rotateY(0deg) scale(1);
            }
        }

        .news-card-cube-1 {
            animation: cubeDisperseConverge1 2s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
        }

        .news-card-cube-2 {
            animation: cubeDisperseConverge2 2s cubic-bezier(0.34, 1.56, 0.64, 1) 0.2s forwards;
        }

        .news-card-cube-3 {
            animation: cubeDisperseConverge3 2s cubic-bezier(0.34, 1.56, 0.64, 1) 0.4s forwards;
        }

        .news-card-cube-4 {
            animation: cubeDisperseConverge4 2s cubic-bezier(0.34, 1.56, 0.64, 1) 0.6s forwards !important;
        }

        /* Animation heartbeat pour la carte "All News" après l'animation d'arrivée */
        .news-card-cube-4.news-card-more {
            animation: cubeDisperseConverge4 2s cubic-bezier(0.34, 1.56, 0.64, 1) 0.6s forwards,
                       heartbeat 2s ease-in-out infinite 2.6s !important;
        }

        /* Styles des cartes cubes (héritent de news-card) */
        .news-card-cube::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(135deg, #c20102 0%, #8b0101 100%);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.4s ease;
        }

        .news-card-cube:hover {
            transform: translateY(-10px) rotateX(5deg) rotateY(5deg) !important;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .news-card-cube:hover::before {
            transform: scaleX(1);
        }

        .news-card-cube .news-card-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            background: linear-gradient(135deg, rgba(194, 1, 2, 0.75) 0%, rgba(139, 1, 1, 0.75) 100%);
            backdrop-filter: blur(15px) saturate(180%);
            -webkit-backdrop-filter: blur(15px) saturate(180%);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.2rem;
            transition: all 0.4s ease;
            box-shadow: 0 4px 15px rgba(194, 1, 2, 0.35), 0 0 0 1px rgba(255, 255, 255, 0.25) inset;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .news-card-cube:hover .news-card-icon {
            transform: rotate(5deg) scale(1.1);
            box-shadow: 0 6px 20px rgba(194, 1, 2, 0.45), 0 0 0 1px rgba(255, 255, 255, 0.35) inset;
            background: linear-gradient(135deg, rgba(194, 1, 2, 0.85) 0%, rgba(139, 1, 1, 0.85) 100%);
        }

        .news-card-cube .news-card-icon i {
            font-size: 1.8rem;
            color: #fff;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .news-card-cube .news-card-content {
            flex: 1;
        }

        .news-card-cube .news-card-title {
            font-size: clamp(0.88rem, 1.5vw, 1rem);
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 0.8rem;
            line-height: 1.3;
            text-shadow: 0 3px 6px rgba(255, 255, 255, 1), 0 2px 4px rgba(255, 255, 255, 0.8), 0 1px 2px rgba(0, 0, 0, 0.15);
        }

        .news-card-cube .news-card-text {
            font-size: 0.875rem;
            color: #444;
            line-height: 1.55;
            margin-bottom: 1rem;
            min-height: 48px;
            text-shadow: 0 3px 5px rgba(255, 255, 255, 1), 0 2px 3px rgba(255, 255, 255, 0.8), 0 1px 1px rgba(0, 0, 0, 0.1);
            font-weight: 600;
        }

        .news-card-cube .news-card-date {
            font-size: 0.8rem;
            color: #555;
            display: flex;
            align-items: center;
            margin-top: auto;
            font-weight: 700;
            text-shadow: 0 3px 5px rgba(255, 255, 255, 1), 0 2px 3px rgba(255, 255, 255, 0.8), 0 1px 1px rgba(0, 0, 0, 0.1);
        }

        .news-card-cube .news-card-date i {
            text-shadow: 0 2px 3px rgba(255, 255, 255, 1), 0 1px 2px rgba(255, 255, 255, 0.8);
        }

        .news-card-cube .news-card-link {
            position: absolute;
            bottom: 1.5rem;
            right: 1.5rem;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(194, 1, 2, 0.75) 0%, rgba(139, 1, 1, 0.75) 100%);
            backdrop-filter: blur(15px) saturate(180%);
            -webkit-backdrop-filter: blur(15px) saturate(180%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(194, 1, 2, 0.35), 0 0 0 1px rgba(255, 255, 255, 0.25) inset;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .news-card-cube .news-card-link:hover {
            transform: scale(1.15) rotate(90deg);
            box-shadow: 0 6px 20px rgba(194, 1, 2, 0.5), 0 0 0 1px rgba(255, 255, 255, 0.35) inset;
            background: linear-gradient(135deg, rgba(194, 1, 2, 0.85) 0%, rgba(139, 1, 1, 0.85) 100%);
            color: #fff;
        }

        .news-card-cube .news-card-link i {
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
        }

        .news-card-cube .news-card-link-full {
            width: auto;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            position: static;
            margin-top: 1rem;
            display: inline-flex;
            align-items: center;
            background: linear-gradient(135deg, rgba(194, 1, 2, 0.75) 0%, rgba(139, 1, 1, 0.75) 100%);
            backdrop-filter: blur(15px) saturate(180%);
            -webkit-backdrop-filter: blur(15px) saturate(180%);
            box-shadow: 0 4px 10px rgba(194, 1, 2, 0.35), 0 0 0 1px rgba(255, 255, 255, 0.25) inset;
            border: 1px solid rgba(255, 255, 255, 0.3);
            pointer-events: none;
        }

        .news-card-cube .news-card-link-full:hover {
            transform: translateX(5px);
            background: linear-gradient(135deg, rgba(194, 1, 2, 0.85) 0%, rgba(139, 1, 1, 0.85) 100%);
            box-shadow: 0 6px 15px rgba(194, 1, 2, 0.45), 0 0 0 1px rgba(255, 255, 255, 0.35) inset;
        }

        .news-card-cube .news-card-link-full span {
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
        }

        /* Lien cliquable pour toute la carte */
        a[href*="news"] .news-card-cube.news-card-more {
            text-decoration: none;
            color: inherit;
            transition: all 0.3s ease;
        }

        a[href*="news"] .news-card-cube.news-card-more:hover {
            text-decoration: none;
        }

        .news-card-cube.news-card-more {
            background: rgba(255, 255, 255, 0.4) !important;
            backdrop-filter: blur(25px) saturate(200%);
            -webkit-backdrop-filter: blur(25px) saturate(200%);
            border: 2px dashed rgba(194, 1, 2, 0.5);
            cursor: pointer;
            box-shadow: 0 8px 32px rgba(194, 1, 2, 0.3), 0 0 0 1px rgba(255, 255, 255, 0.4) inset;
            position: relative;
            display: block;
            width: 100%;
            height: 100%;
            /* L'animation cubeDisperseConverge4 gère l'opacité et la transformation d'arrivée */
            /* L'animation heartbeat commence après l'animation d'arrivée */
        }

        .news-card-cube.news-card-more:hover {
            border-color: rgba(194, 1, 2, 0.8);
            background: rgba(255, 255, 255, 0.6) !important;
            animation: heartbeat-fast 1s ease-in-out infinite;
            box-shadow: 0 12px 40px rgba(194, 1, 2, 0.4), 0 0 0 1px rgba(255, 255, 255, 0.5) inset;
            transform: translateY(-5px);
        }

        /* Animation de battement de cœur */
        @keyframes heartbeat {
            0% {
                transform: scale(1);
            }
            14% {
                transform: scale(1.05);
            }
            28% {
                transform: scale(1);
            }
            42% {
                transform: scale(1.05);
            }
            70% {
                transform: scale(1);
            }
            100% {
                transform: scale(1);
            }
        }

        /* Animation de battement de cœur rapide au survol */
        @keyframes heartbeat-fast {
            0% {
                transform: scale(1);
            }
            25% {
                transform: scale(1.08);
            }
            50% {
                transform: scale(1);
            }
            75% {
                transform: scale(1.08);
            }
            100% {
                transform: scale(1);
            }
        }

        /* Animation de l'icône dans la carte "All News" */
        .news-card-cube.news-card-more .news-card-icon {
            animation: iconPulse 2s ease-in-out infinite;
        }

        .news-card-cube.news-card-more:hover .news-card-icon {
            animation: iconPulse-fast 1s ease-in-out infinite;
        }

        @keyframes iconPulse {
            0%, 100% {
                transform: scale(1);
            }
            14% {
                transform: scale(1.15) rotate(5deg);
            }
            28% {
                transform: scale(1);
            }
            42% {
                transform: scale(1.15) rotate(-5deg);
            }
            70% {
                transform: scale(1);
            }
        }

        @keyframes iconPulse-fast {
            0%, 100% {
                transform: scale(1);
            }
            25% {
                transform: scale(1.2) rotate(8deg);
            }
            50% {
                transform: scale(1);
            }
            75% {
                transform: scale(1.2) rotate(-8deg);
            }
        }

        /* Responsive pour les cubes */
        @media (max-width: 768px) {
            .news-cards-container {
                padding: 1rem 0;
            }

            .news-card-cube {
                min-height: 250px;
                padding: 1.2rem;
            }

            .news-card-cube .news-card-icon {
                width: 50px;
                height: 50px;
            }

            .news-card-cube .news-card-icon i {
                font-size: 1.5rem;
            }

            .news-card-cube .news-card-title {
                font-size: 0.9rem;
            }

            .news-card-cube .news-card-text {
                font-size: 0.875rem;
            }
        }
    </style>
@endsection

@section('content')
    @include('partials.carroussel')

    <section class="py-5 bg-light">
        <div class="container">
            <!-- Titre avec animation -->
<!-- Carrousel : 4 cadres visibles par slide -->
            @php
                $updatesItems = collect();

                if ($recent_vacancy) {
                    $updatesItems->push([
                        'type' => 'Job Opportunity',
                        'title' => $recent_vacancy->job_title ?? $recent_vacancy->intitule_recrutement ?? 'Vacancy',
                        'summary' => $recent_vacancy->resume_poste ? Str::limit(strip_tags($recent_vacancy->resume_poste), 80) : null,
                        'date' => 'Deadline: ' . ($recent_vacancy->application_deadline ? date('F j, Y', strtotime($recent_vacancy->application_deadline)) : 'Open'),
                        'url' => route('vacanciesPage'),
                        'image' => null,
                        'cta' => 'View Details',
                    ]);
                }

                if ($recent_publication) {
                    $updatesItems->push([
                        'type' => 'Publication',
                        'title' => $recent_publication->titre_publication,
                        'summary' => $recent_publication->resume_publication ? Str::limit(strip_tags($recent_publication->resume_publication), 80) : null,
                        'date' => $recent_publication->annee_publication ?? 'Recent',
                        'url' => route('detailPublication', ['id' => $recent_publication->id, 'slug' => Str::slug($recent_publication->titre_publication)]),
                        'image' => asset('assets/news/publications.png'),
                        'cta' => 'Read More',
                    ]);
                }

                foreach ($all_news->take(6) as $newsItem) {
                    $newsCoverName = !empty($newsItem->photo_couverture) ? basename($newsItem->photo_couverture) : null;
                    $newsImage = ($newsCoverName && file_exists(public_path('assets/news/' . $newsCoverName)))
                        ? asset('assets/news/' . $newsCoverName)
                        : asset('assets/news/news.png');
                    $updatesItems->push([
                        'type' => 'News',
                        'title' => $newsItem->titre_news ?? 'News',
                        'summary' => $newsItem->resume ? Str::limit(strip_tags($newsItem->resume), 80) : null,
                        'date' => $newsItem->date_news ? date('F j, Y', strtotime($newsItem->date_news)) : ($newsItem->created_at ? date('F j, Y', strtotime($newsItem->created_at)) : 'Recent'),
                        'url' => route('newsPage'),
                        'image' => $newsImage,
                        'cta' => 'Read More',
                    ]);
                }

                if ($updatesItems->count() > 0 && $updatesItems->count() < 4) {
                    $updatesItems = $updatesItems->concat($updatesItems->take(4 - $updatesItems->count()));
                }

                if ($updatesItems->count() > 4 && $updatesItems->count() % 4 !== 0) {
                    $updatesItems = $updatesItems->concat($updatesItems->take(4 - ($updatesItems->count() % 4)));
                }

                // Garantit un vrai défilement: au moins 2 slides de 4 cartes
                if ($updatesItems->count() === 4) {
                    $updatesItems = $updatesItems->concat($updatesItems->take(4));
                }

                $updateSlides = $updatesItems->chunk(4)->values();
                $slidesCount = $updateSlides->count();
            @endphp
            @if($slidesCount > 0)
                <div id="latestUpdatesCarousel" class="carousel slide news-updates-carousel fade-in-up" data-ride="carousel" data-interval="5000" data-pause="hover">
                    @if($slidesCount > 1)
                        <ol class="carousel-indicators">
                            @foreach($updateSlides as $slideIndex => $slideItems)
                                <li data-target="#latestUpdatesCarousel" data-slide-to="{{ $slideIndex }}" class="{{ $slideIndex === 0 ? 'active' : '' }}"></li>
                            @endforeach
                        </ol>
                    @endif

                    <div class="carousel-inner">
                        @foreach($updateSlides as $slideIndex => $slideItems)
                            <div class="carousel-item {{ $slideIndex === 0 ? 'active' : '' }}">
                                <div class="row g-3">
                                    @foreach($slideItems as $item)
                                        <div class="col-12 col-sm-6 col-lg-3">
                                            <div class="carousel-card-wrap">
                                                <div class="project-card latest-update-card position-relative overflow-hidden rounded">
                                                    <a href="{{ $item['url'] }}" class="text-decoration-none">
                                                        <div class="project-img w-100 latest-update-fallback"></div>
                                                        <div class="project-overlay latest-update-overlay">
                                                            <span class="badge mb-2 latest-update-type-badge">{{ $item['type'] }}</span>
                                                            <h5 class="fw-bold mb-2">{{ Str::limit($item['title'], 60) }}</h5>
                                                            <p class="text-white mb-2 latest-update-summary">{{ $item['summary'] ?? 'Latest AIRID update.' }}</p>
                                                            <small class="fw-semibold">
                                                                <i class="far fa-calendar-alt me-2"></i>
                                                                {{ $item['date'] }}
                                                            </small>
                                                            <div class="mt-3">
                                                                <span class="badge latest-update-cta-badge">
                                                                    <i class="fas fa-arrow-right me-1"></i>
                                                                    {{ $item['cta'] }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>

                    @if($slidesCount > 1)
                        <a class="carousel-control-prev" href="#latestUpdatesCarousel" role="button" data-slide="prev" aria-label="Slide précédente">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </a>
                        <a class="carousel-control-next" href="#latestUpdatesCarousel" role="button" data-slide="next" aria-label="Slide suivante">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </a>
                    @endif
                </div>
            @endif

            <!-- Bouton Voir plus -->
            <div class="text-center mt-5 fade-in-up">
                <a class="btn btn-primary px-5 py-3 fw-bold" href="{{ route('newsPage') }}">
                    <i class="fas fa-arrow-right me-2"></i>
                    View All Updates
                </a>
            </div>
        </div>
    </section>

 <section class="home-hero" id="who-we-are">
        <div class="container">
            <div class="row row-cadres g-4">
                {{-- Cadre gauche : Hero --}}
                <div class="col-lg-6">
                    <div class="hero-frame">
                        <h1>Advancing African-Led Science for Infectious Disease Control and Elimination</h1>
                        <p class="tagline">Bold science. African-led. Impact-driven.</p>
                        <p class="intro">The African Institute for Research in Infectious Diseases (AIRID) is an independent, non-profit research organisation generating high-quality scientific evidence to support the prevention and control of infectious diseases in Africa. We work at the interface of research, policy, and practice, delivering evidence that informs programmes, strengthens systems, and improves public health outcomes.</p>
                        <div class="d-flex flex-wrap gap-2 mt-auto">
                            <a href="{{ route('researchActivitiesPage') }}" class="btn btn-danger btn-hero">Our Work</a>
                            <a href="{{ route('getInvolvedPage') }}" class="btn btn-outline-danger btn-hero">Work With Us</a>
                        </div>
                    </div>
                </div>
                {{-- Cadre droite : Who We Are --}}
                <div class="col-lg-6">
                    <div class="section-frame hero-parallel">
                        <h2>Who We Are</h2>
                        <div class="section-divider"></div>
                        <p class="section-lead"><strong>An African Research Institute with Global Reach</strong><br>AIRID is based in Benin and works across Africa in partnership with governments, research institutions, funders, and global health organisations.</p>
                        <p class="mb-1 fw-semibold text-dark">Our work focuses on:</p>
                        <ul class="focus-list">
                            <li>Infectious disease research and innovation</li>
                            <li>Evaluation of public health interventions and tools</li>
                            <li>Training and capacity strengthening</li>
                            <li>Evidence translation for policy and programmes</li>
                        </ul>
                        <p class="section-lead mb-2">AIRID is committed to African leadership, scientific independence, and long-term impact.</p>
                        <a href="{{ route('aboutPage') }}" class="section-link section-link-btn">About AIRID <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
                        </ul><br>
                        <a href="{{ route('facilitiesLanding') }}" class="btn-plus">Learn more <i class="fas fa-arrow-right"></i></a>
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
                        <a href="{{ route('educationTrainingPage') }}" class="btn-plus">Visit all <i class="fas fa-arrow-right"></i></a>
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
                        </ul><br><br>
                        <a href="{{ route('researchActivitiesPage') }}" class="btn-plus">Learn more <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section Vacancy, News, Publication -->

    @include('partials.count')

    @include('partials.specialities')
    {{-- @include('partials.projets') --}}

    <!-- Section News - Petits carrés animés -->



    @if (session('message'))
        <div class="row mt-2 justify-content-center mb-2" id="newsletter-section-message">
            <div class="col-lg-8 col-md-10">
                <div class="alert alert-success text-center shadow-sm" role="alert">
                    <i class="fas fa-check-circle me-2"></i>
                    <strong>{{ session('message') }}</strong>
                </div>
            </div>
        </div>
    @endif



    <!-- Section Projets Modernisée -->
    <section id="news" class="news py-5 bg-light">
        <div class="container">
            <!-- En-tête Flagship Projects : titre + texte bien disposé -->
            <div class="row justify-content-center mb-5 fade-in-up">
                <div class="col-12 col-lg-10 col-xl-8 text-center flagship-section-header">
                    <h2 class="section-title mb-3">FLAGSHIP PROJECTS (HIGHLIGHTS)</h2>
                    <div class="title-divider mx-auto mb-3"></div>
                    <p class="section-lead flagship-intro mb-0">AIRID leads and contributes to major research initiatives in public health: vector control optimisation, evaluation of malaria and vector-borne disease tools, intervention durability and performance, and evidence for vaccines and delivery. These flagship projects reflect our role as a trusted evidence partner.</p>
                </div>
            </div>
            <!-- Liste des projets : carte image + bandeau bleu (titre, description, View Project) -->
            <div class="row g-4 flagship-project-cards">
                @forelse ($all_recents_projects->sortByDesc('date_debut_project') as $index => $projet)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 fade-in-up {{ $index >= 4 ? 'flagship-second-row' : '' }}" style="transition-delay: {{ $index * 0.1 }}s">
                        <a href="{{ route('detailProject', ['id' => $projet->id, 'slug' => Str::slug($projet->short_title_project)]) }}" class="text-decoration-none flagship-project-card">
                            <div class="flagship-card-image-wrap rounded-top overflow-hidden position-relative">
                                <img
                                    loading="lazy"
                                    src="{{ asset('storage/assets/projects/' . $projet->photo_couverture) }}"
                                    alt="{{ $projet->short_title_project }}"
                                    class="flagship-card-img w-100"
                                >
                                @php $status = $projet->etat_projet ?? null; @endphp
                                @if($status)
                                    @php
                                        $statusLabel = [
                                            'ongoing' => 'Ongoing',
                                            'ended' => 'Completed',
                                            'abandoned' => 'Abandoned',
                                        ][$status] ?? ucfirst($status);
                                    @endphp
                                    <span class="flagship-badge-status flagship-badge-status--{{ $status }}">
                                        {{ $statusLabel }}
                                    </span>
                                @endif
                            </div>
                            <div class="flagship-card-footer rounded-bottom">
                                <h5 class="flagship-card-title">{{ Str::limit($projet->short_title_project, 28) }}</h5>
                                <p class="flagship-card-desc">{{ Str::limit(strip_tags($projet->resume ?? ''), 80) ?: 'Research project' }}</p>
                                <div class="flagship-card-cta d-flex align-items-center justify-content-between">
                                    <span class="flagship-cta-text">View Project</span>
                                    <span class="flagship-cta-btn"><i class="fas fa-arrow-right"></i></span>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-12 text-center fade-in">
                        <div class="py-5">
                            <i class="fas fa-folder-open fa-3x text-muted mb-3"></i>
                            <p class="text-muted fw-bold fs-5">No recent projects at the moment.</p>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Bouton avec animation -->
            <div class="text-center mt-5 fade-in-up">
                <a class="btn btn-primary px-5 py-3 fw-bold" href="{{ route('allProjectsPage') }}">
                    <i class="fas fa-arrow-right me-2"></i>
                    View All Projects
                </a>
            </div>
        </div>
    </section>


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

    {{-- @include('partials.partenaires') --}}
@endsection

@section('js')
    <script>
        // ============================================
        // ANIMATIONS AU SCROLL (Intersection Observer)
        // ============================================
        document.addEventListener('DOMContentLoaded', function() {
            // Configuration de l'Intersection Observer
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        // Optionnel: arrêter d'observer après l'animation
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            // Observer tous les éléments avec les classes d'animation
            const animatedElements = document.querySelectorAll('.fade-in-up, .fade-in');
            animatedElements.forEach(el => {
                observer.observe(el);
            });
        });

        // ============================================
        // VALIDATION EN TEMPS RÉEL DU FORMULAIRE NEWSLETTER
        // ============================================
        document.addEventListener('DOMContentLoaded', function() {
            const newsletterForm = document.querySelector('#newsletter-section form');
            const emailInput = document.getElementById('newsletter-email');
            const submitButton = newsletterForm?.querySelector('button[type="submit"]');

            if (emailInput && submitButton) {
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

                // Animation du bouton au survol
                submitButton.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-3px)';
                });

                submitButton.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            }
        });
    </script>
@endsection
