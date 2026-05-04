@extends('index')

@section('title', 'Apply – ' . ($item->title ?? 'Philanthropy') . ' | AIRID')

@section('content')
<section class="main-content py-4">
    <div class="container">
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('philanthropyPage') }}">Philanthropy</a></li>
                <li class="breadcrumb-item"><a href="{{ route('philanthropyDetail', $item->slug) }}">{{ $item->title }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Apply</li>
            </ol>
        </nav>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="bg-white rounded shadow-sm p-4 p-lg-5 border-start border-danger border-4">
                    <h1 class="h3 mb-4">Apply – {{ $item->title }}</h1>
                    @if($item->apply_intro)
                        {{-- <div class="text-muted mb-4">{!! nl2br(e($item->apply_intro)) !!}</div> --}}
                    @elseif($item->excerpt)
                        <p class="text-muted mb-4">{{ $item->excerpt }}</p>
                    @endif
                    @if($item->document_path || $item->document_path_fr)
                        <div class="mb-4 d-flex flex-wrap gap-2">
                            @if($item->document_path)
                                <a href="{{ asset('assets/philanthropy/' . $item->document_path) }}" target="_blank" rel="noopener" class="btn btn-outline-danger btn-sm">
                                    <i class="fas fa-file-pdf me-2"></i> Download PDF (English)
                                </a>
                            @endif
                            @if($item->document_path_fr)
                                <a href="{{ asset('assets/philanthropy/' . $item->document_path_fr) }}" target="_blank" rel="noopener" class="btn btn-outline-danger btn-sm">
                                    <i class="fas fa-file-pdf me-2"></i> Télécharger le PDF (Français)
                                </a>
                            @endif
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
                        </div>
                    @endif

                    @include('partials.philanthropy-apply-form-' . $item->apply_form_type, ['item' => $item])
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
