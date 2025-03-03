<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

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
    public function blog(){
        try {
            $response = Http::get('https://sinergi.dev.ybgee.my.id/api/blog', [
                'page' => request()->get('page', 1),
                'per_page' => 10
            ]);

            if ($response->successful()) {
                $data = $response->json();
                $blogs = $data['data']['blogs'];
                $pagination = $data['data']['pagination'];

                $bigCard = $blogs[0] ?? null;
                $gridCard = array_slice($blogs, 1);

                return view('pages.user.blog', [
                    'blogs' => $blogs,
                    'bigCard' => $bigCard,
                    'gridCard' => $gridCard,
                    'currentPage' => $pagination['current_page'],
                    'lastPage' => $pagination['last_page'],
                    'nextPageUrl' => $pagination['next_page_url'] !== null,
                    'prevPageUrl' => $pagination['prev_page_url'] !== null
                ]);
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to load blog posts');
        }
    }
    
    public function blogDetail($slug){
        try{
            $response = Http::get('https://sinergi.dev.ybgee.my.id/api/blog/'.$slug);
            if ($response->successful()) {
                $data = $response->json();
                // Access the blog data directly from data array
                $blog = $data['data'];
                return view('pages.user.blog-detail', compact('blog'));
            }
            Log::error('API Response not successful: ' . $response->body());
        } catch (\Exception $e) {
            Log::error('Blog detail error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to load blog post');
        }
    }
    
}
