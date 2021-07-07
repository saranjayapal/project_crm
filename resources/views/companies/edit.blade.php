
@extends('layouts.app')

@section('content')
<div class="container">
  <h4 class="heading">Update Company</h4>
  @if ($errors->any())
     @foreach ($errors->all() as $error)
         <div class="alert alert-danger" role="alert">{{$error}}</div>
     @endforeach
 @endif
  <form id="companyform" action="{{ route('companies_update',$company->id) }}" method="POST" enctype="multipart/form-data">
  {{csrf_field()}}
 
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="company_name">Name *</label>
      <input type="text" class="form-control" id="name" name="name" value="{{ $company->name }}" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="email">Email</label>
      <input type="text" class="form-control" id="email" name="email" value="{{ $company->email }}" >
    </div>
     </div>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="logo">Logo</label>
      <input type="file" class="form-control" name="logo" id="logo" value="{{ $company->logo }}"><br>
      @if(!is_null($company->logo))
      <img class="img-thumbnail" src="{{ asset('public/storage/'.$company->logo) }}" />
      @endif
    </div>
    <div class="col-md-4 mb-3">
      <label for="website">Website</label>
      
      <input type="text" class="form-control" id="website" name="website" value="{{ $company->website }}">
      </select>
    </div>
    </div>
  <div class="form-group">
    
  <button class="btn btn-primary" type="submit">Save</button>
  <button class="btn btn-primary" type="submit" onClick="javascript:history.go(-1);">Cancel</button>
</form>
</div>
@endsection
