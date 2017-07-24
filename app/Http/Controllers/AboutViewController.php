<?php
/**
 * Created by PhpStorm.
 * User: Miigaa
 * Date: 7/10/2017
 * Time: 2:51 PM
 */

namespace App\Http\Controllers;


class AboutViewController
{
    public function welcome(){
        $data = DB::table('role_users')
            ->join('users','users.id','=','role_users.user_id')
            ->join('roles','roles.id','=','role_users.role_id')
            ->get();



        return view('about',compact('data'));
    }
}