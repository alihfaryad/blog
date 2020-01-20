<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Category;
use App\Http\Controllers\DashboardController;
// use DB;

class PagesController extends Controller
{
    public function index(){
        $title = "Welcome to Web Blog";
        $posts = Post::orderBy('created_at', 'desc')->paginate(20);
        return view('pages.index')->with('title', $title)->with('posts', $posts);
    }

    public function __construct(DashboardController $dashboard_controller){
        $this->dashboard_controller = $dashboard_controller;
    }

    public function post($uri = null){
        if($uri == 'search'){
            $this->search();
        }
        elseif($uri == 'dashboard'){
            $this->dashboard_controller->index();
        }
        else{
            //$post = DB::select('SELECT * FROM posts WHERE URI = "'.$uri.'"');
            $post = Post::where('URI', $uri)->get();
            $title = $post[0]->title;
            $categories = explode(',', $post[0]->categories);
            foreach($categories as $category){
                $cat[] = Category::where('id', $category)->get();
            }
            return view('pages.post')->with('title', $title)->with('post', $post[0])->with('cat', $cat); 
        }
    }

    public static function search(){
        $title = "Search";
        echo view('pages.search')->with('title', $title);
    }

    public function search_results(Request $request){
        if($request->ajax()){
            $query = $request->get('query');
            if(!is_null($query)){
                $posts = Post::where('title', 'LIKE', "%{$query}%")->orderBy('created_at', 'desc')->get();
                echo $posts;
            }
        }
    }

    public function category($uri = null){
        $title = ucfirst($uri);
        $category = Category::select('id')->where('name', $uri)->get()[0]->id;
        $posts = Post::where('categories', 'LIKE', "%{$category}%")->orderBy('created_at', 'desc')->get();
        return view('pages.category')->with('title', $title)->with('posts', $posts);
    }
}
