<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $title = "Dashboard";
        $user_id = auth()->user();
        if($user_id == null){
            echo redirect('/dashboard/login');
        }
        else {
            $user_id = auth()->user()->id;
            $user = User::find($user_id);
            echo view('pages.dashboard.index')->with('title', $title)->with('posts', $user->posts);
        }
    }
}
