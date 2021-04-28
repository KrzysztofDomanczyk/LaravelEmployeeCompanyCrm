@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class=" pb-1"><strong>First name:</strong> {{$employee->firstName}}</div>
                            <div class=" pb-1"><strong>Last name:</strong> {{$employee->lastName}}</div>
                            <div class=" pb-1"><strong>Email:</strong> {{$employee->email}}</div>
                            <div class=" pb-1"><strong>Phone:</strong> {{$employee->phone}}</div>
                            <div class=" pb-1"><strong>Company:</strong> {{$employee->company->name}}</div>
                            
                           
                            <div class=" pt-3 pb-3">
                                <a href="{{route('employees.edit', ['employee' => $employee->id])}}" class="btn btn-secondary">Edit</a>
                                <form action="{{route('employees.destroy', ['employee' => $employee->id])}}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                            Delete
                                    </button>
                                </form>
                            </div>
                   
                        </li>
               
                      </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
