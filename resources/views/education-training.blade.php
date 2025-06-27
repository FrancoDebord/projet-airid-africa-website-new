@extends('index')

@section('title', 'Education & Training')


@section('content')
    <div id="banner-area" class="banner-area"
        style="background-image:url({{ asset('storage/assets_vendor/images/banner/banner1.jpg') }})">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title top_title">Education & Training</h1>
                            {{-- <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Vacancies</li>
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
            <div class="row">

             
                <div class="col-12">
                    <p class="text-justify p-3 text-center font-weight-bold" style="border: 1px dashed #c20102">Content of this page coming soon</p>
                </div>


            </div><!-- Sidebar end -->
        </div><!-- Sidebar Col end -->

        </div><!-- Main row end -->

        </div><!-- Conatiner end -->

    
    </section>

@endsection
