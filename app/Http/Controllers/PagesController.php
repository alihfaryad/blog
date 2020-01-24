<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Controllers\DashboardController;

class PagesController extends Controller
{
    public function index(){
        $title = "Welcome to Web Blog";
        return view('pages.index')->with('title', $title);
    }

}
