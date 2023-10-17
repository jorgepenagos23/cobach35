<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Exceptions\JsonAuthorizationException;
use Illuminate\Contracts\Validation\Validator;
use App\Exceptions\JsonValidationException;

class BaseFormRequest extends FormRequest
{
    protected function failedAuthorization()
    {
        throw new JsonAuthorizationException;
    }

     /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
       throw new JsonValidationException($validator);


}


}
