
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
<div class="text-center pt-10" >
  <h1 class="text-2xl">What next you want to do</h1>
    @if(session()->has('message'))
      <div class="alert alert-success">{{session()->get('message')}}</div>
        {{session()->forget('message')}}
    @elseif(session()->has('error'))
      <div class="alert alert-danger">{{session()->get('error')}}</div>
        {{session()->forget('error')}}
    @endif


    @if($errors->any())
     <div class="alert alert-danger">
      <ul>
       @foreach($errors->all() as $error)
        <li>{{$error}}</li>
       @endforeach 
      </ul>
     </div>    
    @endif 
      <form action="/todos/create" method="POST" class="py-5" >
        @csrf
        <div class="py-1">
          <input type="text" name="title"/ class="py-2 px-2 border rounded-lg" placeholder="Title">
        </div>
        <div class="py-1">
          <textarea name="description" class="p-2  border rounded" placeholder="Description"></textarea>
        </div>

        <livewire:steps />

        <div class="py-1">
          <input type="submit" value="Create"/ class="p-2 border rounded-lg">        
        </div>
        <a href="/todos/" class="btn btn-primary" role="button">Back</a><br/>                     
      </form>
      <!--Default Component-->
      <!--<livewire:counter />-->
      <!--Custom Component-->
      
</div> 
@livewireScripts  
</body>
</html>