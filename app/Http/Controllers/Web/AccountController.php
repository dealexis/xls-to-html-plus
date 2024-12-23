<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Resources\ConversionResource;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function page()
    {
        if (!Auth::check()) {
            return redirect()->route('page.login')->withErrors(['error' => 'Not logged in, please login first']);
        }

        $conversions = ConversionResource::collection(Auth::user()->conversions()->orderBy('created_at', 'desc')->with('media')->get());

        return view('pages.account', compact('conversions'));
    }
}
