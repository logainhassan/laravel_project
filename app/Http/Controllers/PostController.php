<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

class PostController extends Controller
{
    public function index(){
    	$posts= Post::all();
        
        // 	$posts=[
    // 	[
    // 		'id' => 1,
    // 		'title'=>'first post',
    // 		'createdAt' => '2018-05-01'
    // 	],
    // 	[
    // 		'id' => 2,
    // 		'title'=>'second post',
    // 		'createdAt' => '2018-06-03'
    // 	],
    // 	[
    // 		'id' => 3,
    // 		'title'=>'third post',
    // 		'createdAt' => '2018-09-04'
    // 	],
    // ];
	
	return view('posts.index',[
    	'posts' => $posts
    ]);
    }
    public function show(){
    	$request = request();
    	$postId = $request->post;
    	    	$posts= Post::all();
    	$post = Post::find($postId);
    	// $postOne = post::where('id',$postId)->get();
    	// $postTwo = post::where('id',$postId)->first();
    	// dd($post,$postOne,$postTwo);
    	return view('posts.show',[
    		'post' => $post
    	]);
    }

    public function create(){
        $users = User::all();
    	return view('posts.create',[
            'users' => $users
        ]);
    }

    public function store(){
        //get the request data
        //store the request data in the database
        //redirect to show page
        $request =request();
        
        $posts=Post::create([
            'title' => $request->title,
            'description'=> $request->description,
            'user_id' => $request -> user_id
        ]);
        
        return redirect()->route('posts.index');
    }
}
