<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
  public function index(){
    if(Auth::id()){
  
         $role=Auth()->user()->role;
         $studentprofile=Auth()->user()->profile_id;
         $employeeprofile=Auth()->user()->employee_profile_id;
         if($role == 'student'){
            if($studentprofile !== null){
               // return view('student.studenthome');
               return redirect()->route('showStudentHome')->with('message', 'Successfully Created an Account');
            }else{
               return redirect()->route('student.createprofile')->with('message', 'You dont have a profile. You can create it here.');
            }
            
         }else  if($role == 'admin'){
            if($employeeprofile !== null){
               // return view('student.studenthome');
               return redirect()->route('adminhome')->with('message', 'Successfully Created an Account');
            }else{
               return redirect()->route('admin.createprofile')->with('message', 'Successfully Created an Account');
            }


        
         }else  if($role == 'cashier'){
            return view('dashboard');
         }else  if($role == 'registrar'){

            return view('dashboard');
            
         }else  if($role == 'assessor'){
            return view('dashboard');
         }else  if($role == 'teachercollege'){
            if($employeeprofile !== null){
               // return view('student.studenthome');
               return redirect()->route('teacherhome')->with('message', 'Successfully Created an Account');
            }else{
               return redirect()->route('teacher.createprofile')->with('message', 'Successfully Created an Account');
            }

         }else  if($role == 'teacherseniorhigh'){
            if($employeeprofile !== null){
               // return view('student.studenthome');
               return redirect()->route('teacherseniorhighhome')->with('message', 'Successfully Created an Account');
            }else{
               return redirect()->route('teacherseniorhigh.createprofile')->with('message', 'Successfully Created an Account');
            }

         }


    }

  }
  public function post(){
    return view('POst');
  }
}
