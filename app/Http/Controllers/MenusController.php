<?php

namespace App\Http\Controllers;

use App\Models\menus;
use App\Models\Notification;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
class MenusController extends Controller{


    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = menus::latest()->get();
    
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';
                    $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action']) 
                ->make(true);
        }
        $notifications = Notification::orderBy('created_at', 'desc')->get();
        $notificationCount = $notifications->count();
    
        $user = auth()->user();
        return view('admin.Menus.menucategory', compact('user','notifications','notificationCount'));
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
       'menu' => 'required',
       'status' => 'required',
   ]);

   menus::updateOrCreate(
       ['id' => $request->product_id],
       [
           'menu' => $request->menu,
           'status' => $request->status,
       ]
   );

   return response()->json(['success' => 'menu saved successfully.']);
}


    /**

     * Show the form for editing the specified resource.

     *

     * @param  \App\Event  $product

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {

        $product = menus::find($id);

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

        menus::find($id)->delete();

      

        return response()->json(['success'=>'Service deleted successfully.']);

    }

}