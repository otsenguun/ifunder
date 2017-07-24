<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Activation;
use Sentinel;
use DB;
class ActivationController extends Controller
{
    
    public function active($email, $activationCode){

         $user = DB::table('users')->where('users.email',$email)->first();
         $sentinelUser = Sentinel::findById($user->id);
         if(Activation::complete($sentinelUser, $activationCode)){

              return redirect('/login');

         }else{
             return 'error';
         }
     }
}
