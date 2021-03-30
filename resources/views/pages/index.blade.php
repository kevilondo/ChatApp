@extends('layout.app')

@section('content')
    <div class="container">
            <h1> Welcome to {{config('app.name')}} </h1> <br>

        @if(Auth::guest())
        <div class="card bg-white jumbotron text-center content">
            <p> Log in or Sign up to chat with other users </p>
            <p>
                <a href="/login" class="btn btn-info"> Log in </a>
                <a href="/register" class="btn btn-outline-info"> Sign up </a>
            </p>
        </div>
        @endif

        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo ipsa repellendus, quos error possimus adipisci laboriosam maxime ipsum placeat distinctio provident molestias sequi magni qui eos quis fugiat? Maxime, minima? </p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo ipsa repellendus, quos error possimus adipisci laboriosam maxime ipsum placeat distinctio provident molestias sequi magni qui eos quis fugiat? Maxime, minima? </p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo ipsa repellendus, quos error possimus adipisci laboriosam maxime ipsum placeat distinctio provident molestias sequi magni qui eos quis fugiat? Maxime, minima? </p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo ipsa repellendus, quos error possimus adipisci laboriosam maxime ipsum placeat distinctio provident molestias sequi magni qui eos quis fugiat? Maxime, minima? </p>
    </div>
@endsection