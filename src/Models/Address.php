<?php

namespace Laralum\Addresses\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'laralum_addresses_address';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'state_id',
        'city_id',
        'neighborhood_id',
        'street',
        'number'
    ];

    /**
     * Get state.
     */
    public function state()
    {
        return $this->belongsTo('Laralum\Addresses\Models\State');
    }

    /**
     * Get city.
     */
    public function city()
    {
        return $this->belongsTo('Laralum\Addresses\Models\City');
    }

    /**
     * Get neighborhood.
     */
    public function neighborhood()
    {
        return $this->belongsTo('Laralum\Addresses\Models\Neighborhood');
    }

}
