@extends('layouts.app')

@section('content')

<div class="jumbotron mt-5 text-center">
    <h1 class="display-4">{{$title}}</h1>
    <p class="lead">amethyst.me</p>
    <hr class="my-4">
    <p>Hello!, and Welcome :)</p>
    <a class="btn btn-primary btn-lg" href="#" role="button">LOGIN</a>
    <a class="btn btn-info btn-lg" href="#" role="button">REGISTER</a>
</div>

@endsection

