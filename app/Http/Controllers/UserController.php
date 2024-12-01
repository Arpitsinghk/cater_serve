<?php

namespace App\Http\Controllers;
use App\models\user;
use App\models\Notification;
use Illuminate\Http\Request;
use DataTables;


class UserController extends Controller
{
    public function indexs(){
        $user = auth()->user();
        $notifications = Notification::orderBy('created_at', 'desc')->get();
        $users = User::all();
        return view("admin.user_details.index",compact("users","user",'notifications'));
    }


     /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

     public function index(Request $request)

     {
 
      
 
         if ($request->ajax()) {
 
   
 
             $data = user::latest()->get();
 
   
 
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
 
         $user = auth()->user();
         $notifications = Notification::orderBy('created_at', 'desc')->get();
         $notificationCount = $notifications->count();
         return view('admin.user_details.index',compact('user','notifications','notificationCount'));
 
     }
 
        
 
     /**
 
      * Store a newly created resource in storage.
 
      *
 
      * @param  \Illuminate\Http\Request  $request
 
      * @return \Illuminate\Http\Response
 
      */
 
     public function store(Request $request)
 
     {
 
         user::updateOrCreate([
 
                     'id' => $request->product_id
 
                 ],
 
                 [
 
                     'name' => $request->name, 
                     'email' => $request->email, 
                     'role' => $request->role, 
                     'status' => $request->status, 
 
                 ]);        
 
      
 
         return response()->json(['success'=>'Product saved successfully.']);
 
     }
 
     /**
 
      * Show the form for editing the specified resource.
 
      *
 
      * @param  \App\user  $product
 
      * @return \Illuminate\Http\Response
 
      */
 
     public function edit($id)
 
     {
 
         $product = user::find($id);
 
         return response()->json($product);
 
     }
 
     
 
     /**
 
      * Remove the specified resource from storage.
 
      *
 
      * @param  \App\user  $product
 
      * @return \Illuminate\Http\Response
 
      */
 
     public function destroy($id)
 
     {
 
         user::find($id)->delete();
 
       
 
         return response()->json(['success'=>'Product deleted successfully.']);
 
     }
 
 
}
