<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\HttpResponces;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;

class AuthController extends Controller
{
    use HttpResponces;

    public function login(LoginUserRequest $request){

        $request->validated($request->all());

        if(!Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return $this->error('','credentials are not valid',401);
        }

        $user = User::where('email',$request->email)->first();

        return $this->success([
            'user' => $user,
            'token' => $user->createToken('api token of '.$user->name)->plainTextToken,
        ],'authanticated successfuly');
    }

    public function register(StoreUserRequest $request){

        $request->validated($request->all());
        $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
        ]);
        return $this->success([
            'user' => $user,
            'token' => $user->createToken('api tokern of ' . $user->name )->plainTextToken
        ],'user has been created successfully');
    }

    public function logout(){

        // delete the current token that was used for the request
        // $user = Auth::user()->currentAccessToken()->delete();

        // delete all tokens, essentially logging the user out
        $user = Auth::user()->tokens()->delete();

        if(!$user)
            return $this->error('','something went wrong');

        return  $this->success('','Logged out successfully');
    }
}