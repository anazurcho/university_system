@extends("layout.layout")
@section("content")
    <div class="container">
        <h1>send mail to</h1>
        <h3>lecture students #{{$user->name}}</h3>
        <form method="post" enctype="multipart/form-data" action="{{route('users.save_image', $user->id)}}">
            @csrf
            @method("PUT")
            <div class="box-body">
                <div class="form-group">
                    <label for="image">{{__('File Upload')}}</label>
                    <input type="file" class="@error('image') is-invalid @enderror"
                           name="image"/>
                    @error('image')
                    <p class="text-danger">{{$errors->first('image')}}</p>
                    @enderror
                </div>
            </div>
            <input type="hidden" name="_token" id='csrf_toKen' value="{{ csrf_toKen() }}">
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection
