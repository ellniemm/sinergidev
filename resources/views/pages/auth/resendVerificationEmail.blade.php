@extends('pages.layouts.layout')
@section('title', 'Resend Email Verification - Sinergi Studio')

@section('main')
<div class="flex flex-col items-center justify-center h-screen px-4 2xl:px-0">
    <div class="card w-full max-w-md 2xl:max-w-lg bg-white/20 backdrop-blur-lg shadow-lg p-6 rounded-lg">
        <h1 class="text-2xl 2xl:text-4xl font-bold mb-4 text-center">Resend Verification Email</h1>
        
        <div id="statusMessage">
            
        </div>
        
        <form id="resendForm" class="space-y-4">
            <div>
                <label for="email" class="block text-sm 2xl:text-lg font-medium text-gray-700 mb-1">Email Address</label>
                <input type="email" id="email" name="email" required 
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter your email address">
            </div>
            
            <div>
                <button type="submit" id="submitButton"
                    class="w-full btn btn-primary text-sm 2xl:text-lg">
                    Resend Verification Email
                </button>
            </div>
        </form>
        
        <div class="mt-4 text-center">
            <a href="/login" class="text-sm 2xl:text-lg text-blue-600 hover:text-blue-400">Back to Login</a>
        </div>
    </div>
</div>

@include('api.resendVerificationEmailPost')
@endsection
