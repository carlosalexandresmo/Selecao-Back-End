<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function login(Request $request)
    {
        try {
            // $credentials = $request->validated();
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            if (Auth::attempt($credentials)) {
                $user = Auth::user();

                $user->token = $user->createToken(
                    $user->name,
                    ['*'],
                    Carbon::now()->addDays(30)
                )->plainTextToken;

                $response = [
                    'success' => true,
                    'data' => $user,
                    'message' => ""
                ];


                return response()->json($response, Response::HTTP_OK);
            } else {
                $response = [
                    'success' => false,
                    'data' => Auth::check(),
                    'message' => "E-mail ou senha incorreto ou não encontrado."
                ];

                return response()->json($response, Response::HTTP_UNAUTHORIZED);
            }
        } catch (\Exception $e) {
            $response = [
                'success' => false,
                'data' => $e,
                'message' => $e->getMessage()
            ];

            return response()->json($response, Response::HTTP_BAD_REQUEST);
        }
    }

    public function logout(Request $request)
    {
        try {
            $request->user()->tokens()->delete();
            // $user = Auth::user();
            // $user->currentAccessToken()->delete();

            // $data = new \stdClass();
            // $data->document = $user->id;
            // $data->logout = true;

            $response = [
                'success' => true,
                'data' => '',
                'message' => "logout"
            ];

            return response()->json($response, Response::HTTP_NO_CONTENT);
        } catch (\Exception $e) {
            $response = [
                'success' => false,
                'data' => $e,
                'message' => $e->getMessage()
            ];
            return response()->json($response, Response::HTTP_BAD_REQUEST);
        }
    }
}
