<?php
//
//namespace App\Http\Controllers;
//
//use App\User;
//use Auth;
//use Illuminate\Http\Request;
//
//class RegistrationController extends Controller
//{
//
//    public function __construct()
//    {
//        $this->middleware('guest');
//    }
//
//    public function showRegistrationForm()
//    {
//        return view('register.create');
//    }
//
//    public function register()
//    {
//        // validate the form
//        $this->validate(request(), [
//            'name' => 'required|min:2',
//            'email' => 'required|email|max:255|unique:users',
//            'password' => 'required|min:6|confirmed',
//        ]);
//
//        // create and save the user
//        $user = User::create([
//            'name' => request('name'),
//            'email' => request('email'),
//            'password' => bcrypt(request('password')),
//        ]);
//        // sign in the user
//        Auth::login($user);
//
//        // redirect to somewhere
//        return redirect()->home();
//
//    }
//}
