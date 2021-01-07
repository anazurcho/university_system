@extends("layout.layout")
@section("content")
    <div class="card border-primary marg-3 cont" align="center">
        <form method="post" action="{{route('update.course', $course->id)}}">
            @csrf
            @method("PUT")
            <div class="card-header bg-primary text-white"><h3>edit course</h3></div>
            <div class="box-body marg_1">
                <div class="form-group">
                    <h3>{{$course->name}}</h3>
                    <label>name</label>
                    <input type="text" class="form-control" name="name" value="{{old('name', $course->name)}}">
                    <input type="hidden" name="_token" id='csrf_toKen' value="{{ csrf_toKen() }}">
                    <div class="box-footer marg_1">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
