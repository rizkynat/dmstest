<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createLogin()
    {
        if (Auth::check()) {
            return redirect('dataentry');
        } else {
            return view('auth.login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createRegister()
    {
        return view('auth.register');
    }

    public function storeLogin(Request $request)
    {
        // Define validation rules
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Check for validation errors
        if ($validator->fails()) {
            return redirect('login')->withErrors($validator)->withInput();
        }

        // Attempt to authenticate the user
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('dataentry');
        } else {
            return redirect('login')->with('error', 'Email atau Password Salah')->withInput();
        }
    }

    public function storeRegister(Request $request)
    {
        // Define validation rules
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => ['required', Rule::in(['Account Officer', 'Admin'])]
        ]);

        // Check for validation errors
        if ($validator->fails()) {
            return redirect('register')->withErrors($validator)->withInput();
        }

        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Ensure password is hashed
            'role' => $request->role,
        ]);

        // Log the user in
        auth()->login($user);

        // Redirect with success message
        return redirect('/register')->with('success', "Akun berhasil didaftar");
        //return $user;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // Log the user out
        auth()->logout();

        // Invalidate the session to protect against session fixation
        $request->session()->invalidate();

        // Regenerate the session token
        $request->session()->regenerateToken();
        return redirect('/login')->with('success', "Anda telah logout");
    }
}
