<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($request)
    {
        // dd($request);
        // $authUser = Auth::user();
        // return view('profile.profile' , compact('authUser'));
        // return redirect(route('{user:username}.index', Auth::user()->name));
        $user = User::findOrFail($request->id);
        $posts = $user->post;
        return view('profile.profile' , compact('user','posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, $id)
    {
        // return $profile;
        dd($id);
        $authUser = User::findOrFail($id);
        $posts = $authUser->post;
        return view('profile.profile' , compact('authUser','posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $profileuser = $request->user;
        return view('profile.editProfile', compact('profileuser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $profileuser = $request->user()->profile;

        $data = request()->validate([
            "name" =>'required',
            "username" =>'required',
            "bio" =>'',
            "profileImg" =>'',
        ]);

        if (request('profileImg')) {
            $imagePath = request('profileImg')->store('profile', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();

            $imageArray = ['profileImg' => $imagePath];
        }

        $updateProfile = $profileuser->update(array_merge(
            $data,
            $imageArray ?? []
        ));
        if ($updateProfile) {
            $request->session()->flash('messageii', 'profile updated successfully'); 
        }
        return redirect(route('editProfile', Auth::user()->name));
        // dd($profile);
        // dd($request->user()->profile);
        // // return redirect()->back();
        // return view('profile.editProfile', compact('profileuser'))->with('message', 'profile updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
