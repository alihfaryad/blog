<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Controllers\DashboardController;

class PagesController extends Controller
{
    public function index(){
        $title = "It's AliDevs";
        return view('pages.index')->with('title', $title);
    }

    public function about(){
        $title = "About";
        return view('pages.about')->with('title', $title);
    }

    public function toolbox(){
        $title = "Toolbox";
        return view('pages.toolbox')->with('title', $title);
    }

    public function contact(){
        $title = "Contact";
        return view('pages.contact')->with('title', $title);
    }

}
