@extends('index')

@section('title', 'AIRID --All Projects')


@section('content')
    <div id="banner-area" class="banner-area"
        style="background-image:url({{ asset('storage/assets_vendor/images/banner/banner1.jpg') }})">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title">All projects </h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">All Projects</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div><!-- Col end -->
                </div><!-- Row end -->
            </div><!-- Container end -->
        </div><!-- Banner text end -->
    </div><!-- Banner area end -->

    <section id="news" class="news">
        <div class="container">
            <div class="row text-center">
                <div class="col-12">
                    <h2 class="section-title">Work of Excellence</h2>
                    <h3 class="section-sub-title">Recent Projects</h3>
                </div>
            </div>
            <!--/ Title row end -->

            <div class="row">

                @forelse ($all_projects as $projet)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="latest-post">
                            <div class="latest-post-media">
                                <a href="{{ route("detailProject",["id"=>$projet->id,"slug"=>Str::slug($projet->short_title_project)]) }}" class="latest-post-img">
                                    <img loading="lazy" class="img-fluid"
                                        src="{{ asset('storage/assets/projects/' . $projet->photo_couverture) }}"
                                        alt="img">
                                </a>
                            </div>
                            <div class="post-body">
                                <h4 class="post-title">
                                    <a href="{{ route("detailProject",["id"=>$projet->id,"slug"=>Str::slug($projet->short_title_project)]) }}" class="d-inline-block">{{ $projet->short_title_project }}</a>
                                </h4>
                                <div class="latest-post-meta">
                                    <span class="post-item-date">
                                        <i class="fa fa-clock-o"></i>
                                        {{ date('F j, Y', strtotime($projet->date_debut_project)) }}
                                    </span>
                                </div>
                            </div>
                        </div><!-- Latest post end -->
                    </div><!-- 1st post col end -->

                @empty
                @endforelse


                {{-- <div class="col-lg-4 col-md-6 mb-4">
                <div class="latest-post">
                    <div class="latest-post-media">
                        <a href="news-single.html" class="latest-post-img">
                            <img loading="lazy" class="img-fluid"
                                src="{{ asset('storage/assets_vendor/images/news/news2.jpg') }}" alt="img">
                        </a>
                    </div>
                    <div class="post-body">
                        <h4 class="post-title">
                            <a href="news-single.html" class="d-inline-block">Thandler Airport Water
                                Reclamation Facility Expansion Project Named</a>
                        </h4>
                        <div class="latest-post-meta">
                            <span class="post-item-date">
                                <i class="fa fa-clock-o"></i> June 17, 2017
                            </span>
                        </div>
                    </div>
                </div><!-- Latest post end -->
            </div><!-- 2nd post col end -->

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="latest-post">
                    <div class="latest-post-media">
                        <a href="news-single.html" class="latest-post-img">
                            <img loading="lazy" class="img-fluid"
                                src="{{ asset('storage/assets_vendor/images/news/news3.jpg') }}" alt="img">
                        </a>
                    </div>
                    <div class="post-body">
                        <h4 class="post-title">
                            <a href="news-single.html" class="d-inline-block">Silicon Bench and Cornike Begin
                                Construction Solar Facilities</a>
                        </h4>
                        <div class="latest-post-meta">
                            <span class="post-item-date">
                                <i class="fa fa-clock-o"></i> Aug 13, 2017
                            </span>
                        </div>
                    </div>
                </div><!-- Latest post end -->
            </div><!-- 3rd post col end --> --}}
            </div>
            <!--/ Content row end -->


        </div>
        <!--/ Container end -->
    </section>
@endsection
