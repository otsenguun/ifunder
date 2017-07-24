<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Activation;
use DB;
use Mail;
use Session;
class RegisterController extends Controller
{
    //
    public function registerStartUp(){

    	return view('auth.register-startup');

    }

    public function postRegisterStartUp(Request $request){
        $this->validate($request, [
        'email' => 'required|unique:users|max:100',
        'password' => 'required|min:3|confirmed',
        'password_confirmation' => 'required|min:3'
    
    ]);

    	$user = Sentinel::register($request->all());
     	$activation = Activation::create($user);
     	$this->sendEmail($user, $activation->code);
    
    	$role = Sentinel::findRoleBySlug('startup');
    	$role->users()->attach($user);

        Session::flash('startup', 'We emailed you an activation link. please check your email!');
    	return redirect('/login');
    }

    public function registerInvestor(){

        return view('auth.register-investor');

    }

    public function postRegisterInvestor(Request $request){
 	$this->validate($request, [
        'email' => 'required|unique:users|max:100',
         'password' => 'required|min:3|confirmed',
        'password_confirmation' => 'required|min:3'
    
    ]);

       $user = Sentinel::register($request->all());
     	$activation = Activation::create($user);
     	$this->sendEmail($user, $activation->code);

        $role = Sentinel::findRoleBySlug('angel');

        $role->users()->attach($user);

        return redirect('/login');

    }
    private function sendEmail($user, $code){
         Mail::send('emails.activation',[
             'user' => $user,
             'code' => $code
         ],function ($message) use ($user){
             $message->to($user->email);
             $message->subject("Hello $user->first_name, an activation link. please");
         });
     }

}
