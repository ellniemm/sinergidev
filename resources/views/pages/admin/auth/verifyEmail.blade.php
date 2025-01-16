@extends('pages.layouts.layout')

@section('title', 'Email Verification')

@section('main')
    <div class="flex flex-col items-center justify-center h-screen">
        <div class="card w-96 bg-white/20 backdrop-blur-lg shadow-lg p-6 rounded-lg">
            <h1 class="text-2xl font-bold mb-4 text-center">Email Verification</h1>

            <div id="verificationResult" class="hidden">
                <div id="successMessage" class="hidden mt-6 text-center">
                    <div class="bg-green-50 p-6 rounded-lg border border-green-200 shadow-sm">
                        <div class="flex flex-col items-center space-y-4">
                            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center">
                                <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-green-700">
                                Your email has been successfully verified!
                            </h3>
                            <div class="text-gray-600 max-w-md">
                                <p class="mb-2">Your account is pending activation.</p>
                                <p class="font-medium">Please contact the admin to activate your account.</p>
                            </div>
                            <div class="mt-4 text-sm text-gray-500">
                                <p>For assistance, contact admin at:</p>
                                <p class="font-medium text-blue-600">admin@example.com</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="failedMessage" class="hidden mt-6 text-center">
                    <div class="bg-red-50 p-6 rounded-lg border border-red-200 shadow-sm">
                        <div class="flex flex-col items-center space-y-4">
                            <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center">
                                <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-red-700">
                                Verification Failed
                            </h3>
                            <div class="text-gray-600 max-w-md">
                                <p id="errorMessage" class="font-medium"></p>
                                <p class="mt-2">Please try again or contact support if the problem persists.</p>
                            </div>
                            <button type="button" class="mt-4 px-6 py-2 btn btn-primary"
                                onclick="window.location.href='/register'">
                                Back to Register
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <p id="loadingMessage" class="text-slate-400 text-center">Verifying your email, please wait...</p>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', async () => {
            const urlParams = new URLSearchParams(window.location.search);
            const verificationUrl = urlParams.get('verification_url');
            const signature = urlParams.get('signature');
            let expires = urlParams.get('expires');

            // Extract expires from verificationUrl if not found in main URL
            if (!expires && verificationUrl) {
                const verificationUrlParams = new URLSearchParams(verificationUrl.split('?')[1]);
                expires = verificationUrlParams.get('expires');
            }

            console.log('URL Parameters:', {
                verificationUrl: verificationUrl,
                signature: signature,
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
@endsection
