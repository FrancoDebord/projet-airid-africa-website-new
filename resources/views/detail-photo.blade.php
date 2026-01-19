@extends('index')

@section('title', 'AIRID -- Detail Photo')

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
           GALLERY SLIDER
           ============================================ */
        .photo-slider {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0,0,0,0.15);
            margin-bottom: 2rem;
        }

        .photo-slider img {
            width: 100%;
            height: 500px;
            object-fit: cover;
        }

        /* ============================================
           SIDEBAR INFO
           ============================================ */
        .photo-info-card {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.08);
            padding: 2rem;
        }

        .photo-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 1rem;
            line-height: 1.3;
        }

        .photo-description {
            color: #555;
            line-height: 1.8;
            margin-bottom: 2rem;
        }

        .info-item {
            padding: 1rem 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .info-item:last-child {
            border-bottom: none;
        }

        .info-label {
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .info-label i {
            color: #c20102;
            width: 20px;
        }

        .info-value {
            color: #555;
            font-size: 0.95rem;
        }

        .info-badge {
            display: inline-block;
            padding: 0.4rem 1rem;
            border-radius: 50px;
            background: rgba(194, 1, 2, 0.1);
            color: #c20102;
            font-weight: 600;
            font-size: 0.9rem;
        }

        /* ============================================
           THUMBNAIL GRID
           ============================================ */
        .thumbnail-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
            gap: 0.75rem;
            margin-top: 1rem;
        }

        .thumbnail-item {
            position: relative;
            border-radius: 10px;
            overflow: hidden;
            cursor: pointer;
            opacity: 0.7;
            transition: all 0.3s ease;
        }

        .thumbnail-item:hover,
        .thumbnail-item.active {
            opacity: 1;
            transform: scale(1.05);
        }

        .thumbnail-item img {
            width: 100%;
            height: 80px;
            object-fit: cover;
        }

        /* ============================================
           RESPONSIVE
           ============================================ */
        @media (max-width: 768px) {
            .photo-slider img {
                height: 300px;
            }

            .photo-title {
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
                            <h1 class="banner-title top_title fade-in-up">Photo Gallery</h1>
                            <p class="text-white mt-3 fade-in-up" style="font-size: 1.2rem;">
                                {{ $all_photos->first()->titre_photo ?? 'Event Photos' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section Galerie -->
    <section class="py-5">
    <div class="container">
            <div class="row">
                <!-- Slider Principal -->
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="photo-slider fade-in-up">
                        @php
                            $firstPhoto = $all_photos->first();
                        @endphp
                        @if($firstPhoto)
                            <img id="main-photo" 
                                 loading="lazy" 
                                 class="img-fluid" 
                                 src="{{ asset('storage/assets/gallery/' . $firstPhoto->nom_photo) }}" 
                                 alt="{{ $firstPhoto->titre_photo }}">
                        @endif
                    </div>

                    <!-- Miniatures -->
                    @if($all_photos->count() > 1)
                        <div class="thumbnail-grid fade-in-up">
                            @foreach($all_photos as $index => $photo)
                                <div class="thumbnail-item {{ $index === 0 ? 'active' : '' }}" 
                                     data-photo="{{ asset('storage/assets/gallery/' . $photo->nom_photo) }}"
                                     data-title="{{ $photo->titre_photo }}">
                                    <img loading="lazy" 
                                         src="{{ asset('storage/assets/gallery/' . $photo->nom_photo) }}" 
                                         alt="{{ $photo->titre_photo }}">
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- Sidebar Info -->
                <div class="col-lg-4">
                    @if($firstPhoto)
                        <div class="photo-info-card fade-in-up">
                            <h2 class="photo-title" id="photo-title">{{ $firstPhoto->titre_photo }}</h2>
                            
                            @if($firstPhoto->description)
                                <div class="photo-description" id="photo-description">
                                    {{ $firstPhoto->description }}
                                </div>
                            @endif

                            <div class="info-item">
                                <div class="info-label">
                                    <i class="fas fa-tag"></i>Category
                                </div>
                                <div class="info-value">
                                    <span class="info-badge" id="photo-category">{{ $firstPhoto->categorie_photo }}</span>
                                </div>
                            </div>

                            @if($firstPhoto->date_event)
                                <div class="info-item">
                                    <div class="info-label">
                                        <i class="far fa-calendar-alt"></i>Date of Event
                                    </div>
                                    <div class="info-value" id="photo-date">
                                        {{ date('F j, Y', strtotime($firstPhoto->date_event)) }}
                                    </div>
              </div>
                            @endif

                            @if($firstPhoto->tag)
                                <div class="info-item">
                                    <div class="info-label">
                                        <i class="fas fa-hashtag"></i>Tag
                                    </div>
                                    <div class="info-value" id="photo-tag">
                                        {{ $firstPhoto->tag }}
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endif
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
        // GESTION DES MINIATURES
        // ============================================
        document.addEventListener('DOMContentLoaded', function() {
            const thumbnailItems = document.querySelectorAll('.thumbnail-item');
            const mainPhoto = document.getElementById('main-photo');
            const photoTitle = document.getElementById('photo-title');
            const photoDescription = document.getElementById('photo-description');
            const photoCategory = document.getElementById('photo-category');
            const photoDate = document.getElementById('photo-date');
            const photoTag = document.getElementById('photo-tag');

            // Données des photos
            const photosData = {
                @foreach($all_photos as $photo)
                    '{{ asset('storage/assets/gallery/' . $photo->nom_photo) }}': {
                        title: '{{ $photo->titre_photo }}',
                        description: '{{ $photo->description ?? '' }}',
                        category: '{{ $photo->categorie_photo }}',
                        date: '{{ $photo->date_event ? date('F j, Y', strtotime($photo->date_event)) : '' }}',
                        tag: '{{ $photo->tag ?? '' }}'
                    },
                @endforeach
            };

            thumbnailItems.forEach(item => {
                item.addEventListener('click', function() {
                    const photoSrc = this.getAttribute('data-photo');
                    
                    // Mettre à jour la photo principale
                    if (mainPhoto) {
                        mainPhoto.src = photoSrc;
                    }

                    // Mettre à jour les informations
                    const data = photosData[photoSrc];
                    if (data) {
                        if (photoTitle) photoTitle.textContent = data.title;
                        if (photoDescription) photoDescription.textContent = data.description || '';
                        if (photoCategory) photoCategory.textContent = data.category;
                        if (photoDate) photoDate.textContent = data.date || '';
                        if (photoTag) photoTag.textContent = data.tag || '';
                    }

                    // Mettre à jour les miniatures actives
                    thumbnailItems.forEach(thumb => thumb.classList.remove('active'));
                    this.classList.add('active');
                });
            });
        });
    </script>
@endsection