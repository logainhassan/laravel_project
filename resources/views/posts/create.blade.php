@extends('layouts.app')

@section('content')

<div class="container" style="max-width: 855px; max-height:1000px;">

  <form method="POST" action="{{route('posts.store')}}" enctype="multipart/form-data">
  @csrf 
  <!-- bt7mena mn vernulibility esmha csrf -->
    <div class="form-group1">
      <label for="formGroupExampleInput">Title</label>
      <input type="text" class="form-control" id="formGroupExampleInput"  name="title">
      @error('title')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group1">

      <label for="formGroupExampleInput2">Description</label>
      <textarea class="form-control" rows="3" name="description">
      </textarea>
      @error('description')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group1">
      <label for="formGroupExampleInput2">Image</label>
      <br>
      <input type="file" name="image">
      @error('image')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group1">
        <label for="formGroupExampleInput2">User</label>
        <select class="custom-select" name="user_id" id="inputGroupSelect01">
          @foreach($users as $user)
              <option value="{{$user->id}}">{{$user->name}}</option>
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