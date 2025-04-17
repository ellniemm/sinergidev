@extends('pages.layouts.user')
@section('title', 'Blog - Sinergi Studio')
@section('content')
<header class="bg-[#0D192F] relative text-white w-full">
    <div class="space-x-3 mb-0 flex items-start mx-auto justify-between">
        <div class="px-5 md:px-10 py-20 md:py-16 2xl:px-20 2xl:py-44 ">
            <h1 class="text-3xl md:text-5xl 2xl:text-7xl font-bold mb-2">
                Sinergi
                <span class="bg-gradient-to-r from-[#4796A3] to-[#34668f] bg-clip-text text-transparent">
                    Blog
                </span>
            </h1>
            <p class="text-sm font-medium md:text-lg 2xl:text-3xl text-white">
                Menyatukan Ide, Menyajikan Informasi
            </p>
        </div>
        <div class="md:py-1">
            <svg width="374" height="600" viewBox="0 0 574 800"
                class="self-center w-[150px] h-[350px] md:w-[254px] md:h-[300px] 2xl:w-[450px] 2xl:h-[800px]"
                fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M314 538.57C314 549.616 322.954 558.57 334 558.57H771.849C782.895 558.57 791.849 549.616 791.849 538.57V152C791.849 140.955 782.895 132 771.849 132H334C322.954 132 314 140.955 314 152V538.57Z"
                    fill="url(#paint0_linear_491_77)" />
                <path
                    d="M240 779.57C240 790.616 248.954 799.57 260 799.57H697.849C708.895 799.57 717.849 790.616 717.849 779.57V393C717.849 381.955 708.895 373 697.849 373H260C248.954 373 240 381.955 240 393L240 779.57Z"
                    fill="url(#paint1_linear_491_77)" />
                <path
                    d="M163 406.57C163 417.616 171.954 426.57 183 426.57H620.849C631.895 426.57 640.849 417.616 640.849 406.57V20.0004C640.849 8.95474 631.895 0.000432304 620.849 0.000432304H183C171.954 0.000432304 163 8.95474 163 20.0004L163 406.57Z"
                    fill="url(#paint2_linear_491_77)" />
                <path
                    d="M0 648.57C0 659.616 8.9543 668.57 20 668.57H457.849C468.895 668.57 477.849 659.616 477.849 648.57V262C477.849 250.955 468.895 242 457.849 242H20C8.95428 242 0 250.955 0 262L0 648.57Z"
                    fill="url(#paint3_linear_491_77)" />
                <defs>
                    <linearGradient id="paint0_linear_491_77" x1="552.925" y1="558.57" x2="552.925" y2="132"
                        gradientUnits="userSpaceOnUse">
                        <stop stop-color="white" stop-opacity="0" />
                        <stop offset="1" stop-color="white" stop-opacity="0.5" />
                    </linearGradient>
                    <linearGradient id="paint1_linear_491_77" x1="478.925" y1="799.57" x2="478.925" y2="373"
                        gradientUnits="userSpaceOnUse">
                        <stop stop-color="white" stop-opacity="0" />
                        <stop offset="1" stop-color="white" stop-opacity="0.5" />
                    </linearGradient>
                    <linearGradient id="paint2_linear_491_77" x1="401.925" y1="426.57" x2="401.925" y2="0.000432304"
                        gradientUnits="userSpaceOnUse">
                        <stop stop-color="white" stop-opacity="0" />
                        <stop offset="1" stop-color="white" stop-opacity="0.5" />
                    </linearGradient>
                    <linearGradient id="paint3_linear_491_77" x1="238.925" y1="668.57" x2="238.925" y2="242"
                        gradientUnits="userSpaceOnUse">
                        <stop stop-color="white" stop-opacity="0" />
                        <stop offset="1" stop-color="white" stop-opacity="0.5" />
                    </linearGradient>
                </defs>
            </svg>

        </div>
    </div>
    <div class="relative ">
        <svg class="absolute bottom-0 left-0 right-0 w-screen h-auto md:w-auto md:h-auto" viewBox="0 0 1728 400"
            fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect width="1729" height="410" fill="url(#paint0_linear_2117_2666)" />
            <defs>
                <linearGradient id="paint0_linear_2117_2666" x1="864.5" y1="364" x2="864.5" y2="200"
                    gradientUnits="userSpaceOnUse">
                    <stop stop-color="#FFFFFF" />
                    <stop offset="1" stop-color="#999999" stop-opacity="0" />
                </linearGradient>
            </defs>
        </svg>

    </div>
</header>
<div class="bg-white text-black font-semibold w-full">
    {{-- <div class="container flex items-center mx-auto justify-between py-4 px-6">
        <nav class="flex-1">
            <ul class="flex text-xs md:text-xl 2xl:text-2xl justify-start md:justify-center space-x-4 md:space-x-8">
                <li>
                    <a href="#">Tips & Trick</a>
                </li>
                <li>
                    <a href="#">Frontend</a>
                </li>
                <li>
                    <a href="#">Kategori</a>
                </li>
                <li>
                    <a href="#">Kategori</a>
                </li>
            </ul>
        </nav>
        <div class="ml-auto">
            <button>
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-[24px] h-[24px] md:w-[32px] md:h-[32px] 2xl:w-[40px] 2xl:h-[40px]" viewBox="0 0 24 24"
                    width="24" height="24" viewBox="0 0 24 24">
                    <defs>
                        <linearGradient id="gradient1" x1="0%" y1="0%" x2="100%" y2="0%">
                            <stop offset="0%" style="stop-color: #4796A3; stop-opacity: 1;" />
                            <stop offset="100%" style="stop-color: #34668f; stop-opacity: 1;" />
                        </linearGradient>
                    </defs>
                    <path fill="url(#gradient1)"
                        d="M9.5 16q-2.725 0-4.612-1.888T3 9.5t1.888-4.612T9.5 3t4.613 1.888T16 9.5q0 1.1-.35 2.075T14.7 13.3l5.6 5.6q.275.275.275.7t-.275.7t-.7.275t-.7-.275l-5.6-5.6q-.75.6-1.725.95T9.5 16m0-2q1.875 0 3.188-1.312T14 9.5t-1.312-3.187T9.5 5T6.313 6.313T5 9.5t1.313 3.188T9.5 14" />
                </svg>

            </button>
        </div>
    </div> --}}

    <div class="px-5 md:px-28 py-10 md:py-16">
        {{-- <h1 class="text-2xl md:text-4xl 2xl:text-5xl font-semibold mb-7">Latest <span
                class="bg-gradient-to-r from-[#4796A3] to-[#142737] bg-clip-text text-transparent">Post</span></h1> --}}
        <livewire:blog-list>
            {{-- @if ($bigCard) --}}
            {{-- Big Card --}}
            {{-- {{ dd($bigCard) }} --}}
            {{-- <a href="{{ route('blog.detail', $bigCard['slug']) }}">
                <div class="card px-5 py-6 bg-[#D9D9D9] bg-opacity-25 rounded-2xl w-full mb-5">
                    <div class="md:flex h-full gap-10">
                        <div class="relative md:w-3/4"> --}}
                            {{-- Blog Thumbail --}}
                            {{-- <img
                                src="https://sinergi.dev.ybgee.my.id/img/blog/thumbnails/{{ $bigCard['blog_thumbnail'] }}"
                                class=" rounded-xl w-full h-[300px] 2xl:h-[450px] object-cover"
                                alt="{{ $bigCard['blog_name'] }}">


                            <div
                                class="absolute top-4 right-3 bg-white text-black text-sm md:text-base 2xl:text-lg font-semibold px-4 py-1 rounded-full ">
                                {{ $bigCard['category_name']}}
                            </div>
                            <div
                                class="absolute bottom-4 left-3 bg-gray-500 font-semibold text-white text-sm md:text-base 2xl:text-lg px-4 py-1 rounded-full">
                                {{ \Carbon\Carbon::parse($bigCard['created_at'])->format('d M Y') }}
                            </div>
                        </div>
                        <div class="md:w-2/4 2xl:w-2/3 md:flex md:flex-col justify-between">
                            <div class="2xl:px-5 ">
                                <h2 class="font-semibold text-lg md:text-2xl 2xl:text-4xl mb-8 pt-5 md:pt-0">
                                    {{$bigCard['blog_name']}}
                                </h2>
                                <p class="text-[#6A6A6A] 2xl:text-xl font-medium">
                                    {{ Str::words(preg_replace('/&nbsp;/', ' ', strip_tags($bigCard['blog_desc'])), 30,
                                    '...') }}
                                </p>
                            </div>
                            <p class="mt-4 2xl:text-xl font-semibold">Sinergi Studio</p>
                        </div>
                    </div>
                </div>
            </a>
            @endif --}}
            {{-- Grid Card --}}
            {{-- <div class="md:grid grid-cols-3 gap-8">
                @foreach ($gridCard as $blog)
                <a href="{{ route('blog.detail', $blog['slug']) }}">
                    <div
                        class="card bg-[#D9D9D9] bg-opacity-25 rounded-2xl w-full h-full flex flex-col justify-between p-5">
                        --}}

                        <!-- Gambar -->
                        {{-- <div class="relative w-full">
                            <img src="https://sinergi.dev.ybgee.my.id/img/blog/thumbnails/{{ $blog['blog_thumbnail'] }}"
                                class="bg-gray-300 rounded-xl w-full h-[180px] 2xl:h-[270px] object-cover"
                                alt="{{ $blog['blog_name'] }}">
                            <div
                                class="absolute top-4 right-3 bg-white text-black text-sm md:text-base 2xl:text-lg font-semibold px-4 py-1 rounded-full">
                                {{ $blog['category_name'] }}
                            </div>
                        </div> --}}

                        <!-- Konten -->
                        {{-- <div class="flex flex-col flex-grow justify-between mt-4">
                            <div>
                                <h2 class="font-semibold text-lg 2xl:text-2xl mb-5 pt-2 md:pt-0x">
                                    {{ $blog['blog_name'] }}
                                </h2>
                                <p class="text-[#6A6A6A] 2xl:text-xl font-medium">
                                    {{ Str::words(preg_replace('/&nbsp;/', ' ', strip_tags($blog['blog_desc'])), 15,
                                    '...')
                                    }}
                                </p>
                            </div>
                            <p class="mt-4 text-base 2xl:text-xl font-semibold">
                                Sinergi Studio • {{ \Carbon\Carbon::parse($blog['created_at'])->format('d M Y') }}
                            </p>
                        </div>

                    </div>
                </a>
                @endforeach
            </div> --}}

    </div>
</div>
@endsection