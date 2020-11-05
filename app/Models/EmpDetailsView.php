<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EmpDetailsView
 * 
 * @property int $employee_id
 * @property string $job_id
 * @property int|null $manager_id
 * @property int|null $department_id
 * @property int|null $location_id
 * @property string $country_id
 * @property string|null $first_name
 * @property string $last_name
 * @property float $salary
 * @property float|null $commission_pct
 * @property string $department_name
 * @property string $job_title
 * @property string $city
 * @property string|null $state_province
 * @property string|null $country_name
 * @property string|null $region_name
 *
 * @package App\Models
 */
class EmpDetailsView extends Model
{
	protected $table = 'emp_details_view';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'employee_id' => 'int',
		'manager_id' => 'int',
		'department_id' => 'int',
		'location_id' => 'int',
		'salary' => 'float',
		'commission_pct' => 'float'
	];

	protected $fillable = [
		'employee_id',
		'job_id',
		'manager_id',
		'department_id',
		'location_id',
		'country_id',
		'first_name',
		'last_name',
		'salary',
		'commission_pct',
		'department_name',
		'job_title',
		'city',
		'state_province',
		'country_name',
		'region_name'
	];
}
