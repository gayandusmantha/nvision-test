<?php

namespace App\Repositories;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function loginUser($data): array
    {

        if (!auth()->attempt(['email' => $data->email, 'password' => $data->password])) {
            return [
                'meta' => [
                    'status' => 'false',
                    'status_message' => 'Invalid Email name or Password'
                ],
            ];
        } else {
            $user = auth()->getLastAttempted();
            if ($user->name) {
                $user = auth()->user();
                $tokenResult =  $user->createToken('NvisonOrder');
                return  [
                    'meta' => [
                        'status' => 'true',
                        'status_message' => 'Successfully logged in'
                    ],
                    'authentication_data' => [
                        'access_token' => $tokenResult->accessToken,
                        'token_type' => 'Bearer'
                    ],
                    'user_data' => [
                        'user_id' => auth()->user()->id,
                        'first_name' => auth()->user()->first_name,
                        'last_name' => auth()->user()->last_name,
                        'avatar_location' => auth()->user()->avatar_location,
                        'avatar_type' => auth()->user()->avatar_type,
                        'role' => auth()->user()->roles,
                        'email' => auth()->user()->email,
                        'contact_number' => auth()->user()->contact_number,
                        'last_login_at' => auth()->user()->last_login_at,
                        'last_login_ip' => auth()->user()->last_login_ip,
                    ],
                ];
            }
        }
    }


    public function logoutUser($data): array
    {
        $data->user()->token()->revoke();
        return  [
            'meta' => [
                'status' => 'true',
                'status_message' => 'Successfully logged out'
            ],
        ];
    }


}
