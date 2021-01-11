@extends("layout.layout")
@section("content")
    <div class="card border-primary marg-3 cont" align="center">
        @csrf
        <div class="card-header bg-primary text-white"><h3>name {{ $user->name}}</h3></div>
        <div class="box-body marg_1">
            <div class="form-group">
                <h2>student Email - <span class="text-primary">{{ $user->email}}</span></h2>
                <h2>status - <span class="text-primary">{{ $user->status}}</span></h2>
                @can('lecturer')
                    <button type="button" class="btn btn-info mr-sm-2">
                        <a class="text-white" href="{{route('mail.create_user', $user->id)}}">
                            send mail
                        </a>
                    </button>
                @endcan
            </div>
        </div>
    </div>
@endsection
