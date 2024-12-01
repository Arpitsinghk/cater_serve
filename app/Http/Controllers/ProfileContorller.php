<?php

namespace App\Http\Controllers;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\menus;
use App\Models\user;
use DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;


class ProfileContorller extends Controller
{
    public function index(){
        
        $notifications = Notification::orderBy('created_at', 'desc')->get();
        $notificationCount = $notifications->count();
    
        $user = auth()->user();
        return view('admin.profile.index', compact('user','notifications','notificationCount'));

    }

    public function user_index(){
       
        $user = auth()->user();
        return view('user.profile.index', compact('user'));

    }
    
    public function user_password(){
       
        $user = auth()->user();
        return view('user.profile.password', compact('user'));

    }
    public function admin_update(){
       
        $user = auth()->user();
        return view('admin.profile.password', compact('user'));

    }

    public function changePassword(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        // Check if the current password is correct
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }

        // Update the user's password
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('admin.profile.password')->with('success', 'Password changed successfully!');
    }
    
    public function admin_changePassword(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        // Check if the current password is correct
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }

        // Update the user's password
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('user.password')->with('success', 'Password changed successfully!');
    }


    public function user_update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'role' => 'required|string|max:255',
            'status' => 'required|boolean',
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string|max:1000',
            'password' => 'nullable|string|min:6|confirmed', 
        ]);
    
        $user = User::findOrFail($id);
    
        // Update the user’s basic information
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->status = $request->status;
        $user->description = $request->description;
    
        // Handle the profile image upload
        if ($request->hasFile('profile')) {
            if ($user->profile) {
                $oldImagePath = public_path('storage/profiles/' . $user->profile);
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }
    
            // Save the new image to the specified path
            $image = $request->file('profile');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('storage/profiles'), $imageName);
            $user->profile = $imageName; // Save the filename in the database
        }
    
        // Update the password if provided
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
    
        // Save the user data
        $user->save();
    
        // Redirect back with success message
        return redirect()->route('user.profile', $id)->with('success', 'Profile updated successfully.');
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'role' => 'required|string|max:255',
            'status' => 'required|boolean',
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string|max:1000',
            'password' => 'nullable|string|min:6|confirmed', // Ensure you have a password confirmation field in your form
        ]);
    
        // Find the user
        $user = User::findOrFail($id);
    
        // Update the user’s basic information
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->status = $request->status;
        $user->description = $request->description;
    
        // Handle the profile image upload
        if ($request->hasFile('profile')) {
            // Delete the old profile image if it exists
            if ($user->profile) {
                $oldImagePath = public_path('storage/profiles/' . $user->profile);
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }
    
            // Save the new image to the specified path
            $image = $request->file('profile');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('storage/profiles'), $imageName);
            $user->profile = $imageName; // Save the filename in the database
        }
    
        // Update the password if provided
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
    
        // Save the user data
        $user->save();
    
        // Redirect back with success message
        return redirect()->route('admin.profile', $id)->with('success', 'Profile updated successfully.');
    }
    
}
