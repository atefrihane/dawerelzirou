<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Session;
use App\Service;
use App\Like;

use App\User;
use App\Achat;
use App\Category;

use App\Notifications\likeservice;
use App\Notification;
use StreamLab\StreamLabProvider\Facades\StreamLabFacades;



class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    
    
    }







    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
  
        return view('service.createservice',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
      
        
        $this->validate($request,array(
           'titre'=>'required',
           'type'=>'required|integer',
            'description'=>'required',
           'imageservices'=>'image|nullable|max:1999',
            'periode'=>'required',
            'instruction'=>'required',
            


        ));

  //file upload

  if ($request->hasFile('serviceimage')){
    //get file name with extension
    $filenameWithExt=$request->file('serviceimage')->getClientOriginalName();
    // Get just filename
       $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
    //Get just extension
    $extension=$request->file('serviceimage')->getClientOriginalExtension();
    //file name to store
    $fileNameToStore=$filename.'_'.time().'.'.$extension;
    $path=$request->file('serviceimage')->storeAs('public/serviceimage',$fileNameToStore);}


else{
    $fileNameToStore='default.jpeg';}



        $service= new Service;
        $service->titre=$request->titre;
        $service->type=$request->type;
        $service->description=$request->description;
        $service->serviceimage=$fileNameToStore;
        $service->periode=$request->periode;
        $service->instruction=$request->instruction;
        $service->user_id=$request->user()->id;
        $service->save();

       


        $request->session()->flash('notif','Mise à jour reussi!');
 

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $achat=Achat::where('service_id',$id)
        ->where('user_id',Auth::user()->id)
        ->first();
        $services= Service::find($id);
        $likes=Like::where('service_id',$id)
        ->where('user_id',auth::user()->id)
        ->first();
        return view('service.showservice',compact('services','likes','achat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

       
    }

   
    public function update(Request $request, $id)
    {

        $this->validate($request,array(
            'titre'=>'required',
            'type'=>'required|integer',
             'description'=>'required',
            'imageservices'=>'image|nullable|max:1999',
             'periode'=>'required',
             'instruction'=>'required',
             
 
 
         ));



         if ($request->hasFile('serviceimage')){
            //get file name with extension
            $filenameWithExt=$request->file('serviceimage')->getClientOriginalName();
            // Get just filename
               $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //Get just extension
            $extension=$request->file('serviceimage')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore=$filename.'_'.time().'.'.$extension;
            $path=$request->file('serviceimage')->storeAs('public/serviceimage',$fileNameToStore);}
        
            $service=Service::find($id);
            $service->titre=$request->titre;
            $service->type=$request->type;
            $service->description=$request->description;
            if ($request->hasFile('serviceimage')){
           Storage::delete('public/serviceimage/'.$service->serviceimage);
            $service->serviceimage=$fileNameToStore;
            }
            $service->periode=$request->periode;
            $service->instruction=$request->instruction;
            $service->user_id=$request->user()->id;
            $service->save();
            $request->session()->flash('mj','Mise à jour reussi!');
            return back();
    }



    public function destroy($id){
  $service=Service::where('id',$id)->first();
  if ($service != null) {
      if($service->serviceimage!='default.jpeg'){
       Storage::delete('public/serviceimage/'.$service->serviceimage);
      }
      $service->likes()->delete();
      $service->delete();
      session()->flash('notif','Mise à jour reussi!');
      return back();
}

 
 

  
    
    
    }

    public function like(Request $request){

        $like_s=$request->like_s;
        $service_id=$request->service_id;
        $change_like=0;

        $like=Like::where([
'service_id'=>$service_id,
'user_id'=>Auth::user()->id,

        ])->first();


     if(!$like){
$new_like=new Like;
$new_like->service_id=$service_id;
$new_like->user_id=Auth::user()->id;
$new_like->like=1;
$new_like->save();


$is_like=1;


     }
     
     elseif($like->like==1){
         Like::where([
            'service_id' => $service_id,
            'user_id' => Auth::user()->id,
          
     ])->delete();
     $is_like=0;
     


     }

    

     elseif($like->like==0){
     Like::where([
            'service_id' => $service_id,
            'user_id' => Auth::user()->id,
          
     ])->update(array('like'=>1));
  
     $is_like=1;
$change_like=1;


    }
   
    $service=Service::find($service_id);
    User::find($service->user_id)->Notify(new likeservice($service));
   $data1 = 'Une personne a evalué votre service'.'<br>'.$service->titre;
    StreamLabFacades::pushMessage('likedis' , '' , $data1);
    

    $response=array(
        'is_like'=>$is_like,
        'change_like'=>$change_like,
    );
   
    return response()->json($response,200);
  

  
    
}









public function dislike(Request $request){

    $like_s=$request->like_s;
    $service_id=$request->service_id;
    $change_dislike=0;

    $dislike=Like::where([
'service_id'=>$service_id,
'user_id'=>Auth::user()->id,

    ])->first();


 if(!$dislike){
$new_like=new Like;
$new_like->service_id=$service_id;
$new_like->user_id=Auth::user()->id;
$new_like->like=0;
$new_like->save();
$is_dislike=1;

 }
 
 elseif($dislike->like==0){
     Like::where([
        'service_id' => $service_id,
        'user_id' => Auth::user()->id,
      
 ])->delete();
 $is_dislike=0;
 


 }

 elseif($dislike->like==1){
 Like::where([
        'service_id' => $service_id,
        'user_id' => Auth::user()->id,
      
 ])->update(array('like'=>0));
 $is_dislike=1;
 $change_dislike=1;


}

$response=array(
    'is_dislike'=>$is_dislike,
    'change_dislike'=>$change_dislike,
);

return response()->json($response,200);


}




public function achat(){
    $services=Achat::where('user_id',Auth::user()->id)->get();
return view('service.baughtservice',compact('services'));
}











}
