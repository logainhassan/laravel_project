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
		  	<td style="width:100px;">
		  		<a href="{{route('posts.show',['post'=> $post->id])}}" >
		  			<i class="fas fa-eye"></i>
		  		</a>
		  	    <a href="{{route('posts.edit',['post'=>
			  	$post->id])}}" style="margin-left: 4px;">     
			  			<i class="fas fa-edit"></i> 
			    </a>
			    <a href="#!" class="deleteBtn" data-id="{{ $post->id }}" data-toggle="modal" data-target="#exampleModalCenter">
             		<i class="fas fa-trash"></i>
                </a>	  				
		  	</td>
		  	

	    </tr>
	    @endforeach
	  </tbody>
	</table>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Delete post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this post?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form method="post" id="deleteFormPost">
	  		@csrf
	  		{{ method_field('DELETE') }}
        		<button type="submit" class="btn btn-success">Delete</button>
        </form>	
      </div>
    </div>
  </div>
</div>
</div>
<script >
	 $('.deleteBtn').on('click',function(e) {
        e.preventDefault();
        const id = $(this).data('id');
        var url = '{{route('posts.destroy', ['post'=> ':id'])}}';
		url = url.replace(':id',id);
        $('#deleteFormPost').attr('action',url);

    })
</script>
@endsection
