<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;

use App\User;

use App\Chat;

use App\Message;

use DB;

use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }

    //
    public function chat_page($id)
    {
        $user = User::find($id);

        //mark a conversation as read once it's opened
        $chat_opened = Chat::where('id_recipient', Auth::user()->id)->where('id_sender', $user->id)->update(['opened' => 1]);

        //mark all the messages from a specific user once it's opened
        $messages_opened = Message::where('id_recipient', Auth::user()->id)->where('id_sender', $user->id)->update(['opened' => 1]);

        //display messages
        $text_messages = Message::where(function($query) {
            $query->where('id_sender', Auth::user()->id)
                ->orWhere('id_recipient', Auth::user()->id);
        })
        ->where(function ($query) use ($id) {
            $query->where('id_sender', $id)
                    ->orWhere('id_recipient', $id);
        })->get();

        return view('pages.chat')->with(['user' => $user, 'text_messages' => $text_messages]);
    }

    public function send_message($id, Request $request)
    {
        $this->validate($request, [
            'message' => 'required'
        ]);

        //Create a new chat

        //if a chat already exist, then it won't create a new chat but update the existing one
        //$chat = Chat::where('id_participant1', Auth::user()->id || 'id_participant2', Auth::user()->id)->where('id_participant1', $user->id || 'id_participant2', $user->id)->get();
        $user = User::find($id);

        $chat_query = Chat::where(function($query) {
             $query->where('id_participant1', Auth::user()->id)
                 ->orWhere('id_participant2', Auth::user()->id);
         })
        ->where(function ($query) use ($id) {
             $query->where('id_participant1', $id)
                 ->orWhere('id_participant2', $id);
         })
        ->first();

        if (!$chat_query)
        {   
            $chat = new Chat;
            $chat->id_participant1 = Auth::user()->id;
            $chat->id_participant2 = $user->id;
            $chat->id_sender = Auth::user()->id;
            $chat->id_recipient = $user->id;
            $chat->opened = 0;
            $chat->save();
        }
        else
        {
            $chat = Chat::find($chat_query->id);
            $chat->id_sender = Auth::user()->id;
            $chat->id_recipient = $user->id;
            $chat->opened = 0;
            $chat->created_at = date('Y-m-d H:i:s');
            $chat->save();
        }
        

        //Add messages in the database, in the chat_messages table

        $message = new Message;
        $message->id_sender = Auth::user()->id;
        $message->id_recipient = $user->id;
        $message->day_month_year = date('d-M-Y');
        $message->message = $request->message;
        $message->opened = 0;

        $message->save();

        //return view('pages.chat')->with(['user' => $user, 'id' => $user->id, 'chat' => $chat]);
        return $this->chat_page($id);

    }

    public function inbox()
    {
        /**select all the conversatons where the user is participating */

        $conversations = Chat::where(function($query) {
            $query->where('id_participant1', Auth::user()->id)
            ->orWhere('id_participant2', Auth::user()->id);
        })->orderBy('created_at', 'desc')->get();

        /**Empty arrays that contain respectively the users chatting with the user who is logged in, the conversations, messages not yet opened and the users who sent a message to the user */

        $users = [];
        $chats = array();
        $unread_messages = [];
        $unread_users = [];

        /** if the user participates in conversations, we get the users who are chatting with him */

        if (count($conversations) > 0)
        {
            foreach ($conversations as $conversation)
            {
                
                if ($conversation->id_participant1 !== Auth::user()->id)
                {

                    $users[] = User::where(function($query) use ($conversation) {
                        $query->where('id', $conversation->id_participant1);
                    })
                    ->get();
                }
                else
                {
                    $users[] = User::where(function($query) use ($conversation) {
                        $query->where('id', $conversation->id_participant2);
                    })
                    ->get();
                }

            }

            //here we fetch the conversations that haven't been opened yet, and we do it based on the people interacting with the active user
            foreach($users as $user)
            {
                $unread_messages[] = Chat::where('id_recipient', Auth::user()->id)->where('opened', 0)->get();
            }

            /**if we find conversations in the database, we go through all of them and we add the sender of each convo in an array */

            if (!$unread_messages[0]->isEmpty())
            {
                $i = 0;
                foreach ($unread_messages as $message)
                { 
                    if (isset($message[$i]))
                    {
                        $unread_users[] = $message[$i]->id_sender;
                        $i++;
                    }
                }
               
            }
            else
            {
                $message = null;
                $unread_users[] = null;
            }
        }
        else
        {
            $conversation = null;
        }

        //dd($unread_messages[0]);

        return view('pages.inbox')->with(['users' => $users, 'unread_messages' => $unread_messages, 'unread_users' => $unread_users]);

    }

//check the number of unread messages
    public function number_of_messages()
    {
        $messages = Message::where('id_recipient', Auth::user()->id)->where('opened', 0)->get();

        //count the messages

        $number_messages = count($messages);

        return view('inc.navbar')->with('number_messages', $number_messages);
    }
}
