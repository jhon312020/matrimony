<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\User;

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