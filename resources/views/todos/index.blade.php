
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Todos</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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

<div class="text-center " >
  
  <h1>All Todos</h1>
  @if(session()->has('message'))
      <div class="alert alert-success">{{session()->get('message')}}</div>
        {{session()->forget('message')}}
    @elseif(session()->has('error'))
      <div class="alert alert-danger">{{session()->get('error')}}</div>
        {{session()->forget('error')}}
    @endif
  <a href="/todos/create/" class="btn btn-primary " role="button">Create A New Todo</a><br/>
  @if($todos->count() > 0)
   @foreach($todos as $todo)
     @if($todo->completed)
     {{$todo->title}} Completed </br> 
     <form action="{{'/todos/'.$todo->id.'/delete'}}" method="POST" >  @csrf  @method('delete')
       <input type="submit" value="Delete" class="btn btn-success">   
      </form>
      </br> 
     @else
     <a class="cursor-pointer" href="{{'/todos/'.$todo->id.'/show'}}">{{$todo->title}}</a><br/>
      <form action="{{'/todos/'.$todo->id.'/complete'}}" method="POST" > @csrf  @method('PUT')
       <a href="{{'/todos/'.$todo->id.'/edit'}}" class="btn btn-primary font-size: 5px" role="button"  height="10" >Edit</a>
       <input type="submit" value="Complete The Above Task " class="btn btn-warning">   
      </form>
      </br>
     @endif
   @endforeach
  @else
   <p>No Task Available, Create One</p>

  @endif 
         
</div>
@livewireScripts   
</body>
</html>



