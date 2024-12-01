<?php

namespace App\Http\Controllers;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Notification;
class BookingController extends Controller
{
    
    public function store(Request $request){
        $validate = $request->validate([
            'country' => 'required',
            'city' => 'required',
            'place' => 'required',
            'event_type' => 'required',
            'no_of_palace' => 'required',
            'diet' => 'required',
            'contact_no' => 'required|digits:10',
            'date' => 'required|date',
            'email' => 'required|email',
            'name' => 'required|string',
        ]);

        if (auth()->check()) {
            $validate['user'] = auth()->id(); 
        } else {
            $validate['user'] = $request->ip(); 
        }

       $book = Booking::create($validate);

        Notification::create([
            'type' => 'blog_added',
            'message' => 'New blog post added by: ' . $book->name,
        ]);

        return redirect()->back()->with('success', 'Booking saved successfully!');
    }

    public function index(){
        $user = auth()->user();
        $bookings = Booking::all();
        $notifications = Notification::orderBy('created_at', 'desc')->get();
        $notificationCount = $notifications->count();
        return view('admin.booking.index', compact('bookings','user','notifications','notificationCount'));
    }

    public function accept($id)
{
    $booking = Booking::findOrFail($id);
    $booking->request = 'Confirmed'; 
    $booking->save();

    return redirect()->route('booking.admin')->with('success', 'Request accepted successfully!');
}

public function reject($id)
{
    $booking = Booking::findOrFail($id);
    $booking->request = 'Rejected'; 
        $booking->save();

    return redirect()->route('booking.admin')->with('success', 'Request rejected successfully!');
}
}
