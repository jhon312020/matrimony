<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\User;
use App\Models\Page;
use App\Models\RolePermission;
use Session;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{

    /**
     * Create instances of the reservation controller
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin',['except'=>'authenticate']);
    }

    public function authenticate(Request $request) {
        if (Auth::guard('admin')->check() == true) {
            return redirect('admin/dashboard');
        }
        $errorMessage = '';
        if ($request->isMethod('post')) {
            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password, 'is_active'=>1])) {
                $role_id = Auth::guard('admin')->user()->role_id;
                if ($role_id != 1) {
                    $actionIds = RolePermission::where('role_id',$role_id)->first();
                    $actionIds = explode(',', $actionIds->permissions);
                    $pages = Page::whereIn('id',$actionIds)->lists('action','action')->toArray();
                    Session::put('role_permission',$pages);
                } else {
                    $pages = Page::lists('action','action')->toArray();
                    Session::put('role_permission',$pages);
                }
                Session::put('role_id',$role_id);
                return redirect('admin/dashboard');
            } else {
                $errorMessage = 'Invalid Username/Password';
            }
        }
        return view('admin.adminlogin', array('errorMessage'=>$errorMessage));
    }

    public function logout() {
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }

}