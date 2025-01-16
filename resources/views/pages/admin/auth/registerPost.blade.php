<script>
    
    document.getElementById('registerButton').addEventListener('click', async () => {
    const form = document.getElementById('registerForm');

    const formData = {
        name: form.name.value,
        email: form.email.value,
        password: form.password.value,
        password_confirmation: form.password_confirmation.value,
    };

    try {
        const response = await fetch('https://sinergi.xazif.my.id/api/register', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',

            },
            withCredentials: true,
            body: JSON.stringify(formData),
        });

        const result = await response.json();

        if (response.ok) {
            showAlert('success', 'Registration successful! Check your email for verification.');

            // Reset form fields
            form.reset();
        } else {
            const errorMessage = result.message || 'Failed to register';
            showAlert('error', errorMessage);
        }
    } catch (error) {
        console.error('Error:', error);
        showAlert('error', 'An unexpected error occurred. Please try again later.');
    }
});

/**
 * Show alert dynamically
 * @param {string} type - Type of alert ('success' or 'error')
 * @param {string} message - Message to display in the alert
 */
function showAlert(type, message) {
    const alertContainer = document.getElementById('alertContainer');

    const alertTypeClass = {
        success: 'alert-success',
        error: 'alert-error',
    };

    alertContainer.innerHTML = `
        <div role="alert" class="alert ${alertTypeClass[type]} flex items-center mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="${type === 'success' ? 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z' : 'M18.364 5.636l-12.728 12.728M5.636 5.636l12.728 12.728'}" />
            </svg>
            <span>${message}</span>
        </div>
    `;

    alertContainer.classList.remove('hidden');

    // Auto-hide the alert after 5 seconds
    // setTimeout(() => {
    //     alertContainer.innerHTML = '';
    //     alertContainer.classList.add('hidden');
    // }, 5000);
}

</script>
