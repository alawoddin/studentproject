<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;

class TeacherOtpController extends Controller
{
  public function showOtpForm()
    {
        return view('teacher.otp'); // <--- must match the Blade file
    }

    // Verify OTP
  public function verifyOtp(Request $request)
{
    $request->validate(['otp' => 'required|numeric']);

    $teacherId = session('otp_teacher_id');

    if (!$teacherId) {
        return redirect()->route('teacher.login')->with('error', 'Session expired.');
    }

    $teacher = Teacher::find($teacherId);

    if (!$teacher || $teacher->otp != $request->otp) {
        return back()->with('error', 'Invalid OTP.');
    }

    if (now()->greaterThan($teacher->otp_expires_at)) {
        return back()->with('error', 'OTP expired.');
    }

    // ✅ OTP correct → login teacher
    Auth::guard('teacher')->login($teacher);

    // Clear OTP
    $teacher->update(['otp' => null, 'otp_expires_at' => null]);
    session()->forget('otp_teacher_id');

    return redirect()->route('teacher.dashboard')->with([
        'message' => 'Logged in successfully!',
        'alert-type' => 'success'
    ]);
}
}
