<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserManualController extends Controller
{
     public function __construct()
     {
          $this->middleware('auth');
     }

     public function index()
     {
          return view('user_manual.index');
     }
}
