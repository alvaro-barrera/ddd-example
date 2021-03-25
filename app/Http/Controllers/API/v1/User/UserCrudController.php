<?php

namespace App\Http\Controllers\API\v1\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Src\BoundedContext\User\Application\StoreUserUseCase;
use Src\BoundedContext\User\Application\UpdateUserUseCase;
use Src\BoundedContext\User\Infrastucture\EloquentUserRepository;

class UserCrudController extends Controller
{
    public function store(Request $request)
    {
        $user = $request->input('user');

        $use_case = new StoreUserUseCase(new EloquentUserRepository());
        $use_case->executive(
            $user['name'],
            $user['email'],
            Hash::make($user['password']),
        );
        return response($request, 201);
    }

    public function update(Request $request, $id){
        $user = $request->input('user');
        $use_case = new UpdateUserUseCase(new EloquentUserRepository());
        $use_case->executive(
            $id,
            $user['name'],
            $user['email'],
            $user['password'],
        );
        return response($id);
    }
}
