<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Notification;
use DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
class ServiceController extends Controller
{
     /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

     public function index(Request $request)
     {
         if ($request->ajax()) {
             $data = Service::latest()->get();
     
             return DataTables::of($data)
                 ->addIndexColumn()
                 ->addColumn('profile', function ($row) {
                     // Check if the profile image exists and return the image tag
                     return $row->profile ? '<img src="' . asset('storage/service/' . $row->profile) . '" width="100" height="100" alt="Profile Image">' : 'No Image';
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
         return view('admin.Service.index', compact('user','notifications','notificationCount'));
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
        'service' => 'required|string|max:255',
        'details' => 'required|nullable',
        'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif', 
    ]);

    // If validation fails, return a JSON response with error messages
    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    // $imageName = null; // Initialize image name variable

    if ($request->hasFile('profile')) {
        $imageName = time() . '_' . $request->file('profile')->getClientOriginalName();
    
        $request->file('profile')->move(public_path('storage/service'), $imageName);
    }
    

    // Proceed to update or create the Team entry
    Service::updateOrCreate(
        ['id' => $request->product_id],
        [
            'service' => $request->service,
            'status' => $request->status,
            'details' => $request->details,
            'profile' => $imageName, 
           
        ]
    );

    return response()->json(['success' => 'Service saved successfully.']);
}

 
     /**
 
      * Show the form for editing the specified resource.
 
      *
 
      * @param  \App\Service  $product
 
      * @return \Illuminate\Http\Response
 
      */
 
     public function edit($id)
 
     {
 
         $product = Service::find($id);
 
         return response()->json($product);
 
     }
 
     
 
     /**
 
      * Remove the specified resource from storage.
 
      *
 
      * @param  \App\Service  $product
 
      * @return \Illuminate\Http\Response
 
      */
 
     public function destroy($id)
 
     {
 
         Service::find($id)->delete();
 
       
 
         return response()->json(['success'=>'Service deleted successfully.']);
 
     }

}
