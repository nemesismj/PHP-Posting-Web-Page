@extends('layouts.master')
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <a class="navbar-brand" href="{{ route('dashboard',['user_id'=>$loggeduser->id]) }}">Navbar</a>

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
                    <a href="{{ route('userList',['user_id'=>$user]) }}">
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
    @if(Auth::id()==$user->id)
    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">

            <header>
                <h3>
                    What do you have to say?
                </h3>

                <form action="{{route('post.create',['user_id'=>$user])}}" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="title" id="titleofpost" placeholder="Title of your post"><br>
                        <textarea class="form-control" name="body" id="new-post" rows="5"
                                  placeholder="write something">
                        </textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <input type="hidden" value="{{ \Illuminate\Support\Facades\Session::token() }}" name="_token">
                </form>

            </header>
        </div>
        @endif


        <section class="row posts">
            <div class="cold-md-6 col-md-auto">
                <HEADER><h3>  {{$whoseposts}}
                        </h3></HEADER>
                @foreach($posts as $post)
                    <article class="post">
                       <a href="{{ route('posts',['user_id'=>$user,'post_id'=>$post->id]) }}">  <p> {{ $post->title }}</p></a>
                        <div class="info">
                            Posted by {{ $post->user->first_name }} on {{ $post->created_at }} <br>
                        </div>
                    </article>
                    @endforeach
                <hr>
                <HEADER><h3>  All Posts </h3></HEADER>
                @foreach($allPosts as $post)
                    <article class="post">
                        <a href="{{ route('posts',['user_id'=>$post,'post_id'=>$post->id]) }}">  <p> {{ $post->title }}</p></a>
                        <div class="info">
                            Posted by {{ $post->user->first_name }} on {{ $post->created_at }} <br>
                        </div>
                    </article>
                @endforeach
            </div>




        </section>


    </section>



@endsection
