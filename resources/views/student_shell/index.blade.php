@extends("layout.layout")
@section("content")
    <div class="container marg-3" align="center">
        @can('admin', Auth::user())
            <div style="margin-bottom:20px; align-items:center;">
                <button type="button" class="btn btn-info">
                    <a class=" text-white" href="{{route('create.student_shell')}}">
                        add student shell
                    </a>
                </button>
            </div>
        @endcan
        <h3>Scores</h3>
        <h3>Avg = {{ $avg ?? '' }}</h3>
        <div style="align-items:center;"> {{ $student_shells->links('vendor.pagination.bootstrap-4') }} </div>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                @can('lecturer')
                    <th scope="col">user</th>
                @endcan
                <th scope="col">course</th>
                <th scope="col">lecture</th>
                <th scope="col">lecturer</th>
                <th scope="col">score</th>
                @can('lecturer')
                    <th scope="col">Change Score</th>
                @endcan
            </tr>
            </thead>
            <tbody>
            @foreach($student_shells as $student_shell)
                <tr>
                    @can('lecturer')
                        @if($student_shell->user)
                            <td>{{$student_shell->user->name}}</td>
                        @else
                            <td>Not indicated</td>
                        @endif
                    @endcan
                    <td>{{$student_shell->lecture->course->name}}</td>
                    <td>{{$student_shell->lecture->name}}</td>
                    @if($student_shell->lecture->user)
                        <td>{{$student_shell->lecture->user->name}}</td>
                    @else
                        <td>Not indicated</td>
                    @endif
                    <td>{{$student_shell->total_score}}</td>
                    @can('lecturer', Auth::user())
                        <td>
                            <form class="form-inline" method="post" enctype="multipart/form-data"
                                  action="{{route('change_score.student_shell', $student_shell->id)}}">
                                @csrf
                                @method("PUT")
                                <input class="form-control mr-sm-1  col-md-3" type="text" placeholder="score"
                                       name="total_score">
                                <button class="btn btn-secondary mr-sm-1 col-md-4" type="submit">+ Score</button>
                            </form>
                        </td>
                    @endcan
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
