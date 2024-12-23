<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            ///return redirect()->intended(route('page.account'));
            $token = Auth::user()->createToken(\App\Http\Controllers\Api\AuthController::$app_code)->plainTextToken;

            return redirect(route('page.account'))->withErrors(compact('token'));
        }

        return back()->withErrors([
            'error' => 'The provided credentials do not match our records.',
        ]);
    }

    public function register(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ], [
            'c_password' => 'Password did not match'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        Auth::login($user);

        $request->session()->regenerate();

        $token = $user->createToken(\App\Http\Controllers\Api\AuthController::$app_code)->plainTextToken;

        return redirect(route('page.account'))->withErrors(compact('token'));
    }

    public function logout(Request $request): RedirectResponse
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Auth::user()?->tokens()?->delete();
        return redirect(route('page.login'))->with('message', 'Logged out successfully');
    }
}
