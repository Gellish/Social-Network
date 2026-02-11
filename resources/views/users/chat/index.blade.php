@extends('users.layouts.app')
@section('headSection')
@endsection

@section('main-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">Messenger</div>

                <div class="card-body">
                    <div id="chat-app" data-user="{{ auth()->user() }}"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footerSection')
    @vite('resources/js/app.js')
@endsection
