<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Gender;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLogin() {
        return view('auth.login');
    }

    public function showRegister() {
        $roles = Role::all();
        $genders = Gender::all();
        return view('auth.register', ['roles' => $roles, 'genders' => $genders]);
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'email|required',
            'password' => 'required',
        ]);

        $user = Account::where('email', $request->email)->first();
        
        if ($user == null)
            return redirect()->back()->with('error', 'Email does not exist!');

        if ($request->password != $user->password) {
            return redirect()->back()->with('error', 'Wrong password!');
        } else {
            Session::put('user', $user);
            return redirect()->route('home')->with('success', 'Login success!');
        }
    }

    public function register(Request $request) {
        $request->validate([
            'first_name' => 'required|string|max:25|alpha',
            'middle_name' => 'nullable|string|max:25|alpha',
            'last_name' => 'required|string|max:25|alpha',
            'gender' => 'required',
            'email' => 'required|email',
            'role' => 'required',
            'password' => 'required|string|alpha_num|min:8',
            'picture' => 'required|file|image'
        ]);

        // check email
        $user = Account::where('email', $request->email)->first();
        if ($user != null) return redirect()->back()->with('error', 'Email does not exist!');

        // Store file
        $path = $request->file('picture')->store('public/images');
        $path = str_replace('public', '', $path);

        // Store to db
        Account::create([
            'account_id' => uniqid(), 
            'role_id' => $request->role, 
            'gender_id' => $request->gender, 
            'first_name' => $request->first_name, 
            'last_name' => $request->last_name, 
            'middle_name' => $request->middle_name, 
            'email' => $request->email, 
            'password' => $request->password,
            'display_picture_link' => $path, 
            'modified_at' => null, 
            'modified_by' => null
        ]);

        return redirect()->route('showLogin')->with('success', 'Register Success');
    }

    public function logout(Request $request) {
        Session::remove('user');
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('index');
    }
}
