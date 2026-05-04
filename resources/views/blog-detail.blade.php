@extends('index')

@section('title', 'AIRID -- ' . Str::limit($blog->titre_blog ?? 'Blog', 50))

@section('css')
    <style>
        .fade-in-up {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }
        .fade-in-up.visible { opacity: 1; transform: translateY(0); }

        .blog-detail-article {
            text-align: left;
            max-width: 900px;
        }
        .blog-detail-header {
            background: linear-gradient(135deg, rgba(194, 1, 2, 0.05) 0%, rgba(139, 1, 1, 0.05) 100%);
            padding: 2rem;
            border-radius: 15px;
            margin-bottom: 2rem;
            text-align: left;
            border-left: 4px solid #c20102;
        }
        .blog-detail-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            margin-bottom: 1rem;
        }
        .blog-detail-meta-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--airid-text-color);
            font-size: var(--airid-text-size);
        }
        .blog-detail-meta-item i { color: #c20102; width: 20px; }
        .blog-detail-date-badge {
            display: inline-block;
            padding: 0.5rem 1.2rem;
            border-radius: 50px;
            background: #c20102;
            color: #fff;
            font-weight: 700;
            font-size: var(--airid-tagline-size);
            margin-bottom: 1rem;
        }
        .blog-detail-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--airid-title-color);
            line-height: 1.35;
            margin-bottom: 1rem;
            text-align: left;
        }
        .blog-detail-lead {
            text-align: left;
            color: var(--airid-text-color);
            font-size: var(--airid-text-size);
            line-height: 1.6;
        }
        .blog-detail-image-wrap {
            border-radius: 12px;
            overflow: hidden;
            margin-bottom: 2rem;
            box-shadow: 0 5px 25px rgba(0,0,0,0.08);
        }
        .blog-detail-image-wrap img {
            width: 100%;
            height: auto;
            display: block;
            vertical-align: middle;
        }
        .blog-detail-content {
            background: #fff;
            padding: 2rem 0;
            margin-bottom: 2rem;
            text-align: left;
        }
        .blog-detail-content .blog-detail-body,
        .blog-detail-content .blog-detail-body p,
        .blog-detail-content h2,
        .blog-detail-content h3,
        .blog-detail-content h4 {
            text-align: left;
        }
        .blog-detail-content h2, .blog-detail-content h3, .blog-detail-content h4 {
            color: var(--airid-title-color);
            margin-top: 1.5rem;
            margin-bottom: 0.75rem;
            font-weight: 700;
        }
        .blog-detail-content p {
            line-height: 1.8;
            color: #555;
            margin-bottom: 1rem;
            text-align: left;
        }
        .blog-detail-actions {
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 2px solid #f0f0f0;
            text-align: left;
        }
        .blog-detail-back {
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
        .blog-detail-back:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(194, 1, 2, 0.4);
            color: #fff;
        }
        @media (max-width: 768px) {
            .blog-detail-title { font-size: 1.5rem; }
            .blog-detail-meta { flex-direction: column; gap: 0.75rem; }
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
                            <p class="text-white mt-2 fade-in-up tagline mb-0">Détail du blog</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="py-5">
        <div class="container">
            <div class="row justify-content-start">
                <div class="col-12 col-lg-10 blog-detail-article">
                    <div class="blog-detail-header fade-in-up">
                        <div class="blog-detail-meta mb-2">
                            @if($blog->date_blog || $blog->created_at)
                                <span class="blog-detail-date-badge">
                                    <i class="far fa-calendar-alt me-2"></i>
                                    @if($blog->date_blog)
                                        {{ date('d M Y', strtotime($blog->date_blog)) }}
                                    @else
                                        {{ $blog->created_at->format('d M Y') }}
                                    @endif
                                </span>
                            @endif
                            <div class="blog-detail-meta-item">
                                <i class="fas fa-blog"></i>
                                <span>Blog</span>
                            </div>
                        </div>

                        <h1 class="blog-detail-title">{{ $blog->titre_blog }}</h1>

                        @if($blog->resume)
                            <p class="blog-detail-lead mb-0">{{ $blog->resume }}</p>
                        @endif
                    </div>

                    @php
                        $cover = !empty($blog->photo_couverture_blog) ? basename($blog->photo_couverture_blog) : null;
                        $blogImage = ($cover && file_exists(public_path('assets/blogs/' . $cover)))
                            ? asset('assets/blogs/' . $cover)
                            : asset('assets/news/blog.png');
                    @endphp
                    <div class="blog-detail-image-wrap fade-in-up mb-4">
                        <img src="{{ $blogImage }}" alt="{{ $blog->titre_blog ?? 'Blog image' }}" loading="eager">
                    </div>

                    <div class="blog-detail-content fade-in-up">
                        @if($blog->description_riche)
                            <div class="blog-detail-body">
                                {!! $blog->description_riche !!}
                            </div>
                        @elseif($blog->description_sans_html)
                            <div class="blog-detail-body">
                                <p>{!! nl2br(e($blog->description_sans_html)) !!}</p>
                            </div>
                        @elseif($blog->resume)
                            <div class="blog-detail-body">
                                <p>{!! nl2br(e($blog->resume)) !!}</p>
                            </div>
                        @endif

                        <div class="blog-detail-actions">
                            <a href="{{ route('newsPage') }}" class="blog-detail-back">
                                <i class="fas fa-arrow-left"></i> Retour aux News & Updates
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
