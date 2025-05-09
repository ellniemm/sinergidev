@extends('pages.layouts.layout')

@section('title', 'Login - Sinergi Studio')

@section('main')

<div class="flex flex-col items-center justify-center h-screen px-4 2xl:px-0">
    <div class="card w-full max-w-md 2xl:max-w-lg bg-white/20 backdrop-blur-lg shadow-lg p-6 rounded-lg">
        <h2 class="text-2xl 2xl:text-4xl font-bold text-center mb-6">Login</h2>
        <div id="alertContainer" class="mb-4">
            @if(session('error'))
            <div role="alert" class="alert alert-error">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 2xl:h-8 2xl:w-8 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="text-sm 2xl:text-lg">{{ session('error') }}</span>
            </div>
            @endif
        </div>
        <form id="loginForm" class="space-y-4">
            
            <!-- Input Email -->
            <div class="form-control">
                <label class="label" for="email">
                    <span class="label-text text-sm 2xl:text-lg">Email</span>
                </label>
                <input type="email" id="email" name="email" class="input input-bordered w-full text-sm 2xl:text-lg"
                    placeholder="Enter your email" required />
            </div>

            <!-- Input Password -->
            <div class="form-control">
                <label class="label" for="password">
                    <span class="label-text text-sm 2xl:text-lg">Password</span>
                </label>
                <input type="password" id="password" name="password" class="input input-bordered w-full text-sm 2xl:text-lg"
                    placeholder="Enter your password" required />
            </div>
            <div class="flex items-center justify-between">
                <a href="{{route('forgot.password')}}" class="text-sm font-medium text-primary hover:underline dark:text-primary-500">Forgot password?</a>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary w-full mt-4 text-sm 2xl:text-lg">
                Login
            </button>
        </form>
    </div>
</div>

@include('api.loginPost')

@endsection