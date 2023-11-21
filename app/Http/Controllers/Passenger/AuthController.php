<?php

namespace App\Http\Controllers\Passenger;

use App\Http\Controllers\Controller;
use App\Http\Requests\Passenger\LoginRequest;
use App\Http\Resources\Passenger\UserLoginResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    /**
     * @param LoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        try {

            $credentials = $request->only(['email', 'password']);

            if (!auth()->attempt($credentials)) {
                return apiResponse(
                    false,
                    'Wrong Credentials !',
                    422,
                );
            }
            
            $data = [
                'user' => new UserLoginResource(auth()->user()),
                'token' => Auth::guard('api')->login(auth()->user())
            ];

            return apiResponse(
                true,
                'Login Success',
                200,
                $data
            );
        } catch (\Throwable $th) {
            Log::error($th);
            return apiResponse(
                false,
                'Some Thing Went Wrong !',
                500
            );
        }
    }
}
