@extends('layouts.app')
 
@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Register</div>
                <div class="card-body">
     <form method = 'post' action = "{{action('RegistrationController@store')}}" >
        {{ csrf_field() }}
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
            <div class="col-md-6">
            <input type="text" class="form-control" id="name" name="name">
        </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
            <div class="col-md-6">
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required autocomplete="email">
            @error('email')
             <span class="invalid-feedback" role="alert">
             <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
                        </div>
        
        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
            <div class="col-md-6">
            <input type="password" class="form-control" id="password" name="password">
        </div>
        </div>
        <div class="form-group row">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
             <div class="col-md-6">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
             </div>
          </div>
          <div class="form-group row">
            <label for="organization" class="col-md-4 col-form-label text-md-right">Organization name</label>
             <div class="col-md-6">
            <input type="text" class="form-control" id="organization" name="organization">
        </div>
          </div>
          <div class="form-group row">
            <label for="code" class="col-md-4 col-form-label text-md-right">Code</label>
             <div class="col-md-6">
            <input type="text" class="form-control" id="code" name="code">
        </div>
          </div>
        <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button style="cursor:pointer" type="submit" class="btn btn-primary">register</button>
        </div>
       </div>
       </div>
            </div>
        </div>
    </div>
</div>
    </form>
 
@endsection