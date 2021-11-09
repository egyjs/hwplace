@push('css')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
@endpush
<div>
    <div class="">

        <div class="row py-3">
            <div class="slider" id="main">
                <div class="slider slider-for">
                    <img src="{{ url($place->image) }}" width="100%" alt="">
                    @dd(($place))
                    @foreach($place->images as $image)
                        <img src="{{ url($image) }}" width="100%" alt="">
                    @endforeach
                </div>
                <div class="slider slider-nav">
                    <img src="{{ url($place->image) }}" width="100%" alt="">
                </div>
                <div class="container-fluid">
                    <h1>{{ $place->name }}</h1>
                    <p>{!! $place->description !!}</p>
                    @for($i = 0; $i <60;$i++)
                        <h1>{{ $i }}</h1>
                    @endfor
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
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: '.slider-nav'
        });
        $('.slider-nav').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.slider-for',
            dots: true,
            centerMode: true,
            focusOnSelect: true
        });
    </script>
@endpush
