<div class="pl-lg-4">

    <div class="form-group{{ $errors->has('allocation_group_name') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="allocation_group_name">Allocation Group Name</label>
        <input type="text" name="allocation_group_name" id="allocation_group_name" class="form-control{{ $errors->has('allocation_group_name') ? ' is-invalid' : '' }}" placeholder="{{ __('Group Name') }}" value="{{ old('allocation_group_name') }}">

        @include('alerts.feedback', ['field' => 'allocation_group_name'])
    </div>


    <div class="form-group{{ $errors->has('allocation_group_ratio') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="allocation_group_ratio">Allocation Group Ratio </label>
        <input type="text" name="allocation_group_ratio" id="allocation_group_ratio" class="form-control{{ $errors->has('allocation_group_ratio') ? ' is-invalid' : '' }}" placeholder="{{ __('Ratio') }}" value="{{ old('allocation_group_ratio') }}">

        @include('alerts.feedback', ['field' => 'allocation_group_ratio'])
    </div>

    <div>
        {{--                                        item-to-check--}}
        <button type="button" class="btn btn-secondary btn-sm mb-4">Add another Group </button>
    </div>
</div>

