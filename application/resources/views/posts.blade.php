@extends('layouts.master')
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <script  type="text/javascript" src="{{ \Illuminate\Support\Facades\URL::to('/src/js/app.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <a class="navbar-brand" href="{{ route('dashboard',['user_id'=>$loggeduser]) }}">Navbar</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">

        </div>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">

        </div>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">

        </div>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">

        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="{{ route('userList',['user_id'=>$loggeduser]) }}">
                        User List
                    </a>
                </li>
            </ul>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="{{ route('account') }}">
                        My Account
                    </a>
                </li>
            </ul>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="{{ route('logout') }}">
                        Log Out
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>
@section('content')
    @include('includes.message-block')

    <section class="row new-post">

        <section class="row posts">
            <div class="cold-md-6 col-md-auto">
                <HEADER><h3> Post</h3></HEADER>
                    <article class="post1" data-postId="{{ $posts->id }}">
                        <p> {{ $posts->title }}</p>
                         <p> {{ $posts->body }}</p></a>
                        <div class="info">
                            Posted by {{ $posts->user->first_name }} on {{ $posts->created_at }} <br>
                            Count of views {{$posts->view_count}}
                        </div>
                        <div class="interaction1">
                            <a href="#" class="like"> {{ \Illuminate\Support\Facades\Auth::user()->likes()->where('post_id',$posts->id)->first() ? \Illuminate\Support\Facades\Auth::user()->likes()->where('post_id',$posts->id)->first()->like == 1 ? 'You liked this post' : 'Like' : 'Like' }} </a> |
                            <a href="#" class="like"> {{ \Illuminate\Support\Facades\Auth::user()->likes()->where('post_id',$posts->id)->first() ? \Illuminate\Support\Facades\Auth::user()->likes()->where('post_id',$posts->id)->first()->like == 0 ? 'You disliked this post' : 'Dislike' : 'Dislike' }} </a>

                            @if(Auth::user()==$posts->user)
                                |
                                <a href="#" class="edit">Edit</a> |
                                <a href="{{ route('post.delete', ['post_id'=>$posts->id]) }}"> Delete </a>
                            @endif()
                        </div>
                    </article>
            </div>
        </section>

    </section>
    <div class="modal fade" tabindex="-1" role="dialog" id="edit-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Post</h4>
                </div>
                <div class="modal-body">
                   <form>
                       <div class="form-group">
                           <label for="post-title">Edit the Title</label>
                           <input type="text" name="post-title" id="post-title" class="form-control" placeholder="Title">
                           <label for="post-body" >Edit the Body</label>
                           <textarea name="post-body" class="form-control" id="post-body" rows="5"></textarea>
                       </div>
                   </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="modal-save">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

<script>
    var token = '{{ Session::token() }}';
    var urlEdit= '{{ route('edit',['post_id'=>$posts->id]) }}';
    var urlLike= '{{ route('like',['post_id'=>$posts->id]) }}';

</script>
@endsection
