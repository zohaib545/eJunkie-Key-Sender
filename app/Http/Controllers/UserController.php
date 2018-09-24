<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * login_index
     * Returns view for login
     */
    public function login_index()
    {
        return view('pages.authentication.login');
    }

    /**
     * login
     * Check user and then login
     */
    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $user = User::where('email', $email)->first();
        if ($user != null) {
            if (Hash::check($password, $user->password)) {
                Auth::login($user);
                return redirect('/');
            } else {
                return redirect()->back()->withErrors('Incorrect password', 'message');
            }
        } else {
            return redirect()->back()->withErrors('User does not exist', 'message');
        }
    }

    /**
     * logout
     * Logout from authentication
     */
    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }

    /**
     * profile
     * returns view to edit profile
     */
    public function profile()
    {
        return view('pages.profile.index');
    }

    /**
     * update_profile
     * updates the profile (name and password) and returns to profile page
     */
    public function update_profile(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'name' => 'required'
        ]);
        $user->name = $request->name;
        if($request->password != null){
            $request->validate([
                'password' => 'confirmed'
            ]);
            $user->password = bcrypt($request->password);
        }
        $user->save();
        return redirect()->back();
    }
}
