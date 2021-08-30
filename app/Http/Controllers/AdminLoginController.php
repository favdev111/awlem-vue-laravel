<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;

use Validator;

class AdminLoginController extends Controller{
    //
    public function login(){
        session()->flash('notif',__('General.You_must_verify'));

        return view('admin.adminlogin.login');
    }

    public function postlogin(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
         
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            //session language session
            $request->session()->put('language', $request->language);  
            $user = Auth::user();
            session()->flash('notif',__('General.Signed_successfully'));
            if($user->hasRole('Super Admin')){
                return redirect('/admin');
            }elseif($user->hasRole('Restorant')){
                return redirect('admin/restorants');
            }elseif($user->hasRole('Branch')){
                return redirect('admin/branches');
            }else{
                return redirect('/admin');
            }
        } 
        else{
            session()->flash('notif',__('General.You_must_verify'));
            return redirect('/');
        }
    }
}
