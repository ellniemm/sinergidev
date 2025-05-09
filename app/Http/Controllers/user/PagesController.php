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

        $productResponse = Http::get('https://sinergi.dev.ybgee.my.id/api/product', [
            'per_page' => 10,
            'order_by' => 'created_at',
        ]);
        $products = collect($productResponse->json()['data']['products'])->take(3);


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
                Log::info('Blog API unsuccessful response', [
                    'status' => $response->status(),
                    'body' => $response->body()
                ]);
                return response()->view('errors.custom', [
                    'message' => 'Failed to load blog data. Please try again later.'
                ], 500);
            }
        } catch (\Exception $e) {
            Log::info('Blog API exception', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);
            
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
            $blog = $data['data'];
            
            
            $relatedBlogs = [];
            $currentBlogId = $blog['blog_id'];
            
            if (isset($blog['category_id'])) {
                $categoryId = $blog['category_id'];
                
                
                $relatedResponse = Http::get('https://sinergi.dev.ybgee.my.id/api/blog', [
                    'category' => $categoryId,
                    'limit' => 10 
                ]);
                
                if ($relatedResponse->successful()) {
                    $relatedData = $relatedResponse->json();
                    
                    if (isset($relatedData['data']['blogs']) && is_array($relatedData['data']['blogs'])) {
                        
                        $relatedBlogs = collect($relatedData['data']['blogs'])
                            ->filter(function($item) use ($slug) {
                                return $item['slug'] != $slug;
                            })
                            ->take(3)
                            ->values()
                            ->toArray();
                    }
                }
            }
            
            
            if (count($relatedBlogs) < 3) {
                $neededMore = 3 - count($relatedBlogs);
                
                $randomResponse = Http::get('https://sinergi.dev.ybgee.my.id/api/blog', [
                    'limit' => 10, 
                    'order_by' => 'random' 
                ]);
                
                if ($randomResponse->successful()) {
                    
                    $randomData = $randomResponse->json();
                    
                    if (isset($randomData['data']['blogs']) && is_array($randomData['data']['blogs'])) {
                        
                        $existingIds = array_column($relatedBlogs, 'blog_id');
                        
                        
                        $additionalBlogs = collect($randomData['data']['blogs'])
                            ->filter(function($item) use ($slug, $existingIds) {
                                return $item['slug'] != $slug && !in_array($item['blog_id'], $existingIds);
                            })
                            ->take($neededMore)
                            ->values()
                            ->toArray();
                        
                        
                        $relatedBlogs = array_merge($relatedBlogs, $additionalBlogs);
                    }
                }
            }
            
            return view('pages.user.blog-detail', compact('blog', 'relatedBlogs'));
        } else {
            Log::info('Blog Detail API unsuccessful response', [
                'slug' => $slug,
                'status' => $response->status(),
                'body' => $response->body()
            ]);
            return redirect()->route('blog')->with('error', 'Blog tidak ditemukan');
        }
    } catch (\Exception $e) {
        Log::info('Blog Detail API exception', [
            'slug' => $slug,
            'message' => $e->getMessage(),
            'file' => $e->getFile(),
            'line' => $e->getLine()
        ]);
        return redirect()->route('blog')->with('error', 'Terjadi kesalahan saat memuat blog');
    }
}


    public function productsDetail($id)
    {

        if ($id == "467b068d-8627-41e9-95fb-b3b02cba6592") {
            return view('pages.user.products.detail.web-development');
        } elseif ($id == "c4eecf19-cb1c-485f-af64-560e0f8dd3de") {
            return view('pages.user.products.detail.game-development');
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

    public function relatedBlog($slug){
        try{
            $response = Http::get('https://sinergi.dev.ybgee.my.id/api/blog/{$slug}');
            if($response->successful()){
                $data = $response->json()['data'];
                $currentCategory = $data['category_name'];
                $currentBlogId = $data['blog_id'];

                $allBlogsResponse = Http::get('https://sinergi.dev.ybgee.my.id/api/blog');
                $allBlogs = $allBlogsResponse->json()['data'];
                $sameCategoryBlogs = collect($allBlogs)->filter(function ($item) use ($currentBlogId, $currentCategory){
                    return $item['category_name'] == $currentCategory && $item['blog_id'] != $currentBlogId;
                })->take(3)->toArray();

                $needBlogs = 3 - count($sameCategoryBlogs);
                $otherBlogs = [];
                if($needBlogs > 0){
                    $otherBlogs = collect($allBlogs)->filter(function ($item) use ($currentCategory, $currentBlogId, $sameCategoryBlogs){
                        return $item['category_name'] != $currentCategory && $item['blog_id'] != $currentBlogId && !in_array($item['blog_id'], collect($sameCategoryBlogs)->pluck('blog_id')->toArray());
                    })->take($needBlogs)->toArray();
                }

                $relatedBlogs = array_merge($sameCategoryBlogs, $otherBlogs);

                return view('pages.user.blog-detail', [
                    'blog' => $data,
                    'relatedBlogs' => $relatedBlogs
                ]);
            }
            return redirect()->route('blog.index')->with('error', 'Blog not found');
        } catch (\Exception $e){
            Log::info('Related Blog API exception', [
                'slug' => $slug,
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);
            return redirect()->route('blog.index')->with('error', 'Failed to load related blogs. Please try again later.');
        }
    }
}
