@extends('index')

@section('title', 'Sub Department --Airid')


@section('content')
    <div id="banner-area" class="banner-area"
        style="background-image:url({{ asset('storage/assets/sub_departements/' . $sub_departement->photo_sous_departement) }})">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title">Department : {{ $sub_departement->nom_sous_departement }}</h1>
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
                            <img loading="lazy"
                                src="{{ asset('storage/assets/sub_departements/' . $sub_departement->photo_sous_departement) }}"
                                class="img-fluid card-img-bottom" alt="post-image">
                        </div>

                        <div class="post-body">


                            <div class="entry-content">
                                <p> {!! $sub_departement->description_sous_departement !!}</p>


                            </div>

                        </div><!-- post-body end -->
                    </div><!-- post content end -->


                </div><!-- Content Col end -->

                <div class="col-lg-4">

                    <div class="sidebar sidebar-right">
                        <div class="widget recent-posts">
                            <h3 class="widget-title">Others Sub_departments</h3>
                            <ul class="list-unstyled">

                                @forelse ($others_sub_departements as $other_sous_departement)
                                    <li class="d-flex align-items-center">
                                        <div class="posts-thumb">
                                            <a
                                                href="{{ route('detailSubDepartement', ['id' => $other_sous_departement->id, 'slug' => \Str::slug($other_sous_departement->nom_sous_departement)]) }}"><img
                                                    loading="lazy" alt="img"
                                                    src="{{ asset('storage/assets/sub_departements/' . $other_sous_departement->photo_sous_departement) }}"></a>
                                        </div>
                                        <div class="post-info">
                                            <h4 class="entry-title">
                                                <a
                                                    href="{{ route('detailSubDepartement', ['id' => $other_sous_departement->id, 'slug' => \Str::slug($other_sous_departement->nom_sous_departement)]) }}">{{ $other_sous_departement->nom_sous_departement }}</a>
                                            </h4>
                                        </div>
                                    </li><!-- 1st post end-->

                                @empty
                                @endforelse

                            </ul>

                            @php
                                $supervisor = $sub_departement->chefSousDepartement;
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
                                        <a href="#"
                                            class="superviseur-unit">{{ $supervisor->titre . ' ' . $supervisor->prenom_personnel . ' ' . $supervisor->nom_personnel }}</a>
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

    </section>
@endsection
