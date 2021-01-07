@extends("layout.layout")
@section("content")
    <div class="container marg-3" align="center">
        @can('admin', Auth::user())
            <div style="margin-bottom:20px; align-items:center;">
                <button type="button" class="btn btn-info">
                    <a class=" text-white" href="{{route('course.create')}}">
                        add course
                    </a>
                </button>
            </div>
        @endcan
        <div style="align-items:center;"> {{ $courses->links('vendor.pagination.bootstrap-4') }} </div>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Course</th>
                <th scope="col">see more</th>
                @can('admin')
                    <th scope="col">edit</th>
                    <th scope="col">delete</th>
                @endcan
            </tr>
            </thead>
            <tbody>
            @foreach($courses as $course)
                <tr>
                    <th scope="row">{{$course->id}}</th>
                    <td>{{$course->name}}</td>
                    <td>
                        <button type="button" class="btn btn-info">
                            <a class="text-white" href="{{route('course', $course->id)}}">
                                open
                            </a>
                        </button>
                    </td>
                    @can('admin')
                        <td>
                            <button type="button" class="btn btn-info">
                                <a class="text-white" href="{{route('edit.course', $course->id)}}">
                                    edit
                                </a>
                            </button>
                        </td>
                        <td>
                            <form method="post" action="{{route('delete.course', $course->id)}}">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-info">
                                    <span class="text-white">
                                        delete
                                    </span>
                                </button>
                            </form>
                        </td>
                    @endcan

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
