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

        .photo-item-link:hover .photo-item {
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

        .photo-item-link:hover .photo-image {
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

        .photo-item-link:hover .photo-overlay {
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

        .photo-item-link:hover .photo-icon {
            opacity: 1;
            transform: translate(-50%, -50%) scale(1.1);
        }
        .photo-icon i {
            font-size: 1.25rem;
        }

        .photo-item-link {
            display: block;
            text-decoration: none;
            color: inherit;
            height: 100%;
        }
        .photo-item-link:hover {
            text-decoration: none;
            color: inherit;
        }

        .photo-info {
            padding: 1.5rem;
            background:#c7c3c3;
            position: relative;
            padding-right: 3rem;
        }

        .photo-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 0.5rem;
            line-height: 1.4;
        }

        .photo-item-link:hover .photo-title {
            color: #c20102;
        }

        .photo-card-arrow {
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
        .photo-item-link:hover .photo-card-arrow {
            background: #c20102;
            color: #fff;
            transform: translateY(-50%) translateX(4px);
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

        /* ============================================
           CADRES CLIQUABLES (explorer par catégorie)
           ============================================ */
        .gallery-cards-intro {
            background: linear-gradient(135deg, rgba(194, 1, 2, 0.06) 0%, rgba(139, 1, 1, 0.06) 100%);
            padding: 1.75rem 1.5rem;
            border-radius: 16px;
            margin: 2rem 0 1.5rem;
            border-left: 5px solid #c20102;
        }
        .gallery-cards-intro .section-lead { font-size: 1.05rem; line-height: 1.7; color: #333; margin: 0; }
        .gallery-cards-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 1.25rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .gallery-cards-title i { color: #c20102; }
        .gallery-card-link {
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
        .gallery-card-link:hover {
            box-shadow: 0 12px 32px rgba(194, 1, 2, 0.18);
            border-color: #c20102;
            transform: translateY(-6px);
            text-decoration: none;
            color: inherit;
        }
        .gallery-card-img-wrap {
            width: 100%;
            height: 200px;
            overflow: hidden;
            background: #f0f0f0;
        }
        .gallery-card-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }
        .gallery-card-link:hover .gallery-card-img-wrap img { transform: scale(1.06); }
        .gallery-card-body {
            padding: 1.25rem 1.25rem;
            position: relative;
            background-color: #c7c3c3;
            padding-right: 3rem;
        }
        .gallery-card-title {
            font-size: 1.15rem;
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 0.35rem;
        }
        .gallery-card-link:hover .gallery-card-title { color: #c20102; }
        .gallery-card-desc {
            font-size: 0.9rem;
            line-height: 1.5;
            color: #555;
            margin-bottom: 0;
        }
        .gallery-card-arrow {
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
        .gallery-card-link:hover .gallery-card-arrow {
            background: #c20102;
            color: #fff;
            transform: translateY(-50%) translateX(4px);
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
                            <p class="text-white mt-3 fade-in-up" style="font-size: 1.4rem;">
                                Discover our research activities and events
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section Cadres cliquables : explorer par catégorie -->
    <section class="py-4" id="gallery-cards">
        <div class="container">
            <div class="gallery-cards-intro fade-in-up">
                <p class="section-lead">Browse the gallery by theme. Click a card to view photos in that category.</p>
            </div>
            <h2 class="gallery-cards-title fade-in-up"><i class="fas fa-th-large"></i> Explore by category</h2>
            <div class="row g-4 fade-in-up">
                {{-- Carte "Toutes les photos" --}}
                <div class="col-md-6 col-lg-4">
                    <a href="#photo-gallery" class="gallery-card-link gallery-card-filter" data-filter="all">
                        <div class="gallery-card-img-wrap">
                            @php $firstPhoto = $all_photos->first(); @endphp
                            @if($firstPhoto)
                                <img src="{{ asset('storage/assets/gallery/' . $firstPhoto->nom_photo) }}" alt="All Photos" loading="lazy">
                            @else
                                <img src="{{ asset('storage/assets_vendor/images/banner/banner2_new.png') }}" alt="All Photos">
                            @endif
                        </div>
                        <div class="gallery-card-body">
                            <h3 class="gallery-card-title">All photos</h3>
                            <p class="gallery-card-desc">{{ $all_photos->count() }} photo(s) in the gallery</p>
                            <span class="gallery-card-arrow"><i class="fas fa-arrow-right"></i></span>
                        </div>
                    </a>
                </div>
                @foreach($all_photos_categories as $photo_categorie)
                    @php
                        $catSlug = \Str::slug($photo_categorie->categorie_photo);
                        $firstInCat = $all_photos->where('categorie_photo', $photo_categorie->categorie_photo)->first();
                        $countInCat = $all_photos->where('categorie_photo', $photo_categorie->categorie_photo)->count();
                    @endphp
                    <div class="col-md-6 col-lg-4">
                        <a href="#photo-gallery" class="gallery-card-link gallery-card-filter" data-filter="{{ $catSlug }}">
                            <div class="gallery-card-img-wrap">
                                @if($firstInCat)
                                    <img src="{{ asset('storage/assets/gallery/' . $firstInCat->nom_photo) }}" alt="{{ $photo_categorie->categorie_photo }}" loading="lazy">
                                @else
                                    <img src="{{ asset('storage/assets_vendor/images/banner/banner2_new.png') }}" alt="{{ $photo_categorie->categorie_photo }}">
                                @endif
                            </div>
                            <div class="gallery-card-body">
                                <h3 class="gallery-card-title">{{ $photo_categorie->categorie_photo }}</h3>
                                <p class="gallery-card-desc">{{ $countInCat }} photo(s) in this category</p>
                                <span class="gallery-card-arrow"><i class="fas fa-arrow-right"></i></span>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

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
                    <a href="{{ route('photoDetailPage', ['tag' => $photo->tag]) }}"
                       class="photo-item-link"
                       data-category="{{ \Str::slug($photo->categorie_photo) }}">
                        <div class="photo-item fade-in-up active"
                             style="transition-delay: {{ ($index % 6) * 0.1 }}s">
                            <div class="photo-image-wrapper">
                                <img class="photo-image"
                                     src="{{ asset('storage/assets/gallery/' . $photo->nom_photo) }}"
                                     alt="{{ $photo->titre_photo }}"
                                     loading="lazy">
                                <div class="photo-overlay">
                                    <div class="photo-icon">
                                        <i class="fas fa-arrow-right"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="photo-info">
                                <h3 class="photo-title">{{ $photo->titre_photo }}</h3>
                                <span class="photo-category">
                                    <i class="fas fa-tag me-1"></i>{{ $photo->categorie_photo }}
                                </span>
                                @if($photo->date_event)
                                    <div class="photo-date">
                                        <i class="far fa-calendar me-1"></i>
                                        {{ date('F j, Y', strtotime($photo->date_event)) }}
                                    </div>
                                @endif
                                <span class="photo-card-arrow"><i class="fas fa-arrow-right"></i></span>
                            </div>
                        </div>
                    </a>
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
            const photoItems = document.querySelectorAll('.photo-item-link');
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
                        item.style.display = 'block';
                        const innerItem = item.querySelector('.photo-item');
                        if (innerItem) innerItem.classList.add('active');
                        visibleCount++;
                        hasVisible = true;
                    } else {
                        item.style.display = 'none';
                        const innerItem = item.querySelector('.photo-item');
                        if (innerItem) innerItem.classList.remove('active');
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

        // ============================================
        // CADRES CLIQUABLES : scroll + appliquer le filtre
        // ============================================
        document.addEventListener('DOMContentLoaded', function() {
            const galleryCards = document.querySelectorAll('.gallery-card-filter');
            const filterButtons = document.querySelectorAll('.filter-btn');
            const photoItems = document.querySelectorAll('.photo-item-link');
            const photoGallery = document.getElementById('photo-gallery');
            const noResultsMessage = document.getElementById('no-results-message');

            galleryCards.forEach(card => {
                card.addEventListener('click', function(e) {
                    e.preventDefault();
                    const filter = this.getAttribute('data-filter');
                    // Activer le bouton filtre correspondant
                    filterButtons.forEach(btn => {
                        btn.classList.toggle('active', btn.getAttribute('data-filter') === filter);
                    });
                    // Appliquer le filtre
                    let visibleCount = 0;
                    photoItems.forEach(item => {
                        const category = item.getAttribute('data-category') || '';
                        const matches = filter === 'all' || category === filter;
                        item.style.display = matches ? 'block' : 'none';
                        const innerItem = item.querySelector('.photo-item');
                        if (innerItem) innerItem.classList.toggle('active', matches);
                        if (matches) visibleCount++;
                    });
                    if (noResultsMessage) {
                        if (visibleCount > 0) noResultsMessage.classList.add('d-none');
                        else { photoGallery.style.display = 'none'; noResultsMessage.classList.remove('d-none'); }
                    }
                    // Scroll vers la galerie
                    const target = document.getElementById('photo-gallery');
                    if (target) target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                });
            });

            // Au chargement, si hash (ex: #category-slug), appliquer le filtre
            const hash = window.location.hash.replace('#', '');
            if (hash && hash !== 'photo-gallery') {
                const matchCard = document.querySelector('.gallery-card-filter[data-filter="' + hash + '"]');
                if (matchCard) matchCard.click();
            }
        });
    </script>
@endsection
