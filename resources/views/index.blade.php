<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
	<table class="table  table-bordered">
	  <thead class="thead-dark">
	    <tr>
	      <th scope="col">ID</th>
	      <th scope="col">Title</th>
	      <th scope="col">Created At</th>
	      <th scope="col">Actions</th>
	    </tr>
	  </thead>
	  <tbody>
	  	@foreach($posts as $post)
	    <tr>
	    	<th scope="row">{{$post['id']}}</th>
		  	<td>{{$post['title']}}</td>
		  	<td>{{$post['createdAt']}}</td>
		  	<td>@mdo</td>
	    </tr>
	    @endforeach
	  </tbody>
	</table>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
</body>
</html>