<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('resetPasswordForm');
        const alertContainer = document.getElementById('alertContainer');
        
        
        const urlParams = new URLSearchParams(window.location.search);
        const resetUrl = urlParams.get('reset_url');
        
        
        let token = '';
        let email = '';
        
        if (resetUrl) {
            
            const parts = resetUrl.split('?email=');
            if (parts.length === 2) {
                token = parts[0];
                email = parts[1];
                
                
                document.getElementById('token').value = token;
                document.getElementById('email').value = email;
                
                console.log('Extracted token:', token);
                console.log('Extracted email:', email);
            }
        }
        
        form.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            
            const token = document.getElementById('token').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const password_confirmation = document.getElementById('password_confirmation').value;
            
            
            if (password !== password_confirmation) {
                alertContainer.innerHTML = `
                    <div role="alert" class="alert alert-error">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 2xl:h-8 2xl:w-8 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-sm 2xl:text-lg">Passwords do not match.</span>
                    </div>
                `;
                return;
            }
            
            
            const submitButton = form.querySelector('button[type="submit"]');
            const originalButtonText = submitButton.textContent;
            submitButton.disabled = true;
            submitButton.innerHTML = `<span class="loading loading-spinner"></span> Resetting...`;
            
            try {
                const response = await fetch('https://sinergi.dev.ybgee.my.id/api/reset-password', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ 
                        token: token,
                        email: email,
                        password: password,
                        password_confirmation: password_confirmation
                    })
                });
                
                const result = await response.json();
                
                if (result.status === "200" || result.status === 200 || response.ok) {
                    
                    alertContainer.innerHTML = `
                        <div role="alert" class="alert alert-success">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 2xl:h-8 2xl:w-8 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="text-sm 2xl:text-lg">${result.message || 'Password has been reset successfully'}</span>
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
                            <span class="text-sm 2xl:text-lg">${result.message || 'Failed to reset password'}</span>
                        </div>
                    `;
                    
                    
                    submitButton.disabled = false;
                    submitButton.textContent = originalButtonText;
                }
            } catch (error) {
                console.error('Error resetting password:', error);
                
                
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
        
        
        if (!token || !email) {
            
            alertContainer.innerHTML = `
                <div role="alert" class="alert alert-error">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 2xl:h-8 2xl:w-8 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="text-sm 2xl:text-lg">Invalid password reset link. Please request a new one.</span>
                </div>
            `;
            
            
            form.style.display = 'none';
            
            
            const backButton = document.createElement('button');
            backButton.className = 'btn btn-primary w-full mt-4 text-sm 2xl:text-lg';
            backButton.textContent = 'Request New Reset Link';
            backButton.addEventListener('click', function() {
                window.location.href = '/forgot-password';
            });
            
            alertContainer.parentNode.insertBefore(backButton, alertContainer.nextSibling);
        }
    });
</script>
