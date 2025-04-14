@extends('index')


@section('content')

@include('partials.carroussel')

    @include('partials.small_about')

    @include('partials.count')

   @include('partials.specialities')
   @include('partials.projets')

 

    {{-- <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h3 class="column-title">Testimonials</h3>

                    <div id="testimonial-slide" class="testimonial-slide">
                        <div class="item">
                            <div class="quote-item">
                                <span class="quote-text">
                                    Question ran over her cheek When she reached the first hills of the Italic
                                    Mountains, she had a last
                                    view back on the skyline of her hometown Bookmarksgrove, the headline of
                                    Alphabet Village and the
                                    subline of her own road.
                                </span>

                                <div class="quote-item-footer">
                                    <img loading="lazy" class="testimonial-thumb"
                                        src="{{ asset('storage/assets_vendor/images/clients/testimonial1.png') }}"
                                        alt="testimonial">
                                    <div class="quote-item-info">
                                        <h3 class="quote-author">Gabriel Denis</h3>
                                        <span class="quote-subtext">Chairman, OKT</span>
                                    </div>
                                </div>
                            </div><!-- Quote item end -->
                        </div>
                        <!--/ Item 1 end -->

                        <div class="item">
                            <div class="quote-item">
                                <span class="quote-text">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    inci done idunt ut
                                    labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitoa
                                    tion ullamco laboris
                                    nisi aliquip consequat.
                                </span>

                                <div class="quote-item-footer">
                                    <img loading="lazy" class="testimonial-thumb"
                                        src="{{ asset('storage/assets_vendor/images/clients/testimonial2.png') }}"
                                        alt="testimonial">
                                    <div class="quote-item-info">
                                        <h3 class="quote-author">Weldon Cash</h3>
                                        <span class="quote-subtext">CFO, First Choice</span>
                                    </div>
                                </div>
                            </div><!-- Quote item end -->
                        </div>
                        <!--/ Item 2 end -->

                        <div class="item">
                            <div class="quote-item">
                                <span class="quote-text">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    inci done idunt ut
                                    labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitoa
                                    tion ullamco laboris
                                    nisi ut commodo consequat.
                                </span>

                                <div class="quote-item-footer">
                                    <img loading="lazy" class="testimonial-thumb"
                                        src="{{ asset('storage/assets_vendor/images/clients/testimonial3.png') }}"
                                        alt="testimonial">
                                    <div class="quote-item-info">
                                        <h3 class="quote-author">Minter Puchan</h3>
                                        <span class="quote-subtext">Director, AKT</span>
                                    </div>
                                </div>
                            </div><!-- Quote item end -->
                        </div>
                        <!--/ Item 3 end -->

                    </div>
                    <!--/ Testimonial carousel end-->
                </div><!-- Col end -->

                <div class="col-lg-6 mt-5 mt-lg-0">

                    <h3 class="column-title">Happy Clients</h3>

                    <div class="row all-clients">
                        <div class="col-sm-4 col-6">
                            <figure class="clients-logo">
                                <a href="#!"><img loading="lazy" class="img-fluid"
                                        src="{{ asset('storage/assets_vendor/images/clients/client1.png') }}"
                                        alt="clients-logo" /></a>
                            </figure>
                        </div><!-- Client 1 end -->

                        <div class="col-sm-4 col-6">
                            <figure class="clients-logo">
                                <a href="#!"><img loading="lazy" class="img-fluid"
                                        src="{{ asset('storage/assets_vendor/images/clients/client2.png') }}"
                                        alt="clients-logo" /></a>
                            </figure>
                        </div><!-- Client 2 end -->

                        <div class="col-sm-4 col-6">
                            <figure class="clients-logo">
                                <a href="#!"><img loading="lazy" class="img-fluid"
                                        src="{{ asset('storage/assets_vendor/images/clients/client3.png') }}"
                                        alt="clients-logo" /></a>
                            </figure>
                        </div><!-- Client 3 end -->

                        <div class="col-sm-4 col-6">
                            <figure class="clients-logo">
                                <a href="#!"><img loading="lazy" class="img-fluid"
                                        src="{{ asset('storage/assets_vendor/images/clients/client4.png') }}"
                                        alt="clients-logo" /></a>
                            </figure>
                        </div><!-- Client 4 end -->

                        <div class="col-sm-4 col-6">
                            <figure class="clients-logo">
                                <a href="#!"><img loading="lazy" class="img-fluid"
                                        src="{{ asset('storage/assets_vendor/images/clients/client5.png') }}"
                                        alt="clients-logo" /></a>
                            </figure>
                        </div><!-- Client 5 end -->

                        <div class="col-sm-4 col-6">
                            <figure class="clients-logo">
                                <a href="#!"><img loading="lazy" class="img-fluid"
                                        src="{{ asset('storage/assets_vendor/images/clients/client6.png') }}"
                                        alt="clients-logo" /></a>
                            </figure>
                        </div><!-- Client 6 end -->

                    </div><!-- Clients row end -->

                </div><!-- Col end -->

            </div>
            <!--/ Content row end -->
        </div>
        <!--/ Container end -->
    </section><!-- Content end --> --}}

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
                <a class="btn btn-primary" href="news-left-sidebar.html">See All Projects</a>
            </div>

        </div>
        <!--/ Container end -->
    </section>
    <!--/ News end -->

    @include('partials.partenaires')

@endsection
