@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                   @include('partials.status')
               
                    <form action="{{route('companies.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                              <label for="Name">Name</label>
                              <input type="text" class="form-control" id="Name" name="name" value="{{old('name')}}" aria-describedby="Name" placeholder="Enter Name">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" name="email" id="exampleInputEmail1" value="{{old('email')}}" aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="website">Website</label>
                                <input type="text" class="form-control" id="website" name="website" aria-describedby="website" value="{{old('website')}}" placeholder="Enter website">
                            </div>
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
