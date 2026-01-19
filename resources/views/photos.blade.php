@extends('index')

@section('title', 'AIRID --Photos')

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
           FILTRES
           ============================================ */
        .photo-filters {
            background: #f8f9fa;
            padding: 2rem 0;
            border-bottom: 1px solid #e0e0e0;
            margin-bottom: 2rem;
        }

        .filter-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem;
            justify-content: center;
        }

        .filter-btn {
            padding: 0.75rem 1.5rem;
            border: 2px solid #e0e0e0;
            background: #fff;
            border-radius: 50px;
            color: #7f8c8d;
            font-weight: 600;
            transition: all 0.3s ease;
            cursor: pointer;
            font-size: 0.95rem;
        }

        .filter-btn:hover,
        .filter-btn.active {
            background: #c20102;
            border-color: #c20102;
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(194, 1, 2, 0.3);
        }

        /* ============================================
           GALERIE DE PHOTOS MODERNE
           ============================================ */
        .photo-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }

        .photo-item {
            position: relative;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 25px rgba(0,0,0,0.08);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            background: #fff;
            display: none;
        }

        .photo-item.active {
            display: block;
        }

        .photo-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }

        .photo-image-wrapper {
            position: relative;
            width: 100%;
            height: 250px;
            overflow: hidden;
        }

        .photo-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .photo-item:hover .photo-image {
            transform: scale(1.15);
        }

        .photo-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, transparent 60%);
            display: flex;
            align-items: flex-end;
            justify-content: center;
            padding: 1.5rem;
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .photo-item:hover .photo-overlay {
            opacity: 1;
        }

        .photo-icon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: rgba(194, 1, 2, 0.9);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 1.5rem;
            opacity: 0;
            transition: all 0.3s ease;
        }

        .photo-item:hover .photo-icon {
            opacity: 1;
            transform: translate(-50%, -50%) scale(1.1);
        }

        .photo-info {
            padding: 1.5rem;
            background: #fff;
        }

        .photo-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 0.5rem;
            line-height: 1.4;
        }

        .photo-title a {
            color: #2c3e50;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .photo-title a:hover {
            color: #c20102;
        }

        .photo-category {
            display: inline-block;
            padding: 0.4rem 1rem;
            border-radius: 50px;
            background: rgba(194, 1, 2, 0.1);
            color: #c20102;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .photo-date {
            color: #7f8c8d;
            font-size: 0.9rem;
            margin-top: 0.5rem;
        }

        /* ============================================
           MESSAGE AUCUN RÉSULTAT
           ============================================ */
        .no-results {
            text-align: center;
            padding: 4rem 2rem;
            color: #7f8c8d;
            grid-column: 1 / -1;
        }

        .no-results i {
            font-size: 4rem;
            margin-bottom: 1rem;
            color: #bdc3c7;
        }

        /* ============================================
           RESPONSIVE
           ============================================ */
        @media (max-width: 768px) {
            .photo-gallery {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                gap: 1rem;
            }

            .photo-image-wrapper {
                height: 200px;
            }

            .filter-buttons {
                gap: 0.5rem;
            }

            .filter-btn {
                padding: 0.5rem 1rem;
                font-size: 0.85rem;
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
                            <h1 class="banner-title top_title fade-in-up">Photo Gallery</h1>
                            <p class="text-white mt-3 fade-in-up" style="font-size: 1.2rem;">
                                Discover our research activities and events
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section Filtres -->
    <section class="photo-filters">
        <div class="container">
            <div class="filter-buttons">
                <button class="filter-btn active" data-filter="all">
                    <i class="fas fa-th me-2"></i>All Photos
                </button>
                @forelse ($all_photos_categories as $photo_categorie)
                    <button class="filter-btn" data-filter="{{ \Str::slug($photo_categorie->categorie_photo) }}">
                        <i class="fas fa-folder me-2"></i>{{ $photo_categorie->categorie_photo }}
                    </button>
                @empty
                @endforelse
            </div>
        </div>
    </section>

    <!-- Section Galerie -->
    <section class="py-5">
        <div class="container">
            <div class="row text-center mb-5 fade-in-up">
                <div class="col-12">
                    <h2 class="section-title" style="font-size: 2.5rem; font-weight: 700; color: #2c3e50;">Our Gallery</h2>
                    <p class="text-muted mb-4" style="font-size: 1.1rem;">
                        Moments from our research activities, events, and team building
                    </p>
                    <div class="title-divider mx-auto mt-3 mb-4" style="width: 100px; height: 4px; background: linear-gradient(135deg, #c20102 0%, #8b0101 100%); border-radius: 2px;"></div>
                </div>
            </div>

            <div class="photo-gallery" id="photo-gallery">
                @forelse ($all_photos as $index => $photo)
                    <div class="photo-item fade-in-up active" 
                         data-category="{{ \Str::slug($photo->categorie_photo) }}"
                         style="transition-delay: {{ ($index % 6) * 0.1 }}s">
                        <div class="photo-image-wrapper">
                            <a class="gallery-popup"
                               href="{{ asset('storage/assets/gallery/' . $photo->nom_photo) }}"
                               aria-label="{{ $photo->titre_photo }}">
                                <img class="photo-image"
                                     src="{{ asset('storage/assets/gallery/' . $photo->nom_photo) }}"
                                     alt="{{ $photo->titre_photo }}"
                                     loading="lazy">
                                <div class="photo-overlay">
                                    <div class="photo-icon">
                                        <i class="fas fa-plus"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="photo-info">
                            <h3 class="photo-title">
                                <a href="{{ route('photoDetailPage', ['tag' => $photo->tag]) }}">
                                    {{ $photo->titre_photo }}
                                </a>
                            </h3>
                            <span class="photo-category">
                                <i class="fas fa-tag me-1"></i>{{ $photo->categorie_photo }}
                            </span>
                            @if($photo->date_event)
                                <div class="photo-date">
                                    <i class="far fa-calendar me-1"></i>
                                    {{ date('F j, Y', strtotime($photo->date_event)) }}
                                </div>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="no-results">
                        <i class="fas fa-images"></i>
                        <h3 class="mt-3 mb-2" style="color: #2c3e50;">No photos available</h3>
                        <p>Photos will be displayed here once they are added to the gallery.</p>
                    </div>
                @endforelse
            </div>

            <!-- Message Aucun Résultat (caché par défaut) -->
            <div class="d-none" id="no-results-message">
                <div class="no-results">
                    <i class="fas fa-filter"></i>
                    <h3 class="mt-3 mb-2" style="color: #2c3e50;">No photos match your filter</h3>
                    <p>Try selecting a different category.</p>
                </div>
            </div>
        </div>
    </section>

    @include('partials.partenaires')
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

        // ============================================
        // SYSTÈME DE FILTRES
        // ============================================
        document.addEventListener('DOMContentLoaded', function() {
            const filterButtons = document.querySelectorAll('.filter-btn');
            const photoItems = document.querySelectorAll('.photo-item');
            const photoGallery = document.getElementById('photo-gallery');
            const noResultsMessage = document.getElementById('no-results-message');

            let currentFilter = 'all';

            // Gestion des filtres
            filterButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    filterButtons.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');
                    
                    currentFilter = this.getAttribute('data-filter');
                    filterPhotos();
                });
            });

            // Fonction de filtrage
            function filterPhotos() {
                let visibleCount = 0;
                let hasVisible = false;

                photoItems.forEach(item => {
                    const category = item.getAttribute('data-category') || '';
                    const matchesFilter = currentFilter === 'all' || category === currentFilter;
                    
                    if (matchesFilter) {
                        item.classList.add('active');
                        item.style.display = 'block';
                        visibleCount++;
                        hasVisible = true;
                    } else {
                        item.classList.remove('active');
                        item.style.display = 'none';
                    }
                });

                // Afficher/masquer le message "aucun résultat"
                if (hasVisible) {
                    if (photoGallery) photoGallery.style.display = 'grid';
                    if (noResultsMessage) noResultsMessage.classList.add('d-none');
                } else {
                    if (photoGallery) photoGallery.style.display = 'none';
                    if (noResultsMessage) noResultsMessage.classList.remove('d-none');
                }
            }

            // Initialiser le filtrage
            filterPhotos();
        });
    </script>
@endsection
