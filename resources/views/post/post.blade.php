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
            <ul>
                @foreach($post->post_comments as $post_comment)
                    <li>
                        #{{$post_comment->user->name}} : {{$post_comment->comment}}
                    </li>
                @endforeach
            </ul>
            <div style="margin-bottom:20px; align-items:center;">
                <form class="form-group my-1 my-lg-1" method="post" enctype="multipart/form-data" action="{{route('post_comments.save', $post->id)}}">
                    <input class="form-control mr-sm-1  @error('comment') is-invalid @enderror" type="text" name='comment' placeholder="Comment">
                    @error('comment')
                      <p class="text-danger">{{$errors->first('comment')}}</p>
                    @enderror
                    <input type="hidden" name="_token" id='csrf_toKen' value="{{ csrf_toKen() }}">
                    <button class="btn btn-secondary my-2 my-sm-0 marg-3" type="submit">add Comment</button>
                </form>
            </div>
        </div>
    </div>
@endsection
