@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm rounded">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">Registration Successful</h4>
        </div>
        <div class="card-body">
            <div class="text-center">
                <i class="bi bi-check-circle" style="font-size: 4rem; color: #28a745;"></i>
                <h5 class="mt-3">Your registration was successful!</h5>
                <p class="text-muted">Please wait for the admin to assign a role to your account.</p>
                <a href="{{ route('login') }}" class="btn btn-success mt-3">Back to Login</a>
            </div>
        </div>
    </div>
</div>
@endsection
