<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
    //
    public function welcome(){
        $data = DB::table('role_users')
            ->join('users','users.id','=','role_users.user_id')
            ->join('roles','roles.id','=','role_users.role_id')
            ->where('roles.slug','startup')
            ->where('users.success',1)
            ->get();
        $data1 = DB::table('role_users')
            ->join('users','users.id','=','role_users.user_id')
            ->join('roles','roles.id','=','role_users.role_id')
            ->where('roles.slug','angel')
            ->where('users.success',1)
            ->get();
        //dump($data);
        $event = DB::table('event')->limit(5)->get();
        $article = DB::table('article')->limit(5)->get();
        //dump($event);
 $partners = DB::table('partners')->get();
        return view('welcome',compact('data','data1','event','article','partners'));
    }

    public function about(){
        return view('about');
    }

    public function startup(){

        $data = DB::table('role_users')
            ->join('users','users.id','=','role_users.user_id')
            ->join('roles','roles.id','=','role_users.role_id')
            ->where('roles.slug','startup')
            ->get();
        return view('startup',compact('data'));
    }
    public function investor(){
        $data1 = DB::table('role_users')
            ->join('users','users.id','=','role_users.user_id')
            ->join('roles','roles.id','=','role_users.role_id')
            ->where('roles.slug','angel')
            ->get();
        return view('investor',compact('data1'));
    }

    public function partner(){
    $data = DB::table('partners')->get();
        return view('partners',compact('data'));
    }
    public function showevent(){
 			$event = DB::table('event')->get();
       
 			return view('more.event-show',compact('event'));
    }
    public function showarticle(){

    	 $article = DB::table('article')->get();
  
    	 return view('more.article-show',compact('article'));

    }
    public function faqstartup(){
        return view('FAQ.faq-startup');
    }
     public function faqangel(){
        return view('FAQ.faq-angel');
    }
     public function faqpartner(){
        return view('FAQ.faq-partner');
    }

}
