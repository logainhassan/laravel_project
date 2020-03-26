@extends('layouts.app')
@section('content')
<div class="container">
	<div class="card" style="width: 18rem;">
	  <div class="card-body">
	    <h5 class="card-title">{{$post->title}}</h5>
	    <p class="card-text">{{$post->description}}</p>
	    <a href="/posts" class="btn btn-primary">Go table</a>
	  </div>

</div>
</div>

@endsection

