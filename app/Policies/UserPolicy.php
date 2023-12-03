<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

   // public function before($user, $ability){
         //  if($user->isAdmin()){
        //return true;
 

          //  }
        

    public function create(User $user){

      //  $a = $user->hasRole('admin');

        return true;
        //return $user->hasPermisision('create_user');
    }



}
