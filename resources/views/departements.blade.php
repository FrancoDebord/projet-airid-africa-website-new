@extends('index')

@section('title', 'Department --Airid')


@section('content')
    <div id="banner-area" class="banner-area"
        style="background-image:url({{ asset('storage/assets/departements/' . $departement->photo) }})">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title">Department : {{ $departement->nom_departement }}</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">All services</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Detail Department</li>
                                </ol>
                            </nav>
                        </div>
                    </div><!-- Col end -->
                </div><!-- Row end -->
            </div><!-- Container end -->
        </div><!-- Banner text end -->
    </div>

    <section id="main-container" class="main-container">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 mb-5 mb-lg-0">

                    <div class="post-content post-single">
                        <div class="post-media post-image">
                            <img loading="lazy" src="{{ asset('storage/assets/departements/' . $departement->photo) }}"
                                class="img-fluid card-img-bottom" alt="post-image">
                        </div>

                        <div class="post-body">


                            <div class="entry-content">
                                <p> {!! $departement->description !!}</p>


                            </div>

                        </div><!-- post-body end -->
                    </div><!-- post content end -->


                </div><!-- Content Col end -->

                <div class="col-lg-4">

                    <div class="sidebar sidebar-right">
                        <div class="widget recent-posts">
                            <h3 class="widget-title">Others departments</h3>
                            <ul class="list-unstyled">

                                @forelse ($others_departements as $other_depart)
                                    <li class="d-flex align-items-center">
                                        <div class="posts-thumb">
                                            <a
                                                href="{{ route('detailDepartementPage', ['id' => $other_depart->id, 'slug' => \Str::slug($other_depart->nom_departement)]) }}"><img
                                                    loading="lazy" alt="img"
                                                    src="{{ asset('storage/assets/departements/' . $other_depart->photo) }}"></a>
                                        </div>
                                        <div class="post-info">
                                            <h4 class="entry-title">
                                                <a
                                                    href="{{ route('detailDepartementPage', ['id' => $other_depart->id, 'slug' => \Str::slug($other_depart->nom_departement)]) }}">{{ $other_depart->nom_departement }}</a>
                                            </h4>
                                        </div>
                                    </li><!-- 1st post end-->

                                @empty
                                @endforelse

                            </ul>

                            @php
                                $supervisor = $departement->chefDepartement;
                            @endphp

                            <div class="row">
                                <div class="col-12">
                                    <h6 class="section-sub-titled text-center">The Department Supervisor</h6>
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
            <h3>Sub departments affiliated</h3>
            <div class="row">

                @forelse ($departement->sub_departements??[] as $sous_departement)
                    <div class="col-lg-4 col-md-6 mb-5">
                        <div class="ts-service-box">
                            <div class="ts-service-image-wrapper">

                                <a href="{{ route('detailSubDepartement', ['id' => $sous_departement->id, 'slug' => \Str::slug($sous_departement->nom_sous_departement)]) }}">

                                    <img loading="lazy" class="w-100"
                                        src="{{ asset('storage/assets/sub_departements/' . $sous_departement->photo_sous_departement) }}"
                                        alt="service-image">
                                </a>
                            </div>
                            <div class="d-flex">
                                <div class="ts-service-box-img">
                                    {{-- <img loading="lazy"
                                        src="{{ asset('storage/assets/sub_departements/' . $sous_departement->photo_sous_departement) }}"
                                        alt="service-icon"> --}}
                                </div>
                                <div class="ts-service-info">
                                    <h3 class="service-box-title"><a
                                            href="{{ route('detailSubDepartement', ['id' => $sous_departement->id, 'slug' => \Str::slug($sous_departement->nom_sous_departement)]) }}">{{ $sous_departement->nom_sous_departement }}</a>
                                    </h3>
                                    <p>{!! Str::limit($sous_departement->description_sous_departement, 100) !!}</p>
                                    <a class="learn-more d-inline-block" href="#" aria-label="service-details"><i
                                            class="fa fa-caret-right"></i> Learn more</a>
                                </div>
                            </div>
                        </div><!-- Service1 end -->
                    </div><!-- Col 1 end -->
                @empty

                    <div class="col-12">
                        <p class="alert alert-info p-3 text-center">
                            <i class="fa fa-exclamation-circle">&nbsp;</i> No subdepartments affiliated to this department
                        </p>
                    </div>
                @endforelse


            </div>
        </div>
    </section>
@endsection
