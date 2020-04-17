@extends('layout.app')

@section('content')
    <div class="content">

        @if (count($users) > 0)

            @foreach ($users as $user)
                    <div class="card card-default text-center">
                        <div class="user container">
                            <p> {{$user->username}} </p>

                            @if($user->id !== Auth::user()->id)
                                <p> <a class="btn btn-info" href="/chat/{{$user->id}}">Send a message</a> </p>
                            @endif
                        </div>
                    </div> <br>
            @endforeach

        @else
            
                <p> No results found for "{{$search_user}}"  </p>
        @endif

    </div>
@endsection