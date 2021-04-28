@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">{{ __('Dashboard') }}<a href="{{route('companies.create')}}"  class="ml-4 btn btn-success">Create company</a></div>
                <div class="card-body">
                    @include('partials.status')
                    <ul class="list-group">

                       @foreach($companies as $company)
                        <li class="list-group-item">
                            <div class=" pb-3"><strong>{{$company->name}}</strong></div>
                            <div class=" pb-3">
                                <a href="{{route('companies.show', ['company' => $company->id])}}" class="btn btn-primary">show</a>
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
                       @endforeach
                      </ul>
                      <div class="pt-4">
                            {{ $companies->links() }}
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
