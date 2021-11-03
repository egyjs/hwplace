@extends('layout.front')
@push('css')
@endpush

@section('content')


    @livewire('home-places')

@endsection

@push('js')

    <script>
        // Livewire.on('placesFromSearch', ids => { // scroll to "Places" after search
        //     let count = ids.length;
        //     if(count){
        //         document
        //             .getElementById("Places")
        //             .scrollIntoView({ behavior: "smooth" });
        //     }else {
        //         alert("search again")
        //     }
        // })
    </script>
@endpush
