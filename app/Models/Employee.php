<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Employee
 * 
 * @property int $employee_id
 * @property string|null $first_name
 * @property string $last_name
 * @property string $email
 * @property string|null $phone_number
 * @property Carbon $hire_date
 * @property string $job_id
 * @property float $salary
 * @property float|null $commission_pct
 * @property int|null $manager_id
 * @property int|null $department_id
 * 
 * @property Job $job
 * @property Department|null $department
 * @property Employee|null $employee
 * @property Collection|Department[] $departments
 * @property Collection|Employee[] $employees
 * @property Collection|JobHistory[] $job_histories
 *
 * @package App\Models
 */
class Employee extends Model
{
	protected $table = 'employees';
	protected $primaryKey = 'employee_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'employee_id' => 'int',
		'salary' => 'float',
		'commission_pct' => 'float',
		'manager_id' => 'int',
		'department_id' => 'int'
	];

	protected $dates = [
		'hire_date'
	];

	protected $fillable = [
		'employee_id',
		'first_name',
		'last_name',
		'email',
		'phone_number',
		'hire_date',
		'job_id',
		'salary',
		'commission_pct',
		'manager_id',
		'department_id'
	];

	public function job()
	{
		return $this->belongsTo(Job::class);
	}

	public function department()
	{
		return $this->belongsTo(Department::class);
	}

	public function employee()
	{
		return $this->belongsTo(Employee::class, 'manager_id');
	}

	public function departments()
	{
		return $this->hasMany(Department::class, 'manager_id');
	}

	public function employees()
	{
		return $this->hasMany(Employee::class, 'manager_id');
	}

	public function job_histories()
	{
		return $this->hasMany(JobHistory::class);
	}
}
