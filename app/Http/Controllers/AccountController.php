<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Gender;
use App\Models\Role;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index(Request $request) {
        $account_id = $request->session()->get('user')->account_id;
        $user = Account::find($account_id);
        $genders = Gender::all();
        $roles = Role::all();
        return view('profile', ['user' => $user, 'genders' => $genders, 'roles' => $roles]);
    }

    public function get() {
        $accounts = Account::all();
        return view('account_maintenance', ['accounts' => $accounts]);
    }

    public function update(Request $request) {
        $request->validate([
            'first_name' => 'required|string|max:25|alpha',
            'middle_name' => 'nullable|string|max:25|alpha',
            'last_name' => 'required|string|max:25|alpha',
            'gender' => 'required',
            'email' => 'required|email',
            'role' => 'required',
            'password' => 'required|string|alpha_num|min:8',
            'picture' => 'nullable|file|image'
        ]);

        $account_id = $request->session()->get('user')->account_id;
        $user = Account::find($account_id);
        $user->first_name = $request->first_name;
        $user->middle_name = $request->middle_name;
        $user->last_name = $request->last_name;
        $user->gender_id = $request->gender;
        $user->email = $request->email;
        $user->role_id = $request->role;
        $user->password = $request->password;

        if ($request->has('picture')) {
            $path = $request->file('picture')->store('public/images');
            $path = str_replace('public', '', $path);
            $user->display_picture_link = $path;
        }

        $user->save();

        return redirect()->back()->with('success', 'Update profile success');
    }

    public function editRole($id) {
        $account = Account::find($id);
        $roles = Role::all();
        return view('update_role', ['account' => $account, 'roles' => $roles]);
    }

    public function updateRole(Request $request, $id) {
        $account = Account::find($id);
        $account->role_id = $request->role;
        $account->save();

        return redirect('/after_action?message='. __('content.saved') .'!&redirect=true');
    }

    public function delete($id) {
        $account = Account::find($id);
        $account->delete();

        return redirect()->back()->with('success', 'Account deleted succesfully');
    }
}
