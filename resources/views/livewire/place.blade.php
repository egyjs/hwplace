@push('css')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <style>
        [dir='rtl'] .slick-next {
            right: auto;
            left: 12px;
        }

        [dir='rtl'] .slick-prev {
            right: 12px;
            left: auto;
            z-index: 14;
        }
        .slider-for img{
            height: 450px !important;
            border-radius: 15px;
            border: 4px solid #fcc206;
            object-fit: cover;
        }
        .slider-nav img{

            height: 150px !important;
            border-radius: 15px;
            /*border: 4px solid #fcc206;*/
            object-fit: cover;
        }

        .slick-active.slick-center img {
            border: 4px solid #fcc206 !important;
            filter: brightness(0.7);
            transition-property: filter;
            transition-duration: 0.60s;
        }
    </style>
@endpush
@if($place->images)
    @php
        $place->images = [$place->image.'?primary'] + $place->images
    @endphp
@endif
<div>
    <div class="">

        <div class="py-3">
            <div class="slick-container container-fluid" style="max-width: 100%; overflow: hidden" id="main">
                <div class="slider slider-for">
                    @foreach($place->images as $image)
                        <div>
                            <img src="{{ url($image) }}" width="100%" alt="">
                        </div>
                    @endforeach
                </div>
                <div class="slider slider-nav">
                    @foreach($place->images as $image)
                        <div class="p-2">
                            <img class=""  src="{{ url($image) }}" width="100%" alt="">
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="container-fluid">
                <h1>{{ $place->name }}</h1>
                @php
                    $string = $place->description;
                    $string = wordwrap($string, 150, ";;", true);
                    $strings = explode(";;", $string);
                    dd($strings);
                @endphp
                <p>{!! $place->description !!}</p>

            </div>
        </div>
    </div>
</div>

</div>

@push('js')
    <!-- slick carousel -->
    <!-- create a carousel and thumbnails -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $('.slider-for').slick({
            rtl: true,
            // arrows: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            // fade: true,
            asNavFor: '.slider-nav'
        });
        $('.slider-nav').slick({
            rtl: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.slider-for',
            dots: true,
            centerMode: true,
            focusOnSelect: true
        });
    </script>
@endpush
