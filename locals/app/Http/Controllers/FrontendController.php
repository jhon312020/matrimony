<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Validator;
use Session;
use Config;
use App;

use App\User;
use App\Models\Role;
use App\Models\Star;
use App\Models\Religion;
use App\Models\Caste;
use App\Models\Location;
use App\Models\Moonsign;
use App\Models\Zodiacsign;
use App\Models\Graduation;
use App\Models\Status;
use App\Models\Package;
use App\Models\Setting;
use App\Models\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\UploadedFile;

class FrontendController extends Controller
{

    /**
     * Create instances of the reservation controller
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        parent::init();
        $this->middleware('locale');
        $this->middleware('auth:user',['except'=>['viewRegister','register','login','logout']]);
    }

    public function register(Request $request) {
        $requiredFields = array('username','password','email','date_of_birth','phone_number','gender');
        $result = array();
        if ($request->isMethod('post')) {
            if ($this->validateFields($request, $requiredFields)) {
                $member = new Member;
                foreach ($requiredFields as $field) {
                    $member->{$field} = $request->{$field};
                }
                $member->password = bcrypt($member->password);
                $member->date_of_birth = date('Y-m-d',strtotime($request->date_of_birth));
                $member->is_active = 1;
                $validator = $member->validateFields($member->toArray());
                if ($validator->passes()) {
                    $member->save();
                    if (isset($member->id) && $member->id) {
                        $result = array('success'=>true,'message'=>trans('You have registered successfully. Kindly login with your username and password'));
                    } else {
                        $result = array('success'=>false,'message'=>trans('Kinldy try again later'));
                    }
                } else {
                    $errors = $validator->errors()->all();
                    $result = array('success'=>false,'message'=>$errors[0]);
                }
            } else {
                $result = array('success'=>false,'message'=>trans('Kinldy fill all the fields'));
            }
        }
        return new JsonResponse($result);
    }

    public function  search(Request $request) {
        return view('welcome');
    }

    public function viewRegister() {
        return view('frontend.register');
    }

    public function login(Request $request){
        if (Auth::guard('user')->check() == true) {
            return redirect($request->getLocale().'/profile');
        }
        $errorMessage = '';
        if ($request->isMethod('post')) {
            if (Auth::guard('user')->attempt(['username' => $request->username, 'password' => $request->password])) {
                return redirect($request->getLocale().'/profile');
            } else {
                $errorMessage = 'Invalid Username/Password';
            }
        }
        return view('frontend.login', array('errorMessage'=>$errorMessage));
    }

    public function logout(Request $request) {
        Auth::guard('user')->logout();
        return redirect($request->getLocale().'/login');
    }

    public function profile() {
        $user = Auth::guard('user')->user();
        return view('frontend.profile',array('user'=>$user));
    }

}