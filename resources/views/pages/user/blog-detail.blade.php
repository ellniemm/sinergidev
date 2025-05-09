@extends('pages.layouts.user')
@section('title', $blog['blog_name'] . ' - Sinergi Studio')


<style>
    .blog-content p {
        line-height: 1.7;
    }

    .blog-content h1 {
        font-size: 2em;
        font-weight: bold;
        margin: 0.67em 0;
    }

    .blog-content h2 {
        font-size: 1.5em;
        font-weight: bold;
        margin: 0.83em 0;
    }

    .blog-content h3 {
        font-size: 1.17em;
        font-weight: bold;
        margin: 1em 0;
    }

    .blog-content h4 {
        font-size: 1em;
        font-weight: bold;
        margin: 1.33em 0;
    }

    .blog-content blockquote {
        margin: 1em 40px;
        padding-left: 15px;
        border-left: 3px solid #ccc;
    }

    .blog-content ul {
        list-style-type: disc;
        margin: 1em 0;
        padding-left: 40px;
    }

    .blog-content ol {
        list-style-type: decimal;
        margin: 1em 0;
        padding-left: 40px;
    }

    .blog-content li {
        display: list-item;
        margin: 0.5em 0;
        padding-bottom: 7px;
    }


    .blog-content img {
        display: inline-block;
        vertical-align: middle;
        max-width: 100%;
        height: auto;
    }


    .blog-content p:has(img) {
        margin: 10px 0;
        text-align: left;

    }
</style>
@section('content')


<header class="bg-[#0D192F] text-white w-full">
    <div>
        <div class="pt-10 md:pt-28 pb-16 mx-auto text-center space-y-7">

            <h1 class="text-2xl md:text-4xl 2xl:text-6xl font-bold px-5 md:px-0 md:w-8/12 mx-auto">
                <span class="text-white">
                    {{ $blog['blog_name'] }}
                </span>
            </h1>

            <div class="flex items-center justify-center space-x-4">
                <h3 class="text-base md:text-lg 2xl:text-xl font-medium">
                    {{ \Carbon\Carbon::parse($blog['published_at'])->format('d M Y') }}
                </h3>

                <span class="text-gray-400">•</span>
                <span
                    class="bg-white bg-opacity-20 backdrop-blur-sm text-white text-xs md:text-sm font-medium px-4 py-1.5 rounded-full shadow-sm">
                    {{ $blog['category_name'] }}
                </span>
            </div>
        </div>

        <div class="relative w-full flex justify-center content-center">
            <img src="https://sinergi.dev.ybgee.my.id/img/blog/thumbnails/{{ $blog['blog_thumbnail'] }}"
                alt="{{ $blog['blog_name']}}"
                class="rounded-xl md:rounded-3xl w-[310px] h-[200px] md:w-[800px] md:h-[400px] 2xl:w-[1000px] 2xl:h-[500px] mt-4 md:mt-12 2xl:mt-14 z-10 object-cover shadow-lg transition-transform duration-500 hover:scale-[1.02]">

            <div
                class="absolute z-0 w-11/12 h-[200px] md:w-[900px] md:h-[450px] 2xl:w-[1121px] 2xl:h-[500px] bg-white rounded-2xl md:rounded-[66px] justify-items-center">
            </div>
            <svg class="absolute bottom-0 md:bottom-auto w-full" viewBox="0 0 1728 800" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <rect width="1729" height="800" fill="url(#paint0_linear_491_77)" />
                <defs>
                    <linearGradient id="paint0_linear_491_77" x1="864.5" y1="364" x2="864.5" y2="68"
                        gradientUnits="userSpaceOnUse">
                        <stop stop-color="#FFFFFF" />
                        <stop offset="1" stop-color="#999999" stop-opacity="0" />
                    </linearGradient>
                </defs>
            </svg>
        </div>
    </div>
</header>

<div class="bg-white text-black w-full relative z-10">
    <div class="blog-content mx-auto px-6 md:px-72 py-10 2xl:py-20 2xl:px-[500px]">

        <div class="prose prose-lg max-w-none">
            {!! $blog['blog_desc'] !!}
        </div>


        <div class="mt-16 pt-8 ">
            <p class="text-gray-500 text-sm italic">
                This article was written by {{ $blog['creator'] ?? 'Sinergi Studio' }}
            </p>
        </div>

    </div>
    <div class="mx-auto px-10 md:px-40 py-10">
        <div class="mt-16x pt-8 border-t border-gray-200">
            <h2 class="text-2xl md:text-3xl font-semibold mb-8">
                <span class="bg-gradient-to-r from-[#25427C] to-[#4796A3] bg-clip-text text-transparent">
                    Related Articles
                </span>
            </h2>
        
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @if(isset($relatedBlogs) && count($relatedBlogs) > 0)
                    @foreach($relatedBlogs as $relatedBlog)
                        <div class="card px-5 py-6 bg-[#D9D9D9] bg-opacity-25 rounded-2xl hover:shadow-lg transition-shadow duration-300">
                            <div class="relative">
                                <img src="https://sinergi.dev.ybgee.my.id/img/blog/thumbnails/{{ $relatedBlog['blog_thumbnail'] }}"
                                    alt="{{ $relatedBlog['blog_name'] }}"
                                    class="rounded-xl w-full h-[200px] object-cover transition-transform duration-500 hover:scale-105">
                                <div
                                    class="absolute top-3 right-3 bg-white bg-opacity-90 text-black text-xs font-medium px-3 py-1 rounded-full shadow-sm backdrop-blur-sm">
                                    {{ $relatedBlog['category_name'] }}
                                </div>
                            </div>
                            <div class="flex flex-col justify-between flex-grow">
                                <div>
                                    <h3 class="font-semibold text-lg py-4">
                                        <a href="{{ route('blog.detail', $relatedBlog['slug']) }}" class="hover:text-[#4796A3] transition-colors">
                                            {{ $relatedBlog['blog_name'] }}
                                        </a>
                                    </h3>
                                    <p class="text-[#6A6A6A] font-medium">
                                        {{ Str::limit(strip_tags($relatedBlog['blog_desc']), 50) }}
                                    </p>
                                </div>
                                <p class="mt-4 text-sm font-semibold">
                                    {{ $relatedBlog['creator'] ?? 'Sinergi Studio' }} • {{ \Carbon\Carbon::parse($relatedBlog['published_at'])->format('d M Y') }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-span-3 text-center py-8 text-gray-500">
                        <p>Tidak ada artikel terkait saat ini.</p>
                        <a href="{{ route('blog') }}" class="text-[#4796A3] hover:underline mt-2 inline-block">
                            Lihat semua artikel
                        </a>
                    </div>
                @endif
            </div>
        </div>
        


        
        <div class="mt-16 bg-gradient-to-r from-[#0D192F] to-[#34668f] rounded-2xl p-8 text-white">
            <div class="md:flex items-center justify-between">
                <div class="md:w-2/3 mb-6 md:mb-0">
                    <h3 class="text-xl md:text-2xl font-bold mb-2">Ready to start your project?</h3>
                    <p class="text-gray-200">Let's discuss how we can help bring your ideas to life with our expertise.
                    </p>
                </div>
                <div class="md:w-1/3 text-center">
                    <a href="{{ route('contact-us')}}"
                        class="inline-block bg-white text-[#0D192F] hover:bg-gray-100 transition-colors px-6 py-3 rounded-lg font-medium">
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="fixed bottom-8 right-8 z-50">
    <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})"
        class="bg-[#4796A3] hover:bg-[#34668f] text-white rounded-full p-3 shadow-lg transition-colors">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
        </svg>
    </button>
</div>
@endsection