
{{--item-to-check : set up this modal descript--}}
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
                Use this to add sites

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>





<div class="pl-lg-4">

    <div class="row">
        <div class="col-4">
            <div class="form-group{{ $errors->has('site_name_0') ? ' has-danger' : '' }}">
                <label class="form-control-label" for="site_name_0">Site</label>
                <input type="text" name="site_name_0" id="site_name_0" class="form-control{{ $errors->has('site_name_0') ? ' is-invalid' : '' }}" placeholder="{{ __('Site name') }}" value="{{ old('site_name_0') }}">

                @include('alerts.feedback', ['field' => 'site_name_0'])
            </div>
        </div>
        <div class="col-4">
            <div class="form-group{{ $errors->has('site_name_0') ? ' has-danger' : '' }}">
                <label class="form-control-label" for="site_value_0">Value</label>
                <input type="text" name="site_value_0" id="site_value_0" class="form-control{{ $errors->has('site_value_0') ? ' is-invalid' : '' }}" placeholder="{{ __('Value') }}" value="{{ old('site_value_0') }}">

                @include('alerts.feedback', ['field' => 'site_value_0'])
            </div>
        </div>
    </div>

    <div id="newinput"></div>
    <div>
        {{--                                        item-to-check--}}
        <button type="button" id="siteAdder" class="btn btn-secondary btn-sm mb-4">Add another Site </button>
    </div>

</div>

{{--item-to-check : perhaps add a function to store/display only consecutive numbers if possible this will break otherwise--}}
@push('js')
    <script type="text/javascript">
        var sfx = 0;
        $("#siteAdder").click(function () {
            sfx = sfx + 1;
            newRowAdd =
                '<div id="addrow"> ' +

                '<div class="row">' +
                '<div class="col-4">' +
                '<div class="form-group">' +
                    '<label class="form-control-label" for="site_name_' + sfx + '"> Site ' + (sfx + 1) + ' </label>' +
                    '<input type="text" name="site_name_' + sfx + '" placeholder=" Site name"  class="form-control" id="site_name_' + sfx + '">'+
                '</div></div>'+
                '<div class="col-4">' +
                '<div class="form-group">' +
                '<label class="form-control-label" for="site_value_' + sfx + '"> Value </label>' +
                '<input type="text" name="site_value_' + sfx + '" placeholder=" Value "  class="form-control" id="site_value_' + sfx + '">'+
                '</div></div>' +
                '</div>'+


                '<div class="input-group m-3">' +
                '<div class="input-group-prepend">' +
                '<button class="btn btn-danger btn-sm mb-4" id="DeleteRow" type="button">' +
                '<i class="bi bi-trash"></i> Remove Site</button> </div>' +
                ' </div></div>';
            $('#newinput').append(newRowAdd);
        });
        $("body").on("click", "#DeleteRow", function () {
            $(this).parents("#addrow").remove();
        })
    </script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/select2/dist/js/select2.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/quill/dist/quill.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('argon') }}/js/items.js"></script>

@endpush
