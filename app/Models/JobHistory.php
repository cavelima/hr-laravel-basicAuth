<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class JobHistory
 * 
 * @property int $employee_id
 * @property Carbon $start_date
 * @property Carbon $end_date
 * @property string $job_id
 * @property int $department_id
 * 
 * @property Employee $employee
 * @property Job $job
 * @property Department $department
 *
 * @package App\Models
 */
class JobHistory extends Model
{
	protected $table = 'job_history';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'employee_id' => 'int',
		'department_id' => 'int'
	];

	protected $dates = [
		'start_date',
		'end_date'
	];

	protected $fillable = [
		'end_date',
		'job_id',
		'department_id'
	];

	public function employee()
	{
		return $this->belongsTo(Employee::class);
	}

	public function job()
	{
		return $this->belongsTo(Job::class);
	}

	public function department()
	{
		return $this->belongsTo(Department::class);
	}
}
