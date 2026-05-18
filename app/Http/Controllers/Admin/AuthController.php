<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login_view()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->back();
        }
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->guard('admin')->attempt(['email' => $request->input('email'),  'password' => $request->input('password')])) {
            return redirect()->route('admin.dashboard');
        }
        return back()->withErrors(["error" => "Credential does not match!"]);
    }

    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect()->route('auth');
    }
}
