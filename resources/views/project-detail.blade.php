@extends('index')

@section('title', 'AIRID --Detail Project')



@section('content')
    <div id="banner-area" class="banner-area"
        style="background-image:url({{ asset('storage/assets_vendor/images/banner/banner1.jpg') }})">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title">Detail of Project </h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route("allProjectsPage") }}">All Projects</a></li>
                                    <li class="breadcrumb-item"><a href="#">Detail Project</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div><!-- Col end -->
                </div><!-- Row end -->
            </div><!-- Container end -->
        </div><!-- Banner text end -->
    </div><!-- Banner area end -->

    <section id="main-container" class="main-container">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 mb-5 mb-lg-0">

                    <div class="post-content post-single">
                        <div class="post-media post-image">
                            <img loading="lazy" src="{{ asset('storage/assets/projects/' . $projet->photo_couverture) }}"
                                class="img-fluid card-img-bottom" alt="post-image">
                        </div>

                        <div class="post-body">

                            <div class="entry-header">
                                <div class="post-meta">
                                  <span class="post-author">
                                    <i class="far fa-user"></i><a href="#"> AIRID</a>
                                  </span>
                                  <span class="post-cat">
                                    <i class="far fa-folder-open"></i><a href="#"> Project</a>
                                  </span>
                                  <span class="post-meta-date"><i class="far fa-calendar"></i> {{ date("F j, Y",strtotime( $projet->date_debut_project)) }}</span>
                                  {{-- <span class="post-comment"><i class="far fa-comment"></i> 03<a href="#"
                                      class="comments-link">Comments</a></span> --}}
                                </div>
                                <h2 class="entry-title">
                                    {{ $projet->long_title_project }}
                                </h2>
                              </div><!-- header end -->
                  

                            <div class="entry-content">
                                <p> {!! $projet->description_riche !!}</p>


                            </div>

                        </div><!-- post-body end -->
                    </div><!-- post content end -->


                </div><!-- Content Col end -->

                <div class="col-lg-4">

                    <div class="sidebar sidebar-right">
                        <div class="widget recent-posts">
                            <h3 class="widget-title">Others Projects</h3>
                            <ul class="list-unstyled">

                                @forelse ($others_projects as $other_projet)
                                    <li class="d-flex align-items-center">
                                        <div class="posts-thumb">
                                            <a
                                                href="{{ route('detailProject', ['id' => $other_projet->id, 'slug' => \Str::slug($other_projet->short_title_project)]) }}"><img
                                                    loading="lazy" alt="img"
                                                    src="{{ asset('storage/assets/projects/' . $other_projet->photo_couverture) }}"></a>
                                        </div>
                                        <div class="post-info">
                                            <h4 class="entry-title">
                                                <a
                                                    href="{{ route('detailProject', ['id' => $other_projet->id, 'slug' => \Str::slug($other_projet->short_title_project)]) }}">{{ $other_projet->short_title_project }}</a>
                                            </h4>
                                        </div>
                                    </li><!-- 1st post end-->

                                @empty
                                @endforelse

                            </ul>

                            @php
                                $supervisor = $projet->studyDirector;
                            @endphp

                            <div class="row">
                                <div class="col-12">
                                    <h6 class="section-sub-titled text-center">The Study Director</h6>
                                </div>
                                <div class="col-12 text-center">
                                    <img loading="lazy"
                                        src="{{ asset('storage/assets/staff/' . $supervisor->photo_personnel) }}"
                                        class="img-fluid card-img-top" alt="team-img">
                                </div>
                                <div class="ts-team-content-classic col-12 text-center">
                                    <h3 class="ts-name mt-3">
                                        <a href="#" class="superviseur-unit">{{ $supervisor->titre . ' ' . $supervisor->prenom_personnel . ' ' . $supervisor->nom_personnel }}</a>
                                    </h3>
                                    <p class="ts-designation">{{ $supervisor->posteOccupe->intitule_poste }}</p>

                                    </p>
                                    <div class="team-social-icons">
                                        <a target="_blank" href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a target="_blank" href="#"><i class="fab fa-twitter"></i></a>
                                        <a target="_blank" href="#"><i class="fab fa-linkedin"></i></a>
                                    </div>
                                    <!--/ social-icons-->
                                </div>
                            </div>
                            <!--/ Team wrapper 1 end -->

                        </div><!-- Col end -->


                    </div>

                </div><!-- Recent post end -->


            </div><!-- Sidebar end -->
        </div><!-- Sidebar Col end -->

        </div><!-- Main row end -->

        </div><!-- Conatiner end -->

        <div class="container">
            <h3>Key Personnel associated</h3>
            <div class="row">

                @forelse ($projet->personnelsTeam??[] as $personnelsTeam)
                    <div class="col-lg-4 col-md-6 mb-5">
                        <div class="ts-service-box">
                            <div class="ts-service-image-wrapper">
                                
                                    <img loading="lazy" class="w-100"
                                        src="{{ asset('storage/assets/staff/' . $personnelsTeam->photo_personnel) }}"
                                        alt="service-image">
                                
                            </div>
                            <div class="d-flex">
                                <div class="ts-service-box-img">
                                   
                                </div>
                                <div class="ts-service-info">
                                    <h3 class="service-box-title">{{ $personnelsTeam->titre." ".$personnelsTeam->prenom_personnel." ".$personnelsTeam->nom_personnel }}
                                    </h3>
                                    <p>{{ $personnelsTeam->posteOccupe->intitule_poste }}</p>
                                  
                                </div>
                            </div>
                        </div><!-- Service1 end -->
                    </div><!-- Col 1 end -->
                @empty

                    <div class="col-12">
                        <p class="alert alert-info p-3 text-center">
                            <i class="fa fa-exclamation-circle">&nbsp;</i> No staffs affiliated to this study
                        </p>
                    </div>
                @endforelse


            </div>
        </div>
    </section>
@endsection
