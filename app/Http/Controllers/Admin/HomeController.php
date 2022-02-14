<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Mail\SendNewMail;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index() {
        Mail::to('roberto@test.com')->send(new SendNewMail());

        return view('admin.home');
    }
}
