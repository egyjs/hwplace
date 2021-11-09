<div  class="card my-4"> <!-- todo: make it rounded -->
    <div class="row">
        <div class="col-md-3 card-img">
            <a href="{{ route('place',$place->slug)  }}">
                <img class="card-img" src="{{ $place->image }}" alt="" width="100%">
            </a>
        </div>
        <div class="col-md-9">
            <div class="card-body">
                <h3 class="title"><a href="{{ route('place',$place->slug)  }}">{{ $place->name }}</a></h3>
                @if($place->view_rates)
                    <small>
                        @php $rating = $place->rates; @endphp
                        @foreach(range(1,5) as $i)
                            <span class="fa-stack" style="width:1em">
                                <i class="far fa-star fa-stack-1x"></i>
                                @if($rating >0)
                                    @if($rating >0.5)
                                        <i class="fas fa-star fa-stack-1x"></i>
                                    @else
                                        <i class="fas fa-star-half fa-stack-1x"></i>
                                    @endif
                                @endif
                                @php $rating--; @endphp
                            </span>
                        @endforeach
                    </small>
                @endif
                {{-- <p class="text-muted"><span class="glyphicon glyphicon-calendar"></span> July 23, 2014 @ 1:30 PM</p>--}}
                <p>{{ $place->description }}</p>
                <p class="text-muted">
                    محافظة <a href="javascript:void(0)">{{ $place->state->name }}</a>, <a href="#">{{  $place->city->name }}</a></p>
            </div>
        </div>
    </div>
</div>
