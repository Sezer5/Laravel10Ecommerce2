@extends('layouts.frontbase')

@section('title', 'E-Commerce')


@section('content')
    @include('home.user.usermenu')
    <div class="col-sm-9 padding-right">
        <h2 class="title text-center">User Profile</h2>
        @include('profile.show')


    </div>
@endsection
