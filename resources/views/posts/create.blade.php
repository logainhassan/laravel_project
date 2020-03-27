@extends('layouts.app')

@section('content')
<div class="container" style="    max-width: 855px;">
  <form method="POST" action="{{route('posts.store')}}">
  @csrf 
  <!-- bt7mena mn vernulibility esmha csrf -->
  <div class="form-group1">
    <label for="formGroupExampleInput">Title</label>
    <input type="text" class="form-control" id="formGroupExampleInput"  name="title">
  </div>
  <div class="form-group1">
    <label for="formGroupExampleInput2">Description</label>
    <textarea class="form-control" rows="5" name="description">
    </textarea>
  </div>
  <div class="form-group1">
      <label for="formGroupExampleInput2">User</label>
      <select class="custom-select" name="user_id" id="inputGroupSelect01">
        @foreach($users as $user)
        <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
  </select>
  </div>
  <div>  
    <button class="btn btn-success">Submit</button> 
</div>
</form>
</div>

@endsection