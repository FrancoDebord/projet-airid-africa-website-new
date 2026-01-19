@extends('admin.layout')

@section('content')
    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-6 col-xl-4">
                <div class="bg-white rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-users fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Total Staff</p>
                        <h6 class="mb-0" style="color: black">{{ $staffCount }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-4">
                <div class="bg-white rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-book fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Total Publications</p>
                        <h6 class="mb-0" style="color: black">{{ $publicationsCount }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-4">
                <div class="bg-white rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-briefcase fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Total Vacancies</p>
                        <h6 class="mb-0" style="color: black">{{ $vacanciesCount }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-4">
                <div class="bg-white rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-project-diagram fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Total Projets</p>
                        <h6 class="mb-0" style="color: black">{{ $projectsCount }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-4">
                <div class="bg-white rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-newspaper fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Total News</p>
                        <h6 class="mb-0" style="color: black">{{ $newsCount }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-4">
                <div class="bg-white rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-blog fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Total Blogs</p>
                        <h6 class="mb-0" style="color: black">{{ $blogsCount }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sale & Revenue End -->

    <!-- Recent Activities Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-white text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0" style="color: black">Recent Activities</h6>
                <a href="{{ route('admin.staff.index') }}">Show All</a>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-white" >
                            <th scope="col" style="color: black">Activity</th>
                            <th scope="col" style="color: black">Date</th>
                            <th scope="col"style="color: black">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>New staff member added</td>
                            <td>{{ now()->format('Y-m-d') }}</td>
                            <td>Success</td>
                        </tr>
                        <tr>
                            <td>Publication updated</td>
                            <td>{{ now()->format('Y-m-d') }}</td>
                            <td>Success</td>
                        </tr>
                        <tr>
                            <td>Vacancy created</td>
                            <td>{{ now()->format('Y-m-d') }}</td>
                            <td>Success</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Recent Activities End -->
@endsection
