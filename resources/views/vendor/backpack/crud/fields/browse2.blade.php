@php
    $field['data-elfinder-trigger-url'] = url(config('elfinder.route.prefix').'/popup/'.$field['name']."?");
    if (isset($field['mime_types'])) {
            $field['data-elfinder-trigger-url'] .= '&mimes='.urlencode(serialize($field['mime_types']));
    }
@endphp
<!-- browse server input -->

@include('crud::fields.inc.wrapper_start')

    <label>{!! $field['label'] !!}</label>
    @include('crud::fields.inc.translatable_icon')
    <div class="controls input-group">
        <div class="input-group-append" id="img-browse">
            <img id="placeholder_{{ $field['name'] }}" src="{{ isset($field['value']) ? asset($field['value']) : asset('assets/images/placeholder.jpg') }}" width="100%" alt="">
            <button type="button" data-inputid="{{ $field['name'] }}-filemanager" class="btnAddImage btn btn-light btn-sm popup_selector"><i class="la la-cloud-upload"></i> {{ trans('backpack::crud.browse_uploads') }}</button>
            <button type="button" data-inputid="{{ $field['name'] }}-filemanager" class="btnRemoveImage btn btn-link btn-sm clear_elfinder_picker">
                <i class="la la-close text-white la-2x"></i></button>
        </div>
        <input
            type="hidden"
            name="{{ $field['name'] }}"
            value="{{ old(square_brackets_to_dots($field['name'])) ?? $field['value'] ?? $field['default'] ?? '' }}"
            data-init-function="bpFieldInitBrowseElement"

            data-elfinder-trigger-url="{{ $field['data-elfinder-trigger-url'] }}"
            @include('crud::fields.inc.attributes')

            @if(!isset($field['readonly']) || $field['readonly']) readonly @endif
        >


	</div>

	@if (isset($field['hint']))
        <p class="help-block">{!! $field['hint'] !!}</p>
    @endif

@include('crud::fields.inc.wrapper_end')

{{-- ########################################## --}}
{{-- Extra CSS and JS for this particular field --}}
{{-- If a field type is shown multiple times on a form, the CSS and JS will only be loaded once --}}
@if ($crud->fieldTypeNotLoaded($field))
	@php
		$crud->markFieldTypeAsLoaded($field);
	@endphp

	{{-- FIELD CSS - will be loaded in the after_styles section --}}
    @push('crud_fields_styles')
		<!-- include browse server css -->
		<link href="{{ asset('packages/jquery-colorbox/example2/colorbox.css') }}" rel="stylesheet" type="text/css" />
		<style>
			#cboxContent, #cboxLoadedContent, .cboxIframe {
				background: transparent;
			}
            #img-browse {
                position: relative;
                overflow: hidden;
            }
            #img-browse .btnRemoveImage {
                position: absolute;
                z-index: 10;
            }
            #img-browse .btnAddImage {
                position: absolute;
                z-index: 8;
                width: 100%;
                height: 100%;
                top: 0; left: 0; right: 0;
                opacity: 0;
            }

		</style>
	@endpush

    @push('crud_fields_scripts')
		<!-- include browse server js -->
		<script src="{{ asset('packages/jquery-colorbox/jquery.colorbox-min.js') }}"></script>
		<script type="text/javascript">
			// this global variable is used to remember what input to update with the file path
			// because elfinder is actually loaded in an iframe by colorbox
			var elfinderTarget = false;

			// function to update the file selected by elfinder
			function processSelectedFile(filePath, requestingField) {
				elfinderTarget.val(filePath.replace(/\\/g,"/")).trigger('change');
                $('#placeholder_{{ $field['name'] }}').attr('src','/'+filePath.replace(/\\/g,"/"))
                elfinderTarget = false;
			}

			function bpFieldInitBrowseElement(element) {
				var triggerUrl = element.data('elfinder-trigger-url')
				var name = element.attr('name');
                var placeholder =  $('#placeholder_{{ $field['name'] }}');


				element.siblings('.input-group-append').children('button.popup_selector').click(function (event) {
				    event.preventDefault();

				    elfinderTarget = element;

				    // trigger the reveal modal with elfinder inside
				    $.colorbox({
				        href: triggerUrl,
				        fastIframe: true,
				        iframe: true,
				        width: '90%',
				        height: '75%'
				    });
				});

				element.siblings('.input-group-append').children('button.clear_elfinder_picker').click(function (event) {
				    event.preventDefault();
				    element.val("");
                    placeholder.attr('src','{{ asset('assets/images/placeholder.jpg') }}')
				});
			}
		</script>
	@endpush

@endif

{{-- End of Extra CSS and JS --}}
{{-- ########################################## --}}
