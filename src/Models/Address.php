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

    public static function buildCreate($address) {
        $state = State::firstOrCreate([
            'name' => $address['state'],
        ]);
        $city = City::firstOrCreate([
            'name' => $address['city'],
            'state_id' => $state->id,
        ]);
        $neighborhood = Neighborhood::firstOrCreate([
            'name' => $address['neighborhood'],
            'city_id' => $city->id,
            'state_id' => $state->id,
        ]);
        return static::firstOrCreate([
            'street' => $address['street'],
            'number' => $address['number'],
            'state_id' => $state->id,
            'city_id' => $city->id,
            'neighborhood_id' => $neighborhood->id,
        ]);
    }

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
