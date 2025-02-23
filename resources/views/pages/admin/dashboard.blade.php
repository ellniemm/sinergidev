@extends('pages.layouts.layout')
@section('title', 'Dashboard Admin')

@section('main')
<div class="text-black bg-gray-50 min-h-screen p-6">
    <h1 class="text-3xl font-bold text-gray-800">Dashboard Admin</h1>

    {{-- <!-- Statistik Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mt-6">
        <div class="card bg-blue-100 shadow-md p-4">
            <h2 class="text-lg font-bold text-gray-700">Total Produk</h2>
            <p class="text-3xl font-bold text-blue-600">{{ $products_count }}</p>
        </div>
        <div class="card bg-green-100 shadow-md p-4">
            <h2 class="text-lg font-bold text-gray-700">Total Layanan</h2>
            <p class="text-3xl font-bold text-green-600">{{ $services_count }}</p>
        </div>
        <div class="card bg-yellow-100 shadow-md p-4">
            <h2 class="text-lg font-bold text-gray-700">Total Blog</h2>
            <p class="text-3xl font-bold text-yellow-600">{{ $blogs_count }}</p>
        </div>
        <div class="card bg-red-100 shadow-md p-4">
            <h2 class="text-lg font-bold text-gray-700">Total Users</h2>
            <p class="text-3xl font-bold text-red-600">{{ $users_count }}</p>
        </div>
    </div>

    <!-- Produk & Layanan Terbaru -->
    <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white p-6 shadow-md rounded-md">
            <h2 class="text-xl font-bold text-gray-700">Produk Terbaru</h2>
            <ul class="mt-3 space-y-2">
                @forelse ($latest_products as $product)
                    <li class="p-3 border rounded-md bg-gray-50">
                        <h3 class="font-bold">{{ $product['name'] ?? 'No Name' }}</h3>
                        <p class="text-sm text-gray-600">{{ $product['price'] ?? 'No Price' }}</p>
                    </li>
                @empty
                    <li>No products found.</li>
                @endforelse
            </ul>
        </div>

        <div class="bg-white p-6 shadow-md rounded-md">
            <h2 class="text-xl font-bold text-gray-700">Layanan Terbaru</h2>
            <ul class="mt-3 space-y-2">
                @forelse ($latest_services as $service)
                    <li class="p-3 border rounded-md bg-gray-50">
                        <h3 class="font-bold">{{ $service['name'] ?? 'No Name' }}</h3>
                        <p class="text-sm text-gray-600">{{ $service['price'] ?? 'No Price' }}</p>
                    </li>
                @empty
                    <li>No services found.</li>
                @endforelse
            </ul>
        </div>
    </div>

    <!-- Blog & Users Terbaru -->
    <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white p-6 shadow-md rounded-md">
            <h2 class="text-xl font-bold text-gray-700">Blog Terbaru</h2>
            <ul class="mt-3 space-y-2">
                @forelse ($latest_blogs as $blog)
                    <li class="p-3 border rounded-md bg-gray-50">
                        <h3 class="font-bold">{{ $blog['title'] ?? 'No Title' }}</h3>
                        <p class="text-sm text-gray-600">Ditulis oleh {{ $blog['author'] ?? 'Unknown' }}</p>
                    </li>
                @empty
                    <li>No blogs found.</li>
                @endforelse
            </ul>
        </div>

        <div class="bg-white p-6 shadow-md rounded-md">
            <h2 class="text-xl font-bold text-gray-700">Users Terbaru</h2>
            <ul class="mt-3 space-y-2">
                @forelse ($latest_users as $user)
                    <li class="p-3 border rounded-md bg-gray-50">
                        <h3 class="font-bold">{{ $user['name'] ?? 'No Name' }}</h3>
                        <p class="text-sm text-gray-600">{{ $user['email'] ?? 'No Email' }}</p>
                    </li>
                @empty
                    <li>No users found.</li>
                @endforelse
            </ul>
        </div>
    </div>

    <!-- Feedback Terbaru -->
    <div class="mt-8 bg-white p-6 shadow-md rounded-md">
        <h2 class="text-xl font-bold text-gray-700">Feedback Pengguna</h2>
        <div class="overflow-x-auto">
            <table class="table w-full">
                <thead>
                    <tr class="text-gray-700">
                    <th>Nama</th>
                    <th>Pesan</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>John Doe</td>
                    <td>Bagus sekali!</td>
                    <td><span class="badge badge-warning">Pending</span></td>
                </tr>
                <tr>
                    <td>Jane Doe</td>
                    <td>Mohon perbaiki fitur ini.</td>
                    <td><span class="badge badge-success">Selesai</span></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- FAQ Section -->
    <div class="mt-8 bg-white p-6 shadow-md rounded-md">
        <h2 class="text-xl font-bold text-gray-700">Frequently Asked Questions</h2>
        <div class="overflow-x-auto">
            <table class="table w-full">
                <thead>
                    <tr class="text-gray-700">
                        <th>Question</th>
                        <th>Answer</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($faqs as $faq)
                        <tr>
                            <td>{{ $faq['question'] ?? 'No Question' }}</td>
                            <td>{{ $faq['answer'] ?? 'No Answer' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2">No FAQs found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div> --}}
</div>
@endsection
