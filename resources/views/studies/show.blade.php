@extends('layouts.app', [
    'parentSection' => 'study',
    'elementName' => 'study_dashboard'
])

@section('content')
    @component('layouts.headers.auth')
        @component('layouts.headers.breadcrumbs')
            @slot('title')
                {{ __($study->study_name . ' Dashboard') }}
            @endslot

            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboards') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __($study->study_name) }}</li>
        @endcomponent
        @include('studies.headers.cards')
    @endcomponent

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card bg-default" id="dashboard">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-light text-uppercase ls-1 mb-1">Overview</h6>
                                <h5 class="h3 text-white mb-0">Study Recruitment</h5>
                            </div>
                            <div class="col">
                                <ul class="nav nav-pills justify-content-end">
                                    <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales-dark" data-update='{"data":{"datasets":[{"data":[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}'
                                        data-prefix="$" data-suffix="k">
                                        <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                                            <span class="d-none d-md-block">Month</span>
                                            <span class="d-md-none">M</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" data-toggle="chart" data-target="#chart-sales-dark" data-update='{"data":{"datasets":[{"data":[0, 20, 5, 25, 10, 30, 15, 40, 40]}]}}'
                                        data-prefix="$" data-suffix="k">
                                        <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                                            <span class="d-none d-md-block">Week</span>
                                            <span class="d-md-none">W</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <!-- Chart wrapper -->
                            <canvas id="chart-sales-dark" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
{{--            <div class="col-xl-4">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header bg-transparent">--}}
{{--                        <div class="row align-items-center">--}}
{{--                            <div class="col">--}}
{{--                                <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6>--}}
{{--                                <h5 class="h3 mb-0">Total orders</h5>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        <!-- Chart -->--}}
{{--                        <div class="chart">--}}
{{--                            <canvas id="chart-bars" class="chart-canvas"></canvas>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
        <div class="row">
            <div class="col">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header border-0">
                            <h3 class="mb-0">Randomisations</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort" data-sort="name">Subject ID</th>
                                    <th scope="col" class="sort" data-sort="budget">Allocation</th>
                                    <th scope="col" class="sort" data-sort="status">Randomised By</th>
                                    <th scope="col">On</th>
                                    <th scope="col" class="sort" data-sort="completion">At</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody class="list">
{{--                                item-to-check : need to loop through and display all randomised subjects--}}
                               <tr scope="row">
                                   <td> S001 </td>
                                   <td> Delayed Vaccination and Standard Information </td>
                                   <td> superuser </td>
                                   <td> Fri 29 Jan 2021 </td>
                                   <td> 14:45 </td>
                               </tr>
                               <tr scope="row">
                                   <td> S002 </td>
                                   <td> Delayed Vaccination and Standard Information </td>
                                   <td> superuser </td>
                                   <td> Fri 29 Jan 2021 </td>
                                   <td> 14:45 </td>
                               </tr>
                               <tr scope="row">
                                   <td> S003 </td>
                                   <td> Delayed Vaccination and Standard Information </td>
                                   <td> superuser </td>
                                   <td> Fri 29 Jan 2021 </td>
                                   <td> 14:45 </td>
                               </tr>
                               <tr scope="row">
                                   <td> S004 </td>
                                   <td> Delayed Vaccination and Standard Information </td>
                                   <td> superuser </td>
                                   <td> Fri 29 Jan 2021 </td>
                                   <td> 14:45 </td>
                               </tr>
                               <tr scope="row">
                                   <td> S005 </td>
                                   <td> Delayed Vaccination and Standard Information </td>
                                   <td> superuser </td>
                                   <td> Fri 29 Jan 2021 </td>
                                   <td> 14:45 </td>
                               </tr>
                               <tr scope="row">
                                   <td> S006 </td>
                                   <td> Delayed Vaccination and Standard Information </td>
                                   <td> superuser </td>
                                   <td> Fri 29 Jan 2021 </td>
                                   <td> 14:45 </td>
                               </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <h3 class="mb-0">Sites</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="name">Site Code</th>
                                <th scope="col" class="sort" data-sort="budget">Site Name</th>
                                <th scope="col" class="sort" data-sort="status">Number Recruited</th>
                                <th scope="col">Site Opened</th>
                                <th scope="col" class="sort" data-sort="completion">Number Expected</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody class="list">
                            {{--                                item-to-check : need to loop through and display all randomised subjects--}}
                            <tr scope="row">
                                <td> S001 </td>
                                <td> Sacred Heart Hospital </td>
                                <td> 12 </td>
                                <td> Fri 29 Jan 2021 </td>
                                <td> 500 </td>
                            </tr>
                            <tr scope="row">
                                <td> S002 </td>
                                <td> John Radcliffe </td>
                                <td> 2 </td>
                                <td> Fri 29 Jan 2021 </td>
                                <td> 500 </td>
                            </tr>
                            <tr scope="row">
                                <td> S003 </td>
                                <td> GReys anatomy </td>
                                <td> 54 </td>
                                <td> Fri 29 Jan 2021 </td>
                                <td> 500 </td>
                            </tr>
                            <tr scope="row">
                                <td> S004 </td>
                                <td> hospital </td>
                                <td> 5 </td>
                                <td> Fri 29 Jan 2021 </td>
                                <td> 500 </td>
                            </tr>
                            <tr scope="row">
                                <td> S005 </td>
                                <td> Boston Hospital </td>
                                <td> 67 </td>
                                <td> Fri 29 Jan 2021 </td>
                                <td> 500 </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
