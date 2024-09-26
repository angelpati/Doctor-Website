<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator\Validator;
use App\Models\User;

class AuthController extends Controller
{
    
    public function rules($data){
        $messages=[
        'email.required' => 'Please enter your email address',
        'email.exists'=> 'Email already exists',
        'email.email'=>'Please enter a valid email address',
        'password.required'=>'Password must be at least 6 characters',


        ];
    
        $validator=Validator::make($data,[
         'email'=>'required|email|exists:users',
         'password'=>'requirement'
        ], $messages);
    }
    public function savedoc(Request $request)
    {
       $request->validate([
        'name'=>'required|string|regex:/^[a-zA-Z],{3,16}/i',
        'email'=>'required|unique:users|regex::/(.+)@(.+)\.(.+)/i',
        'password'=>'required|min:6|confirmed',
        'password_confirmation'=>'sometimes|required_with:password'
       ]) ;
       $users= new Users([
        'name'=> $request ->get('name'),
        'email'=>$request->$request->get('email'),
        'password'=>$request->get('password'), 
        'user_type'=>'doctor'
       ]);
       $users->save();
       
       return redirect()->intended('doctor/dashboard');

    }
}
