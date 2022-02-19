@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <form method="POST" action="{{route('custom.registration')}}" id="registration-form">
                <h3 class="text-center mb-4">Register</h3>
                <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" name="name" class="form-control" id="name" value="{{old('name')}}">
                  @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email address</label>
                  <input type="email" name="email" class="form-control" id="email" value="{{old('email')}}">
                  @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control" id="password" value="{{old('password')}}">
                  @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="mb-3">
                  <label for="password-confirmation" class="form-label">Password</label>
                  <input type="password" name="password_confirmation" class="form-control" id="password-confirmation">
                  @error('password_confirmation') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                @csrf
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection