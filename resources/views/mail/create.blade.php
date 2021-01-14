@extends("layout.layout")
@section("content")
    <div class="container">
        <h1>send mail to</h1>
        <h3>lecture students #{{$lecture->name}}</h3>
        <form method="post" enctype="multipart/form-data" action="{{route('mail.send', $lecture->id)}}">
            <div class="box-body">
                <div class="form-group">
                    <label for="name">mail</label>
                    <input type="text" class="form-control @error('mail') is-invalid @enderror"
                           placeholder="mail" name="mail" value="{{$students}}" readonly/>
                    @error('mail')
                    <p class="text-danger">{{$errors->first('mail')}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="subject">subject</label>
                    <input type="text" class="form-control @error('subject') is-invalid @enderror"
                           placeholder="subject" name="subject"/>
                    @error('subject')
                    <p class="text-danger">{{$errors->first('subject')}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="text">text</label>
                    <input type="text" class="form-control @error('text') is-invalid @enderror"
                           placeholder="text" name="text"/>
                    @error('text')
                    <p class="text-danger">{{$errors->first('text')}}</p>
                    @enderror
                </div>
            </div>
            <input type="hidden" name="_token" id='csrf_toKen' value="{{ csrf_toKen() }}">
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Send</button>
            </div>
        </form>
    </div>
@endsection
