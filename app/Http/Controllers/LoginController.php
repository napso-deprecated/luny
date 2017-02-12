<?php
//
//namespace App\Http\Controllers;
//
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
//
//class LoginController extends Controller
//{
//
//    public function __construct()
//    {
//        $this->middleware('guest')->except('logout');
//    }
//
//
//
//    public function showLoginForm()
//    {
//        return view('login.login');
//    }
//
//    public function login()
//    {
//        /*$this->validate(request(), [
//            'email' => 'required',
//            'password' => 'required',
//        ]);*/
//        if (!Auth::attempt(request(['email', 'password']))) {
//            return back()->withErrors([
//                'message'=>'check your credentials'
//            ]);
//        }
//
//        return redirect()->home();
//
//    }
//
//    public function logout()
//    {
//        Auth::logout();
//
//        return redirect('/');
//    }
//}
