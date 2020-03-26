<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
    	$posts=[
    	[
    		'id' => 1,
    		'title'=>'first post',
    		'createdAt' => '2018-05-01'
    	],
    	[
    		'id' => 2,
    		'title'=>'second post',
    		'createdAt' => '2018-06-03'
    	],
    	[
    		'id' => 3,
    		'title'=>'third post',
    		'createdAt' => '2018-09-04'
    	],
    ];
	
	return view('index',[
    	'posts' => $posts
    ]);
    }
}
