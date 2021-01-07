@extends("layout.layout")
@section("content")
    <div class="card border-primary mb-3 cont" align="center">
        <form method="post" action="{{route('post_login')}}">
            @csrf
            <div class="card-header bg-primary text-white"><h3>Login</h3></div>
            <div class="box-body marg_1">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror">
                    @error('name')
                    <p class="text-danger">{{$errors->first('name')}}</p>
                    @enderror
                    <label>Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                    <p class="text-danger">{{$errors->first('password')}}</p>
                    @enderror
                    <div class="box-footer marg_1">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </div>
                    <a class="nav-link" href="{{ route('register') }}">OR Register</a>
            </div>
        </form>
    </div>
@endsection
