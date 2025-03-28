<?php

namespace App\Http\Controllers\User\Auth; // SHINYA EDIT

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('user.auth.login');  // SHINYA EDIT
    }

     /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // return redirect()->intended(config('constants.HOME'));  // SHINYA_EDIT こっちでもよい
        return redirect()->intended(route('user.dashboard', absolute: false));  // SHINYA_EDIT
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('users')->logout();  // SHINYA EDIT

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
