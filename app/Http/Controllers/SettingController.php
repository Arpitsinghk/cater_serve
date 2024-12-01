<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Notification;
use DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class SettingController extends Controller
{

     /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

     public function index(Request $request)
     {
         if ($request->ajax()) {
             $data = Setting::latest()->get();
     
             return DataTables::of($data)
                 ->addIndexColumn()
                 ->addColumn('value', function ($row) {
                     // Check if the value is an image
                     if ($row->type === 'image' && $row->value) {
                         return '<img src="' . asset('storage/service/' . $row->value) . '" width="100" height="100" alt="Profile Image">';
                     }
                     // If it's text, display the text value
                     return $row->type === 'text' ? htmlspecialchars($row->value) : 'No Image/Text';
                 })
                 ->addColumn('action', function ($row) {
                     $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';
                     $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';
                     return $btn;
                 })
                 ->rawColumns(['value', 'action']) // Ensure 'value' is included in rawColumns
                 ->make(true);
         }
         $notifications = Notification::orderBy('created_at', 'desc')->get();
         $notificationCount = $notifications->count();
     
         $user = auth()->user();
         return view('admin.Setting.index', compact('user','notifications','notificationCount'));
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
              'key' => 'required|string|max:255',
              'value' => 'required|nullable',
              'status' => 'required|string|max:255', // Add status validation
              'type' => 'required|string|in:text,image,url,email,color', // Add a type field
          ]);
      
          if ($validator->fails()) {
              return response()->json(['errors' => $validator->errors()], 422);
          }
      
          $value = null; // Initialize value variable
      
          // Determine the type and process accordingly
          switch ($request->type) {
              case 'image':
                  // Assuming you want to handle images, but no profile upload field
                  if ($request->hasFile('value')) {
                      $imageName = time() . '_' . $request->file('value')->getClientOriginalName();
                      $request->file('value')->move(public_path('storage/service'), $imageName);
                      $value = $imageName; // Store the image name as the value
                  } else {
                      return response()->json(['errors' => ['value' => 'Image file is required for type image.']], 422);
                  }
                  break;
      
              case 'text':
                  $value = $request->value; // Store the text directly
                  break;
      
              case 'url':
                  $value = filter_var($request->value, FILTER_VALIDATE_URL) ? $request->value : null; // Validate URL
                  break;
      
              case 'email':
                  $value = filter_var($request->value, FILTER_VALIDATE_EMAIL) ? $request->value : null; // Validate email
                  break;
      
              case 'color':
                  // Validate color format (e.g., hex code)
                  if (preg_match('/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/', $request->value)) {
                      $value = $request->value; // Store the color
                  } else {
                      return response()->json(['errors' => ['value' => 'Invalid color format.']], 422);
                  }
                  break;
          }
      
          // If no value is set, return an error
          if ($value === null) {
              return response()->json(['errors' => ['value' => 'Invalid value provided for the selected type.']], 422);
          }
      
          // Proceed to update or create the Setting entry
          Setting::updateOrCreate(
              ['id' => $request->product_id],
              [
                  'key' => $request->key,
                  'value' => $value,
                  'status' => $request->status, // Add status to the saved entry
                  'type' => $request->type, // Add status to the saved entry
              ]
          );
      
          return response()->json(['success' => 'Setting saved successfully.']);
      }
      

 
     /**
 
      * Show the form for editing the specified resource.
 
      *
 
      * @param  \App\Setting  $product
 
      * @return \Illuminate\Http\Response
 
      */
 
     public function edit($id)
 
     {
 
         $product = Setting::find($id);
 
         return response()->json($product);
 
     }
 
     
 
     /**
 
      * Remove the specified resource from storage.
 
      *
 
      * @param  \App\Setting  $product
 
      * @return \Illuminate\Http\Response
 
      */
 
     public function destroy($id)
 
     {
 
         Setting::find($id)->delete();
 
       
 
         return response()->json(['success'=>'Service deleted successfully.']);
 
     }


     public function setting()
     {
         // Fetch notifications
         $notifications = Notification::orderBy('created_at', 'desc')->get();
         $notificationCount = $notifications->count();
 
         // Fetch business settings
         $settings = Setting::where('status', 1)
             ->whereIn('key', [
                 'header', 'header_text', 'footer_logo', 'banner_image', 
                 'about_image', 'footer_details', 'footer_address', 
                 'mobile', 'email', 'service_timming', 
                 'facility_1', 'facility_2', 'facility_3', 'facility_4', 
                 'footer_facebook', 'footer_twitter', 'footer_instagram', 
                 'footer_linkdin', 'social_img1', 'copy_right', 
                 'desgin_by','button_color','button_bg','body_bg','footer_bg','header_bg','header_activecolor','hover_active_color'
             ])
             ->get()
             ->keyBy('key');
 
         // Get the authenticated user
         $user = auth()->user();
 
         return view('admin.Setting.setting', compact('notifications', 'user', 'notificationCount', 'settings'));
     }  
   
     public function settingupdate(Request $request)
     {
         // Validate the incoming data
         $validatedData = $request->validate([
             'header' => 'required|string|max:255',
             'header_text' => 'nullable|string',
             'footer_details' => 'nullable|string',
             'footer_address' => 'nullable|string',
             'mobile' => 'required',
             'email' => 'required',
             'service_timming' => 'required',
             'facility_1' => 'required',
             'facility_2' => 'required',
             'facility_3' => 'required',
             'facility_4' => 'required',
             'footer_facebook' => 'required',
             'footer_twitter' => 'required',
             'footer_instagram' => 'required',
             'footer_linkdin' => 'required',
             'copy_right' => 'required',
             'desgin_by' => 'required',
             'button_color' => 'nullable', 
             'header_activecolor' => 'nullable', 
             'hover_active_color' => 'nullable', 
             'button_bg' => 'nullable', 
             'footer_bg' => 'nullable', 
             'header_bg' => 'nullable', 
             'body_bg' => 'nullable', 
             'footer_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
             'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
             'about_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
             'social_img1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
             
         ]);
 
         foreach ($validatedData as $key => $value) {
             if (in_array($key, ['footer_logo', 'banner_image', 'about_image', 'social_img1']) && $request->hasFile($key)) {
                 $image = $request->file($key);
                 $imageName = time() . '_' . $image->getClientOriginalName();
                 
                 $image->move('D:\xampp 2.0\htdocs\restaurent\public\storage\service', $imageName);
                  $value = $imageName;
             }
 
               Setting::where('key', $key)->update(['value' => $value]);
         }
 
         // Redirect back with a success message
         return redirect()->route('admin.bsetting')->with('success', 'Settings updated successfully!');
     }

}



