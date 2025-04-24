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

    <div class="px-5 md:px-28 py-10 md:py-16 ">
      
        <livewire:blog-list>
         

    </div>
</div>
@endsection