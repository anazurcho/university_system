@extends("layout.layout")
@section("content")
    <body>
    <div class="container marg-3">
        <form method="post" enctype="multipart/form-data" action="{{route('save.schedule')}}">
            <div class="box-body">
                <div class="form-group">
                    <div>
                        <label for="lecture_id">lecturer Name</label>
                        <select name="lecture_id">
                            @foreach($lectures as $lecture)
                                <option value="{{ $lecture->id }}">{{ $lecture->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div  class="marg-4" >
                        <lable for="name">day Name</lable>
                        <select name="name">
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                            <option value="Saturday">Saturday</option>
                            <option value="Sunday">Sunday</option>
                        </select>
                    </div>
                    <div  class="marg-4" >
                        <label for="time">time Name</label>
                        <input type="text" class="form-control @error('time') is-invalid @enderror" placeholder="time"
                               name="time"/>
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
