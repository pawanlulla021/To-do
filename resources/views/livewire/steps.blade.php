<div>
<p>Add Steps If Required!
<a   class="btn btn-primary" role="button" wire:click="increment" >+</a><br/>      
</p>

@for($i=0; $i<$count; $i++)
<div class="py-1"> 
<input name="steps[]" class="p-2  border rounded" placeholder="{{'Add Step'.($i+1)}}"></br>
</div>

@endfor
</div>
