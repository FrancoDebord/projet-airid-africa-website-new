@extends('index')


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
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .project-overlay small {
            color: rgba(255,255,255,0.95);
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .project-overlay small i {
            font-size: 1rem;
        }

        /* ============================================
           SECTIONS TITRES
           ============================================ */
        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 0.5rem;
            position: relative;
        }

        .section-sub-title {
            font-size: 1.3rem;
            color: #7f8c8d;
            font-weight: 500;
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
                font-size: 2rem;
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
            font-size: 1.1rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 0.8rem;
            line-height: 1.3;
        }

        .news-card-text {
            font-size: 0.95rem;
            color: #666;
            line-height: 1.6;
            margin-bottom: 1rem;
            min-height: 48px;
        }

        .news-card-date {
            font-size: 0.85rem;
            color: #999;
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
                font-size: 1rem;
            }

            .news-card-text {
                font-size: 0.9rem;
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
            font-size: 1.1rem;
            font-weight: 700;
            color: #000;
            margin-bottom: 0.8rem;
            line-height: 1.3;
            text-shadow: 0 3px 6px rgba(255, 255, 255, 1), 0 2px 4px rgba(255, 255, 255, 0.8), 0 1px 2px rgba(0, 0, 0, 0.15);
        }

        .news-card-cube .news-card-text {
            font-size: 0.95rem;
            color: #222;
            line-height: 1.6;
            margin-bottom: 1rem;
            min-height: 48px;
            text-shadow: 0 3px 5px rgba(255, 255, 255, 1), 0 2px 3px rgba(255, 255, 255, 0.8), 0 1px 1px rgba(0, 0, 0, 0.1);
            font-weight: 600;
        }

        .news-card-cube .news-card-date {
            font-size: 0.85rem;
            color: #333;
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
                font-size: 1rem;
            }

            .news-card-cube .news-card-text {
                font-size: 0.9rem;
            }
        }
    </style>
@endsection

@section('content')
    @include('partials.carroussel')

    @include('partials.small_about')

    <!-- Section Vacancy, News, Publication -->
    <section class="py-5 bg-light">
        <div class="container">
            <!-- Titre avec animation -->
            <div class="row text-center mb-5 fade-in-up">
                <div class="col-12">
                    <h2 class="section-title">Latest Updates/News</h2>
                    <h3 class="section-sub-title">Stay informed about our opportunities, news</h3>
                    <div class="title-divider mx-auto mt-3 mb-4"></div>
                </div>
            </div>

            <!-- Trois cadres : Vacancy, News, Publication -->
            <div class="row g-4">
                <!-- Vacancy -->
                @if($recent_vacancy)
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 fade-in-up" style="transition-delay: 0s">
                        <div class="project-card latest-update-card position-relative overflow-hidden rounded">
                            <a href="{{ route('vacanciesPage') }}" class="text-decoration-none">
                                <div class="project-img w-100 bg-gradient" style="height: 300px; background: linear-gradient(135deg, #c20102 0%, #8b0101 100%); display: flex; align-items: center; justify-content: center;">
                                </div>
                                <div class="project-overlay">
                                    <span class="badge mb-2" style="background: linear-gradient(135deg, #c20102 0%, #8b0101 100%); color: #fff;">Job Opportunity</span>
                                    <h5 class="fw-bold mb-2">
                                        {{ Str::limit($recent_vacancy->job_title ?? $recent_vacancy->intitule_recrutement ?? 'Vacancy', 60) }}
                                    </h5>
                                    @if($recent_vacancy->resume_poste)
                                        <p class="text-white mb-2" style="font-size: 0.9rem;">
                                            {{ Str::limit(strip_tags($recent_vacancy->resume_poste), 80) }}
                                        </p>
                                    @endif
                                    <small class="fw-semibold">
                                        <i class="far fa-calendar-alt me-2"></i>
                                        Deadline: {{ $recent_vacancy->application_deadline ? date('F j, Y', strtotime($recent_vacancy->application_deadline)) : 'Open' }}
                                    </small>
                                    <div class="mt-3">
                                        <span class="badge bg-light text-dark">
                                            <i class="fas fa-arrow-right me-1"></i>
                                            View Details
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endif

                <!-- News -->
                @if($all_news->first())
                    @php $recent_news = $all_news->first(); @endphp
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 fade-in-up" style="transition-delay: 0.1s">
                        <div class="project-card position-relative overflow-hidden rounded">
                            <a href="{{ route('newsPage') }}" class="text-decoration-none">
                                @if($recent_news->photo_couverture)
                                    @php
                                        $photoName = basename($recent_news->photo_couverture);
                                        $photoPath = null;
                                        
                                        if (file_exists(public_path('assets/news/' . $photoName))) {
                                            $photoPath = asset('assets/news/' . $photoName);
                                        } elseif (file_exists(public_path('storage/assets/news/' . $photoName))) {
                                            $photoPath = asset('storage/assets/news/' . $photoName);
                                        } else {
                                            $photoPath = asset('assets/news/' . $photoName);
                                        }
                                    @endphp
                                    <img 
                                        loading="lazy"
                                        src="{{ $photoPath }}"
                                        alt="{{ $recent_news->titre_news ?? 'News' }}"
                                        class="project-img w-100"
                                    >
                                @else
                                    <div class="project-img w-100" style="height: 300px; background: linear-gradient(135deg, #c20102 0%, #8b0101 100%);"></div>
                                @endif
                                <div class="project-overlay">
                                    <span class="badge mb-2" style="background: linear-gradient(135deg, #c20102 0%, #8b0101 100%); color: #fff;">News</span>
                                    <h5 class="fw-bold mb-2">
                                        {{ Str::limit($recent_news->titre_news ?? 'News', 60) }}
                                    </h5>
                                    @if($recent_news->resume)
                                        <p class="text-white mb-2" style="font-size: 0.9rem;">
                                            {{ Str::limit(strip_tags($recent_news->resume), 80) }}
                                        </p>
                                    @endif
                                    <small class="fw-semibold">
                                        <i class="far fa-calendar-alt me-2"></i>
                                        {{ $recent_news->date_news ? date('F j, Y', strtotime($recent_news->date_news)) : ($recent_news->created_at ? date('F j, Y', strtotime($recent_news->created_at)) : 'Recent') }}
                                    </small>
                                    <div class="mt-3">
                                        <span class="badge bg-light text-dark">
                                            <i class="fas fa-arrow-right me-1"></i>
                                            Read More
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endif

                <!-- Publication -->
                @if($recent_publication)
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 fade-in-up" style="transition-delay: 0.2s">
                        <div class="project-card latest-update-card position-relative overflow-hidden rounded">
                            <a href="{{ route('detailPublication', ['id' => $recent_publication->id, 'slug' => Str::slug($recent_publication->titre_publication)]) }}" class="text-decoration-none">
                                @if($recent_publication->photo_couverture)
                                    <img 
                                        loading="lazy"
                                        src="{{ asset('storage/assets/publications/couverture/' . $recent_publication->photo_couverture) }}"
                                        alt="{{ $recent_publication->titre_publication }}"
                                        class="project-img w-100"
                                    >
                                @else
                                    <div class="project-img w-100" style="height: 300px; background: linear-gradient(135deg, #c20102 0%, #8b0101 100%);"></div>
                                @endif
                                <div class="project-overlay">
                                    <span class="badge mb-2" style="background: linear-gradient(135deg, #c20102 0%, #8b0101 100%); color: #fff;">Publication</span>
                                    <h5 class="fw-bold mb-2">
                                        {{ Str::limit($recent_publication->titre_publication, 60) }}
                                    </h5>
                                    @if($recent_publication->resume_publication)
                                        <p class="text-white mb-2" style="font-size: 0.9rem;">
                                            {{ Str::limit(strip_tags($recent_publication->resume_publication), 80) }}
                                        </p>
                                    @endif
                                    <small class="fw-semibold">
                                        <i class="far fa-calendar-alt me-2"></i>
                                        {{ $recent_publication->annee_publication ?? 'Recent' }}
                                    </small>
                                    <div class="mt-3">
                                        <span class="badge bg-light text-dark">
                                            <i class="fas fa-arrow-right me-1"></i>
                                            Read More
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Bouton Voir plus -->
            <div class="text-center mt-5 fade-in-up">
                <a class="btn btn-primary px-5 py-3 fw-bold" href="{{ route('newsPage') }}">
                    <i class="fas fa-arrow-right me-2"></i>
                    View All Updates
                </a>
            </div>
        </div>
    </section>

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

    <!-- Section Newsletter Modernisée -->
    <section class="subscribe no-padding py-5" id="newsletter-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 mb-4 mb-lg-0 fade-in-up">
                    <div class="subscribe-call-to-acton text-center text-lg-start">
                        <h3>
                            <i class="fas fa-handshake me-2"></i>
                            You want to collaborate on a project?
                        </h3>
                        <h6>
                            <a href="tel:+2290167164499" class="text-white text-decoration-none">
                                <i class="fas fa-phone me-2"></i>
                                (+229) 01 67 16 44 99
                            </a>
                        </h6>
                    </div>
                </div><!-- Col end -->

                <div class="col-lg-8 fade-in-up">
                    <div class="ts-newsletter">
                        <div class="row align-items-center">
                            <div class="col-md-5 mb-3 mb-md-0 newsletter-introtext text-center text-md-start">
                                <h4 class="text-white mb-2 fw-bold">
                                    <i class="fas fa-envelope-open-text me-2"></i>
                                    Newsletter Sign-up
                                </h4>
                                <p class="text-white mb-0 opacity-90">Stay updated with our latest news and research</p>
                            </div>

                            <div class="col-md-7 newsletter-form">
                                <form action="{{ route('subscribeNewsLetter') }}" method="POST" class="d-flex flex-column flex-md-row gap-2">
                                    @csrf
                                    <input type="hidden" name="fill_robot">

                                    <div class="form-group flex-grow-1 mb-2 mb-md-0">
                                        <input 
                                            type="email" 
                                            name="email_newsletter" 
                                            id="newsletter-email" 
                                            class="form-control form-control-lg"
                                            placeholder="Enter your email address"
                                            required
                                            aria-label="Email address"
                                      style="background-color: #fff;"   >
                                    </div>

                                    <button type="submit" class="btn btn-primary px-4 py-2 fw-bold">
                                        <i class="fas fa-paper-plane me-2"></i>
                                        Subscribe
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div><!-- Newsletter end -->
                </div><!-- Col end -->
            </div><!-- Content row end -->
        </div>
        <!--/ Container end -->
    </section>
    <!--/ subscribe end -->

    <!-- Section Projets Modernisée -->
    <section id="news" class="news py-5 bg-light">
        <div class="container">
            <!-- Titre avec animation -->
            <div class="row text-center mb-5 fade-in-up">
                <div class="col-12">
                    <h2 class="section-title">Work of Excellence</h2>
                    <h3 class="section-sub-title">Recent Projects</h3>
                    <div class="title-divider mx-auto mt-3 mb-4"></div>
                </div>
            </div>

            <!-- Liste des projets avec animations -->
            <div class="row g-4">
                @forelse ($all_recents_projects->sortByDesc('date_debut_project') as $index => $projet)
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 fade-in-up" style="transition-delay: {{ $index * 0.1 }}s">
                        <div class="project-card position-relative overflow-hidden rounded">
                            <a href="{{ route('detailProject', ['id' => $projet->id, 'slug' => Str::slug($projet->short_title_project)]) }}" class="text-decoration-none">
                                <img 
                                    loading="lazy"
                                    src="{{ asset('storage/assets/projects/' . $projet->photo_couverture) }}"
                                    alt="{{ $projet->short_title_project }}"
                                    class="project-img w-100"
                                >
                                <div class="project-overlay">
                                    <h5 class="fw-bold mb-2">
                                        {{ Str::limit($projet->short_title_project, 60) }}
                                    </h5>
                                    <small class="fw-semibold">
                                        <i class="far fa-calendar-alt me-2"></i>
                                        {{ $projet->date_debut_project ? date('F j, Y', strtotime($projet->date_debut_project)) : 'Not Yet Started' }}
                                    </small>
                                    <div class="mt-3">
                                        <span class="badge bg-light text-dark">
                                            <i class="fas fa-arrow-right me-1"></i>
                                            View Details
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
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


    @include('partials.partenaires')
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
