<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ohlandt\Presenters\Pagination\Materialize;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;
use Session;

use App\Service;
use App\Category;
use App\Like;
use App\Inbox;

class HomeController extends Controller
    {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


 

    public function inbox(){
        $inbox=Inbox::where('sender_id','<>',Auth::user()->id)
        ->where('reciever_id',Auth::user()->id)->get();
        
        $sender=Inbox::where('sender_id',Auth::user()->id)
       ->get();

        return view('inbox',compact('inbox','sender'));
    }

    public function search(Request $request){

      $search=$request->search;
      $data=Service::where('description','like',"%$search%")
         ->orWhere('titre', 'LIKE', "%$search%")
         ->get();
    return view('search',compact('data','search'));


}

    public function nouveau(){
$services=Service::all();
$categories=Category::all();
        $data=Service::orderBy('created_at','DESC')->paginate(3);
        return view('nouveau',compact('data','services','categories'));

        
    }

    public function notes(){
        $services=Service::all();
        $categories=Category::all();
        $data=Like::where(max('like','1'))->get();
            
                return view('notes',compact('data','services','categories'));
               
        
                
            }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function category($id){
        $serv=Service::all();
        $categories=Category::all();
$services=Service::where('type',$id)->get();
return view('category',compact('services','categories','serv'));
    }
    public function index()
    {
       
        $services=Service::where('flag',1)->paginate(6);
        $categories=Category::all();
        return view('home',compact('services','categories'));
    }
}
