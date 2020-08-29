@extends('layouts.admin')
@section('title', 'Add an Admin Bank Details for payments')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-6">
            <div class="card">
                <div class="card-header bg-2 text-center">Add a new Admin Bank Details</div>
                <div class="card-body">
                    <form action="{{ route('storeAdminBankDetails') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="account_name">Account Name</label>
                            <input id="account_name" class="form-control" type="text" name="account_name">
                            @error('account_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="account_number">Account Number</label>
                            <input id="account_number" class="form-control" type="text" name="account_number">
                            @error('account_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="bank_name">Bank Name</label>
                            <input id="bank_name" class="form-control" type="text" name="bank_name">
                            @error('bank_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input id="phone" class="form-control" type="text" name="phone">
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn bg-2 btn-block">Create Admin Account</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
