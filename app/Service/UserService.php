<?php

namespace App\Service;

use App\Models\User;

interface UserService 
{
  public function signup(array $data): User;

  public function getToken(array $credentials): string;
}