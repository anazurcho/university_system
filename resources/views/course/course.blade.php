@extends("layout.layout")
@section("content")
    <div class="container marg-3 " align="center">
        <div>
            <h3>{{$course->name}}</h3>
            <div>
                @foreach($course -> course_tags -> pluck('name') as $course_tags)
                    #{{ $course_tags }}
                @endforeach
            </div>
            <div class="nav navbar-collapse ">
                @can('admin')
                    <button type="button" class="btn btn-info mr-sm-2">
                        <a class="text-white" href="{{route('edit.course', $course->id)}}">
                            edit
                        </a>
                    </button>
                    <form method="post" action="{{route('delete.course', $course->id)}}" class="mr-sm-2">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-info">
                                    <span class="text-white">
                                        delete
                                    </span>
                        </button>
                    </form>
                @endcan
            </div>
            <div class="container marg-3" align="center">
                <div style="align-items:center;"> {{ $lectures->links('vendor.pagination.bootstrap-4') }}</div>
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Course</th>
                        <th scope="col">lecture</th>
                        <th scope="col">lecturer</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($lectures as $lecture)
                        <tr>
                            <th scope="row">{{$lecture->id}}</th>
                            <td>{{$lecture->course->name}}</td>
                            <td>{{$lecture->name}}</td>
                            <td>{{$lecture->user->name}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="marg-3">
                <form method="post" enctype="multipart/form-data" action="{{route('choose.student_shell')}}">
                    <select name="lecture_id">
                        @foreach($course->lectures as $lecture)
                            <option value="{{ $lecture->id }}">{{ $lecture->name }}</option>
                        @endforeach
                    </select>
                    <input type="hidden" name="_token" id='csrf_toKen' value="{{ csrf_toKen() }}">
                    <div class="box-footer marg-3">
                        <button type="submit" class="btn btn-primary">Choose</button>
                    </div>
                </form>
            </div>
        </div>
@endsection
