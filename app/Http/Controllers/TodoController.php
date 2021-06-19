<?php

namespace App\Http\Controllers;
use Validator;
use App\Models\Todo;
use App\Models\step;
use Illuminate\Http\Request;
//use Illuminate\Validation\Validator;

class TodoController extends Controller
{
    //display all todos
    public function index()
    {
        $todos = auth()->user()->todos()->orderBy('completed')->get();
        //$todos = Todo::orderBy('completed')->get(); 
        //return $todos;
        return view('todos.index')->with(['todos'=> $todos]);


    }
    //after creating new todo display it 
    public function create()
    {
        return view('todos.create');
        
    }
    //for button edit
    public function edit($id)
    {
        //dd($id);
        $todo =Todo::find($id); 
        return view('todos.edit',compact('todo'));
        
    }
    //for after clicking update button 
    public function update(Request $request,$id)
    {
        //dd($request->all());
        $rules=[
            'title'=> 'required|max:255',
           ];
           $messages=[
               'title.max' => 'Todo title should not be greater than 255 chras.'
           ];
           $validator = Validator::make($request->all(), $rules, $messages); 
           if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
           }
        Todo::where('id', $id)->update(['title'=> $request->title,'description'=> $request->description]);
        if($request->stepsName){
            foreach($request->stepsName as $key => $value){
                $id = $request->stepsId[$key];
                //dd($key);
                //dd($request$stepsId[]);
                $steps=step::find($id);        
                $steps->update(['name'=> $value]);
            }
        }  
        //$request->session()->flash('message','Updated!');
        return redirect('todos')->with($request->session()->flash('message','Updated!'));
    }
    //for filling completed attribute as true
    public function complete(Request $request,$id){
        Todo::where('id', $id)->update(['completed'=> true]);
        $request->session()->flash('message','Marked As Done');
        return redirect()->back();
    }
    //for deleteing 
    public function delete(Request $request,$id,Todo $todo){
        
        //Todo has many steps 
        //Todo::where('id',$id)->steps()->each->delete();
    
        Todo::where('id',$id)->delete();
        $request->session()->flash('message','Deleted Successfully');
        return redirect()->back();
    }
    //for storing the data
    public function store(Request $request)
    {
       //fields validation with custome message
       $rules=[
        'title'=> 'required|max:255',
       ];
       $messages=[
           'title.max' => 'Todo title should not be greater than 255 chras.'
       ];
       $validator = Validator::make($request->all(), $rules, $messages); 
       if($validator->fails()){
        return redirect()->back()->withErrors($validator)->withInput();
       }   

        //if you have multiple fields to validate
        /*$request->validate([
            'title'=> 'required|max:255',
        ]);*/

        //if you have one field
        /*if(!$request->title){
            $request->session()->flash('error','Please give title');
            return redirect()->back();

        }*/
        //Without Auth
        //Todo::create($request->all());
        //With Auth
        //dd($request->all());
        $todo = auth()->user()->todos()->create($request->all());
        if($request->steps){
        foreach($request->steps as $steps){
            $todo->steps()->create(['name'=> $steps]);
        }
    } 
         
        return redirect('todos')->with($request->session()->flash('message','Todo Created Successfully'));
        //$request->session()->flash('message','Todo Created Successfully');
    }
    public function show(Request $request,$id)
    {
        //$todos = Todo::get();
        //$todos = auth()->user()->todos()->orderBy('completed')->get();
        //return view('todos.showdesc')->with(['todos'=> $todo]);;
     
        $todo = Todo::find($id);
        return view('todos.showdesc',compact('todo'));


    }
}
