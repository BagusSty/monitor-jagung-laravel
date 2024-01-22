@extends('includes.header')

@section('title', 'Dashboard')

@section('content')
<h1>Hello World</h1>
<a href="{{ url('/logout') }}" class="btn btn-primary">Logout</a>
@endsection


