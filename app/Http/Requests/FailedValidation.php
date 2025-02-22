<?php

namespace App\Http\Requests;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

trait FailedValidation
{
  public function failedValidation(Validator $validator)
  {
    throw new HttpResponseException(response([
      'status' => 400,
      'message' => 'Bad Request',
      'errors' => $validator->errors()
    ], 400));
  }
}
