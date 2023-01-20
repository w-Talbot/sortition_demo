
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
        <button type="button" class="btn btn-outline-default btn-sm" data-toggle="modal" data-target="#exampleModal" style="width:25px; height:25px;border-radius: 60px">
            ?
        </button>

        <input type="text" name="option_name" id="option_name" class="form-control{{ $errors->has('option_name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('option_name') }}">

        @include('alerts.feedback', ['field' => 'option_name'])
    </div>

    <div>
        {{--                                     item-to-check--}}
        <button type="button" class="btn btn-secondary btn-sm mb-4">Add another Option </button>
    </div>

</div>
