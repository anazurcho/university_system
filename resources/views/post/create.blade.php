@extends("layout.layout")
@section("content")
    <div class="container">
        <h3>create new post</h3>
        <form method="post" enctype="multipart/form-data" action="{{route('posts.save')}}">
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Post Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                           placeholder="Title" name="title" value="{{old('title')}}"/>
                    @error('title')
                    <p class="text-danger">{{$errors->first('title')}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Post Content</label>
                    <input type="text" class="form-control @error('content') is-invalid @enderror" placeholder="Content"
                           name="content" value="{{old('content')}}"/>
                    @error('content')
                    <p class="text-danger">{{$errors->first('content')}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tags</label>
                    <select name="post_tags[]" id="" multiple>
                        @foreach($post_tags as $post_tag)
                            <option value="{{ $post_tag->id }}">{{ $post_tag->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <input type="hidden" name="_token" id='csrf_toKen' value="{{ csrf_toKen() }}">
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection
