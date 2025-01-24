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
}
