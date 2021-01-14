@extends("layout.layout")
@section("content")
    <div class="container marg-3 ">
        <h4 class="text-success">
            lecture #
            <a class="text-success" href="{{route('open.lecture', $hw->lecture->id)}}">
                {{$hw->lecture->name}}
            </a>
        </h4>
        <h4 class="text-success">
            <a class="text-success" href="{{route('hws.open', $hw->lecture->id)}}">
                lecture hws#
            </a>
        </h4>
        <div align="center">
            @if($hw->image)
            <div>
                <img src="{{asset('hws/'.$hw->image)}}" alt="" width="50%">
                <a class="text-danger" href={{route('hw.file', $hw->id)}}>Click to Download File </a>
            </div>
            @endif
            <h3 class="text-success">{{$hw->title}}</h3>
            <p>{{$hw->content}}</p>
        </div>
        <p class="text-danger">due to {{$hw->due_to}}</p>
    </div>
@endsection
