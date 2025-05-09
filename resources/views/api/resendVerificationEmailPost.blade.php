<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('resendForm');
        const submitButton = document.getElementById('submitButton');
        const statusMessage = document.getElementById('statusMessage');
        
        form.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            
            const email = document.getElementById('email').value;
            
            
            submitButton.disabled = true;
            submitButton.classList.add('loading');
            submitButton.textContent = 'Sending...';
            
            try {
                const response = await fetch('https://sinergi.dev.ybgee.my.id/api/email/resend', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ email: email })
                });
                
                const result = await response.json();
                
                if (result.status === "200") {
                    
                    statusMessage.innerHTML = `
                        <div class="mt-6 text-center">
                            <div class="bg-green-50 p-6 rounded-lg border border-green-200 shadow-sm">
                                <div class="flex flex-col items-center space-y-4">
                                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center">
                                        <svg class="w-8 h-8 2xl:w-12 2xl:h-12 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                    <h3 class="text-lg 2xl:text-2xl font-semibold text-green-700">
                                        Verification Email Sent!
                                    </h3>
                                    <div class="text-gray-600 max-w-md text-sm 2xl:text-lg">
                                        <p>Please check your email inbox for the verification link.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    
                    
                    form.style.display = 'none';
                    
                    
                    setTimeout(() => {
                        window.location.href = '/login';
                    }, 3000);
                } else {
                    
                    statusMessage.innerHTML = `
                        <div class="mt-6 text-center">
                            <div class="bg-red-50 p-6 rounded-lg border border-red-200 shadow-sm">
                                <div class="flex flex-col items-center space-y-4">
                                    <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center">
                                        <svg class="w-8 h-8 2xl:w-12 2xl:h-12 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </div>
                                    <h3 class="text-lg 2xl:text-2xl font-semibold text-red-700">
                                        Failed to Resend Verification Email
                                    </h3>
                                    <div class="text-gray-600 max-w-md text-sm 2xl:text-lg">
                                        <p class="font-medium">${result.message || 'An error occurred'}</p>
                                        <p class="mt-2">Please try again or contact support if the problem persists.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    
                    
                    submitButton.disabled = false;
                    submitButton.classList.remove('loading');
                    submitButton.textContent = 'Resend Verification Email';
                }
            } catch (error) {
                console.error('Error resending verification email:', error);
                
                
                statusMessage.innerHTML = `
                    <div class="mt-6 text-center">
                        <div class="bg-red-50 p-6 rounded-lg border border-red-200 shadow-sm">
                            <div class="flex flex-col items-center space-y-4">
                                <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center">
                                    <svg class="w-8 h-8 2xl:w-12 2xl:h-12 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </div>
                                <h3 class="text-lg 2xl:text-2xl font-semibold text-red-700">
                                    Failed to Resend Verification Email
                                </h3>
                                <div class="text-gray-600 max-w-md text-sm 2xl:text-lg">
                                    <p class="font-medium">An error occurred during the request.</p>
                                    <p class="mt-2">Please try again or contact support if the problem persists.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                
                
                submitButton.disabled = false;
                submitButton.classList.remove('loading');
                submitButton.textContent = 'Resend Verification Email';
            }
        });
    });
</script>
