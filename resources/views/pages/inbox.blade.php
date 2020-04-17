@extends('layout.app')

@section('content')
    <div class="content">
        <div class="card card-default col-md-12">

            @if (count($users) > 0)
                
                @foreach ($users as $user)
                    
                        @if (in_array($user[0]->id, $unread_users))

                            <div class="user" style="border-bottom: 0.2px solid black">
                                <p> <b> {{$user[0]->username}} </b> <img src='/images/blue_dot.png' height="30px" width="30px"> </p>
                                <a class='btn btn-info' href="/chat/{{$user[0]->id}}#message">Open</a>
                            </div> <br>
                        

                        @else

                            <div class="user" style="border-bottom: 0.2px solid black">
                                <p>{{$user[0]->username}}</p>
                                <a class='btn btn-info' href="/chat/{{$user[0]->id}}#message">Open</a>
                            </div> <br>

                        @endif

                @endforeach

            @else
                <p> Your conversations appear here </p>
            @endif
            
        </div>
    </div>
@endsection