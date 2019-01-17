@extends('layout')

@section('content')

    @if ($result['found'] == true)
        {{ $result['user']->username }} has {{ $result['user']->follower_count }} followers
    @else
        User not found
    @endif

@endsection
