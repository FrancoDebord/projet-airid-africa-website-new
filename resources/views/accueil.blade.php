@extends('index')


@section('css')
    <style>
        /* Style the video: 100% width and height to cover the entire window */
        #myVideo {
            position: relative;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
        }

        /* Add some content at the bottom of the video/page */
        .content {
            position: relative;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            color: #f1f1f1;
            width: 100%;
            padding: 20px;
        }

        /* Style the button used to pause/play the video */
        #myBtn {
            width: 200px;
            font-size: 18px;
            padding: 10px;
            border: none;
            /* background: #000; */
            color: #fff;
            cursor: pointer;
        }

        #myBtn:hover {
            background: #ddd;
            /* color: black; */
        }
    </style>
@endsection

@section('js')
    <script>
        // Get the video
        var video = document.getElementById("myVideo");

        video.playbackRate = 0.5;

        // Get the button
        var btn = document.getElementById("myBtn");

        // Pause and play the video, and change the button text
        function myFunction() {
            if (video.paused) {
                video.play();
                btn.innerHTML = "Pause";
            } else {
                video.pause();
                btn.innerHTML = "Play";
            }
        }
    </script>
@endsection

@section('content')
    @include('partials.carroussel')

    @include('partials.small_about')

    @include('partials.count')

    @include('partials.specialities')
    {{-- @include('partials.projets') --}}


    @if (session('message'))
        <div class="row mt-2 justify-content-center mb-2 " id="newsletter-section-message">
            <div class="col-6 ">

                <p class="  alert alert-success text-center">
                    <strong>
                        {{ session('message') }}
                    </strong>
                </p>
            </div>
        </div>
    @endif
    <section class="subscribe no-padding" id="newsletter-section">
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
    <form action="{{ route('subscribeNewsLetter') }}" method="POST" class="d-flex flex-column">
        @csrf
        <input type="hidden" name="fill_robot">

        <div class="form-group mb-3">
            <input 
                type="email" 
                name="email_newsletter" 
                id="newsletter-email" 
                class="form-control form-control-lg"
                placeholder="Entrez votre adresse e-mail"
                style="background-color: white;"
                required
            >
        </div>

        <button type="submit" class="btn btn-primary px-4 py-2">
            S’abonner
        </button>
    </form>
</div>

                    </div><!-- Newsletter end -->
                </div><!-- Col end -->

            </div><!-- Content row end -->
        </div>
        <!--/ Container end -->
    </section>
    <!--/ subscribe end -->

  <section id="news" class="news py-5 bg-light">
    <div class="container">
        <!-- Titre -->
        <div class="row text-center mb-5">
            <div class="col-12">
                <h2 class="section-title fw-bold">Work of Excellence</h2>
                <h3 class="section-sub-title text-muted fw-bold">Recent Projects</h3>
            </div>
        </div>

        <!-- Liste des projets -->
        <div class="row g-4">
            @forelse ($all_recents_projects->sortByDesc('date_debut_project') as $projet)
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="project-card position-relative overflow-hidden rounded shadow-sm">
                        <a href="{{ route('detailProject', ['id' => $projet->id, 'slug' => Str::slug($projet->short_title_project)]) }}">
                            <img 
                                loading="lazy"
                                src="{{ asset('storage/assets/projects/' . $projet->photo_couverture) }}"
                                alt="{{ $projet->short_title_project }}"
                                class="project-img w-100"
                            >
                            <div class="project-overlay d-flex flex-column justify-content-end">
                                <div class="text-white p-3" style="background: rgba(242, 154, 154, 0.5);">
                                    <h5 class="fw-bold mb-1" style="color: rgb(10, 226, 46))" >{{ $projet->short_title_project }}</h5>
                                    <small class="fw-bold d-block">
                                        <i class="fa fa-clock-o"></i>
                                        {{ $projet->date_debut_project ? date('F j, Y', strtotime($projet->date_debut_project)) : 'Not Yet Started' }}
                                    </small>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @empty
                <p class="text-center text-muted fw-bold">Aucun projet récent pour le moment.</p>
            @endforelse
        </div>

        <!-- Bouton -->
        <div class="text-center mt-5">
            <a class="btn btn-primary px-4 py-2 fw-bold" href="{{ route('allProjectsPage') }}">
                Voir tous les projets
            </a>
        </div>
    </div>
</section>

<style>
    .project-card {
    height: 300px;
    border-radius: 12px;
    overflow: hidden;
    position: relative;
    transition: transform 0.3s ease;
}

.project-card:hover {
    transform: translateY(-5px);
}

.project-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.project-card:hover .project-img {
    transform: scale(1.1);
}

.project-overlay {
    position: absolute;
    inset: 0;
    transition: opacity 0.4s ease;
}

.project-card:hover .project-overlay {
    opacity: 1;
}

.project-overlay .text-white {
    color: #fff;
    /* text-shadow: 0 2px 5px rgba(243, 34, 34, 0.6); */
}

.section-title, 
.section-sub-title,
.project-overlay h5,
.project-overlay small,
.btn {
    font-weight: bold !important;
}

@media (max-width: 992px) {
    .project-card {
        height: 260px;
    }
}

@media (max-width: 768px) {
    .project-card {
        height: 220px;
    }
}

/* @media (max-width: 576px) {
    .col-sm-6 {
        flex: 0 0 50%;
        max-width: 50%;
    }
} */

</style>


    @include('partials.partenaires')
@endsection
