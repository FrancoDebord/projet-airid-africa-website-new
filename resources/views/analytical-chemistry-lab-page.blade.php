@extends('index')

@section('title', 'AIRID --Analytical and Chemistry Labs')


@section('content')
    <div id="banner-area" class="banner-area"
        style="background-image:url({{ asset('storage/assets_vendor/images/banner/banner1.jpg') }})">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title">Our Analytical and Chemistry Lab</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Our Analytical and Chemistry Lab</a></li>
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
                    <h4 class="text-bold border p-3 text-center text-danger">Our Analytical and Chemistry Lab</h4>

                    <p class="mt-3 text-justify"> Our analytical and chemistry laboratory is well-equipped to perform
                        chemical analysis and testing to determine the composition, structure, and properties of substances.
                    </p>
                </div>

                <div class="col-12 ">


                    <h5 class="text-bold border p-3 text-center text-danger ">
                        Coming Soon
                    </h5>
                </div>



            </div>
        </div>
    </section>


@endsection
