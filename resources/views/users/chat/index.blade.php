@extends('users.layouts.app')
@section('headSection')
@endsection

@section('main-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">Messenger</div>

                <div class="card-body" id="app">
                    <chat-app :user="{{ auth()->user() }}"></chat-app>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footerSection')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
