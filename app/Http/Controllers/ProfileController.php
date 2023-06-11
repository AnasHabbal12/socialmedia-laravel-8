<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    //
    public function index(User $user)
    {
        //$user = User::findOrFail($user);
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        $postCount = Cache::remember('count.post.' . $user->id, now()->addSecond(30), function () use ($user) {
            return $user->posts->count();
        }); 

        $followerCount = Cache::remember('count.followe.' . $user->id, now()->addSecond(30), function () use ($user) {
            return $user->profile->followers->count();
        }); 

        $followingCount = Cache::remember('count.follwing.' . $user->id, now()->addSecond(30), function () use ($user) {
            return $user->following->count();
        }); 

        return view('profile.index' ,compact('user', 'follows', 'postCount', 'followerCount', 'followingCount'));

    }   //
    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);
        return view('profile.edit' , ['user'=> $user ]);
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile);
        $data = request()->validate([
        'title' => 'required',
        'description' => 'required',
        'url' => 'url',
        'image' => ''
        ]);

        if (request('image'))
        {
            $imagePath = request('image')->store('profile','public');
            $image = image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save(); 
            $imageArray = ['image' => $imagePath];
        }


        auth()->user()->profile->update(array_merge($data, $imageArray ?? [] ));
        
        return redirect("/profile/{$user->id}");
    }
}
