<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

use function response;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'cpf' => 'required|cpf',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'cpf' => $validatedData['cpf'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);
        
        Auth::login($user);
        return redirect()->route('browse_books');
    }

    public function login(Request $request)
    {
        $request->validate([
            'cpf' => 'required|cpf',
            'password' => 'required',
        ]);
        if (Auth::attempt($request->only('cpf', 'password'))) {
            return redirect()->intended('/browse_books');
        }

        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return response()->json(['message' => 'Successfully logged out']);
    }
} 
