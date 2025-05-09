<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('forgotPasswordForm');
        const alertContainer = document.getElementById('alertContainer');
        
        form.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            
            const email = document.getElementById('email').value;
            
            
            const submitButton = form.querySelector('button[type="submit"]');
            const originalButtonText = submitButton.textContent;
            submitButton.disabled = true;
            submitButton.innerHTML = `<span class="loading loading-spinner"></span> Sending...`;
            
            try {
                const response = await fetch('https://sinergi.dev.ybgee.my.id/api/forgot-password', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ email: email })
                });
                
                const result = await response.json();
                
                
                if (result.status === "200" || result.status === 200 || response.ok) {
                    
                    alertContainer.innerHTML = `
                        <div role="alert" class="alert alert-success">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 2xl:h-8 2xl:w-8 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="text-sm 2xl:text-lg">${result.message || 'Password reset link has been sent to your email'}</span>
                        </div>
                    `;
                    
                    
                    form.style.display = 'none';
                    
                    
                    setTimeout(() => {
                        window.location.href = '/login';
                    }, 3000);
                } else {
                    
                    alertContainer.innerHTML = `
                        <div role="alert" class="alert alert-error">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 2xl:h-8 2xl:w-8 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="text-sm 2xl:text-lg">${result.message || 'Failed to send password reset link'}</span>
                        </div>
                    `;
                    
                    
                    submitButton.disabled = false;
                    submitButton.textContent = originalButtonText;
                }
                
                
                console.log('Response status:', result.status);
                console.log('Response type:', typeof result.status);
                console.log('Full response:', result);
                
            } catch (error) {
                console.error('Error sending password reset link:', error);
                
                
                alertContainer.innerHTML = `
                    <div role="alert" class="alert alert-error">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 2xl:h-8 2xl:w-8 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-sm 2xl:text-lg">An error occurred. Please try again later.</span>
                    </div>
                `;
                
                
                submitButton.disabled = false;
                submitButton.textContent = originalButtonText;
            }
        });
    });
</script>
