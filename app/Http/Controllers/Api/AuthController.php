<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(RegisterRequest $request){
        $input = $request->input();
        $input['password'] = bcrypt($input['password']);
        // $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->plainTextToken;
        $success['name'] =  $user->name;

        return response()->json( ['data' => $success, 'message' => "registered Successfully"], 201);
    }

    public function login(Request $request)
    {
        // $user = User::where('email', $request->email)->first();

        // if (!$user || !Hash::check($request->password, $user->password)) {
        //     return response()->json([
        //         'status' => 'error',
        //         'message' => 'Invalid credentials',
        //     ], 401);
        // }
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')->plainTextToken;
            $success['name'] =  $user->name;
            return response()->json(['data' => $success, 'message' => "logined Successfully"], 200);
        }else{
            return response()->json(['message' => "logined faild"], 400);
        }
    }

    public function logout()  {
        // auth()->logout();
        auth()->user()->tokens()->delete();
        // Auth::logout();
        return response()->json([
            "message"=>"logged out"
          ],204);
    }
}
