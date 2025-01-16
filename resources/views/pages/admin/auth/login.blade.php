@extends('pages.layouts.layout')

@section('title', 'Login')

@section('main')
    <div class="flex flex-col items-center justify-center h-screen">
        <div class="card w-96 bg-white/20 backdrop-blur-lg shadow-lg p-6 rounded-lg">
            <h2 class="text-2xl font-bold text-center mb-6">Login</h2>
            <form id="loginForm" class="space-y-4">
                <!-- Input Email -->
                <div class="form-control">
                    <label class="label" for="email">
                        <span class="label-text">Email</span>
                    </label>
                    <input type="email" id="email" name="email" class="input input-bordered w-full"
                        placeholder="Enter your email" required />
                </div>

                <!-- Input Password -->
                <div class="form-control">
                    <label class="label" for="password">
                        <span class="label-text">Password</span>
                    </label>
                    <input type="password" id="password" name="password" class="input input-bordered w-full"
                        placeholder="Enter your password" required />
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary w-full mt-4">
                    Login
                </button>
            </form>

            <p class="text-center mt-4 text-sm">
                Don't have an account?
                <a href="/register" class="text-blue-500 hover:underline">Register</a>
            </p>
        </div>
    </div>

    @vite(['resources/js/app.js'])

<script>
    
    document.getElementById('loginForm').addEventListener('submit', async (e) => {
        e.preventDefault();
        const form = document.getElementById('loginForm');

        const formData = {
            email: form.email.value,
            password: form.password.value,
        };

        try {
            const response = await axios.post('/login', formData);
            window.location.href = '/dashboard';
        } catch (error) {
            if (error.response) {
                alert(error.response.data.message || 'Login failed');
            } else {
                console.error('Error:', error.message);
                alert('An unexpected error occurred. Please try again.');
            }
        }
    });
</script>

    


@endsection
