<?php
/**
 * Created by PhpStorm.
 * User: Miigaa
 * Date: 7/9/2017
 * Time: 2:59 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Sentinel;
use Session;
use Illuminate\Support\Facades\Input;
use App\Location;
use App\Sector;
use App\Invest;
use App\Capital;
use App\Investment;

class AngelController
{
    public function index(){
        $s = Sentinel::getUser()->id;
        $data = DB::table('users')->where('id',$s)->first();
        //dump($data);
        return view('angel.welcome',compact('data'));
    }

    public function profileEdit($id){
        $data = DB::table('users')->where('id',$id)->first();
        //dump($data);
        return view('angel.profile-edit',compact('data'));
    }
    public function profileUpdate(Request $request){

    
        if(Input::hasFile('file')){
            $file = Input::file('file');
            $file->move('uploads/user/profile/angel/image',$file->getClientOriginalName());
        }
        DB::table('users')->where('id',$request['id'])->update([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'company' => $request['company'],
            'address' => $request['address'],
            'web' => $request['web'],
            'image' => $file->getClientOriginalName(),
        ]);
        Session::flash('message', 'profile change successfully!');
        return redirect('angel');
    }
    //project
    public  function ProjectShow(){
        $location = Location::all();
        $sector = Sector::all();
        $invest = Invest::all();
        $capital = Capital::all();
        return view('angel.project-add',compact('location','sector','invest','capital'));
    }
    public function ProjectUpdate(Request $request){
        

       if(Input::hasFile('file')){
            $file = Input::file('file');
            $file->move('uploads/angel/user/project/file/',$file->getClientOriginalName());
            $data = Investment::create([
            'project_name' => $request->input('usg'),
            'project_desc' => $request->input('usg1'),
            'project_looking' => $request->input('cost'),
            'project_month' => $request->input('cost1'),
            'user_id' => Sentinel::getUser()->id,
            'location_id' => $request->input('location_id'),
            'sector_id' => $request->input('sector_id'),
            'invest_id' => $request->input('invest_id'),
            'capital_id' => $request->input('capital_id'),
 'file' => $file->getClientOriginalName(),
        ]);
        
        $data->save();
        Session::flash('investment', 'Your proposal was uploaded successfully!');
        return redirect('angel/profile/project/show');
        }
        else{
        $data = Investment::create([
            'project_name' => $request->input('usg'),
            'project_desc' => $request->input('usg1'),
            'project_looking' => $request->input('cost'),
            'project_month' => $request->input('cost1'),
            'user_id' => Sentinel::getUser()->id,
            'location_id' => $request->input('location_id'),
            'sector_id' => $request->input('sector_id'),
            'invest_id' => $request->input('invest_id'),
            'capital_id' => $request->input('capital_id'),
        ]);
        $data->save();
        Session::flash('investment', 'Your proposal was uploaded successfully!');
        return redirect('angel/profile/project/show');}
    }
    public function ProjectView(){
        $data = DB::table('investment')
            ->join('location','investment.location_id','=','location.id')
            ->join('sector','investment.sector_id','=','sector.id')
            ->join('invest','investment.invest_id','=','invest.id')
            ->join('capital','investment.capital_id','=','capital.id')
            ->select('investment.investment_id','investment.project_desc','investment.project_month',
                'investment.project_looking','investment.project_name','investment.user_id','investment.location_id','investment.sector_id',
                'investment.invest_id','investment.capital_id','location.location_name','sector.sector_name','invest.id','invest.invest_name',
                'capital.id','capital.capital_name','investment.created_at')
            ->where('investment.user_id',Sentinel::getUser()->id)
            ->get();
        //dump($data);
        return view('angel.project-view',compact('data'));
    }

    public function ProjectEdit($id){
        $location = Location::all();
        $sector = Sector::all();
        $invest = Invest::all();
        $capital = Capital::all();
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
        return view('angel.project_edit',compact('data','location','sector','invest','capital'));
    }

	public function ProjectDelete($id){
    	$data = DB::table('investment')->where('investment.investment_id',$id)->delete();
    	Session::flash('project_delete', 'this porject delete successfully!');
        return back();
    	
    }
}