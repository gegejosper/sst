<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function adminLogin(Request $request){
        //dd($request->all());
        
        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])){
            $user = User::where('email', $request->email )->first();
        
            if($user->usertype=='admin'){
                return redirect('admin/dashboard');
               
            }
            else {
                return redirect('/');
            }
        }
        else {
            //return('error');
            return redirect()->back()->with('error', 'Login Credentials Incorrect!');
        }
        //return redirect('dashboard');
    }
    public function cashierLogin(Request $request){
        //dd($request->all());
        
        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])){
            $user = User::where('email', $request->email )->first();
        
            if($user->usertype=='cashier'){
                return redirect('cashier/dashboard');
               
            }
            else {
                //return redirect('cashier/dashboard');
                return redirect('/');
            }
        }
        else {
            //return('error');
            return redirect()->back()->with('error', 'Login Credentials Incorrect!');
        }
    }
    public function checkerLogin(Request $request){
        //dd($request->all());
        
        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])){
            $user = User::where('email', $request->email )->first();
        
            if($user->usertype=='checker'){
                return redirect('checker/dashboard');
               
            }
            else {
                //return redirect('cashier/dashboard');
                return redirect('/error');
            }
        }
        else {
            //return('error');
            return redirect()->back()->with('error', 'Login Credentials Incorrect!');
        }
    }
    public function assistantLogin(Request $request){
        //dd($request->all());
        
        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])){
            $user = User::where('email', $request->email )->first();
        
            if($user->usertype=='assistant'){
                return redirect('assistant/dashboard');
               
            }
            else {
                //return redirect('cashier/dashboard');
                return redirect('/');
            }
        }
        else {
            //return('error');
            return redirect()->back()->with('error', 'Login Credentials Incorrect!');
        }
    }

    public function oicLogin(Request $request){
        //dd($request->all());
        
        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])){
            $user = User::where('email', $request->email )->first();
        
            if($user->usertype=='oic'){
                return redirect('oic/dashboard');
               
            }
            else {
                //return redirect('cashier/dashboard');
                return redirect('/');
            }
        }
        else {
            //return('error');
            return redirect()->back()->with('error', 'Login Credentials Incorrect!');
        }
    }

    public function accountingLogin(Request $request){
        //dd($request->all());
        
        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])){
            $user = User::where('email', $request->email )->first();
        
            if($user->usertype=='accounting'){
                return redirect('accounting/dashboard');
               
            }
            else {
                //return redirect('cashier/dashboard');
                return redirect('/');
            }
        }
        else {
            //return('error');
            return redirect()->back()->with('error', 'Login Credentials Incorrect!');
        }
    }
    
    public function customerLogin(Request $request){
        //dd($request->all());
        
        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])){
            $user = User::where('email', $request->email )->first();
        
            if($user->usertype=='customer'){
                return redirect('customer/dashboard');
               
            }
            else {
                return redirect('/');
            }
        }
        else {
            //return('error');
            //return redirect('dashboard')->with('status', 'Profile updated!');
            return redirect()->back()->with('error', 'Login Credentials Incorrect!');
            // return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors([
            //     'approve' => 'Wrong password or this account not approved yet.',
            // ]);
        }
        //return redirect('dashboard');
    }
    public function checker()
    {
        return view('checker.login');
    }
    public function cashier()
    {
        return view('cashier.login');
    }
    public function accounting()
    {
        return view('accounting.login');
    }
    public function oic()
    {
        return view('oic.login');
    }
    public function assistant()
    {
        return view('assistant.login');
    }
    public function customer()
    {
        return view('customer.login');
    }
}
