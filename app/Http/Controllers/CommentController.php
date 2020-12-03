<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $createNewComment =  Comment::create([
            'user_id'=>Auth::user()->id,
            'post_id'=>$request->post_id,
            'comment'=>$request->comment,
            
        ]);
        if ($createNewComment) return response()->json([
            'comment'=> $createNewComment->comment,
            'user'=> User::findOrfail($createNewComment->user_id)->profile->username,
            'post_id'=> $createNewComment->post_id,
        ]);
    }
}