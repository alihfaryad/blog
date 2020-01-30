<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Create New Post";
        return view('pages.dashboard.posts.create')->with('title', $title);
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
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        //handle Image Upload
        if($request->hasFile('cover_image')){
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $ext = $request->file('cover_image')->getClientOriginalExtension();
            $filenameToStore = $filename . '_' . time() . '.' . $ext;
            //Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $filenameToStore);
        }
        else{
            $filenameToStore = 'noimage.jpg';
        }

        $post = new Post();
        $title = $request->input('title');
        $post->title = $title;
        $post->URI = strtolower(str_replace(' ', '-', $title)).'_'.time();
        $post->body = $request->input('body');
        $post->categories = $request->input('categories');
        $post->read_time = round(str_word_count($request->input('body')/400));
        $post->user_id = auth()->user()->id;
        $post->cover_image = $filenameToStore;
        $post->save();

        return redirect('/dashboard')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $post = Post::find($post->id);
        
        if(auth()->user()->id != $post->user_id){
            return redirect('dashboard')->with('danger', 'Access Denied');
        }

        $title = $post->title;
        return view('pages.dashboard.posts.show')->with('title', $title)->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $post = Post::find($post->id);

        if(auth()->user()->id != $post->user_id){
            return redirect('dashboard')->with('danger', 'Access Denied');
        }

        $title = $post->title;
        return view('pages.dashboard.posts.edit')->with('title', $title)->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        if($request->hasFile('cover_image')){
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $ext = $request->file('cover_image')->getClientOriginalExtension();
            $filenameToStore = $filename . '_' . time() . '.' . $ext;
            //Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $filenameToStore);
        }

        $post = Post::find($post->id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->categories = $request->categories;
        $post->read_time = round(str_word_count($request->body)/400);
        if($request->hasFile('cover_image')){
            $post->cover_image = $filenameToStore;
        }
        $post->save();

        return redirect('/dashboard')->with('success', "Post Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post = Post::find($post->id);
        if(auth()->user()->id != $post->user_id){
            return redirect('dashboard')->with('danger', 'Access Denied');
        }

        if($post->cover_image != 'noimage.jpg'){
            Storage::delete('public/cover_images/'.$post->cover_image);
        }
        $post->delete();
        return redirect('/dashboard')->with('success', "Post Deleted");
    }
}
