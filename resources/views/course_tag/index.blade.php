@extends("layout.layout")
@section("content")
    <div class="container marg-3" align="center">
        @can('admin')
            <div style="margin-bottom:20px; align-items:center;">
                <button type="button" class="btn btn-info">
                    <a class=" text-white" href="{{route('create.course_tag')}}">
                        add course tag
                    </a>
                </button>
            </div>
        @endcan
        <div style="align-items:center;"> {{ $course_tags->links('vendor.pagination.bootstrap-4') }} </div>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">course tag</th>
                <th scope="col">see more</th>
{{--                @can('admin')--}}
{{--                    <th scope="col">edit</th>--}}
{{--                    <th scope="col">delete</th>--}}
{{--                @endcan--}}
            </tr>
            </thead>
            <tbody>
            @foreach($course_tags as $course_tag)
                <tr>
                    <th scope="row">{{$course_tag->id}}</th>
                    <td>{{$course_tag->name}}</td>
                    <td>
                        <button type="button" class="btn btn-info">
                            <a class="text-white" href="{{route('course_tag', $course_tag->id)}}">
                                open
                            </a>
                        </button>
                    </td>
{{--                    @can('admin')--}}
{{--                        <td>--}}
{{--                            <button type="button" class="btn btn-info">--}}
{{--                                <a class="text-white" href="{{route('edit.course', $course_tag->id)}}">--}}
{{--                                    edit--}}
{{--                                </a>--}}
{{--                            </button>--}}
{{--                        </td>--}}
{{--                        <td>--}}
{{--                            <form method="post" action="{{route('delete.course', $course->id)}}">--}}
{{--                                @csrf--}}
{{--                                @method("DELETE")--}}
{{--                                <button type="submit" class="btn btn-info">--}}
{{--                                    <span class="text-white">--}}
{{--                                        delete--}}
{{--                                    </span>--}}
{{--                                </button>--}}
{{--                            </form>--}}
{{--                        </td>--}}
{{--                    @endcan--}}
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
