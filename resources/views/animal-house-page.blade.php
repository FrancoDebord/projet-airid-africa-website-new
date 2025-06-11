@extends('index')

@section('title', 'AIRID --Our Animal House ')


@section('content')
    <div id="banner-area" class="banner-area"
        style="background-image:url({{ asset('storage/assets_vendor/images/banner/banner1.jpg') }})">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title">Our Animal House</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Our Animal House</a></li>
                                </ol>
                            </nav>
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
                    <h4 class="text-bold border p-3 text-center text-danger">Our Animal House</h4>

                    <p class="mt-3 text-justify">We raise various animals in our animal house, such as rabbits, guinea pigs, etc. </p>
                </div>




                <div class="mt-2 col-12 mb-3">
                    <strong>Few images of our animal house installations : </strong>
                </div>

                {{-- <div class="col-12 col-sm-6">
                    <img src="{{ asset('storage/assets/facility/animal-house/IMG_1387.jpg') }}" alt="Image Animal House"
                        class="img-fluid img-thumbnail" />
                    <p class="mt-2 bg-danger p-2 text-white text-center">
                        <strong>Animal House Entrance</strong>
                    </p>
                </div> --}}
                
                <div class="col-12 col-sm-6">
                    <img src="{{ asset('storage/assets/facility/animal-house/IMG_1404.jpg') }}" alt="Image Animal House"
                        class="img-fluid img-thumbnail" />
                    <p class="mt-2 bg-danger p-2 text-white text-center">
                        <strong>Animal House</strong> 
                     </p>
                </div>
                <div class="col-12 col-sm-6">
                    <img src="{{ asset('storage/assets/facility/animal-house/IMG_1399.jpg') }}" alt="Image Animal House"
                        class="img-fluid img-thumbnail" />
                    <p class="mt-2 bg-danger p-2 text-white text-center">
                        <strong>Animal House</strong> 
                    </p>
                </div>

                <div class="col-12 col-sm-6">
                    <img src="{{ asset('storage/assets/facility/animal-house/IMG_1523.jpg') }}" alt="Image Animal House"
                        class="img-fluid img-thumbnail" />
                    <p class="mt-2 bg-danger p-2 text-white text-center">
                        <strong>Animal House : Guinea Pigs</strong>
                    </p>
                </div>

                <div class="col-12 col-sm-6">
                    <img src="{{ asset('storage/assets/facility/animal-house/IMG_1548.jpg') }}" alt="Image Animal House"
                        class="img-fluid img-thumbnail" />
                    <p class="mt-2 bg-danger p-2 text-white text-center">
                        <strong>Animal House : Rabbits</strong>
                    </p>
                </div>

                <div class="col-12 col-sm-6">
                    <img src="{{ asset('storage/assets/facility/animal-house/IMG_1552.jpg') }}" alt="Image Animal House"
                        class="img-fluid img-thumbnail" />
                    <p class="mt-2 bg-danger p-2 text-white text-center">
                        <strong>Animal House : Rabbits</strong>
                    </p>
                </div>

                <div class="col-12 col-sm-6">
                    <img src="{{ asset('storage/assets/facility/animal-house/IMG_1557.jpg') }}" alt="Image Animal House"
                        class="img-fluid img-thumbnail" />
                    <p class="mt-2 bg-danger p-2 text-white text-center">
                        <strong>Animal House : Rabbits in cage</strong>
                    </p>
                </div>



            </div>
        </div>
    </section>


@endsection
