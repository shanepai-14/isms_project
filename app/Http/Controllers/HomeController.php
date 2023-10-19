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
         if($role == 'student'){
            if($studentprofile !== null){
               return view('student.studenthome');
            }else{
               return redirect()->route('student.createprofile')->with('message', 'You dont have a profile. You can create it here.');
            }
            
         }else  if($role == 'admin'){
            return view('admin.adminhome');
         }else  if($role == 'cashier'){
            return view('dashboard');
         }else  if($role == 'registrar'){
            return view('dashboard');
         }else  if($role == 'assessor'){
            return view('dashboard');
         }else  if($role == 'teacher'){
            return view('dashboard');
         }

    }

  }
  public function post(){
    return view('POst');
  }
}
