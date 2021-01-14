@extends("layout.layout")
@section("content")
    <div class="container">
        <h1>HW</h1>
        <h4 class="text-success">
            lecture #
            <a class="text-success" href="{{route('open.lecture', $lecture->id)}}">
                {{$lecture->name}}
            </a>
        </h4>
        <form method="post" enctype="multipart/form-data" action="{{route('hws.save', $lecture->id)}}">
            <div class="box-body">
                <div class="form-group">
                    <label for="name">title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                           placeholder="title" name="title"/>
                    @error('title')
                    <p class="text-danger">{{$errors->first('title')}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="subject">content</label>
                    <input type="text" class="form-control @error('content') is-invalid @enderror"
                           placeholder="content" name="content"/>
                    @error('content')
                    <p class="text-danger">{{$errors->first('content')}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="subject">due</label>
                    <input type="date" class="form-control @error('due_to') is-invalid @enderror"
                           placeholder="due_to" name="due_to" min="2021-01-01"/>
                    {{--                    type="date" name="begin"--}}
                    {{--                    placeholder="dd-mm-yyyy" value=""--}}
                    {{--                    min="1997-01-01" max="2030-12-31--}}
                    @error('due_to')
                    <p class="text-danger">{{$errors->first('due_to')}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="image">{{__('File Upload')}}</label>
                    <input type="file" class="@error('image') is-invalid @enderror"
                           name="image"/>
                    @error('image')
                    <p class="text-danger">{{$errors->first('image')}}</p>
                    @enderror
                </div>
                <input type="hidden" name="_token" id='csrf_toKen' value="{{ csrf_toKen() }}">
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </div>
        </form>
    </div>
@endsection
