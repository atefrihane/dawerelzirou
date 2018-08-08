<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Service;
use App\Comment;
use App\User;
use App\Notifications\NotifyServiceOwner;
use Illuminate\Support\Facades\Auth;

use StreamLab\StreamLabProvider\Facades\StreamLabFacades;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,  $services_id)
    {
       $this->validate($request,array(
            'body'=>'required',
        ));
          
    
      $comment=new Comment;
     
      $comment->body=$request->body;
      $comment->user_id=$request->user()->id;
      $comment->services_id=$services_id;
      $comment->save();
      $service=Service::find($request->services_id);
      User::find($service->user->id)->Notify(new NotifyServiceOwner($service));
      $data = $service->user->username.' a commenté votre service'.'<br>'.$service->titre;
      StreamLabFacades::pushMessage('addcomment' , '' , $data);
      
      
  

      $request->session()->flash('notif','success');
      return back();
     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Service $id)
{
    $comments=Comment::where('services_id',$id);
    return view('show.services')->with;
 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,array(
            'body'=>'required',
            
             
    
    
         ));
       $comments=Comment::find($id);
       $comments->body=$request->body;
       $comments->save();
        
        session()->flash('maj','Mise à jour reussi!');
         return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comment::where([
            'id' => $id,
            
          
     ])->delete();

     session()->flash('suppr','Mise à jour reussi!');
     return back();
    }
}
