<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
// use App\Http\Controllers\DashboardController;

class PagesController extends Controller
{
    public function index(){
        $title = "For the Developers, By a Developer";
        $meta = "Ali Hassan is a Developer, Period.";
        $posts = Post::orderBy('created_at', 'desc')->take(4)->get();
        return view('pages.index')
            ->with('title', $title)
            ->with('meta', $meta)
            ->with('posts', $posts);
    }

    public function about(){
        $title = "About";
        $meta = "What are you doing here? Are you obsessed or what. Whatever! get to know more about Ali here.";
        $robots = "noindex, nofollow";
        return view('pages.about')
            ->with('title', $title)
            ->with('meta', $meta)
            ->with('robots', $robots);
    }

    public function toolbox(){
        $title = "Toolbox";
        $meta = "Ali loves tools and wants to share them with the world. 
        You can learn about what softwares, frameworks and more to use for your next project of Web Dev 
        or iOS Apps and more.";
        return view('pages.toolbox')
            ->with('title', $title)
            ->with('meta', $meta);
    }

    public function contact(){
        $title = "Contact";
        $meta = "Stalker Much! Ya Ya go ahead, give Ali a Hello ;)";
        return view('pages.contact')
            ->with('title', $title)
            ->with('meta', $meta);
    }

}
