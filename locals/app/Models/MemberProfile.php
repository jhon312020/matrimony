<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberProfile extends Model {
	public $table = 'member_profile';

	public function member() {
        return $this->belongsTo('App\Models\Member');
    }

    public function religion() {
        return $this->belongsTo('App\Models\Religion');
    }

    public function caste() {
        return $this->belongsTo('App\Models\Caste');
    }

    public function status() {
        return $this->belongsTo('App\Models\Status');
    }

    public function graduations() {
        return $this->belongsTo('App\Models\Graduation');
    }

    public function star() {
        return $this->belongsTo('App\Models\Star');
    }

    public function moonsign() {
        return $this->belongsTo('App\Models\Moonsign');
    }

    public function zodiacsign() {
        return $this->belongsTo('App\Models\Zodiacsign');
    }
}