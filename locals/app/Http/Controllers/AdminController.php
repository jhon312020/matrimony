<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\User;
use App\Models\Role;
use App\Models\Star;
use App\Models\Religion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class AdminController extends Controller
{

    /**
     * Create instances of the reservation controller
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        //$this->middleware('auth');
    }

    function dashboard() {
        return view('admin.dashboard');
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
                        return redirect('admin/viewRoles')->with('success_message','A new role has been added successfully');
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
        $role = Role::where('id',$role_id)->first();
        if ($role) {
            $used = User::where('role_id',$role_id)->count();
            if ($used == 0) {
                $role->delete();
                return redirect('admin/viewRoles')->with('success_message', 'Role has been deleted!');
            } else {
                return redirect('admin/viewRoles')->with('error_message', 'Sorry some one using the role!');
            }
        }
        return redirect('admin/viewRoles')->with('error_message', 'Sorry invalid role!');
    }

    function editRole(Request $request, $role_id) {
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
                        return redirect('admin/viewRoles')->with('success_message','Role has been updated successfully!');
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
                            return redirect('admin/viewUsers')->with('success_message','A user has been created successfully');
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
                        return redirect('admin/viewUsers')->with('success_message','User has been updated successfully');
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
                        return redirect('admin/viewStars')->with('success_message','A new star has been added successfully');
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
                        return redirect('admin/viewStars')->with('success_message','Star has been updated successfully');
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
            return redirect('admin/viewStars')->with('error_message', 'Sorry invalid user!');
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
                        return redirect('admin/viewReligions')->with('success_message','A new religion has been added successfully');
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
                        return redirect('admin/viewReligions')->with('success_message','Religion has been updated successfully');
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
            return redirect('admin/viewReligions')->with('error_message', 'Sorry invalid user!');
        }
    }


}