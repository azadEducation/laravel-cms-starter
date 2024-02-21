<div class="row">
    <div class="col-12 col-sm-4 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'name';
            $field_label = label_case($field_name);
            $field_placeholder = $field_label;
            $required = 'required';
            ?>
            {{ html()->label($field_label, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12 col-sm-4 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'slug';
            $field_label = label_case($field_name);
            $field_placeholder = $field_label;
            $required = '';
            ?>
            {{ html()->label($field_label, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12 col-sm-4 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'status';
            $field_label = label_case($field_name);
            $field_placeholder = '-- Select an option --';
            $required = 'required';
            $select_options = [
                '1' => 'Published',
                '0' => 'Unpublished',
                '2' => 'Draft',
            ];
            ?>
            {{ html()->label($field_label, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
            {{ html()->select($field_name, $select_options)->placeholder($field_placeholder)->class('form-control select2')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12 col-sm-4">
        <div class="form-group">
            <?php
            $field_name = 'website_id';
            $field_relation = 'website';
            $field_label = 'Website';
            $field_placeholder = '-- Select an option --';
            $required = 'required';
            ?>
            {{ html()->label($field_label, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
            {{ html()->select($field_name, isset($data) ? optional($data->$field_relation)->pluck('name', 'id') : '')->placeholder($field_placeholder)->class('form-control select2-website')->attributes(["$required"]) }}
       

        </div>
    </div>

</div>
<div class="row">
    <div class="row mb-3">
        <div class="col-6">
            <div class="form-group">
                <?php
                $field_name = 'meta_title';
                $field_label = "Meta Title";
                $field_placeholder = $field_label;
                $required = '';
                ?>
                {{ html()->label($field_label, $field_name) }} {!! fielf_required($required) !!}
                {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <?php
                $field_name = 'meta_keywords';
                $field_label = "Meta Keywords";
                $field_placeholder = $field_label;
                $required = '';
                ?>
                {{ html()->label($field_label, $field_name) }} {!! fielf_required($required) !!}
                {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
            </div>
        </div>
    </div>
    
    <div class="row mb-3">
        <div class="col-12 col-sm-6">
            <div class="form-group">
                <?php
                $field_name = 'meta_description';
                $field_label = "Meta Description";
                $field_placeholder = $field_label;
                $required = '';
                ?>
                {{ html()->label($field_label, $field_name) }} {!! fielf_required($required) !!}
                {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
            </div>
        </div>
        
    </div>
    
</div>
<div class="row">
    <div class="col-12 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'description';
            $field_label = label_case($field_name);
            $field_placeholder = $field_label;
            $required = '';
            ?>
            {{ html()->label($field_label, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
            {{ html()->textarea($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-12">
        <div class="form-group">
            <?php
            $field_name = 'content';
            $field_label = label_case($field_name);
            $field_placeholder = $field_label;
            $required = 'required';
            ?>
            {{ html()->label($field_label, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->textarea($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
</div>

<!-- Select2 Library -->
<x-library.select2 />

<!-- Summernote editor -->
<x-library.summernote />

<!-- File Image -->
@push('after-scripts')
    <script type="module" src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    <script type="module">
        $('#button-image').filemanager('image');


        $(document).ready(function() {
            $(document).on('select2:open', () => {
                document.querySelector('.select2-search__field').focus();
                document.querySelector('.select2-container--open .select2-search__field').focus();
            });

            $('.select2-website').select2({
                theme: "bootstrap4",
                placeholder: '@lang('Select an option')',
                minimumInputLength: 2,
                allowClear: true,
                ajax: {
                    url: '{{ route('backend.websites.index_list') }}',
                    dataType: 'json',
                    data: function(params) {
                        return {
                            q: $.trim(params.term)
                        };
                    },
                    processResults: function(data) {
                        return {
                            results: data
                        };
                    },
                    cache: true
                }
            });
        });
    </script>
@endpush
