<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function follow(Request $request)
    {
        $user = Auth::user();
        $user->following()->attach(User::findOrFail($request->id));
        return response()->json([
            'action' => 'follow',
            'success' => true,
        ]);
    }
    public function unfollow(Request $request)
    {
        $user = Auth::user();
        $user->following()->detach(User::findOrFail($request->id));
        return response()->json([
            'action' => 'unFollow',
            'success' => true,
        ]);
        
    }

    public function followings()
    {
        $user = User::find(Auth::user()->id);
        dd($user->followers()->count());
    }
}
