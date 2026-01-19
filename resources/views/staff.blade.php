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
                            <p class="banner-subtitle animate-slide-up">Discover the talents that make our institute strong</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="main-container" class="main-container pb-4">
        <div class="container">
            
            <!-- Section Direction -->
            <div class="row text-center mb-5">
                <div class="col-lg-12">
                    <div class="section-header">
                        <h3 class="section-sub-title">Our Management</h3>
                        <div class="section-divider"></div>
                        <p class="section-description">The leadership that guides our vision and mission</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                @forelse ($executive_director as $leader)
                    <div class="col-lg-4 col-md-6 mb-5 d-flex">
                        <div class="card staff-card leader-card flex-fill text-center animate-scale">
                            <div class="card-img-wrapper">
                                @if($leader->photo_personnel)
                                    @php
                                        $photoName = basename($leader->photo_personnel);
                                        $photoPath = null;
                                        if (file_exists(public_path('assets/staff/' . $photoName))) {
                                            $photoPath = asset('assets/staff/' . $photoName);
                                        } elseif (file_exists(public_path('storage/assets/staff/' . $photoName))) {
                                            $photoPath = asset('storage/assets/staff/' . $photoName);
                                        } else {
                                            $photoPath = asset('assets/staff/' . $photoName);
                                        }
                                    @endphp
                                    <img src="{{ $photoPath }}" 
                                         class="card-img-top img-fluid staff-photo lazy-load" 
                                         alt="{{ $leader->prenom_personnel . ' ' . $leader->nom_personnel }}"
                                         data-placeholder="{{ asset('storage/assets_vendor/images/team/placeholder.jpg') }}"
                                         loading="lazy">
                                @else
                                    <img src="{{ asset('storage/assets_vendor/images/team/placeholder.jpg') }}" 
                                     class="card-img-top img-fluid staff-photo" 
                                         alt="{{ $leader->prenom_personnel . ' ' . $leader->nom_personnel }}">
                                @endif
                                <div class="photo-overlay"></div>
                            </div>
                            <div class="card-body">
                                <h5 class="staff-name">
                                    {{ $leader->titre . ' ' . $leader->prenom_personnel . ' ' . $leader->nom_personnel }}
                                </h5>
                                <p class="staff-position">{{ $leader->posteOccupe->intitule_poste }}</p>
                                
                                @if($leader->description_poste)
                                <p class="staff-description">{{ Str::limit($leader->description_poste, 120) }}</p>
                                @endif

                                <div class="staff-social-icons">
                                    <a href="#" class="social-link" title="Facebook">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="#" class="social-link" title="Twitter">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="#" class="social-link" title="LinkedIn">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <div class="no-data-message">
                            <i class="fas fa-users fa-3x mb-3"></i>
                            <p>No management members at the moment</p>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Section Personnel -->
            <div class="row text-center mb-5">
                <div class="col-lg-12">
                    <div class="section-header">
                        <h3 class="section-sub-title">Our Team</h3>
                        <div class="section-divider"></div>
                        <p class="section-description">The experts and professionals dedicated to excellence</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                @forelse ($other_staffs as $staff)
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-5 d-flex">
                        <div class="card staff-card team-card flex-fill text-center animate-scale">
                            <div class="card-img-wrapper">
                                @if($staff->photo_personnel)
                                    @php
                                        $photoName = basename($staff->photo_personnel);
                                        $photoPath = null;
                                        if (file_exists(public_path('assets/staff/' . $photoName))) {
                                            $photoPath = asset('assets/staff/' . $photoName);
                                        } elseif (file_exists(public_path('storage/assets/staff/' . $photoName))) {
                                            $photoPath = asset('storage/assets/staff/' . $photoName);
                                        } else {
                                            $photoPath = asset('assets/staff/' . $photoName);
                                        }
                                    @endphp
                                    <img src="{{ $photoPath }}" 
                                         class="card-img-top img-fluid staff-photo lazy-load" 
                                         alt="{{ $staff->prenom_personnel . ' ' . $staff->nom_personnel }}"
                                         data-placeholder="{{ asset('storage/assets_vendor/images/team/placeholder.jpg') }}"
                                         loading="lazy">
                                @else
                                    <img src="{{ asset('storage/assets_vendor/images/team/placeholder.jpg') }}" 
                                     class="card-img-top img-fluid staff-photo" 
                                         alt="{{ $staff->prenom_personnel . ' ' . $staff->nom_personnel }}">
                                @endif
                                <div class="photo-overlay"></div>
                            </div>
                            <div class="card-body">
                                <h5 class="staff-name">
                                    {{ $staff->titre . ' ' . $staff->prenom_personnel . ' ' . $staff->nom_personnel }}
                                </h5>
                                <p class="staff-position">{{ $staff->posteOccupe->intitule_poste }}</p>

                                <div class="staff-social-icons">
                                    <a href="#" class="social-link" title="Facebook">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="#" class="social-link" title="Twitter">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="#" class="social-link" title="LinkedIn">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <div class="no-data-message">
                            <i class="fas fa-user-friends fa-3x mb-3"></i>
                            <p>No staff members at the moment</p>
                        </div>
                    </div>
                @endforelse
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

        /* Styles des cartes */
        .staff-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.1);
            overflow: hidden;
            transition: all 0.3s ease;
            background: #fff;
        }

        .staff-card:hover {
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }

        .leader-card {
            border-top: 4px solid #e74c3c;
        }

        .team-card {
            border-top: 4px solid #3498db;
        }

        .card-img-wrapper {
            position: relative;
            overflow: hidden;
        }

        .staff-photo {
            height: 280px;
            object-fit: cover;
            transition: transform 0.3s ease;
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
            padding: 2rem 1.5rem;
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

        /* Message quand pas de données */
        .no-data-message {
            padding: 3rem;
            color: #7f8c8d;
        }

        .no-data-message i {
            color: #bdc3c7;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .section-sub-title {
                font-size: 2rem;
            }
            
            .staff-photo {
                height: 220px;
            }
            
            .staff-social-icons {
                gap: 10px;
            }
            
            .social-link {
                width: 30px;
                height: 30px;
                font-size: 0.9rem;
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