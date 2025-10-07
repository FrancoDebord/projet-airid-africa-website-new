@extends('index')

@section('title', 'Vacancies at AIRID')


@section('content')
    <div id="banner-area" class="banner-area"
        style="background-image:url({{ asset('storage/assets_vendor/images/banner/banner2_new.png') }})">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title top_title">Vacancies</h1>
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
                    <h3>All vacancies </h3>
                </div>

                <div class="col-12 table-responsive mt-2">
                    <table class="table table-striped table-bordered table-condensed">

                        <tr>
                            <th>Year</th>
                            <th>Job Title</th>
                            <th>Contract Type</th>
                            <th>Job Location</th>
                            <th>Application Deadline</th>
                            <th>Details</th>
                            <th>Download</th>
                            <th>Apply</th>
                        </tr>

                        @forelse ($all_vacancies as $vacancies)
                            <tr>
                                <td>{{ date('Y', strtotime($vacancies->application_lunch_date)) }}</td>
                                <td>
                                    <a href="{{ url($vacancies->url_page) }}">{{ $vacancies->job_title }}</a>

                                </td>
                                <td>{{ $vacancies->contract_type }}</td>
                                <td>{{ $vacancies->location }}</td>
                                <td>{{ $vacancies->application_deadline }}</td>
                                <td>
                                    <a href="{{ url($vacancies->url_page) }}" class="btn btn-outline-success">Details </a>
                                </td>
                                <td>



                                    @if (date('Y-m-d') <= $vacancies->application_deadline)
                                        <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle" type="button"
                                                id="dropdownMenuButton_{{ $vacancies->id }}" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-download"></i>
                                            </button>
                                            <div class="dropdown-menu"
                                                aria-labelledby="dropdownMenuButton_{{ $vacancies->id }}">
                                                <li><a class="dropdown-item" target="_blank"
                                                        href="{{ asset('storage/documents_recrutement/' . $vacancies->application_file_fr . '') }}">Français</a>
                                                </li>
                                                <li><a class="dropdown-item" target="_blank"
                                                        href="{{ asset('storage/documents_recrutement/' . $vacancies->application_file_en . '') }}">English</a>
                                                </li>
                                            </div>
                                        </div>
                                    @else
                                        <p class="alert alert-info">No more application</p>
                                    @endif
                                </td>
                                <td>

                                    @if (date('Y-m-d') <= $vacancies->application_deadline)
                                        <a href="mailto:{{ $vacancies->email_apply }}?subject={{ $vacancies->subject }}"
                                            class="btn btn-outline-danger  " style="float: right">Apply</a>
                                    @else
                                        <p class="alert alert-info">No more application</p>
                                    @endif

                                </td>
                            </tr>
                        @empty
                            <div class="col-12">
                                <p class="alert alert-info text-center p-3">
                                    <i class="fa fa-exclamation-circle">&nbsp;</i> No vacancies yet registered.
                                </p>
                        @endforelse
                    </table>
                </div>
            </div><!-- Sidebar end -->
        </div><!-- Sidebar Col end -->

        </div><!-- Main row end -->

        </div><!-- Conatiner end -->


    </section>

@endsection
