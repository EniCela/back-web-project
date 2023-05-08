<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class loginController extends Controller
{
    public function index()
    {
        $user = User::all();
        return response()->json($user);
    }
    //
}
