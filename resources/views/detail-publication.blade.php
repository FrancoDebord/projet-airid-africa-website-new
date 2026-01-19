@extends('index')

@section('title', 'AIRID -- Detail Publication')

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
           PUBLICATION HEADER
           ============================================ */
        .publication-header {
            background: linear-gradient(135deg, rgba(194, 1, 2, 0.05) 0%, rgba(139, 1, 1, 0.05) 100%);
            padding: 2rem;
            border-radius: 15px;
            margin-bottom: 2rem;
        }

        .publication-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            margin-bottom: 1rem;
        }

        .publication-meta-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #7f8c8d;
            font-size: 0.95rem;
        }

        .publication-meta-item i {
            color: #c20102;
            width: 20px;
        }

        .publication-year-badge {
            display: inline-block;
            padding: 0.5rem 1.2rem;
            border-radius: 50px;
            background: #c20102;
            color: #fff;
            font-weight: 700;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .publication-title {
            font-size: 2rem;
            font-weight: 700;
            color: #2c3e50;
            line-height: 1.3;
            margin-bottom: 1rem;
        }

        .publication-authors {
            font-size: 1.1rem;
            color: #555;
            line-height: 1.8;
            margin-bottom: 0.5rem;
        }

        /* ============================================
           PUBLICATION CONTENT
           ============================================ */
        .publication-content {
            background: #fff;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.08);
            margin-bottom: 2rem;
        }

        .publication-content h2,
        .publication-content h3,
        .publication-content h4 {
            color: #2c3e50;
            margin-top: 2rem;
            margin-bottom: 1rem;
            font-weight: 700;
        }

        .publication-content h2 {
            font-size: 1.8rem;
            border-bottom: 3px solid #c20102;
            padding-bottom: 0.5rem;
        }

        .publication-content p {
            line-height: 1.8;
            color: #555;
            margin-bottom: 1rem;
        }

        /* ============================================
           INFO CARDS
           ============================================ */
        .info-card {
            background: #f8f9fa;
            border-left: 4px solid #c20102;
            padding: 1.5rem;
            border-radius: 8px;
            margin-bottom: 1rem;
        }

        .info-card-label {
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .info-card-label i {
            color: #c20102;
        }

        .info-card-value {
            color: #555;
            word-break: break-word;
        }

        .info-card-value a {
            color: #c20102;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .info-card-value a:hover {
            color: #8b0101;
            text-decoration: underline;
        }

        /* ============================================
           ACTION BUTTONS
           ============================================ */
        .publication-actions {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 2px solid #f0f0f0;
        }

        .action-btn {
            flex: 1;
            min-width: 200px;
            padding: 1rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            text-align: center;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
        }

        .btn-view-article {
            background: linear-gradient(135deg, #c20102 0%, #8b0101 100%);
            color: #fff;
        }

        .btn-view-article:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(194, 1, 2, 0.4);
            color: #fff;
        }

        .btn-download-pdf {
            background: #fff;
            color: #c20102;
            border: 2px solid #c20102;
        }

        .btn-download-pdf:hover {
            background: #c20102;
            color: #fff;
            transform: translateY(-2px);
        }

        /* ============================================
           SIDEBAR
           ============================================ */
        .sidebar-card {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.08);
            padding: 1.5rem;
            margin-bottom: 2rem;
        }

        .sidebar-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 1.5rem;
            padding-bottom: 0.75rem;
            border-bottom: 3px solid #c20102;
        }

        /* ============================================
           OTHER PUBLICATIONS
           ============================================ */
        .other-publication-item {
            display: flex;
            gap: 1rem;
            padding: 1rem;
            border-radius: 10px;
            transition: all 0.3s ease;
            margin-bottom: 1rem;
            border: 2px solid #f0f0f0;
        }

        .other-publication-item:hover {
            background: #f8f9fa;
            border-color: #c20102;
            transform: translateX(5px);
        }

        .other-publication-thumb {
            width: 100px;
            height: 80px;
            border-radius: 10px;
            overflow: hidden;
            flex-shrink: 0;
            background: #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .other-publication-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .other-publication-thumb i {
            font-size: 2rem;
            color: #bdc3c7;
        }

        .other-publication-item:hover .other-publication-thumb img {
            transform: scale(1.1);
        }

        .other-publication-info {
            flex: 1;
        }

        .other-publication-title {
            font-size: 0.95rem;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 0.25rem;
            line-height: 1.4;
        }

        .other-publication-title a {
            color: #2c3e50;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .other-publication-title a:hover {
            color: #c20102;
        }

        .other-publication-year {
            font-size: 0.85rem;
            color: #7f8c8d;
        }

        /* ============================================
           RESPONSIVE
           ============================================ */
        @media (max-width: 768px) {
            .publication-title {
                font-size: 1.5rem;
            }

            .publication-meta {
                flex-direction: column;
                gap: 0.75rem;
            }

            .publication-actions {
                flex-direction: column;
            }

            .action-btn {
                width: 100%;
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
                            <h1 class="banner-title top_title fade-in-up">Publication Details</h1>
                            <p class="text-white mt-3 fade-in-up" style="font-size: 1.2rem;">
                                Scientific Research Publication
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section Contenu Principal -->
    <section class="py-5">
    <div class="container">
        <div class="row">
                <!-- Contenu Principal -->
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <!-- Header de la Publication -->
                    <div class="publication-header fade-in-up">
                        <span class="publication-year-badge">
                            <i class="far fa-calendar-alt me-2"></i>{{ $publication->annee_publication }}
                        </span>
                        
                        <div class="publication-meta">
                            @if($publication->date_publication)
                                <div class="publication-meta-item">
                                    <i class="fas fa-calendar"></i>
                                    <span>Published: {{ date("F j, Y", strtotime($publication->date_publication)) }}</span>
                                </div>
                            @endif
                            <div class="publication-meta-item">
                                <i class="fas fa-book"></i>
                                <span>Scientific Publication</span>
                            </div>
                        </div>

                        <h1 class="publication-title">{{ $publication->titre_publication }}</h1>
                        
                        @if($publication->auteurs)
                            <div class="publication-authors">
                                <strong><i class="fas fa-users me-2" style="color: #c20102;"></i>Authors:</strong>
                                {{ $publication->auteurs }}
                            </div>
                        @endif
                    </div>

                    <!-- Contenu de la Publication -->
                    <div class="publication-content fade-in-up">
                        @if($publication->resume_publication)
                            <div class="mb-4">
                                <h2>Abstract</h2>
                                <p style="font-size: 1.05rem; line-height: 1.8; color: #555;">{!! $publication->resume_publication !!}</p>
                            </div>
                        @endif

                        <div>
                            <h2>Publication Information</h2>
                            
                            @if($publication->url_publication)
                                <div class="info-card">
                                    <div class="info-card-label">
                                        <i class="fas fa-external-link-alt"></i>
                                        Access Full Article
                                    </div>
                                    <div class="info-card-value">
                                        <a href="{{ $publication->url_publication }}" target="_blank" rel="noopener noreferrer">
                                            {{ $publication->url_publication }}
                                        </a>
                                    </div>
                                </div>
                            @endif

                            @if($publication->fichier_publication)
                                <div class="info-card">
                                    <div class="info-card-label">
                                        <i class="fas fa-file-pdf"></i>
                                        Download PDF
                                    </div>
                                    <div class="info-card-value">
                                        <a href="{{ asset('storage/assets/publications/pdf/' . $publication->fichier_publication) }}" 
                                           target="_blank" 
                                           rel="noopener noreferrer">
                                            {{ $publication->fichier_publication }}
                                        </a>
                                    </div>
                                </div>
                            @endif

                            @if($publication->numero_doi)
                                <div class="info-card">
                                    <div class="info-card-label">
                                        <i class="fas fa-link"></i>
                                        DOI
                                    </div>
                                    <div class="info-card-value">
                                        <a href="{{ $publication->numero_doi }}" target="_blank" rel="noopener noreferrer">
                                            {{ $publication->numero_doi }}
                                        </a>
                                    </div>
                                </div>
                            @endif

                            @if($publication->numero_pcid)
                                <div class="info-card">
                                    <div class="info-card-label">
                                        <i class="fas fa-hashtag"></i>
                                        PMID
                                    </div>
                                    <div class="info-card-value">
                                        <a href="{{ $publication->numero_pcid }}" target="_blank" rel="noopener noreferrer">
                                            {{ $publication->numero_pcid }}
                                        </a>
                                    </div>
                                </div>
                            @endif

                            @if($publication->numero_pmcid)
                                <div class="info-card">
                                    <div class="info-card-label">
                                        <i class="fas fa-hashtag"></i>
                                        PMCID
                                    </div>
                                    <div class="info-card-value">
                                        <a href="{{ $publication->numero_pmcid }}" target="_blank" rel="noopener noreferrer">
                                            {{ $publication->numero_pmcid }}
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!-- Actions -->
                        <div class="publication-actions">
                            @if($publication->url_publication)
                                <a href="{{ $publication->url_publication }}" 
                                   target="_blank" 
                                   rel="noopener noreferrer"
                                   class="action-btn btn-view-article">
                                    <i class="fas fa-external-link-alt"></i>
                                    View Full Article
                                </a>
                            @endif
                            
                            @if($publication->fichier_publication)
                                <a href="{{ asset('storage/assets/publications/pdf/' . $publication->fichier_publication) }}"
                                   target="_blank"
                                   rel="noopener noreferrer"
                                   class="action-btn btn-download-pdf">
                                    <i class="fas fa-download"></i>
                                    Download PDF
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Autres Publications -->
                    @if($others_publications && $others_publications->count() > 0)
                        <div class="sidebar-card fade-in-up">
                            <h3 class="sidebar-title">
                                <i class="fas fa-book-open me-2"></i>Other Publications
                            </h3>
                            @foreach($others_publications as $other_publication)
                                <div class="other-publication-item">
                                    <div class="other-publication-thumb">
                                        @if($other_publication->photo_couverture)
                                            <a href="{{ route('detailPublication', ['id' => $other_publication->id, 'slug' => \Str::slug($other_publication->titre_publication)]) }}">
                                                <img loading="lazy" 
                                                     alt="{{ $other_publication->titre_publication }}"
                                                     src="{{ asset('storage/assets/publications/couverture/' . $other_publication->photo_couverture) }}">
                                            </a>
                                        @else
                                            <i class="fas fa-file-alt"></i>
                                        @endif
                                    </div>
                                    <div class="other-publication-info">
                                        <h4 class="other-publication-title">
                                            <a href="{{ route('detailPublication', ['id' => $other_publication->id, 'slug' => \Str::slug($other_publication->titre_publication)]) }}">
                                                {{ Str::limit($other_publication->titre_publication, 80) }}
                                            </a>
                                        </h4>
                                        @if($other_publication->annee_publication)
                                            <div class="other-publication-year">
                                                <i class="far fa-calendar me-1"></i>{{ $other_publication->annee_publication }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach

                            @if($others_publications->hasPages())
                                <div class="text-center mt-3">
                            {!! $others_publications->links() !!}
                                </div>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
</section>
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
    </script>
@endsection