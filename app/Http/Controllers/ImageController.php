<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
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
        $title = "All Images";
        $images = Image::orderBy('id', 'desc')->paginate(20);
        SEOMeta::setRobots("noindex, nofollow")
        ->setTitle($title);
        return view('pages.dashboard.images.index')
            ->with('images', $images);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Upload Image';
        SEOMeta::setRobots("noindex, nofollow")
        ->setTitle($title);
        return view('pages.dashboard.images.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'post_image' => 'image|max:1999'
        ]);
        $name = $request->input('name');
        $uri = strtolower(str_replace(' ', '-', $name)).'_'.time();
        //handle Image Upload
        if($request->hasFile('post_image')){
            $filenameWithExt = $request->file('post_image')->getClientOriginalName();
            //$filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $ext = $request->file('post_image')->getClientOriginalExtension();
            $filenameToStore = $uri . '.' . $ext;
            //Upload Image
            $path = $request->file('post_image')->storeAs('public/post_image', $filenameToStore);
        }
        else{
            $filenameToStore = 'noimage.jpg';
        }

        $image = new Image();
        $image->name = $name;
        $image->URI = $uri;
        //$image->user_id = auth()->user()->id;
        $image->URI = $filenameToStore;
        $image->save();

        return redirect('/dashboard/images')->with('success', 'Image Uploaded');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        //
    }
}
