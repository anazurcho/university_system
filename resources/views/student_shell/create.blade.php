@extends("layout.layout")
@section("content")
    <body>
    <div class="container marg-3">
        <form method="post" enctype="multipart/form-data" action="{{route('save.student_shell')}}">
            <div class="box-body">
                <div class="form-group">
                    <div>
                        <label for="lecture_id">lecture Name</label>
                        <select name="lecture_id">
                            @foreach($lectures as $lecture)
                                <option value="{{ $lecture->id }}">{{ $lecture->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="user_id">Student Name</label>
                        <select name="user_id">
                            @foreach($students as $student)
                                <option value="{{ $student->id }}">{{ $student->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <label for="total_score">total score</label>
                    <input type="text" class="form-control @error('total_score') is-invalid @enderror" placeholder="total score"
                           name="total_score"/>
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
