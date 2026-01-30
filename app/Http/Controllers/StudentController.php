<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
class StudentController extends Controller
{
    public function home() {
        return view('home');
    }
    public function transaction() {
        return view('transaction');
    }
    public function notification() {
        return view('notification');
    }
    public function profile() {
        return view('profile');
    }
    public function setting() {
        return view('setting');
    }
    /**
     * Handle student login by LRN or Username.
     */
    public function studentLogin(Request $request)
    {
        $logcredential = $request->input('logcredential');
        $password = $request->input('password');
        $student = Student::student_credentials($logcredential);

        if ($student) {
            // Check if the hash is bcrypt (starts with $2y$ or $2a$)
            $isBcrypt = preg_match('/^\$2[ayb]\$/', $student->PasswordHash);
            if (($isBcrypt && Hash::check($password, $student->PasswordHash)) ||
                (!$isBcrypt && $student->PasswordHash === $password)) {
                // Login successful (bcrypt or plain text)
                return redirect('/student/home');
            }
        }
        // Login failed, redirect back with error
        return redirect()->back()->with('error', 'Invalid credentials.');
    }
}
