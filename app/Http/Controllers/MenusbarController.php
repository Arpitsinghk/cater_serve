<?php

namespace App\Http\Controllers;

use App\Models\menusbar;
use App\Models\Eventimage;
use App\Models\menu;
use App\Models\Notification;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class MenusbarController extends Controller {

  /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

     public function index(Request $request)
     {
         if ($request->ajax()) {
            
            $data = menusbar::with('menu')->latest()->get();
             return DataTables::of($data)
                 ->addIndexColumn()
                 ->addColumn('menu_id', function ($row) {
                    return $row->menu ? $row->menu->menu : 'N/A'; // Access the event name
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
         return view('admin.Menus.menubar', compact('user','notifications','notificationCount'));
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
        'menu_id' => 'required',
        'image' => 'required',
        'dish_details' => 'required',
        'price' => 'required',
        'dish' => 'required',
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

    menusbar::updateOrCreate(
        ['id' => $request->product_id],
        [
            'menu_id' => $request->menu_id,
            'image' => $imageName,
            'status' => $request->status,
            'dish_details' => $request->dish_details,
            'dish' => $request->dish,
            'price' => $request->price,
             
        ]
    );

    return response()->json(['success' => 'Menu saved successfully.']);
}

 
     /**
 
      * Show the form for editing the specified resource.
 
      *
 
      * @param  \App\Models\menusbar  $product
 
      * @return \Illuminate\Http\Response
 
      */
 
     public function edit($id)
 
     {
 
         $product = menusbar::find($id);
 
         return response()->json($product);
 
     }
 
     
 
     /**
 
      * Remove the specified resource from storage.
 
      *
 
      * @param  \App\Models\menusbar  $product
 
      * @return \Illuminate\Http\Response
 
      */
 
     public function destroy($id)
 
     {
 
         menusbar::find($id)->delete();
 
       
 
         return response()->json(['success'=>'Service deleted successfully.']);
 
     }
}

