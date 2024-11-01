<?php

namespace App\Http\Controllers\Masyarakat;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginMasyarakat extends Controller
{
    public function login()
    {
        return view('masyarakat.registrasi.login');
    }

    public function authenticate(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Optionally, log the user in or redirect them to a welcome page
        // Auth::login($user);

        return redirect()->route('masyarakat.login')->with('success', 'Registration successful. Please log in.');
    }

    public function showRegistrationForm()
    {
        return view('masyarakat.registrasi.register'); 
    }

    public function register(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Hash the password
        ]);

        // Optionally, log the user in after registration
        // Auth::login($user);

        // Redirect to the login page with a success message
        return redirect()->route('masyarakat.login')->with('success', 'Registration successful. Please log in.');
    }
}
