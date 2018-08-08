<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Session;

use App\Achat;
use App\User;

class PaymentController extends Controller
{
    public function achat($id){
    
        $achat = new Achat;
        $achat->user_id=auth::user()->id;
        $achat->service_id=$id;
        $achat->save();
        
        session()->flash('achat','Mise à jour reussi!');
        return back();

    }
}
