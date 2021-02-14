<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

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


    public function index()
  {
      return view('home');
  }

  public function send(Request $request)
  {
    $data = $request -> all();
    $user = Auth::user()->name;
    $email = Auth::user()->email;

    Mail::to($email)
        ->send(new TestMail($data['mailText'], $user));

    return view('home');
  }
}
