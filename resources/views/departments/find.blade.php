@extends('base')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Find departments</h1>
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
      <form method="post" action="{{ route('departments.find') }}">
          @csrf
          <div class="form-group">    
              <label for="region_name">Region name:</label>
              <input type="text" class="form-control" name="region_name"/>
          </div>

          <div class="form-group">    
              <label for="country_name">Country Name:</label>
              <input type="text" class="form-control" name="country_name"/>
          </div>
          <button type="submit" class="btn btn-primary-outline">Find departments</button>
      </form>
  </div>
</div>
</div>
@endsection