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
use App\Models\MemberProfile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\UploadedFile;

class FrontendController extends Controller
{

    /**
     * Create instances of the Frontend controller
     *
     * @return void
     */
    public function __construct(Request $request) {
        parent::init();
        $this->middleware('locale');
        $this->middleware('auth:user',['except'=>['index', 'viewRegister','register','login','logout']]);
    }
    
    public function index(Request $request) {
      return view('frontend.index');
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
                    $member->rand_id = 'MI-'.$member->id.'-'.$this->generateRandomString(5);
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
        $profile = MemberProfile::where('member_id',$user->id)->first();
        $statuses = Status::lists('name','id')->toArray();
        if (!$profile) {
            $profile = new MemberProfile;
            $profile->member_id = $user->id;
            $profile->save();
        }
        $data['user'] = $user;
        $data['profile'] = $profile;
        $data['statuses'] = $statuses;
        $data['religions'] = Religion::lists('name','id')->toArray();
        $data['castes'] = Caste::lists('name','id')->toArray();
        $data['stars'] = Star::lists('name','id')->toArray();
        $data['moonsigns'] = Moonsign::lists('name','id')->toArray();
        $data['zodiacsigns'] = Zodiacsign::lists('name','id')->toArray();
        $data['educations'] = Graduation::lists('name','id')->toArray();
        $data['body_types'] = ['Slim','Athletic','Average','Heavy'];
        $data['complexions'] = ['Very Fair','Fair','Wheatish','Wheatish Brown','Dark'];
        $data['physical_status'] = ['Normal','Handicapped'];
        $data['drinking_habits'] = ['Yes','No','Drinks Socially'];
        $data['smoking_habits'] = ['Yes','No'];
        $data['eating_habits'] = ['Vegetarian','Non Vegitarian','Eggetarian'];
        $data['mother_tongue'] = ['Tamil','Malayalam','Hindhi','Bengali','Telugu','Marathi','Urdu','Gujarati','Kannada','Odia',' Punjabi','Assamese','Maithili','BhilBhilodi','Santali','Kashmiri','Nepali','Gondi','Sindhi','Konkani','Dogri','Khandeshi','Kurukh','Tulu','MeiteManipuri','Bodo','Khasi','Mundari','English'];
        return view('frontend.profile',$data);
    }

    public function updateProfile(Request $request) {
        $user = Auth::guard('user')->user();
        $data = $request->input();
        MemberProfile::where('member_id',$user->id)->update($data);
        return new JsonResponse(array('success'=>true));
    }

}
