@extends('layouts.master')

@section('title')
    Account
@endsection
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <a class="navbar-brand" href="{{ route('dashboard',['user_id'=>$user_id]) }}">Navbar</a>

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
                    <a href="{{ route('userList',['user_id'=>$user_id]) }}">
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
    <section class="row posts">
        <div class="cold-md-6 col-md-auto">
            <HEADER><h3> What other people say...</h3></HEADER>
            @foreach($users as $user)
                <article class="post">
                    <ul>
                        <li>
                            <a href="{{ route('dashboard',['user_id'=>$user->id]) }}">{{ $user->first_name }}</a>
                        </li>
                    </ul>
                </article>
            @endforeach
        </div>
    </section>
@endsection
