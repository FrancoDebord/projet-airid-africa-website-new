@extends('index')

@section('title', 'VESTERGAARD ITN Testing Project')


@section('content')
    <div id="banner-area" class="banner-area"
        style="background-image:url({{ asset('storage/assets_vendor/images/banner/banner1.jpg') }})">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title top_title">VESTERGAARD ITN Testing</h1>

                        </div>
                    </div><!-- Col end -->
                </div><!-- Row end -->
            </div><!-- Container end -->
        </div><!-- Banner text end -->
    </div><!-- Banner area end -->

    <section id="main-container" class="main-container">
        <div class="container">
            <div class="row">


                <div class="col-12">

                    <h4 class="text-bold border p-3 text-center text-danger">
                        VESTERGAARD ITN Testing
                    </h4>

                    <p class="text-justify p-3 text-center font-weight-bold" style="border: 1px dashed #c20102">Content of this page coming soon</p>
                </div>
            </div>
        </div>
    </section>

       @endsection