@extends('index')

@section('title', 'AIRID --Video Library')


@section('content')
    <div id="banner-area" class="banner-area"
        style="background-image:url({{ asset('storage/assets_vendor/images/banner/banner1.jpg') }})">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title">Our Video Library</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Our Video Library</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div><!-- Col end -->
                </div><!-- Row end -->
            </div><!-- Container end -->
        </div><!-- Banner text end -->
    </div><!-- Banner area end -->

    <section id="main-container" class="main-container pb-2">
        <div class="container">
            <div class="row">

                @forelse ($all_videos as $video)
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="row">
                            <div class="col-12">

                                {{-- <iframe width="914" height="514" src="https://www.youtube.com/embed/t7rgHTOxBHk" title="{{ $video->title_video }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe> --}}

                                <iframe width="100%" height="315" src="{{ $video->lien_youtube_video }}"  title="{{ $video->title_video }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>>
                                </iframe>
                            </div>
                            <div class="col-12">
                                <h5>{{ $video->title_video  }}, {{ date('F j, Y', strtotime($video->date_video)) }}</h5>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </section>

    @include('partials.partenaires')
@endsection
