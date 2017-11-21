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
        'district_id',
        'zip_code',
        'street',
        'number',
        'address_line1',
        'address_line2',
    ];

    public static function buildCreate($address) {
        $state = State::firstOrCreate([
            'name' => $address['state'],
        ]);
        $city = City::firstOrCreate([
            'name' => $address['city'],
            'state_id' => $state->id,
        ]);

        $insert = [
            'zip_code' => $address['zip_code'],
            'state_id' => $state->id,
            'city_id' => $city->id,
        ];

        if(isset($address['district'])) {
            $district = District::firstOrCreate([
                'name' => $address['district'],
                'city_id' => $city->id,
                'state_id' => $state->id,
            ]);
            $insert['district_id'] = $district->id;
        }

        if(isset($address['street'])) $insert['street'] = $address['street'];
        if(isset($address['number'])) $insert['number'] = $address['number'];

        if(isset($address['address_line1'])) $insert['address_line1'] = $address['address_line1'];
        if(isset($address['address_line2'])) $insert['address_line2'] = $address['address_line2'];

        return static::firstOrCreate($insert);
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
     * Get district.
     */
    public function district()
    {
        return $this->belongsTo('Laralum\Addresses\Models\District');
    }

}
