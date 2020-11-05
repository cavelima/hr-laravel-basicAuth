<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Department
 * 
 * @property int $department_id
 * @property string $department_name
 * @property int|null $manager_id
 * @property int|null $location_id
 * 
 * @property Location|null $location
 * @property Employee|null $employee
 * @property Collection|Employee[] $employees
 * @property Collection|JobHistory[] $job_histories
 *
 * @package App\Models
 */
class Department extends Model
{
	protected $table = 'departments';
	protected $primaryKey = 'department_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'department_id' => 'int',
		'manager_id' => 'int',
		'location_id' => 'int'
	];

	protected $fillable = [
		'department_name',
		'manager_id',
		'location_id'
	];

	public function location()
	{
		return $this->belongsTo(Location::class);
	}

	public function employee()
	{
		return $this->belongsTo(Employee::class, 'manager_id');
	}

	public function employees()
	{
		return $this->hasMany(Employee::class);
	}

	public function job_histories()
	{
		return $this->hasMany(JobHistory::class);
	}
}
