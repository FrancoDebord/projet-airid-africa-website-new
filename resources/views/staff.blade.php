@extends('index')

@section('title', 'Staff -- AIRID')


@section('content')
    <div id="banner-area" class="banner-area"
        style="background-image:url({{ asset('storage/assets_vendor/images/banner/banner1.jpg') }})">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title">Staff of AIRID</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Staff</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div><!-- Col end -->
                </div><!-- Row end -->
            </div><!-- Container end -->
        </div><!-- Banner text end -->
    </div><!-- Banner area end -->

    <section id="main-container" class="main-container pb-4">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-12">
                    <h3 class="section-sub-title">Our Leadership</h3>
                </div>
            </div>
            <!--/ Title row end -->

            <div class="row justify-content-center">
                @forelse ($executive_director as $leader)

                <div class="col-lg-3 col-sm-6 mb-5">
                    <div class="ts-team-wrapper">
                        <div class="team-img-wrapper">
                            <img loading="lazy" src="{{ asset('storage/assets/staff/' . $leader->photo_personnel) }}" class="img-fluid card-img-bottom" alt="team-img">
                        </div>
                        <div class="ts-team-content-classic">
                            <h3 class="ts-name">{{ $leader->titre . ' ' . $leader->prenom_personnel . ' ' . $leader->nom_personnel }}</h3>
                            <p class="ts-designation">{{ $leader->posteOccupe->intitule_poste }}</p>
                            <p class="ts-description">{{ Str::limit($leader->intro_personnel,100) }}
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
                @empty
                    
                @endforelse
              
            </div>

            <div class="row text-center">
                <div class="col-lg-12">
                    <h3 class="section-sub-title">Our Staff</h3>
                </div>

            </div>

            <div class="row justify-content-center">
                @forelse ($other_staffs as $staff)

                <div class="col-lg-3 col-sm-6 mb-5">
                    <div class="ts-team-wrapper">
                        <div class="team-img-wrapper">
                            <img loading="lazy" src="{{ asset('storage/assets/staff/' . $staff->photo_personnel) }}" class="img-fluid card-img-bottom " alt="team-img">
                        </div>
                        <div class="ts-team-content-classic">
                            <h3 class="ts-name">{{ $staff->titre . ' ' . $staff->prenom_personnel . ' ' . $staff->nom_personnel }}</h3>
                            <p class="ts-designation">{{ $staff->posteOccupe->intitule_poste }}</p>
                            <p class="ts-description">{{ Str::limit($staff->intro_personnel,100) }}
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
                @empty
                    
                @endforelse
              
            </div>

        </div>
    </section>


@endsection
