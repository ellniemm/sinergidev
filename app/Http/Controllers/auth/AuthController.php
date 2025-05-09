<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function login() {
        return view('pages.auth.login');
    }
    public function loginPost(Request $request) {

    }
    public function register() {
        return view('pages.auth.register');
    }
    public function registerPost(Request $request) {

    }
    public function verifyEmail(){
        return view('pages.auth.verifyEmail');
    }

    public function verifyEmailPost(Request $request){
        $token = $request->query('token');
        $email = $request->query('email');

        try{
            
            $response = Http::post('https://sinergi.dev.ybgee.my.id/api/verify-email', [
                'token' => $token,
                'email' => $email,
            ]);
            if($response->successfull()){
                return view('pages.auth.verifyEmailSuccess', [
                    'status' => 'success',
                    'message' => 'Email verified successfully',
                ]);
            }
            return view('pages.auth.verifyEmail', [
                'status' => 'error',
                'message' => 'Email verification failed',
            ]);
        } catch (\Exception $e){
            return view('pages.auth.verifyEmail', [
                'status' => 'error',
                'message' => 'Email process error',
            ]);
        }
    }

    public function resendVerificationEmail(){
        return view('pages.auth.resendVerificationEmail');
    }
    public function resendVerificationEmailPost(Request $request) {
        $request->validate([
            'email' => 'required|email'
        ]);
        
        try {
            
            
            $response = Http::post('https://sinergi.dev.ybgee.my.id/api/email/resend', [
                'email' => $request->email,
            ]);
            
            if ($response->successful()) {
                return response()->json([
                    'status' => '200',
                    'message' => 'Verification email has been sent'
                ]);
            }
            
            return response()->json([
                'status' => '400',
                'message' => $response->json()['message'] ?? 'Failed to send verification email'
            ], 400);
            
        } catch (\Exception $e) {
            return response()->json([
                'status' => '500',
                'message' => 'Server error: ' . $e->getMessage()
            ], 500);
        }
    }

    public function forgotPassword(){
        return view('pages.auth.forgotPassword');
    }
    public function forgotPasswordPost(Request $request) {
        $request->validate([
            'email' => 'required|email'
        ]);
        
        try {
            
            $response = Http::post('https://sinergi.dev.ybgee.my.id/api/forgot-password', [
                'email' => $request->email,
            ]);
            
            if ($response->successful()) {
                return response()->json([
                    'status' => '200',
                    'message' => 'Password reset link has been sent to your email'
                ]);
            }
            
            return response()->json([
                'status' => '400',
                'message' => $response->json()['message'] ?? 'Failed to send password reset link'
            ], 400);
            
        } catch (\Exception $e) {
            return response()->json([
                'status' => '500',
                'message' => 'Server error: ' . $e->getMessage()
            ], 500);
        }
    }
    
    public function resetPassword() {
        return view('pages.auth.resetPassword');
    }
    
    public function resetPasswordPost(Request $request) {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);
        
        try {
            
            $response = Http::post('https://sinergi.dev.ybgee.my.id/api/reset-password', [
                'token' => $request->token,
                'email' => $request->email,
                'password' => $request->password,
                'password_confirmation' => $request->password_confirmation,
            ]);
            
            if ($response->successful()) {
                return response()->json([
                    'status' => '200',
                    'message' => 'Password has been reset successfully'
                ]);
            }
            
            return response()->json([
                'status' => '400',
                'message' => $response->json()['message'] ?? 'Failed to reset password'
            ], 400);
            
        } catch (\Exception $e) {
            return response()->json([
                'status' => '500',
                'message' => 'Server error: ' . $e->getMessage()
            ], 500);
        }
    }
    
}
