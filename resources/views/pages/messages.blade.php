@extends('layouts.app')
@section('content')
<h1>Messages</h1>
<p>Lorem</p>
@if(count($messages) > 0)
    @foreach($messages as $message)
        <ul class="list-group">
            <li class="list-group-item"> Name:      {{$message->name}} </li>
            <li class="list-group-item"> Email:     {{$message->email}} </li>
            <li class="list-group-item"> Messages:  {{$message->$message}} </li>
        </ul>
    @endforeach
@endif
@endsection
@section('sidebar')
    @parent
    <p>this is append to the sidebar</p>
@endsection