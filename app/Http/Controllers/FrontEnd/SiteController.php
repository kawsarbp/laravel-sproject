<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Exception;

class SiteController extends Controller
{
    public function home()
    {
        $categories = Category::select('id','name','slug','status')->get();
        return view('frontend.home',compact('categories'));
    }

    public function signUp()
    {
        $categories = Category::select('id','name','slug','status')->get();
        return view('auth.sign-up',compact('categories'));
    }

    public function login_form()
    {
        $categories = Category::select('id','name','slug','status')->get();
        return view('auth.sign-in',compact('categories'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|min:4|max:20',
            'last_name' => 'required|string|min:4|max:12',
            'email' => 'required|email',
            'password' => 'required|min:4|same:confirm_password',
        ], ['email.required' => 'This Email Field is Required!']);

        try {
            User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            return redirect()->back()->with(['message'=>'Registration Success','type'=>'success']);
        }catch (Exception $exception)
        {
            return redirect()->back()->with(['message'=>$exception->getMessage(),'type'=>'danger']);
        }

    }
    // login
    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
        if(auth()->attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect('admin/dashboard');
        }else
        {
            return redirect()->back()->with(['message'=>'wrong information','type'=>'danger']);
        }
    }
    ## logout
    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
