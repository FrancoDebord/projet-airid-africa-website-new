@extends('index')


@section('content')

@include('partials.carroussel')

    @include('partials.small_about')

    @include('partials.count')

   @include('partials.specialities')
   {{-- @include('partials.projets') --}}

 

    <section class="subscribe no-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="subscribe-call-to-acton">
                        <h3>You want to collaborate on a project ? </h3>
                        <h4>(+229) 01 67 16 44 99</h4>
                    </div>
                </div><!-- Col end -->

                <div class="col-lg-8">
                    <div class="ts-newsletter row align-items-center">
                        <div class="col-md-5 newsletter-introtext">
                            <h4 class="text-white mb-0">Newsletter Sign-up</h4>
                            <p class="text-white">Latest updates and news</p>
                        </div>

                        <div class="col-md-7 newsletter-form">
                            <form action="#" method="post">
                                <div class="form-group">
                                    <label for="newsletter-email" class="content-hidden">Newsletter Email</label>
                                    <input type="email" name="email" id="newsletter-email"
                                        class="form-control form-control-lg" placeholder="Your your email and hit enter"
                                        autocomplete="off">
                                </div>
                            </form>
                        </div>
                    </div><!-- Newsletter end -->
                </div><!-- Col end -->

            </div><!-- Content row end -->
        </div>
        <!--/ Container end -->
    </section>
    <!--/ subscribe end -->

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

                @forelse ($all_recents_projects as $projet)
                    
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="latest-post">
                        <div class="latest-post-media">
                            <a href="{{ route("detailProject",["id"=>$projet->id,"slug"=>Str::slug($projet->short_title_project)]) }}" class="latest-post-img">
                                <img loading="lazy" class="img-fluid"
                                    src="{{ asset('storage/assets/projects/'.$projet->photo_couverture) }}" alt="img">
                            </a>
                        </div>
                        <div class="post-body">
                            <h4 class="post-title">
                                <a href="{{ route("detailProject",["id"=>$projet->id,"slug"=>Str::slug($projet->short_title_project)]) }}" class="d-inline-block">{{ $projet->short_title_project }}</a>
                            </h4>
                            <div class="latest-post-meta">
                                <span class="post-item-date">
                                    <i class="fa fa-clock-o"></i> {{ date("F j, Y",strtotime($projet->date_debut_project)) }}
                                </span>
                            </div>
                        </div>
                    </div><!-- Latest post end -->
                </div><!-- 1st post col end -->

                @empty
                    
                @endforelse
              

              
            </div>
            <!--/ Content row end -->

            <div class="general-btn text-center mt-4">
                <a class="btn btn-primary" href="{{ route("allProjectsPage") }}">See All Projects</a>
            </div>

        </div>
        <!--/ Container end -->
    </section>
    <!--/ News end -->

    @include('partials.partenaires')

@endsection
