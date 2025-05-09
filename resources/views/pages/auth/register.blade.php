@extends('pages.layouts.layout')

@section('title', 'Register - Sinergi Studio')

@section('main')
<div class="flex flex-col items-center justify-center h-screen px-4 2xl:px-0">
    <div class="card w-full max-w-md 2xl:max-w-lg bg-white/20 backdrop-blur-lg shadow-lg p-6 rounded-lg">
        <h2 class="text-2xl 2xl:text-4xl font-bold text-center mb-6">Register</h2>
        <div id="alertContainer" class="mb-4"></div>
        <form id="registerForm" class="space-y-4">
            
            <!-- Input Name -->
            <div class="form-control">
                <label class="label" for="name">
                    <span class="label-text text-sm 2xl:text-lg">Name</span>
                </label>
                <input type="text" id="name" name="name" class="input input-bordered w-full text-sm 2xl:text-lg"
                    placeholder="Enter your name" required>
            </div>

            <!-- Input Email -->
            <div class="form-control">
                <label class="label" for="email">
                    <span class="label-text text-sm 2xl:text-lg">Email</span>
                </label>
                <input type="email" id="email" name="email" class="input input-bordered w-full text-sm 2xl:text-lg"
                    placeholder="Enter your email" required>
            </div>

            <!-- Input Password -->
            <div class="form-control">
                <label class="label" for="password">
                    <span class="label-text text-sm 2xl:text-lg">Password</span>
                </label>
                <input type="password" id="password" name="password" class="input input-bordered w-full text-sm 2xl:text-lg"
                    placeholder="Enter your password" required>
            </div>

            <!-- Input Password Confirmation -->
            <div class="form-control">
                <label class="label" for="password_confirmation">
                    <span class="label-text text-sm 2xl:text-lg">Confirm Password</span>
                </label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                    class="input input-bordered w-full text-sm 2xl:text-lg"
                    placeholder="Confirm your password" required>
            </div>

            <!-- Submit Button -->
            <button type="button" id="registerButton" class="btn btn-primary w-full mt-4 text-sm 2xl:text-lg">
                Register
            </button>
        </form>

        
    </div>
</div>

@include('api.registerPost')

@endsection
