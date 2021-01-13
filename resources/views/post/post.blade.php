@extends("layout.layout")
@section("content")
    <div class="container marg-3 ">
        <div align="center">
            <h3>{{$post->title}}</h3>
            <div>
                @foreach($post->post_tags as $post_tag)
                    <a class="text-primary" href="{{route('post_tag', $post_tag->id)}}">
                        #{{ $post_tag->name }}
                    </a>
                @endforeach
            </div>
            <p>{{$post->content}}</p>

        </div>
            <form class="btn btn-danger" method="post" enctype="multipart/form-data" action="{{route('like', $post->id)}}">
                @csrf
                @method("PUT")
                <button type="submit" class="fa fa-heart btn-danger"></button>
            </form>
        <div>
            likes : <i class="fa fa-heart"></i> {{$post->likes}}
        </div>

        <div>
            <h5 class="text-danger">Comments:</h5>
        </div>
    </div>
@endsection
