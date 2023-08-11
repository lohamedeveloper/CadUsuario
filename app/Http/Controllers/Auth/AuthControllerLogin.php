<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class AuthControllerLogin extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function login(Request $request)
    {
  
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);
  
        if ($validator->fails()){
            return response()->json([
                    "status" => false,
                    "errors" => $validator->errors()
                ]);
        } else {
            if (Auth::attempt($request->only(["email", "password"]))) {
                return response()->json([
                    "status" => true, 
                    "redirect" => url("home")
                ]);
            } else {
                return response()->json([
                    "status" => false,
                    "errors" => ["Verifica suas credenciais"]
                ]);
            }
        }
    }
}
