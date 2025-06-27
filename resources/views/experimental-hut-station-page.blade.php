@extends('index')

@section('title', 'AIRID --Experimental Huts Station')


@section('content')
    <div id="banner-area" class="banner-area"
        style="background-image:url({{ asset('storage/assets_vendor/images/banner/banner1.jpg') }})">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title top_title">Our Experimental Huts Station</h1>
                            {{-- <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Our Experimental Huts Station</a></li>
                                </ol>
                            </nav> --}}
                        </div>
                    </div><!-- Col end -->
                </div><!-- Row end -->
            </div><!-- Container end -->
        </div><!-- Banner text end -->
    </div><!-- Banner area end -->

    <section class="content">
        <div class="container">
            <div class="row">

                <div class="col-12 mt-2">
                    <h4 class="text-bold border p-3 text-center text-danger">Experimental Huts Station</h4>

                    <p class="mt-3 text-justify">A total of 84 experimental huts of the WHOPES West African design belonging
                        to the CREC/LSHTM Facility have been constructed at the experimental hut stations.</p>
                </div>



                <div class="col-12 col-sm-6 ">
                    <img src="{{ asset('storage/assets/facility/field-station/DJI_0152.jpg') }}" alt="Image Experimental Hut station"
                        class="img-fluid img-thumbnail">
                    <p class="mt-2 bg-danger p-2 text-white text-center">
                        <strong>Experimental Huts</strong>
                    </p>
                </div>

                <div class="col-12 col-sm-6 ">
                    <img src="{{ asset('storage/assets/facility/field-station/DJI_0160.jpg') }}" alt="Image  Experimental Hut station"
                        class="img-fluid img-thumbnail">
                    <p class="mt-2 bg-danger p-2 text-white text-center">
                        <strong>Experimental Huts</strong>
                    </p>
                </div>

                <div class="col-12 col-sm-6 ">
                    <img src="{{ asset('storage/assets/facility/field-station/DJI_0191.jpg') }}" alt="Image  Experimental Hut station"
                        class="img-fluid img-thumbnail">
                    <p class="mt-2 bg-danger p-2 text-white text-center">
                        <strong>Experimental Huts</strong>
                    </p>
                </div>
                <div class="col-12 col-sm-6 ">
                    <img src="{{ asset('storage/assets/facility/field-station/DJI_0170.jpg') }}" alt="Image  Experimental Hut station"
                        class="img-fluid img-thumbnail">
                    <p class="mt-2 bg-danger p-2 text-white text-center">
                        <strong>Experimental Huts</strong>
                    </p>
                </div>
                <div class="col-12 col-sm-6 ">
                    <img src="{{ asset('storage/assets/facility/field-station/DJI_0171.jpg') }}" alt="Image  Experimental Hut station"
                        class="img-fluid img-thumbnail">
                    <p class="mt-2 bg-danger p-2 text-white text-center">
                        <strong>Experimental Huts</strong>
                    </p>
                </div>
                <div class="col-12 col-sm-6 ">
                    <img src="{{ asset('storage/assets/facility/field-station/DJI_0173.jpg') }}" alt="Image  Experimental Hut station"
                        class="img-fluid img-thumbnail">
                    <p class="mt-2 bg-danger p-2 text-white text-center">
                        <strong>Experimental Huts</strong>
                    </p>
                </div>



            </div>
        </div>
    </section>




@endsection
