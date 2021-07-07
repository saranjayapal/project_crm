@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Companies</h4>
    @if(session('successMsg'))
    <div class="alert alert-success" role="alert">
        {{ session('successMsg') }}
    </div>
    @endif
    
    <p><a href="{{ route('companies_create') }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Add New</a></p>
    

<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Website</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($companies as $company)
    <tr>
      <td scope="row">{{ ($companies->currentpage()-1) * $companies->perpage() + $loop->index + 1 }}</td>
      <td>{{ $company->name }}</td>
      <td>{{ $company->email }}</td>
      <td>{{ $company->website }}</td>
      <td><a class="btn btn-primary btn-raised btn-sm" href=" {{ route('companies_edit',$company->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
      |     
      <form method="POST" id="delete_{{$company->id}}" action = " {{ route('companies_delete',$company->id) }}" style="display:none">
        {{ csrf_field() }}
        {{ method_field('post') }}
      
    </form>
        <button onclick="if(confirm('Are you sure to delete the company? All the associated employees will also be deleted.')) {
        event.preventDefault();
        document.getElementById('delete_{{$company->id}}').submit();
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

{{ $companies->links() }}

</div>
@endsection
