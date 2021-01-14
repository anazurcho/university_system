@extends("layout.layout")
@section("content")
    <div class="container marg-3" align="center">
        <h3 class="text-danger">Lecture - {{$lecture->name}}</h3>
        @foreach($lecture->course->course_tags -> pluck('name') as $course_tags)
            #{{ $course_tags }}
        @endforeach
        @can('student')
            <table class="table">
                <tr class="table-success">
                    <th scope="col">id</th>
                    <th scope="col">course</th>
                    <th scope="col">lecture</th>
                    <th scope="col">day</th>
                    <th scope="col">time</th>
                </tr>
                <tbody>
                @foreach($lecture->schedules as $schedule)
                    <tr>
                        <th scope="row">{{$schedule->id}}</th>
                        <td>{{$lecture->course->name}}</td>
                        <td>{{$lecture->name}}</td>
                        <td>{{$schedule->day}}</td>
                        <td>{{$schedule->time}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endcan
        @can('admin')
            <div class="card mb-3 marg-4 " style="max-width: 18rem;">
                <form method="post" enctype="multipart/form-data" action="{{route('save.schedule')}}">
                    <div class="box-body">
                        <div class="form-group marg-4">
                            <div>
                                <label for="lecture_id">lecture</label>
                                <select name="lecture_id">
                                    <option value="{{ $schedule->lecture->id }}">{{ $schedule->lecture->name }}</option>
                                </select>
                            </div>
                            <div class="marg-4">
                                <lable for="name">day</lable>
                                <select name="name">
                                    <option value="Monday">Monday</option>
                                    <option value="Tuesday">Tuesday</option>
                                    <option value="Wednesday">Wednesday</option>
                                    <option value="Thursday">Thursday</option>
                                    <option value="Friday">Friday</option>
                                    <option value="Saturday">Saturday</option>
                                    <option value="Sunday">Sunday</option>
                                </select>
                            </div>
                            <div class="marg-4">
                                <label for="time">time</label>
                                <input type="text" class="form-control  col-md-10 @error('time') is-invalid @enderror"
                                       placeholder="time"
                                       name="time"/>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="_token" id='csrf_toKen' value="{{ csrf_toKen() }}">
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                    <p></p>
                </form>
            </div>
        @endcan
        <button type="button" class="btn btn-info">
            <a class=" text-white" href="{{route('hws.open', $lecture->id)}}">
                See HWs
            </a>
        </button>
        @can('student')
            @if($my_score)
                <td><h3 class="text-danger">My Score - {{$my_score->total_score}}</h3></td>
            @else
                <td></td>
            @endif
        @endcan
        @can('lecturer')
            @if($student_shells)
                <div style="align-items:center;"> {{ $student_shells->links('vendor.pagination.bootstrap-4') }} </div>
                <h3 class="text-danger">Students</h3>
                <div style="margin-bottom:20px; align-items:center;">
                    <button type="button" class="btn btn-info">
                        <a class=" text-white" href="{{route('mail.create', $lecture)}}">
                            send mail to students
                        </a>
                    </button>
                    <button type="button" class="btn btn-info">
                        <a class=" text-white" href="{{route('hws.create', $lecture->id)}}">
                            add hw
                        </a>
                    </button>
                </div>
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">user</th>
                        <th scope="col">course</th>
                        <th scope="col">lecture</th>
                        <th scope="col">lecturer</th>
                        <th scope="col">score</th>
                        <th scope="col">Change Score</th>
                        <th scope="col">see</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($student_shells as $student_shell)
                        <tr>
                            @if($student_shell->user)
                                <td>{{$student_shell->user->name}}</td>
                            @else
                                <td>Not indicated</td>
                            @endif
                            <td>{{$student_shell->lecture->course->name}}</td>
                            <td>{{$student_shell->lecture->name}}</td>
                            <td>{{$student_shell->lecture->user->name}}</td>
                            <td>{{$student_shell->total_score}}</td>
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
                            @if($student_shell->user)
                                <td>
                                    <button type="button" class="btn btn-info">
                                        <a class=" text-white" href="{{route('open.user', $student_shell->user->id)}}">
                                            see
                                        </a>
                                    </button>
                                </td> @else
                                <td>Not indicated</td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>  @else
                <td>without students</td>
            @endif
        @endcan
    </div>
@endsection
