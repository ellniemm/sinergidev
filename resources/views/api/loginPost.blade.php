<script>
    document.getElementById('loginForm').addEventListener('submit', async (e) => {
        e.preventDefault();
        const form = document.getElementById('loginForm');

        const formData = {
            email: form.email.value,
            password: form.password.value,
        };

        try {
            console.log('Sending login request...');
            const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
            const response = await fetch('http://localhost:8000/api/login', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify(formData)
            });

            console.log('Response received:', response);
            const result = await response.json();

            let alertContainer = document.getElementById('alertContainer');
            if (!alertContainer) {
                alertContainer = document.createElement('div');
                alertContainer.id = 'alertContainer';
                alertContainer.className = 'mb-4';
                form.parentNode.insertBefore(alertContainer, form);
            }

            if (response.ok) {
                // Success alert with DaisyUI
                alertContainer.innerHTML = `
                    <div role="alert" class="alert alert-success">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>Welcome, ${result.user.name}!</span>
                    </div>
                `;
                document.cookie = `authToken=${result.token}; path=/; secure; samesite=strict`;
                setTimeout(() => {
                    window.location.href = '/dashboard';
                }, 1000);
            } else {
                // Error alert with DaisyUI
                if (response.status === 422) {
                    errorMessage = 'Incorrect Email or Password!';
                } else {
                    errorMessage = 'Failed to login. Please try again.';
                }
                alertContainer.innerHTML = `
                    <div role="alert" class="alert alert-error">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>${errorMessage}</span>
                    </div>
                `;
            }
        } catch (error) {
            console.error('Error:', error);
            let alertContainer = document.getElementById('alertContainer');
            if (!alertContainer) {
                alertContainer = document.createElement('div');
                alertContainer.id = 'alertContainer';
                alertContainer.className = 'mb-4';
                form.parentNode.insertBefore(alertContainer, form);
            }
            alertContainer.innerHTML = `
                <div role="alert" class="alert alert-error">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>An unexpected error occurred. Please try again later.</span>
                </div>
            `;
        }
    });
</script>