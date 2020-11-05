@extends('base')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add an employee</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('employees.store') }}">
          @csrf
          <div class="form-group">    
              <label for="employee_id">Employee ID:</label>
              <input type="number" class="form-control" name="employee_id"/>
          </div>

          <div class="form-group">    
              <label for="first_name">First Name:</label>
              <input type="text" class="form-control" name="first_name"/>
          </div>

          <div class="form-group">
              <label for="last_name">Last Name:</label>
              <input type="text" class="form-control" name="last_name"/>
          </div>

          <div class="form-group">
              <label for="email">Email:</label>
              <input type="text" class="form-control" name="email"/>
          </div>
          <div class="form-group">
              <label for="phone_number">Phone number:</label>
              <input type="text" class="form-control" name="phone_number"/>
          </div>
          <div class="form-group">
              <label for="hire_date">Hire date:</label>
              <input type="text" class="form-control" name="hire_date"/>
          </div>
          <div class="form-group">
              <label for="job_id">Job Id:</label>
              <input type="text" class="form-control" name="job_id"/>
          </div>        
          <div class="form-group">
              <label for="salary">Salary:</label>
              <input type="text" class="form-control" name="salary"/>
          </div>
          <div class="form-group">
              <label for="commission_pct">Commission Pct:</label>
              <input type="text" class="form-control" name="commission_pct"/>
          </div>        
          <div class="form-group">
              <label for="manager_id">Manager Id:</label>
              <input type="text" class="form-control" name="manager_id"/>
          </div>        
          <div class="form-group">
              <label for="department_id">Department Id:</label>
              <input type="text" class="form-control" name="department_id"/>
          </div>                 
          <button type="submit" class="btn btn-primary-outline">Add employee</button>
      </form>
  </div>
</div>
</div>
@endsection