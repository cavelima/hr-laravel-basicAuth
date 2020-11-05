@extends('base')
@section('main')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Departments</h1>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>Department name</td>
          <td>Country name</td>
          <td>Region name</td>
        </tr>
    </thead>
    <tbody>
        @foreach($responseObjects as $responseObject)
        <tr>
            <td>{{$responseObject->department_name}}</td>
            <td>{{$responseObject->country_name}}</td>
            <td>{{$responseObject->region_name}}</td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection