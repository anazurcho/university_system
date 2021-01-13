@extends("layout.layout")
@section("content")
    <div class="container marg-3 " align="center">
        <div>
            <h3>{{$post_tag->name}}</h3>
            <div style="align-items:center;"> {{ $posts->links('vendor.pagination.bootstrap-4') }} </div>
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Post</th>
                    <th scope="col">see more</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <th scope="row">{{$post->id}}</th>
                        <td>{{$post->title}}</td>
                        <td>
                            <button type="button" class="btn btn-info">
                                <a class="text-white" href="{{route('post', $post->id)}}">
                                    open
                                </a>
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
