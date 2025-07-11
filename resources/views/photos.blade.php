@extends('index')

@section('title', 'AIRID --Photos')


@section('content')
    <div id="banner-area" class="banner-area"
        style="background-image:url({{ asset('storage/assets_vendor/images/banner/banner2_new.png') }})">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title top_title">Our Photo Gallery</h1>
                            {{-- <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Our Photo Gallery</a></li>
                                </ol>
                            </nav> --}}
                        </div>
                    </div><!-- Col end -->
                </div><!-- Row end -->
            </div><!-- Container end -->
        </div><!-- Banner text end -->
    </div><!-- Banner area end -->


    <section id="project-area" class="project-area solid-bg">
        <div class="container">
           
            <div class="row">
                <div class="col-12">
                    <div class="shuffle-btn-group">
                        <label class="active" for="all">
                            <input type="radio" name="shuffle-filter" id="all" value="all" checked="checked">Show
                            All
                        </label>
                        @forelse ($all_photos_categories as $photo_categorie)
                            <label for="{{ \Str::slug($photo_categorie->categorie_photo) }}">
                                <input type="radio" name="shuffle-filter"
                                    id="{{ \Str::slug($photo_categorie->categorie_photo) }}"
                                    value="{{ \Str::slug($photo_categorie->categorie_photo) }}">
                                {{ $photo_categorie->categorie_photo }}
                            </label>
                        @empty
                        @endforelse


                    </div><!-- project filter end -->


                    <div class="row shuffle-wrapper">
                        <div class="col-1 shuffle-sizer"></div>

                        @forelse ($all_photos as $photo)
                            <div class="col-lg-4 col-md-6 shuffle-item"
                                data-groups="[&quot;{{ \Str::slug($photo->categorie_photo) }}&quot;]">
                                <div class="project-img-container">
                                    <a class="gallery-popup"
                                        href="{{ asset('storage/assets/gallery/' . $photo->nom_photo) }}"
                                        aria-label="project-img">
                                        <img class="img-fluid"
                                            src="{{ asset('storage/assets/gallery/' . $photo->nom_photo) }}"
                                            alt="project-img">
                                        <span class="gallery-icon"><i class="fa fa-plus"></i></span>
                                    </a>
                                    <div class="project-item-info">
                                        <div class="project-item-info-content">
                                            <h3 class="project-item-title">
                                                <a href="{{ route("photoDetailPage",["tag"=>$photo->tag ]) }}">{{ $photo->titre_photo }}</a>
                                            </h3>
                                            <p class="project-cat">{{ $photo->categorie_photo }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- shuffle item 2 end -->
                        @empty
                        @endforelse

                    </div><!-- shuffle end -->
                </div>


            </div><!-- Content row end -->
        </div>
        <!--/ Container end -->
    </section><!-- Project area end -->

    @include('partials.partenaires')
@endsection
