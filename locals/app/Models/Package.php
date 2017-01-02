<?php

namespace App\Models;
use Validator;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{

	public function validateFields($request) {
		$rules = [
            	'price'=> 'required|numeric',
            	'period'=> 'required|integer'
        	];
		if (isset($request['id'])) {
			$rules['name'] = 'required|unique:packages,name,'.$request["id"].'|max:255';
		} else {
			$rules['name'] = 'required|unique:packages|max:255';
		}
		
		$validator = Validator::make($request, 
			$rules,
        	[
        		'name.unique'=>'The package already exists!',
        		'price.numeric'=>'The period must be numeric',
        		'period.integer'=>'The no. of days must be an integer'
        	]
        	);
        return $validator;
	}
}