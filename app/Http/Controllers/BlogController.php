<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;


class BlogController extends Controller
{
    public function index(){
        $title = "Blog";
        $description = "Ali writes Blog Posts about tech and how it's made. You can find readable material on Web Development, Mobile App UI Design and Much More like that. Along with Ali there are other Professional Developer that are writing on this blog.";
        $url = "https://alidevs.com/blog";
        $type = "Blog Page";

        SEOMeta::setRobots("index, follow")
        ->setTitle($title)
        ->setDescription($description)
        ->setCanonical($url);

        TwitterCard::addValue('creator', '@alidevsblog')
        ->setType($type)
        ->setTitle($title)
        ->setDescription($description)
        ->setSite('@alidevsblog')
        ->setUrl($url);

        OpenGraph::setTitle($title)
        ->setDescription($description)
        ->setType($type)
        ->setSiteName('AliDevs')
        ->addProperty('url', $url)
        ->addProperty('locale', 'en-US')
        ->addProperty('locale:alternate', ['en-AU', 'en_EU']);

        $posts = Post::orderBy('created_at', 'desc')->paginate(6);
        return view('pages.blog.index')
            ->with('posts', $posts);
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
                $cat[] = Category::select('name', 'URI')->where('id', $category)->get();
            }
            $author = User::select('name', 'bio', 'image')->where('id', $post->user_id)->get()[0];

            //SEO
            $description = preg_replace('/\s+/', ' ', strip_tags(Str::words($post->body, 50, '')));
            $url = 'https://alidevs.com/blog/'.$post->URI;
            $cover_image_url = 'https://alidevs.com/storage/cover_images/'.$post->cover_image;
            $type = "article";

            SEOMeta::setRobots("index, follow")
            ->setTitle($title)
            ->setDescription($description)
            ->addMeta('article:published_time', $post->created_at->toW3CString(), 'property')
            ->addMeta('article:section', $cat[0][0]->name, 'property')
            ->setCanonical($url);
            //SEOMeta::addKeyword(['key1', 'key2', 'key3']);

            TwitterCard::addValue('creator', '@alidevsblog')
            ->setType($type)
            ->setTitle($title)
            ->setDescription($description)
            ->setSite('@alidevsblog')
            ->setUrl($url)
            ->setImage($cover_image_url);

            OpenGraph::setTitle($title)
            ->setDescription($description)
            ->setType($type)
            ->setSiteName('AliDevs')
            ->setArticle([
                'published_time' => $post->created_at->toW3CString(),
                //'modified_time' => 'datetime',
                'author' => $author->name,
                'section' => $cat[0][0]->name,
                'tag' => $cat
            ])
            ->addProperty('url', $url)
            ->addProperty('updated_time', "")
            ->addProperty('locale', 'en-US')
            ->addProperty('locale:alternate', ['en-AU', 'en_EU'])
            ->addImage($post->cover_image)
            ->addImage($cover_image_url, ['height' => 1080, 'width' => 1920]);
            
            JsonLd::setType($type)
            ->setImage($cover_image_url)
            ->setTitle($title)
            ->setDescription($description)
            ->setUrl($url);

            return view('pages.blog.post')
                ->with('post', $post)
                ->with('cat', $cat)
                ->with('author', $author);
        }
    }

    public static function search(){
        $title = "Search";
        $description = "You can Search all kinds of blog posts on here. 
        Search the website by Category, Title, Author or anything you prefer reading about.";
        $url = "https://alidevs.com/blog/search";
        $type = "Search";

        SEOMeta::setRobots("noindex, nofollow")
        ->setTitle($title)
        ->setDescription($description)
        ->setCanonical($url);

        TwitterCard::addValue('creator', '@alidevsblog')
        ->setType($type)
        ->setTitle($title)
        ->setDescription($description)
        ->setSite('@alidevsblog')
        ->setUrl($url);

        OpenGraph::setTitle($title)
        ->setDescription($description)
        ->setType($type)
        ->setSiteName('AliDevs')
        ->addProperty('url', $url)
        ->addProperty('locale', 'en-US')
        ->addProperty('locale:alternate', ['en-AU', 'en_EU']);

        echo view('pages.blog.search');
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
        
        $title = ucwords(str_replace('-', ' ', $uri));
        $category = Category::select('id')->where('URI', $uri)->get()[0]->id;
        $posts = Post::where('categories', 'LIKE', "%{$category}%")->orderBy('created_at', 'desc')->get();
        $description = "You can find all kinds of blog posts on here about ".$title.".";
        $url = "https://alidevs.com/category/".$uri;
        $type = "Category";

        SEOMeta::setRobots("noindex, nofollow")
        ->setTitle($title)
        ->setDescription($description)
        ->setCanonical($url);

        TwitterCard::addValue('creator', '@alidevsblog')
        ->setType($type)
        ->setTitle($title)
        ->setDescription($description)
        ->setSite('@alidevsblog')
        ->setUrl($url);

        OpenGraph::setTitle($title)
        ->setDescription($description)
        ->setType($type)
        ->setSiteName('AliDevs')
        ->addProperty('url', $url)
        ->addProperty('locale', 'en-US')
        ->addProperty('locale:alternate', ['en-AU', 'en_EU']);

        return view('pages.blog.category')
            ->with('posts', $posts);
    }

}
