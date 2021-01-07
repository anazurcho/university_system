@extends("layout.layout")
@section("content")
    <div class="container marg-3" align="center">
        @can('admin')
            <div style="margin-bottom:20px; align-items:center;">
                <button type="button" class="btn btn-info">
                    <a class=" text-white" href="{{route('create.user')}}">
                        add user
                    </a>
                </button>
            </div>
        @endcan
        <div style="align-items:center;"> {{ $users->links('vendor.pagination.bootstrap-4') }} </div>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">USERNAME</th>
                <th scope="col">Email</th>
                <th scope="col">Open</th>
                @can('admin')
                <th scope="col">Status</th>
                    <th scope="col">edit</th>
                    <th scope="col">Change Password</th>
                @endcan
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <button type="button" class="btn btn-info">
                            <a class=" text-white" href="{{route('open.user', $user->id)}}">
                                see
                            </a>
                        </button>
                    </td>
                    @can('admin')
                    <td>{{$user->status}}</td>
                        <td>
                            <button type="button" class="btn btn-info">
                                <a class=" text-white" href="{{route('users.edit', $user->id)}}">
                                    edit
                                </a>
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-info">
                                <a class=" text-white" href="{{route('password_edit', $user->id)}}">
                                    Change Password
                                </a>
                            </button>
                        </td>
                    @endcan
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
