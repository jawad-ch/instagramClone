<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function like(Request $request)
    {
        $user = Auth::user();
        $post = Post::findOrFail($request->id);
        $user->likes()->toggle($post);
        return response()->json([
            'success'=>true,
        ]);
    }
}