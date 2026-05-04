@extends('index')

@section('title', ($vacancy->job_title ?? 'Vacancy') . ' | Vacancies at AIRID')

@section('content')
    @php
        $isOpen = $vacancy->application_deadline && date('Y-m-d') <= $vacancy->application_deadline;
        $lines = function($text) {
            if (empty($text)) return [];
            return array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $text)));
        };
    @endphp

    <div id="banner-area" class="banner-area"
        style="background-image:url({{ asset('storage/assets_vendor/images/banner/banner2_new.png') }})">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title top_title">Vacancies</h1>
                        </div>
                    </div><!-- Col end -->
                </div><!-- Row end -->
            </div><!-- Container end -->
        </div><!-- Banner text end -->
    </div><!-- Banner area end -->

    <section id="main-container" class="main-container">
        <div class="container">
            <div class="row">

                <div class="col-12 mt-3 mb-2">
                    <a href="{{ route('vacanciesPage') }}" class="btn btn-outline-secondary btn-sm">
                        <i class="fas fa-arrow-left"></i> Back to Vacancies
                    </a>
                </div>

                <div class="col-12">
                    <h3 class="title-section">{{ $vacancy->intitule_recrutement ?? $vacancy->job_title }}</h3>
                </div>

                <div class="col-12 mt-2 py-3 px-3 rounded" style="border-left: 4px solid #c20102; background-color: #f8f9fa;">
                    @if($vacancy->location)<strong>Location: </strong> {{ $vacancy->location }} <br>@endif
                    <strong>Organisation: </strong> African Institute for Research in Infectious Diseases (AIRID) <br>
                    @if($vacancy->contract_type)<strong>Contract: </strong> {{ $vacancy->contract_type }} <br>@endif
                    <strong>Website: </strong> <a href="https://www.airid-africa.com">www.airid-africa.com</a>
                </div>

                {{-- Row 1: About AIRID (left) | Role summary + Key responsibilities (right) --}}
                @if(filled($vacancy->a_propos_airid))
                <div class="col-12 col-md-6 mt-3">
                    <h4 class="title-section">About AIRID</h4>
                    @foreach($lines($vacancy->a_propos_airid) as $para)
                        @if($para)<p class="text-justify">{!! nl2br(e($para)) !!}</p>@endif
                    @endforeach
                </div>
                @endif

                <div class="col-12 {{ filled($vacancy->a_propos_airid) ? 'col-md-6' : '' }} mt-3">
                    <div class="row">
                        @if(filled($vacancy->resume_poste))
                        <div class="col-12">
                            <h4 class="title-section">Role summary</h4>
                            <p class="text-justify">{!! nl2br(e($vacancy->resume_poste)) !!}</p>
                        </div>
                        @endif
                        @if(filled($vacancy->responsabilites_principales))
                        <div class="col-12">
                            <h4 class="title-section">Key responsibilities</h4>
                            @php $respLines = $lines($vacancy->responsabilites_principales); @endphp
                            @if(count($respLines) > 0)
                                <ul class="mt-2">
                                    @foreach($respLines as $item)<li class="text-justify">{!! e($item) !!}</li>@endforeach
                                </ul>
                            @else
                                <p class="text-justify">{!! nl2br(e($vacancy->responsabilites_principales)) !!}</p>
                            @endif
                        </div>
                        @endif
                    </div>
                </div>

                {{-- Row 2: Qualifications + What we offer (left) | How to apply (right) --}}
                @if(filled($vacancy->qualifications) || filled($vacancy->offre))
                <div class="col-12 col-md-6 mt-2 p-3">
                    @if(filled($vacancy->qualifications))
                    <h4 class="title-section">Qualifications</h4>
                    @php $qualLines = $lines($vacancy->qualifications); @endphp
                    @if(count($qualLines) > 0)
                        <ul class="mt-2 list-group p-3 text-justify">
                            @foreach($qualLines as $item)<li>{!! e($item) !!}</li>@endforeach
                        </ul>
                    @else
                        <p class="text-justify">{!! nl2br(e($vacancy->qualifications)) !!}</p>
                    @endif
                    @endif

                    @if(filled($vacancy->offre))
                    <h4 class="title-section">What we offer</h4>
                    @php $offreLines = $lines($vacancy->offre); @endphp
                    @if(count($offreLines) > 0)
                        <ul class="mt-2 list-group p-3 text-justify">
                            @foreach($offreLines as $item)<li>{!! e($item) !!}</li>@endforeach
                        </ul>
                    @else
                        <p class="text-justify">{!! nl2br(e($vacancy->offre)) !!}</p>
                    @endif
                    @endif
                </div>
                @endif

                <div class="col-12 {{ (filled($vacancy->qualifications) || filled($vacancy->offre)) ? 'col-md-6' : '' }} mt-2 p-3">
                    <h4 class="title-section">How to apply</h4>
                    @if(filled($vacancy->comment_postuler))
                        <p class="text-justify">{!! nl2br(e($vacancy->comment_postuler)) !!}</p>
                    @else
                        <p class="text-justify">
                            Send your application by email to
                            @if($vacancy->email_apply)<a href="mailto:{{ $vacancy->email_apply }}">{{ $vacancy->email_apply }}</a>
                            @else<a href="mailto:admin@airid-africa.com">admin@airid-africa.com</a>@endif
                            with subject: <strong>"Application – {{ $vacancy->job_title }}"</strong>. The application package should include:
                        </p>
                        <ol class="mt-2 list-group p-3 text-justify">
                            <li>A cover letter (1 page maximum)</li>
                            <li>A copy of your highest academic degree</li>
                            <li>A detailed CV (3 pages maximum)</li>
                            <li>A letter of recommendation or support from a previous employer</li>
                            <li>Contact details of two professional references</li>
                        </ol>
                    @endif

                    @if($vacancy->application_deadline)
                        <p class="alert alert-info mt-2">
                            <strong>Application deadline: {{ \Carbon\Carbon::parse($vacancy->application_deadline)->format('F d, Y') }}</strong>
                        </p>
                    @endif

                    @if(filled($vacancy->note_info))
                        <p class="text-justify mt-2" style="font-style: italic">{!! nl2br(e($vacancy->note_info)) !!}</p>
                    @else
                        <p class="text-justify mt-2" style="font-style: italic">
                            AIRID is an equal opportunity employer and encourages applications from qualified individuals of all backgrounds.
                        </p>
                    @endif

                    @if($isOpen)
                        <div class="mt-3 clearfix">
                            @if($vacancy->application_file_fr)
                                <a href="{{ route('vacancy.document', ['id' => $vacancy->id, 'lang' => 'fr']) }}" target="_blank" class="btn btn-info btn-lg mr-2">Download (FR)</a>
                            @endif
                            @if($vacancy->application_file_en)
                                <a href="{{ route('vacancy.document', ['id' => $vacancy->id, 'lang' => 'en']) }}" target="_blank" class="btn btn-info btn-lg mr-2">Download (EN)</a>
                            @endif
                            @if($vacancy->email_apply)
                                <a href="mailto:{{ $vacancy->email_apply }}?subject={{ urlencode($vacancy->subject ?? 'Application – ' . $vacancy->job_title) }}"
                                   class="btn btn-outline-danger btn-lg" style="float: right">Apply</a>
                            @endif
                        </div>
                    @else
                        <div class="mt-3">
                            <p class="alert alert-danger text-justify">
                                The application deadline for this position has passed. Please check back later for new opportunities.
                            </p>
                        </div>
                    @endif
                </div>

            </div><!-- Main row end -->
        </div><!-- Container end -->
    </section>
@endsection
