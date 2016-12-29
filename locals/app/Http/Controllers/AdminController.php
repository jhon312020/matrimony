<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\User;
use App\Models\Role;

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
    public function __construct()
    {
        //$this->middleware('auth');
    }

    function dashboard() {
        return view('admin.dashboard');
    }

    function viewRoles(Request $request) {
        $roles = Role::all();
        return view('admin.viewRoles', array('roles'=>$roles));
    }

    function addRole(Request $request) {
        if ($request->isMethod('post')) {
            if ($request->has('role') && trim($request->role)) {
                $name = trim($request->role);
                $exists = Role::where('name',$name)->count();
                if (!$exists) {
                    $role = new Role;
                    $role->name = $name;
                    if ($role->save()){
                        $data = $role;
                    } else {
                        $data = array('error'=>'Sorry something wrong try again later');
                    }
                } else {
                    $data = array('error'=>'Role already exists!');
                }
            } else {
                $data = array('error'=>'Kindly fill the role name');
            }
            return new JsonResponse($data);
        }
        return view('admin.addRole');
    }

    function addUser(Request $request) {
        if ($request->isMethod('post')) {
            $requiredFields = array('email','password','role_id');
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
                            unset($user->password);
                            $data= $user;
                        } else {
                            $data = array('error'=>'Sorry something wrong try again later');
                        }
                    } else {
                        $data = array('error'=>'Role does not exists!');
                    }
                } else {
                    $data = array('error'=>'Email already exists!');
                }
            } else {
                $data = array('error'=>'Kinldy fill all the fields');
            }
            return new JsonResponse($data);
        }
        return view('admin.addUser');
    }

}