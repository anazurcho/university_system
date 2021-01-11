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
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name', $course->name)}}">
                    @error('name')
                    <p class="text-danger">{{$errors->first('name')}}</p>
                    @enderror
                    <div class="form-group">
                        <label for="course_tags">Tags</label>
                        <select name="course_tags[]" id="" multiple>
                            @foreach($course_tags as $course_tag)
                                <option value="{{ $course_tag->id }}" @if(in_array($course_tag->id, $course->course_tags->pluck('id')->toArray())) selected @endif>{{ $course_tag->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="hidden" name="_token" id='csrf_toKen' value="{{ csrf_toKen() }}">
                    <div class="box-footer marg_1">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
