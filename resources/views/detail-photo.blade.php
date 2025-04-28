@extends('index')

@section('title',"AIRID-- Detail Photo")

@section('content')
<div id="banner-area" class="banner-area"
style="background-image:url({{ asset('storage/assets_vendor/images/banner/banner1.jpg') }})">
<div class="banner-text">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-heading">
                    <h1 class="banner-title">Our Photo Gallery</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Our Photo Gallery</a></li>
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
        <div class="col-lg-8">
          <div id="page-slider" class="page-slider small-bg">

            @forelse ($all_photos as $photo)
            <div class="item">
                <img loading="lazy" class="img-fluid" src="{{ asset('storage/assets/gallery/' . $photo->nom_photo) }}" alt="project-image" />
              </div>
            @empty
                
            @endforelse
           
          </div><!-- Page slider end -->
        </div><!-- Slider col end -->
  
        <div class="col-lg-4 mt-5 mt-lg-0">
  
          <h3 class="column-title mrt-0">{{ $photo->titre_photo }}</h3>
          <p>{{ $photo->description }}</p>
  
          <ul class="project-info list-unstyled">
            <li>
              <p class="project-info-label">Category</p>
              <p class="project-info-content">{{ $photo->categorie_photo }}</p>
            </li>
            <li>
              <p class="project-info-label">Date of Event</p>
              <p class="project-info-content">{{ date('F j, Y', strtotime($photo->date_event)) }}</p>
            </li>
            {{-- <li>
              <p class="project-info-label">Location</p>
              <p class="project-info-content">McLean, VA</p>
            </li>
            <li>
              <p class="project-info-label">Size</p>
              <p class="project-info-content">65,000 SF</p>
            </li>
            <li>
              <p class="project-info-label">Year Completed</p>
              <p class="project-info-content">2015</p>
            </li>
            <li>
              <p class="project-info-label">Categories</p>
              <p class="project-info-content">Commercial, Interiors</p>
            </li>
            <li>
              <p class="project-link">
                <a class="btn btn-primary" target="_blank" href="#">View Project</a>
              </p>
            </li> --}}
          </ul>
  
        </div><!-- Content col end -->
  
      </div><!-- Row end -->
  
    </div><!-- Conatiner end -->
  </section><!-- Main container end -->

  @include('partials.partenaires')
@endsection