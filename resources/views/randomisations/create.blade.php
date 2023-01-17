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
                        <h3 class="mb-0">{{ __('Randomise Participant to: ' . $study->study_name) }}</h3>
                    </div>
                    <div class="col-4 text-right">
                        <a href="/studies/{{$study->id}}" class="btn btn-sm btn-primary">{{ __('Back to Study') }}</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form method="post"  action="/randomisations/{{$study->id}}" autocomplete="off" enctype="multipart/form-data">
                    @csrf

                    <div class="pl-lg-4">
                        <div class="form-group{{ $errors->has('participant_id') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="study_name">Participant ID </label>
                            <input type="text" name="participant_id" id="participant_id" class="form-control{{ $errors->has('participant_id') ? ' is-invalid' : '' }}"  required autofocus>

                            @include('alerts.feedback', ['field' => 'participant_id'])
                        </div>
                    </div>

                    <div class="text-center" >
                        <button type="submit" class="btn btn-success mt-4">{{ __('Randomise Participant') }}</button>
                    </div>
                </form>
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
