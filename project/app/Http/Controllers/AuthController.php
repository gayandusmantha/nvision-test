<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;
use Response;

class AuthController extends Controller
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    function login(LoginRequest $request){
        $user = $this->userRepository->loginUser($request);
        return Response::json($user);
    }

    function logout(Request $request){
        $user = $this->userRepository->logoutUser($request);
        return Response::json($user);
    }
}
