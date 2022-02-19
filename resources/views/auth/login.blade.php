@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <form id="login-form" method="POST" action="{{route('custom.login')}}">
                <h3 class="text-center mb-4">Login</h3>
                <div class="mb-3">
                  <label for="email" class="form-label">Email address</label>
                  <input type="email" name="email" class="form-control" id="email">
                  @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control" id="password">
                </div>
                <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                @csrf
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection