<?php


namespace App\Http\Controllers;
use App\Http\Controllers\storage;
use Illuminate\Auth\AuthManager;
use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function uploadAvatar(Request $request){
        if($request->hasFile('image')){
            $filename = $request->image->getClientOriginalName();
            $this->deleteOldImage();
            $request->image->storeAs('images',$filename,'public');
            auth()->user()->update(['avatar'=> $filename]);
            
            $request->session()->flash('message','Image Upload.');
            
            return redirect()->back();    
        }
        $request->session()->flash('error','Image not Uploaded.');
        return redirect()->back();        
    } 

    protected function deleteOldImage(){
        if(auth()->user()->avatar){
            \Storage::delete('/public/images/'. auth()->user()->avatar);
         }
    }


    public function index()
    {
        //insert
        /*$user = new User();
        $user->name='pawan';
        $user->email='pawan@gmail.com';
        $user->password= bcrypt('password');
        $user->save();*/

        //display
        //$user = User::all();        
        //return $user;


        //delete
        //User::where('id',1)->delete();

        //display
        //$user = User::all();        
        //return $user;
   
        //update
        //User::where('id',2)->update(['name'=>'lulla']);
        
        //display
        //$user = User::all();        
        //return $user;

        //user model only intract with users table
             
       
        $data=[
            'name'=>'jai',
            'email'=>'jai@email.com',
            'password'=>'password',
        ];
        //User::create($data); 

        //display
        $user = User::all();        
        return $user;



























        return 'controller';
    }
}

