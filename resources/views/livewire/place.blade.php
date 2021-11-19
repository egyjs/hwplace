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
        .place-keyword {
            margin: 5px 4px 4px 0;
            text-transform: uppercase;
            float: left;
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
                <h1>{{ $place->name }}
                    <small class="text-muted">
                        <small>
                            <small>
                                {{ $place->city->name }}
                                <a href="{{ route('search',$place->section->id) }}"><small>({{ $place->section->name }})</small></a>
                            </small>
                        </small>
                    </small>
                </h1>
                @php
                    $iframe = $place->google_map_location;
                    $website = '<a style="direction: ltr;" class="place-website-link btn btn-dark btn-block " target="_blank" href="'.$place->website.'">'.$place->website.'</a>';
                    $place_keywords = $place->keywords;
                    $place_keywords = explode(',',$place_keywords);
                    $place_keywords = '<div class="badge badge-primary place-keyword">'.implode('</div><div class="badge badge-primary place-keyword">',$place_keywords).'</div>';

                    $keyword = ';;;';
                    $divWithKeyword = "<div class='place-info align-left' ".'style="float: left; border: 2px solid #ddd; padding: 12px; margin-right: 9px; "'.">$keyword</div>";


                    $string = $place->description;
                    $stringExploded = explode(" ",$string);
                    if (count($stringExploded) > 100){
                        array_splice( $stringExploded, 100, 0, [$divWithKeyword] );
                    }else{
                        $stringExploded[] = $divWithKeyword;
                    }
                    $string = implode(" ",$stringExploded);
                    $string = str_replace($keyword,$iframe.$website.$place_keywords, $string);
                @endphp
                <p>{!! $string !!}</p>

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
