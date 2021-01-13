@extends("layout.layout")
@section("content")
    <div class="container marg-3" align="center">
        @can('admin')
            <div style="margin-bottom:20px; align-items:center;">
                <button type="button" class="btn btn-info">
                    <a class=" text-white" href="{{route('create.student_shell')}}">
                        add Tag
                    </a>
                </button>
            </div>
        @endcan
        <div style="align-items:center;"> {{ $post_tags->links('vendor.pagination.bootstrap-4') }} </div>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">id</th>
                <th scope="col">tag</th>
                <th scope="col">open</th>
            </tr>
            </thead>
            <tbody>
            @foreach($post_tags as $post_tag)
                <tr>
                    <td>{{$post_tag->id}}</td>
                    <td>{{$post_tag->name}}</td>
                    <td>
                        <button type="button" class="btn btn-info">
                            <a class=" text-white" href="{{route('create.student_shell')}}">
                                Open
                            </a>
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
