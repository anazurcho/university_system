@extends("layout.layout")
@section("content")
    <div class="container marg-3" align="center">
        @can('admin', Auth::user())
            <div style="margin-bottom:20px; align-items:center;">
                <button type="button" class="btn btn-info">
                    <a class=" text-white" href="{{route('create.schedule')}}">
                        add schedule
                    </a>
                </button>
            </div>
        @endcan
        <div style="align-items:center;"> {{ $schedules->links('vendor.pagination.bootstrap-4') }} </div>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">lecture</th>
                <th scope="col">day</th>
                <th scope="col">time</th>
            </tr>
            </thead>
            <tbody>
            @foreach($schedules as $schedule)
                <tr>
                    <th scope="row">{{$schedule->id}}</th>
                    <td>{{$schedule->lecture->name}}</td>
                    <td>{{$schedule->day}}</td>
                    <td>{{$schedule->time}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
