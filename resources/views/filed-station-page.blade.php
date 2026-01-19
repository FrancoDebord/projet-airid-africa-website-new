@extends('index')

@section('title', 'AIRID --Field Station')

@section('css')
    <style>
        .fade-in-up {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }

        .fade-in-up.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .content-section {
            background: #fff;
            padding: 2.5rem;
            border-radius: 15px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.08);
            margin-bottom: 2rem;
            border-left: 5px solid #c20102;
        }

        .section-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 1.5rem;
            padding-bottom: 0.75rem;
            border-bottom: 3px solid #c20102;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .section-title i {
            color: #c20102;
        }

        .section-subtitle {
            font-size: 1.4rem;
            font-weight: 700;
            color: #2c3e50;
            margin-top: 2rem;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .section-subtitle::before {
            content: '';
            width: 4px;
            height: 30px;
            background: #c20102;
            border-radius: 2px;
        }

        .section-content {
            line-height: 1.9;
            color: #555;
            font-size: 1.05rem;
        }

        .section-content p {
            margin-bottom: 1.5rem;
            text-align: justify;
        }

        .image-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }

        .gallery-item {
            position: relative;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 25px rgba(0,0,0,0.08);
            transition: all 0.4s ease;
        }

        .gallery-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }

        .gallery-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .gallery-item:hover .gallery-image {
            transform: scale(1.1);
        }

        .gallery-caption {
            padding: 1rem;
            background: #fff;
            text-align: center;
        }

        .gallery-caption strong {
            color: #2c3e50;
            font-weight: 600;
        }

        @media (max-width: 768px) {
            .content-section {
                padding: 1.5rem;
            }

            .image-gallery {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endsection

@section('content')
    <!-- Hero Section -->
    <div id="banner-area" class="banner-area"
        style="background-image:url({{ asset('storage/assets_vendor/images/banner/banner2_new.png') }})">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title top_title fade-in-up">Our Field Station</h1>
                            <p class="text-white mt-3 fade-in-up" style="font-size: 1.2rem;">
                                Phase 2 semi-field studies facility
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section Contenu -->
    <section class="py-5">
        <div class="container">
            <div class="content-section fade-in-up">
                <h2 class="section-title">
                    <i class="fas fa-map-marker-alt"></i>Field Station
                </h2>
                <div class="section-content">
                    <p>
                        Our Field Station is the main location where Phase 2 semi-field studies are performed. 
                        It is situated in Cove, Benin about 160km from Cotonou where the Main Facility and Insectary 
                        are located. It consists of a field laboratory and 2 experimental hut stations set in a huge 
                        rice growing area proving large numbers free-flying mosquitoes.
                    </p>
                    <p>
                        Our Field station is a well-equipped laboratory where mosquitoes from hut trials are processed 
                        and test substances and mosquitoes used in the experimental hut studies are temporarily stored.
                    </p>
                </div>
            </div>

            <div class="content-section fade-in-up">
                <h3 style="font-size: 1.3rem; font-weight: 700; color: #2c3e50; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
                    <i class="fas fa-images" style="color: #c20102;"></i>Gallery
                </h3>
                <div class="image-gallery">
                    <div class="gallery-item">
                        <img src="{{ asset('storage/assets/facility/field-station/DJI_0152.jpg') }}" 
                             alt="Experimental Huts" 
                             class="gallery-image"
                             loading="lazy">
                        <div class="gallery-caption">
                            <strong>Experimental Huts</strong>
                        </div>
                    </div>
                    <div class="gallery-item">
                        <img src="{{ asset('storage/assets/facility/field-station/DJI_0160.jpg') }}" 
                             alt="Experimental Huts" 
                             class="gallery-image"
                             loading="lazy">
                        <div class="gallery-caption">
                            <strong>Experimental Huts</strong>
                        </div>
                    </div>
                    <div class="gallery-item">
                        <img src="{{ asset('storage/assets/facility/field-station/DJI_0191.jpg') }}" 
                             alt="Experimental Huts" 
                             class="gallery-image"
                             loading="lazy">
                        <div class="gallery-caption">
                            <strong>Experimental Huts</strong>
                        </div>
                    </div>
                    <div class="gallery-item">
                        <img src="{{ asset('storage/assets/facility/field-station/DJI_0172.jpg') }}" 
                             alt="Experimental Huts" 
                             class="gallery-image"
                             loading="lazy">
                        <div class="gallery-caption">
                            <strong>Experimental Huts</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            const animatedElements = document.querySelectorAll('.fade-in-up');
            animatedElements.forEach(el => {
                observer.observe(el);
            });
        });
    </script>
@endsection
