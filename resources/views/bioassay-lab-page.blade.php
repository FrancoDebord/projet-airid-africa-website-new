@extends('index')

@section('title',"AIRID --Bioassay Labs")


@section('content')
<div id="banner-area" class="banner-area"
style="background-image:url({{ asset('storage/assets_vendor/images/banner/banner1.jpg') }})">
<div class="banner-text">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-heading">
                    <h1 class="banner-title top_title">Our Bioassay Labs</h1>
                    {{-- <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Our Bioassay Labs</a></li>
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
            <h4 class="text-bold border p-3 text-center text-danger">Bioassay Lab </h4>

            <p class="mt-3 text-justify">We have a well-equipped bioassay labs where we perform different tests to evaluate the effectiveness of all kind of vector control products.</p>
        </div>

        <div class="col-12 col-sm-6">
            {{-- <img src="{{ asset("storage/assets/facility/bioassay-lab/IMG_1569.jpg") }}" alt="Image Bio Assay Lab" class="img-fluid img-thumbnail"/> --}}
            <img src="{{ asset("storage/assets/facility/bioassay-lab/lab_nadia.jpg") }}" alt="Image Bio Assay Lab" class="img-fluid img-thumbnail"/>

            <p class="mt-2 bg-danger p-2 text-white text-center">
                <strong>Lab Photo</strong>
            </p>
        </div>
        <div class="col-12 col-sm-6 ">
            {{-- <img src="{{ asset("storage/assets/facility/bioassay-lab/IMG_1571.jpg") }}" alt="Image Bio Assay Lab" class="img-fluid img-thumbnail"> --}}
            <img src="{{ asset("storage/assets/facility/bioassay-lab/lab1.jpg") }}" alt="Image Bio Assay Lab" class="img-fluid img-thumbnail">
            <p class="mt-2 bg-danger p-2 text-white text-center">
                <strong>Lab Photo</strong>
            </p>
        </div>
        <div class="col-12 col-sm-6 ">
            {{-- <img src="{{ asset("storage/assets/facility/bioassay-lab/IMG_1467.jpg") }}" alt="Image Bio Assay Lab" class="img-fluid img-thumbnail"> --}}
            <img src="{{ asset("storage/assets/facility/bioassay-lab/lab2.jpg") }}" alt="Image Bio Assay Lab" class="img-fluid img-thumbnail">
            <p class="mt-2 bg-danger p-2 text-white text-center">
                <strong>Lab Photo</strong>
            </p>
        </div>
        <div class="col-12 col-sm-6 ">
            <img src="{{ asset("storage/assets/facility/bioassay-lab/lab3.jpg") }}" alt="Image Bio Assay Lab" class="img-fluid img-thumbnail">
            {{-- <img src="{{ asset("storage/assets/facility/bioassay-lab/IMG_1476.jpg") }}" alt="Image Bio Assay Lab" class="img-fluid img-thumbnail"> --}}
            <p class="mt-2 bg-danger p-2 text-white text-center">
                <strong>Lab Photo </strong>
            </p>
        </div>
        {{-- <div class="col-12 col-sm-6 ">
            <img src="{{ asset("storage/assets/facility/bioassay-lab/IMG_1493.jpg") }}" alt="Image Bio Assay Lab" class="img-fluid img-thumbnail">
            <p class="mt-2 bg-danger p-2 text-white text-center">
                <strong>WHO TUBE TEST </strong>
            </p>
        </div>
       
        <div class="col-12 col-sm-6 ">
            <img src="{{ asset("storage/assets/facility/bioassay-lab/IMG_1487.jpg") }}" alt="Image Bio Assay Lab" class="img-fluid img-thumbnail"/>

            <p class="mt-2 bg-danger p-2 text-white text-center">
                <strong>ARM-IN-CAGE TEST</strong>
            </p>
        </div> --}}
       
     

      </div>
    </div>
</section>


@endsection