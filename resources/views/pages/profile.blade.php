@extends('layout.app')

@section('content')
    
    <div class="content">
        <div class="card text-center">
            <p> {{$user->username}} </p>
        </div> <br>

        @if ($user->id == Auth::user()->id)
            
            <p><b>Bio </b> </p>
            <div class="card about">
                <div class="container about">
                    @if ($user->id == Auth::user()->id && $user->about == "")
                        <p> Tell us more about you </p>
                        <p> <small> <a href="/edit/{{$user->id}}"> Edit </a> </small> </p>
                    @else
                        <p> {{$user->about}} </p>
                        <p> <small> <a href="/edit/{{$user->id}}"> Edit </a> </small> </p>
                    @endif
                </div> 
            </div>
        @else
            <p><b> Bio </b></p>
            <div class="card about">
                <div class="container about">
                    <p> {{$user->about}} </p>
                </div>
                    
            </div>

        @endif
    </div>

@endsection