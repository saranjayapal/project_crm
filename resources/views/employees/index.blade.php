@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Employees</h4>
    @if(session('successMsg'))
    <div class="alert alert-success" role="alert">
        {{ session('successMsg') }}
    </div>
    @endif
    
    <p><a href="{{ route('employees_create') }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Add New</a></p>
    

<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Company</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($employees as $employee)
    <tr>
      <td scope="row">{{ ($employees->currentpage()-1) * $employees->perpage() + $loop->index + 1 }}</td>
      <td>{{ $employee->firstname }}</td>
      <td>{{ $employee->lastname }}</td>
      <td>{{ $employee->company_name }}</td>
      <td>{{ $employee->email }}</td>
      <td>{{ $employee->phone }}</td>
      <td><a class="btn btn-primary btn-raised btn-sm" href=" {{ route('employees_edit',$employee->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
      |     
      <form method="POST" id="delete_{{$employee->id}}" action = " {{ route('employees_delete',$employee->id) }}" style="display:none">
       
        {{ csrf_field() }}
        {{ method_field('post') }}
      
    </form>
        <button onclick="if(confirm('Are you sure to delete the employee?')) {
        event.preventDefault();
        document.getElementById('delete_{{$employee->id}}').submit();
      }
      else
      {
        event.preventDefault();

      }" class="btn btn-danger btn-raised btn-sm" href=" "><i class="fa fa-trash" aria-hidden="true"></i>
        </button>
      </td>
      <td></td>
    </tr>
    @endforeach

   
  </tbody>
</table>

{{ $employees->links() }}

</div>
@endsection
