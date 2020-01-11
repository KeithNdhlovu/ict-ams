<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EndUser extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'company_id',
        'department_name',
        'employment_status',
        'user_id',
    ];

    public function user() {
        
        return $this->belongsTo('EndUser', 'user_id');
    }

    public function company() {
        
        return $this->belongsTo('App\Company');
    }
}
