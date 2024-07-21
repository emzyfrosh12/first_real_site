@extends('layouts.auth')
@section('content')
    <h4>login</h4>
    <h6 class="font-weight-light">login to access the full features</h6>
    <form action="{{ route('login') }}" method="POST" class="pt-3">
        @csrf

        <div class="error">
            {{-- @if ($error->any())--}}
                
            
            @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
            @endforeach
        </div>

        <div class="form-group">
            <input type="text" class="form-control form-control-lg" name="email" id="exampleInputUsername1"
                placeholder="Username">
        </div>

        <div class="form-group">
            <input type="password" class="form-control form-control-lg" name="password" id="exampleInputPassword1"
                placeholder="Password">
        </div>

        <div class="mt-3 d-grid gap-2">
            <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">LOG IN </button>
        </div>

        <div>
            <div class="text-center mt-4 font-weight-light"> <a href="{{route ('password.request')}}" class="text-primary">Forgotten
                    Passowrd?</a>

            </div>

            <div class="text-center mt-4 font-weight-light"> Don't have an account? <a href="{{route ('register')}}"
                    class="text-primary">Register</a>
            </div>
    </form>
@endsection
