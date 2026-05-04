@extends('index')

@section('title', 'AIRID -- ' . Str::limit($news->titre_news ?? 'News', 50))

@section('css')
    <style>
        .fade-in-up {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }
        .fade-in-up.visible { opacity: 1; transform: translateY(0); }

        .news-detail-article {
            text-align: left;
            max-width: 900px;
        }
        .news-detail-header {
            background: linear-gradient(135deg, rgba(194, 1, 2, 0.05) 0%, rgba(139, 1, 1, 0.05) 100%);
            padding: 2rem;
            border-radius: 15px;
            margin-bottom: 2rem;
            text-align: left;
            border-left: 4px solid #c20102;
        }
        .news-detail-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            margin-bottom: 1rem;
        }
        .news-detail-meta-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--airid-text-color);
            font-size: var(--airid-text-size);
        }
        .news-detail-meta-item i { color: #c20102; width: 20px; }
        .news-detail-date-badge {
            display: inline-block;
            padding: 0.5rem 1.2rem;
            border-radius: 50px;
            background: #c20102;
            color: #fff;
            font-weight: 700;
            font-size: var(--airid-tagline-size);
            margin-bottom: 1rem;
        }
        .news-detail-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--airid-title-color);
            line-height: 1.35;
            margin-bottom: 1rem;
            text-align: left;
        }
        .news-detail-lead {
            text-align: left;
            color: var(--airid-text-color);
            font-size: var(--airid-text-size);
            line-height: 1.6;
        }
        .news-detail-image-wrap {
            border-radius: 12px;
            overflow: hidden;
            margin-bottom: 2rem;
            box-shadow: 0 5px 25px rgba(0,0,0,0.08);
        }
        .news-detail-image-wrap img {
            width: 100%;
            height: auto;
            display: block;
            vertical-align: middle;
        }
        .news-detail-photos {
            margin-bottom: 2rem;
        }
        .news-detail-photos .news-detail-image-wrap img {
            max-height: 320px;
            width: auto;
            max-width: 100%;
            margin: 0 auto;
            object-fit: contain;
        }
        .news-detail-photos-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }
        .news-detail-photos-grid .news-detail-image-wrap img {
            max-height: 280px;
            width: 100%;
            max-width: 100%;
            object-fit: contain;
        }
        @media (max-width: 768px) {
            .news-detail-photos-grid { grid-template-columns: 1fr; }
            .news-detail-photos .news-detail-image-wrap img { max-height: 260px; }
            .news-detail-photos-grid .news-detail-image-wrap img { max-height: 240px; }
        }
        .news-detail-gallery {
            margin-bottom: 2rem;
        }
        .news-detail-gallery-title {
            font-size: var(--airid-h3-size);
            font-weight: 700;
            color: var(--airid-title-color);
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 3px solid #c20102;
            text-align: left;
        }
        .news-detail-gallery-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }
        .news-detail-gallery-item {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            background: #f5f5f5;
        }
        .news-detail-gallery-item img {
            width: 100%;
            height: auto;
            display: block;
            vertical-align: middle;
        }
        @media (max-width: 768px) {
            .news-detail-gallery-grid { grid-template-columns: 1fr; }
        }
        .news-detail-content {
            background: #fff;
            padding: 2rem 0;
            margin-bottom: 2rem;
            text-align: left;
        }
        .news-detail-content .news-detail-body,
        .news-detail-content .news-detail-body p,
        .news-detail-content h2,
        .news-detail-content h3,
        .news-detail-content h4 {
            text-align: left;
        }
        .news-detail-content h2, .news-detail-content h3, .news-detail-content h4 {
            color: var(--airid-title-color);
            margin-top: 1.5rem;
            margin-bottom: 0.75rem;
            font-weight: 700;
        }
        .news-detail-content p {
            line-height: 1.8;
            color: #555;
            margin-bottom: 1rem;
            text-align: left;
        }
        .news-detail-actions {
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 2px solid #f0f0f0;
            text-align: left;
        }
        .news-detail-back {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            font-weight: 600;
            background: linear-gradient(135deg, #c20102 0%, #8b0101 100%);
            color: #fff;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .news-detail-back:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(194, 1, 2, 0.4);
            color: #fff;
        }
        @media (max-width: 768px) {
            .news-detail-title { font-size: 1.5rem; }
            .news-detail-meta { flex-direction: column; gap: 0.75rem; }
        }
    </style>
@endsection

@section('content')
    <div id="banner-area" class="banner-area" style="background-image:url({{ asset('storage/assets_vendor/images/banner/banner2_new.png') }}); min-height: 200px;">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title top_title fade-in-up">News & Updates</h1>
                            <p class="text-white mt-2 fade-in-up tagline mb-0">Détail de l'actualité</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="py-5">
        <div class="container">
            <div class="row justify-content-start">
                <div class="col-12 col-lg-10 news-detail-article">
                    <div class="news-detail-header fade-in-up">
                        <div class="news-detail-meta mb-2">
                            @if($news->date_news || $news->created_at)
                                <span class="news-detail-date-badge">
                                    <i class="far fa-calendar-alt me-2"></i>
                                    @if($news->date_news)
                                        {{ date('d M Y', strtotime($news->date_news)) }}
                                    @else
                                        {{ $news->created_at->format('d M Y') }}
                                    @endif
                                </span>
                            @endif
                            <div class="news-detail-meta-item">
                                <i class="fas fa-newspaper"></i>
<span>News</span>                            </div>
                            {{-- @if($news->creatorNews)
                                <div class="news-detail-meta-item">
                                    <i class="fas fa-user-edit"></i>
                                    <span>{{ $news->creatorNews->titre }} {{ $news->creatorNews->prenom_personnel }} {{ $news->creatorNews->nom_personnel }}</span>
                                </div>
                            @endif --}}
                        </div>

                        <h1 class="news-detail-title">{{ $news->titre_news }}</h1>

                        @if($news->resume)
                            <p class="news-detail-lead mb-0">{{ $news->resume }}</p>
                        @endif
                    </div>

                    {{-- Image de couverture principale (affichage correct en prod via asset()) --}}
                    {{-- @if(!empty($news->photo_couverture))
                        <div class="news-detail-image-wrap fade-in-up mb-4">
                            <img src="{{ asset('assets/news/' . basename($news->photo_couverture)) }}" alt="{{ $news->titre_news }}" loading="eager" class="w-100">
                        </div>
                    @endif --}}

                    @php
                        $newsPhotos = [];
                        if (!empty($news->seconde_photo)) {
                            $newsPhotos[] = asset('assets/news/' . basename($news->seconde_photo));
                        }
                    @endphp
                    @if(count($newsPhotos) > 0)
                        <div class="news-detail-photos fade-in-up {{ count($newsPhotos) == 2 ? 'news-detail-photos-grid' : '' }}">
                            @foreach($newsPhotos as $idx => $photoUrl)
                                <div class="news-detail-image-wrap">
                                    <img src="{{ $photoUrl }}" alt="{{ $news->titre_news }} — Photo {{ $loop->iteration }}" loading="lazy" onerror="this.style.display='none'">
                                </div>
                            @endforeach
                        </div>
                    @endif

                    @if($news->photosGallery && $news->photosGallery->isNotEmpty())
                        <div class="news-detail-gallery fade-in-up">
                            <h2 class="news-detail-gallery-title"><i class="fas fa-images me-2" style="color: #c20102;"></i>Photos</h2>
                            <div class="news-detail-gallery-grid">
                                @foreach($news->photosGallery as $photo)
                                    @php
                                        $imgName = basename($photo->photo_event ?? '');
                                    @endphp
                                    @if($imgName)
                                        <div class="news-detail-gallery-item">
                                            <img src="{{ asset('assets/news/' . $imgName) }}" alt="{{ $news->titre_news }} — Photo {{ $loop->iteration }}" loading="lazy" onerror="this.parentElement.style.display='none'">
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <div class="news-detail-content fade-in-up">
                        @if($news->description_riche)
                            <div class="news-detail-body">
                                {!! $news->description_riche !!}
                            </div>
                        @elseif($news->description_sans_html)
                            <div class="news-detail-body">
                                <p>{!! nl2br(e($news->description_sans_html)) !!}</p>
                            </div>
                        @elseif($news->resume)
                            <div class="news-detail-body">
                                <p>{!! nl2br(e($news->resume)) !!}</p>
                            </div>
                        @endif

                        <div class="news-detail-actions">
                            <a href="{{ route('newsPage') }}" class="news-detail-back">
                                <i class="fas fa-arrow-left"></i> Back to News & Updates
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var els = document.querySelectorAll('.fade-in-up');
            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.1, rootMargin: '0px 0px -30px 0px' });
            els.forEach(function(el) { observer.observe(el); });
        });
    </script>
@endsection
