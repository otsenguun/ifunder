<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use DB;
use Session;	
use Illuminate\Support\Facades\Input;
class AdminController extends Controller
{
    //
    function index(){
        return view('admin.welcome');
    }
    public function projectShow(){
        $data = DB::table('projects')
            ->join('users','users.id','=','projects.user_id')
            ->select('projects.project_name','projects.project_desc','users.company','projects.project_id')
            ->get();
        //dump($data);
        return view('admin.projects.show',compact('data'));
    }
    public function deleteProject($id){
    	$data = DB::table('projects')->where('projects.project_id',$id)->delete();
    	Session::flash('project_delete', 'this porject delete successfully!');
        return back();
    	
    }
     public function deleteInvestment($id){
    	$data = DB::table('investment')->where('investment_id',$id)->delete();
    	Session::flash('investment_delete', 'this investment delete successfully!');
        return back();
    	
    }
    public function investmentShow(){
        $data = DB::table('investment')
//            ->join('users','users.id','=','projects.user_id')
            ->get();
        //dump($data);
        return view('admin.investment.show',compact('data'));
    }
    public function investmentView($id){
        $data = DB::table('investment')
            ->leftJoin('users','investment.user_id','=','users.id')
            ->leftJoin('location','investment.location_id','=','location.id')
            ->leftJoin('sector','investment.sector_id','=','sector.id')
            ->leftJoin('invest','investment.invest_id','=','invest.id')
            ->leftJoin('capital','investment.capital_id','=','capital.id')
            //->select('projects.created_at')
            ->where('investment.investment_id',$id)
            ->first();
        //dump($data);
        return view('admin.investment.view',compact('data'));
    }
    public function projectView($id){
        $data = DB::table('projects')
            ->leftJoin('users','projects.user_id','=','users.id')
            ->leftJoin('location','projects.location_id','=','location.id')
            ->leftJoin('sector','projects.sector_id','=','sector.id')
            ->leftJoin('status','projects.status_id','=','status.id')
            ->leftJoin('capital','projects.capital_id','=','capital.id')
            //->select('projects.created_at')
            ->where('projects.project_id',$id)
            ->first();
        //dump($data);
        return view('admin.projects.view',compact('data'));
    }
    public function usersShow(){
        $startup = DB::table('role_users')
            ->join('roles','roles.id','=','role_users.role_id')
            ->join('users','users.id','=','role_users.user_id')
            ->select('*')
            ->where('roles.slug','=','startup')
//            ->where('role_users.role_id','=','roles.id')
            ->get();

        return view('admin.users.show',compact('startup'));
    }
    public function deleteUser($id){
        DB::table('users')->where('id',$id)->delete();
        Session::flash('user_delete', 'user delete successfully!');
        return back();
    }
   
    public function angelsShow(){

        $investor = DB::table('role_users')
            ->join('roles','roles.id','=','role_users.role_id')
            ->join('users','users.id','=','role_users.user_id')
            ->select('*')
            ->where('roles.slug','=','angel')
//            ->where('role_users.role_id','=','roles.id')
            ->get();
        //dump($investor);
        return view('admin.users.show-angel',compact('investor'));
    }

    public function userSuccess($id, Request $request){
        $r = DB::table('users')->where('id', $id)->update([
            'success' => Input::has('success') ? 1 : 0
        ]);

        if($r) {
            return redirect('admin/users/show');
        }else{
        }
    }
    public function userSuccess1($id, Request $request){
        $r = DB::table('users')->where('id', $id)->update([
            'success' => Input::has('success1') ? 0 : 1
        ]);
        if($r) {
            return redirect('admin/users/show');
        }else{
        }
    }
    public function userSuccessInvestor($id, Request $request){
        $r = DB::table('users')->where('id', $id)->update([
            'success' => Input::has('success') ? 1 : 0
        ]);

        if($r) {
            return redirect('admin/users/show-angel');
        }else{
        }
    }
    public function userSuccessInvestor1($id, Request $request){
        $r = DB::table('users')->where('id', $id)->update([
            'success' => Input::has('success1') ? 0 : 1
        ]);
        if($r) {
            return redirect('admin/users/show-angel');
        }else{
        }
    }
}
