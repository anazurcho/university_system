@extends("layout.layout")
@section("content")
    <div class="card border-primary marg-3 cont" align="center">
        <form method="post" action="{{route('password_update', $user->id)}}">
            @csrf
            @method("PUT")
            <div class="card-header bg-primary text-white"><h3>edit</h3></div>
            <div class="box-body marg_1">
                <div class="form-group">
                    <h4>{{$user->name}}</h4>
                    <label>Password</label>
                    <input type="text" class="form-control  @error('password') is-invalid @enderror" name="password">
                    @error('password')
                    <p class="text-danger">{{$errors->first('password')}}</p>
                    @enderror
                    <input type="hidden" name="_token" id='csrf_toKen' value="{{ csrf_toKen() }}">
                    <div class="box-footer marg_1">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
