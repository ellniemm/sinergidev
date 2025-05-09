@extends('pages.layouts.layout')
@section('title', 'Dashboard Admin Sinergi Studio')

@section('main')
<div class="text-black bg-gray-50 min-h-screen p-6">

    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-6">
        <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Dashboard Admin</h1>
        <div class="flex flex-wrap gap-2">
            <a href="{{ route('product.index') }}"
                class="btn btn-xs md:btn-sm bg-blue-600 hover:bg-blue-700 text-white border-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 md:h-4 md:w-4 mr-1" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                New Product
            </a>
            <a href="{{ route('service.index') }}"
                class="btn btn-xs md:btn-sm bg-emerald-600 hover:bg-emerald-700 text-white border-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 md:h-4 md:w-4 mr-1" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                New Service
            </a>
            <a href="{{ route('blog.create') }}"
                class="btn btn-xs md:btn-sm bg-amber-600 hover:bg-amber-700 text-white border-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 md:h-4 md:w-4 mr-1" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                New Blog
            </a>
            <a href="{{ route('register') }}"
                class="btn btn-xs md:btn-sm bg-indigo-600 hover:bg-indigo-700 text-white border-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 md:h-4 md:w-4 mr-1" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                </svg>
                Register User
            </a>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 mb-6">
        <div class="bg-white rounded-lg shadow-sm p-4 border-l-4 border-blue-500">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-gray-500 font-medium">Total Products</p>
                    <h2 class="text-2xl font-bold text-gray-800">{{ $products_count ?? 0 }}</h2>
                </div>
                <div class="bg-blue-100 p-2 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                </div>
            </div>
            <div class="mt-2">
                <a href="{{ route('product.index') }}" class="text-sm text-blue-600 hover:underline">View all</a>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm p-4 border-l-4 border-emerald-500">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-gray-500 font-medium">Total Services</p>
                    <h2 class="text-2xl font-bold text-gray-800">{{ $services_count ?? 0 }}</h2>
                </div>
                <div class="bg-emerald-100 p-2 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
            </div>
            <div class="mt-2">
                <a href="{{ route('service.index') }}" class="text-sm text-emerald-600 hover:underline">View all</a>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm p-4 border-l-4 border-amber-500">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-gray-500 font-medium">Total Blogs</p>
                    <h2 class="text-2xl font-bold text-gray-800">{{ $blogs_count ?? 0 }}</h2>
                </div>
                <div class="bg-amber-100 p-2 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                    </svg>
                </div>
            </div>
            <div class="mt-2">
                <a href="{{ route('blog.index') }}" class="text-sm text-amber-600 hover:underline">View all</a>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm p-4 border-l-4 border-indigo-500">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-gray-500 font-medium">Total Users</p>
                    <h2 class="text-2xl font-bold text-gray-800">{{ $users_count ?? 0 }}</h2>
                </div>
                <div class="bg-indigo-100 p-2 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
            </div>
            <div class="mt-2">
                <a href="{{ route('user.index') }}" class="text-sm text-indigo-600 hover:underline">View all</a>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-sm p-4 border-l-4 border-purple-500">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-gray-500 font-medium">Total FQs</p>
                    <h2 class="text-2xl font-bold text-gray-800">{{ $faqs_count ?? 0 }}</h2>
                </div>
                <div class="bg-purple-100 p-2 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            <div class="mt-2">
                <a href="{{ route('faq.index') }}" class="text-sm text-purple-600 hover:underline">View all</a>
            </div>
        </div>
    </div>

    <!-- Recent Blogs, Users, and FAQs in the first row -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <!-- Recent Blogs -->
        <div class="bg-white rounded-lg shadow-sm p-5 md:h-[217px]">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-bold text-gray-700">Recent Blogs</h2>
                <a href="{{ route('blog.index') }}" class="text-sm text-amber-600 hover:underline">View all</a>
            </div>
            <ul class="space-y-3">
                @forelse ($latest_blogs ?? [] as $blog)
                <li class="border-b pb-3">
                    <div class="flex justify-between">
                        <div>
                            <h3 class="font-medium">{{ Str::limit($blog['blog_name'] ?? 'No Title', 30) }}</h3>
                            <p class="text-xs text-gray-500">By {{ $blog['creator'] ?? 'Unknown' }}</p>
                        </div>
                        <a href="{{ route('blog.edit', $blog['slug'] ?? '') }}"
                            class="btn btn-xs bg-amber-100 hover:bg-amber-200 text-amber-700 border-none">Edit</a>
                    </div>
                </li>
                @empty
                <li class="text-center text-gray-500 py-3">No blogs found</li>
                @endforelse
            </ul>
        </div>

        <!-- Recent Users -->
        <div class="bg-white rounded-lg shadow-sm p-5 md:h-[217px]">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-bold text-gray-700">Recent Users</h2>
                <a href="{{ route('user.index') }}" class="text-sm text-indigo-600 hover:underline">View all</a>
            </div>
            <ul class="space-y-3">
                @forelse ($latest_users ?? [] as $user)
                <li class="border-b pb-3">
                    <div class="flex justify-between">
                        <div>
                            <h3 class="font-medium">{{ $user['name'] ?? 'No Name' }}</h3>
                            <p class="text-xs text-gray-500">{{ $user['email'] ?? 'No Email' }}</p>
                        </div>
                    </div>
                </li>
                @empty
                <li class="text-center text-gray-500 py-3">No users found</li>
                @endforelse
            </ul>
        </div>

        <!-- Recent FAQs -->
        <div class="bg-white rounded-lg shadow-sm p-5 md:h-[217px]">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-bold text-gray-700">
                    Recent FQs
                    @if(isset($fq_not_replied) && $fq_not_replied > 0)
                        <span class="badge badge-error text-white ml-2">{{ $fq_not_replied }} unreplied</span>
                    @endif
                </h2>
                <a href="{{ route('faq.index') }}" class="text-sm text-purple-600 hover:underline">View all</a>
            </div>
            <ul class="space-y-3">
                @forelse ($latest_faqs ?? [] as $faq)
                <li class="border-b pb-3">
                    <div class="flex justify-between">
                        <div>
                            <h3 class="font-medium">
                                {{ Str::limit($faq['fq_fullname'] ?? 'No Name', 30) }}
                                @if(isset($faq['is_replied']) && $faq['is_replied'] == 0)
                                    <span class="badge badge-xs badge-error text-white ml-1">new</span>
                                @endif
                            </h3>
                            <p class="text-xs text-gray-500">{{ Str::limit($faq['fq_desc'] ?? 'No Description', 50) }}
                            </p>
                        </div>
                        <a href="{{ route('admin.faq.detail', $faq['fq_id']) }}"
                            class="btn btn-xs bg-purple-100 hover:bg-purple-200 text-purple-700 border-none">Reply</a>
                    </div>
                </li>
                @empty
                <li class="text-center text-gray-500 py-3">No FQs found</li>
                @endforelse
            </ul>
        </div>

    </div>

    <!-- Recent Products and Services in the second row -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Recent Products -->
        <div class="bg-white rounded-lg shadow-sm p-5">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-bold text-gray-700">Recent Products</h2>
                <a href="{{ route('product.index') }}" class="text-sm text-blue-600 hover:underline">View all</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="px-4 py-2 text-left">Product Name</th>
                            <th class="px-4 py-2 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($latest_products ?? [] as $product)
                        <tr class="border-b">
                            <td class="px-4 py-3">{{ $product['product_name'] ?? 'No Name' }}</td>
                            <td class="px-4 py-3 text-right">
                                <a href="{{ route('product.index') }}"
                                    class="btn btn-xs bg-blue-100 hover:bg-blue-200 text-blue-700 border-none">Edit</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="px-4 py-3 text-center text-gray-500">No products found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Recent Services -->
        <div class="bg-white rounded-lg shadow-sm p-5">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-bold text-gray-700">Recent Services</h2>
                <a href="{{ route('service.index') }}" class="text-sm text-emerald-600 hover:underline">View all</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="px-4 py-2 text-left">Service Name</th>
                            <th class="px-4 py-2 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($latest_services ?? [] as $service)
                        <tr class="border-b">
                            <td class="px-4 py-3">{{ $service['service_name'] ?? 'No Name' }}</td>
                            <td class="px-4 py-3 text-right">
                                <a href="{{ route('service.index') }}"
                                    class="btn btn-xs bg-emerald-100 hover:bg-emerald-200 text-emerald-700 border-none">Edit</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="px-4 py-3 text-center text-gray-500">No services found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection