<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use App\User;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $title = "Dashboard";
        $user_id = auth()->user();
        if($user_id == null){
            echo redirect('/dashboard/login');
        }
        else {
            $user_id = auth()->user()->id;
            $user = User::find($user_id);
            SEOMeta::setRobots("noindex, nofollow")
            ->setTitle($title);
            echo view('pages.dashboard.index')
                ->with('posts', $user->posts);
        }
    }
}
