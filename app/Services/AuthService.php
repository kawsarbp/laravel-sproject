<?php

namespace App\Services;

use App\Actions\AuthAction;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Exception;

class AuthService
{

    public function __construct(private AuthAction $authAction)
    {
    }

    public function signup($result)
    {
        try {
            $this->authAction->create($result);
            return redirect()->back()->with(['message'=>'Registration Success','type'=>'success']);
        }catch (Exception $exception)
        {
            return redirect()->back()->with(['message'=>$exception->getMessage(),'type'=>'danger']);
        }

    }
}
