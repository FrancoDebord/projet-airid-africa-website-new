@extends('index')

@section('title', ($item['title'] ?? 'Philanthropy') . ' | AIRID')

@section('content')
<section class="main-content py-4">
    <div class="container">
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('philanthropyPage') }}">Philanthropy</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $item['title'] ?? 'Detail' }}</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-lg-12">
                <div class="phil-detail-card rounded shadow-sm overflow-hidden bg-white border-left border-danger" style="border-left-width: 5px !important;">
                    @if(!empty($item['images']) && count($item['images']) > 0)
                        <div class="phil-detail-hero mb-0" style="max-height: 360px; overflow: hidden;">
                            <img src="{{ $item['images'][0] }}" alt="{{ $item['title'] ?? '' }}" class="w-100" style="object-fit: cover; object-position: center; height: 360px;">
                        </div>
                    @endif
                    <div class="p-4 p-lg-5">
                        @if(session('success'))
                            <div class="alert alert-success mb-4">{{ session('success') }}</div>
                        @endif
                        <div class="d-flex flex-wrap align-items-center gap-2 mb-3">
                            <h1 class="mb-0" style="font-size: 1.75rem; font-weight: 700; color: #1a1a1a;">{{ $item['title'] ?? 'Philanthropy' }}</h1>
                            @if(($item['status'] ?? 'ongoing') === 'past')
                                <span class="badge bg-secondary">Past / Closed</span>
                            @else
                                <span class="badge bg-success">Ongoing</span>
                            @endif <br>
                            @if(!empty($item['document_url']) || !empty($item['document_url_fr']))
                            <div class="mt-3 d-flex flex-wrap gap-2">
                                @if(!empty($item['document_url']))
                                    <a href="{{ $item['document_url'] }}" target="_blank" rel="noopener" class="btn btn-outline-danger">
                                        <i class="fas fa-file-pdf me-2"></i> Download PDF (English)
                                    </a>
                                @endif <br>
                                @if(!empty($item['document_url_fr']))
                                    <a href="{{ $item['document_url_fr'] }}" target="_blank" rel="noopener" class="btn btn-outline-danger">
                                        <i class="fas fa-file-pdf me-2"></i> Télécharger le PDF (Français)
                                    </a>
                                @endif
                            </div>
                        @endif
                        </div>


                        <div class="phil-detail-content text-body" style="font-size: 1rem; line-height: 1.7;">
                            {!! $item['content'] ?? '' !!}
                        </div>
                        @if(!empty($item['images']) && count($item['images']) > 1)
                            <div class="row g-3 mt-3">
                                @foreach(array_slice($item['images'], 1) as $img)
                                    <div class="col-md-4">
                                        <img src="{{ $img }}" alt="" class="img-fluid rounded" loading="lazy">
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        <div class="mt-5 pt-3 text-center d-flex flex-wrap justify-content-center gap-3">
                            @if(!empty($item['has_apply_form']))
                                @if(!empty($item['can_apply']))
                                    <a href="{{ route('philanthropy.apply.form', $item['slug']) }}" class="btn btn-danger btn-lg px-5 py-3 fw-bold">
                                        <i class="fas fa-file-alt me-2"></i> Apply now
                                    </a>
                                @else
                                    <button type="button" class="btn btn-secondary btn-lg px-5 py-3 fw-bold" disabled title="This opportunity is closed.">
                                        <i class="fas fa-lock me-2"></i> Apply now (closed)
                                    </button>
                                @endif
                            @endif
                            <a href="{{ route('getInvolvedPage') }}" class="btn btn-outline-danger btn-lg px-5 py-3 fw-bold">
                                <i class="fas fa-hand-holding-heart me-2"></i> Donate
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
