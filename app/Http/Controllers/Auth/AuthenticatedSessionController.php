<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Notifications\TwoFactorCodeNotification;
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
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
   public function store(LoginRequest $request): RedirectResponse
{
    // Authenticate the user
    $request->authenticate();

    // Regenerate session
    $request->session()->regenerate();

    // Get logged-in user
    $user = Auth::user();

    // Generate 6-digit OTP
    $code = rand(100000, 999999);

    // Save OTP and expiration to database
    $user->update([
        'two_factor_code' => $code,
        'two_factor_expires_at' => now()->addMinutes(5),
    ]);

    // Send OTP via email
    $user->notify(new TwoFactorCodeNotification($code));

    // Reset 2FA session (force 2FA page)
    session(['two_factor_authenticated' => false]);

      $notification = array(
            'message' => 'Admin Two Factor Successfully',
            'alert-type' => 'success'
        );

    // Redirect to two-factor verification page
    return redirect()->route('two-factor.index')
                     ->with($notification);
}

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();



        return redirect('/');
    }
}
