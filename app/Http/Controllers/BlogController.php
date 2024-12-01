<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Notification;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class BlogController extends Controller
{
     /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

     public function index(Request $request)
     {
         if ($request->ajax()) {
             $data = Blog::latest()->get();
     
             return DataTables::of($data)
                 ->addIndexColumn()
                 ->addColumn('image', function ($row) {
                    return $row->image 
                        ? '<img src="' . asset('storage/profiles/' . $row->image) . '" width="100" height="100" alt="Profile Image">' 
                        : 'No Image';
                })
                 ->addColumn('action', function ($row) {
                     $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';
                     $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';
                     return $btn;
                 })
                 ->rawColumns(['action', 'image']) 
                 ->make(true);
         }

        //  $notifications = Notification::orderBy('created_at', 'desc')->get();
        //  $notificationCount = $notifications->count();
     
        $notifications = Notification::orderBy('created_at', 'desc')->get();

// Get today's date
$today = \Carbon\Carbon::today();

// Filter notifications to highlight today's
$highlightedNotifications = $notifications->filter(function ($notification) use ($today) {
    return $notification->created_at->isToday();
});

$notificationCount = $notifications->count();
$highlightedCount = $highlightedNotifications->count();

         $user = auth()->user();
         return view('admin.blog.index', compact('user','notifications','notificationCount','highlightedCount'));
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
        'name' => 'required|string|max:255',
        'slug' => 'required',
        'description' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif', 
    ]);
   

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    $imageName = null; 

    // Handle the image upload
    if ($request->hasFile('image')) {
        $imageName = time() . '_' . $request->file('image')->getClientOriginalName();

        // Move the file to public/storage/profiles
        $request->file('image')->move(public_path('storage/profiles'), $imageName);
    }

    // Proceed to update or create the Team entry
    Blog::updateOrCreate(
        ['id' => $request->product_id],
        [
            'name' => $request->name,
            'slug' => $request->slug,
            'image' => $imageName, 
            'description' => $request->description,
            'status' => $request->status,
            
        ]
    );

    return response()->json(['success' => 'Blog saved successfully.']);
}

 
     /**
 
      * Show the form for editing the specified resource.
 
      *
 
      * @param  \App\Blog  $product
 
      * @return \Illuminate\Http\Response
 
      */
 
     public function edit($id)
 
     {
 
         $product = Blog::find($id);
 
         return response()->json($product);
 
     }
 
     
 
     /**
 
      * Remove the specified resource from storage.
 
      *
 
      * @param  \App\Blog  $product
 
      * @return \Illuminate\Http\Response
 
      */
 
     public function destroy($id)
 
     {
 
         Blog::find($id)->delete();
 
       
 
         return response()->json(['success'=>'Product deleted successfully.']);
 
     }
}
