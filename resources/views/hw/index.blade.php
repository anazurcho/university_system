@extends("layout.layout")
@section("content")
    <div class="container marg-3 " align="center">
        <div>
            <div class="nav navbar-collapse ">
                <h2 class="text-success">
                    lecture #
                    <a class="text-success" href="{{route('open.lecture', $lecture->id)}}">
                        {{$lecture->name}}
                    </a> Home/Works
                </h2>
            </div>
            <div style="align-items:center;"> {{ $hws->links('vendor.pagination.bootstrap-4') }} </div>
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">title</th>
                    <th scope="col">content</th>
                    <th scope="col">due to</th>
                    <th scope="col">see more</th>
                </tr>
                </thead>
                <tbody>
                @foreach($hws as $hw)
                    <tr>
                        <th scope="row">{{$hw->id}}</th>
                        <td>{{$hw->title}}</td>
                        <td>{{$hw->content}}</td>
                        <td>{{$hw->due_to}}</td>
                        <td>
                            <button type="button" class="btn btn-info">
                                <a class="text-white" href="{{route('hw.open', $hw->id)}}">
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
