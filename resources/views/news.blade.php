@extends('index')

@section('title', 'AIRID -- News & Updates')

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
           SECTION FILTRES
           ============================================ */
        .filters-section {
            background: #f8f9fa;
            padding: 2rem 0;
            border-bottom: 1px solid #e0e0e0;
        }

        .filter-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem;
            justify-content: center;
        }

        .filter-btn {
            padding: 0.6rem 1.5rem;
            border: 2px solid #dee2e6;
            background: #fff;
            color: #666;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .filter-btn:hover,
        .filter-btn.active {
            background: linear-gradient(135deg, ##767474 0%, #8b0101 100%);
            color: #c20102;
            border-color: #c20102;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(194, 1, 2, 0.3);
        }

        /* ============================================
           CARTES NEWS
           ============================================ */
        .news-item-card {
            background: #fff;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            height: 100%;
            display: flex;
            flex-direction: column;
            border: 1px solid #f0f0f0;
        }

        .news-item-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .news-item-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .news-item-card:hover .news-item-image {
            transform: scale(1.1);
        }

        .news-item-badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            padding: 0.4rem 1rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .badge-project {
            background: linear-gradient(135deg, #c20102 0%, #8b0101 100%);
            color: #fff;
        }

        .badge-vacancy {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            color: #fff;
        }

        .badge-publication {
            background: linear-gradient(135deg, #6f42c1 0%, #e83e8c 100%);
            color: #fff;
        }

        .badge-video {
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
            color: #fff;
        }

        .badge-photo {
            background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);
            color: #fff;
        }

        .badge-news {
            background: linear-gradient(135deg, #ffc107 0%, #e0a800 100%);
            color: #fff;
        }

        .badge-blog {
            background: linear-gradient(135deg, #20c997 0%, #17a2b8 100%);
            color: #fff;
        }

        .news-item-content {
            padding: 1.5rem;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .news-item-type {
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #999;
            margin-bottom: 0.5rem;
        }

        .news-item-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 0.75rem;
            line-height: 1.4;
        }

        .news-item-text {
            font-size: 0.95rem;
            color: #666;
            line-height: 1.6;
            margin-bottom: 1rem;
            flex: 1;
        }

        .news-item-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 1rem;
            border-top: 1px solid #f0f0f0;
        }

        .news-item-date {
            font-size: 0.85rem;
            color: #999;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .news-item-link {
            color: #c20102;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
        }

        .news-item-link:hover {
            color: #8b0101;
            gap: 0.75rem;
        }

        .news-item-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
        }

        .icon-project {
            background: linear-gradient(135deg, #c20102 0%, #8b0101 100%);
        }

        .icon-vacancy {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        }

        .icon-publication {
            background: linear-gradient(135deg, #6f42c1 0%, #e83e8c 100%);
        }

        .icon-video {
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
        }

        .icon-photo {
            background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);
        }

        .icon-news {
            background: linear-gradient(135deg, #ffc107 0%, #e0a800 100%);
        }

        .icon-blog {
            background: linear-gradient(135deg, #20c997 0%, #17a2b8 100%);
        }

        .news-item-icon i {
            font-size: 1.5rem;
            color: #fff;
        }

        /* Section titre */
        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 0.5rem;
        }

        .section-sub-title {
            font-size: 1.3rem;
            color: #7f8c8d;
            font-weight: 500;
        }

        .title-divider {
            width: 80px;
            height: 4px;
            background: linear-gradient(135deg, #c20102 0%, #8b0101 100%);
            border-radius: 2px;
        }

        /* Message vide */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
        }

        .empty-state i {
            font-size: 4rem;
            color: #ddd;
            margin-bottom: 1rem;
        }

        .empty-state p {
            font-size: 1.1rem;
            color: #999;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .section-title {
                font-size: 2rem;
            }

            .filter-buttons {
                justify-content: flex-start;
            }

            .filter-btn {
                padding: 0.5rem 1.2rem;
                font-size: 0.9rem;
            }

            .news-item-image {
                height: 180px;
            }
        }
    </style>
@endsection

@section('content')
    <!-- Section Hero -->
    <section class="ts-intro ts-intro-1" style="background: linear-gradient(135deg, #ebb9b9 0%, #767474 100%); padding: 80px 0;">
        <div class="container">
            <div class="row text-center">
                <div class="col-12">
                    <h1 class="text-white mb-3" style="font-size: 3rem; font-weight: 700;">News & Updates</h1>
                    <p class="text-white opacity-90" style="font-size: 1.2rem;">Stay informed about our latest projects, job opportunities, publications, news and blog posts</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Filtres -->
    <section class="filters-section">
        <div class="container">
            <div class="filter-buttons">
                <button class="filter-btn active" data-filter="all">
                    <i class="fas fa-th me-2"></i>All
                </button>
                <button class="filter-btn" data-filter="project">
                    <i class="fas fa-project-diagram me-2"></i>Projects
                </button>
                <button class="filter-btn" data-filter="vacancy">
                    <i class="fas fa-briefcase me-2"></i>Vacancies
                </button>
                <button class="filter-btn" data-filter="publication">
                    <i class="fas fa-book me-2"></i>Publications
                </button>
                <button class="filter-btn" data-filter="news">
                    <i class="fas fa-newspaper me-2"></i>News
                </button>
                <button class="filter-btn" data-filter="blog">
                    <i class="fas fa-blog me-2"></i>Blog
                </button>
            </div>
        </div>
    </section>

    <!-- Section Contenu -->
    <section class="py-5">
        <div class="container">
            <div class="row g-4" id="news-grid">
                @php
                    $allItems = collect();
                    
                    // Ajouter les projets
                    foreach ($all_projects as $project) {
                        $allItems->push([
                            'type' => 'project',
                            'id' => $project->id,
                            'title' => $project->short_title_project,
                            'text' => Str::limit($project->resume ?? $project->description_sans_html ?? '', 120),
                            'date' => $project->date_debut_project,
                            'image' => $project->photo_couverture ? asset('storage/assets/projects/' . $project->photo_couverture) : null,
                            'url' => route('detailProject', ['id' => $project->id, 'slug' => Str::slug($project->short_title_project)]),
                            'date_formatted' => $project->date_debut_project ? date('M j, Y', strtotime($project->date_debut_project)) : 'Ongoing'
                        ]);
                    }
                    
                    // Ajouter les vacancies
                    foreach ($all_vacancies as $vacancy) {
                        $allItems->push([
                            'type' => 'vacancy',
                            'id' => $vacancy->id,
                            'title' => $vacancy->job_title,
                            'text' => Str::limit($vacancy->resume_poste ?? '', 120),
                            'date' => $vacancy->application_deadline,
                            'image' => null,
                            'url' => route('vacanciesPage') . '#vacancy-' . $vacancy->id,
                            'date_formatted' => $vacancy->application_deadline ? 'Deadline: ' . date('M j, Y', strtotime($vacancy->application_deadline)) : 'Open',
                            'is_open' => $vacancy->application_deadline && date('Y-m-d') <= $vacancy->application_deadline
                        ]);
                    }
                    
                    // Ajouter les publications (gérer la pagination si nécessaire)
                    $publications = is_a($all_publications, 'Illuminate\Pagination\LengthAwarePaginator') 
                        ? $all_publications->items() 
                        : $all_publications;
                    foreach ($publications as $publication) {
                        $allItems->push([
                            'type' => 'publication',
                            'id' => $publication->id,
                            'title' => $publication->titre_publication,
                            'text' => Str::limit($publication->resume_publication ?? '', 120),
                            'date' => $publication->annee_publication,
                            'image' => $publication->photo_couverture ? asset('storage/assets/publications/' . $publication->photo_couverture) : null,
                            'url' => route('detailPublication', ['id' => $publication->id, 'slug' => Str::slug($publication->titre_publication)]),
                            'date_formatted' => $publication->annee_publication ?? 'Recent'
                        ]);
                    }
                    
                    // Ajouter les news
                    foreach ($all_news as $news) {
                        $allItems->push([
                            'type' => 'news',
                            'id' => $news->id,
                            'title' => $news->titre_news ?? 'News',
                            'text' => Str::limit($news->description_riche ?? $news->description_sans_html ?? $news->resume ?? '', 120),
                            'date' => $news->date_news ?? $news->created_at,
                            'image' => $news->photo_couverture ? (file_exists(public_path('assets/news/' . basename($news->photo_couverture))) ? asset('assets/news/' . basename($news->photo_couverture)) : asset('storage/assets/news/' . basename($news->photo_couverture))) : null,
                            'url' => '#', // À définir si une route existe
                            'date_formatted' => $news->date_news ? date('M j, Y', strtotime($news->date_news)) : ($news->created_at ? date('M j, Y', strtotime($news->created_at)) : 'Recent')
                        ]);
                    }
                    
                    // Ajouter les blogs
                    foreach ($all_blogs as $blog) {
                        $allItems->push([
                            'type' => 'blog',
                            'id' => $blog->id,
                            'title' => $blog->titre_blog ?? 'Blog Post',
                            'text' => Str::limit($blog->description_riche ?? $blog->description_sans_html ?? $blog->resume ?? '', 120),
                            'date' => $blog->date_blog ?? $blog->created_at,
                            'image' => $blog->photo_couverture_blog ? (file_exists(public_path('assets/blogs/' . basename($blog->photo_couverture_blog))) ? asset('assets/blogs/' . basename($blog->photo_couverture_blog)) : asset('storage/assets/blogs/' . basename($blog->photo_couverture_blog))) : null,
                            'url' => '#', // À définir si une route existe
                            'date_formatted' => $blog->date_blog ? date('M j, Y', strtotime($blog->date_blog)) : ($blog->created_at ? date('M j, Y', strtotime($blog->created_at)) : 'Recent')
                        ]);
                    }
                    
                    // Trier par date (plus récent en premier)
                    // Normaliser toutes les dates en timestamps pour le tri
                    $allItems = $allItems->map(function($item) {
                        $date = $item['date'] ?? null;
                        if (!$date) {
                            $item['sort_date'] = 0; // Les éléments sans date en dernier
                            return $item;
                        }
                        // Si c'est un objet Carbon ou DateTime, convertir en timestamp
                        if (is_object($date)) {
                            if (method_exists($date, 'getTimestamp')) {
                                $item['sort_date'] = $date->getTimestamp();
                            } elseif (method_exists($date, 'timestamp')) {
                                $item['sort_date'] = $date->timestamp;
                            } else {
                                $item['sort_date'] = 0;
                            }
                        } elseif (is_string($date)) {
                            // Si c'est une string, convertir en timestamp
                            $item['sort_date'] = strtotime($date) ?: 0;
                        } elseif (is_numeric($date)) {
                            // Si c'est déjà un nombre (timestamp), le retourner
                            $item['sort_date'] = (int)$date;
                        } else {
                            $item['sort_date'] = 0;
                        }
                        return $item;
                    })->sortByDesc('sort_date')->values();
                @endphp

                @forelse($allItems as $index => $item)
                    <div class="col-lg-4 col-md-6 news-item fade-in-up" data-type="{{ $item['type'] }}" style="transition-delay: {{ ($index % 3) * 0.1 }}s">
                        <div class="news-item-card">
                            @if($item['image'])
                                <div class="position-relative overflow-hidden" style="height: 200px;">
                                    <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}" class="news-item-image w-100 h-100">
                                    <span class="news-item-badge badge-{{ $item['type'] }}">
                                        {{ ucfirst($item['type']) }}
                                    </span>
                                </div>
                            @else
                                <div class="position-relative" style="height: 200px; background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); display: flex; align-items: center; justify-content: center;">
                                    <div class="news-item-icon icon-{{ $item['type'] }}">
                                        @if($item['type'] == 'project')
                                            <i class="fas fa-project-diagram"></i>
                                        @elseif($item['type'] == 'vacancy')
                                            <i class="fas fa-briefcase"></i>
                                        @elseif($item['type'] == 'publication')
                                            <i class="fas fa-book"></i>
                                        @elseif($item['type'] == 'news')
                                            <i class="fas fa-newspaper"></i>
                                        @elseif($item['type'] == 'blog')
                                            <i class="fas fa-blog"></i>
                                        @endif
                                    </div>
                                    <span class="news-item-badge badge-{{ $item['type'] }}" style="position: absolute; top: 1rem; right: 1rem;">
                                        {{ ucfirst($item['type']) }}
                                    </span>
                                </div>
                            @endif

                            <div class="news-item-content">
                                <div class="news-item-type">{{ ucfirst($item['type']) }}</div>
                                <h3 class="news-item-title">{{ Str::limit($item['title'], 80) }}</h3>
                                @if($item['text'])
                                    <p class="news-item-text">{{ $item['text'] }}</p>
                                @endif
                                <div class="news-item-footer">
                                    <div class="news-item-date">
                                        <i class="far fa-calendar-alt"></i>
                                        <span>{{ $item['date_formatted'] }}</span>
                                    </div>
                                    <a href="{{ $item['url'] }}" class="news-item-link">
                                        View Details
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="empty-state">
                            <i class="fas fa-inbox"></i>
                            <p>No news items available at the moment.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Filtrage
            const filterButtons = document.querySelectorAll('.filter-btn');
            const newsItems = document.querySelectorAll('.news-item');

            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const filter = this.getAttribute('data-filter');

                    // Mettre à jour les boutons actifs
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');

                    // Filtrer les éléments
                    newsItems.forEach(item => {
                        if (filter === 'all' || item.getAttribute('data-type') === filter) {
                            item.style.display = 'block';
                            setTimeout(() => {
                                item.classList.add('visible');
                            }, 10);
                        } else {
                            item.style.display = 'none';
                            item.classList.remove('visible');
                        }
                    });
                });
            });

            // Animation au scroll
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

            document.querySelectorAll('.fade-in-up').forEach(el => {
                observer.observe(el);
            });
        });
    </script>
@endsection
