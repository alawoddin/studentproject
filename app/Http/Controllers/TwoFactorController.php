<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TwoFactorController extends Controller
{
    public function index()
    {
        return view('auth.two-factor');
    }

    public function verify(Request $request)
    {
        $request->validate([
            'code' => 'required|string'
        ]);

        $user = Auth::user();

        if ($user->two_factor_code == $request->code &&
            $user->two_factor_expires_at > now()) 
        {
            // Mark 2FA complete
             session(['2fa_verified' => true]);

            // Clear code
            $user->update([
                'two_factor_code' => null,
                'two_factor_expires_at' => null,
            ]);

               $notification = array(
            'message' => 'Admin login Successfully',
            'alert-type' => 'success'
        );

            return redirect()->route('dashboard')
                             ->with($notification);
        }

        return back()->withErrors(['code' => 'Invalid or expired verification code.']);
    }
}
