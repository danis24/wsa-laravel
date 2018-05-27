<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TargetService;
use Alert;

class TargetController extends Controller
{
     private $service;

     /**
      * Create new controller instance
      *
      * @return void
      */
     public function __construct(TargetService $service)
     {
          $this->middleware('auth');
          $this->service = $service;
     }

     /**
      * Show Data Targets
      *
      * @return /views/targets/index
      */
     public function index()
     {
          //Get Email From Auth()
          $email = auth()->user()->email;

          $sites = $this->showByEmail($email);
          return view('targets.index', compact('sites'));
     }

     /**
      * Show Form Verification
      *
      * @return /view/targets/verification
      */
     public function verification($id){
          $site = $this->showById($id);
          return view('targets.verification', compact('site'));
     }

     /**
      * Add Data To Target API
      *
      * @param /Illuminate/Http/Request $request
      * @return
      */
     public function add(Request $request)
     {
          $this->validate($request, [
               'url' => 'required|active_url'
          ]);
          $data = [
               'url' => $this->explode($request->url),
               'email' => auth()->user()->email
          ];
          $target = $this->service->add($data);
          Alert::message('Your Target Success Added!');
          return redirect('targets');
     }

     /**
      * Expode URL for trim http
      *
      * @param $ite;
      * @return data
      */
     protected function explode($site)
     {
          $data = explode('http://', $site);
          return $data[1];
     }

     /**
      * Get Target Data From API
      *
      * @param $email
      */
     private function getTargets($sites, $count, $type)
     {
          if($type == 'id'){
               $arr = [];
               for($i = 0; $i < $count; $i++){
                    $data = [
                         'id'=> $sites->data->id,
                         'email' => $sites->data->attributes->email,
                         'ip' => $sites->data->attributes->ip,
                         'url' => $sites->data->attributes->url,
                         'city' => $sites->data->attributes->city,
                         'country' => $sites->data->attributes->country,
                         'countryCode' => $sites->data->attributes->countryCode,
                         'isp' => $sites->data->attributes->isp,
                         'latitude' => $sites->data->attributes->latitude,
                         'longitude' => $sites->data->attributes->longitude,
                         'org' => $sites->data->attributes->org,
                         'regionName' => $sites->data->attributes->regionName,
                         'timeZone' => $sites->data->attributes->timeZone,
                         'zip' => $sites->data->attributes->zip,
                         'tokenSite' => $sites->data->attributes->tokenSite,
                         'status' => $sites->data->attributes->status,
                    ];
                    array_push($arr, $data);
               }
               return $arr;
          }else{
               $arr = [];
               for($i = 0; $i < $count; $i++){
                    $data = [
                         'id'=> $sites->data[$i]->id,
                         'email' => $sites->data[$i]->attributes->email,
                         'ip' => $sites->data[$i]->attributes->ip,
                         'url' => $sites->data[$i]->attributes->url,
                         'city' => $sites->data[$i]->attributes->city,
                         'country' => $sites->data[$i]->attributes->country,
                         'countryCode' => $sites->data[$i]->attributes->countryCode,
                         'isp' => $sites->data[$i]->attributes->isp,
                         'latitude' => $sites->data[$i]->attributes->latitude,
                         'longitude' => $sites->data[$i]->attributes->longitude,
                         'org' => $sites->data[$i]->attributes->org,
                         'regionName' => $sites->data[$i]->attributes->regionName,
                         'timeZone' => $sites->data[$i]->attributes->timeZone,
                         'zip' => $sites->data[$i]->attributes->zip,
                         'tokenSite' => $sites->data[$i]->attributes->tokenSite,
                         'status' => $sites->data[$i]->attributes->status,
                    ];
                    array_push($arr, $data);
               }
               return $arr;
          }
     }

     /**
      * Post Download For Verification Site
      */
     public function downloadVerif($id)
     {
          $site = $this->showById($id);
          return $this->download($site[0]['url'], $site[0]['tokenSite']);
     }

     /**
      * Define Target By ID
      *
      * @param $id
      * @return $target
      */
     private function showById($id)
     {
          $sites = json_decode($this->service->showById($id));
          return $this->getTargets($sites, 1, 'id');
     }

     /**
      * Define target by email
      *
      * @param $email
      * @return $target
      */
     private function showByEmail($email)
     {
          //Convert To json_decode
          $sites = json_decode($this->service->showByEmail($email));
          return $this->getTargets($sites, $sites->meta->count, 'email');
     }

     /**
      * Create Download File TXT For Verification
      *
      * @param $site, $token
      * @return txt
      */
     private function download($site, $token)
     {
          $myName = $token.".txt";

          return response($token)
               ->header('Content-Type', 'text/plain')
               ->header('Content-Disposition', sprintf('attachment; filename="%s"', $myName));
     }
}
