<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;

class PartnerController extends Controller
{
    //

    public function show(){
        $data = DB::table('partners')->get();
        return view('admin.partners.show',compact('data'));
    }

    public function add(){
        return view('admin.partners.add');
    }

    public function post(Request $request){
        if(Input::hasFile('file')){
            $file = Input::file('file');
            $file->move('uploads/partners/news',$file->getClientOriginalName());
        }
        DB::table('partners')->insert([
            'title' => $request['title'],
            'links' => $request['links'],
            'image' => $file->getClientOriginalName(),
        ]);
        return redirect('admin/partners/show');
    }
    public function edit($id){
        $data = DB::table('partners')->where('id',$id)->first();
        return view('admin.partners.edit',compact('data'));
    }

    public function update(Request $request){
        if(Input::hasFile('file')){
            $file = Input::file('file');
            $file->move('uploads/partners/news',$file->getClientOriginalName());
        }
        DB::table('partners')->update([
            'image' => $file->getClientOriginalName(),
        ]);
        return redirect('admin/partners/show');
    }
    public function delete($id){
        DB::table('partners')->where('id',$id)->delete();
        return back();
    }
}
