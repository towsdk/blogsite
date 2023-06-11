<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class Homecontroller extends Controller
{
    public function index(){
        if(Auth::id()){
            
            $usertype = Auth::user()->usertype;

            if($usertype == 'user'){
                $active = 'active';
                $posts = Post::where('post_status', $active)->get();
                return view('home.homepage', compact('posts'));
            }else if($usertype == 'admin'){
                return view('admin.adminhome');
            }else{
                return redirect()->back();
            }
        }
    }

   public function homepage(){
    $active = 'active';
    $posts = Post::where('post_status', $active)->get();
    return view('home.homepage', compact('posts'));
   }

   public function details($id){

    $data = Post::find($id);
    return view('home.postdetails', compact('data'));
   }


   public function userpost(){
    return view('home.createuserpost');
   }

   public function updateUserPost(Request $request)
   {

    $user = Auth()->user();
    $user_id = $user->id;
    $usertype = $user->usertype;
    $username = $user->name;

    $request->validate([
        'title' => 'nullable',
        'description' => 'nullable|max: 255',
        'image'=> 'nullable|mimes:png,jpg,jpeg,svg,webp',
    ]);

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
    $post->post_status = "pending";
    $post->user_id = $user_id;
    $post->name = $username;
    $post->usertype = $usertype;

    $post->save();

    Alert::success('Congrats', 'You\'ve Successfully Registered');

    return redirect()->back();


   }

   public function mypost(){

    $user = Auth()->user();
    $userid = $user->id;

    $post = Post::where('user_id', $userid)->get();

    return view('home.my_user', compact('post'));
   }
}
