<?php

namespace App\Http\Controllers\Admin\Auth;  // SHINYA EDIT

use App\Http\Controllers\Controller;
use App\Models\Admin;  // SHINYA EDIT
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('admin.auth.register');  // SHINYA EDIT
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Admin::class],  // SHINYA EDIT
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        Auth::guard('admin')->login($user = Admin::create([  // SHINYA EDIT
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]));

        event(new Registered($user));

        Auth::login($user);

        // return redirect(config('constants.ADMIN_HOME'));  //SHINYA EDIT こっちでもよい
        return redirect(route('admin.dashboard', absolute: false));  // SHINYA EDIT
    }
}
