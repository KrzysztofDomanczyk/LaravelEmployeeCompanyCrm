@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                   @include('partials.status')
               
                    <form action="{{route('employees.update', ['employee' => $employee->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                                <label for="firstName">FirstName</label>
                                <input type="text" class="form-control" id="firstName" name="firstName" value="{{$employee->firstName}}" aria-describedby="firstName" placeholder="Enter firstName">
                            </div>
                            <div class="form-group">
                              <label for="lastName">LastName</label>
                              <input type="text" class="form-control" id="lastName" name="lastName" value="{{$employee->lastName}}" aria-describedby="lastName" placeholder="Enter lastName">
                            </div>
                            <div class="form-group">
                              <label for="phone">Phone</label>
                              <input type="text" class="form-control" id="phone" name="phone" value="{{$employee->phone}}" aria-describedby="phone" placeholder="Enter phone">
                            </div>
                            <div class="form-group">
                                  <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" name="email" id="exampleInputEmail1" value="{{$employee->email}}" aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                    <label for="exampleInputEmail1">Company</label>
                                    <select class="form-control form-control-sm" name="company">
                                        @foreach ($companies as $company)
                                        <option value="{{$company->id}}">{{$company->name}}</option>
                                        @endforeach
                                    </select>
                            </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
