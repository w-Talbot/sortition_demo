@extends('layouts.app', [
    'title' => __('Randomisation'),
    'parentSection' => 'laravel',
    'elementName' => 'randomisation'
])

@section('content')
    @component('layouts.headers.auth')
        @component('layouts.headers.breadcrumbs')
            @slot('title')
                {{ __('Randomisation') }}
            @endslot

            {{--item-to-check--}}
            {{--            <li class="breadcrumb-item"><a href="{{ route('studies.index') }}">{{ __('Study Management') }}</a></li>--}}
            <li class="breadcrumb-item"><a href="/studies/index">{{ __('Study Management') }}</a></li>

            <li class="breadcrumb-item active" aria-current="page">{{ __('List') }}</li>
        @endcomponent
    @endcomponent

    <div class="col-xl-12 order-xl-1">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0">{{ __('Randomise Details: ') }}</h3>
                    </div>
                    <div class="col-4 text-right">
                        <a href="/studies/{{$study->id}}" class="btn btn-sm btn-primary">{{ __('Back to Study') }}</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
               <div class="row">
                   <div>
{{--                       item-to-check : this will need to pull a real study loigo / hardcoded for now:--}}
{{--                       {{$study->logo}}--}}
                       <img src="{{ asset('sortition') }}/img/no-image.png"  alt="img not found">
                   </div>
                   <div>
                       <h1>
                           {{$study->study_name}}
                       </h1>
                   </div>
               </div>
                <h3>Participant ID: {{$randomisation->participant_id}}</h3>
                <h3>Participant Allocation: {{$randomisation->allocation}}</h3>
                <h3>Randomised by: {{$randomisation->randomised_by}}</h3>
                <h3>Randomised on: {{$randomisation->randomisation_date}}</h3>
            </div>
        </div>
    </div>


@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">
@endpush

@push('js')
    <script src="{{ asset('argon') }}/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
@endpush
