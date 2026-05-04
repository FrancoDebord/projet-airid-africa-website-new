@extends('index')

@section('title', 'Philanthropy | AIRID')

@section('css')
<style>
    .phil-hero {
        background: linear-gradient(135deg, rgba(194,1,2,0.15) 0%, rgba(139,1,1,0.08) 50%, #f8f9fa 100%);
        padding: 3rem 0;
        text-align: center;
        border-bottom: 4px solid #c20102;
    }
    .phil-hero h1 { font-size: 2rem; font-weight: 700; color: #1a1a1a; margin-bottom: 0.5rem; }
    .phil-hero .lead { font-size: 1.1rem; color: #555; max-width: 640px; margin: 0 auto; }
    .phil-section-title { font-size: 1.5rem; font-weight: 700; color: #1a1a1a; margin-bottom: 2rem; text-align: center; }
    .phil-grid { display: grid; gap: 1.5rem; grid-template-columns: 1fr; padding: 2rem 0; }
    @media (min-width: 768px) { .phil-grid { grid-template-columns: repeat(2, 1fr); } }
    @media (min-width: 992px) { .phil-grid { grid-template-columns: repeat(3, 1fr); gap: 2rem; } }
    .phil-card {
        display: flex; flex-direction: column; background: #fff; border-radius: 14px; overflow: hidden;
        box-shadow: 0 8px 28px rgba(0,0,0,0.08); border-top: 4px solid #c20102;
        text-decoration: none; color: inherit; transition: box-shadow 0.35s ease, transform 0.35s ease; height: 100%;
    }
    .phil-card:hover { box-shadow: 0 16px 44px rgba(0,0,0,0.12); transform: translateY(-6px); color: inherit; text-decoration: none; }
    .phil-card-image { width: 100%; height: 200px; object-fit: cover; object-position: center; display: block; }
    .phil-card-body { padding: 1.5rem; flex: 1; display: flex; flex-direction: column; }
    .phil-card-title { font-size: 1.25rem; font-weight: 700; color: #1a1a1a; margin-bottom: 0.75rem; }
    .phil-card-text { font-size: 0.95rem; color: #555; line-height: 1.55; margin-bottom: 1rem; flex: 1; }
    .phil-card-cta {
        display: inline-flex; align-items: center; justify-content: space-between;
        font-size: 0.9rem; font-weight: 600; color: #c20102; margin-top: auto;
    }
    .phil-card:hover .phil-card-cta { color: #8b0101; }
    .phil-card-cta i {
        width: 36px; height: 36px; border-radius: 50%; background: #c20102; color: #fff;
        display: inline-flex; align-items: center; justify-content: center; font-size: 0.85rem;
        margin-left: 0.5rem; flex-shrink: 0; transition: background 0.3s, transform 0.3s;
    }
    .phil-card:hover .phil-card-cta i { background: #8b0101; transform: translateX(4px); }
</style>
@endsection

@section('content')
    <div class="phil-hero">
        <div class="container">
            <h1>Philanthropy</h1>
            <p class="lead">Support African-led science and health innovation. Discover how your engagement can make a difference.</p>
        </div>
    </div>

    <div class="container">
        <h2 class="phil-section-title">How You Can Get Involved</h2>
        <div class="phil-grid">
            @foreach($philanthropyItems as $slug => $entry)
                <a href="{{ route('philanthropyDetail', $slug) }}" class="phil-card">
                    @php
                        $cardImage = $entry['image'] ?? asset('storage/assets_vendor/images/banner/banner2_new.png');
                        if (str_starts_with($cardImage, '/') && !str_starts_with($cardImage, '//')) {
                            $cardImage = asset(ltrim($cardImage, '/'));
                        }
                    @endphp
                    <img src="{{ $cardImage }}" alt="{{ $entry['title'] ?? '' }}" class="phil-card-image" loading="lazy">
                    <div class="phil-card-body">
                        <div class="d-flex flex-wrap align-items-center gap-2 mb-2">
                            <h3 class="phil-card-title mb-0">{{ $entry['title'] ?? 'Philanthropy' }}</h3>
                            @if(isset($entry['status']))
                                @if(($entry['status'] ?? '') === 'past')
                                    <span class="badge bg-secondary">Closed</span>
                                @else
                                    <span class="badge bg-success">Ongoing</span>
                                @endif
                            @endif
                        </div>
                        @if(!empty($entry['closing_date']))
                            <p class="small text-muted mb-1">Closing date: {{ $entry['closing_date'] }}</p>
                        @endif
                        <p class="phil-card-text">{{ Str::limit($entry['excerpt'] ?? '', 120) }}</p>
                        <span class="phil-card-cta">
                            <span>View details</span>
                            <i class="fas fa-arrow-right"></i>
                        </span>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
