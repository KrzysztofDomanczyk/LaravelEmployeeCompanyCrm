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
                            <div class=" pb-3"><strong>Name:</strong> {{$company->name}}</div>
                            <div class=" pb-3"><strong>Email:</strong> {{$company->email}}</div>
                            <div class=" pb-1"><strong>Website:</strong> {{$company->website}}</div>
                            <div class=" pb-3"><strong> <img class="img-fluid" src="{{asset("storage/logos/$company->logo")}}" alt=""></strong></div>
                            <ul class="list-group ml-5">
                                <strong>
                                        Employees:
                                </strong>
                                    @foreach($company->employees as $employee)
                                    <li class="list-group-item">{{$employee->firstName}} {{$employee->lastName}} </li>
                                    @endforeach
                                </ul>
                            <div class=" pt-3 pb-3">
                                <a href="{{route('companies.edit', ['company' => $company->id])}}" class="btn btn-secondary">Edit</a>
                                <form action="{{route('companies.destroy', ['company' => $company->id])}}" method="POST" class="d-inline">
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
