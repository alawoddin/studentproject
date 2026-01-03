<?php

namespace App\Http\Controllers;

use App\Models\Paid;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TeacherAuthController extends Controller
{
    public function teacherLogin(Request $request)
{
    $request->validate([
        'roll_id' => 'required|numeric',
        'email' => 'required|email',
        'password' => 'required',
        'department_id' => 'required|numeric',
    ]);

    $teacher = Teacher::where([
        'roll_id' => $request->roll_id,
        'email' => $request->email,
        'department_id' => $request->department_id,
    ])->first();

    if (!$teacher || !Hash::check($request->password, $teacher->password)) {
        return back()->with([
            'message' => 'Invalid credentials',
            'alert-type' => 'error',
        ]);
    }

    // ✅ Generate OTP
    $otp = rand(100000, 999999);

    $teacher->update([
        'otp' => $otp,
        'otp_expires_at' => Carbon::now()->addMinutes(5),
    ]);

    // ✅ Send OTP Email
    Mail::raw("Your Teacher Login OTP is: $otp", function ($message) use ($teacher) {
        $message->to($teacher->email)
                ->subject('Teacher Login OTP');
    });

    // store teacher id in session
    session(['teacher_otp_id' => $teacher->id]);

    return redirect()->route('teacher.otp.form')->with([
        'message' => 'OTP sent to your email',
        'alert-type' => 'success',
    ]);
}

 public function otpForm()
    {
        return view('frontend.teacher_otp');
    }

    // ✅ ADD THIS METHOD HERE
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|numeric',
        ]);

        $teacherId = session('teacher_otp_id');
        $teacher = Teacher::find($teacherId);

        if (
            !$teacher ||
            $teacher->otp !== $request->otp ||
            now()->greaterThan($teacher->otp_expires_at)
        ) {
            return back()->with([
                'message' => 'Invalid or expired OTP',
                'alert-type' => 'error',
            ]);
        }

        // clear otp
        $teacher->update([
            'otp' => null,
            'otp_expires_at' => null,
        ]);

        Auth::guard('teacher')->login($teacher);

        session()->forget('teacher_otp_id');

        return redirect()->route('teacher.dashboard')->with([
            'message' => 'Login successful',
            'alert-type' => 'success',
        ]);
    }

            public function teacherDashboard()
        {
            $id = Auth::guard('teacher')->id();
            $teacher = Teacher::with('department')->findOrFail($id);

        
            $studentCount = Paid::where('teacher_id', $id)
                                ->where('status', 'paid')
                                ->distinct('student_id')
                                ->count('student_id');

            return view('frontend.index', compact('teacher', 'studentCount'));
        }
}
