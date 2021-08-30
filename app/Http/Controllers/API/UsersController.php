<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Restorant;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;



class UsersController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone'              => 'required|unique:users',
            'password'              => 'required|min:8|max:30',
            'name'              => 'required|string',
            // 'email'              => 'required|unique:users',
        ], [
            'phone.required'      => 'رقم الجوال مطلوب',
            'phone.unique'      => 'رقم الجوال مسجل مسبقا',
            'password.required'      => 'كلمة المرور مطلوبة',
            'password.min'      => 'كلمة المرور أقل من 8 ',
            'password.max'      => 'كلمة المرور أكبر من 30 ',
            'name.required'      => 'الأسم مطلوب',
            // 'email.required'                   => 'البريد الألكتروني مطلوب',
            // 'email.unique'                   => 'البريد الألكتروني مسجل مسبقا',
        ]);
        if ($validator->fails()) {
            $data['success'] = false;
            $data['errors'] = $validator->errors();
            return response()->json($data);
        }
        $input = $request->all();
        $input['password']  = bcrypt($input['password']);
        $input['virification_code'] = $this->generatRandomStringWithoutZeros(); //generate code
        $user = User::create($input);
        $success['token'] = $user->createToken('MyApp')->accessToken;
        $user->token = $success['token'];
        $user->save();
        $this->sendOtpCode($input['phone'], $input['virification_code']);
        $data['success'] = true;
        $data['data'] = ['token' => $success['token'], "virification_code" => $user->virification_code];
        return response()->json($data, 200);
    }

    public function activeAccount(Request $request)
    {
        $user = AUth::user();
        if ($user) {
            if ($request->virification_code == $user->virification_code) {
                if ($user->active == true) {
                    $data['success'] = false;
                    $data['data']['error'] = 'الحساب مفعل بالفعل.';
                    return response()->json($data);
                }
                $user->active = true;
                $user->save();
                $user = AUth::user();
                unset($user->accepted, $user->category_id, $user->parent_restorant, $user->websit_link, $user->email_verified_at, $user->hasAdminAccess, $user->active, $user->virification_code, $user->lang, $user->created_at, $user->updated_at);
                $data['success'] = true;
                $data['data'] = $user;
                return response()->json($data);
            } else {
                $data['success'] = false;
                $data['data']['error'] = 'الكود غير صحيح';
                return response()->json($data);
            }
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }

    function reSendCode()
    {
        $user = AUth::user();
        $user->virification_code = $this->generatRandomStringWithoutZeros(); //generate code
        $user->save();
        $this->sendOtpCode($user->phone, $user->virification_code);
        return response()->json(['success' => true], 200);
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['phone' => $request['phone'], 'password' => $request['password']])) {
            $user = Auth::user();
            $user->token = $user->createToken('MyApp')->accessToken;
            if (isset($request->device_token)) {
                $user->device_token = $request->device_token;
            }
            $user->save();
            if ($user->active == true) {
                unset($user->accepted, $user->category_id, $user->parent_restorant, $user->websit_link, $user->email_verified_at, $user->hasAdminAccess, $user->active, $user->virification_code, $user->lang, $user->created_at, $user->updated_at);
                $data['success'] = true;
                $data['data'] = $user;
                return response()->json($data);
            } else {
                $data['success'] = false;
                $data['data'] = ['error' => 'هذا الحساب غير مفعل', 'active' => 0, 'token' => $user->token, 'virification_code' => (int)$user->virification_code];
                return response()->json($data, 200);
            }
        } else {
            $data['success'] = false;
            $data['data'] = ['error' => 'رقم الجوال أو كلمة المرور غير صحيحه'];
            return response()->json($data, 200);
        }
    }

    public function changeEmail(Request $request)
    {

        if (Auth::attempt(['phone' => $request['phone'], 'password' => $request['password']])) {
            $user = Auth::user();
            $user->email = $request->email;
            $user->save();
            unset($user->accepted, $user->category_id, $user->parent_restorant, $user->websit_link, $user->email_verified_at, $user->hasAdminAccess, $user->active, $user->virification_code, $user->lang, $user->created_at, $user->updated_at);
            $data['success'] = true;
            $data['data'] = $user;
            return response()->json($data);
        } else {
            $data['success'] = false;
            $data['data'] = ['error' => 'كلمة المرور غير صحيحة'];
            return response()->json($data);
        }
    }

    public function changePhoneFirstStep(Request $request)
    {

        if (Auth::attempt(['phone' => $request['phone'], 'password' => $request['password']])) {
            $user = Auth::user();
            $user->virification_code = $this->generatRandomStringWithoutZeros(); //generate code
            $user->save();
            $this->sendOtpCode($request['phone'], $user->virification_code);
            return response()->json(['success' => true, 'virification_code' => $user->virification_code], 200);
        } else {
            $data['success'] = false;
            $data['data'] = ['error' => 'كلمة المرور غير صحيحة'];
            return response()->json($data);
        }
    }

    public function changePhoneLastStep(Request $request)
    {
        $user = AUth::user();
        $user->phone = $request->new_phone;
        if ($user->virification_code == $request->virification_code) {
            $user->save();
            unset($user->accepted, $user->category_id, $user->parent_restorant, $user->websit_link, $user->email_verified_at, $user->hasAdminAccess, $user->active, $user->virification_code, $user->lang, $user->created_at, $user->updated_at);
            $data['success'] = true;
            $data['data'] = $user;
            return response()->json($data);
        } else {
            $data['success'] = false;
            $data['data'] = ['error' => 'كود التفعيل غير صحيح'];
            return response()->json($data);
        }
    }

    public function checNumberOrEmailExistance(Request $request)
    {
        $user = User::where('phone', '=', $request->phone_email)->orWhere('email', '=', $request->phone_email)->get();
        if (sizeof($user) > 0) {
            $user = $user[0];
            $user->virification_code = $this->generatRandomStringWithoutZeros(); //generate code
            $user->save();
            unset($user->accepted, $user->name, $user->email, $user->photo, $user->address, $user->category_id, $user->parent_restorant, $user->websit_link, $user->email_verified_at, $user->hasAdminAccess, $user->active, $user->lang, $user->created_at, $user->updated_at);
            $this->sendOtpCode($user->phone, $user->virification_code);
            $data['success'] = true;
            $data['data'] = $user;
            return response()->json($data);
        } else {
            $data['success'] = false;
            $data['data'] = ['error' => 'غير موجود'];
            return response()->json($data);
        }
    }
    public function resendOnForgetPassword(Request $request)
    {
        $user = Auth::user();
        unset($user->accepted, $user->name, $user->email, $user->photo, $user->address, $user->category_id, $user->parent_restorant, $user->websit_link, $user->email_verified_at, $user->hasAdminAccess, $user->active, $user->lang, $user->created_at, $user->updated_at);
        $user->virification_code = $this->generatRandomStringWithoutZeros(); //generate code
        $user->save();
        $this->sendOtpCode($user->phone, $user->virification_code);
        $data['success'] = true;
        $data['data'] = $user;
        return response()->json($data);
    }

    public function changePassword(Request $request)
    {
        $user = AUth::user();
        $user->password = bcrypt($request->password);
        $user->save();
        unset($user->accepted, $user->category_id, $user->parent_restorant, $user->websit_link, $user->email_verified_at, $user->hasAdminAccess, $user->active, $user->virification_code, $user->lang, $user->created_at, $user->updated_at);
        $data['success'] = true;
        $data['data'] = $user;
        return response()->json($data);
    }
    function generatRandomStringWithoutZeros()
    {
        for ($i = 0; $i <= 10; $i++) {
            $smsCod = rand(1, 9999);
            $newCode = str_split($smsCod, 1);
            if (!in_array(0, $newCode) && sizeof($newCode) == 4) {
                break;
            }
        }
        return $smsCod;
    }

    public function registerRestorant(Request $request)
    {

        //register User
        $validator = Validator::make(
            $request->all(),
            [
                'phone'              => 'required|string|min:8|max:14|unique:users',
                'name'              => 'required|string',
                'address' => 'required',
                'email'              => 'required|unique:users',
            ],
            [
                'phone.required'   => 'رقم الجوال مطلوب',
                'phone.unique'     => 'رقم الجوال مسجل مسبقا',
                'name.required'    => 'الأسم مطلوب',
                'email.required'   => 'البريد الألكتروني مطلوب',
                'email.unique'     => 'البريد الألكتروني مسجل مسبقا',
            ]
        );

        if ($validator->fails()) {
            $data['success'] = false;
            $data['errors'] = $validator->errors();
            return response()->json($data);
        }
        $password = $this->generatRandomStringWithoutZeros() . $this->generatRandomStringWithoutZeros();
        $input['phone']  = $request->phone;
        $input['name']  = $request->name;
        $input['address']  = $request->address;
        $input['email']  = $request->email;
        $input['password']  = bcrypt($password);
        $input['virification_code'] = $this->generatRandomStringWithoutZeros(); //generate code
        $input['hasAdminAccess'] = true;
        $user = User::create($input);
        $user->assignRole([4]);
        $success['token'] = $user->createToken('MyApp')->accessToken;
        $user->token = $success['token'];
        $user->save();
        //register Restorant
        $restArr['name'] = $request->restorant_name;
        $restArr['category_id'] = $request->category_id;
        $restArr['user_id'] = $user->id;
        $restorant = Restorant::create($restArr);
        $this->sendOtpCode($request->phone, $input['virification_code']);
        $data['success'] = true;
        return response()->json($data);
    }

    public function editAccount(Request $request)
    {
        $user = AUth::user();
        $validator = Validator::make($request->all(), [
            'name'             => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 401);
        }
        $input = $request->all();
        User::find($user->id)->update($input);
        $user = User::find($user->id);
        unset($user->accepted, $user->category_id, $user->parent_restorant, $user->websit_link, $user->email_verified_at, $user->hasAdminAccess, $user->active, $user->virification_code, $user->lang, $user->created_at, $user->updated_at);
        return response()->json($user, 200);
    }

    public function updateUserPhoto(Request $request)
    {

        $user = AUth::user();
        $photo =  $request->file('photo')->getClientOriginalName();
        $extension = pathinfo($photo, PATHINFO_EXTENSION);
        $name = 'awlem' . time() . '.' . $extension;
        $user->photo = 'images/user/' . $user->id . '/photo/' . $name;
        $request->file('photo')->move('images/user/' . $user->id . '/photo', $name);
        $user->save();
        $user = User::find($user->id);
        unset($user->accepted, $user->category_id, $user->parent_restorant, $user->websit_link, $user->email_verified_at, $user->hasAdminAccess, $user->active, $user->virification_code, $user->lang, $user->created_at, $user->updated_at);
        $data['success'] = true;
        $data['data'] = $user;
        return response()->json($data);
    }
    private function sendOtpCode($phone, $code)
    {
        $message = 'كود التحقق الخاص بأولم :' . $code;
        $url = "https://www.oursms.net/api/sendsms.php?&username=Awlem&password=123456&message=" . $message . "&numbers=" . $phone . "&sender=Awlem&Rmduplicated=1&return=Json";
        $url = preg_replace("/ /", "%20", $url);
        $result = file_get_contents($url);
        return $result;
    }
}
