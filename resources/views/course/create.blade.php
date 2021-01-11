@extends("layout.layout")
@section("content")
    <div class="container marg-3">
        <form method="post" enctype="multipart/form-data" action="{{route('save.course')}}">
            <div class="box-body">
                <div class="form-group">
                    <label for="name">Course Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="name"
                           name="name"/>
                    @error('name')
                    <p class="text-danger">{{$errors->first('name')}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="course_tags">Tags</label>
                    <select name="course_tags[]" id="" multiple>
                        @foreach($course_tags as $course_tag)
                            <option value="{{$course_tag->id}}">{{ $course_tag->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <input type="hidden" name="_token" id='csrf_toKen' value="{{ csrf_toKen() }}">
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection
