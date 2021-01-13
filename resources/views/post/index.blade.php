@extends("layout.layout")
@section("content")
    <script>
        window.onload = () => {
            document.querySelectorAll('.approved').forEach(item => {
                item.addEventListener('click', async ({target}) => {
                    try {
                        const response = await fetch(`/posts/${target.dataset.id}/approved/`, {
                            method: 'PUT',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                            },
                        });
                        let object = document.querySelector(`[data-id="${target.dataset.id}"]`)
                        // console.log(response)
                        if(object.classList.contains('btn-primary')){
                            object.classList.remove('btn-primary')
                            object.classList.add('btn-secondary')
                            object.textContent = "Not Approved"
                        }else{
                            object.classList.remove('btn-secondary')
                            object.classList.add('btn-primary')
                            object.textContent = "Approved"
                        }
                    }
                    catch(err) {
                        console.error(err)
                    }
                })
            })
        };
    </script>
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
                                <button data-id="{{$post->id}}" class="btn @if($post->approved)btn-primary  @else btn-secondary @endif approved">
                                    @if($post->approved) Approved @else Not Approved @endif
                                </button>
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
@endsection
