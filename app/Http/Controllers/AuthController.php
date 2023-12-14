<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'phone' => 'required|unique:users,phone|numeric|digits:11',
            'password' => [
                'required', 'confirmed', Password::min(8)
                    ->letters()
                    ->numbers()
                    ->symbols()
            ],
            'password_confirmation' => 'required|same:password',
        ]);
        $user = new User();
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->see_all = 2;
        $user->save();

        return redirect("/login");
    }
    public function login(Request $request)
    {
        $request->validate([
            'phone' => 'required|numeric|digits:11',
            'password' => 'required',
        ]);

        $remember = $request->rememberme == "on" ? true : false;

        if (Auth::attempt(['phone' => $request->phone, 'password' => $request->password], $remember)) {
            return redirect("/")->with("successLogin", "You have successfully logged in");
        }else{
            return redirect()->back()->withErrors(["User does not exist"]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect("/");
    }
}
