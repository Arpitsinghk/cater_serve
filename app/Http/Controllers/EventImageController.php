<?php

namespace App\Http\Controllers;

use App\Models\Eventimage;
use App\Models\Event;
use App\Models\Notification;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
class EventImageController extends Controller
{
      /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

     public function index(Request $request)
     {
         if ($request->ajax()) {
            //  $data = Eventimage::latest()->get();
            //  $events = Event::all();
            $data = Eventimage::with('event')->latest()->get();
             return DataTables::of($data)
                 ->addIndexColumn()
                 ->addColumn('event_id', function ($row) {
                    return $row->event ? $row->event->event : 'N/A'; // Access the event name
                })
                 ->addColumn('image', function ($row) {
                     // Check if the profile image exists and return the image tag
                     return $row->image ? '<img src="' . asset('storage/service/' . $row->image) . '" width="100" height="100" alt="Profile Image">' : 'No Image';
                     })
                 ->addColumn('action', function ($row) {
                     $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';
                     $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';
                     return $btn;
                 })
                 ->rawColumns(['action', 'image','event_id']) 
                 ->make(true);
         }
     
         $user = auth()->user();
         $notifications = Notification::orderBy('created_at', 'desc')->get();
         $notificationCount = $notifications->count();
        //  $events = Event::all();
         return view('admin.Events.eventimage', compact('user','notifications','notificationCount'));
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
        'event_id' => 'required',
        'image' => 'required',
        'status' => 'required',
    ]);

    // If validation fails, return a JSON response with error messages
    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    // $imageName = null; // Initialize image name variable

    if ($request->hasFile('image')) {
        $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
    
        $request->file('image')->move(public_path('storage/service'), $imageName);
    }

    Eventimage::updateOrCreate(
        ['id' => $request->product_id],
        [
            'event_id' => $request->event_id,
            'image' => $imageName,
            'status' => $request->status,
             
        ]
    );

    return response()->json(['success' => 'Event saved successfully.']);
}

 
     /**
 
      * Show the form for editing the specified resource.
 
      *
 
      * @param  \App\Event  $product
 
      * @return \Illuminate\Http\Response
 
      */
 
     public function edit($id)
 
     {
 
         $product = Eventimage::find($id);
 
         return response()->json($product);
 
     }
 
     
 
     /**
 
      * Remove the specified resource from storage.
 
      *
 
      * @param  \App\Event  $product
 
      * @return \Illuminate\Http\Response
 
      */
 
     public function destroy($id)
 
     {
 
         Eventimage::find($id)->delete();
 
       
 
         return response()->json(['success'=>'Service deleted successfully.']);
 
     }
}
