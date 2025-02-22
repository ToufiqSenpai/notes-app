<?php

namespace App\Service;

use App\Models\User;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserServiceImpl implements UserService 
{
  public function signup(array $data): User
  {
    $data['password'] = Hash::make($data['password']);

    $user = new User($data);
    $user->save();
    
    return $user;
  }

  public function getToken(array $credentials): string
  {
    if (!Auth::attempt($credentials)) {
      return null;
    }

    $user = Auth::user();
    return JWT::encode(['uid' => $user->id], env('JWT_SECRET'));
  }
}