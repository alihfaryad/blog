<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index(){
        $title = "Blog";
        $meta = "Ali writes Blog Posts about tech and how it's made. You can find readable material on Web Development, Mobile App UI Design and Much More like that. Along with Ali there are other Professional Developer that are writing on this blog.";
        $posts = Post::orderBy('created_at', 'desc')->paginate(6);
        return view('pages.blog.index')
            ->with('title', $title)
            ->with('meta', $meta)
            ->with('posts', $posts);
    }

    public function post($uri = null){
        if ($uri == "search") {
            $this->search();
        }
        else {
            $post = Post::where('URI', $uri)->get()[0];
            $title = $post->title;
            $meta = Str::words($post->body, 20, '');
            $categories = explode(',', $post->categories);
            foreach($categories as $category){
                $cat[] = Category::where('id', $category)->get();
            }
            $author = User::select('name')->where('id', $post->user_id)->get()[0];
            return view('pages.blog.post')
                ->with('title', $title)
                ->with('meta', $meta)
                ->with('post', $post)
                ->with('cat', $cat)
                ->with('author', $author);
        }
    }

    public static function search(){
        $title = "Search";
        $meta = "You can Search all kinds of blog posts on here. 
        Search the website by Category, Title, Author or anything you prefer reading about.";
        echo view('pages.blog.search')
            ->with('meta', $meta)
            ->with('title', $title);
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
        $meta = "You can find all kinds of blog posts on here about ".$title.".";
        $category = Category::select('id')->where('name', $uri)->get()[0]->id;
        $posts = Post::where('categories', 'LIKE', "%{$category}%")->orderBy('created_at', 'desc')->get();
        return view('pages.blog.category')
            ->with('title', $title)
            ->with('meta', $meta)
            ->with('posts', $posts);
    }

}
