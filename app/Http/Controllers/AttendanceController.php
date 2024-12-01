<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Attendance;
use App\Models\User;

class AttendanceController extends Controller
{
    public function generateQrCode($studentId)
    {
        // Ensure the logged-in user is authorized to generate a QR code for this student
        $user = auth()->user();

        // Here, you can add logic to check if the user can generate a QR code for this student
        // For example, check if the student belongs to the logged-in user, etc.

        $student = User::findOrFail($studentId); // Assuming students are also users
        $barcode = $student->barcode; // Assuming the student has a barcode field

        // Generate QR Code with the barcode
        $qrCode = QrCode::size(300)->generate(url("/attendance/check-in/$barcode"));

        return view('qrcode', compact('qrCode', 'student'));
    }

    public function checkIn($barcode)
    {
        // Check if the user is logged in
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please log in to check in.');
        }

        // Find the user by the barcode
        $user = User::where('barcode', $barcode)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Invalid QR code!');
        }

        // Check if the user has already checked in today
        $attendance = Attendance::where('student_id', $user->id)
            ->whereDate('checked_in_at', now()->toDateString())
            ->first();

        if ($attendance) {
            return redirect()->back()->with('error', 'You have already checked in today!');
        }

        // Create attendance record
        $attendance = new Attendance();
        $attendance->student_id = $user->id; // Link to the user
        $attendance->barcode = $barcode;
        $attendance->checked_in_at = now();
        $attendance->save();

        return redirect()->back()->with('success', 'Checked in successfully!');
    }
}
