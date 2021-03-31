@extends('layout.app')

@section('content')
    
    <div class="content">

        @foreach ($users as $user)

            @if ($user->id !== Auth::user()->id)
                <div class="card card-default text-center">
                    <div class="user container">
                        <p> <a class="username" href="/profile/{{$user->id}}"> {{ $user->role == 'Individual' ? $user->username : "$user->username($user->role)"}} </a> </p>
                        <p> <a class="btn btn-info" href="/chat/{{$user->id}}">Send a message</a> </p>
                    </div>
                </div> <br>
            @endif

        @endforeach

    </div>
@endsection