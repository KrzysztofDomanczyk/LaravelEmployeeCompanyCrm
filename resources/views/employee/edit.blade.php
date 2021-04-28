@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                   @include('partials.status')
               
                    <form action="{{route('companies.update', ['company' => $company->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                            <div class="form-group">
                              <label for="Name">Name</label>
                            <input type="text" class="form-control" id="Name" value="{{$company->name}}"name="name" aria-describedby="Name" placeholder="Enter Name">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" name="email" id="exampleInputEmail1" value="{{$company->email}}" aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="website">Website</label>
                                <input type="text" class="form-control" id="website" name="website" value="{{$company->website}}" aria-describedby="website" placeholder="Enter website">
                            </div>
                            <form>
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Logo (100x100 px)</label>
                                    <input type="file" multiple accept="image/*" name="logo" value="{{old('logo')}}" class="form-control-file" id="exampleFormControlFile1">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
