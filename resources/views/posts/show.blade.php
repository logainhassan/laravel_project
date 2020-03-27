@extends('layouts.app')
@section('content')
<div class="container">
	<div class="card">
	  <div class="card-header">
	   		Post Info
	  </div>
	  <div class="card-body">
	  	<h5 class="card-title">Title : <span class="card-text">{{$post->title}}</span></h5>
	    
	    <h5 class="card-title">Description</h5> 
	    <p class="card-text">{{$post->description}}</p>
	  </div>
	</div>
	<br>
	<div class="card">
	  <div class="card-header">
	   		Post Creator Info
	  </div>
	  <div class="card-body">
	  	<h5 class="card-title">Name : <span class="card-text">{{$post->user->name}}</span></h5>
	    
	    <h5 class="card-title">Email : <span class="card-text">{{$post->user->email}}</span></h5> 
	    
	    <h5 class="card-title">Created At : <span class="card-text">{{$date}}</span></h5> 
	    
	  </div>
	</div>
	<br>
	<a href="/posts" class="btn btn-success">Show Table</a>

</div>

@endsection

