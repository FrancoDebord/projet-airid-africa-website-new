@extends('index')


@section('title', 'AIRID --Contact')


@section('content')
    <div id="banner-area" class="banner-area"
        style="background-image:url({{ asset('storage/assets_vendor/images/banner/banner2_new.png') }})">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title top_title">Contact</h1>
                            {{-- <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                                </ol>
                            </nav> --}}
                        </div>
                    </div><!-- Col end -->
                </div><!-- Row end -->
            </div><!-- Container end -->
        </div><!-- Banner text end -->
    </div><!-- Banner area end -->

    <section id="main-container" class="main-container">
        <div class="container">

            <div class="row text-center">
                <div class="col-12">
                    <h2 class="section-title">Reaching our Office</h2>
                    <h3 class="section-sub-title">Find Our Location</h3>
                </div>
            </div>
            <!--/ Title row end -->

            <div class="row">
                <div class="col-md-4">
                    <div class="ts-service-box-bg text-center h-100">
                        <span class="ts-service-icon icon-round">
                            <i class="fas fa-map-marker-alt mr-0"></i>
                        </span>
                        <div class="ts-service-box-content">
                            <h4>Visit Our Office</h4>
                            <p>Akpakpa Donaten, Cotonou, Benin Republic</p>
                        </div>
                    </div>
                </div><!-- Col 1 end -->

                <div class="col-md-4">
                    <div class="ts-service-box-bg text-center h-100">
                        <span class="ts-service-icon icon-round">
                            <i class="fa fa-envelope mr-0"></i>
                        </span>
                        <div class="ts-service-box-content">
                            <h4>Email Us</h4>
                            <p>
                                <a href="mailto:admin@airid-africa.com" class=""> info@airid-africa.com </a>
                            </p>
                        </div>
                    </div>
                </div><!-- Col 2 end -->

                <div class="col-md-4">
                    <div class="ts-service-box-bg text-center h-100">
                        <span class="ts-service-icon icon-round">
                            <i class="fa fa-phone-square mr-0"></i>
                        </span>
                        <div class="ts-service-box-content">
                            <h4>Call Us</h4>
                            <p>(+229) 01 67 16 44 99/ 01 95 03 33 33</p>
                        </div>
                    </div>
                </div><!-- Col 3 end -->

            </div><!-- 1st row end -->

            <div class="gap-60"></div>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3965.2521939531684!2d2.466331!3d6.361396999999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNsKwMjEnNDEuMCJOIDLCsDI3JzU4LjgiRQ!5e0!3m2!1sfr!2sbj!4v1749480672092!5m2!1sfr!2sbj"
                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>



            <div class="gap-40"></div>

            <div class="row" id="zone_contact">

                @session('message')
                    <div class="col-12 mt-3 mb-3">
                        <p class="alert alert-success text-center">{{ session()->get('message'); }}</p>
                    </div>
                @endsession
                <div class="col-md-12">
                    <h3 class="column-title">Get in touch</h3>
                    <form id="contact-form" action="{{ route('postContactMessage') }}" method="post" role="form">

                        @csrf
                        <div class="error-container"></div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input
                                        class="form-control form-control-name @error('full_name') is-invalid @enderror"
                                        name="full_name" id="name" placeholder="" type="text" >

                                    @error('full_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input
                                        class="form-control form-control-email @error('adresse_mail') is-invalid @enderror"
                                        name="adresse_mail" id="email" placeholder="" type="email" >

                                    @error('adresse_mail')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Subject</label>
                                    <input
                                        class="form-control form-control-subject @error('subject') is-invalid @enderror"
                                        name="subject" id="subject" placeholder="" >
                                    @error('subject')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Message</label>
                            <textarea class="form-control form-control-message @error('detailed_message') is-invalid @enderror"
                                name="detailed_message" id="message" placeholder="" rows="10" ></textarea>

                            @error('detailed_message')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="text-right"><br>
                            <button class="btn btn-primary solid blank" type="submit">Send Message</button>
                        </div>
                    </form>
                </div>

            </div><!-- Content row -->
        </div><!-- Conatiner end -->
    </section><!-- Main container end -->

@endsection
