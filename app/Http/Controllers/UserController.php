<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function register(UserRegisterRequest $request)
    {
        $validator = $request->validated();

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);

        try {
            $user = User::create($input);

            $response = [
                'success' => true,
                'data' => $user,
                'message' => ""
            ];

            return response()->json($response, Response::HTTP_CREATED);
        } catch (\Exception $e) {

            $response = [
                'success' => false,
                'data' => $e,
                'message' => $e->getMessage()
            ];

            return response()->json($response, Response::HTTP_BAD_REQUEST);
        }
    }

    public function show()
    {
        try {
            $user = Auth::user();
            $user->comments;

            $response = [
                'success' => true,
                'data' => $user,
                'message' => ""
            ];

            return response()->json($response, Response::HTTP_OK);
        } catch (\Exception $e) {
            $response = [
                'success' => false,
                'data' => $e,
                'message' => $e->getMessage()
            ];
            return response()->json($response, Response::HTTP_BAD_REQUEST);
        }
    }

    public function update(Request $request)
    {
        try {
            $authUser = Auth::user();
            $user = User::find($authUser->id);
    
            if ($request->has('name') && !empty($request->name)) {
                $user->name = $request->name;
            }
    
            if ($request->has('email') && !empty($request->email)) {
                $user->email = $request->email;
            }
    
            if ($request->has('password') && !empty($request->password)) {
                $user->password = bcrypt($request->password);
            }

            $user->save();

            $response = [
                'success' => true,
                'data' => $user,
                'message' => ""
            ];

            return response()->json($response, Response::HTTP_OK);
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
