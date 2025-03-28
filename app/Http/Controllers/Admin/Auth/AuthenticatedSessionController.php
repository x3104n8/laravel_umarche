<?php

namespace App\Http\Controllers\Admin\Auth;  //SHINYA EDIT

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
        // admin でログイン中に /admin/loginにアクセスがあった場合に/admin/dashboardにリダイレクトさせる方法その1 NG
        //
        //if (Auth::guard('admin')->check()){
        //    return view('admin.dashboard');
        //}
        return view('admin.auth.login');  //SHINYA EDIT
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // return redirect()->intended(config('constants.ADMIN_HOME'));  //SHINYA EDIT こっちでもよい
        return redirect()->intended(route('admin.dashboard', absolute: false));  //SHINYA EDIT
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();  //SHINYA EDIT

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');  //SHINYA EDIT
    }
}
