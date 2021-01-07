@extends("layout.layout")
@section("content")
    <div class="card border-primary marg-3 cont" align="center">
        @csrf
        <div class="card-header bg-primary text-white"><h3>Hello {{ Auth::user()->name}}</h3></div>
        <div class="box-body marg_1">
            <div class="form-group">
                <h2>Your Email - <span class="text-primary">{{ Auth::user()->email}}</span></h2>
                <h2>You are  - <span class="text-primary">{{ Auth::user()->status}}</span></h2>
            </div>
            <button type="button" class="btn btn-info">
                <a class=" text-white" href="{{route('users.edit', Auth::user()->id)}}">
                    edit
                </a>
            </button>
            <button type="button" class="btn btn-info">
                <a class=" text-white" href="{{route('password_edit', Auth::user()->id)}}">
                    change password
                </a>
            </button>
        </div>
    </div>
@endsection
