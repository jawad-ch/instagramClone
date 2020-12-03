<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $userPosts = $user->post;
        $followingIds = $user->following()->pluck('following_id');
        $posts = Post::where('user_id', $followingIds)->Orwhere('user_id',$user->id)->latest()->get();
        $sugestedUsers = User::where('id', '!=',$user->id)->limit(5)->get();
        return view('home.home', compact('user', 'posts','sugestedUsers'));
    }
}
