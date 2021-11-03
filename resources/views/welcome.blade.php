@extends('layout.front')
@push('css')
@endpush

@section('content')

    @livewire('home-search')


    @livewire('home-advertisements')

@endsection

@push('js')

    <script>
        Livewire.on('placesFromSearch', ids => { // scroll to "Places" after search
            let count = ids.length;
            if(count){
                document
                    .getElementById("Places")
                    .scrollIntoView({ behavior: "smooth" });
            }else {
                alert("search again")
            }
        })
    </script>
{{--    <script src="https://aqarmap.com.eg/builds/js/buildSearchPageV2.min.js?786572eb1-egypt"></script>--}}
@endpush
