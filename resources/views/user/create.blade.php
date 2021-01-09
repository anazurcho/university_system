@extends("layout.layout")
@section("content")
    <div class="marg-3 cont" align="center">
        <form method="post" enctype="multipart/form-data" action="{{route('save.user')}}">
            <div class="box-body">
                <div class="form-group">
                    <label for="name">User Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="name"
                           name="name"/>
                    @error('name')
                    <p class="text-danger">{{$errors->first('name')}}</p>
                    @enderror
                    <div class="marg-4">
                        <label for="course_id">User Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="email"
                               name="email"/>
                    </div>
                    @error('email')
                    <p class="text-danger">{{$errors->first('email')}}</p>
                    @enderror
                    <div class="marg-4">
                        <label for="user_id">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                               placeholder="password"
                               name="password"/>
                        @error('password')
                        <p class="text-danger">{{$errors->first('password')}}</p>
                        @enderror
                    </div>
                    <div class="marg-4">
                        <label for="status">User Status</label>
                        <select name="status">
                            <option value="student">student</option>
                            <option value="lecturer">lecturer</option>
                            <option value="admin">admin</option>
                        </select>
                        @error('status')
                        <p class="text-danger">{{$errors->first('status')}}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <input type="hidden" name="_token" id='csrf_toKen' value="{{ csrf_toKen() }}">
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection
