<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Location
 * 
 * @property int $location_id
 * @property string|null $street_address
 * @property string|null $postal_code
 * @property string $city
 * @property string|null $state_province
 * @property string $country_id
 * 
 * @property Country $country
 * @property Collection|Department[] $departments
 *
 * @package App\Models
 */
class Location extends Model
{
	protected $table = 'locations';
	protected $primaryKey = 'location_id';
	public $timestamps = false;

	protected $fillable = [
		'street_address',
		'postal_code',
		'city',
		'state_province',
		'country_id'
	];

	public function country()
	{
		return $this->belongsTo(Country::class);
	}

	public function departments()
	{
		return $this->hasMany(Department::class);
	}
}
