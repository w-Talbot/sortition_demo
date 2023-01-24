@extends('layouts.app', [
    'title' => __('Build Study'),
    'parentSection' => 'laravel',
    'elementName' => 'build-study'
])

@section('content')
    @component('layouts.headers.auth')
        @component('layouts.headers.breadcrumbs')
            @slot('title')
                {{ __('New Study') }}
            @endslot

            <li class="breadcrumb-item"><a href="/studies/create">{{ __('Study Managment') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Build Study') }}</li>
        @endcomponent
    @endcomponent

        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col-xl-12 order-xl-1">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">{{ __('Build New Study') }}</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="/studies/index" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post"  action="/studies" autocomplete="off" enctype="multipart/form-data">
                                @csrf

                                <h6 class="heading-small text-muted mb-4">{{ __('General') }}</h6>

                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('study_name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="study_name">Study Name </label>
                                        <input type="text" name="study_name" id="study_name" class="form-control{{ $errors->has('study_name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('study_name') }}" required autofocus>

                                        @include('alerts.feedback', ['field' => 'study_name'])
                                    </div>

                                    <div class="form-group{{ $errors->has('study_type') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="study_type">Type</label>
                                        <select name="study_type" id="study_type" class="form-control{{ $errors->has('study_type') ? ' is-invalid' : '' }}" required>
                                            <option value="">-</option>
                                            <option value="demo" >Demo</option>
                                            <option value="live" >Live</option>
                                        </select>

                                        @include('alerts.feedback', ['field' => 'study_type'])
                                    </div>

                                    <div class="form-group{{ $errors->has('study_description') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="study_description">Description</label>
                                        <input type="text" name="study_description" id="study_description" class="form-control{{ $errors->has('study_description') ? ' is-invalid' : '' }}" placeholder="{{ __('Describe the study') }}" value="{{ old('study_description') }}" required autofocus>

                                        @include('alerts.feedback', ['field' => 'study_description'])
                                    </div>

                                    <div class="form-group{{ $errors->has('logo') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="logo">Study Logo</label>
                                        <div class="custom-file">
                                            <input type="file" name="logo" class="custom-file-input{{ $errors->has('logo') ? ' is-invalid' : '' }}" id="logo" accept="image/*" >
                                            <label class="custom-file-label" for="logo">{{ __('Select logo') }}</label>
                                        </div>

                                        @include('alerts.feedback', ['field' => 'logo'])
                                    </div>

                                    <div class="form-group{{ $errors->has('study_monitor') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="study_monitor">Monitor</label>
                                        <select name="study_monitor" id="study_monitor" class="form-control{{ $errors->has('study_monitor') ? ' is-invalid' : '' }}" required>
                                            <option value="">-</option>
                                            <option value="none" >None</option>
                                            <option value="5" >5%</option>
                                            <option value="10" >10%</option>
                                            <option value="15" >15%</option>
                                            <option value="20" >20%</option>
                                            <option value="30" >30%</option>
                                            <option value="40" >40%</option>
                                            <option value="50" >50%</option>

                                        </select>
                                        @include('alerts.feedback', ['field' => 'study_monitor'])
                                    </div>

                                </div>
                                <h6 class="heading-small text-muted mb-4">{{ __('Algorithm') }}</h6>
                                <div class="pl-lg-4">

                                    <div class="form-group{{ $errors->has('algorithm_type') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="algorithm_type">Type</label>
                                        <select name="algorithm_type" id="algorithm_type" class="form-control{{ $errors->has('algorithm_type') ? ' is-invalid' : '' }}" required>
                                            <option value="">-</option>
                                            <option value="blocked">Blocked</option>
                                            <option value="minimised">Minimised</option>
                                            <option value="platform">Platform</option>
                                            <option value="simple">Simple</option>
                                            <option value="stratified" >Stratified</option>

                                        </select>
                                        @include('alerts.feedback', ['field' => 'algorithm_type'])
                                    </div>


                                    <div class="form-group{{ $errors->has('algorithm_masking') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="algorithm_masking">Masking</label>
                                        <select name="algorithm_masking" id="algorithm_masking" class="form-control{{ $errors->has('algorithm_masking') ? ' is-invalid' : '' }}"  required>
                                            <option value="">-</option>
                                            <option value="open">Open</option>
                                            <option value="blind" >Blind</option>
                                        </select>
                                        @include('alerts.feedback', ['field' => 'algorithm_masking'])
                                    </div>

                                    <div class="form-group{{ $errors->has('algorithm_rng') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="algorithm_rng">RNG Seed </label>
                                        <input type="text" name="algorithm_rng" id="algorithm_rng" class="form-control{{ $errors->has('algorithm_rng') ? ' is-invalid' : '' }}" placeholder="{{ __('Enter random eight digit number ex: 55127354') }}" value="{{ old('algorithm_rng') }}" required autofocus>

                                        @include('alerts.feedback', ['field' => 'algorithm_rng'])
                                    </div>

                                </div>

                                <h6 class="heading-small text-muted mb-4">{{ __('Allocation Groups') }}</h6>
                                @include('studies.forms.allocation_groups')


                                <h6 class="heading-small text-muted mb-4">{{ __('Selection Options') }} </h6>
                                @include('studies.forms.selection_options')

                                <h6 class="heading-small text-muted mb-4">{{ __('Initial Site(s)') }}</h6>
                                @include('studies.forms.initial_sites')

                                <h6 class="heading-small text-muted mb-4">{{ __('System Messages') }}</h6>
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('field_warning') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="field_warning">Required Field Warning</label>
                                        <input type="text" name="field_warning" id="field_warning" class="form-control{{ $errors->has('field_warning') ? ' is-invalid' : '' }}" placeholder="{{ __('Required field') }}" value="Required field" required autofocus>

                                        @include('alerts.feedback', ['field' => 'field_warning'])
                                    </div>
                                    <div class="form-group{{ $errors->has('inclusion_warning') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="inclusion_warning">Inclusion Criteria Warning</label>
                                        <input type="text" name="inclusion_warning" id="inclusion_warning" class="form-control{{ $errors->has('inclusion_warning') ? ' is-invalid' : '' }}" placeholder="{{ __('Patient does not meet all eligibility criteria and cannot be randomised') }}" value="Patient does not meet all eligibility criteria and cannot be randomised" required autofocus>

                                        @include('alerts.feedback', ['field' => 'inclusion_warning'])
                                    </div>
                                    <div class="form-group{{ $errors->has('exclusion_warning') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="exclusion_warning">Exclusion Criteria Warning</label>
                                        <input type="text" name="exclusion_warning" id="exclusion_warning" class="form-control{{ $errors->has('exclusion_warning') ? ' is-invalid' : '' }}" placeholder="{{ __('Patient does not meet all exclusion criteria and cannot be randomised') }}" value="Patient does not meet all exclusion criteria and cannot be randomised" required autofocus>

                                        @include('alerts.feedback', ['field' => 'exclusion_warning'])
                                    </div>
                                </div>
                                <h6 class="heading-small text-muted mb-4">{{ __('Item Groups') }}</h6>
                                @include('studies.forms.item_groups')

                                <h6 class="heading-small text-muted mb-4">{{ __('Allocation Message') }}</h6>
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('allocation_message') ? ' has-danger' : '' }}">
                                        <label class="form-control-label">{{ __('Allocation Message') }}</label>
                                        <input type="text" name="allocation_message" id="allocation_message" class="form-control{{ $errors->has('allocation_message') ? ' is-invalid' : '' }}" placeholder="{{ __('Allocation Message: ') }}" value="{{ old('allocation_message') }}">

                                        @include('alerts.feedback', ['field' => 'allocation_message'])
                                    </div>
                                </div>

                                <div class="text-center" >
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Create Study') }}</button>
                                </div>

                                </div>

                            </form>
                        </div>



                    </div>
                </div>
            </div>

            @include('layouts.footers.auth')
        </div>
    @endsection

    @push('css')
        <link rel="stylesheet" href="{{ asset('argon') }}/vendor/select2/dist/css/select2.min.css">
        <link rel="stylesheet" href="{{ asset('argon') }}/vendor/quill/dist/quill.core.css">
    @endpush

    @push('js')
        <script src="{{ asset('argon') }}/vendor/select2/dist/js/select2.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/quill/dist/quill.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <script src="{{ asset('argon') }}/js/items.js"></script>
    @endpush
