@extends('index')

@section('title', 'Staff -- AIRID')

@section('content')
    <!-- Bannière avec overlay amélioré -->
    <div id="banner-area" class="banner-area staff-banner"
        style="background-image:url({{ asset('storage/assets_vendor/images/banner/banner2_new.png') }})">
        <div class="banner-overlay"></div>
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title top_title animate-fade-in">Our AIRID Team</h1>
                            <p class="banner-subtitle animate-slide-up" style="font-size: 1.4rem;">Discover the talents that make our institute strong</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="main-container" class="main-container pb-4">
        <div class="container">
            <!-- Filtres par catégorie (Our Team) -->
            @if (isset($staffCategories) && count($staffCategories) > 0)
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="staff-filter-bar">
                            <span class="staff-filter-label">Filter by category:</span>
                            <div class="staff-filter-buttons">
                                <a href="{{ route('staffAirid') }}"
                                    class="staff-filter-btn {{ ($categoryFilter ?? 'all') === 'all' ? 'active' : '' }}">
                                    <i class="fas fa-users me-1"></i> All
                                </a>
                                @foreach ($staffCategories as $slug => $label)
                                    <a href="{{ route('staffAirid', ['category' => $slug]) }}"
                                        class="staff-filter-btn {{ ($categoryFilter ?? '') === $slug ? 'active' : '' }}">
                                        @if($slug === 'management_operations')
                                            <i class="fas fa-briefcase me-1"></i>
                                        @elseif($slug === 'facility_platform_supervisors')
                                            <i class="fas fa-building me-1"></i>
                                        @else
                                            <i class="fas fa-flask me-1"></i>
                                        @endif
                                        {{ $label }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            {{-- Ordre : niveau_poste=1 en tête (directeur), puis les autres — tous triés par poids_personnel DESC (géré par le controller) --}}
            @php
                $allStaff = $executive_director->merge($other_staffs);
            @endphp

            <div class="row text-center mb-5">
                <div class="col-lg-12">
                    <div class="section-header">
                        <h3 class="section-sub-title">Our Team</h3>
                        <div class="section-divider"></div>
                        <p class="section-description">The leadership and experts dedicated to our vision and excellence</p>
                    </div>
                </div>
            </div>

            <div class="row staff-grid g-4 staff-grid-rows">
                @forelse ($allStaff as $staff)
                    <div class="col-lg-3 col-md-4 col-sm-6 d-flex">
                        <div class="card staff-card team-card flex-fill text-center animate-scale">
                            <a href="{{ route('detail-staff', ['id' => $staff->id, 'slug' => Str::slug($staff->prenom_personnel . '-' . $staff->nom_personnel)]) }}" class="staff-card-link">
                                <div class="card-img-wrapper">
                                    @if($staff->photo_personnel)
                                        @php
                                            $photoName = basename($staff->photo_personnel);
                                            $staffPhotoPath = 'assets/staff/' . $photoName;
                                            $placeholderUrl = asset('storage/assets_vendor/images/team/placeholder.jpg');
                                        @endphp
                                        <img loading="lazy" src="{{ asset($staffPhotoPath) }}" alt="{{ $staff->prenom_personnel . ' ' . $staff->nom_personnel }}" class="card-img-top img-fluid staff-photo lazy-load" data-placeholder="{{ $placeholderUrl }}" onerror="this.onerror=null; this.src='{{ $placeholderUrl }}';">
                                    @else
                                        <img loading="lazy" src="{{ asset('storage/assets_vendor/images/team/placeholder.jpg') }}" class="card-img-top img-fluid staff-photo" alt="{{ $staff->prenom_personnel . ' ' . $staff->nom_personnel }}">
                                    @endif
                                    <div class="photo-overlay"></div>
                                </div>
                                <div class="card-body">
                                    <h5 class="staff-name">
                                        {{ $staff->titre . ' ' . $staff->prenom_personnel . ' ' . $staff->nom_personnel }}
                                    </h5>
                                    <p class="staff-position">{{ $staff->posteOccupe->intitule_poste ?? '' }}</p>
                                </div>
                            </a>
                            <div class="card-body staff-card-actions">
                                <div class="staff-social-icons">
                                    @if(!empty($staff->link_facebook))
                                        <a href="{{ $staff->link_facebook }}" target="_blank" rel="noopener noreferrer" class="social-link" title="Facebook">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    @endif
                                    @if(!empty($staff->link_twitter))
                                        <a href="{{ $staff->link_twitter }}" target="_blank" rel="noopener noreferrer" class="social-link" title="Twitter">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    @endif
                                    @if(!empty($staff->link_linkedin))
                                        <a href="{{ $staff->link_linkedin }}" target="_blank" rel="noopener noreferrer" class="social-link" title="LinkedIn">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                    @endif
                                    <a href="{{ route('detail-staff', ['id' => $staff->id, 'slug' => Str::slug($staff->prenom_personnel . '-' . $staff->nom_personnel)]) }}" class="social-link social-link-profile" title="Voir le profil">
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <div class="no-data-message py-5">
                            <i class="fas fa-users fa-3x mb-3"></i>
                            <p>No staff members at the moment</p>
                        </div>
                    </div>
                @endforelse
            </div>

        </div>
    </section>



    <!-- Cadres Management & Operations / Research Team -->
    <section class="staff-quick-links-section py-5">
        <div class="container">
            <div class="row text-center mb-4">
                <div class="col-12">
                    <h3 class="section-sub-title">Discover our teams</h3>
                    <div class="section-divider"></div>
                    <p class="section-description">Management & Operations and Research Team</p>
                </div>
            </div>
            <div class="row justify-content-center g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="staff-quick-link-card">
                        <a href="{{ route('pageAbout', 'management-operations') }}" class="staff-quick-link-main">
                            <span class="staff-quick-link-icon"><i class="fas fa-users-cog"></i></span>
                            <span class="staff-quick-link-label">Management & Operations</span>
                        </a>
                        <a href="{{ route('pageAbout', 'management-operations') }}" class="social-link social-link-profile staff-quick-link-direction" title="Voir le profil">
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="staff-quick-link-card">
                        <a href="{{ route('pageAbout', 'research-team') }}" class="staff-quick-link-main">
                            <span class="staff-quick-link-icon"><i class="fas fa-flask"></i></span>
                            <span class="staff-quick-link-label">Research Team</span>
                        </a>
                        <a href="{{ route('pageAbout', 'research-team') }}" class="social-link social-link-profile staff-quick-link-direction" title="Voir le profil">
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                {{-- <div class="col-md-6 col-lg-4">
                    <div class="staff-quick-link-card">
                        <a href="{{ route('pageAbout', 'management-operations') }}" class="staff-quick-link-main">
                            <span class="staff-quick-link-icon"><i class="fas fa-id-card"></i></span>
                            <span class="staff-quick-link-label">Staff profiles</span>
                        </a>
                        <a href="{{ route('pageAbout', 'management-operations') }}" class="social-link social-link-profile staff-quick-link-direction" title="Voir le profil">
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>

    <style>
        /* Styles pour la bannière */
        .staff-banner {
            position: relative;
            background-size: cover;
            background-position: center;
            min-height: 250px;
            padding: 60px 0;
        }

        .banner-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(0,0,0,0.6) 0%, rgba(0,0,0,0.3) 100%);
        }

        .banner-text {
            position: relative;
            z-index: 2;
        }

        .banner-subtitle {
            color: #fff;
            font-size: 1.2rem;
            margin-top: 1rem;
            opacity: 0.9;
        }

        /* Animations */
        .animate-fade-in {
            animation: fadeIn 1s ease-in;
        }

        .animate-slide-up {
            animation: slideUp 0.8s ease-out;
        }

        .animate-scale {
            transition: transform 0.3s ease;
        }

        .animate-scale:hover {
            transform: translateY(-5px);
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Styles des sections */
        .section-header {
            margin-bottom: 3rem;
        }

        .section-sub-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 1rem;
        }

        .section-divider {
            width: 80px;
            height: 3px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            margin: 0 auto 1.5rem;
        }

        .section-description {
            color: #7f8c8d;
            font-size: 1.1rem;
            max-width: 600px;
            margin: 0 auto;
        }

        /* Barre de filtres par catégorie */
        .staff-filter-bar {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            gap: 1rem;
            padding: 1.25rem 1.5rem;
            background: linear-gradient(135deg, #f8f9fa 0%, #fff 100%);
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.06);
            border: 1px solid rgba(0,0,0,0.06);
        }

        .staff-filter-label {
            font-weight: 600;
            color: #2c3e50;
            font-size: 0.95rem;
            margin-right: 0.25rem;
        }

        .staff-filter-buttons {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .staff-filter-btn {
            display: inline-flex;
            align-items: center;
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
            font-weight: 600;
            color: #495057;
            background: #fff;
            border: 2px solid #dee2e6;
            border-radius: 8px;
            text-decoration: none;
            transition: all 0.25s ease;
            white-space: nowrap;
        }

        .staff-filter-btn:hover {
            color: #e74c3c;
            border-color: #e74c3c;
            background: rgba(231, 76, 60, 0.06);
            transform: translateY(-1px);
        }

        .staff-filter-btn.active {
            color: #fff;
            background: #e74c3c;
            border-color: #e74c3c;
        }

        .staff-filter-btn.active:hover {
            background: #c0392b;
            border-color: #c0392b;
            color: #fff;
        }

        /* Styles des cartes */
        .staff-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.1);
            overflow: hidden;
            transition: all 0.3s ease;
            background: #fff;
            cursor: pointer;
        }

        .staff-card:hover {
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }

        .staff-card-link {
            display: block;
            text-decoration: none;
            color: inherit;
            transition: opacity 0.2s ease;
        }

        .staff-card-link:hover {
            opacity: 0.95;
        }

        .staff-card-actions {
            padding-top: 0;
        }

        .staff-grid > [class*="col-"] {
            display: flex;
        }
        .staff-grid.staff-grid-rows > [class*="col-"] {
            margin-bottom: 2rem;
        }
        .staff-grid.staff-grid-rows > [class*="col-"]:last-child {
            margin-bottom: 0;
        }

        .team-card {
            border-top: 4px solid #3498db;
        }

        .card-img-wrapper {
            position: relative;
            overflow: hidden;
            background: #f0f0f0;
        }

        .staff-photo {
            width: 100%;
            height: 280px;
            object-fit: cover;
            object-position: top center;
            transition: transform 0.3s ease;
            display: block;
        }

        .staff-card:hover .staff-photo {
            transform: scale(1.05);
        }

        .photo-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, transparent 70%, rgba(0,0,0,0.3) 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .staff-card:hover .photo-overlay {
            opacity: 1;
        }

         .card-body {
            background-color: #c7c3c3;
        }

        .staff-name {
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 0.5rem;
            font-size: 1.2rem;
        }

        .staff-position {
            color: #e74c3c;
            font-weight: 600;
            margin-bottom: 1rem;
            font-size: 0.95rem;
        }

        .staff-description {
            color: #7f8c8d;
            font-size: 0.9rem;
            line-height: 1.5;
            margin-bottom: 1.5rem;
        }

        /* Styles des icônes sociales */
        .staff-social-icons {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .social-link {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background: #f8f9fa;
            color: #7f8c8d;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .social-link:hover {
            background: #3498db;
            color: #fff;
            transform: translateY(-2px);
        }

        .social-link-profile {
            background: #e74c3c;
            color: #fff;
        }

        .social-link-profile:hover {
            background: #9e9e9e;
            color: #fff;
            transform: translateY(-2px);
        }

        /* Message quand pas de données */
        .no-data-message {
            padding: 3rem;
            color: #7f8c8d;
        }

        .no-data-message i {
            color: #bdc3c7;
        }

        /* Cadres Management & Operations / Research Team / Staff profiles */
        .staff-quick-links-section {
            background: #f8f9fa;
        }

        .staff-quick-link-card {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1.5rem 1.75rem;
            background: #fff;
            border-radius: 12px;
            border: 2px solid #e9ecef;
            box-shadow: 0 4px 20px rgba(0,0,0,0.06);
            color: #2c3e50;
            transition: all 0.3s ease;
            min-height: 100px;
        }

        .staff-quick-link-card:hover {
            border-color: #e74c3c;
            box-shadow: 0 8px 30px rgba(231, 76, 60, 0.15);
            transform: translateY(-3px);
        }

        .staff-quick-link-main {
            display: flex;
            align-items: center;
            gap: 1rem;
            flex: 1;
            text-decoration: none;
            color: inherit;
            transition: color 0.3s ease;
        }

        .staff-quick-link-card:hover .staff-quick-link-main {
            color: #e74c3c;
        }

        .staff-quick-link-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 56px;
            height: 56px;
            min-width: 56px;
            border-radius: 12px;
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
            color: #fff;
            font-size: 1.5rem;
        }

        .staff-quick-link-card:hover .staff-quick-link-icon {
            background: linear-gradient(135deg, #c0392b 0%, #a93226 100%);
        }

        .staff-quick-link-label {
            font-weight: 700;
            font-size: 1.1rem;
            text-align: left;
        }

        .staff-quick-link-direction {
            flex-shrink: 0;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .section-sub-title {
                font-size: 2rem;
            }

            .staff-filter-bar {
                flex-direction: column;
                padding: 1rem;
                gap: 0.75rem;
            }

            .staff-filter-label {
                margin-right: 0;
            }

            .staff-filter-buttons {
                width: 100%;
                justify-content: center;
            }

            .staff-filter-btn {
                padding: 0.45rem 0.75rem;
                font-size: 0.85rem;
            }

            .staff-photo {
                height: 220px;
                object-position: top center;
            }

            .staff-social-icons {
                gap: 10px;
            }

            .social-link {
                width: 30px;
                height: 30px;
                font-size: 0.9rem;
            }

            .staff-quick-link-card {
                padding: 1.25rem 1.5rem;
                min-height: 88px;
            }

            .staff-quick-link-icon {
                width: 48px;
                height: 48px;
                min-width: 48px;
                font-size: 1.25rem;
            }

            .staff-quick-link-label {
                font-size: 1rem;
            }
        }
    </style>
@endsection

@section('js')
<script>
    // Empêcher tout rafraîchissement automatique de la page et gérer les images
    (function() {
        'use strict';

        // Supprimer les meta refresh s'ils existent
        var metaRefresh = document.querySelector('meta[http-equiv="refresh"]');
        if (metaRefresh) {
            metaRefresh.remove();
        }

        // Gérer les erreurs de chargement d'images AVANT qu'elles ne causent des problèmes
        document.addEventListener('DOMContentLoaded', function() {
            var images = document.querySelectorAll('img.lazy-load');
            var placeholder = '{{ asset("storage/assets_vendor/images/team/placeholder.jpg") }}';

            images.forEach(function(img) {
                // Prévenir les erreurs d'images - utiliser data-placeholder si disponible
                img.addEventListener('error', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    var placeholderUrl = this.dataset.placeholder || placeholder;
                    if (this.src !== placeholderUrl) {
                        this.src = placeholderUrl;
                    }
                    // Empêcher les tentatives répétées infinies
                    this.onerror = function() {
                        return false;
                    };
                }, true);
            });
        });

        // Empêcher les setInterval/setTimeout qui tentent de recharger la page
        var originalSetInterval = window.setInterval;
        var originalSetTimeout = window.setTimeout;

        window.setInterval = function(func, delay) {
            if (typeof func === 'function') {
                var funcStr = func.toString();
                // Bloquer les fonctions qui contiennent location.reload ou window.location.reload
                if (funcStr.includes('location.reload') ||
                    funcStr.includes('window.location.reload') ||
                    (funcStr.includes('location.href') && funcStr.includes('='))) {
                    console.warn('setInterval avec reload détecté et bloqué');
                    return null;
                }
            }
            return originalSetInterval.apply(this, arguments);
        };

        window.setTimeout = function(func, delay) {
            if (typeof func === 'function') {
                var funcStr = func.toString();
                // Bloquer les fonctions qui contiennent location.reload ou window.location.reload
                if (funcStr.includes('location.reload') ||
                    funcStr.includes('window.location.reload') ||
                    (funcStr.includes('location.href') && funcStr.includes('='))) {
                    console.warn('setTimeout avec reload détecté et bloqué');
                    return null;
                }
            }
            return originalSetTimeout.apply(this, arguments);
        };

        // Empêcher les erreurs globales de provoquer un reload
        window.addEventListener('error', function(e) {
            // Ne bloquer que les erreurs d'images, pas toutes les erreurs
            if (e.target && e.target.tagName === 'IMG') {
                e.preventDefault();
                e.stopPropagation();
                return false;
            }
        }, true);

        // Empêcher les beforeunload non désirés
        var isNavigating = false;
        document.addEventListener('click', function(e) {
            if (e.target.tagName === 'A' || e.target.closest('a')) {
                isNavigating = true;
            }
        });

        window.addEventListener('beforeunload', function(e) {
            if (!isNavigating) {
                // Ne pas empêcher les navigations normales
                return;
            }
        });

        console.log('Protection contre le rafraîchissement automatique activée sur la page Staff');
    })();
</script>
@endsection
