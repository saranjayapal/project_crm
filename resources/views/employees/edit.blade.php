@extends('layouts.app')

@section('content')
<div class="container">
  <h4 class="heading">Update Employee</h4>
  @if ($errors->any())
     @foreach ($errors->all() as $error)
         <div class="alert alert-danger" role="alert">{{$error}}</div>
     @endforeach
 @endif
  <form id="employeeform" action="{{ route('employees_update',$employee->id) }}" method="POST" enctype="multipart/form-data">
  {{csrf_field()}}
 
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="employee_name">Firstname *</label>
      <input type="text" class="form-control" id="firstname" name="firstname" value="{{ $employee->firstname }}" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="lastname">Lastname *</label>
      <input type="text" class="form-control" id="lastname" name="lastname" value="{{ $employee->lastname }}" required="">
    </div>
  </div>
  <div class="form-row">
     <div class="col-md-4 mb-3">
      <label for="employee_name">Phone</label>
      <input type="text" class="form-control" id="phone" name="phone" value="{{ $employee->phone }}">
    </div>
    <div class="col-md-4 mb-3">
      <label for="website">Email</label>
      <input type="text" class="form-control" id="email" name="email" value="{{ $employee->email }}">
      </select>
    </div>
    </div>
    <div class="form-row">
   <div class="col-md-4 mb-3">
      <label for="company">Company</label>
      <select name="company" id="company" required>
        <option value="">Select Company</option>
        @foreach($companies as $company)
        <option value="{{ $company->id }}" 
          <?php if($company->id == $employee->company_id) echo "selected"; ?>

          >{{ $company->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="col-md-4 mb-3">
      
    </div>
     </div>
  <div class="form-group">
    
  <button class="btn btn-primary" type="submit">Save</button>
  <button class="btn btn-primary" type="submit" onClick="javascript:history.go(-1);">Cancel</button>
</form>
</div>
@endsection
