<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;

class CategoryController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "All Categories";
        $url = "https://alidevs.com/category";
        $categories = Category::orderBy('id', 'desc')->paginate(20);

        SEOMeta::setRobots("noindex, nofollow")
        ->setTitle($title)
        ->setCanonical($url);

        TwitterCard::addValue('creator', '@alidevsblog')
        ->setTitle($title)
        ->setSite('@alidevsblog')
        ->setUrl($url);

        OpenGraph::setTitle($title)
        ->setSiteName('AliDevs')
        ->addProperty('url', $url)
        ->addProperty('locale', 'en-US')
        ->addProperty('locale:alternate', ['en-AU', 'en_EU']);

        return view('pages.dashboard.categories.index')
            ->with('title', $title)
            ->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Add Category";
        SEOMeta::setRobots("noindex, nofollow")
        ->setTitle($title);
        return view('pages.dashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cat = new Category();
        $name = $request->input('name');
        $cat->name = $name;
        $cat->URI = strtolower(str_replace(' ', '-', $name));
        $cat->save();

        return redirect('/dashboard/categories')->with('success', 'Category Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
