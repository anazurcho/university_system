@extends("layout.layout")
@section("content")
    <div class="marg-3 cont" align="center">
        <form method="post" enctype="multipart/form-data" action="{{route('save.user')}}">
            <div class="box-body">
                <div class="form-group">
                    <label for="name">User Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="name"
                           name="name"/>
                    <div class="marg-4">
                        <label for="course_id">User Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="email"
                               name="email"/>
                    </div>
                    <div class="marg-4">
                        <label for="user_id">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                               placeholder="password"
                               name="password"/>
                    </div>
                    <div class="marg-4">
                        <label for="user_id">User Status</label>
                        <select name="status">
                            <option value="student">student</option>
                            <option value="lecturer">lecturer</option>
                            <option value="admin">admin</option>
                        </select>
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
