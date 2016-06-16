@extends('layouts.master')

@section('title')
    welcome
@endsection

@section('content')
    @if(count($errors) > 0)
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <h3>Error</h3>
                <ul>
                    @foreach( $errors->all() as $error )
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    @if(count($errors) == 0)
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <h3>No Error</h3>
        </div>
    @endif
    <div class="row">
        <div class="col-md-6 col-lg-6">
            <h3>Sign Up Form</h3>
            <form action="{{ route('signup') }}" method="POST">
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email">Your Email</label>
                    <input class="form-control" type="text" name="email" id="email" 
                    value="{{ Request::old('email') }}">
                </div>
                <div class="form-group">
                    <label for="first_name">Your First Name</label>
                    <input class="form-control" type="text" name="first_name" id="first_name" 
                    value="{{ Request::old('first_name') }}">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                <button class="btn btn-primary" type="submit" id="sign up">Sign Up</button>
                <input type="hidden" name="_token"  value="{{ csrf_token() }}">
            </form>
        </div>
        <div class="col-md-6 col-lg-6">
            <h3>Log In</h3>
            <form action="{{ route('signin') }}" method="POST">
                <div class="form-group">
                    <label for="email">Your Email</label>
                    <input class="form-control" type="text" name="email" id="email" 
                    value="{{ Request::old('email') }}">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                <button class="btn btn-primary" type="submit" id="log in">Log In</button>
                <input type="hidden" name="_token"  value="{{ csrf_token() }}">
            </form>
        </div>
    </div>
@endsection