<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Mail\SendNewMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {
        Mail::to(Auth::user()->email)->send(new SendNewMail());

        return view('admin.home');
    }
}
