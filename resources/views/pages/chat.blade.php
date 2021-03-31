@extends('layout.app')

@section('content')
    <div class="container mt-2">
        <div class="card card-default">
            <div class="card-title text-center mt-3">
                @if ($user->role == 'Individual')
                    <p>{{$user->username}}</p>
                @else
                    <p>{{ "$user->username($user->role)" }}</p>
                @endif
            </div>
        </div>

        @if (count($text_messages) > 0)
            
            @foreach ($text_messages as $text_message)
                @if ($text_message->id_sender == $user->id)
                    
                    <div class="mt-4 mb-4 card bg-info" style="width: 58%">
                        <p style="color: white"> {{$text_message->message}} </p>
                        <small> {{date('d-M-Y H:i', strtotime($text_message->created_at))}} </small>
                    </div>
                @else

                    <div class="mt-4 mb-4 float-right card chat-box" style="width: 58%">
                        <p class="text_message"> {{$text_message->message}} </p>
                        <small> {{date('d-M-Y H:i', strtotime($text_message->created_at))}} </small>
                    </div>
                @endif
            @endforeach
        @else
            <p> Send a message to start a conversation! </p>
        @endif

        <form action="" method="POST">
            <textarea class="form-control" name="message" id="message" cols="20" rows="4"></textarea>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="submit" class="btn btn-info" name="send_message" value="Send"> 
        </form>
    </div>

    <script src="/js/chat.js"></script>

@endsection