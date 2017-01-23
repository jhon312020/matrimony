<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

use App\Models\Setting;
use Session;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    function init()
    {
      $settings = Setting::where('id',1)->first();
      $removeColumns = array('smtp_host','smtp_username','smtp_password');
      foreach ($removeColumns as $column) {
        unset($settings->{$column});
      }
        Session::put('settings',$settings);
    }

    function validateFields($request,$fields) {
      foreach ($fields as $field) {
        if (($request->has($field) && trim($request->$field)) == false) {
          return false;
        }
      }
      return true;
    }

    function generateRandomString($length = 10) {
      return substr(str_shuffle(str_repeat($x='123456789ABCDEFGHIJKLMNPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }
}
