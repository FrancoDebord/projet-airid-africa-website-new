@extends('index')

@section('title',"AIRID --Molecular Labs")


@section('content')
<div id="banner-area" class="banner-area"
style="background-image:url({{ asset('storage/assets_vendor/images/banner/banner1.jpg') }})">
<div class="banner-text">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-heading">
                    <h1 class="banner-title top_title">Our Molecular Lab</h1>
                    {{-- <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Our Molecular Lab</a></li>
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
            <h4 class="text-bold border p-3 text-center text-danger">Molecular Lab</h4>

            <p class="mt-3 text-justify">We have a well-equipped bioassay labs where we perform different tests to evaluate the effectiveness of all kind of vector control products.</p>
        </div>

        <div class="col-12 mt-3">

            <p class="mt-2 bg-danger p-2 text-white text-center">Here are the tests we perform in our Molecular Lab : </p>

            <ul class="m-3">
                <li>
                    <strong> KDR</strong>
                </li>
                <li>
                    <strong> ELISA blood meal analysis</strong>
                </li>
                <li>
                    <strong> Biochemistry</strong>
                </li>
                <li>
                    <strong> PCR</strong>
                </li>
                <li>
                    <strong> qPCR</strong>
                </li>
            </ul>
        </div>

        <div class="mt-2 col-12 mb-3">
            <strong>Few images of our installations : </strong>
        </div>

        <div class="col-12 col-sm-6 ">
            <img src="{{ asset("storage/assets/facility/molecular-lab/IMG_1320.jpg") }}" alt="Image Molecular Lab" class="img-fluid img-thumbnail"/>

            <p class="mt-2 bg-danger p-2 text-white text-center">
                <strong>Molecular Lab Entrance</strong>
            </p>
        </div>

        <div class="col-12 col-sm-6 ">
            <img src="{{ asset("storage/assets/facility/molecular-lab/IMG_1307.jpg") }}" alt="Image Molecular Lab" class="img-fluid img-thumbnail">
            <p class="mt-2 bg-danger p-2 text-white text-center">
                <strong>Molecular Lab QuantStudio</strong>
            </p>
        </div>
        <div class="col-12 col-sm-6 ">
            <img src="{{ asset("storage/assets/facility/molecular-lab/IMG_1314.jpg") }}" alt="Image Molecular Lab" class="img-fluid img-thumbnail">
            <p class="mt-2 bg-danger p-2 text-white text-center">
                <strong>Molecular Lab Installations</strong>
            </p>
        </div>
        <div class="col-12 col-sm-6 ">
            <img src="{{ asset("storage/assets/facility/molecular-lab/IMG_1301.jpg") }}" alt="Image Molecular Lab" class="img-fluid img-thumbnail">
            <p class="mt-2 bg-danger p-2 text-white text-center">
                <strong>Molecular Lab Installations</strong>
            </p>
        </div>
        <div class="col-12 col-sm-6 ">
            <img src="{{ asset("storage/assets/facility/molecular-lab/IMG_1300.jpg") }}" alt="Image Molecular Lab" class="img-fluid img-thumbnail">
            <p class="mt-2 bg-danger p-2 text-white text-center">
                <strong>Molecular Lab Installations</strong>
            </p>
        </div>
        <div class="col-12 col-sm-6 ">
            <img src="{{ asset("storage/assets/facility/molecular-lab/IMG_1303.jpg") }}" alt="Image Molecular Lab" class="img-fluid img-thumbnail">
            <p class="mt-2 bg-danger p-2 text-white text-center">
                <strong>Molecular Lab Installations</strong>
            </p>
        </div>



      </div>
    </div>
</section>


@endsection