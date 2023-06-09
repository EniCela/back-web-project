<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function login(Request $request)
    {
        if($request->isMethod('POST')){
            $data = $request->input();

            $userDetails = User::where('email', $data['email'])->first();

            if( !$userDetails || !password_verify($data['password'], $userDetails->password)){
                return response()->json([
                    'status' => 400,
                    'message' => "Invalid credentials.!"
                ]);
            }
            // else{
            //     if($userDetails->roli == 1){
            //         $role = 'admin';
            //         $token = $userDetails->createToken($userDetails->email . '_AdminToken', ['server:admin'])->plainTextToken;
            //     }
            //     else{
            //         $role = '';
                    $token = $userDetails->createToken($userDetails->email . '_Token')->plainTextToken;
                // }

                return response()->json([
                    'status' => 200,
                    "username" => $userDetails->username,
                    'token' => $token,
                    'message' => "Login Successfully!"
                ]);
            //}
        }
    }

    public function register(Request $request)
    {
        if($request->isMethod('POST')){

            $data = $request->input();

            $userEmail = User::where('email', $data['email'])->first();
            if(!$userEmail){

                $val = $request->validate([
                    'email' => 'required|:rfc,dns|unique:users,email',
                    'password' => ['required', Password::min(8)->letters()->numbers()->symbols()->mixedCase()],
                    'username' => 'required',
                ]);

                if($val){

                    $user = new User;
                    $user->email = $data['email'];
                    $user->password = Hash::make($data['password']);
                    $user->username = $data['username'];

                    $user->save();

                    $token = $user->createToken($user->email . '_Token')->plainTextToken;

                    return response()->json([
                        'status' => 200,
                        'message' => "Registration was Successful!",
                        "username" => $data['username'],
                        'token' => $token,
                    ]);
                }
                else{
                    return response()->json([
                        'status' => 400,
                        'message' => "Something went wrong."
                    ]);
                }
            }
            else{
                return response()->json([
                    'status' => 400,
                    'message' => "Email already exists.",
                ]);
            }

        }
    }

    public function logout()
    {
        Auth::user()->tokens->each(function ($token, $key) {
            $token->delete();
        });
        return response()->json(['message' => 'Logout successful'], 200);
    }

    public function index()
    {
        $user = User::all();
        return response()->json($user);
    }
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json(' deleted!');
    }

}
