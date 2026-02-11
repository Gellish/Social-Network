@extends('layouts.app')
@section('content')
<div id="app">
    <h1>Contact</h1>
    { !!  form::open(['url' => 'contact.submit]) !!}
        <div class="form-group">
            {{form::label('name,', 'name')}}
            {{form::text('name,', '',['class' => 'form-control','placeholder' => 'Enter name'])}}
        </div>
        <div class="form-group">
            {{form::label('email,', 'e-mail address')}}
            {{form::text('email,', '',['class' => 'form-control','placeholder' => 'email'])}}
        </div>
    <div class="form-group">
        {{form::label('messages,', 'message')}}
        {{form::textarea('messages,', '',['class' => 'form-control','placeholder' => 'message'])}}
    </div>
    <div>
        {{form::submit('submit',['class' => 'btn btn-primary'])}}
    </div>
    {!!  form::close() !!}
</div>
@endsection
