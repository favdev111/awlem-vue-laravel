<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;

use App\General;
use App\Setting;
use App\Product;
use App\Vehicle;
use App\Article;
use App\Brand;
use App\Mail\NewUserNotification;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('frontLangData');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // return $request->myGlopbalVariable;
        if (isset($_GET['lang'])) {
            if ($_GET['lang'] == 'ar') {
                $request->session()->put('language', 1);
                //$this->language = 1; 
                App::setLocale('ar');
            } else {
                $request->session()->put('language', 2);
                //$this->language = 1; 
                App::setLocale('en');
            }

            return redirect($_SERVER['HTTP_REFERER']);
        }
        $settings = Setting::where('id', 1)->first();
    }

  


  
    public function sendMail(Request $request)
    {
        $this->myRequest = $request->all();
        $this->ElrasheedMail = Setting::where('id', 1)->first();
        $data = array('name' =>  $this->myRequest['name'], "content" => $this->myRequest['content']);
        Mail::send('frontEnd.mailForm', $data, function ($message) {
            $message->from($this->myRequest['email'], $this->myRequest['name']);
            $message->to($this->ElrasheedMail->rasheed_email, 'ElRasheed User Email');
            $message->subject('ElRasheed User Email');
        });

        session()->flash('notif', __('General.Email_Send_Successfully'));
        return redirect('/contactUs');
    }
}
