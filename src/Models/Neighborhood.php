<?php

namespace Laralum\Addresses\Models;

use Illuminate\Database\Eloquent\Model;

class Neighborhood extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'laralum_addresses_neighborhood';

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
