@extends("layout.layout")
@section("content")
    <div class="card border-primary marg-3 cont" align="center">
        <form method="post" action="{{route('users.update', $user->id)}}">
            @csrf
            @method("PUT")
            <div class="card-header bg-primary text-white"><h3>edit</h3></div>
            <div class="box-body marg_1">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name', $user->name)}}">
                    @error('name')
                    <p class="text-danger">{{$errors->first('name')}}</p>
                    @enderror
                    <label>Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email', $user->email)}}">
                    @error('email')
                    <p class="text-danger">{{$errors->first('email')}}</p>
                    @enderror
                    @can('admin')
                        <label>status</label>
                        <input type="text" class="form-control @error('status') is-invalid @enderror" name="status" value="{{old('status', $user->status)}}">
                        @error('status')
                        <p class="text-danger">{{$errors->first('status')}}</p>
                        @enderror
                    @endcan
                    <input type="hidden" name="_token" id='csrf_toKen' value="{{ csrf_toKen() }}">
                    <div class="box-footer marg_1">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
