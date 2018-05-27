<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
     /**
      * Cretae new controller instance
      *
      * @return void
      */
     public function __construct()
     {
          $this->middleware('auth');
     }

     /**
      * Show setting setting index
      *
      * @return /views/settings/index
      */
     public function index()
     {
          return view('settings.index');
     }
}
