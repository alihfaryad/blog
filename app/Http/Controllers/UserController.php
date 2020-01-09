<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
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
        if(auth()->user()->access_level != "SUPERADMIN"){
            return redirect('dashboard')->with('danger', 'Access Denied');
        }
        $title = "View All Users";
        $users = User::orderBy('id', 'desc')->paginate(2);
        return view('pages.dashboard.users.index')->with('title', $title)->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->access_level != "SUPERADMIN"){
            return redirect('dashboard')->with('danger', 'Access Denied');
        }
        $title = "Create New User";
        return view('auth.register')->with('title', $title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user = User::find($user->id);
        
        if(auth()->user()->access_level != "SUPERADMIN"){
            return redirect('dashboard')->with('danger', 'Access Denied');
        }

        $title = $user->name;
        return view('pages.dashboard.users.show')->with('title', $title)->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if(auth()->user()->access_level != "SUPERADMIN"){
            return redirect('dashboard')->with('danger', 'Access Denied');
        }
        $user = User::find($user->id);

        $title = $user->name;
        return view('pages.dashboard.users.edit')->with('title', $title)->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required',
            'access_level' => 'required'
        ]);

        if(auth()->user()->access_level != "SUPERADMIN"){
            return redirect('dashboard')->with('danger', 'Access Denied');
        }

        $user = User::find($user->id);
        $user->name = $request->name;
        if(!is_null($request->password)){
            $user->password = Hash::make($request->password);
        }
        $user->access_level = $request->access_level;
        $user->save();

        return redirect('/dashboard/users')->with('success', "User Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if(auth()->user()->access_level != "SUPERADMIN"){
            return redirect('dashboard')->with('danger', 'Access Denied');
        }
        $user = User::find($user->id);
        $user->delete();
        return redirect('/dashboard/users')->with('success', "User Deleted!");
    }
}
