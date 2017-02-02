<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Validator;
use Session;
use Config;
use App;
use DateTime;

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
use App\Models\MembersView;
use App\Models\MemberProfileViewed;
use App\Models\PageContent;

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
        $this->middleware('auth:user',['except'=>['index', 'viewRegister','register','login','logout','search','aboutUs','contactUs','sendContactMail']]);
    }
    
    public function index(Request $request) {
        $data['countries'] = Location::groupBy('country')->lists('country','country')->toArray();
        $data['statuses'] = Status::lists('name','id')->toArray();
        $data['stars'] = Star::lists('name','id')->toArray();
        $data['religions'] = Religion::lists('name','id')->toArray();
        $result = MemberProfile::with(['member' => function ($query) {
                        $query->orderBy('profile_rate', 'desc');
                    },'religion'])
                    ->limit(6)->get();
        $data['featured_members'] = $result;
        return view('frontend.index',$data);
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
                        $profile = new MemberProfile;
                        $profile->member_id = $member->id;
                        $profile->save();
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
        $locations = Location::all();
        $countries = [];
        $states = [];
        $districts = [];
        foreach ($locations as $location) {
            $countries[$location->country] = $location->country;
            $states[$location->state] = $location->state;
            $districts[$location->district] = $location->district;
        }
        $data['countries']  = $countries;
        $data['states'] = $states;
        $data['districts'] = $districts;
        $data['statuses'] = Status::lists('name','id')->toArray();
        $data['religions'] = Religion::lists('name','id')->toArray();
        $data['mother_tongue'] = ['Tamil','Malayalam','Hindhi','Bengali','Telugu','Marathi','Urdu','Gujarati','Kannada','Odia',' Punjabi','Assamese','Maithili','BhilBhilodi','Santali','Kashmiri','Nepali','Gondi','Sindhi','Konkani','Dogri','Khandeshi','Kurukh','Tulu','MeiteManipuri','Bodo','Khasi','Mundari','English'];
        $condition = [];
        $pdo = \DB::connection()->getPdo();
        $pdo->setAttribute(\PDO::ATTR_EMULATE_PREPARES, TRUE);
        $memberView = new MembersView;
        $input = [];
        if ($request->isMethod('POST')) {
            $input = $request->input();
        } elseif ($request->query('input')) {
            $input = json_decode(base64_decode($request->query('input')),true);
        }
        if (Auth::guard('user')->check()) {
            $input['gender'] = (Auth::guard('user')->user()->gender == 'Male')?'Female':'Male';
        }
        foreach ($input as $key=>$value) {
            if ($value == '') {
                continue;
            }
            switch ($key) {
                case 'age_from':
                    $memberView = $memberView->where('age','>=',$value);
                    break;
                case 'age_to':
                    $memberView = $memberView->where('age','<=',$value);
                    break;
                case 'status_id':
                    $memberView = $memberView->whereIn($key,$value);
                    break;
                case 'page':
                    break;
                default:
                    $memberView = $memberView->where($key,$value);
                    break;    
            }
        }
        $data['members'] = $memberView->paginate(10);
        $data['input'] = $input;
        return view('frontend.search',$data);
    }

    public function viewRegister() {
        return view('frontend.register');
    }

    public function login(Request $request){
        if (Auth::guard('user')->check() == true) {
            return redirect(App::getLocale().'/profile');
        }
        $errorMessage = '';
        if ($request->isMethod('post')) {
            if (Auth::guard('user')->attempt(['username' => $request->username, 'password' => $request->password])) {
                $profile = MemberProfile::where('member_id',Auth::guard('user')->user()->id)->first();
                Session::put('user.profile',$profile);
                return redirect(App::getLocale().'/profile');
            } else {
                $errorMessage = 'Invalid Username/Password';
            }
        }
        return view('frontend.login', array('errorMessage'=>$errorMessage));
    }

    public function logout(Request $request) {
        Auth::guard('user')->logout();
        return redirect(App::getLocale().'/login');
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
        $locations = Location::all();
        $countries = [];
        $states = [];
        $districts = [];
        foreach ($locations as $location) {
            $countries[$location->country] = $location->country;
            $states[$location->country][$location->state] = $location->state;
            $districts[$location->state][] = $location->district;
        }
        foreach ($states as $key=>$state) {
            $states[$key] = collect($state)->unique()->values()->all();
        }
        if ($profile->partner_preference) {
            $data['preference'] = json_decode($profile->partner_preference);
        }
        $data['countries']  = $countries;
        $data['states'] = $states;
        $data['districts'] = $districts;
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
        $data['employed_in'] = ['Government','Corporate','Own business'];
        $data['physical_status'] = ['Normal','Handicapped'];
        $data['drinking_habits'] = ['Yes','No','Drinks Socially'];
        $data['smoking_habits'] = ['Yes','No'];
        $data['eating_habits'] = ['Vegetarian','Non Vegitarian','Eggetarian'];
        $data['mother_tongue'] = ['Tamil','Malayalam','Hindhi','Bengali','Telugu','Marathi','Urdu','Gujarati','Kannada','Odia',' Punjabi','Assamese','Maithili','BhilBhilodi','Santali','Kashmiri','Nepali','Gondi','Sindhi','Konkani','Dogri','Khandeshi','Kurukh','Tulu','MeiteManipuri','Bodo','Khasi','Mundari','English'];
        $data['whoViewedThisProfile'] = $this->_getProfileViewed($user->rand_id);
        return view('frontend.profile',$data);
    }

    public function updateProfile(Request $request) {
        $user = Auth::guard('user')->user();
        $data = $request->input();
        if (isset($data['date_of_birth'])) {
            $user->date_of_birth = date('Y-m-d',strtotime($data['date_of_birth']));
            $user->save();
            unset($data['date_of_birth']);
            $from_date = new DateTime($user->date_of_birth);
            $to_date = new DateTime('today');
            $age = $to_date->diff($from_date)->y;
        }
        if (isset($data['annual_income'])) {
            $data['annual_income'] = preg_replace('/[^\dxX]/', '', $data['annual_income']);
        }
        MemberProfile::where('member_id',$user->id)->update($data);
        $sessionProfile = Session::get('user.profile');
        foreach ($data as $key=>$value) {
            if (isset($sessionProfile->{$key})) {
                $sessionProfile->{$key} = $value;
            }
        }
        Session::put('user.profile',$sessionProfile);
        if (isset($data['annual_income']))
            $data['annual_income'] = number_format($data['annual_income']);
        if (isset($age)) {
            $data['age'] = $age;
        }
        return new JsonResponse(array('success'=>true,'data'=>$data));
    }

    function  uploadProfilePicture(Request $request) {
        $user = Auth::guard('user')->user();
        if ($request->hasFile('avatar')) {
            $old_avatar = $user->avatar;
            $path = 'assets'.DIRECTORY_SEPARATOR.'profileimages'.DIRECTORY_SEPARATOR;
            $newFileName = 'user-'.$user->id.'-'.time().'.'.$request->file('avatar')->extension();
            $file_ext = $request->file('avatar')->extension();
            if ($request->file('avatar')->move($path, $newFileName)) {
                $user->avatar = $newFileName;
                $user->save();
                if ($old_avatar && file_exists($path.$old_avatar)) {
                    unlink($path.$old_avatar);
                }
                return redirect(App::getLocale().'/profile');
            }
        } else {
            return redirect(App::getLocale().'/profile')->with('error_message','The photo you uploaded is invalid');
        }
        return redirect(App::getLocale().'/profile');
    }

    function updatePreference(Request $request) {
        $user = Auth::guard('user')->user();
        $data = $request->input();
        foreach ($data as $key => $value) {
            $data[str_replace('preference_', '', $key)] = $value;
            unset($data[$key]);
        }
        $data['gender'] = ($user->gender == 'Male')? 'Female':'Male';
        MemberProfile::where('member_id',$user->id)->update(['partner_preference'=>json_encode($data)]);
        return new JsonResponse(array('success'=>true,'data'=>$data));
    }

    function changePassword(Request $request) {
        $requiredFields = array('old_password','password','confirm_password');
        if ($request->isMethod('post')) {
            if ($this->validateFields($request,$requiredFields)) {
                if ($request->password == $request->confirm_password) {
                    if (Hash::check($request->old_password,Auth::guard('user')->user()->password)) {
                        Auth::guard('user')->user()->password = bcrypt($request->password);
                        Auth::guard('user')->user()->save();
                        $request->session()->flash('success_message','Password has been updated');
                    } else {
                        $request->session()->flash('error_message','Old password does not match with current password');
                    }
                } else {
                    $request->session()->flash('error_message','New password and confirm password does not match!');
                }
            } else {
                $request->session()->flash('error_message','Kindly fill all the fields!');
            }
        }
        return view('frontend.changePassword');
    }

    function viewProfile(Request $request,$locale, $profile_id) {
        $user = Member::where('rand_id',$profile_id)->first();
        if (!$user) {
            return redirect(App::getLocale().'/search')->with('error_message','Profile does not exists!');
        }
        $this->_setProfileViewed($profile_id, $user->id);
        $profile = MemberProfile::where('member_id',$user->id)->first();
        $statuses = Status::lists('name','id')->toArray();
        $locations = Location::all();
        $countries = [];
        $states = [];
        $districts = [];
        foreach ($locations as $location) {
            $countries[$location->country] = $location->country;
            $states[$location->country][$location->state] = $location->state;
            $districts[$location->state][] = $location->district;
        }
        foreach ($states as $key=>$state) {
            $states[$key] = collect($state)->unique()->values()->all();
        }
        $data['countries']  = $countries;
        $data['states'] = $states;
        $data['districts'] = $districts;
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
        $data['employed_in'] = ['Government','Corporate','Own business'];
        $data['physical_status'] = ['Normal','Handicapped'];
        $data['drinking_habits'] = ['Yes','No','Drinks Socially'];
        $data['smoking_habits'] = ['Yes','No'];
        $data['eating_habits'] = ['Vegetarian','Non Vegitarian','Eggetarian'];
        $data['mother_tongue'] = ['Tamil','Malayalam','Hindhi','Bengali','Telugu','Marathi','Urdu','Gujarati','Kannada','Odia',' Punjabi','Assamese','Maithili','BhilBhilodi','Santali','Kashmiri','Nepali','Gondi','Sindhi','Konkani','Dogri','Khandeshi','Kurukh','Tulu','MeiteManipuri','Bodo','Khasi','Mundari','English'];
        $data['whoViewedThisProfile'] = $this->_getProfileViewed($user->rand_id);
        return view('frontend.viewProfile',$data);
    }

    function _setProfileViewed($profile_id, $user_id) {
        if (Auth::guard('user')->check() && Auth::guard('user')->user()->id != $user_id) {
            $alreadyViewed = MemberProfileViewed::where('member_id',$user_id)->where('viewed_member_id',Auth::guard('user')->user()->id)->count();
            if (!$alreadyViewed) {
                $memberViewed = new MemberProfileViewed;
                $memberViewed->profile_id = $profile_id;
                $memberViewed->member_id = $user_id;
                $memberViewed->viewed_member_id = Auth::guard('user')->user()->id;
                $memberViewed->save();
            }
        }
    }

    function _getProfileViewed($profile_id) {
        $memberIds = MemberProfileViewed::where('profile_id',$profile_id)->lists('viewed_member_id','viewed_member_id')->toArray();
        $pdo = \DB::connection()->getPdo();
        $pdo->setAttribute(\PDO::ATTR_EMULATE_PREPARES, TRUE);
        $whoViewedThisProfile = MembersView::whereIn('member_id',$memberIds)->get();
        return $whoViewedThisProfile;
    }

    function aboutUs(){
        $page = PageContent::where('name','aboutUs')->first();
        return view('frontend.aboutUs',['page'=>$page]);
    }

    function contactUs(){
        $page = PageContent::where('name','contactUs')->first();
        return view('frontend.contactUs',['page'=>$page]);
    }

    function sendContactMail(Request $request) {
        $requiredFields = array('name','phone_number','email','message');
        if ($this->validateFields($request, $requiredFields)) {
            $content = array(
                        'name' =>$request->name,
                        'phone_number' => $request->phone_number,
                        'email'=>$request->email,
                        'message'=>$request->message
                        );
            $settings = Setting::where('id',1)->first();
            $this->_sendMail('emails.contactUs','Contact us',$content,$settings->contact_us_email);
            $result = array('success'=>true, 'message'=>'Your email has been sent');
        } else {
            $result = array('success'=>false, 'message'=>'Kindly fill all the fields');
        }
        return new JsonResponse($result);
    }

}
