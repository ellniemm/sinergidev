
<div>
    <!-- Search Form -->
    <div class="mb-8 flex justify-between">
        <form wire:submit.prevent="search" class="flex flex-col md:flex-row gap-4 w-full mr-4">
            <div class="relative flex-grow">
                <input type="text" wire:model.defer="searchTerm" placeholder="Search blog posts..."
                    class="w-full px-4 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <button type="submit"
                    class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </div>
            @if($isSearching)
            <button type="button" wire:click="resetSearch"
                class="px-4 py-2 bg-gray-200 text-gray-700 rounded-full hover:bg-gray-300 transition duration-200 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
                Clear Search
            </button>
            @endif
        </form>
        <!-- Category Dropdown -->
        <div class="relative w-full md:w-auto">
            <select
                class="appearance-none border border-gray-300 rounded-full py-2 px-4 pr-10 w-full md:w-48 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="all">All Categories</option>
                <option value="tech">Technology</option>
                <option value="life">Lifestyle</option>
                <option value="travel">Travel</option>
                <!-- Tambah kategori lain di sini -->
            </select>
        </div>
    </div>

    <!-- Search Results Indicator -->
    @if($isSearching)
    <div class="mb-6">
        <h2 class="text-xl font-semibold">
            @if(count($gridCard) > 0)
            Search results for "{{ $searchTerm }}" ({{ count($gridCard) }} found)
            @else
            No results found for "{{ $searchTerm }}"
            @endif
        </h2>
    </div>
    @endif

    <!-- Improved Loading Indicator for Search -->
    <div wire:loading wire:target="search" class="flex justify-center items-center py-4 mb-6">
        <div class="flex items-center bg-white px-4 py-2 rounded-lg shadow-md">
            <svg class="animate-spin h-5 w-5 mr-3 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor"
                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                </path>
            </svg>
            <span class="text-gray-700">Searching...</span>
        </div>
    </div>

    <!-- Initial Loading Indicator -->
    @if($isLoading && empty($blogs))
    <div class="flex justify-center items-center py-10">
        <div class="flex items-center bg-white px-4 py-2 rounded-lg shadow-md">
            <svg class="animate-spin h-5 w-5 mr-3 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor"
                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                </path>
            </svg>
            <span class="text-gray-700">Loading blog posts...</span>
        </div>
    </div>
    @else
    @if($bigCard && !$isSearching)
    <!-- Big Card - Only show when not searching -->
    <div
        class="card px-5 py-6 bg-[#D9D9D9] bg-opacity-25 rounded-2xl w-full mb-5 hover:shadow-lg transition-shadow duration-300">
        <div class="md:flex h-full gap-10">
            <div class="relative md:w-3/4">
                <!-- Thumbnail dengan link dan efek hover -->
                <a href="{{ route('blog.detail', $bigCard['slug']) }}"
                    class="block group relative overflow-hidden rounded-xl">

                    <img src="https://sinergi.dev.ybgee.my.id/img/blog/thumbnails/{{ $bigCard['blog_thumbnail'] }}"
                        class="rounded-xl w-full h-[300px] 2xl:h-[450px] object-cover transition-transform duration-500 hover:scale-105"
                        alt="{{ $bigCard['blog_name'] }}">
                    <div
                        class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                        <span class="text-white text-sm font-normal">Read More</span>
                    </div>
                </a>

                <!-- Kategori dengan desain yang lebih modern -->
                <div
                    class="absolute top-3 right-3 bg-white bg-opacity-90 text-black text-xs md:text-sm font-medium px-3 py-1 rounded-full shadow-sm backdrop-blur-sm">
                    {{ $bigCard['category_name'] }}
                </div>

                <!-- Tanggal dengan desain yang lebih modern -->
                <div
                    class="absolute bottom-3 left-3 bg-black bg-opacity-60 text-white text-xs md:text-sm font-medium px-3 py-1 rounded-full shadow-sm backdrop-blur-sm">
                    {{ \Carbon\Carbon::parse($bigCard['created_at'])->format('d M Y') }}
                </div>
            </div>
            <div class="md:w-2/4 2xl:w-2/3 md:flex md:flex-col justify-between">
                <div class="2xl:px-5">
                    <!-- Judul dengan link dan efek hover -->
                    <a href="{{ route('blog.detail', $bigCard['slug']) }}" class="block group">
                        <h2 class="font-semibold text-lg md:text-2xl 2xl:text-4xl mb-6 pt-5 md:pt-0 relative">
                            <!-- Teks normal yang selalu terlihat -->
                            <span class="block transition-opacity duration-300 ease-in-out group-hover:opacity-0">
                                {{ $bigCard['blog_name'] }}
                            </span>

                            <!-- Teks gradient yang muncul saat hover -->
                            <span
                                class="absolute top-0 left-0 right-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out bg-gradient-to-r from-[#4796A3] to-[#34668f] bg-clip-text text-transparent">
                                {{ $bigCard['blog_name'] }}
                            </span>
                        </h2>
                    </a>
                    <p class="text-[#6A6A6A] 2xl:text-xl font-medium leading-relaxed">
                        {{ Str::words(preg_replace('/&nbsp;/', ' ', strip_tags($bigCard['blog_desc'])), 30, '...') }}
                    </p>
                </div>
                <div class="flex items-center mt-6 md:mt-4">
                    <div class="flex items-center">
                        <p class="text-sm 2xl:text-base font-medium">By <span class="font-semibold">Sinergi Team</span>
                        </p>
                    </div>
                    <a href="{{ route('blog.detail', $bigCard['slug']) }}"
                        class="ml-auto text-[#4796A3] font-medium hover:underline flex items-center">
                        Read more
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- No Results Message (when searching) -->
    @if($isSearching && count($gridCard) == 0 && !$isLoading)
    <div class="bg-white bg-opacity-50 rounded-xl p-10 text-center shadow-sm">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400 mb-4" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <h3 class="text-xl font-medium text-gray-700 mb-2">No blog posts found</h3>
        <p class="text-gray-500 mb-4">We couldn't find any blog posts matching "{{ $searchTerm }}".</p>
        <button wire:click="resetSearch"
            class="px-4 py-2 bg-blue-500 text-white rounded-full hover:bg-blue-600 transition duration-200 inline-flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back to all blogs
        </button>
    </div>
    @endif

    <!-- No Results Message (when not searching but no blogs available) -->
    @if(!$isSearching && empty($blogs) && !$isLoading)
    <div class="bg-white bg-opacity-50 rounded-xl p-10 text-center shadow-sm">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400 mb-4" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1M19 20a2 2 0 002-2V8a2 2 0 00-2-2h-5M5 14h5m5-4h5M5 8h5" />
        </svg>
        <h3 class="text-xl font-medium text-gray-700 mb-2">No blog posts available</h3>
        <p class="text-gray-500">Check back later for new content.</p>
    </div>
    @endif

    <!-- Grid Cards -->
    @if(count($gridCard) > 0)
    <div class="md:grid grid-cols-3 gap-8">
        @foreach ($gridCard as $blog)
        <div
            class="card bg-[#D9D9D9] bg-opacity-25 rounded-2xl w-full h-full flex flex-col justify-between p-5 mb-6 md:mb-0 hover:shadow-lg hover: transition-shadow duration-300">
            <!-- Gambar dengan link dan efek hover -->
            <div class="relative w-full overflow-hidden rounded-xl">
                <a href="{{ route('blog.detail', $blog['slug']) }}" class="block group">
                    <img src="https://sinergi.dev.ybgee.my.id/img/blog/thumbnails/{{ $blog['blog_thumbnail'] }}"
                        class="bg-gray-300 rounded-xl w-full h-[180px] 2xl:h-[270px] object-cover transition-transform duration-500 hover:scale-105"
                        alt="{{ $blog['blog_name'] }}">
                    <div
                        class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                        <span class="text-white text-sm font-normal">Read More</span>
                    </div>
                </a>

                <!-- Kategori dengan desain yang lebih modern -->
                <div
                    class="absolute top-3 right-3 bg-white bg-opacity-90 text-black text-xs font-medium px-2.5 py-0.5 rounded-full shadow-sm">
                    {{ $blog['category_name'] }}
                </div>
            </div>

            <!-- Konten -->
            <div class="flex flex-col flex-grow justify-between mt-4">
                <div>
                    <!-- Judul dengan link dan efek hover -->
                    <a href="{{ route('blog.detail', $blog['slug']) }}" class="block group">
                        <h2 class="font-semibold text-lg 2xl:text-2xl mb-3 relative">
                            <!-- Teks normal yang selalu terlihat -->
                            <span class="block transition-opacity duration-300 ease-in-out group-hover:opacity-0">
                                {{ $blog['blog_name'] }}
                            </span>

                            <!-- Teks gradient yang muncul saat hover -->
                            <span
                                class="absolute top-0 left-0 right-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out bg-gradient-to-r from-[#4796A3] to-[#34668f] bg-clip-text text-transparent">
                                {{ $blog['blog_name'] }}
                            </span>
                        </h2>
                    </a>
                    <p class="text-[#6A6A6A] 2xl:text-xl font-medium leading-relaxed">
                        {{ Str::words(preg_replace('/&nbsp;/', ' ', strip_tags($blog['blog_desc'])), 15, '...') }}
                    </p>
                </div>
                <div class="flex items-center justify-between mt-4 pt-3 border-t border-gray-300 border-opacity-50">
                    <div class="text-sm font-medium text-gray-700 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-gray-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        {{ \Carbon\Carbon::parse($blog['created_at'])->format('d M Y') }}
                    </div>
                    <a href="{{ route('blog.detail', $blog['slug']) }}"
                        class="text-[#4796A3] text-sm font-medium hover:underline flex items-center">
                        Read more
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 ml-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif

    <!-- Load More Button -->
    @if($hasMoreBlog)
    <div class="text-center mt-10">
        <button wire:click="loadMore"
            class="text-black text-sm 2xl:text-xl px-7 py-2.5 border border-black rounded-full font-medium hover:bg-black hover:text-white transition duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500"
            wire:loading.attr="disabled" wire:loading.class="opacity-50 cursor-not-allowed">
            <span wire:loading.remove wire:target="loadMore" class="flex items-center justify-center">
                Load More
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </span>
            <span wire:loading wire:target="loadMore">
                <span
                    class="loading loading-spinner hover:bg-black hover:text-[#ffffff] transition duration-300"></span>
            </span>
        </button>
    </div>
    @endif
    @endif
</div>