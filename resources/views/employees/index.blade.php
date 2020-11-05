@extends('base')
@section('main')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Employees</h1>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td>Email</td>
          <td>Phone Number</td>
          <td>Hire date</td>
          <td>Job Id</td>
          <td>Salary</td>
          <td>Commission pct </td>
          <td>Manager Id </td>
          <td>Department id</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($employees as $employee)
        <tr>
            <td>{{$employee->employee_id}}</td>
            <td>{{$employee->first_name}} {{$employee->last_name}}</td>
            <td>{{$employee->email}}</td>
            <td>{{$employee->phone_date}}</td>
            <td>{{$employee->hire_date}}</td>
            <td>{{$employee->job_id}}</td>
            <td>{{$employee->salary}}</td>
            <td>{{$employee->commission_pct}}</td>
            <td>{{$employee->manager_id}}</td>
            <td>{{$employee->department_id}}</td>
            <td>
                <a href="{{ route('employees.edit',$employee->employee_id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('employees.destroy', $employee->employee_id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
<div class="col-sm-12">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
</div>
<div>
    <a style="margin: 19px;" href="{{ route('employees.create')}}" class="btn btn-primary">New employee</a>
</div>
@endsection