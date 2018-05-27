<?php

namespace App\Services;

use App\User;

class UserService{

     private function newUser()
     {
          return new User;
     }

     public function browse()
     {
          return $this->newUser()->all();
     }

     public function read($id)
     {
          return $this->newUser()->find($id);
     }

     public function add($payload)
     {
          return $this->newUser()->create($payload);
     }

     public function update($id, $payload)
     {
          $user = $this->read($id);
          $user->fill($payload)->save();
          return $user;
     }

     public function destroy($id)
     {
          return $this->newUser()->destroy($id);
     }
}
