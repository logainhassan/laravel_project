@extends('layouts.app')
@section('content')
<div class="container"> 
	<a href="{{route('posts.create')}}" class="btn btn-success">Create Post</a>
	<table class="table  table-bordered">
	  <thead class="thead-dark">
	    <tr>
	      <th scope="col">ID</th>
	      <th scope="col">Title</th>
	      <th scope="col">Description</th>
	      <th scope="col">User</th>
	      <th scope="col">Created At</th>
	      <th scope="col">Actions</th>
	    </tr>
	  </thead>
	  <tbody>
	  	@foreach($posts as $post)
	    <tr class="table-info">
	    	<th scope="row">{{$post->id}}</th>
		  	<td>{{$post->title}}</td>
		  	<td>{{$post->description}}</td>  	
		  	<td>{{$post->user ? $post->user->name : ''}}</td>
		  	<td>{{$post->created_at}}</td>
		  	<td style="width:100px;"><a href="{{route('posts.show',['post'=> $post->id])}}" ><i class="fas fa-eye"></i></a>
		  	<a href="{{route('posts.edit',['post'=> $post->id])}}" ><i class="fas fa-edit"></i></a>
		  	<a href="{{route('posts.delete',['post'=> $post->id])}}" ><i class="fas fa-trash"></i></a>
		  	</td>
		  	

	    </tr>
	    @endforeach
	  </tbody>
	</table>
</div>
	
@endsection
