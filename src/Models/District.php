<?php

namespace Laralum\Addresses\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'laralum_addresses_districts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'city_id',
        'state_id',
    ];

}
