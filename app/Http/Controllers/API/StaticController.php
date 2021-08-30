<?php

namespace App\Http\Controllers\API;

use App\CobonUser;
use App\DiscountCobon;
use App\Feature;
use App\follwer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rating;
use App\Setting;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Validator;

class StaticController extends Controller
{

    public function mainVedioLink()
    {
        $link = Setting::select('main_vedio_link')->find(1);
        return response()->json($link, 200);
    }

    public function getSocialLinks()
    {
        $socialLinks = Setting::select('facebook', 'twitter', 'instgram')->find(1);
        return response()->json($socialLinks, 200);
    }

    public function getAppStoreGooglePlayLinks()
    {
        $appStoreGooglePlayLinks = Setting::select('appstore_link', 'google_play_link')->find(1);
        return response()->json($appStoreGooglePlayLinks, 200);
    }

    public function getAppReviews()
    {
        $reviews = Rating::where('active', true)->select('id', 'user_id', 'rate', 'review', 'created_at')->with(array('user' => function ($query) {
            $query->select('id', 'name', 'photo');
        }))->get();
        return response()->json($reviews, 200);
    }

    public function sendFollwerMail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'              => 'required|unique:follwers'
        ]);

        if ($validator->fails()) {
            $data['data'] = ['success' => false, 'email_error' => true];
            return response()->json($data, 200);
        }

        $saveArticle  = follwer::create([
            'email' => $request->email
        ]);

        if ($saveArticle->id) {
            $data = ['success' => true];
            return response()->json($data, 200);
        } else {
            $data = ['success' => false];
            return response()->json($data, 500);
        }
    }


    public function contactUs(Request $request)
    {
        $this->myRequest = $request->all();
        $this->setting = Setting::where('id', 1)->first();
        $data = array('name' =>  $this->myRequest['name'], "subject" => $this->myRequest['subject'], "content" => $this->myRequest['content'], "email" => $this->myRequest['email']);
        Mail::send('admin.mailForm', $data, function ($message) {
            $message->from($this->myRequest['email'], $this->myRequest['name']);
            $message->to($this->setting->email, $this->myRequest['subject']);
            $message->subject($this->myRequest['subject']);
        });

        $responce['data'] = ['success' => true];
        return response()->json($responce, 200);
    }

    public function getContactPageInfo()
    {
        return Setting::select('title', 'description', 'email_contact_us_1', 'email_contact_us_2', 'phone_contact_us_1', 'phone_contact_us_2')->take(1)->get()[0];
    }

    public function whatOlum()
    {
        $whatOlum = Setting::select('olum_decription', 'olum_card_1_photo', 'olum_card_1_title', 'olum_card_1_description', 'olum_card_2_photo', 'olum_card_2_title', 'olum_card_2_description', 'olum_card_3_photo', 'olum_card_3_title', 'olum_card_3_description')->take(1)->get()[0];
        $data = ['success' => true, 'data' => $whatOlum];
        return response()->json($data, 200);
    }

    public function olumFeatures()
    {
        return Feature::select('id', 'title', 'description', 'imge')->take(6)->get();
    }

    public function olumReviews()
    {
        $reviews = Rating::select('id', 'user_id', 'rate', 'review')->where('active', true)->with(['user' => function ($user) {
            $user->select('id', 'name', 'photo');
        }])->get();

        if ($reviews) {
            $data = ['success' => true, 'reviews' => $reviews];
            return response()->json($data, 200);
        } else {
            $data = ['success' => false];
            return response()->json($data, 500);
        }
    }

    public function useCobon(Request $request)
    {
        $user = Auth::user();
        $nowDate = date('Y-m-d H:i:s');
        $conditionArr[] = ['code', '=', $request->code];
        $conditionArr[] = ['active', '=', true];
        $conditionArr[] = ['end_date', '>=', $nowDate];
        $checkCobonExstance = DiscountCobon::where($conditionArr)->get();
        if (sizeof($checkCobonExstance) > 0) {
            $user_usege = CobonUser::where(['user_id' => $user->id, 'cobon_id' => $checkCobonExstance[0]->id])->get();
            if (sizeof($user_usege) > 0) {
                $data['success'] = false;
                $data['message'] = 'لقد أستخدمت هذا الكود من قبل .';
                return response()->json($data);
            } else {
                $data['success'] = true;
                $data['copon_id'] = $checkCobonExstance[0]->id;
                $data['percentage'] = $checkCobonExstance[0]->dicount_percentage;
                $data['price'] = $checkCobonExstance[0]->price;
                $data['min_to_apply'] = $checkCobonExstance[0]->min_to_apply;
                return response()->json($data);
            }
        } else {
            $data['success'] = false;
            $data['message'] = 'الكود غير صالح .';
            return response()->json($data);
        }
    }
}
