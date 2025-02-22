<?php

namespace App\Http\Controllers\Api;

use App\Service\UserService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\SignupRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class AuthController extends Controller
{
  public function __construct(private UserService $userService) {}

  public function signup(SignupRequest $request) 
  {
    $user = $this->userService->signup($request->all());

    return (new UserResource($user))->response()->setStatusCode(201);
  }

  public function login(Request $request)
  {
    if(!$token = auth('api')->attempt($request->only('username', 'password'))) {
      return response()->json([
        'status' => 401,
        'message' => 'Unauthorized'
      ], 401);
    }

    return response()->json([
      'token' => $token,
      'token_type' => 'Bearer',
      'expires_in' => 3600
    ]);
  }
}
