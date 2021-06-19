<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@livewireStyles  
</head>
<body>
<div class="text-center ">
<h1>Task With Steps & Description </h1>
<h5>Title: - </h5>
<p>{{$todo->title}}</p>
<h5>Description: - </h5>
<p>{{$todo->description}}</p>
@if($todo->steps->count() > 0)
<h5>Steps for this task: -</h5>
@foreach($todo->steps as $step)
<p>{{$step->name}}</p>
 @endforeach
@endif 
<a href="/todos/" class="btn btn-primary" role="button">Back</a><br/>         
</div> 
@livewireScripts   
</body>
</html>