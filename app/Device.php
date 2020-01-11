<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'device_type',
        'serial_number',
        'asset_number', // NOT TO BE CONFUSED WITH THE ASSET THAT IS ON THIS SYSTEMS
        'device_status',
        'comments',
        'telephone_number',
        'user_id',
    ];

    public function user() {
        
        return $this->belongsTo('App\EndUser', 'user_id');
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
                'device_type' => 'required',
                'serial_number' => 'required',
                'asset_number' => 'required',
                'device_status' => 'required',
                'comments' => 'required',
                'telephone_number' => 'required',
                'user_id' => 'required|exists:end_users,id',
            ],
            $merge);
    }
}
