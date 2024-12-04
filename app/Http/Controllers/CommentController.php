<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentStoreRequest;
use App\Http\Requests\CommentUpdateRequest;
use App\Models\Comment;
use App\Models\CommentHistory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    //
    public function index(Request $request)
    {
        $limit = $request->input('limit', default: 1);
        $page = $request->input('page', default: 0);

        $comments = Comment::with('user')->orderBy('created_at', 'DESC')->skip(($page) * $limit)->take($limit)->get();

        try {
            $response = [
                'success' => true,
                'data' => $comments,
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

    public function store(CommentStoreRequest $request)
    {
        try {
            $input = $request->validated();

            $userId = Auth::id();
            $input['user_id'] = $userId;

            $comment = Comment::create($input);

            $response = [
                'success' => true,
                'data' => $comment,
                'message' => ""
            ];

            return response()->json($response, Response::HTTP_OK);
        } catch (\Exception $e) {
            $response = [
                'success' => false,
                'data' => $e,
                'message' => $e->getMessage()
            ];
            return response()->json($response, Response::HTTP_CREATED);
        }
    }

    public function update(CommentUpdateRequest $request, $id)
    {
        try {
            $input = $request->validated();

            $comment = Comment::find($id);

            $commentHistory = CommentHistory::create([
                'comment_id' => $id,
                'content' => $comment->content,
                'edited_at' => now(),
            ]);

            $comment->content = $request->content;
            $comment->save();
            $comment->edited_at = $commentHistory->edited_at;

            $comment->history;

            $response = [
                'success' => true,
                'data' => $comment,
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

    public function delete($id)
    {

        try {
            $comment = Comment::find($id);
            $comment->delete();

            $response = [
                'success' => true,
                'data' => null,
                'message' => ""
            ];

            return response()->json($response, Response::HTTP_NO_CONTENT);
        } catch (\Exception $e) {

            $response = [
                'success' => false,
                'data' => $e,
                'message' => $e->getMessage()
            ];

            return response()->json($response, Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    public function history($id)
    {
        try {
            $comment = Comment::findOrFail($id);
            $comment->historic;

            $response = [
                'success' => true,
                'data' => $comment,
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

    public function deleteAll(Request $request)
    {

        try {
            $admin = Auth::user();
            $role = $admin->role;

            if ($role === 'ADMIN') {

                Comment::query()->delete();

                $response = [
                    'success' => true,
                    'data' => null,
                    'message' => "Todos os comentários excluídos"
                ];

                return response()->json($response, Response::HTTP_NO_CONTENT);
            } else {

                $response = [
                    'success' => false,
                    'data' => null,
                    'message' => '',
                ];

                return response()->json($response, Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            $response = [
                'success' => true,
                'data' => null,
                'message' => ""
            ];

            return response()->json($response, Response::HTTP_NO_CONTENT);
        } catch (\Exception $e) {

            $response = [
                'success' => false,
                'data' => $e,
                'message' => $e->getMessage()
            ];

            return response()->json($response, Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}
