<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Admin;




class  AdminLoginController extends Controller
{
 

    use AuthenticatesUsers;

    
    protected $redirectTo = '/admin';

  
    public function __construct()
    {
        $this->middleware(array('guest:admin','guest:web'))->except('logout');
    }
     
    
   public function logout(Request $request)
    {
    $this->guard('admin')->logout();

        $request->session()->invalidate();

        return redirect()->route('AdminLogin');
    }

     public function showLoginForm()
    {
        return view('Admin.admin-login');
    }

    
     protected function guard()
    {
        return Auth::guard('admin');
    }
    
    
       protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }
    
    

}
