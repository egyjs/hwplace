@php
    $multiple = Arr::get($field, 'multiple', true);
    $sortable = Arr::get($field, 'sortable', false);
    $value = old(square_brackets_to_dots($field['name'])) ?? $field['value'] ?? $field['default'] ?? '';

    if (!$multiple && is_array($value)) {
        $value = Arr::first($value);
    }

    $field['wrapper'] = $field['wrapper'] ?? $field['wrapperAttributes'] ?? [];
    $field['wrapper']['data-init-function'] = $field['wrapper']['data-init-function'] ?? 'bpFieldInitBrowseMultipleElement';
    $field['wrapper']['data-elfinder-trigger-url'] = $field['wrapper']['data-elfinder-trigger-url'] ?? url(config('elfinder.route.prefix').'/popup/'.$field['name'].'?multiple=1');

    if (isset($field['mime_types'])) {
        $field['wrapper']['data-elfinder-trigger-url'] .= '&mimes='.urlencode(serialize($field['mime_types']));
    }

    if ($multiple) {
        $field['wrapper']['data-multiple'] = "true";
    } else {
        $field['wrapper']['data-multiple'] = "false";
    }

    if($sortable){
        $field['wrapper']['sortable'] = "true";
    }
@endphp
<style>


</style>
@include('crud::fields.inc.wrapper_start')

<div class="mb-2">
    <label>
        {!! $field['label'] !!}
    </label>
    <div class="btn-group ml-4" role="group" aria-label="..." style="margin-top: 3px;">
        <button type="button" class="browse popup btn btn-sm btn-light">
            <i class="la la-cloud-upload"></i>
            {{ trans('backpack::crud.browse_uploads') }}
        </button>
        <button type="button" class="browse clear btn btn-sm btn-light">
            <i class="la la-eraser"></i>
            {{ trans('backpack::crud.clear') }}
        </button>
    </div>
</div>
@include('crud::fields.inc.translatable_icon')
<div data-js="imagesloaded-progress" class="files-list d-flex justify-content-start" data-field-name="{{ $field['name'] }}">
    <div class="grid-sizer"></div>
    @if ($multiple)
        <input type="hidden" data-marker="multipleBrowseInput" name="{{ $field['name'] }}"
               value="{{ ($value) }}">
    @else
        <input type="text" data-marker="multipleBrowseInput" name="{{ $field['name'] }}" value="{{ $value }}"
               @include('crud::fields.inc.attributes') readonly>
    @endif
</div>


@if (isset($field['hint']))
    <p class="help-block">{!! $field['hint'] !!}</p>
@endif

<script type="text/html" data-marker="browse_multiple_template">
    <div class="input-group input-group-sm">
        <a href="" target="_blank">
            <div class="imgItem">
                <img class="img-thumbnail" src="" alt="">
                <input type="text" @include('crud::fields.inc.attributes') readonly style="display: none;">
                <div class="input-group-btn">
                    <button type="button" class="browse remove btn btn-sm btn-light">
                        <i class="la la-trash"></i>
                    </button>
                    @if($sortable)
                        <button type="button" class="browse move btn btn-sm btn-light"><span class="la la-sort"></span></button>
                    @endif
                </div>
            </div>
        </a>
    </div>
</script>
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
        <link href="{{ asset('packages/jquery-colorbox/example2/colorbox.css') }}" rel="stylesheet" type="text/css"/>
        <style>
            #cboxContent, #cboxLoadedContent, .cboxIframe {
                background: transparent;
            }
            .input-group {
                width: auto;
            }
            .imgItem {
                position: relative;
            }
            .imgItem img {
                width: 150px;
                height: 100px;
                object-fit: fill;
            }
            .imgItem .input-group-btn {
                position: absolute;
                top: 0;
                left: 0;
            }
            .iIcon {
                background: #384c74;
            }
            .files-list {
                flex-wrap: wrap;
            }
            img.icon {
                width: 50px;
                height: 50px;
                margin: 22.5px 45px;
                background: transparent;
                border: none;
            }
        </style>
    @endpush

    @push('crud_fields_scripts')
        <script src="{{ asset('packages/jquery-ui-dist/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('packages/jquery-colorbox/jquery.colorbox-min.js') }}"></script>
{{--        <script src="{{ asset("assets/js/masonry.pkgd.min.js") }}"></script>--}}
        <script src="{{ asset("assets/js/imagesloaded.js") }}"></script>
        <script>
            const imgExtensions = ["png","jpg","jpeg","bmp","gif"];

            function ytVidId(url) {
                let p = /^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/;
                return (url.match(p)) ? RegExp.$1 : false;
            }

            // if ($('input[data-marker=multipleBrowseInput]').val().length > 2) { // empty
            //     var files = JSON.parse($('input[data-marker=multipleBrowseInput]').val());
            //
            //     console.log(files,'input[data-marker=multipleBrowseInput]')
            //     $template = $("[data-marker=browse_multiple_template]").html();
            //     files.forEach(function (file) {
            //         var newInput = $($template);
            //         if (imgExtensions.includes(file.split(".").pop())) {
            //             newInput.find('img').attr('src', '/' + file);
            //         }else if(ytVidId(file)){
            //             newInput.find('img').replaceWith(`<iframe width="190" height="95" src="https://www.youtube.com/embed/${ytVidId(file)}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`);
            //         } else {
            //             newInput.find(".imgItem").addClass("iIcon");
            //             newInput.find('img').addClass("icon").attr('src', "https://cdn.jsdelivr.net/gh/egyjs/mime-types@0.0.3/icons/"+file.split(".").pop()+".png");
            //         }
            //         newInput.find('a').attr('href', '/' + file);
            //         newInput.find('input').val(file);
            //         $(".files-list").append(newInput);
            //     });
            //     debugger;
            //
            // }


            // this global variable is used to remember what input to update with the file path
            // because elfinder is actually loaded in an iframe by colorbox
            var elfinderTarget = false;

            // function to use the files selected inside elfinder
            function processSelectedMultipleFiles(files, requestingField) {
                elfinderTarget.trigger('createInputsForItemsSelectedWithElfinder', [files]);
                elfinderTarget = false;
            }

            function bpFieldInitBrowseMultipleElement(element) {
                var $triggerUrl = element.data('elfinder-trigger-url');
                var $template = element.find("[data-marker=browse_multiple_template]").html();
                var $list = element.find(".files-list");
                var $input = element.find('input[data-marker=multipleBrowseInput]');
                var $multiple = element.attr('data-multiple');
                var $sortable = element.attr('sortable');

                // show existing items - display visible inputs for each stored path
                if ($input.val() != '' && $input.val() != null && $multiple === 'true') {
                    $paths = JSON.parse($input.val());
                    if (Array.isArray($paths) && $paths.length) {
                        // remove any already visible inputs
                        $list.find('.input-group').remove();

                        console.log($paths);

                        // add visible inputs for each item inside the hidden input array
                        $paths.forEach(function (file) {
                            var newInput = $($template);
                            if (imgExtensions.includes(file.split(".").pop())) {
                                newInput.find('img').attr('src', '/' + file);
                            }else if(ytVidId(file)){
                                newInput.find('img').replaceWith(`<iframe width="190" height="95" src="https://www.youtube.com/embed/${ytVidId(file)}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`);
                            } else {
                                newInput.find(".imgItem").addClass("iIcon");
                                newInput.find('img').addClass("icon").attr('src', "https://cdn.jsdelivr.net/gh/egyjs/mime-types@0.0.3/icons/"+file.split(".").pop()+".png");
                            }
                            newInput.find('a').attr('href', '/' + file);
                            newInput.find('input').val(file);
                            $list.append(newInput);
                        });

                    }
                }

                // make the items sortable, if configurations says so
                if ($sortable) {
                    $list.sortable({
                        handle: 'button.move',
                        cancel: '',
                        update: function (event, ui) {
                            element.trigger('saveToJson');
                        }
                    });
                }

                element.on('click', 'button.popup', function (event) {
                    event.preventDefault();

                    // remember which element the elFinder was triggered by
                    elfinderTarget = element;

                    // trigger the elFinder modal
                    $.colorbox({
                        href: $triggerUrl,
                        fastIframe: true,
                        iframe: true,
                        width: '80%',
                        height: '80%'
                    });
                });

                // turn non-hidden inputs into a JSON
                // and save them inside the hidden input that ACTUALLY holds all paths
                element.on('saveToJson', function (event) {
                    var $paths = element.find('input').not('[type=hidden]').map(function (idx, item) {
                        return $(item).val();
                    }).toArray();

                    console.log($paths,'saveToJson')
                    // save the JSON inside the hidden input
                    $input.val(JSON.stringify($paths));
                });

                if ($multiple === 'true') {
                    // remote item button
                    element.on('click', 'button.remove', function (event) {
                        event.preventDefault();
                        $(this).closest('.input-group').remove();
                        element.trigger('saveToJson');
                    });

                    // clear button
                    element.on('click', 'button.clear', function (event) {
                        event.preventDefault();

                        $('.input-group', $list).remove();
                        element.trigger('saveToJson');
                    });

                    // called after one or more items are selected in the elFinder window
                    element.on('createInputsForItemsSelectedWithElfinder', element, function (event, files) {
                        console.log(files,'createInputsForItemsSelectedWithElfinder')
                        files.forEach(function (file) {
                            var newInput = $($template);
                            if (imgExtensions.includes(file.path.split(".").pop())) {
                                newInput.find('img').attr('src', '/' + file.path);
                            }else if(ytVidId(file.path)){
                                // console.log(ytVidId(input.val()))
                                newInput.find('img').replaceWith(`<iframe width="190" height="95" src="https://www.youtube.com/embed/${ytVidId(file.path)}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`);
                            } else {
                                newInput.find(".imgItem").addClass("iIcon");
                                newInput.find('img').addClass("icon").attr('src', "https://cdn.jsdelivr.net/gh/egyjs/mime-types@0.0.3/icons/"+file.path.split(".").pop()+".png");
                            }
                            newInput.find('input').val(file.path);
                            $list.append(newInput);
                        });

                        if ($sortable) {
                            $list.sortable("refresh")
                        }

                        element.trigger('saveToJson');
                    });

                } else {
                    // clear button
                    element.on('click', 'button.clear', function (event) {
                        $input.val('');
                    });

                    // called after an item has been selected in the elFinder window
                    element.on('createInputsForItemsSelectedWithElfinder', element, function (event, files) {
                        $input.val(files[0].path);
                    });
                }
            }
        </script>
    @endpush
@endif

{{-- End of Extra CSS and JS --}}
{{-- ########################################## --}}
