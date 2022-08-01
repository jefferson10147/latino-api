<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

use App\Classes\PersonalizedJWT;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        
        try {

            $validator = Validator::make($request->all(), [
                'email' => 'required|string|max:255',
                'password' => 'required|string|max:255'
            ]);
    
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 400);
            }

            $object_user = User::where("email", $request->email)->where("password", $request->password)->first();

            if(!$object_user) {
                return response()->json([
                    'code' => 400,
                    'message' => 'The user data is incorrect.'
                ], 400);
            }

            $data_token['id'] = $object_user->id;
            $data_token['role_id'] = $object_user->role_id;
            $data_token['expiration'] = time() + (60 * 60 * 24 * 7);
                
            $serializedToken = PersonalizedJWT::generateToken($data_token);

            $object_user['token'] = $serializedToken;

            return response()->json($object_user, 200);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
