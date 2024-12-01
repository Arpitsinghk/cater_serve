<?php

namespace App\Http\Controllers;
use App\Models\Service;
use App\Models\Team;
use App\Models\Event;
use App\Models\Blog;
use App\Models\Eventimage;
use App\Models\menus;
use App\Models\menusbar;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $allMenuItems = menusbar::all();
        $menuCategories = menus::all();
        $service = service::all();
        $teams = Team::all();
        $events = Event::all();
        $eventimage = Eventimage::all();
        $Blog = Blog::all();
        $Menus = menus::all();
        $settings = \App\Models\Setting::where('status', 1)
        ->whereIn('key', ['header','header_text', 'footer_logo','banner_image','about_image','footer_details','footer_address','mobile','email','service_timming','facility_1','facility_2','facility_3','facility_4','footer_facebook','footer_twitter','footer_instagram','footer_linkdin','social_img1','copy_right','desgin_by','button_color','button_bg','body_bg','footer_bg','header_bg','header_activecolor','hover_active_color'])
        ->get()
        ->keyBy('key');
        return view('frontend/index',compact('service','teams','events','eventimage','settings','Blog','Menus','menuCategories','allMenuItems'));
    }
    public function about(){
        $teams = Team::all();
        $settings = \App\Models\Setting::where('status', 1)
        ->whereIn('key', ['header','header_text', 'footer_logo','banner_image','about_image','footer_details','footer_address','mobile','email','service_timming','facility_1','facility_2','facility_3','facility_4','footer_facebook','footer_twitter','footer_instagram','footer_linkdin','social_img1','copy_right','desgin_by','button_color','button_bg','body_bg','footer_bg','header_bg','header_activecolor','hover_active_color'])
        ->get()
        ->keyBy('key');
        return view('frontend/about',compact('teams','settings'));
    }
    public function events()
    {
        $events = Event::all();
        $eventimage = Eventimage::all();
        $settings = \App\Models\Setting::where('status', 1)
        ->whereIn('key', ['header','header_text', 'footer_logo','banner_image','about_image','footer_details','footer_address','mobile','email','service_timming','facility_1','facility_2','facility_3','facility_4','footer_facebook','footer_twitter','footer_instagram','footer_linkdin','social_img1','copy_right','desgin_by','button_color','button_bg','body_bg','footer_bg','header_bg','header_activecolor','hover_active_color'])
        ->get()
        ->keyBy('key');

        return view('frontend/event', compact('events','eventimage','settings'));
        
    }
    
    public function services()
    {
    $service = service::all();
    $settings = \App\Models\Setting::where('status', 1)
    ->whereIn('key', ['header','header_text', 'footer_logo','banner_image','about_image','footer_details','footer_address','mobile','email','service_timming','facility_1','facility_2','facility_3','facility_4','footer_facebook','footer_twitter','footer_instagram','footer_linkdin','social_img1','copy_right','desgin_by','button_color','button_bg','body_bg','footer_bg','header_bg','header_activecolor','hover_active_color'])
    ->get()
    ->keyBy('key');
        return view('frontend.service',compact('service','settings'));
    }

    public function menu()
    {
        $allMenuItems = menusbar::all();
        $menuCategories = menus::all();
        $settings = \App\Models\Setting::where('status', 1)
        ->whereIn('key', ['header','header_text', 'footer_logo','banner_image','about_image','footer_details','footer_address','mobile','email','service_timming','facility_1','facility_2','facility_3','facility_4','footer_facebook','footer_twitter','footer_instagram','footer_linkdin','social_img1','copy_right','desgin_by','button_color','button_bg','body_bg','footer_bg','header_bg','header_activecolor','hover_active_color'])
        ->get()
        ->keyBy('key');
        return view('frontend.menus',compact('menuCategories','allMenuItems','settings'));
    }

    public function contact()
    {
        // Return the view for the 'contact' page
        $settings = \App\Models\Setting::where('status', 1)
        ->whereIn('key', ['header','header_text', 'footer_logo','banner_image','about_image','footer_details','footer_address','mobile','email','service_timming','facility_1','facility_2','facility_3','facility_4','footer_facebook','footer_twitter','footer_instagram','footer_linkdin','social_img1','copy_right','desgin_by','button_color','button_bg','body_bg','footer_bg','header_bg','header_activecolor','hover_active_color'])
        ->get()
        ->keyBy('key');
        return view('frontend.contact',compact('settings'));
    }

    public function blog()
    {
        $Blog = Blog::all();
        $settings = \App\Models\Setting::where('status', 1)
        ->whereIn('key', ['header','header_text', 'footer_logo','banner_image','about_image','footer_details','footer_address','mobile','email','service_timming','facility_1','facility_2','facility_3','facility_4','footer_facebook','footer_twitter','footer_instagram','footer_linkdin','social_img1','copy_right','desgin_by','button_color','button_bg','body_bg','footer_bg','header_bg','header_activecolor','hover_active_color'])
        ->get()
        ->keyBy('key');
        return view('frontend.blog',compact('Blog','settings'));
    }

    public function book()
    {
        // Return the view for the 'book' page
        $settings = \App\Models\Setting::where('status', 1)
        ->whereIn('key', ['header','header_text', 'footer_logo','banner_image','about_image','footer_details','footer_address','mobile','email','service_timming','facility_1','facility_2','facility_3','facility_4','footer_facebook','footer_twitter','footer_instagram','footer_linkdin','social_img1','copy_right','desgin_by','button_color','button_bg','body_bg','footer_bg','header_bg','header_activecolor','hover_active_color'])
        ->get()
        ->keyBy('key');
        return view('frontend.book',compact('settings'));
    }

    public function team()
    {
        $teams = Team::all();
        $settings = \App\Models\Setting::where('status', 1)
        ->whereIn('key', ['header','header_text', 'footer_logo','banner_image','about_image','footer_details','footer_address','mobile','email','service_timming','facility_1','facility_2','facility_3','facility_4','footer_facebook','footer_twitter','footer_instagram','footer_linkdin','social_img1','copy_right','desgin_by','button_color','button_bg','body_bg','footer_bg','header_bg','header_activecolor','hover_active_color'])
        ->get()
        ->keyBy('key');
        return view('frontend.team',compact('teams','settings'));
    }

    public function testimonial()
    {
        // Return the view for the 'testimonial' page
        $settings = \App\Models\Setting::where('status', 1)
        ->whereIn('key', ['header','header_text', 'footer_logo','banner_image','about_image','footer_details','footer_address','mobile','email','service_timming','facility_1','facility_2','facility_3','facility_4','footer_facebook','footer_twitter','footer_instagram','footer_linkdin','social_img1','copy_right','desgin_by','button_color','button_bg','body_bg','footer_bg','header_bg','header_activecolor','hover_active_color'])
        ->get()
        ->keyBy('key');
        return view('frontend.testimonial',compact('settings'));
    }
}
