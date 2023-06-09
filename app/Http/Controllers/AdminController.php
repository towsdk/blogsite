<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function posts(){
        return view('admin.posts');
    }

    public function addpost(Request $request){
        
        $request->validate([
            'title'=> 'nullable',
            'description'=> 'nullable',
            'image'=> 'nullable|mimes:png,jpg,jpeg,svg,webp',
        
        ]);

        $user = Auth()->user();
        $user_id = $user->id;
        $user_name = $user->name;
        $usertype = $user->usertype;

        $post = new Post();
        if($request->file('image')){
            $image = $request->image;
            $image_name = Str::uuid().'.'.$request->image->getclientoriginalextension();
        //    $image_name = time().'.'.$image->getClientOriginalExtension(); 
            
            Image::make($request->image)->crop(800, 609)->save(public_path('storage/imagefolder/'.$image_name, 90));
            $post->image = $image_name;
        }
        
            $post->title=$request->title;
            $post->description= $request->description;
            $post->post_status = "active";
            $post->user_id = $user_id;
            $post->name = $user_name;
            $post->usertype = $usertype;
           
            // 'name'=> $request->name,
            // 'user_id'=> $request->user_id,
            // 'post_status'=> $request->post_status,
            // 'usertype'=> $request->usertype,
        
        $post->save();
          return redirect()->back()->with('message','Post added successfully');
        
    }


    public function showposts(){
        $posts = Post::all();
        return view('admin.showposts', compact('posts'));
    }
}
