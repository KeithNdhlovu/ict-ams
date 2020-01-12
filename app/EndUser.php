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
    ];

    public function company() {
        
        return $this->belongsTo('App\Company');
    }

    /**
     * Get a validator for an incoming request.
     *
     * @param array $data
     *
     * @return array
     */
    public static function createRules($id = 0, $merge = [])
    {
        return array_merge(
            [
                'first_name' => 'required',
                'last_name' => 'required',
                'department_name' => 'required',
                'employment_status' => 'required',
                'company_id' => 'required|exists:companies,id',
            ],
            $merge);
    }
}
