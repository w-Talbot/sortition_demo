


<div class="pl-lg-4">
    <div class="form-group{{ $errors->has('item_group_name') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="item_group_name">Item Name</label>
        <input type="text" name="item_group_name" id="item_group_name" class="form-control{{ $errors->has('item_group_name') ? ' is-invalid' : '' }}" placeholder="{{ __('Item Group Name') }}" value="{{ old('item_group_name') }}" required autofocus>

        @include('alerts.feedback', ['field' => 'item_group_heading'])
    </div>
    <div class="form-group{{ $errors->has('item_group_heading') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="item_group_heading">Heading</label>
        <input type="text" name="item_group_heading" id="item_group_heading" class="form-control{{ $errors->has('item_group_heading') ? ' is-invalid' : '' }}" placeholder="{{ __('Item Group Heading') }}" value="{{ old('item_group_heading') }}" required autofocus>

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
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="item_group_compulsory">
        <label class="form-check-label" for="item_group_compulsory">
            Compulsory
        </label>
    </div>
    <br>
    <div>
        {{--                                        item-to-check--}}
        <button type="button" class="btn btn-primary btn-sm mb-4">Add Item Validation</button>
    </div>
    <div>
        {{--                                        item-to-check--}}
        <button type="button" class="btn btn-secondary btn-sm mb-4">Add another Item Group</button>
    </div>
</div>
