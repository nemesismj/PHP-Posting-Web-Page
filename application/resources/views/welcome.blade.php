@extends('layouts.master')
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <a class="navbar-brand" href="#">Navbar</a>

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
                </li>
            </ul>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>

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
@section('title')
    Welcome!
@endsection
@section('content')
 @include('includes.message-block')
    <div class="row">
        <div class="col-md-6">
            <h3> Sign up</h3>
            <form action="{{ route('signup') }}" method="post">
                <div class="form-group {{ $errors -> has('email') ? 'has-error' : '' }}">
                    <label for="email"> Your E-Mail</label>
                    <input class="form-control" type="text" name="email" id="email"
                           value="{{\Illuminate\Support\Facades\Request::old('email')}}">
                </div>
                <div class="form-group">
                    <label for="first_name"> Your First Name</label>
                    <input class="form-control" type="text" name="first_name" id="first_name"
                           value="{{\Illuminate\Support\Facades\Request::old('first_name')}}">
                </div>
                <div class="form-group">
                    <label for="password"> Your Password</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <input type="hidden" name="_token" value="{{ \Illuminate\Support\Facades\Session::token() }}">
            </form>
        </div>
        <div class="col-md-6">
            <h3> Sign in</h3>
            <form action="{{ route('signin') }}" method="get">
                <div class="form-group">
                    <label for="email"> Your E-Mail</label>
                    <input class="form-control" type="text" name="email" id="email"
                           value="{{\Illuminate\Support\Facades\Request::old('email')}}">
                </div>
                <div class="form-group">
                    <label for="password"> Your Password</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <input type="hidden" name="_token" value="{{ \Illuminate\Support\Facades\Session::token() }}">
            </form>
        </div>
    </div>
@endsection
