<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PagesController extends Controller
{
    public function index()
    {
        // Get products data
        $productResponse = Http::get('https://sinergi.dev.ybgee.my.id/api/product', [
            'per_page' => 10,
            'order_by' => 'created_at',
        ]);
        $products = collect($productResponse->json()['data']['products'])->take(3);

        // Get services data
        $serviceResponse = Http::get('https://sinergi.dev.ybgee.my.id/api/service', [
            'per_page' => 10,
            'order_by' => 'created_at',
        ]);
        $services = collect($serviceResponse->json()['data']['services'])->take(3);

        return view('pages.user.home', compact('products', 'services'));
    }

    public function services()
    {
        $response = Http::get('https://sinergi.dev.ybgee.my.id/api/service', [
            'per_page' => 10,
            'order_by' => 'created_at',
        ]);
        // dd($response->json());
        $services = collect($response->json()['data']['services'])->take(3);

        return view('pages.user.services', compact('services'));
    }
    public function aboutUs()
    {
        return view('pages.user.about-us');
    }
    public function products()
    {
        $response = Http::get('https://sinergi.dev.ybgee.my.id/api/product', [
            'per_page' => 10,
            'order_by' => 'created_at',
        ]);
        // dd($response->json());
        $products = collect($response->json()['data']['products'])->take(3);

        return view('pages.user.products', compact('products'));
    }
    public function contactUs()
    {
        return view('pages.user.contact-us');
    }
    public function blog()
    {
        try {
            $response = Http::get('https://sinergi.dev.ybgee.my.id/api/blog');

            // Log response details
            Log::info('Blog API Response', [
                'status' => $response->status(),
                'successful' => $response->successful(),
                'body' => $response->body(),
                'json' => json_encode($response->json())
            ]);

            if ($response->successful()) {
                $data = $response->json();
                $blogs = $data['data']['blogs'];

                $bigCard = $blogs[0] ?? null;
                $gridCard = array_slice($blogs, 1);

                return view('pages.user.blog', [
                    'blogs' => $blogs,
                    'bigCard' => $bigCard,
                    'gridCard' => $gridCard,

                ]);
            } else {
                Log::error('Blog API unsuccessful response', [
                    'status' => $response->status(),
                    'body' => $response->body()
                ]);
                return response()->view('errors.custom', [
                    'message' => 'Failed to load blog data. Please try again later.'
                ], 500);
            }
        } catch (\Exception $e) {
            Log::error('Blog API exception', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);
            return response()->view('errors.custom', [
                'message' => 'An error occurred while loading the blog. Please try again later.'
            ], 500);
        }
    }


    public function blogDetail($slug)
    {
        try {
            $response = Http::get('https://sinergi.dev.ybgee.my.id/api/blog/' . $slug);
            Log::info('Blog Detail API Response', [
                'slug' => $slug,
                'status' => $response->status(),
                'successful' => $response->successful(),
                'body' => $response->body(),
                'json' => json_encode($response->json())
            ]);

            if ($response->successful()) {
                $data = $response->json();
                // Access the blog data directly from data array
                $blog = $data['data'];
                return view('pages.user.blog-detail', compact('blog'));
            } else {
                Log::error('Blog Detail API unsuccessful response', [
                    'slug' => $slug,
                    'status' => $response->status(),
                    'body' => $response->body()
                ]);
                return response()->view('errors.custom', [
                    'message' => 'Failed to load blog post. Please try again later.'
                ], 500);
            }
        } catch (\Exception $e) {
            Log::error('Blog Detail API exception', [
                'slug' => $slug,
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);
            return response()->view('errors.custom', [
                'message' => 'An error occurred while loading the blog post. Please try again later.'
            ], 500);
        }
    }

    public function productsDetail($id)
    {

        if ($id == "467b068d-8627-41e9-95fb-b3b02cba6592") {
            return view('pages.user.products.detail.web-development');
        } elseif ($id == "c4eecf19-cb1c-485f-af64-560e0f8dd3de") {
            return view('pages.user.products.detail.game-development');
        } elseif ($id == "c9dba626-9db5-4817-b3c7-3fc88b69df15") {
            return view('pages.user.products.detail.mobile-development');
        }
    }
    public function servicesDetail($id)
    {
        $productResponse = Http::get('https://sinergi.dev.ybgee.my.id/api/product', [
            'per_page' => 10,
            'order_by' => 'created_at',
        ]);
        $products = collect($productResponse->json()['data']['products'])->take(3);

        if ($id == "5bbc6bc9-9a9a-4c7b-a720-c4563a59e6aa") {
            return view('pages.user.services.detail.web-development', compact('products'));
        } elseif ($id == "c7b961a5-c1c2-4c84-b5f3-c435f6e77125") {
            return view('pages.user.services.detail.game-development', compact('products'));
        } elseif ($id == "d78cd3cd-3f0c-4f72-bc39-d3a90fca12cc") {
            return view('pages.user.services.detail.mobile-development', compact('products'));
        }
    }
}
