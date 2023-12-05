<?php

namespace App\Exceptions;

use Illuminate\Contracts\Validation\Validator;

use Exception;

class JsonValidationException extends Exception
{
    
protected $validator;

 function __construct(Validator $validator) {
    $this->validator = $validator;
}

public function report() {
    
    return false;
}

public function render($request){



        return response()->json([
            'messsage'=>'validation error',
             'errors'=>$this->validator->errors()

        ],422);
}



}
