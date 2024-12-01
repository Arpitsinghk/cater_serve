<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Team;
use App\Models\Booking;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Str;

class LoginRegisterController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('guest', except: ['home', 'logout']),
            new Middleware('auth', only: ['home', 'logout']),
        ];
    }

    public function register(): View
    {
        return view('auth.register');
    }
    
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|string|max:250|unique:users,email',
            'password' => 'required|min:8|confirmed'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'barcode' => Str::uuid(),
        ]);

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();
        return redirect()->route('home')
            ->withSuccess('You have successfully registered & logged in!');
    }

    // public function login(): View
    // {
    //     return view('auth.login');
    // }

    public function login(): View|RedirectResponse
{
    if (auth()->check()) {
        return redirect()->route('home');
    }
    else{
        return view('auth.login');

    }

   
}


    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
    
            // Get the authenticated user
            $user = Auth::user();
    
            // Redirect based on role
            if ($user->role === 'admin') {
                
                return redirect()->route('admin.home');
            }
            
    
            return redirect()->route('home'); // Adjust route name as necessary
        }
    
        return back()->withErrors([
            'email' => 'Your provided credentials do not match in our records.',
        ])->onlyInput('email');
    }
    
    
    public function home(): View
{
    $user = auth()->user();
    $users = User::count();
    $teams = Team::count();
    $Booking = Booking::count();
    // $events = Booking::all(); 
    $bookings = Booking::select('event_type', \DB::raw('count(*) as total'))
    ->groupBy('event_type')
    ->get();
    $todayBookings = Booking::whereDate('created_at', today())->count();
    $notifications = Notification::orderBy('created_at', 'desc')->get();
    $notificationCount = $notifications->count();
    return view('admin.home', ['bookings'=>$bookings,'users' => $users,'teams' => $teams,'todayBookings'=> $todayBookings,'Booking'=>$Booking, 'user' => $user, 'notifications' =>$notifications,'notificationCount' =>$notificationCount ]);
}

    
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->withSuccess('You have logged out successfully!');
    }
}