@extends("layout.layout")
@section("content")
    <div class="card border-primary marg-3 cont" align="center">
        @csrf
        <div class="card-header bg-primary text-white"><h3>name {{ $user->name}}</h3></div>
        <div class="box-body marg_1">
            <div class="form-group">
                <div>
                    <img src="{{asset('images/'.$user->image)}}" alt="" width="10%">
                </div>
                <h2>Email - <span class="text-primary">{{ $user->email}}</span></h2>
                <h2>status - <span class="text-primary">{{ $user->status}}</span></h2>

                @can('lecturer')
                    <button type="button" class="btn btn-info mr-sm-2">
                        <a class="text-white" href="{{route('mail.create_user', $user->id)}}">
                           Send mail
                        </a>
                    </button>
                @endcan
                @can('admin')
                    <button type="button" class="btn btn-info mr-sm-2">
                        <a class="text-white" href="{{route('users.upload_image', $user->id)}}">
                            Upload Image
                        </a>
                    </button>
                    <form method="post" action="{{route('users.delete', $user->id)}}" class="marg-4">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-info">Delete user</button>
                    </form>
                @endcan
            </div>
        </div>
    </div>
@endsection
