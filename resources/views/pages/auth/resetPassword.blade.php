@extends('pages.layouts.layout')

@section('title', 'Reset Password - Sinergi Studio')

@section('main')

<div class="flex flex-col items-center justify-center h-screen px-4 2xl:px-0">
    <div class="card w-full max-w-md 2xl:max-w-lg bg-white/20 backdrop-blur-lg shadow-lg p-6 rounded-lg">
        <h2 class="text-2xl 2xl:text-4xl font-bold text-center mb-6">Reset Password</h2>
        <div id="alertContainer" class="mb-4">
            
        </div>
        <form id="resetPasswordForm" class="space-y-4">
            <input type="hidden" id="token" name="token" value="">
            <input type="hidden" id="email" name="email" value="">
            
            
            <div class="form-control">
                <label class="label" for="password">
                    <span class="label-text text-sm 2xl:text-lg">New Password</span>
                </label>
                <input type="password" id="password" name="password" class="input input-bordered w-full text-sm 2xl:text-lg"
                    placeholder="Enter your new password" required />
            </div>

            
            <div class="form-control">
                <label class="label" for="password_confirmation">
                    <span class="label-text text-sm 2xl:text-lg">Confirm Password</span>
                </label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="input input-bordered w-full text-sm 2xl:text-lg"
                    placeholder="Confirm your new password" required />
            </div>

            
            <button type="submit" class="btn btn-primary w-full mt-4 text-sm 2xl:text-lg">
                Reset Password
            </button>
        </form>

        <p class="text-center mt-4 text-xs 2xl:text-lg">
            Remember your password?
            <a href="/login" class="text-blue-500 hover:underline">Back to Login</a>
        </p>    
    </div>
</div>

<meta name="csrf-token" content="{{ csrf_token() }}">
@include('api.resetPasswordPost')

@endsection
