<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function process(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();

            if (auth()->user()->is_admin) {
                return redirect()->route('admin.dashboard.index');
            }

            if (! auth()->user()->is_admin) {
                return redirect()->route('index');
            }

            return redirect()->route('index');
        } else {
            throw ValidationException::withMessages([
                'email' => 'Email atau password salah',
            ]);
        }
    }

    public function destroy()
    {
        auth()->logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect()->route('login.index');
    }
}
