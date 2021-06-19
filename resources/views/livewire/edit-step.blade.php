<div>

@foreach($steps as $step)

<div class="py-1"> 
<input name="stepsName[]" value="{{$step->name}}" class="p-2  border rounded" ></br>
<input type="hidden" name="stepsId[]" value={{$step->id}}>
</div>
@endforeach
</div>
