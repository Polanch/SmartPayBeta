<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use App\Models\SalesData;

class StudentController extends Controller
{
    public function home() {
        $student = null;
        $dailySpending = 0;
        $recentOrders = [];
        if (session()->has('student_id')) {
            $student = \App\Models\Student::find(session('student_id'));
            $dailySpending = $this->DailySpending($student->StudentID);

            // Get last 5 orders (grouped by ReceiptNo)
            $orders = SalesData::with('product')
                ->where('StudentID', $student->StudentID)
                ->orderByDesc('DateCreated')
                ->get()
                ->groupBy('ReceiptNo');

            $recentOrders = collect($orders)
                ->sortByDesc(function($group) {
                    return $group->first()->DateCreated;
                })
                ->take(5)
                ->map(function($group) {
                    return [
                        'items' => $group->map(function($item) {
                            return [
                                'ProductID' => $item->ProductID,
                                'ProductName' => $item->product ? $item->product->ProductName : 'Unknown',
                                'Quantity' => $item->Quantity,
                                'Price' => $item->Price,
                            ];
                        })->toArray(),
                        'total' => $group->sum('TotalAmount'),
                        'date' => $group->first()->DateCreated,
                        'receipt' => $group->first()->ReceiptNo,
                    ];
                })->values()->toArray();
        }
        return view('home', compact('student', 'dailySpending', 'recentOrders'));
    }

    public function credit() {
        $student = null;
        if (session()->has('student_id')) {
            $student = \App\Models\Student::find(session('student_id'));
        }
        return view('credit', compact('student'));
    }
    
    public function DailySpending($studentId)
    {
        return SalesData::where('StudentID', $studentId)
            ->whereDate('DateCreated', now()->toDateString())
            ->sum('TotalAmount');
    }
    public function transaction() {
        $student = null;
        $recentOrder = null;
        $allPurchases = [];
        if (session()->has('student_id')) {
            $student = \App\Models\Student::find(session('student_id'));
            // Get the most recent order (grouped by ReceiptNo)
            $orderGroup = \App\Models\SalesData::with('product')
                ->where('StudentID', $student->StudentID)
                ->orderByDesc('DateCreated')
                ->get()
                ->groupBy('ReceiptNo')
                ->sortByDesc(function($group) {
                    return $group->first()->DateCreated;
                })
                ->first();
            if ($orderGroup) {
                $recentOrder = collect($orderGroup)->map(function($item) {
                    return [
                        'ProductName' => $item->product ? $item->product->ProductName : 'Unknown',
                        'Quantity' => $item->Quantity,
                        'Price' => $item->Price,
                    ];
                })->toArray();
            }

            // Handle search, sort, and filter for transaction history
            $query = \App\Models\SalesData::with('product')
                ->where('StudentID', $student->StudentID);

            // Search
            $search = request('search');
            if ($search) {
                $query->whereHas('product', function($q) use ($search) {
                    $q->where('ProductName', 'like', "%$search%");
                });
            }


            // Filter (daily, monthly, yearly, none)
            $filter = request('filter');
            if ($filter === 'daily') {
                $query->whereDate('DateCreated', now()->toDateString());
            } elseif ($filter === 'monthly') {
                $query->whereMonth('DateCreated', now()->month)
                      ->whereYear('DateCreated', now()->year);
            } elseif ($filter === 'yearly') {
                $query->whereYear('DateCreated', now()->year);
            } // 'none' or empty: no filter

            // Sort (date/price, none)
            $sort = request('sort');
            if ($sort === 'date_asc') {
                $query->orderBy('DateCreated', 'asc');
            } elseif ($sort === 'date_desc') {
                $query->orderBy('DateCreated', 'desc');
            } elseif ($sort === 'price_asc') {
                $query->orderBy('Price', 'asc');
            } elseif ($sort === 'price_desc') {
                $query->orderBy('Price', 'desc');
            } // 'none' or empty: no sort, default to newest-to-oldest
            else {
                $query->orderBy('DateCreated', 'desc');
            }

            $allPurchases = $query->get()->map(function($item) {
                return [
                    'Date' => $item->DateCreated,
                    'ReceiptNo' => $item->ReceiptNo,
                    'ProductName' => $item->product ? $item->product->ProductName : 'Unknown',
                    'Quantity' => $item->Quantity,
                    'Price' => $item->Price,
                ];
            })->toArray();
        }
        return view('transaction', compact('student', 'recentOrder', 'allPurchases'));
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
                session(['student_id' => $student->StudentID]);
                return redirect('/student/home');
            }
        }
        // Login failed, redirect back with error
        return redirect()->back()->with('error', 'Invalid credentials.');
    }

    /**
     * Toggle the IsBlocked status for a student (AJAX).
     */
    public function toggleLock(Request $request)
    {
        $studentId = $request->input('student_id');
        $student = Student::find($studentId);
        if (!$student) {
            return response()->json(['success' => false, 'message' => 'Student not found.'], 404);
        }

        // Toggle the IsBlocked value
        $student->IsBlocked = $student->IsBlocked ? 0 : 1;
        $student->save();

        return response()->json([
            'success' => true,
            'isBlocked' => $student->IsBlocked,
            'message' => $student->IsBlocked ? 'Card locked.' : 'Card unlocked.'
        ]);
    }
    /**
     * Log out the student and end the session.
     */
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }
}
