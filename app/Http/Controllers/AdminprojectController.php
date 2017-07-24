<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use App\Capital;
use App\Sector;
use App\Invest;
use App\Status;
use DB;
class AdminprojectController extends Controller
{
    //
    public function showLocation(){
        $data = Location::all();
        return view('admin.location.show',compact('data'));
    }
    public function addLocation(){
        return view('admin.location.add');
    }
    public function updateLocation(Request $request){
        DB::table('location')->insert([
            'location_name' => $request['location']
        ]);
        return redirect('admin/location/show');
    }

    //Cap
    public function showCap(){
        $data = Capital::all();
        return view('admin.capital.show',compact('data'));
    }
    public function addCap(){
        return view('admin.capital.add');
    }
    public function updateCap(Request $request){
        DB::table('capital')->insert([
            'capital_name' => $request['capital']
        ]);
        return redirect('admin/capital/show');
    }

    //status
    public function showStatus(){
        $data = Status::all();
        return view('admin.status.show',compact('data'));
    }
    public function addStatus(){
        return view('admin.status.add');
    }
    public function updateStatus(Request $request){
        DB::table('status')->insert([
            'status_name' => $request['status']
        ]);
        return redirect('admin/status/show');
    }

    //sector
    public function showSector(){
        $data = Sector::all();
        return view('admin.sector.show',compact('data'));
    }
    public function addSector(){
        return view('admin.sector.add');
    }
    public function updateSector(Request $request){
        DB::table('sector')->insert([
            'sector_name' => $request['sector']
        ]);
        return redirect('admin/sector/show');
    }
    //invest
    public function showInvest(){
        $data = Invest::all();
        return view('admin.invest.show',compact('data'));
    }
    public function addInvest(){
        return view('admin.invest.add');
    }
    public function updateInvest(Request $request){
        DB::table('invest')->insert([
            'invest_name' => $request['invest']
        ]);
        return redirect('admin/invest/show');
    }
    public function editInvest($id){
        return view('admin.inves.edit');
    }
//    public function updateInvest(Request $request){
//
//    }
//    public function deleteInvest($id){
//
//    }
}
