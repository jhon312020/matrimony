<?php

namespace App\Models;
use Validator;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable
{
	public function validateFields($request) {
		$rules = [];
		if (isset($request['id'])) {
			$rules['username'] = 'unique:members,username,'.$request["id"];
			$rules['email'] = 'emaiil|unique:members,email,'.$request["id"];
			$rules['phone_number'] = 'unique:members,phone_number,'.$request["id"];
		} else {
			$rules['username'] = 'unique:members';
			$rules['email'] = 'email|unique:members';
			$rules['phone_number'] = 'unique:members';
		}
		
		$validator = Validator::make($request, 
			$rules,
        	[
        		'username.unique'=>'The username already exists!',
        		'email.unique'=>'The email already exists!',
        		'email.email'=>'Kindly check the email address!',
        		'phone_number.unique'=>'The phone number already exists!',
        	]
        	);
        return $validator;
	}

	
}