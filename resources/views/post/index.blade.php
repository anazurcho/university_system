@extends("layout.layout")
@section("content")
    <div class="container marg-3 " align="center">
        <div>
            <div class="nav navbar-collapse ">
                <div style="margin-bottom:20px; align-items:center;" class="mr-sm-2">
                    <button type="button" class="btn btn-info">
                        <a class=" text-white" href="{{route('my_posts')}}">
                            My Posts
                        </a>
                    </button>
                </div>
                <div style="margin-bottom:20px; align-items:center;" class="mr-sm-2">
                    <button type="button" class="btn btn-info">
                        <a class=" text-white" href="{{route('posts.create')}}">
                            Add Post
                        </a>
                    </button>
                </div>
                <div style="margin-bottom:20px; align-items:center;" class="mr-sm-2">
                    <button type="button" class="btn btn-info">
                        <a class=" text-white" href="{{route('post_tags.all')}}">
                            See Post Tags
                        </a>
                    </button>
                </div>
            </div>

            <h3>{{$title}}</h3>
            <div style="align-items:center;"> {{ $posts->links('vendor.pagination.bootstrap-4') }} </div>
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Post</th>
                    @can("admin")
                        <th scope="col">approve</th>
                        <th scope="col">delete</th>
                    @endcan
                    @if($title == 'My Posts')
                        <th scope="col">status</th>
                    @endif
                    <th scope="col">see more</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <th scope="row">{{$post->id}}</th>
                        <td>{{$post->title}}</td>
                        @can("admin")
                            <td>
                                @if($post->approved)
                                    <a type="submit" class="fa fa-check-square-o btn-approve"
                                       url="{{route('approved', $post->id)}}">approved</a>
                                @else
                                    <a type="submit" class="fa fa-times btn-approve"
                                       url="{{route('approved', $post->id)}}">approved</a>
                                @endif
                            </td>
                            <td>
                                <form method="post" action="{{route('posts.delete', $post->id)}}">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-info">delete</button>
                                </form>
                            </td>
                        @endcan
                        @if($title == 'My Posts')
                            <td>
                                @if($post->approved == 1)
                                    approved
                                @else
                                    not approved yet
                                @endif
                            </td>
                        @endif
                        <td>
                            <button type="button" class="btn btn-info">
                                <a class="text-white" href="{{route('post', $post->id)}}">
                                    open
                                </a>
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
        $(document).on('click', '.btn-approve', function (e) {
            e.preventDefault();
            $this = $(this);
            $.ajax({
                type: 'PUT',
                url: $this.attr('url'),
                success: function (msg) {
                    if ($this.hasClass('fa-check-square-o')) {
                        console.log("not approved");
                        $this.removeClass("fa-check-square-o");
                        $this.addClass("fa-times");
                    } else {
                        console.log("hire");
                        $this.removeClass("fa-times");
                        $this.addClass("fa-check-square-o");
                    }
                    console.log(msg);
                }
            });
        });
    </script>
@endsection
