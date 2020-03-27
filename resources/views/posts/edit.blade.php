@extends('layouts.app')

@section('content')
<div class="container" style="    max-width: 855px;">

  <form method="POST" action="{{route('posts.update',['post'=> $post->id])}}">
      @csrf
      {{ method_field('PATCH') }} 
  <!-- bt7mena mn vurnulibility esmha csrf -->
  <div class="form-group1">
    @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <label for="formGroupExampleInput">Title</label>
    <input type="text" class="form-control" id="formGroupExampleInput" value="{{$post->title}}"  name="title">
  </div>
  <div class="form-group1">
    <br>
    @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <label for="formGroupExampleInput2">Description</label>
    <textarea class="form-control" rows="5" name="description">
      {{$post->description}}
    </textarea>
  </div>
  <div class="form-group1">
      <label for="formGroupExampleInput2">User</label>
      <select class="custom-select" name="user_id" id="inputGroupSelect01">

        <option value="{{$post->user->id}}" selected>{{$post->user->name}}</option>
        @foreach($users as $user)
            @if($user->id !== $post->user_id)
                <option value="{{$user->id}}">{{$user->name}}</option>
            @endif
        @endforeach
      </select>
  </div>
  <div>  
    <button class="btn btn-success">Submit</button> 
</div>
</form>
</div>

@endsection