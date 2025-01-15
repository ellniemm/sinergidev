<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function login() {
        return view('pages.admin.auth.login');
    }
    public function loginPost(Request $request) {

    }
    public function register() {
        return view('pages.admin.auth.register');
    }
    public function registerPost(Request $request) {

    }
    public function verifyEmail(){
        return view('pages.admin.auth.verifyEmail');
    }

    public function verifyEmailPost(Request $request){
        $token = $request->query('token');
        $email = $request->query('email');

        try{
            $response = Http::post('http://sinergi.xazif.my.id/api/verify-email', [
                'token' => $token,
                'email' => $email,
            ]);
            if($response->successfull()){
                return view('pages.admin.auth.verifyEmailSuccess', [
                    'status' => 'success',
                    'message' => 'Email verified successfully',
                ]);
            }
            return view('pages.admin.auth.verifyEmail', [
                'status' => 'error',
                'message' => 'Email verification failed',
            ]);
        } catch (\Exception $e){
            return view('pages.admin.auth.verifyEmail', [
                'status' => 'error',
                'message' => 'Email process error',
            ]);
        }
    }
}
