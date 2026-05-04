@extends('index')

@section('title', ($pageTitle ?? 'AIRID') . ' | AIRID Africa')

@section('content')
<section class="main-content py-3">
    <div class="container">
        @if(empty($hideBreadcrumb))
        <nav aria-label="breadcrumb" class="mb-2">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                @if(isset($breadcrumbParent))
                    <li class="breadcrumb-item"><a href="{{ $breadcrumbParent['url'] ?? '#' }}">{{ $breadcrumbParent['label'] ?? '' }}</a></li>
                @endif
                <li class="breadcrumb-item active" aria-current="page">{{ $pageTitle ?? 'Page' }}</li>
            </ol>
        </nav>
        @endif

        <div class="row">
            <div class="col-lg-12">
                <div class="content-section" style="background: #fff; padding: 1.25rem 1.5rem; border-radius: 15px; box-shadow: 0 5px 25px rgba(0,0,0,0.08); border-left: 5px solid #c20102;">
                    @if(empty($hideTitle))
                    <h1 class="mb-2" style="border-bottom: 3px solid #c20102; padding-bottom: 0.5rem;">
                        {{ $pageTitle ?? 'Page' }}
                    </h1>
                    @if(!empty($pageLead))
                        <p class="section-lead mb-2">{{ $pageLead }}</p>
                    @endif
                    @endif
                    <div class="page-body" style="margin-bottom: 0;">
                        @if(!empty($pageContent))
                            {!! $pageContent !!}
                        @else
                            <p class="text-muted">Content for this page is being prepared. Please check back later or contact us for more information.</p>
                            <p><a href="{{ route('contactPage') }}" class="btn btn-outline-danger">Contact Us</a></p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
