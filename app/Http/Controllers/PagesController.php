<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
// use App\Http\Controllers\DashboardController;

class PagesController extends Controller
{
    public function index(){
        $title = "For the Developers, By a Developer";
        $description = "Ali Hassan is a Developer, Period.";
        $url = "https://alidevs.com";
        $type = "Homepage";
        
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

        $posts = Post::orderBy('created_at', 'desc')->take(4)->get();
        return view('pages.index')
            ->with('posts', $posts);
    }

    public function about(){
        $title = "About";
        $description = "What are you doing here? Are you obsessed or what. Whatever! get to know more about Ali here.";
        $url = "https://alidevs.com/about";
        $type = "About Page";

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
        
        return view('pages.about');
    }

    public function toolbox(){
        $title = "Toolbox";
        $description = "Ali loves tools and wants to share them with the world. 
        You can learn about what softwares, frameworks and more to use for your next project of Web Dev 
        or iOS Apps and more.";
        $url = "https://alidevs.com/toolbox";
        $type = "Toolbox";

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

        return view('pages.toolbox');
    }

    public function contact(){
        $title = "Contact";
        $description = "Stalker Much! Ya Ya go ahead, give Ali a Hello ;)";
        $url = "https://alidevs.com/contact";
        $type = "Contact Page";

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

        return view('pages.contact');
    }

}
