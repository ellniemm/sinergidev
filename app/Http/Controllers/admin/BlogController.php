<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
{
    $token = $_COOKIE['authToken'] ?? null;
    $currentPage = (int)request()->get('page', 1);

    try {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token
        ])->get('https://sinergi.dev.ybgee.my.id/api/blog/admin', [
            'page' => $currentPage,
            'per_page' => 10
        ]);

        if ($response->successful()) {
            // dd($response->json());
            $data = $response->json();
            $blogs = $data['data']['blogs'];
            $pagination = $data['data']['pagination'];

            return view('pages.admin.blog.index', [
                'blogs' => $blogs,
                'currentPage' => $pagination['current_page'],
                'lastPage' => $pagination['last_page'],
                'nextPageUrl' => $pagination['next_page_url'] !== null,
                'prevPageUrl' => $pagination['prev_page_url'] !== null
            ]);
        }
    } catch (\Exception $e) {
        Log::error('Blog fetch error: ' . $e->getMessage());
        return redirect()->back()->with('error', 'An unexpected error occurred');
    }
}


    public function create()
    {
        $token = $_COOKIE['authToken'] ?? null;
        try {
            $categoryREsponse = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $token
            ])->get('https://sinergi.dev.ybgee.my.id/api/category');

            $categories = [];
            if ($categoryREsponse->successful()) {
                $categories = $categoryREsponse->json('data');
            }
            $statuses = ['draft', 'publish'];
            return view('pages.admin.blog.create', compact('categories', 'statuses'));
        } catch (\Exception $e) {
            Log::error('Category fetch error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An unexpected error occurred');
        }
    }

    public function store(Request $request)
{
    $token = $_COOKIE['authToken'] ?? null;
    Log::info('Blog store attempt', [
        'blog_name' => $request->blog_name,
        'blog_desc' => $request->blog_desc,
        'category_id' => $request->category_name,
        'status' => $request->status,
        'file_present' => $request->hasFile('blog_thumbnail')
    ]);

    try {
        if (!$request->hasFile('blog_thumbnail')) {
            Log::error('Blog creation failed: No thumbnail uploaded.');
            return redirect()->back()->with('error', 'Thumbnail is required.');
        }

        $file = $request->file('blog_thumbnail');
        $status = $request->status === 'publish' ? 'published' : $request->status;

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token
        ])->attach(
            'blog_thumbnail',
            file_get_contents($file),
            $file->getClientOriginalName()
        )->post('https://sinergi.dev.ybgee.my.id/api/blog', [
            'blog_name' => $request->blog_name,
            'blog_desc' => $request->blog_desc,
            'category_id' => $request->category_name,
            'status' => $status,
        ]);

        Log::info('API Response:', ['status' => $response->status(), 'body' => $response->json()]);

        if ($response->successful()) {
            return redirect()->route('blog.index')->with('success', 'Blog created successfully!');
        }

        Log::error('Blog creation failed: API error', ['response' => $response->json()]);
        return redirect()->back()->with('error', 'Failed to create blog. API Error: ' . json_encode($response->json()));
    } catch (\Exception $e) {
        Log::error('Blog creation error: ' . $e->getMessage());
        return redirect()->back()->with('error', 'An unexpected error occurred: ' . $e->getMessage());
    }
}


    public function edit($slug)
    {
        Log::info("Mengakses edit dengan slug: " . $slug);
    
        $token = $_COOKIE['authToken'] ?? null;
        try {
            // Cek apakah token ada
            if (!$token) {
                Log::error("Token tidak ditemukan, kemungkinan pengguna belum login.");
                return redirect()->route('blog.index')->with('error', 'Unauthorized');
            }
    
            // Ambil data blog berdasarkan slug
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $token
            ])->get("https://sinergi.dev.ybgee.my.id/api/blog/{$slug}");
    
            // Cek response API
            if (!$response->successful()) {
                Log::error("Gagal mengambil data blog, response: ", $response->json());
                return redirect()->route('blog.index')->with('error', 'Failed to fetch blog data');
            }
    
            $blog = $response->json()['data'];
            $blog['status'] = $blog['status'] === 'published' ? 'publish' : $blog['status'];
            
            // Ambil kategori
            $categoryResponse = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $token
            ])->get('https://sinergi.dev.ybgee.my.id/api/category');
    
            if ($categoryResponse->successful()) {
                $categories = $categoryResponse->json()['data'];
                $statuses = ['draft', 'publish'];
                return view('pages.admin.blog.create', compact('blog', 'categories', 'statuses'));
            } else {
                Log::error("Gagal mengambil kategori");
                return redirect()->route('blog.index')->with('error', 'Failed to fetch categories');
            }
        } catch (\Exception $e) {
            Log::error('Blog edit error: ' . $e->getMessage());
            return redirect()->route('blog.index')->with('error', 'An unexpected error occurred');
        }
    }
    

    public function update(Request $request, $slug)
    {
        $token = $_COOKIE['authToken'] ?? null;

        Log::info("Menerima request update untuk slug: " . $slug);
        Log::info("Data yang diterima:", $request->all());

        try {
            $status = $request->status === 'publish' ? 'published' : $request->status;
            $data = [
                'blog_name' => $request->blog_name,
                'blog_desc' => $request->blog_desc,
                'category_id' => $request->category_name,
                'status' => $status,
            ];

            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $token
            ]);

            if ($request->hasFile('blog_thumbnail')) {
                Log::info("Thumbnail ditemukan, menambahkan ke request...");
                $response = $response->attach(
                    'blog_thumbnail',
                    file_get_contents($request->blog_thumbnail),
                    $request->blog_thumbnail->getClientOriginalName()
                );
            }

            // $response = $response->post("http://localhost:8000/api/blog/{$slug}", array_merge($data, ['_method' => 'PATCH']));
            $response = $response->post("https://sinergi.dev.ybgee.my.id/api/blog/{$slug}", array_merge($data, ['_method' => 'PATCH']));

            Log::info("API Response:", $response->json());

            if ($response->successful()) {
                return redirect()->route('blog.index')->with('success', 'Blog updated successfully!');
            }

            Log::error("Gagal update, response:", $response->json());
            return redirect()->back()->with('error', 'Failed to update blog');
        } catch (\Exception $e) {
            Log::error('Blog update error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An unexpected error occurred');
        }
    }

    public function destroy($slug)
{
    $token = $_COOKIE['authToken'] ?? null;

    try {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token
        ])->delete("https://sinergi.dev.ybgee.my.id/api/blog/{$slug}");

        Log::info('Delete Response:', $response->json());

        if ($response->successful()) {
            return redirect()->route('blog.index')->with('success', 'Blog berhasil dihapus!');
        }
        return redirect()->back()->with('error', 'Gagal menghapus blog!');
    } catch (\Exception $e) {
        Log::error('Blog deletion error: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus blog.');
    }
}

public function uploadImage(Request $request)
{if ($request->hasFile('image')) {
    $image = $request->file('image');
    $filename = time() . '.' . $image->getClientOriginalExtension();
    $path = $image->storeAs('blog-image', $filename, 'public');

    return response()->json([
        'success' => true, 
        'url' => asset('storage/' . $path)
    ]);
}
return response()->json(['success' => false]);
}


}
