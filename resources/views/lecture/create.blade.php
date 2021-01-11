@extends("layout.layout")
@section("content")
    <div class="container marg-3">
        <form method="post" enctype="multipart/form-data" action="{{route('save.lecture')}}">
            <div class="box-body">
                <div class="form-group">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <label for="name">lecture Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="name"
                           name="name"/>
                    @error('name')
                    <p class="text-danger">{{$errors->first('name')}}</p>
                    @enderror
                    <div class="marg-4">
                        <label for="course_id">Course Name</label>
                        <select name="course_id" class="@error('course_id') is-invalid @enderror">
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                            @endforeach
                        </select>
                        @error('course_id')
                        <p class="text-danger">{{$errors->first('course_id')}}</p>
                        @enderror
                    </div>
                    <div class="marg-4">
                        <label for="user_id">lecturer Name</label>
                        <select name="user_id" class="@error('user_id') is-invalid @enderror">
                            @foreach($lecturers as $lecturer)
                                <option value="{{ $lecturer->id }}">{{ $lecturer->name }}</option>
                            @endforeach
                        </select>
                        @error('user_id')
                        <p class="text-danger">{{$errors->first('user_id')}}</p>
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
