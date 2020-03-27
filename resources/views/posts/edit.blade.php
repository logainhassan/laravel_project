@extends('layouts.app')

@section('content')

<div class="container" style=" max-width: 855px;">
  <form method="POST" action="{{route('posts.update',['post'=> $post->id])}}" enctype="multipart/form-data">
      @csrf
      {{ method_field('PATCH') }} 
  <!-- bt7mena mn vurnulibility esmha csrf -->
  <div class="form-group1">
    <label for="formGroupExampleInput">Title</label>
    <input type="text" class="form-control" id="formGroupExampleInput" value="{{$post->title}}"  name="title">
    @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group1">
    <label for="formGroupExampleInput2">Description</label>
    <textarea class="form-control" rows="5" name="description">
      {{$post->description}}
    </textarea>
    @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group1"> 
    <label for="formGroupExampleInput2">Image</label>
    <br>
    <img src="{{ URL::to('/') }}/images/{{ $post->image }}" width="100" height="90" style="margin-bottom: 5px;">
    <br>
    <input type="file" name="image">
      @error('image')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
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
      @error('user_id')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
  </div>
  <div>  
    <button class="btn btn-success">Submit</button> 
</div>
</form>
</div>

@endsection