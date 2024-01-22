@extends('includes.header')

@section('title', 'Login Page')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login-css.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="login_page">
        <div class="img-login">
            <img class=" login-img" src="{{ asset('img/pekabiss_logo.png') }}" alt="">
        </div>
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"
                    aria-label="Close"></button>
            </div>
        @endif
        <div class="form">
            <form class="login_form " action="{{ url('/login') }}" method="post">
                @csrf
                <input name="username" type="text" placeholder="Username" autofocus required>
                <input name="password" type="password"  placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required>
                <button type="submit" name="submit">login</button>
            </form>
        </div>
    </div>
</div>
@endsection


