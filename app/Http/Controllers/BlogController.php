<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $title = "Blog";
        $posts = Post::orderBy('created_at', 'desc')->paginate(6);
        return view('pages.blog.index')->with('title', $title)->with('posts', $posts);
    }

    public function post($uri = null){
        if ($uri == "search") {
            $this->search();
        }
        else {
            $post = Post::where('URI', $uri)->get()[0];
            $title = $post->title;
            $categories = explode(',', $post->categories);
            foreach($categories as $category){
                $cat[] = Category::where('id', $category)->get();
            }
            $author = User::select('name')->where('id', $post->user_id)->get()[0];
            return view('pages.blog.post')->with('title', $title)->with('post', $post)->with('cat', $cat)->with('author', $author);
        }
    }

    public static function search(){
        $title = "Search";
        echo view('pages.blog.search')->with('title', $title);
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
        return view('pages.blog.category')->with('title', $title)->with('posts', $posts);
    }

}