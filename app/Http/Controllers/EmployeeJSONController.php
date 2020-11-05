<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Employee;
use Facade\FlareClient\Http\Response;

class EmployeeJSONController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Employee::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'hire_date' => 'required',
            'job_id' => 'required',
            'salary' => 'required',
        ]);

        $employee = new Employee([
            'employee_id' => $request->get('employee_id'),
            'first_name' => $request->get('first_name', null),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'phone_number' => $request->get('phone_number', null),
            'hire_date' => $request->get('hire_date'),
            'job_id' => $request->get('job_id'),
            'salary' => $request->get('salary'),
            'commission_pct' => $request->get('commission_pct', null),
            'manager_id' => $request->get('manager_id', null),
            'department_id' => $request->get('department_id', null)
        ]);
        
        $employee->save();
        return Response('Employee saved: ' . $employee);
    } 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);
        return $employee ?? 'Employee not found'; 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        {
            $request->validate([
                'last_name' => 'required',
                'email' => 'required',
                'hire_date' => 'required',
                'job_id' => 'required',
                'salary' => 'required',
            ]);

            $employee = Employee::find($id);

            if (empty($employee)) {
                return 'Employee not found';
            }

            $employee->first_name = $request->get('first_name');
            $employee->last_name = $request->get('last_name');
            $employee->email = $request->get('email');
            $employee->phone_number = $request->get('phone_number');
            $employee->hire_date = $request->get('hire_date');
            $employee->job_id = $request->get('job_id');
            $employee->salary = $request->get('salary');
            $employee->commission_pct = $request->get('commission_pct');
            $employee->manager_id = $request->get('manager_id');
            $employee->department_id = $request->get('department_id');

            $employee->save();
            
            return Response('Employee updated');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        {
            $employee = Employee::find($id);
            $employee->delete();
            return Response('Employee deleted');
        }
    }
}
