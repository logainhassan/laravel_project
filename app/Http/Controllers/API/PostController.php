<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    public function index(){
    	// $post = Post::all();
    	// //bta5od collection check dd($post);
    	// $postResource = PostResource::collection($post);
    	// return $postResource;
    	return PostResource::collection(Post::with('user')->paginate(4));

    }

    public function show($post){
        $postId = Post::find($post);
        dd($postId->load('user'));
    	//(Request $request)
    	// $postId = $request->post;
    	// $post = Post::find($postId);
    	// return new PostResource($post);

    	return new PostResource(Post::find($post));
    }
}
