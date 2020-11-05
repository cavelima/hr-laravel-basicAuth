<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Country
 * 
 * @property string $country_id
 * @property string|null $country_name
 * @property int $region_id
 * 
 * @property Region $region
 * @property Collection|Location[] $locations
 *
 * @package App\Models
 */
class Country extends Model
{
	protected $table = 'countries';
	protected $primaryKey = 'country_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'region_id' => 'int'
	];

	protected $fillable = [
		'country_name',
		'region_id'
	];

	public function region()
	{
		return $this->belongsTo(Region::class);
	}

	public function locations()
	{
		return $this->hasMany(Location::class);
	}
}
