<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //we have to insert the model use App\User;
        $user_id = auth()->user()->id;
        $user = User::find($user_id); //search the user_id, then we pass it using ->with
        return view('dashboard')->with('posts', $user->posts);
    }
}
