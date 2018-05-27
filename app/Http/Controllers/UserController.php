<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;

class UserController extends Controller
{

     private $service;

     public function __construct(UserService $service)
     {
          $thhis->service = $service;
          $this->middleware('auth');
     }

     public function profile()
     {
          return view('users.index');
     }

     public function changEmail(Request $request)
     {
          $this->validate([
               'email' => 'require'
          ]);

          $user = $this->service->update(auth()->user()->id, $request->email);
          if($user){
               $result = [
                    'message' => 'email change'
               ];
          }else{
               $result = [
                    'message' => 'email not change'
               ];
          }
          return $result;
     }
}
