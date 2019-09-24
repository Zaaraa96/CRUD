<?php

namespace App\Http\Controllers;

Use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function login(Request $request)
    {
        // Validation Data
        $validData = $this->validate($request, [
           'email' => 'required|exists:users',
           'password' => 'required'
        ]);

        // Check Login User
        if(! auth()->attempt($validData)) {
            return response([
                'data' => 'input data is not correct',
                'status' => 'error'
            ],403);
        }
        $user = Auth::user();
        $token= $user->api_token;
        $level=$user->level;
        $object = (object) [
        'api_token' => $token,
        'level' => $level,
      ];
        return json_encode($object);
    }

    // public function register(Request $request)
    // {
    //     // Validation Data
    //     $validData = $this->validate($request, [
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:users',
    //         'password' => 'required|string|min:6',
    //     ]);
    //
    //     $user = User::create([
    //         'name' => $validData['name'],
    //         'email' => $validData['email'],
    //         'password' => bcrypt($validData['password']),
    //     ]);
    //
    //     return new UserResource($user);
    // }
}
