@extends('layouts.admin')
@section('title', 'Change Password')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-6">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Change your password</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('storePassword') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input id="password" class="form-control" type="password" name="password">
                            @error('password')
                            <li class="text-danger">{{ $message }}</li>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input id="password_confirmation" class="form-control" type="password"
                                name="password_confirmation">
                            @error('password_confirmation')
                            <li class="text-danger">{{ $message }}</li>
                            @enderror
                        </div>
                        <input type="submit" value="Reset Password" class="btn btn-primary btn-block">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
