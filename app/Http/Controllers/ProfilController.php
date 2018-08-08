<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Service;
use App\Category;
use App\User;
use App\Inbox;


class ProfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(){
        $categories=Category::all();
        $services=Service::where('user_id',Auth::user()->id)->get();

        return view('Profil.myprofile',compact('services','categories'));
    }

    public function showprofile($username){

        $users=User::where('username',$username)->first();
        return view('Profil.showprofile',compact('users'));


    }

    public function showedit(){
        return view('Profil.edit');

    }

    public function showmp(){
return view('Profil.change-password');
    }


 


        public function updatepassword(Request $request)
        {


         

    $old= $request->oldpassword;
    $new=$request->newpassword;
       
 if (!Hash::check($old,Auth::user()->password)) {
    $request->session()->flash('erreur','Mise à jour reussi!');

    return back();
 
}
else {
    $request->user()->fill(['password'=>Hash::make($new)])->save();
    $request->session()->flash('notif','Mise à jour reussi!');

          return back();
}

        }
      


        public function updateprofile(Request $request){


           $this->validate($request,array(
               'username'=>'required_without_all:email ,ville,tel,description,image,diplomes,langues',
               'email'=>'required_without_all:ville,tel,description,image,diplomes,langues',
               'ville'=>'required_without_all:email,tel,description,image,diplomes,langues',
               'tel'=>'required_without_all:email ,ville,description,image,diplomes,langues',
               'description'=>'required_without_all:email ,ville,tel,image,diplomes,langues',
              'image'=>'required_without_all:email ,ville,tel,description,diplomes,langues',
               'diplomes'=>'required_without_all:email ,ville,tel,description,image,langues',
               'langues'=>'required_without_all:email ,ville,tel,description,image,diplomes',
               


           ));

           //file upload

           if ($request->hasFile('image')){
               //get file name with extension
               $filenameWithExt=$request->file('image')->getClientOriginalName();
               // Get just filename
                  $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
               //Get just extension
               $extension=$request->file('image')->getClientOriginalExtension();
               //file name to store
               $fileNameToStore=$filename.'_'.time().'.'.$extension;
               $path=$request->file('image')->storeAs('public/image',$fileNameToStore);}

           
           else{
               $fileNameToStore='default.jpg';}
           

           $user = Auth::user();

           $user->username=$request->username;
           $user->email=$request->email;
           $user->ville=$request->ville;
          
           $user->tel=$request->tel;
           $user->description=$request->description;
           $user->image=$fileNameToStore;
           $user->diplomes=$request->diplomes;
           $user->langues=$request->langues;
           $user->save();
           $request->session()->flash('notif','Mise à jour reussi!');

          return back();
          

          



            
        }

public function inbox($id, Request $request){

    $this->validate($request,array(
   'message'=>'required',
   'sujet'=>'required',
       ));
$inbox=new Inbox();
$inbox->sender_id=Auth::user()->id;
$inbox->reciever_id=$id;
$inbox->sujet=$request->sujet;
$inbox->message=$request->message;
$inbox->save();
$request->session()->flash('message','Mise à jour reussi!');

return back();



}







    
    }