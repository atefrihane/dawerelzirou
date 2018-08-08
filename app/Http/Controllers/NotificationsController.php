<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;

use Illuminate\Support\Facades\Auth;

class NotificationsController extends Controller
{
    public function allseen(){  
foreach (Auth::user()->notifications as $notification){
    $notification->markAsRead();
        }

    }
}
