<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
// use DB;

class PagesController extends Controller
{
    public function index(){
        $title = "Welcome to Web Blog";
        $posts = Post::orderBy('created_at', 'desc')->paginate(20);
        return view('pages.index')->with('title', $title)->with('posts', $posts);
    }

    public function post($uri = null){
        //$post = DB::select('SELECT * FROM posts WHERE URI = "'.$uri.'"');
        $post = Post::where('URI', $uri)->get();
        $title = $post[0]->title;
        return view('pages.post')->with('title', $title)->with('post', $post[0]);
    }
}
