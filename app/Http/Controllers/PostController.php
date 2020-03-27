<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Carbon\Carbon;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{ 
    public function index(){
    	$posts= Post::paginate(6);

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
    public function show(Request $request){

    	$postId = $request->post;
    	$post = Post::find($postId);
    	// $postOne = post::where('id',$postId)->get();
    	// $postTwo = post::where('id',$postId)->first();
    	// dd($post,$postOne,$postTwo);
        // $posts= Post::all();

        $date= $post->created_at;
        $date = Carbon::parse($date);
        //dd($date);
    	return view('posts.show',[
    		'post' => $post,
            'date' => $date->format('D M, Y')
    	]);
    }

    public function create(){
        $users = User::all();
    	return view('posts.create',[
            'users' => $users
        ]);
    }

    public function store(StorePostRequest $request){
        //get the request data
        //store the request data in the database
        //redirect to show page
        
        
        $posts=Post::create([
            'title' => $request->title,
            'description'=> $request->description,
            'user_id' => $request -> user_id
        ]);
        
        return redirect()->route('posts.index');
    }

    public function edit(Request $request){
        
        $postId = $request->post;
        $post = Post::find($postId);
        $users = User::all();

        return view('posts.edit',[
            'post' => $post,
            'users' => $users
        ]);

    }

    public function update(UpdatePostRequest $request){

        $post= Post::find($request->post);
        $post->update($request->all());      
    
        return redirect()->route('posts.index');
    }

    public function destroy(Request $request){

        $post= Post::find($request->post);
        $post->delete();      
        return redirect()->back();
    }
}
