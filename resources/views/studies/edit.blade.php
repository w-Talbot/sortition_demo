@extends('layouts.app', [
    'title' => __('Build Study'),
    'parentSection' => 'laravel',
    'elementName' => 'build-study'
])

@section('content')
    @component('layouts.headers.auth')
        @component('layouts.headers.breadcrumbs')
            @slot('title')
                {{ __($study->study_name) }}
            @endslot

            <li class="breadcrumb-item"><a href="/studies/create">{{ __('Study Managment') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Edit ' . $study->study_name) }}</li>
        @endcomponent
    @endcomponent

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Edit ' . $study->study_name) }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="/studies/index" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post"  action="/studies" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <h6 class="heading-small text-muted mb-4">{{ __('General') }}</h6>

                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('study_name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="study_name">Study Name </label>
                                    <input type="text" name="study_name" id="study_name" class="form-control{{ $errors->has('study_name') ? ' is-invalid' : '' }}"  value="{{ $study->study_name }}" required autofocus>

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
                                    <input type="text" name="study_description" id="study_description" class="form-control{{ $errors->has('study_description') ? ' is-invalid' : '' }}"  value="{{$study->study_description}}" required autofocus>

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
                                        <option value="5p" >5%</option>
                                        <option value="10p" >10%</option>
                                        <option value="15p" >15%</option>
                                        <option value="20p" >20%</option>
                                        <option value="30p" >30%</option>
                                        <option value="40p" >40%</option>
                                        <option value="50p" >50%</option>

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
                                        <option value="simple">Simple</option>
                                        <option value="blocked" >Blocked</option>
                                        <option value="stratified" >Stratified</option>
                                        <option value="minimised" >Minimised</option>
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
                                    <input type="text" name="algorithm_rng" id="algorithm_rng" class="form-control{{ $errors->has('algorithm_rng') ? ' is-invalid' : '' }}"  value="{{ old('algorithm_rng') }}" required autofocus>

                                    @include('alerts.feedback', ['field' => 'algorithm_rng'])
                                </div>

                            </div>
                            <h6 class="heading-small text-muted mb-4">{{ __('Allocation Groups') }}</h6>
                            <div class="pl-lg-4">

                                <div class="form-group{{ $errors->has('allocation_group_name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="allocation_group_name">Allocation Group Name</label>
                                    <input type="text" name="allocation_group_name" id="allocation_group_name" class="form-control{{ $errors->has('allocation_group_name') ? ' is-invalid' : '' }}"  value="{{ old('allocation_group_name') }}">

                                    @include('alerts.feedback', ['field' => 'allocation_group_name'])
                                </div>

                                <div class="form-group{{ $errors->has('allocation_group_ratio') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="allocation_group_ratio">Allocation Group Ratio </label>
                                    <input type="text" name="allocation_group_ratio" id="allocation_group_ratio" class="form-control{{ $errors->has('allocation_group_ratio') ? ' is-invalid' : '' }}"  value="{{ old('allocation_group_ratio') }}">

                                    @include('alerts.feedback', ['field' => 'allocation_group_ratio'])
                                </div>

                                <div>
                                    {{--                                        item-to-check--}}
                                    <button type="button" class="btn btn-secondary btn-sm mb-4">Add another Group </button>
                                </div>
                            </div>



                            <h6 class="heading-small text-muted mb-4">{{ __('Selection Options') }} </h6>



                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Selection Options</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Use this to add as many selection options as needed.
                                            Selection Options are...description.

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="pl-lg-4">

                                <div class="form-group{{ $errors->has('option_name') ? ' has-danger' : '' }}">

                                    <label class="form-control-label" for="option_name">Option Name</label>

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-outline-default btn-sm" data-toggle="modal" data-target="#exampleModal">
                                        ?
                                    </button>

                                    <input type="text" name="option_name" id="option_name" class="form-control{{ $errors->has('option_name') ? ' is-invalid' : '' }}" value="{{ old('option_name') }}">

                                    @include('alerts.feedback', ['field' => 'option_name'])
                                </div>

                                <div>
                                    {{--                                     item-to-check--}}
                                    <button type="button" class="btn btn-secondary btn-sm mb-4">Add another Option </button>
                                </div>

                            </div>
                            <h6 class="heading-small text-muted mb-4">{{ __('Initial Site(s)') }}</h6>
                            <div class="pl-lg-4">

                                <div class="form-group{{ $errors->has('site_name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="site_name">Site</label>
                                    <input type="text" name="site_name" id="site_name" class="form-control{{ $errors->has('site_name') ? ' is-invalid' : '' }}"  value="{{ old('site_name') }}" required autofocus>

                                    @include('alerts.feedback', ['field' => 'site_name'])
                                </div>
                                <div>
                                    {{--                                        item-to-check--}}
                                    <button type="button" class="btn btn-secondary btn-sm mb-4">Add another Site </button>
                                </div>

                            </div>
                            <h6 class="heading-small text-muted mb-4">{{ __('System Messages') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('field_warning') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="field_warning">Required Field Warning</label>
                                    <input type="text" name="field_warning" id="field_warning" class="form-control{{ $errors->has('field_warning') ? ' is-invalid' : '' }}"  value="Required field" required autofocus>

                                    @include('alerts.feedback', ['field' => 'field_warning'])
                                </div>
                                <div class="form-group{{ $errors->has('inclusion_warning') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="inclusion_warning">Inclusion Criteria Warning</label>
                                    <input type="text" name="inclusion_warning" id="inclusion_warning" class="form-control{{ $errors->has('inclusion_warning') ? ' is-invalid' : '' }}"  value="" required autofocus>

                                    @include('alerts.feedback', ['field' => 'inclusion_warning'])
                                </div>
                                <div class="form-group{{ $errors->has('exclusion_warning') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="exclusion_warning">Exclusion Criteria Warning</label>
                                    <input type="text" name="exclusion_warning" id="exclusion_warning" class="form-control{{ $errors->has('exclusion_warning') ? ' is-invalid' : '' }}"  value="" required autofocus>

                                    @include('alerts.feedback', ['field' => 'exclusion_warning'])
                                </div>
                            </div>
                            <h6 class="heading-small text-muted mb-4">{{ __('Item Groups') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('item_group_heading') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="item_group_heading">Heading</label>
                                    <input type="text" name="item_group_heading" id="item_group_heading" class="form-control{{ $errors->has('item_group_heading') ? ' is-invalid' : '' }}" value="{{ old('item_group_heading') }}" required autofocus>

                                    @include('alerts.feedback', ['field' => 'item_group_heading'])
                                </div>
                                <div class="form-group{{ $errors->has('item_group_control_type') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="item_group_control_type">Control Type</label>
                                    <select name="item_group_control_type" id="item_group_control_type" class="form-control{{ $errors->has('item_group_control_type') ? ' is-invalid' : '' }}" required>
                                        <option value="">-</option>
                                        <option value="ct_checkbox" >Checkbox</option>
                                        <option value="ct_date" >Date</option>
                                        <option value="ct_location_select" >Location Select</option>
                                        <option value="ct_multibox" >Multibox</option>
                                        <option value="ct_radio" >Radio</option>
                                        <option value="ct_select" >Select</option>
                                        <option value="ct_study_id" >Study ID</option>
                                        <option value="ct_text" >Text</option>
                                        <option value="ct_text_area" >Text Area</option>
                                    </select>
                                    @include('alerts.feedback', ['field' => 'item_group_control_type'])
                                </div>
                                <div class="form-group{{ $errors->has('item_group_rule') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="item_group_rule">Rule</label>
                                    <select name="item_group_rule" id="item_group_rule" class="form-control{{ $errors->has('item_group_rule') ? ' is-invalid' : '' }}"  required>
                                        <option value="-">-</option>
                                        <option value="ct_inclusion" >Inclusion</option>
                                        <option value="ct_exclusion" >Exclusion</option>
                                    </select>
                                    @include('alerts.feedback', ['field' => 'item_group_rule'])
                                </div>
                                <div class="form-group{{ $errors->has('item_group_group') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="item_group_group">Item Group</label>
                                    <select name="item_group_group" id="item_group_group" class="form-control{{ $errors->has('item_group_group') ? ' is-invalid' : '' }}" required>
                                        {{--                                           item-to-check : this will need to be looped throuh for each group added--}}

                                        <option value="">-</option>
                                        <option value="ct_item_group" >fieldset_01</option>
                                    </select>
                                    @include('alerts.feedback', ['field' => 'item_group_group'])
                                </div>
                                <div>
                                    {{--                                        item-to-check--}}
                                    <button type="button" class="btn btn-primary btn-sm mb-4">Add Item Validation</button>
                                </div>
                                <div>
                                    {{--                                        item-to-check--}}
                                    <button type="button" class="btn btn-secondary btn-sm mb-4">Add another Item Group</button>
                                </div>
                            </div>
                            <h6 class="heading-small text-muted mb-4">{{ __('Allocation Message') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('allocation_message') ? ' has-danger' : '' }}">
                                    <label class="form-control-label">{{ __('Allocation Message') }}</label>
                                    <input type="text" name="allocation_message" id="allocation_message" class="form-control{{ $errors->has('allocation_message') ? ' is-invalid' : '' }}"  value="{{ old('allocation_message') }}">

                                    @include('alerts.feedback', ['field' => 'allocation_message'])
                                </div>
                            </div>
{{--                            <h6 class="heading-small text-muted mb-4">{{ __('Today\'s Date') }}</h6>--}}
{{--                            <div class="pl-lg-4">--}}

{{--                                <div class="row">--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label class="form-control-label" for="date">Date</label>--}}
{{--                                            <input class="form-control datepicker" name="date" id="date"--}}
{{--                                                   type="text" data-date-format="dd-mm-yyyy"--}}
{{--                                                   value="{{ old('date', now()->format('d-m-Y')) }}">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

                            <div class="text-center p--4">
                                <button type="submit" class="btn btn-success mt-4">{{ __('Update Study') }}</button>
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
