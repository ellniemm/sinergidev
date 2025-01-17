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

<script>
    // Menangani pengiriman formulir login
    document.getElementById('loginForm').addEventListener('submit', async function (e) {
        e.preventDefault(); // Mencegah reload halaman saat form dikirim

        const form = e.target;

        const formData = {
            email: form.email.value,
            password: form.password.value,
        };

        try {
            // Fetch API untuk mengirim request ke server
            const response = await fetch('https://sinergi.xazif.my.id/api/login', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(formData),
            });

            const result = await response.json();

            if (response.ok) {
                alert(`Welcome, ${result.user.name}!`);
                console.log('Token:', result.token);

                // Simpan token ke localStorage (jika perlu digunakan di masa mendatang)
                localStorage.setItem('authToken', result.token);

                // Redirect ke halaman utama atau dashboard
                window.location.href = '/dashboard';
            } else {
                // Tampilkan pesan kesalahan
                alert(result.message || 'Failed to login. Please try again.');
            }
        } catch (error) {
            console.error('Error:', error);
            alert('An unexpected error occurred. Please try again later.');
        }
    });
</script>


    


@endsection
