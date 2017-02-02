<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;


use App\Models\Setting;
use Session;
use Mail;
use Config;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    function init()
    {
      $settings = Setting::where('id',1)->first();
      $aboutUs = \DB::table('page_contents')->where('name','aboutUs')->first();
      $removeColumns = array('smtp_host','smtp_username','smtp_password');
      foreach ($removeColumns as $column) {
        unset($settings->{$column});
      }
      Session::put('settings',$settings);
      Session::put('aboutUs',$aboutUs);
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

    function _sendMail($template, $subject, $content, $to_email, $to_name = NULL, $cc = NULL) {
      $settings = Setting::where('id',1)->first();

      Config::set('mail.host',$settings->smtp_host);

      $transport = Mail::getSwiftMailer()->getTransport();

      $transport->setUsername($settings->smtp_username);

      $transport->setPassword($settings->smtp_password);

      Mail::send($template, ['content' => $content], function ($m) use ($settings, $content, $subject, $to_email, $to_name) {
            $m->from($settings->contact_us_email, 'Matrimony');

            $m->to($to_email)->subject($subject);
        });
    }
}
