<?php

namespace App\Http\Controllers;
use App\User;
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
        $email = Auth::user()->email;
        $user = User::where('email',$email)->first();
       
        if ($user->role == 'seller') {
            return redirect('seller/dashboard');
        } elseif ($user->role == 'customer') {
            return redirect('buyer/dashboard');
        } else {
            return view('admin.index');
        }
    }
}
