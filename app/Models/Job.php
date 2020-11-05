<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Job
 * 
 * @property string $job_id
 * @property string $job_title
 * @property float|null $min_salary
 * @property float|null $max_salary
 * 
 * @property Collection|Employee[] $employees
 * @property Collection|JobHistory[] $job_histories
 *
 * @package App\Models
 */
class Job extends Model
{
	protected $table = 'jobs';
	protected $primaryKey = 'job_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'min_salary' => 'float',
		'max_salary' => 'float'
	];

	protected $fillable = [
		'job_title',
		'min_salary',
		'max_salary'
	];

	public function employees()
	{
		return $this->hasMany(Employee::class);
	}

	public function job_histories()
	{
		return $this->hasMany(JobHistory::class);
	}
}
