<div>
   
    @if($isLoading && empty($blogs))
    <div class="flex justify-center items-center py-10">
        <div class="animate-spin rounded-full h-12 w-12 border-t-2 border-b-2 border-blue-500"></div>
    </div>
    @else
    @if($bigCard)

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


    <div class="md:grid grid-cols-3 gap-8">
        @foreach ($gridCard as $blog)
        <div
            class="card bg-[#D9D9D9] bg-opacity-25 rounded-2xl w-full h-full flex flex-col justify-between p-5 mb-6 md:mb-0 hover:shadow-lg hover: transition-shadow duration-300">
            <!-- Gambar dengan link dan efek hover -->
            <!-- Perbaikan untuk efek hover pada gambar -->
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