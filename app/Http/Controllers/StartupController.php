<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Sentinel;
use Session;
use Illuminate\Support\Facades\Input;
use App\Location;
use App\Sector;
use App\Status;
use App\Capital;
use App\Project;
use Validate;
use Reminder;
use App\Investment;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ProjectRequest;

class StartupController extends Controller
{
    //
    public function index(){
        $s = Sentinel::getUser()->id;
        $data = DB::table('users')->where('id',$s)->first();
        //dump($data);
        return view('startup.welcome',compact('data'));
    }

    public function profileEdit($id){
        $data = DB::table('users')->where('id',$id)->first();
        //dump($data);
        return view('startup.profile-edit',compact('data'));
    }
    public function sprofileUpdate(Request $request){
    
    
        $this->validate($request, [
            'first_name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'phone' => 'required|numeric',
            'company' => 'required|max:100',
            'address' => 'required|max:100',
            'web' => 'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/|required|max:100',
        ]);
        
        if(Input::hasFile('file')){
            $file = Input::file('file');
            $file->move('uploads/user/profile/angel/image',$file->getClientOriginalName());
            DB::table('users')->where('id',$request['id'])->update([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'phone' => $request['phone'],
            'company' => $request['company'],
            'address' => $request['address'],
            'web' => $request['web'],
            'image' => $file->getClientOriginalName(),
        ]);
        Session::flash('message', 'profile change successfully!');
        return redirect('angel');
        }
        else{
        DB::table('users')->where('id',$request['id'])->update([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'phone' => $request['phone'],
            'company' => $request['company'],
            'address' => $request['address'],
            'web' => $request['web'],

        ]);
        Session::flash('message', 'profile change successfully!');
        return redirect('angel');
        }
    }
    public function profileUpdate(Request $request){
         $this->validate($request, [
        'first_name' => 'required|max:100',
        'last_name' => 'required|max:100',
        'phone' => 'required|numeric',
        'company' => 'required|max:100',
        'address' => 'required|max:100',
        'web' => 'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/|required|max:100',
    ]);
        if(Input::hasFile('file')){
            $file = Input::file('file');
            $file->move('uploads/user/profile/image',$file->getClientOriginalName());
            DB::table('users')->where('id',$request['id'])->update([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'phone' => $request['phone'],
            'company' => $request['company'],
            'address' => $request['address'],
            'web' => $request['web'],
            'image' => $file->getClientOriginalName(),
        ]);
        Session::flash('message', 'profile change successfully!');
        return redirect('startup');
        }
        else{
        DB::table('users')->where('id',$request['id'])->update([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'phone' => $request['phone'],
            'company' => $request['company'],
            'address' => $request['address'],
            'web' => $request['web'],
        ]);
        Session::flash('message', 'profile change successfully!');
        return redirect('startup');
        }
    }
    //project

    public  function ProjectShow(){
        $location = Location::all();
        $sector = Sector::all();
        $status = Status::all();
        $capital = Capital::all();
        return view('startup.project-add',compact('location','sector','status','capital'));
    }
    
    
     public function sProjectUpdate(Request $request){
     
       $this->validate($request, [
        'file' => 'mimes:pdf,doc,xlsl,docx',
    ]);
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
    
    
    public function ProjectUpdate(ProjectRequest $request){

             

         $this->validate($request, [
        'project_name' => 'required|max:100',
        'project_desc' => 'required|max:500',
        'year' =>'required|numeric',
        'cost' => 'required|numeric',
        'own' => 'required|numeric',
        'looking' => 'required|numeric',
        'file' => 'mimes:pdf,doc,xlsl,docx',
       
    
    ]);
    
if(Input::hasFile('file')){
            $file = Input::file('file');
            $file->move('uploads/startup/user/project/file/',$file->getClientOriginalName());
            $data = Project::create([
            'project_name' => $request->input('project_name'),
            'project_desc' => $request->input('project_desc'),
            'project_generation' => $request->input('year'),
            'project_cost' => $request->input('cost'),
            'project_own' => $request->input('own'),
            'project_looking' => $request->input('looking'),
            'user_id' => Sentinel::getUser()->id,
            'location_id' => $request->input('location_id'),
            'sector_id' => $request->input('sector_id'),
            'status_id' => $request->input('status_id'),
            'capital_id' => $request->input('capital_id'),
            'file' => $file->getClientOriginalName(),
        ]);
        $data->save();
        Session::flash('project', 'Your project upload successfully!');
        return redirect('startup/profile/project/show');
        }
        else{    
        $data = Project::create([
            'project_name' => $request->input('project_name'),
            'project_desc' => $request->input('project_desc'),
            'project_generation' => $request->input('year'),
            'project_cost' => $request->input('cost'),
            'project_own' => $request->input('own'),
            'project_looking' => $request->input('looking'),
            'user_id' => Sentinel::getUser()->id,
            'location_id' => $request->input('location_id'),
            'sector_id' => $request->input('sector_id'),
            'status_id' => $request->input('status_id'),
            'capital_id' => $request->input('capital_id'),
        ]);
        $data->save();
        Session::flash('project', 'Your project upload successfully!');
        return redirect('startup/profile/project/show');
        }
    }
    public function ProjectView(){
        $data = DB::table('projects')
            ->join('location','projects.location_id','=','location.id')
            ->join('sector','projects.sector_id','=','sector.id')
            ->join('status','projects.status_id','=','status.id')
            ->join('capital','projects.capital_id','=','capital.id')
            ->where('projects.user_id',Sentinel::getUser()->id)
            ->get();
//        dump($data);
        return view('startup.project-view',compact('data'));
    }
    
     public function forgetPassword(){
        return view('auth.forget-password');
    }
    public function forgetPostPassword(Request $request){
    
  
        $user = DB::table('users')->where('email',$request->email)->first();
        $sentinelUser = Sentinel::findById($user->id);

        
           if(count($user) == 0)
            return redirect()->back()->with([
                'success' => 'Reset code was sent to your email. '
            ]);	
       
        $reminder = Reminder::exists($sentinelUser) ?: Reminder::create($sentinelUser);

        $this->sendEmail($user, $reminder->code);
        return redirect()->back()->with([
            'success' => 'Reset code was sent to your email. '
        ]);  
    }
    private function sendEmail($user, $code){
        Mail::send('emails.forget-password',[
           'user' => $user,
           'code' => $code
        ],function ($message) use ($user){
            $message->to($user->email);
            $message->subject("Hello  $user->first_name, reset your password. ");
        });
    }
    public function resetPassword($email, $resetCode){
        $user = DB::table('users')->where('users.email','=',$email)->first();

        $sentinelUser = Sentinel::findById($user->id);
        if(count($sentinelUser) == 0)
            abort(404);

        if($reminder = Reminder::exists($sentinelUser)) {
            if ($resetCode == $reminder->code)
//                return 'yes';
               return view('auth.reset-password');
            else
               return redirect('/');
        } else{
            return redirect('/');
        }
       // return $user;
    }
    public function resetPostPassword(Request $request,$email,$resetCode){
//        $this->validate($request,[
//            'password' => 'confirm|required|min:5|max:10',
//            'password_confirmation' => 'required|min:5|max:10'
//        ]);
        $user = DB::table('users')->where('users.email','=',$email)->first();

        $sentinelUser = Sentinel::findById($user->id);
        if(count($sentinelUser) == 0)
            abort(404);

        if($reminder = Reminder::exists($sentinelUser)) {
            if ($resetCode == $reminder->code){
                Reminder::complete($sentinelUser,$resetCode,$request->password);
                return redirect('/login')->with('success','Please login with your new password. ');
            }
            else
                return redirect('/');
        } else{
            return redirect('/');
        }

    }
    
    public function ProjectEdit($id){
        $location = Location::all();
        $sector = Sector::all();
        $status = Status::all();
        $capital = Capital::all();
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
        return view('startup.project-edit',compact('data','location','sector','status','capital'));
    }
    public function ProjectChange(Request $request){
    
    
 
        $this->validate($request, [
            'project_desc' => 'required|max:500',
            'year' =>'required|numeric',
            'cost' => 'required|numeric',
            'own' => 'required|numeric',
            'looking' => 'required|numeric',
            'file' => 'mimes:pdf,doc,docx',
        ]);
        
        if(Input::hasFile('file')){
            $file = Input::file('file');
            $file->move('uploads/angel/user/project/file/',$file->getClientOriginalName());

        DB::table('projects')->where('projects.project_id',$request['project_id'])->update([
            'project_name' => $request['project_name'],
            'project_desc' => $request['project_desc'],
            'project_generation' => $request['year'],
            'project_cost' => $request['cost'],
            'project_own' => $request['own'],
            'project_looking' => $request['looking'],
            'user_id' => Sentinel::getUser()->id,
            'location_id' => $request['location_id'],
            'sector_id' => $request['sector_id'],
            'status_id' => $request['status_id'],
            'capital_id' => $request['capital_id'],
            'file' => $file->getClientOriginalName(),
        ]);
        Session::flash('message', 'Your proposal change successfully!');
        return redirect('/startup/profile/project/show');
        }
        else{
        DB::table('projects')->where('projects.project_id',$request['project_id'])->update([
            'project_name' => $request['project_name'],
            'project_desc' => $request['project_desc'],
            'project_generation' => $request['year'],
            'project_cost' => $request['cost'],
            'project_own' => $request['own'],
            'project_looking' => $request['looking'],
            'user_id' => Sentinel::getUser()->id,
            'location_id' => $request['location_id'],
            'sector_id' => $request['sector_id'],
            'status_id' => $request['status_id'],
            'capital_id' => $request['capital_id'],
        ]);
        Session::flash('message', 'Your proposal change successfully!');
        return redirect('/startup/profile/project/show');
        }
        
    }
    
    
     public function ProjectDelete($id){
    	$data = DB::table('projects')->where('projects.project_id',$id)->delete();
    	Session::flash('project_delete', 'this porject delete successfully!');
        return back();
    	
    }
    
    public function sProjectChange(Request $request){
    
    
 $this->validate($request, [
        'file' => 'mimes:pdf,doc,docx',
    ]);
        if(Input::hasFile('file')){
            $file = Input::file('file');
            $file->move('uploads/angel/user/project/file/',$file->getClientOriginalName());
                 DB::table('investment')->where('investment.investment_id',$request['project_id'])->update([
            'project_name' => $request['usg'],
            'project_desc' => $request['usg1'],
            'project_looking' => $request['cost'],
            'project_month' => $request['cost1'],
            'user_id' => Sentinel::getUser()->id,
            'location_id' => $request['location_id'],
            'sector_id' => $request['sector_id'],
            'invest_id' => $request['invest_id'],
            'capital_id' => $request['capital_id'],
            'file' => $file->getClientOriginalName(),
        ]);
        
        return redirect('/angel/profile/project/show');
        }
  	else{
        DB::table('investment')->where('investment.investment_id',$request['project_id'])->update([
            'project_name' => $request['usg'],
            'project_desc' => $request['usg1'],
            'project_looking' => $request['cost'],
            'project_month' => $request['cost1'],
            'user_id' => Sentinel::getUser()->id,
            'location_id' => $request['location_id'],
            'sector_id' => $request['sector_id'],
            'invest_id' => $request['invest_id'],
            'capital_id' => $request['capital_id'],           
        ]);
        
        return redirect('/angel/profile/project/show');
        }
    }
}
