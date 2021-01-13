@extends("layout.layout")
@section("content")
    <div class="container marg-3" align="center">
        @can('admin')
            <div style="margin-bottom:20px; align-items:center;">
                <form class="form-inline my-1 my-lg-0" method="post" enctype="multipart/form-data" action="{{route('post_tags.save')}}">
                    <input class="form-control mr-sm-1  @error('name') is-invalid @enderror" type="text" name='name' placeholder="Post Tag Name">
                    @error('name')
                    <p class="text-danger">{{$errors->first('name')}}</p>
                    @enderror
                    <input type="hidden" name="_token" id='csrf_toKen' value="{{ csrf_toKen() }}">
                    <button class="btn btn-secondary my-2 my-sm-0" type="submit">add Tag</button>
                </form>
            </div>
        @endcan
        <div style="align-items:center;"> {{ $post_tags->links('vendor.pagination.bootstrap-4') }} </div>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">id</th>
                <th scope="col">tag</th>
                <th scope="col">open</th>
                @can('admin')
                    <th scope="col">delete</th>
                @endcan
            </tr>
            </thead>
            <tbody>
            @foreach($post_tags as $post_tag)
                <tr>
                    <td>{{$post_tag->id}}</td>
                    <td>{{$post_tag->name}}</td>
                    <td>
                        <button type="button" class="btn btn-info">
                            <a class=" text-white" href="{{route('post_tag', $post_tag->id)}}">
                                Open
                            </a>
                        </button>
                    </td>
                    @can('admin')
                        <td>
                            <form method="post" action="{{route('post_tags.delete', $post_tag->id)}}">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-info">delete</button>
                            </form>
                        </td>
                    @endcan
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
