<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
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
    public function find_users()
    {
        $users = User::where('province', Auth::user()->country)->paginate(10);

        return view('pages.find_users')->with('users', $users);
    }

    public function search(Request $request)
    {
        $this->validate($request, ['search_user' => 'required']);

        $search_user = $request->search_user;

        $users = User::where('username', 'like', '%'. $search_user. '%')->paginate(10);

        return view('pages.search_result')->with(['users' => $users, 'search_user' => $search_user]);
    }

    public function profile($id)
    {
        //fetch user's datas from database
        $user = User::find($id);

        return view('pages.profile')->with(['id' => $id, 'user' => $user]);
    }

    public function edit_bio(Request $request, $id)
    {
        //we are going to edit the bio or about of a specific user
        $user = User::find($id);
        $user->about = $request->input('about');

        $user->save();

        return view('pages.profile')->with(['id' => $id, 'user' => $user]);
    }
}
