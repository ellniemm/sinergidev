<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        return view('pages.user.home');
    }
    public function services(){
        return view('pages.user.services');
    }
    public function aboutUs(){
        return view('pages.user.about-us');
    }
    public function products(){
        return view('pages.user.products');
    }
    public function contactUs(){
        return view('pages.user.contact-us');
    }
}
