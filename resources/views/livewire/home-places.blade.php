<div class="container mx-auto p-5" id="Places">

    @if($sectionAds->count())
    <div class="announcement">
        <a href="{{ route('place',$sectionAds->first()->place->slug) }}">
            <img src="{{ url($sectionAds->first()->image) }}" width="100%" alt="{{ $sectionAds->first()->place->name }}">
        </a>
    </div>
    @endif

    <div class="mt-10  mx-auto">
        @foreach($places as $place)
            @include('components.place',['place'=>$place])
        @endforeach
    </div>
</div>
