<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthAction
{
    public function create(array $result)
    {
        User::create([
            'first_name' => $result['first_name'],
            'last_name' => $result['last_name'],
            'email' => $result['email'],
            'password' => Hash::make($result['password'])
        ]);
    }
}
