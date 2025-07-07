@extends('index')

@section('title', 'AIRID --Field Station')


@section('content')
    <div id="banner-area" class="banner-area"
        style="background-image:url({{ asset('storage/assets_vendor/images/banner/banner1.jpg') }})">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title top_title">Our Field Station</h1>
                          
                        </div>
                    </div><!-- Col end -->
                </div><!-- Row end -->
            </div><!-- Container end -->
        </div><!-- Banner text end -->
    </div><!-- Banner area end -->

    <section class="content main-container">
        <div class="container">
            <div class="row">

                <div class="col-12 mt-2">
                    <h4 class="text-bold border p-3 text-center text-danger">Field Station</h4>

                    <p class="mt-3 text-justify"> Our Field Station is This is the main location where Phase 2 semi-field
                        studies are performed. It is situated in Cove, Benin about 160km from Cotonou where the Main
                        Facility and Insectary are located. It consists of a field laboratory and 2 experimental hut
                        stations set in a huge rice growing area proving large numbers free-flying mosquitoes.</p>
                </div>

               
                <div class="col-12 col-sm-6 ">
                    <img src="{{ asset('storage/assets/facility/field-station/DJI_0152.jpg') }}" alt="Image Field station"
                        class="img-fluid img-thumbnail">
                    <p class="mt-2 bg-danger p-2 text-white text-center">
                        <strong>Experimental Huts</strong>
                    </p>
                </div>

                <div class="col-12 col-sm-6 ">
                    <img src="{{ asset('storage/assets/facility/field-station/DJI_0160.jpg') }}" alt="Image Field station"
                        class="img-fluid img-thumbnail">
                    <p class="mt-2 bg-danger p-2 text-white text-center">
                        <strong>Experimental Huts</strong>
                    </p>
                </div>

                <div class="col-12 col-sm-6 ">
                    <img src="{{ asset('storage/assets/facility/field-station/DJI_0191.jpg') }}" alt="Image Field station"
                        class="img-fluid img-thumbnail">
                    <p class="mt-2 bg-danger p-2 text-white text-center">
                        <strong>Experimental Huts</strong>
                    </p>
                </div>
                <div class="col-12 col-sm-6 ">
                    <img src="{{ asset('storage/assets/facility/field-station/DJI_0172.jpg') }}" alt="Image Field station"
                        class="img-fluid img-thumbnail">
                    <p class="mt-2 bg-danger p-2 text-white text-center">
                        <strong>Experimental Huts</strong>
                    </p>
                </div>


                <div class="col-12 mt-2">

                    <p class="mt-3 text-justify"> Our Field station is a well-equipped laboratory where mosquitoes from hut
                        trials are processed and test substances and mosquitoes used in the experimental hut studies are
                        temporarily stored.</p>
                </div>




            </div>
        </div>
    </section>

@endsection
