<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class ApiController extends Controller
{
    //
    function index(Request $request)
    {
       $user= User::where('email', $request->email)->first();
       
        
           $token =$user->createToken('my-app-token')->plainTextToken;
        
            $response = [
                'user' => $user,
                'token' => $token
            ];
        
             return response($response, 201);
             //return $user;
    }

}
