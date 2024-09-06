<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function process(RegisterRequest $request)
    {
        try {
            $data = $request->validated();
            $data['password'] = bcrypt($data['password']);
            $data['email_verified_at'] = now();
            User::create($data);

            return redirect()->route('login.index')->with('success', 'Registration successful');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
