<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // $request->validate([
        //     'phone' => 'required|string|unique:users,phone|numeric|digits:11',
        //     'password' => [
        //         'required', 'confirmed', Password::min(8)
        //             ->mixedCase()
        //             ->letters()
        //             ->numbers()
        //             ->symbols()
        //             ->uncompromised(),
        //     ],
        //     'password_confirmation' => 'required|same:password',
        // ]);
        $request->validate([
            'phone' => 'required|string|unique:users,phone|numeric|digits:11',
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
        $user->save();

        return redirect("/login");
    }
}
