<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }

    public function search_result()
    {
        return view('pages.search_result');
    }

    public function inbox()
    {
        return view('pages.inbox');
    }

    public function edit_bio($id)
    {
        //select a specific user's bio
        $user = User::find($id);

        return view('pages.edit')->with('user', $user);
    }
}
