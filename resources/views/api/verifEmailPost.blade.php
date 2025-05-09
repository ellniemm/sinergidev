<script>
    document.addEventListener('DOMContentLoaded', async () => {
        const urlParams = new URLSearchParams(window.location.search);
        const verificationUrl = urlParams.get('verification_url');
        const signature = urlParams.get('signature');
        const email = urlParams.get('email');
        let expires = urlParams.get('expires');

        // Extract expires from verificationUrl if not found in main URL
        if (!expires && verificationUrl) {
            const verificationUrlParams = new URLSearchParams(verificationUrl.split('?')[1]);
            expires = verificationUrlParams.get('expires');
        }

        console.log('URL Parameters:', {
            verificationUrl: verificationUrl,
            signature: signature,
            email: email,
            expires: expires
        });

        if (verificationUrl && signature && expires) {
            try {
                const response = await fetch(`${verificationUrl}&signature=${signature}`, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                    withCredentials: true,
                });

                const result = await response.json();
                document.getElementById('loadingMessage').classList.add('hidden');
                document.getElementById('verificationResult').classList.remove('hidden');

                if (result.message === 'Email verified successfully.') {
                    document.getElementById('successMessage').classList.remove('hidden');
                    document.getElementById('failedMessage').classList.add('hidden');
                    setTimeout(() => {
                        window.location.href = '/login';
                    }, 5000);
                } else {
                    document.getElementById('failedMessage').classList.remove('hidden');
                    document.getElementById('successMessage').classList.add('hidden');
                    document.getElementById('errorMessage').textContent = result.message;
                }


            } catch (error) {
                console.error('Error verifying email:', error);
                document.getElementById('loadingMessage').classList.add('hidden');
                document.getElementById('verificationResult').classList.remove('hidden');
                document.getElementById('failedMessage').classList.remove('hidden');
                document.getElementById('errorMessage').textContent =
                    'An error occurred during verification.';
            }
        } else {
            console.error('Missing URL parameters:', {
                verificationUrl,
                signature,
                expires
            });
            document.getElementById('loadingMessage').classList.add('hidden');
            document.getElementById('verificationResult').classList.remove('hidden');
            document.getElementById('failedMessage').classList.remove('hidden');
            document.getElementById('errorMessage').textContent = 'Missing URL parameters.';
        }
    });
</script>