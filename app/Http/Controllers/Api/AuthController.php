<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Response;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public static string $app_code = 'converter';

    public function login(Request $request): JsonResponse
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $success['token'] = $user->createToken(self::$app_code)->plainTextToken;
            $success['name'] = $user->name;

            return Response::success('User login successfully', $success);
        }

        return Response::error('Unauthorised');
    }

    public function register(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ], [
            'c_password' => 'Password did not match'
        ]);

        if ($validator->fails()) {
            return Response::error('Validation Error', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken(self::$app_code)->plainTextToken;
        $success['name'] = $user->name;

        return Response::success('User register successfully', $success);
    }

    public function logout(): JsonResponse
    {
        Auth::user()->tokens()->delete();
        return Response::success('Logged out');
    }
}
