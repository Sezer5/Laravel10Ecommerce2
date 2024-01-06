@extends('layouts.frontbase')

@section('title', 'E-Commerce')


@section('content')
    @include('home.sidebar')
    <div class="col-sm-9 padding-right">
        <h2 class="title text-center">User</h2>
        @include('auth.register')


    </div>
@endsection
