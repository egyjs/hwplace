@push('crud_fields_styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/suggestags@1.27.0/css/amsify.suggestags.css">
@endpush

<!-- text input -->
@include('crud::fields.inc.wrapper_start')
<label>{!! $field['label'] !!}</label>
@include('crud::fields.inc.translatable_icon')

@if(isset($field['prefix']) || isset($field['suffix'])) <div class="input-group"> @endif
    @if(isset($field['prefix'])) <div class="input-group-prepend"><span class="input-group-text">{!! $field['prefix'] !!}</span></div> @endif
    <input
        type="text"
        name="{{ $field['name'] }}"
        @if (isset($field['with_model']) && $field['with_model'] &&  isset($field['value']))
        value="{{ old(square_brackets_to_dots($field['name'])) ?? isset($field['value'])
? implode(',',$field['value']->pluck('name')->toArray())
: null ?? $field['default'] ?? '' }}"
        @else
        value="{{ old(square_brackets_to_dots($field['name'])) ?? $field['value'] ?? $field['default'] ?? '' }}"
        @endif
        @include('crud::fields.inc.attributes')
    >
    @if(isset($field['suffix'])) <div class="input-group-append"><span class="input-group-text">{!! $field['suffix'] !!}</span></div> @endif
    @if(isset($field['prefix']) || isset($field['suffix'])) </div> @endif

{{-- HINT --}}
@if (isset($field['hint']))
    <p class="help-block">{!! $field['hint'] !!}</p>
@endif
@include('crud::fields.inc.wrapper_end')

@push('crud_fields_scripts')
    <script src="https://cdn.jsdelivr.net/npm/suggestags@1.27.0/js/jquery.amsify.suggestags.min.js"></script>
    <script>
        $('[name="{{ $field['name'] }}"]').amsifySuggestags();
        {{--amsifySuggestags = new AmsifySuggestags($('[name="{{ $field['name'] }}"]'));--}}
        {{--amsifySuggestags._settings({--}}
        {{--    suggestions: {!!  isset($field['suggestions'])? json_encode($field['suggestions']) : json_encode(App\Models\Tag::where('is_active',true)->pluck('name'))  !!}--}}
        {{--})--}}
        {{--amsifySuggestags._init();--}}

        {{--$(document).ready(function(){--}}

        {{--    $(amsifySuggestags.selectors.inputArea).find('input.amsify-suggestags-input').blur(function () {--}}
        {{--        amsifySuggestags.addTag($(this).val())--}}
        {{--        $(this).val('')--}}
        {{--    });--}}

        {{--});--}}
    </script>
@endpush
