@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">{{ __('Dashboard') }}<a href="{{route('employees.create')}}"  class="ml-4 btn btn-success">Create employee</a></div>
                <div class="card-body">
                    @include('partials.status')
                    <ul class="list-group">

                       @foreach($employees as $employee)
                        <li class="list-group-item">
                            <div class=" pb-3"><strong>{{$employee->firstName}} {{$employee->lastName}} </strong></div>
                            <div class=" pb-3">
                                <a href="{{route('employees.show', ['employee' => $employee->id])}}" class="btn btn-primary">show</a>
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
                       @endforeach
                      </ul>
                      <div class="pt-4">
                            {{ $employees->links() }}
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
