@push('crud_fields_styles')

@endpush

<!-- text input -->
@include('crud::fields.inc.wrapper_start')
<label>{!! $field['label'] !!}</label>
@include('crud::fields.inc.translatable_icon')

<div class="input-group mb-3">
    <input type="text" data-for="{{ $field['browse_name'] }}" class="form-control" placeholder="{{ $field['label'] }}">
    <div class="input-group-append">
        <button type="button" class="btn btn-success" id="{{ $field['browse_name'] }}_plus_btn">+</button>
    </div>
</div>



{{-- HINT --}}
@if (isset($field['hint']))
    <p class="help-block">{!! $field['hint'] !!}</p>
@endif
@include('crud::fields.inc.wrapper_end')

@push('crud_fields_scripts')
    <script>
        //$('[name="{{ $field['browse_name'] }}_plus_btn"]').val();
        function ytVidId(url) {
            var p = /^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/;
            return (url.match(p)) ? RegExp.$1 : false;
        }
        $('#{{ $field['browse_name'] }}_plus_btn').click(function (){

            let input = $('input[data-for="{{ $field['browse_name'] }}"]');
            let forInput = $('input[name="{{ $field['browse_name'] }}"]');
            if(input.val().length > 0){
                console.log(forInput.val())
                let $oldJson = forInput.val() ===  '""'? [] : JSON.parse(forInput.val())

                console.log($oldJson)
                $oldJson.push(input.val());
                // console.log($oldJson.push(input.val()))
                forInput.val(JSON.stringify($oldJson))

                let $template = $("[data-marker=browse_multiple_template]").html();

                var newInput = $($template);

                newInput.find(".imgItem").addClass("iIcon");
                if(ytVidId(input.val())){
                    // console.log(ytVidId(input.val()))
                    newInput.find('img').replaceWith(`
                    <iframe width="190" height="95" src="https://www.youtube.com/embed/${ytVidId(input.val())}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    `);

                }else{
                    newInput.find('img').addClass("icon").attr('src', "https://cdn.jsdelivr.net/gh/egyjs/mime-types@0.0.3/icons/"+(input.val()).split(".").pop()+".png");
                }

                newInput.find('a').attr('href', input.val());
                newInput.find('input').val(input.val());
                $(".files-list").append(newInput);

                // console.log(newInput)
            }
            input.val('')


        });
    </script>
@endpush
