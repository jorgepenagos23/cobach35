<?php

namespace App\Exceptions;

use Exception;

class AutenticateExeption extends Exception
{

    public function report(){


        return false;
    }

    public function render($request){

        return response()->json([
            
        'message' =>'AuhtenticateExeption'

        ],401);
    }


}
