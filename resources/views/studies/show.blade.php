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
                                        data-prefix="" data-suffix="">
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
                            <div class="row">
                            <div class="col-8">
                              <h3 class="mb-0">Randomisations</h3>
                            </div>
                            @if (auth()->user()->can('create', App\Item::class))
                                <div class="col-4 text-right">
                                    {{--                                   item-to-check--}}
                                    {{--                                    <a href="{{ route('studies.create') }}" class="btn btn-sm btn-primary">{{ __('Add item') }}</a>--}}
                                    <a href="/studies/{{$study->id}}/randomise" class="btn btn-sm btn-primary">{{ __('Randomise Participant') }}</a>
                                </div>
                            @endif
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush table-hover">
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
{{--                               <tr scope="row" onclick="location.href='/studies/{{$study->id}}/{{$randomisations->id}}/forms';">--}}
                               @foreach($randomisations as $randomisation)

                                <tr scope="row" onclick="location.href='/randomisations/{{$study->id}}/{{$randomisation->id}}';">
                                   <td> {{$randomisation->participant_id}} </td>
                                   <td> {{$randomisation->allocation}} </td>
                                   <td> {{$randomisation->randomised_by}} </td>
                                   <td> {{$randomisation->randomisation_date}} </td>
                                   <td> 14:45 </td>
                               </tr>
                               @endforeach
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
                            @foreach($sites as $site)
                            <tr scope="row">
                                <td> {{$site->site_value}} </td>
                                <td> {{$site->site_name}} </td>
                                <td> 12 </td>
                                <td> Fri 29 Jan 2021 </td>
                                <td> 500 </td>
                            </tr>
                            @endforeach
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


@push('css')
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">
@endpush

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
@endpush
