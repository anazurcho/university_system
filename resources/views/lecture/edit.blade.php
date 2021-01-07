@extends("layout.layout")
@section("content")
    <body>
    <div class="container marg-3">
        <form method="post" enctype="multipart/form-data" action="{{route('update.lecture', $lecture->id)}}">
            @csrf
            @method("PUT")
            <div class="box-body">
                <div class="form-group">
                    <label for="name">lecture Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="name"
                           value="{{old('name', $lecture->name)}}" name="name"/>
                    <div class="marg-4">
                        <label for="course_id">Course Name</label>
                        <select name="course_id">
                            @foreach($courses as $course)
                                @if (old('course_id', $lecture->course_id) ==$course->id))
                                <option value="{{ $course->id }}" selected>{{ $course->name }}</option>
                                @else
                                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="marg-4">
                        <label for="user_id">lecturer Name</label>
                        <select name="user_id">
                            @foreach($lecturers as $lecturer)
                                @if (old('user_id', $lecture->user_id) ==$lecturer->id))
                                <option value="{{ $lecturer->id }}" selected>{{ $lecturer->name }}</option>
                                @else
                                    <option value="{{ $lecturer->id }}">{{ $lecturer->name }}</option>
                                @endif
                            @endforeach
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
    </body>
@endsection
