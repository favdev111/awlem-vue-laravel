<?php

namespace App\Http\Controllers\API;

use App\Complaint;
use App\FaqAdmin;
use App\FaqRating;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;
use App\Rating;
use Validator;
use Illuminate\Support\Facades\Auth;

class statitcPagesController extends Controller
{
    public function page($id = 1, $web_mobile = 0)
    {
        return Page::where(['id' => $id])->firstOrFail();
    }

    function mobileStaticPagesList()
    {
        return Page::where('show_mobile', true)->select('id', 'title')->get();
    }

    public function faqs()
    {
        $faqs =  FaqAdmin::where('active', true)->get();
        return response()->json($faqs, 200);
    }

    public function rateFqa(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'faq_id'              => 'required',
            'helpfull'              => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 449);
        }
        $input = $request->all();
        FaqRating::create($input);
        return response()->json(['success' => true], 200);
    }

    public function ratingApp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'rate'              => 'required',
            'review'              => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 449);
        }
        $user = AUth::user();
        if ($user) {

            $input = $request->all();
            $input['user_id'] = $user->id;
            Rating::create($input);
            return response()->json(['success' => true], 200);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }

    public function insertComplaint(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name'              => 'required',
            'body'              => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 449);
        }
        $user = AUth::user();
        if ($user) {

            $input = $request->all();
            $input['user_id'] = $user->id;
            Complaint::create($input);
            return response()->json(['success' => true], 200);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }
}
