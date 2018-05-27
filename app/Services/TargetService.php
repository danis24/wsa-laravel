<?php

namespace App\Services;

use GuzzleHttp\Client;

class TargetService
{
     protected $endpoint;
     protected $client;

     /**
      * Create Service Instance
      *
      * @param /GuzzleHttp/Client $client;
      * @return void
      */
     public function __construct(Client $client)
     {
          //Get endpoint in file env
          $this->endpoint = env('SCAN_API_URL');
          $this->client = $client;
     }

     /**
      * Add Targets Data
      *
      * @param $payload
      * @return /GuzzleHttp/Client
      */
     public function add($payload)
     {
          $site = $this->endpoint.'/v1/targets';
          $client = $this->client->request('POST', $site, [
               'form_params' => [
                    'url' => $payload['url'],
                    'email' => $payload['email']
               ]
          ]);
          return $client->getBody();
     }

     /**
      * Show targets By Email of User
      *
      * @param $email
      * @return /GuzzleHttp/Client
      */
     public function showByEmail($email)
     {
          $site = $this->endpoint.'/v1/targets/by_email';

          return $this->client->request('POST', $site, [
               'form_params' => [
                    'email' => $email
               ]
          ])->getBody();
     }

     public function showById($id)
     {
          $site = $this->endpoint.'/v1/targets/'.$id;
          return $this->client->request('GET', $site)->getBody();
     }
}
