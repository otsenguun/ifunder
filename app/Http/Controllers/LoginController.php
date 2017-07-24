<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
class LoginController extends Controller
{
    //
    public function login(){
    	return view('auth.login');
    }
    public function postLogin(Request $request){
        try{
           if(Sentinel::authenticate($request->all())){

               $slug = Sentinel::getUser()->roles()->first()->slug;
               if( $slug == 'admin')
                   return redirect('/admin');
               else if($slug == 'startup')
                   return redirect('/startup');
               else if($slug == 'angel')
                   return redirect('/angel');
           }else{
               return redirect()->back()->with(['error' => "This user does not exist"]);
           }
        }catch (ThrottlingException $e){
    	    $delay = $e->getDelay();
    	    return redirect()->back()->with(['error' => "You are banned for $delay second"]);
        }
        catch (NotActivatedException $e){
    	 
    	    return redirect()->back()->with(['error' => "Your account not activated!."]);
        }
    }

    public function profile(){

        $slug = Sentinel::getUser()->roles()->first()->slug;
        if( $slug == 'admin')
            return redirect('/admin');
        else if($slug == 'startup')
            return redirect('/startup');
        else if($slug == 'angel')
            return redirect('/angel');
    }

    public function select(){
    	return view('register-select');
    }
    public function logout(){
        Sentinel::logout();
        return redirect('/');
    }
}
