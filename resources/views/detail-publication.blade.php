@extends('index')

@section('title',"AIRID -- Detail publication")
    


@section('content')
<div id="banner-area" class="banner-area"
style="background-image:url({{ asset('storage/assets_vendor/images/banner/banner1.jpg') }})">
<div class="banner-text">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-heading">
                    <h1 class="banner-title top_title">Detail Publication </h1>
                    {{-- <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Detail Publication</a></li>
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

            <div class="col-12 mb-5 mb-lg-0">

                <div class="post-content post-single">
                    {{-- <div class="post-media post-image">
                        <img loading="lazy" src="{{ asset('storage/assets/publications/couverture/' . $publication->photo_couverture) }}"
                            class="img-fluid card-img-bottom" alt="post-image">
                    </div> --}}

                    <h4 class="">{{ $publication->titre_publication  }}</h4>

                    <div class="post-body">


                        <div class="entry-content">

                            <h4 class="into-sub-title">Abstract</h4>
                            <p class="text-justify"> {!! $publication->resume_publication !!}</p>

                            <h4 class="into-sub-title">Useful links to this publication</h4>

                            <p class="">
                                <strong>Access the full article on : </strong> <a class="text-primary" target="_blank" href="{{ $publication->url_publication }}">{{ $publication->url_publication }}</a>
                            </p>
                            <p class="">
                                <strong>Download the file : </strong> <a class="text-primary" target="_blank" href="{{ asset("storage/assets/publications/pdf/".$publication->fichier_publication )}}">{{ $publication->fichier_publication }}</a>
                            </p>
                            
                            <p class="">
                                <strong>DOI : </strong> <a class="text-primary" target="_blank" href="{{ $publication->numero_doi }}">{{ $publication->numero_doi }}</a>
                            </p>
                            <p class="">
                                <strong>PMID : </strong> <a class="text-primary" target="_blank" href="{{ $publication->numero_pcid }}">{{ $publication->numero_pcid }}</a>
                            </p>
                            <p class="">
                                <strong>PMCID : </strong> <a  class="text-primary" target="_blank" href="{{ $publication->numero_pmcid }}">{{ $publication->numero_pmcid }}</a>
                            </p>


                            <p class="">
                                <strong>Authors  : </strong> {{ $publication->auteurs}}
                            </p>

                            <p class="">
                                <strong>Year of Publication  : </strong> {{ $publication->annee_publication}}
                            </p>
                            <p class="">
                                <strong>Publication Date : </strong> {{ date("F j, Y",strtotime( $publication->date_publication)) }}
                            </p>


                        </div>

                    </div><!-- post-body end -->
                </div><!-- post content end -->


            </div><!-- Content Col end -->
            
            <div class="col-12 mt-2">

                <div class="sidebar sidebar-right">
                    <div class="widget recent-posts">
                        <h3 class="widget-title">Others Publications</h3>
                        <ul class="list-unstyled">

                            @forelse ($others_publications as $other_publication)
                                <li class="d-flex align-items-center">
                                    <div class="posts-thumb">
                                        <a
                                            href="{{ route('detailPublication', ['id' => $other_publication->id, 'slug' => \Str::slug($other_publication->titre_publication)]) }}"><img
                                                loading="lazy" alt="img"
                                                src="{{ asset('storage/assets/publications/couverture/' . $other_publication->photo_couverture) }}"></a>
                                    </div>
                                    <div class="post-info">
                                        <h4 class="entry-title">
                                            <a
                                                href="{{ route('detailPublication', ['id' => $other_publication->id, 'slug' => \Str::slug($other_publication->titre_publication)]) }}">{{ $other_publication->titre_publication }}</a>
                                        </h4>
                                    </div>
                                </li><!-- 1st post end-->

                            @empty
                            @endforelse

                        </ul>

                        <div class="text-center mt-2">
                            {!! $others_publications->links() !!}
                        </div>

                       

                    </div><!-- Col end -->


                </div>

            </div><!-- Recent post end -->



        </div><!-- Sidebar end -->
    </div><!-- Sidebar Col end -->

    </div><!-- Main row end -->

    </div><!-- Conatiner end -->

  
</section>
@endsection