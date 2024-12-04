<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|between:8,20|min:8',
        ], [
            'name.required' => 'O campo nome é obrigatório',
            'name.length' => 'O campo nome deve ter pelo menos 3 caracteres.',
            'email.required' => 'O campo email é obrigatório.',
            'email.email' => 'O campo email informado é inválido.',
            'email.unique' => 'O campo e-mail informado está em uso.',
            'password.required' => 'O campo senha é obrigatório',
            'password.between' => 'O campo senha deve conter entre 8 a 20 caracteres',
            'password.min' => 'O campo senha informado é curto',
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'data' => 'Validation Error.',
                'message' => $validator->errors()->first()
            ];
            return response()->json($response, Response::HTTP_BAD_REQUEST);
        }

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

            return response()->json($response, Response::HTTP_UNPROCESSABLE_ENTITY);
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
