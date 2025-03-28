<?php

namespace App\Http\Controllers\Owner\Auth;  // SHINYA EDIT

use App\Http\Controllers\Controller;
use App\Models\Owner;  // SHINYA EDIT
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
        return view('owner.auth.register');  // SHINYA EDIT
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
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Owner::class],  // SHINYA EDIT
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        Auth::guard('owners')->login($user = Owner::create([  // SHINYA EDIT
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]));

        event(new Registered($user));

        Auth::login($user);

        // return redirect(config('constants.OWNER_HOME'));  // SHINYA EDIT  こっちでもよい
        return redirect(route('owner.dashboard', absolute: false));  // SHINYA EDIT
    }
}
