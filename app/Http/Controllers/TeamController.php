<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Notification;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class TeamController extends Controller
{
     /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

     public function index(Request $request)
     {
         if ($request->ajax()) {
             $data = Team::latest()->get();
     
             return DataTables::of($data)
                 ->addIndexColumn()
                 ->addColumn('profile', function ($row) {
                     return $row->profile ? '<img src="' . asset('storage/profiles/' . $row->profile) . '" width="100" height="100" alt="Profile Image">' : 'No Image';
                     })
                 ->addColumn('action', function ($row) {
                     $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';
                     $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';
                     return $btn;
                 })
                 ->rawColumns(['action', 'profile']) // Allow HTML in these columns
                 ->make(true);
         }
         $notifications = Notification::orderBy('created_at', 'desc')->get();
    $notificationCount = $notifications->count();
     
         $user = auth()->user();
         return view('admin.Teams.index', compact('user','notifications','notificationCount'));
     }
     
 
        
 
     /**
 
      * Store a newly created resource in storage.
 
      *
 
      * @param  \Illuminate\Http\Request  $request
 
      * @return \Illuminate\Http\Response
 
      */
 
      public function store(Request $request)
{
    // Validate the incoming request data
    $validator = Validator::make($request->all(), [
        'post' => 'required|string|max:255',
        'facebook' => 'nullable|url',
        'twitter' => 'nullable|url',
        'instagram' => 'nullable|url',
        'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif', // Added validation for the image
    ]);

    // If validation fails, return a JSON response with error messages
    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    $imageName = null; // Initialize image name variable

    // Handle the image upload
    if ($request->hasFile('profile')) {
        $imageName = time() . '_' . $request->file('profile')->getClientOriginalName();

        // Move the file to public/storage/profiles
        $request->file('profile')->move(public_path('storage/profiles'), $imageName);
    }

    // Proceed to update or create the Team entry
    Team::updateOrCreate(
        ['id' => $request->product_id],
        [
            'name' => $request->name,
            'post' => $request->post,
            'profile' => $imageName, 
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
        ]
    );

    return response()->json(['success' => 'Product saved successfully.']);
}

 
     /**
 
      * Show the form for editing the specified resource.
 
      *
 
      * @param  \App\Team  $product
 
      * @return \Illuminate\Http\Response
 
      */
 
     public function edit($id)
 
     {
 
         $product = Team::find($id);
 
         return response()->json($product);
 
     }
 
     
 
     /**
 
      * Remove the specified resource from storage.
 
      *
 
      * @param  \App\Team  $product
 
      * @return \Illuminate\Http\Response
 
      */
 
     public function destroy($id)
 
     {
 
         Team::find($id)->delete();
 
       
 
         return response()->json(['success'=>'Product deleted successfully.']);
 
     }
}
