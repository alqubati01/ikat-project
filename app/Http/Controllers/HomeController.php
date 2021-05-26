<?php

namespace App\Http\Controllers;

use App\Ativity;
use App\Project;
use App\Task;
use App\Task_comment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function edit_profile(Request $request,$id){
        if ($request->isMethod('post')){
            $user=User::find($id);
            $user->name=$request->input('name');
            $user->email=$request->input('email');
            $user->desc=$request->input('desc');
                if (!empty($request->hasFile('file'))){

                    $fileName = 'user_img/'.time().'.'.$request->file('file')->extension();
                $request->file->move(public_path('user_img'), $fileName);

                $user->image=$fileName;
            }
            $user->save();
            return back()->with('status','your data is updated successfully');


        }
        else{

            $user=User::find($id);
            $arr =array('user'=>$user);
            return view('profile.edit',$arr);

        }
    }

    public function calendar($id){
        $pro=Project::find($id);
        $project22=ProjectController::findpro2(Auth::id());

        $arr=array('data'=>$pro,'project22'=>$project22);
//        return $arr;
        return view('calendar.index',$arr);
    }

}
