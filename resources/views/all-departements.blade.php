@extends('index')

@section('title', 'All Department --AIRID')


@section('content')
    <div id="banner-area" class="banner-area"
        style="background-image:url({{ asset('storage/assets_vendor/images/banner/banner1.jpg') }})">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title top_title">All Departements</h1>
                            {{-- <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">All Departments</a></li>
                                </ol>
                            </nav> --}}
                        </div>
                    </div><!-- Col end -->
                </div><!-- Row end -->
            </div><!-- Container end -->
        </div><!-- Banner text end -->
    </div><!-- Banner area end -->

    <section id="main-container" class="main-container pb-2">
        <div class="container">
            <div class="row">

                @forelse ($all_departements as $departement)
                    <div class="col-lg-4 col-md-6 mb-5  ">
                        <div class="ts-service-box ">
                            <div class="ts-service-image-wrapper">
                                <a
                                    href="{{ route('detailDepartementPage', ['id' => $departement->id, 'slug' => \Str::slug($departement->nom_departement)]) }}"><img
                                        loading="lazy" alt="img" class="img-fluid"
                                        src="{{ asset('storage/assets/departements/' . $departement->photo) }}"></a>

                            </div>
                            <div class="d-flex">
                               
                                <div class="ts-service-info">
                                    <h3 class="service-box-title">
                                        <a
                                            href="{{ route('detailDepartementPage', ['id' => $departement->id, 'slug' => \Str::slug($departement->nom_departement)]) }}">{{ $departement->nom_departement }}</a>
                                    </h3>
                                    <p>
                                    <p> {!! $departement->description_accueil !!}</p>
                                    </p>
                                    <a class="learn-more d-inline-block"
                                        href="{{ route('detailDepartementPage', ['id' => $departement->id, 'slug' => \Str::slug($departement->nom_departement)]) }}"
                                        aria-label="service-details"><i class="fa fa-caret-right"></i> Learn more</a>
                                </div>
                            </div>
                        </div><!-- Service1 end -->
                    </div><!-- Col 1 end -->
                @empty
                <div class="col-12">
                    <p class="alert alert-info text-center p-3">
                        <i class="fa fa-exclamation-circle">&nbsp;</i> No departments yet registered.
                    </p>
                </div>
                @endforelse


            </div>
        </div>
    </section>
@endsection
