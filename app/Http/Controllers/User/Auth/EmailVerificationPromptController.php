<?php

namespace App\Http\Controllers\User\Auth;  // SHINYA EDIT

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     */
    public function __invoke(Request $request): RedirectResponse|View
    {
        return $request->user()->hasVerifiedEmail()
                    ? redirect()->intended(route('user.dashboard', absolute: false))  // SHINYA EDIT
                    : view('user.auth.verify-email');  // SHINYA EDIT
    }
}
