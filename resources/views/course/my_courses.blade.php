@extends("layout.layout")
@section("content")
    <div class="container marg-3" align="center">
        @can('lecturer')
            <div>
                @can('admin')
                    <h4 class="text-danger">for lecturer</h4>
                @endcan
                <div style="align-items:center;"> {{ $lectures->links('vendor.pagination.bootstrap-4') }} </div>
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        @can('admin')
                            <th scope="col">#</th>
                        @endcan
                        <th scope="col">course</th>
                        <th scope="col">lecture</th>
                        <th scope="col">open</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($lectures as $lecture)
                        <tr>
                            @can('admin')
                                <th scope="row">{{$lecture->id}}</th>
                            @endcan
                            <td>{{$lecture->course->name}}</td>
                            <td>{{$lecture->name}}</td>
                            <td>
                                <button type="button" class="btn btn-info">
                                    <a class="text-white" href="{{route('open.lecture', $lecture->id)}}">
                                        open
                                    </a>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endcan
        @can('student')
            <div>
                @can('admin')
                    <h4 class="text-danger">for student</h4>
                @endcan
                <div style="align-items:center;"> {{ $student_shells->links('vendor.pagination.bootstrap-4') }} </div>
                <table class="table">
                    <tr class="table-success">
                        @can('admin')
                            <th scope="col">#</th>
                        @endcan
                        <th scope="col">course</th>
                        <th scope="col">lecture</th>
                        <th scope="col">Score</th>
                        <th scope="col">Open</th>
                    </tr>
                    <tbody>
                    @foreach($student_shells as $course)
                        <tr>
                            @can('admin')
                                <th scope="row">{{$course->id}}</th>
                            @endcan
                            <td>{{$course->lecture->course->name}}</td>
                            <td>{{$course->lecture->name}}</td>
                            <td>{{$course->total_score}}</td>
                            <td>
                                <button type="button" class="btn btn-info">
                                    <a class="text-white" href="{{route('open.lecture', $course->lecture->id)}}">
                                        open
                                    </a>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endcan
    </div>
@endsection
