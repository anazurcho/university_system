@extends("layout.layout")
@section("content")
    <body>
    <div class="container marg-3">
        <form method="post" enctype="multipart/form-data" action="{{route('save.schedule')}}">
            <div class="box-body">
                <div class="form-group">
                    <div>
                        <label for="lecture_id">lecturer Name</label>
                        <select name="lecture_id" class="@error('lecture_id') is-invalid @enderror">
                            @foreach($lectures as $lecture)
                                <option value="{{ $lecture->id }}">{{ $lecture->name }}</option>
                            @endforeach
                        </select>
                        @error('lecture_id')
                        <p class="text-danger">{{$errors->first('lecture_id')}}</p>
                        @enderror
                    </div>
                    <div  class="marg-4" >
                        <lable for="day">day Name</lable>
                        <select name="day" class=" @error('day') is-invalid @enderror">
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                            <option value="Saturday">Saturday</option>
                            <option value="Sunday">Sunday</option>
                        </select>
                        @error('day')
                        <p class="text-danger">{{$errors->first('day')}}</p>
                        @enderror
                    </div>
                    <div  class="marg-4" >
                        <label for="time">time Name</label>
                        <input type="text" class="form-control @error('time') is-invalid @enderror" placeholder="time"
                               name="time"/>
                        @error('time')
                        <p class="text-danger">{{$errors->first('time')}}</p>
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
    </body>
@endsection
