<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use Session;
class ArticleController extends Controller
{
    //
    public function eventShow(){
        $data = DB::table('event')->get();
        return view('admin.event.show',compact('data'));
    }

    public function eventAdd(){
        return view('admin.event.add');
    }

    public function eventPost(Request $request){
 $this->validate($request, [
        'title' => 'required|unique:event|max:100',
        'body' => 'required',
        'file' => 'required',
    
    ]);
        if(Input::hasFile('file')){
            $file = Input::file('file');
            $file->move('uploads/event/news',$file->getClientOriginalName());
        }
        DB::table('event')->insert([
            'title'  => $request['title'],
            'body'  => $request['body'],
            'image' => $file->getClientOriginalName(),
        ]);
        return redirect('admin/event/show');
    }
    public function eventEdit($id){
        $data = DB::table('event')->where('id',$id)->first();
        return view('admin.event.edit',compact('data'));
    }

    public function eventUpdate(Request $request){
  $this->validate($request, [
        'title' => 'required|max:100',
        'body' => 'required',
      
    
    ]);
        DB::table('event')->where('id',$request['id'])->update([
            'title'  => $request['title'],
            'body'  => $request['body'],
        ]);
        return redirect('admin/event/show');
    }
    public function eventDelete($id){
        DB::table('event')->where('id',$id)->delete();
        Session::flash('event_delete', 'event delete successfully!');
        return back();
    }

    //article
    public function show(){
        $data = DB::table('article')->get();
        return view('admin.article.show',compact('data'));
    }

    public function add(){
        return view('admin.article.add');
    }

    public function post(Request $request){
 $this->validate($request, [
        'title' => 'required|unique:article|max:100',
        'body' => 'required',
        'file' => 'required',

    ]);
        if(Input::hasFile('file')){
            $file = Input::file('file');
            $file->move('uploads/article/news',$file->getClientOriginalName());
        }
        DB::table('article')->insert([
            'title'  => $request['title'],
            'body'  => $request['body'],
            'image' => $file->getClientOriginalName(),
        ]);
        return redirect('admin/article/show');
    }
    public function edit($id){
        $data = DB::table('article')->where('id',$id)->first();
        return view('admin.article.edit',compact('data'));
    }

    public function update(Request $request){
 $this->validate($request, [
        'title' => 'required|max:100',
        'body' => 'required',
      

    ]);
        DB::table('article')->where('id',$request['id'])->update([
            'title'  => $request['title'],
            'body'  => $request['body'],
        ]);
        return redirect('admin/article/show');
    }
    public function delete($id){
        DB::table('article')->where('id',$id)->delete();
        Session::flash('article_delete', 'article delete successfully!');
        return back();
    }
    public function eventMore($id){
        $data = DB::table('event')->where('id',$id)->first();
         //dump($data);
        return view('readmore1',compact('data'));
    }
    public function articleMore($id){
        $data = DB::table('article')->where('id',$id)->first();
         //dump($data);
        return view('readmore',compact('data'));
    }
}
