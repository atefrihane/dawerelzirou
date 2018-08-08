<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Admin;
use App\User;
use App\Service;
use App\Category;
use App\Achat;
use Illuminate\Support\Facades\Storage;
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    
        {
            $users=User::all();
            return view('Admin.admin',compact('users'));
            
        
    }

public function services(){

    $services=Service::all();
    return view('Admin.service',compact('services'));
}

public function achat(){
$achats=Achat::all();
    return view('Admin.achat',compact('achats'));
}

public function approuver($id){

    Service::where([
        'id' => $id,
        
      
    ])->update(array('flag'=>'1'));
    
    session()->flash('notif','Mise à jour reussi!');
     return back();
    
    }



    public function destroy($id){

        $service=Service::where('id',$id)->first();
        if ($service != null) {
            if($service->serviceimage!='default.jpeg'){
             Storage::delete('public/serviceimage/'.$service->serviceimage);
            }
            $service->delete();
            session()->flash('suppr','Mise à jour reussi!');
            return back();
        }
    }



public function categorie(){

    $categories=Category::all();
    return view('Admin.category',compact('categories'));
}

public function majcat($id, Request $request){


    $this->validate($request,array(
        'nom'=>'required',
        
         


     ));
   $categories=Category::find($id);
   $categories->nom=$request->nom;
   $categories->save();
    
    session()->flash('notif','Mise à jour reussi!');
     return back();
    
    }



    public function addcategorie(Request $request){

        $this->validate($request,array(
            'nom'=>'required',
            
             
    
    
         ));

         $categories= new Category();
         $categories->nom=$request->nom;
         $categories->save();

         session()->flash('add','Mise à jour reussi!');
         return back();

    }


    public function destroycategorie($id){
        
        Category::where([
            'id' => $id,
            
          
     ])->delete();

     session()->flash('delete','Mise à jour reussi!');
     return back();

    }


    public function destroyuser($id){
        
        User::where([
            'id' => $id,
            
          
     ])->delete();

     session()->flash('user','Mise à jour reussi!');
     return back();

    }





}