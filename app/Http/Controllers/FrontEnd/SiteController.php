<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Models\Category;
use App\Models\User;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Exception;

class SiteController extends Controller
{

    public function __construct(private AuthService $authService)
    {

    }

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

    public function register(AuthRequest $authRequest)
    {
        $result = $authRequest->validated();
        return $this->authService->signup($result);
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
