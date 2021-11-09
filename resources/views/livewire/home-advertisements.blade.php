<div class="container-fluid mx-auto py-5" id="announcement">
    <div class="row">
        @foreach($advertisements as $advertisement)
            <div class="card bg-gray">
                <div class="card-body">
                    <div class="col-sm-12">
                        <h2 class="title  pb-2">{{ $advertisement->name }}</h2>
                        <p class="text-muted border-bottom pb-2">{{ $advertisement->description}} </p>
                        @foreach($advertisement->places as $place)
                            @include('components.place',['place'=>$place])
                        @endforeach
                    </div>
                </div>
            </div>
            <hr>
        @endforeach
    </div>
</div>
