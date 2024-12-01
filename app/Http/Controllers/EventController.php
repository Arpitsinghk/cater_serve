<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Notification;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
class EventController extends Controller
{
      /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

     public function index(Request $request)

     {
 
      
 
         if ($request->ajax()) {
 
   
 
             $data = Event::latest()->get();
 
             return Datatables::of($data)
 
                     ->addIndexColumn()
 
                     ->addColumn('action', function($row){
 
    
 
                            $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';
 
    
 
                            $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';
 
     
 
                             return $btn;
 
                     })
 
                     ->rawColumns(['action'])
 
                     ->make(true);
 
         }
         $notifications = Notification::orderBy('created_at', 'desc')->get();
         $notificationCount = $notifications->count();
         $user = auth()->user();
 
         return view('admin.Events.category',compact('user','notifications','notificationCount'));
 
     }

    //  public function index(Request $request)
    //  {
    //      if ($request->ajax()) {
    //          $data = Event::latest()->get();
     
    //          return DataTables::of($data)
    //              ->addIndexColumn()
    //              ->addColumn('action', function ($row) {
    //                  $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';
    //                  $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';
    //                  return $btn;
    //              })
    //              ->rawColumns(['action']) 
    //              ->make(true);
    //      }
     
    //      $user = auth()->user();
    //      return view('admin.Events.category', compact('user'));
    //  }
     
 
        
 
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
        'event' => 'required',
        'status' => 'required',
    ]);

    Event::updateOrCreate(
        ['id' => $request->product_id],
        [
            'event' => $request->event,
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
 
         $product = Event::find($id);
 
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
 
         Event::find($id)->delete();
 
       
 
         return response()->json(['success'=>'Service deleted successfully.']);
 
     }
}
