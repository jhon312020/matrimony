<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Validator;
use Session;
use Route;

use App\User;
use App\Models\Role;
use App\Models\RolePermission;
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
use App\Models\PageContent;
use App\Models\Page;
use App\Models\PurchaseList;
use App\Models\MembersView;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class AdminController extends Controller
{

    /**
     * Create instances of the reservation controller
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        parent::init();
        $this->middleware('auth:admin');
        $this->middleware('role_permission',['except'=>['changePassword']]);
    }

    function dashboard() {
        $data['userCount'] = User::count();
        $data['packageCount'] = Package::count();
        $data['memberCount'] = Member::count();
        $pdo = \DB::connection()->getPdo();
        $pdo->setAttribute(\PDO::ATTR_EMULATE_PREPARES, TRUE);
        $data['members'] = MembersView::orderBy('created_at','desc')->limit(10)->get();
        $data['purchaseList'] = \DB::table('purchase_list')->leftJoin('members','members.id', '=','purchase_list.member_id')
                        ->leftjoin('packages','packages.id','=','purchase_list.package_id')
                        ->select('purchase_list.created_at as purchase_date','packages.name as package_name','members.username as name','members.avatar as avatar','packages.price as price')
                        ->orderBy('purchase_list.created_at','desc')->limit(10)->get();
        $data['revenue'] = \DB::table('purchase_list')->join('packages','packages.id','=','purchase_list.package_id')->select(\DB::raw('SUM(packages.price) as total_revenue'))->get();
        return view('admin.dashboard',$data);
    }

    function viewRoles(Request $request) {
        $roles = Role::all();
        return view('admin.Roles.list', array('roles'=>$roles));
    }

    function addRole(Request $request) {
        if ($request->isMethod('post')) {
            if ($request->has('name') && trim($request->name)) {
                $name = trim($request->name);
                $exists = Role::where('name',$name)->count();
                if (!$exists) {
                    $role = new Role;
                    $role->name = $name;
                    if ($role->save()){
                        $rolePermission = new RolePermission;
                        $rolePermission->role_id = $role->id;
                        $rolePermission->save();
                        $request->session()->flash('success_message','A new role has been added successfully');
                    } else {                        
                        $request->session()->flash('error_message','Sorry something wrong try again later');
                    }
                } else {
                    $request->session()->flash('error_message','Role already exists');
                }
            } else {
                $request->session()->flash('error_message','Kindly fill the role name');
            }
        }
        return view('admin.Roles.add', array('request'=>$request));
    }

    function deleteRole($role_id) {
        if ($role_id == 1) {
            return redirect('admin/viewRoles');
        }
        $role = Role::where('id',$role_id)->first();
        if ($role) {
            $used = User::where('role_id',$role_id)->count();
            if ($used == 0) {
                $role->delete();
                $rolePermission = RolePermission::where('role_id',$role_id)->first();
                if ($rolePermission) {
                    $rolePermission->delete();
                }
                return redirect('admin/viewRoles')->with('success_message', 'Role has been deleted!');
            } else {
                return redirect('admin/viewRoles')->with('error_message', 'Sorry some one using the role!');
            }
        }
        return redirect('admin/viewRoles')->with('error_message', 'Sorry invalid role!');
    }

    function editRole(Request $request, $role_id) {
        if ($role_id == 1) {
            return redirect('admin/viewRoles');
        }
        $role = Role::where('id',$role_id)->first();
        if (!$role) {
            return response(400);
        }
        $success = '';
        $error = '';
        if ($request->isMethod('post')) {
            if ($request->has('name') && trim($request->name)) {
                $name = trim($request->name);
                $exists = Role::where('name',$name)->where('id','!=',$role_id)->count();
                if (!$exists) {
                    $role->name = $name;
                    if ($role->save()){
                        $request->session()->flash('success_message','Role has been updated successfully!');
                    } else {
                        $request->session()->flash('error_message','Sorry something wrong try again later');
                    }
                } else {
                    $request->session()->flash('error_message','Role already exists!');
                }
            } else {
                $request->session()->flash('error_message','Kindly fill all the fields');
            }
        } else {
            $request->name = $role->name;
        }
        return view('admin.Roles.edit',array('request'=>$request));
    }

    function viewUsers() {
        $users = User::all();
        $roles = Role::lists('name','id');
        return view('admin.Users.list',array('users'=>$users,'roles'=>$roles));
    }

    function addUser(Request $request) {
        $requiredFields = array('email','password','role_id');
        if ($request->isMethod('post')) {
            if ($this->validateFields($request, $requiredFields)) {
                $exists = User::where('email',$request->email)->count();
                if (!$exists) {
                    $roleExists = Role::where('id',$request->role_id)->count();
                    if ($roleExists) {
                        $user = new User;
                        $user->email = $request->email;
                        $user->password = bcrypt($request->password);
                        $user->role_id = $request->role_id;
                        $user->is_active = 1;;
                        if ($user->save()) {
                            $request->session()->flash('success_message','A user has been created successfully');
                        } else {
                            $request->session()->flash('error_message','Sorry something wrong try again later');
                        }
                    } else {
                        $request->session()->flash('error_message','Role does not exists!');
                    }
                } else {
                    $request->session()->flash('error_message','Email already exists!');
                }
            } else {
                $request->session()->flash('error_message','Kinldy fill all the fields');
            }
        } else {
            foreach($requiredFields as $field) {
                $request->{$field} = '';
            }
        }
        $roles = Role::lists('name','id');
        return view('admin.Users.add',array('roles'=>$roles,'request'=>$request));
    }

    function editUser(Request $request, $id) {
        $user = User::where('id',$id)->first();
        if (!$user) {
            return response(404);
        }
        $fields = array('email','role_id');
        if ($request->isMethod('post')) {
            if ($this->validateFields($request, $fields)) {
                $exists = User::where('email',$request->email)->where('id','!=',$id)->count();
                if ($exists == 0) {
                    foreach ($fields as $field) {
                        $user->{$field} = $request->{$field};
                    }
                    if ($user->save()) {
                        $request->session()->flash('success_message','User has been updated successfully');
                    } else {
                        $request->session()->flash('error_message','Kindly fill all the fields');
                    }
                } else {
                    $request->session()->flash('error_message','Email already exists!');
                }
            } else {
                $request->session()->flash('error_message','Kindly fill all the fields');
            }
        } else {
            foreach ($fields as $field) {
                $request->{$field} = $user->{$field};
            }
        }
        $roles = Role::lists('name','id');
        return view('admin.Users.edit',array('request'=>$request, 'roles'=>$roles));
    }

    function deleteUser($id) {
        $user = User::where('id',$id)->first();
        if ($user) {
            $user->delete();
            return redirect('admin/viewUsers')->with('success_message', 'User has been deleted!');
        } else {
            return redirect('admin/viewUsers')->with('error_message', 'Sorry invalid user!');
        }
    }

    function viewStars(Request $request) {
        $stars = Star::all();
        return view('admin.Stars.list', array('stars'=>$stars));
    }

    function addStar(Request $request) {
        if ($request->isMethod('post')) {
            if ($request->has('name') && trim($request->name)) {
                $name = trim($request->name);
                $exists = Star::where('name',$name)->count();
                if (!$exists) {
                    $star = new Star;
                    $star->name = $name;
                    if ($star->save()){
                        $data = $star;
                        return redirect($request->url())->with('success_message','A new star has been added successfully');
                    } else {
                        $request->session()->flash('error_message','Sorry something wrong try again later');
                    }
                } else {
                    $request->session()->flash('error_message','Star already exists!');
                }
            } else {
                $request->session()->flash('error_message','Kindly fill the name field!');
            }
        } else {
            $request->name = '';
        }
        return view('admin.Stars.add', array('request'=>$request));
    }

    function editStar(Request $request, $id) {
        $star = Star::where('id',$id)->first();
        if (!$star) {
            return response(404);
        }
        if ($request->isMethod('post')) {
            if ($request->has('name') && trim($request->name)) {
                $name = trim($request->name);
                $exists = Star::where('name',$name)->where('id','!=',$id)->count();
                if (!$exists) {
                    $star->name = $name;
                    if ($star->save()){
                        $data = $star;
                        return redirect($request->url())->with('success_message','Star has been updated successfully');
                    } else {
                        $request->session()->flash('error_message','Sorry something wrong try again later');
                    }
                } else {
                    $request->session()->flash('error_message','Star already exists!');
                }
            } else {
                $request->session()->flash('error_message','Kindly fill the name field!');
            }
        } else {
            $request->name = $star->name;
        }
        return view('admin.Stars.edit', array('request'=>$request));
    }

    function deleteStar($id) {
        $star = Star::where('id',$id)->first();
        if ($star) {
            $star->delete();
            return redirect('admin/viewStars')->with('success_message', 'Star has been deleted!');
        } else {
            return redirect('admin/viewStars')->with('error_message', 'Sorry invalid input!');
        }
    }

    function viewReligions(Request $request) {
        $religions = Religion::all();
        return view('admin.Religions.list', array('religions'=>$religions));
    }

    function addReligion(Request $request) {
        if ($request->isMethod('post')) {
            if ($request->has('name') && trim($request->name)) {
                $name = trim($request->name);
                $exists = Religion::where('name',$name)->count();
                if (!$exists) {
                    $religion = new Religion;
                    $religion->name = $name;
                    if ($religion->save()){
                        return redirect($request->url())->with('success_message','A new religion has been added successfully');
                    } else {
                        $request->session()->flash('error_message','Sorry something wrong try again later');
                    }
                } else {
                    $request->session()->flash('error_message','Religion already exists!');
                }
            } else {
                $request->session()->flash('error_message','Kindly fill the name field!');
            }
        } else {
            $request->name = '';
        }
        return view('admin.Religions.add', array('request'=>$request));
    }

    function editReligion(Request $request, $id) {
        $religion = Religion::where('id',$id)->first();
        if (!$religion) {
            return response(404);
        }
        if ($request->isMethod('post')) {
            if ($request->has('name') && trim($request->name)) {
                $name = trim($request->name);
                $exists = Religion::where('name',$name)->where('id','!=',$id)->count();
                if (!$exists) {
                    $religion->name = $name;
                    if ($religion->save()){
                        return redirect($request->url())->with('success_message','Religion has been updated successfully');
                    } else {
                        $request->session()->flash('error_message','Sorry something wrong try again later');
                    }
                } else {
                    $request->session()->flash('error_message','Religion already exists!');
                }
            } else {
                $request->session()->flash('error_message','Kindly fill the name field!');
            }
        } else {
            $request->name = $religion->name;
        }
        return view('admin.Religions.edit', array('request'=>$request));
    }

    function deleteReligion($id) {
        $row = Religion::where('id',$id)->first();
        if ($row) {
            $row->delete();
            return redirect('admin/viewReligions')->with('success_message', 'Religion has been deleted!');
        } else {
            return redirect('admin/viewReligions')->with('error_message', 'Sorry invalid input!');
        }
    }

    function viewCastes(Request $request) {
        $castes = Caste::all();
        return view('admin.Castes.list', array('castes'=>$castes));
    }

    function addCaste(Request $request) {
        if ($request->isMethod('post')) {
            if ($request->has('name') && trim($request->name)) {
                $name = trim($request->name);
                $exists = Caste::where('name',$name)->count();
                if (!$exists) {
                    $caste = new Caste;
                    $caste->name = $name;
                    if ($caste->save()){
                        return redirect($request->url())->with('success_message','A new Caste has been added successfully');
                    } else {
                        $request->session()->flash('error_message','Sorry something wrong try again later');
                    }
                } else {
                    $request->session()->flash('error_message','Caste already exists!');
                }
            } else {
                $request->session()->flash('error_message','Kindly fill the name field!');
            }
        } else {
            $request->name = '';
        }
        return view('admin.Castes.add', array('request'=>$request));
    }

    function editCaste(Request $request, $id) {
        $caste = Caste::where('id',$id)->first();
        if (!$caste) {
            return response(404);
        }
        if ($request->isMethod('post')) {
            if ($request->has('name') && trim($request->name)) {
                $name = trim($request->name);
                $exists = Caste::where('name',$name)->where('id','!=',$id)->count();
                if (!$exists) {
                    $caste->name = $name;
                    if ($caste->save()){
                        return redirect($request->url())->with('success_message','Caste has been updated successfully');
                    } else {
                        $request->session()->flash('error_message','Sorry something wrong try again later');
                    }
                } else {
                    $request->session()->flash('error_message','Caste already exists!');
                }
            } else {
                $request->session()->flash('error_message','Kindly fill the name field!');
            }
        } else {
            $request->name = $caste->name;
        }
        return view('admin.Castes.edit', array('request'=>$request));
    }

    function deleteCaste($id) {
        $row = Caste::where('id',$id)->first();
        if ($row) {
            $row->delete();
            return redirect('admin/viewCastes')->with('success_message', 'Caste has been deleted!');
        } else {
            return redirect('admin/viewCastes')->with('error_message', 'Sorry invalid input!');
        }
    }

    function viewLocations(Request $request) {
        $locations = Location::all();
        return view('admin.Locations.list', array('locations'=>$locations));
    }

    function addLocation(Request $request) {
        $requiredFields = array('country','state','district');
        if ($request->isMethod('post')) {
            if ($this->validateFields($request,$requiredFields)) {
                $country = ucfirst(trim($request->country));
                $state = ucfirst(trim($request->state));
                $district = ucfirst(trim($request->district));
                $exists = Location::where(['country'=>$country,'state'=>$state,'district'=>$district])->count();
                if (!$exists) {
                    $location = new Location;
                    foreach ($requiredFields as $field) {
                        $location->{$field} = $request->{$field};
                    }
                    if ($location->save()){
                        return redirect($request->url())->with('success_message','A new Location has been added successfully');
                    } else {
                        $request->session()->flash('error_message','Sorry something wrong try again later');
                    }
                } else {
                    $request->session()->flash('error_message','Location already exists!');
                }
            } else {
                $request->session()->flash('error_message','Kindly fill all the fields!');
            }
        } else {
            foreach ($requiredFields as $field) {
                $request->{$field} = '';
            }
        }
        return view('admin.Locations.add', array('request'=>$request));
    }

    function editLocation(Request $request, $id) {
        $requiredFields = array('country','state','district');
        $location = Location::where('id',$id)->first();
        if (!$location) {
            return response(404);
        }
        if ($request->isMethod('post')) {
            if ($this->validateFields($request,$requiredFields)) {
                $country = ucfirst(trim($request->country));
                $state = ucfirst(trim($request->state));
                $district = ucfirst(trim($request->district));
                $exists = Location::where(['country'=>$country,'state'=>$state,'district'=>$district])->where('id','!=',$id)->count();
                if (!$exists) {
                    foreach ($requiredFields as $field) {
                        $location->{$field} = $request->{$field};
                    }
                    if ($location->save()){
                        return redirect($request->url())->with('success_message','Location has been updated successfully');
                    } else {
                        $request->session()->flash('error_message','Sorry something wrong try again later');
                    }
                } else {
                    $request->session()->flash('error_message','Location already exists!');
                }
            } else {
                $request->session()->flash('error_message','Kindly fill all the fields!');
            }
        } else {
            foreach ($requiredFields as $field) {
                $request->{$field} = $location->{$field};
            }
        }
        return view('admin.Locations.edit', array('request'=>$request));
    }

    function deleteLocation($id) {
        $row = Location::where('id',$id)->first();
        if ($row) {
            $row->delete();
            return redirect('admin/viewLocations')->with('success_message', 'Location has been deleted!');
        } else {
            return redirect('admin/viewLocations')->with('error_message', 'Sorry invalid input!');
        }
    }

    function viewMoonsigns(Request $request) {
        $moonsigns = Moonsign::all();
        return view('admin.Moonsigns.list', array('moonsigns'=>$moonsigns));
    }

    function addMoonsign(Request $request) {
        $requiredFields = array('name');
        if ($request->isMethod('post')) {
            if ($this->validateFields($request,$requiredFields)) {
                $name = trim($request->name);
                $exists = Moonsign::where('name',$name)->count();
                if (!$exists) {
                    $moonsign = new Moonsign;
                    foreach ($requiredFields as $field) {
                        $moonsign->{$field} = $request->{$field};
                    }
                    if ($moonsign->save()){
                        return redirect($request->url())->with('success_message','A new Moon sign has been added successfully');
                    } else {
                        $request->session()->flash('error_message','Sorry something wrong try again later');
                    }
                } else {
                    $request->session()->flash('error_message','Moon sign already exists!');
                }
            } else {
                $request->session()->flash('error_message','Kindly fill all the fields!');
            }
        } else {
            foreach ($requiredFields as $field) {
                $request->{$field} = '';
            }
        }
        return view('admin.Moonsigns.add', array('request'=>$request));
    }

    function editMoonsign(Request $request, $id) {
        $requiredFields = array('name');
        $moonsign = Moonsign::where('id',$id)->first();
        if (!$moonsign) {
            return response(404);
        }
        if ($request->isMethod('post')) {
            if ($this->validateFields($request,$requiredFields)) {
                $name = trim($request->name);
                $exists = Moonsign::where('name',$name)->where('id','!=',$id)->count();
                if (!$exists) {
                    foreach ($requiredFields as $field) {
                        $moonsign->{$field} = $request->{$field};
                    }
                    if ($moonsign->save()){
                        return redirect($request->url())->with('success_message','Moon sign has been updated successfully');
                    } else {
                        $request->session()->flash('error_message','Sorry something wrong try again later');
                    }
                } else {
                    $request->session()->flash('error_message','Moon sign already exists!');
                }
            } else {
                $request->session()->flash('error_message','Kindly fill all the fields!');
            }
        } else {
            foreach ($requiredFields as $field) {
                $request->{$field} = $moonsign->{$field};
            }
        }
        return view('admin.Moonsigns.edit', array('request'=>$request));
    }

    function deleteMoonsign($id) {
        $row = Moonsign::where('id',$id)->first();
        if ($row) {
            $row->delete();
            return redirect('admin/viewMoonsigns')->with('success_message', 'Moon sign has been deleted!');
        } else {
            return redirect('admin/viewMoonsigns')->with('error_message', 'Sorry invalid input!');
        }
    }

    function viewZodiacsigns(Request $request) {
        $zodiacsigns = Zodiacsign::all();
        return view('admin.Zodiacsigns.list', array('zodiacsigns'=>$zodiacsigns));
    }

    function addZodiacsign(Request $request) {
        $requiredFields = array('name');
        if ($request->isMethod('post')) {
            if ($this->validateFields($request,$requiredFields)) {
                $name = trim($request->name);
                $exists = Zodiacsign::where('name',$name)->count();
                if (!$exists) {
                    $zodiacsign = new Zodiacsign;
                    foreach ($requiredFields as $field) {
                        $zodiacsign->{$field} = $request->{$field};
                    }
                    if ($zodiacsign->save()){
                        return redirect($request->url())->with('success_message','A new Zodiac sign has been added successfully');
                    } else {
                        $request->session()->flash('error_message','Sorry something wrong try again later');
                    }
                } else {
                    $request->session()->flash('error_message','Zodiac sign already exists!');
                }
            } else {
                $request->session()->flash('error_message','Kindly fill all the fields!');
            }
        } else {
            foreach ($requiredFields as $field) {
                $request->{$field} = '';
            }
        }
        return view('admin.Zodiacsigns.add', array('request'=>$request));
    }

    function editZodiacsign(Request $request, $id) {
        $requiredFields = array('name');
        $zodiacsign = Zodiacsign::where('id',$id)->first();
        if (!$zodiacsign) {
            return response(404);
        }
        if ($request->isMethod('post')) {
            if ($this->validateFields($request,$requiredFields)) {
                $name = trim($request->name);
                $exists = Zodiacsign::where('name',$name)->where('id','!=',$id)->count();
                if (!$exists) {
                    foreach ($requiredFields as $field) {
                        $zodiacsign->{$field} = $request->{$field};
                    }
                    if ($zodiacsign->save()){
                        return redirect($request->url())->with('success_message','Zodiac sign has been updated successfully');
                    } else {
                        $request->session()->flash('error_message','Sorry something wrong try again later');
                    }
                } else {
                    $request->session()->flash('error_message','Zodiac sign already exists!');
                }
            } else {
                $request->session()->flash('error_message','Kindly fill all the fields!');
            }
        } else {
            foreach ($requiredFields as $field) {
                $request->{$field} = $zodiacsign->{$field};
            }
        }
        return view('admin.Zodiacsigns.edit', array('request'=>$request));
    }

    function deleteZodiacsign($id) {
        $row = Zodiacsign::where('id',$id)->first();
        if ($row) {
            $row->delete();
            return redirect('admin/viewZodiacsigns')->with('success_message', 'Zodiac sign has been deleted!');
        } else {
            return redirect('admin/viewZodiacsigns')->with('error_message', 'Sorry invalid input!');
        }
    }

    function viewGraduations(Request $request) {
        $graduations = Graduation::all();
        return view('admin.Graduations.list', array('graduations'=>$graduations));
    }

    function addGraduation(Request $request) {
        if ($request->isMethod('post')) {
            if ($request->has('name') && trim($request->name)) {
                $name = trim($request->name);
                $exists = Graduation::where('name',$name)->count();
                if (!$exists) {
                    $graduation = new Graduation;
                    $graduation->name = $name;
                    if ($graduation->save()){
                        return redirect($request->url())->with('success_message','A new Graduation has been added successfully');
                    } else {
                        $request->session()->flash('error_message','Sorry something wrong try again later');
                    }
                } else {
                    $request->session()->flash('error_message','Graduation already exists!');
                }
            } else {
                $request->session()->flash('error_message','Kindly fill the name field!');
            }
        } else {
            $request->name = '';
        }
        return view('admin.Graduations.add', array('request'=>$request));
    }

    function editGraduation(Request $request, $id) {
        $graduation = Graduation::where('id',$id)->first();
        if (!$graduation) {
            return response(404);
        }
        if ($request->isMethod('post')) {
            if ($request->has('name') && trim($request->name)) {
                $name = trim($request->name);
                $exists = Graduation::where('name',$name)->where('id','!=',$id)->count();
                if (!$exists) {
                    $graduation->name = $name;
                    if ($graduation->save()){
                        return redirect($request->url())->with('success_message','Graduation has been updated successfully');
                    } else {
                        $request->session()->flash('error_message','Sorry something wrong try again later');
                    }
                } else {
                    $request->session()->flash('error_message','Graduation already exists!');
                }
            } else {
                $request->session()->flash('error_message','Kindly fill the name field!');
            }
        } else {
            $request->name = $graduation->name;
        }
        return view('admin.Graduations.edit', array('request'=>$request));
    }

    function deleteGraduation($id) {
        $row = Graduation::where('id',$id)->first();
        if ($row) {
            $row->delete();
            return redirect('admin/viewGraduations')->with('success_message', 'Graduation has been deleted!');
        } else {
            return redirect('admin/viewGraduations')->with('error_message', 'Sorry invalid input!');
        }
    }

    function viewStatus(Request $request) {
        $statuses = Status::all();
        return view('admin.Status.list', array('statuses'=>$statuses));
    }

    function addStatus(Request $request) {
        if ($request->isMethod('post')) {
            if ($request->has('name') && trim($request->name)) {
                $name = trim($request->name);
                $exists = Status::where('name',$name)->count();
                if (!$exists) {
                    $Status = new Status;
                    $Status->name = $name;
                    if ($Status->save()){
                        return redirect($request->url())->with('success_message','A new Status has been added successfully');
                    } else {
                        $request->session()->flash('error_message','Sorry something wrong try again later');
                    }
                } else {
                    $request->session()->flash('error_message','Status already exists!');
                }
            } else {
                $request->session()->flash('error_message','Kindly fill the name field!');
            }
        } else {
            $request->name = '';
        }
        return view('admin.Status.add', array('request'=>$request));
    }

    function editStatus(Request $request, $id) {
        $Status = Status::where('id',$id)->first();
        if (!$Status) {
            return response(404);
        }
        if ($request->isMethod('post')) {
            if ($request->has('name') && trim($request->name)) {
                $name = trim($request->name);
                $exists = Status::where('name',$name)->where('id','!=',$id)->count();
                if (!$exists) {
                    $Status->name = $name;
                    if ($Status->save()){
                        return redirect($request->url())->with('success_message','Status has been updated successfully');
                    } else {
                        $request->session()->flash('error_message','Sorry something wrong try again later');
                    }
                } else {
                    $request->session()->flash('error_message','Status already exists!');
                }
            } else {
                $request->session()->flash('error_message','Kindly fill the name field!');
            }
        } else {
            $request->name = $Status->name;
        }
        return view('admin.Status.edit', array('request'=>$request));
    }

    function deleteStatus($id) {
        $row = Status::where('id',$id)->first();
        if ($row) {
            $row->delete();
            return redirect('admin/viewStatus')->with('success_message', 'Status has been deleted!');
        } else {
            return redirect('admin/viewStatus')->with('error_message', 'Sorry invalid input!');
        }
    }

    function viewPackages(Request $request) {
        $packages = Package::all();
        return view('admin.Packages.list', array('packages'=>$packages));
    }

    function addPackage(Request $request) {
        $requiredFields = array('name','period','price');
        if ($request->isMethod('post')) {
            if ($this->validateFields($request,$requiredFields)) {
                $name = trim($request->name);
                $exists = Package::where('name',$name)->count();
                if (!$exists) {
                    $package = new Package;
                    foreach ($requiredFields as $field) {
                        $package->{$field} = $request->{$field};
                    }
                    $validator = $package->validateFields($request->input());
                    if ($validator->passes()) {
                        if ($package->save()){
                            return redirect($request->url())->with('success_message','A new Package has been added successfully');
                        } else {
                            $request->session()->flash('error_message','Sorry something wrong try again later');
                        }    
                    }  else {
                        $errors = $validator->errors()->all();
                        $request->session()->flash('error_message',$errors[0]);
                    }
                } else {
                    $request->session()->flash('error_message','Package already exists!');
                }
            } else {
                $request->session()->flash('error_message','Kindly fill all the fields!');
            }
        } else {
            foreach ($requiredFields as $field) {
                $request->{$field} = '';
            }
        }
        return view('admin.Packages.add', array('request'=>$request));
    }

    function editPackage(Request $request, $id) {
        $requiredFields = array('name','period','price');
        $package = Package::where('id',$id)->first();
        if (!$package) {
            return response(404);
        }
        if ($request->isMethod('post')) {
            if ($request->has('name') && trim($request->name)) {
                $name = trim($request->name);
                $exists = Package::where('name',$name)->where('id','!=',$id)->count();
                if (!$exists) {
                    foreach ($requiredFields as $field) {
                        $package->{$field} = $request->{$field};
                    }
                    $validator = $package->validateFields($package->toArray());
                    if ($validator->passes()) {
                        if ($package->save()){
                            return redirect($request->url())->with('success_message','Package has been updated successfully');
                        } else {
                            $request->session()->flash('error_message','Sorry something wrong try again later');
                        }
                    } else {
                        $errors = $validator->errors()->all();
                        $request->session()->flash('error_message',$errors[0]);
                    }
                } else {
                    $request->session()->flash('error_message','Package already exists!');
                }
            } else {
                $request->session()->flash('error_message','Kindly fill all the fields!');
            }
        } else {
            foreach ($requiredFields as $field) {
                $request->{$field} = $package->{$field};
            }
        }
        return view('admin.Packages.edit', array('request'=>$request));
    }

    function deletePackage($id) {
        $row = Package::where('id',$id)->first();
        if ($row) {
            $row->delete();
            return redirect('admin/viewPackages')->with('success_message', 'Package has been deleted!');
        } else {
            return redirect('admin/viewPackages')->with('error_message', 'Sorry invalid input!');
        }
    }

    function changePassword(Request $request) {
        $requiredFields = array('old_password','password','confirm_password');
        if ($request->isMethod('post')) {
            if ($this->validateFields($request,$requiredFields)) {
                if ($request->password == $request->confirm_password) {
                    if (Hash::check($request->old_password,Auth::guard('admin')->user()->password)) {
                        Auth::guard('admin')->user()->password = bcrypt($request->password);
                        Auth::guard('admin')->user()->save();
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
        return view('admin.adminChangePassword', array('request'=>$request));
    }

    function  updateSettings(Request $request){
        $setting = Setting::where('id',1)->first();
        $fields = array('title','religion','location','graduation','occupation','age','star','moon_sign','zodiac_sign','status','search_limit_without_login','smtp_host','smtp_username','smtp_password','contact_us_email');
        $path = 'assets'.DIRECTORY_SEPARATOR.'settingsimages'.DIRECTORY_SEPARATOR;
        if ($request->isMethod('post')) {
            foreach ($fields as $field) {
                $setting->{$field} = $request->{$field};
            }

            if ($setting->smtp_password == '*****'){
                unset($setting->smtp_password);
            }

            if ($request->hasFile('image')) {
                $newFileName = time().'_logo.'.$request->file('image')->extension();
                $file_ext = $request->file('image')->extension();
                if ($request->file('image')->move($path, $newFileName)) {
                    $oldimage = $setting->image;
                    $setting->image = $newFileName;
                }
            }

            if ($request->hasFile('fav_icon')) {
                $newFileName = time().'_favicon.'.$request->file('fav_icon')->extension();
                $file_ext = $request->file('fav_icon')->extension();
                if ($request->file('fav_icon')->move($path, $newFileName)) {
                    $oldfavicon = $setting->fav_icon;
                    $setting->fav_icon = $newFileName;
                }
            }
            if ($setting->save()) {
                $removeColumns = array('smtp_host','smtp_username','smtp_password');
                foreach ($removeColumns as $column) {
                    unset($setting->{$column});
                }
                Session::put('settings',$setting);
                if (isset($oldimage) && file_exists($path.$oldimage)) {
                    unlink($path.$oldimage);
                }
                if (isset($oldfavicon) && file_exists($path.$oldfavicon)) {
                    unlink($path.$oldfavicon);
                }
                return redirect('admin/updateSettings')->with('success_message','Settings has been updated successfully!');
            }
        }
        $setting->smtp_password = '*****';
        return view('admin.updateSettings', array('setting'=>$setting));
    }

    function memberList() {
        $members = Member::all();
        return view('admin.Members.list',array('members'=>$members));
    }

    function setRating(Request $request) { 
        $requiredFields = array('profile_rate','id');
        if ($request->isMethod('post')) {
            if ($this->validateFields($request,$requiredFields)) {
                $member = Member::where('id',$request->id)->first();
                if ($member) {
                    $member->profile_rate = $request->profile_rate;
                    $member->save();
                    return response(200);
                }
            }
        }
        return response(200);
    }

    function listPages() {
        $pages = PageContent::all();
        return view('admin.Pages.list',array('pageContents'=>$pages));
    }

    function editPage(Request $request, $id) {
        $requiredFields = array('name','en_content','ta_content');
        $page = PageContent::where('id',$id)->first();
        if (!$page) {
            return response(404);
        }
        if ($request->isMethod('post')) {
            foreach ($requiredFields as $field) {
                $page->{$field} = $request->{$field};
            }
            if ($page->save()) {
                $request->session()->flash('success_message','Content has been updated successfully');
            }
        } else {
            foreach ($requiredFields as $field) {
                $request->{$field} = $page->{$field};
            }
        }
        return view('admin.Pages.edit', array('request'=>$request));
    }

    function rolePermission(Request $request,$id) {
        if ($id == 1) {
            return redirect('admin/viewRoles');
        }
        $exists = Role::where('id',$id)->first();
        if (!$exists) {
            return redirect('admin/viewRoles');
        }

        $rolePermission = RolePermission::where('role_id',$id)->first();
        if ($rolePermission) {
            if ($rolePermission->permissions) {
                $inputs = explode(',',$rolePermission->permissions);
            } else {
                $inputs = [];
            }
        } else {
            $rolePermission = new RolePermission;
            $rolePermission->role_id = $exists->id;
            $rolePermission->save();
            $inputs = [];
        }
        if ($request->isMethod('post')) {
            if ($request->has('inputs')) {
                $inputs = $request->inputs;
                $rolePermission->permissions = implode(',',$request->inputs);
                $rolePermission->save();
                $request->session()->flash('success_message','Permission has been updated successfully');
            }
        }

        $pages = Page::all();
        $pageList = [];
        foreach ($pages as $page) {
            $pageList[$page->nav_title][] = $page;
        }
        return view('admin.Roles.role_permission', array('request'=>$request, 'inputs'=>$inputs, 'pageList'=>$pageList));
    }

    function paidMemberList() {
        $data['paidLists'] = \DB::table('purchase_list')->leftJoin('members','members.id', '=','purchase_list.member_id')
                        ->leftjoin('packages','packages.id','=','purchase_list.package_id')
                        ->select('purchase_list.created_at as purchase_date','packages.name as package_name','members.username as username','packages.price as price','members.gender as gender','packages.period as period')
                        ->orderBy('purchase_list.created_at','desc')->get();
        return view('admin.Payment.list', $data);
    }


}