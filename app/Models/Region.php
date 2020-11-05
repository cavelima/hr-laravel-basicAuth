<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Region
 * 
 * @property int $region_id
 * @property string|null $region_name
 * 
 * @property Collection|Country[] $countries
 *
 * @package App\Models
 */
class Region extends Model
{
	protected $table = 'regions';
	protected $primaryKey = 'region_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'region_id' => 'int'
	];

	protected $fillable = [
		'region_name'
	];

	public function countries()
	{
		return $this->hasMany(Country::class);
	}
}
