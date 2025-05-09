@extends('pages.layouts.user')
@section('title', 'Products - Sinergi Studio')

@section('title', 'Product - Sinergi Studio')

@section('content')
<header class="bg-[#0D192F] relative">
    <div class=" flex justify-between  ">
        <div class="text-white pt-28 pb-20 2xl:pt-44 px-10 2xl:px-20">
            <h1 class="text-2xl md:text-5xl 2xl:text-7xl md:w-3/4 2xl:w-8/9 font-bold mb-7 2xl:mb-11">Temukan Produk
                Terbaik Kami
            </h1>
            <div
                class="text-base md:text-lg 2xl:text-4xl md:whitespace-pre-line font-normal text-gray-300 md:w-5/6 2xl:w-11/12">
                Kami menawarkan rangkaian produk berkualitas yang
                dirancang untuk memenuhi setiap kebutuhan Anda.
            </div>
        </div>
        <div class="pt-16 2xl:pt-28 ">
            <div class=" hidden  md:block self-center">
                {{-- <svg class="w-[430px] h-[330px] 2xl:w-[600px] 2xl:h-[500px]" viewBox="0 0 649 422" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <rect x="130.725" y="306.083" width="666" height="150" rx="75"
                        transform="rotate(-27 130.725 306.083)" stroke="url(#paint0_linear_491_77)" strokeWidth="10" />
                    <rect x="105.132" y="-20.4954" width="450.146" height="143.01" rx="71.5052"
                        transform="rotate(61 105.132 -20.4954)" stroke="url(#paint1_linear_491_77)" strokeWidth="10" />
                    <defs>
                        <linearGradient id="paint0_linear_491_77" x1="103" y1="463.898" x2="551" y2="56.8976"
                            gradientUnits="userSpaceOnUse">
                            <stop offset="0.205575" stopColor="#25427C" />
                            <stop offset="1" stopColor="#4796A3" />
                        </linearGradient>
                        <linearGradient id="paint1_linear_491_77" x1="92.7866" y1="125.718" x2="485.295" y2="-128.095"
                            gradientUnits="userSpaceOnUse">
                            <stop offset="0.205575" stopColor="#25427C" />
                            <stop offset="1" stopColor="#4796A3" />
                        </linearGradient>
                    </defs>
                </svg> --}}
                <svg class="w-[430px] h-[330px] 2xl:w-[600px] 2xl:h-[500px]" viewBox="0 0 649 422" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <rect x="130.725" y="306.083" width="666" height="150" rx="75"
                        transform="rotate(-27 130.725 306.083)" stroke="url(#paint0_linear_491_77)" stroke-width="10" />
                    <rect x="105.132" y="-20.4958" width="450.146" height="143.01" rx="71.5052"
                        transform="rotate(61 105.132 -20.4958)" stroke="url(#paint1_linear_491_77)" stroke-width="10" />
                    <defs>
                        <linearGradient id="paint0_linear_491_77" x1="103" y1="463.897" x2="551" y2="56.8975"
                            gradientUnits="userSpaceOnUse">
                            <stop offset="0.205575" stop-color="#25427C" />
                            <stop offset="1" stop-color="#4796A3" />
                        </linearGradient>
                        <linearGradient id="paint1_linear_491_77" x1="92.7866" y1="125.717" x2="485.295" y2="-128.096"
                            gradientUnits="userSpaceOnUse">
                            <stop offset="0.205575" stop-color="#25427C" />
                            <stop offset="1" stop-color="#4796A3" />
                        </linearGradient>
                    </defs>
                </svg>

            </div>
        </div>
    </div>
    <svg class=" -mb-10 sm:-mb-20  md:-mb-40 lg:-mb-48 2xl:-mb-52  z-0" viewBox="0 0 1728 768" fill="none"
        xmlns="http://www.w3.org/2000/svg">
        <path
            d="M-286.59 529.418C-296.758 525.102 -301.501 513.361 -297.185 503.193L-88.86 12.4095C-84.5441 2.24193 -72.8029 -2.50187 -62.6352 1.81403L384.249 191.505C394.417 195.821 399.161 207.562 394.845 217.73L186.519 708.514C182.203 718.681 170.462 723.425 160.294 719.109L-286.59 529.418Z"
            fill="url(#paint3_linear_491_77)" />
        <path
            d="M-407.59 576.418C-417.758 572.102 -422.501 560.361 -418.185 550.193L-209.86 59.4095C-205.544 49.2419 -193.803 44.4981 -183.635 48.814L263.249 238.505C273.417 242.821 278.161 254.562 273.845 264.73L65.5192 755.514C61.2033 765.681 49.4621 770.425 39.2945 766.109L-407.59 576.418Z"
            fill="url(#paint4_linear_491_77)" />
        <rect x="1" y="115" width="1728" height="496" fill="url(#paint5_linear_491_77)" />
        <defs>
            <linearGradient id="paint3_linear_491_77" x1="-193.023" y1="257.801" x2="290.682" y2="463.122"
                gradientUnits="userSpaceOnUse">
                <stop stop-color="white" stop-opacity="0" />
                <stop offset="1" stop-color="white" stop-opacity="1" />
            </linearGradient>
            <linearGradient id="paint4_linear_491_77" x1="-314.023" y1="304.801" x2="169.682" y2="510.122"
                gradientUnits="userSpaceOnUse">
                <stop stop-color="white" stop-opacity="0" />
                <stop offset="1" stop-color="white" stop-opacity="1" />
            </linearGradient>
            <linearGradient id="paint5_linear_491_77" x1="865" y1="479" x2="865" y2="183"
                gradientUnits="userSpaceOnUse">
                <stop stop-color="white" />
                <stop offset="1" stop-color="white" stop-opacity="0" />
            </linearGradient>
        </defs>
    </svg>
</header>
<section class="bg-white text-black w-full h-auto z-10 relative">
    <div class="container mx-auto px-7 lg:px-4 md:px-6 py-10">
        <h1
            class="w-full lg:w-3/4 2xl:w-5/6 mx-auto  text-2xl  md:text-4xl 2xl:text-6xl text-center mb-10 2xl:mb-16  font-semibold ">
            <span class="bg-gradient-to-r from-[#4796A3] to-[#142737] bg-clip-text text-transparent">Projek Kami</span>
        </h1>

        <div class="flex flex-col space-y-8 py-8">
            @if(isset($products[0]))
            {{-- === Project Card 1 === --}}
            <div class="w-full lg:w-3/4 2xl:w-5/6 mx-auto flex flex-col lg:flex-row items-center justify-between gap-8">
                <div class="w-full lg:w-1/2 mb-6 lg:mb-0 order-2 lg:order-none">
                    <h3 class="text-2xl 2xl:text-3xl font-semibold mb-4 2xl:mb-5">{{ $products[0]['product_name'] }}
                    </h3>
                    <div class="text-gray-500 mb-8 2xl:mb-10 md:whitespace-pre-line font-medium text-base 2xl:text-xl">
                        {{ $products[0]['product_desc'] }}
                    </div>
                    <a href="{{ route('products.detail', $products[0]['product_id'])}}"
                        class="2xl:text-lg border-2 border-black text-sm rounded-full px-5 py-2 text-black font-medium hover:bg-black hover:text-white transition duration-200">
                        View More
                    </a>
                </div>
                <div class="w-full lg:w-auto order-1 lg:order-none">
                    <img src="https://sinergi.dev.ybgee.my.id/img/product/{{ $products[0]['product_img'] }}"
                        class="rounded-lg bg-gray-400 w-[300px] h-[300px] shadow-2xl mx-auto">
                </div>
            </div>
            @endif

            @if(isset($products[1]))
            {{-- === Project Card 2 === --}}
            <div class="w-full lg:w-3/4 2xl:w-5/6 mx-auto flex flex-col md:flex-row items-center justify-between gap-8">
                <div class="w-full lg:w-auto">
                    <img src="https://sinergi.dev.ybgee.my.id/img/product/{{ $products[1]['product_img'] }}"
                        class="rounded-lg bg-gray-400 w-[300px] h-[300px] shadow-2xl mx-auto">
                </div>
                <div class="w-full lg:w-1/2 mb-6 lg:mb-0">
                    <h3 class="text-2xl 2xl:text-3xl font-semibold mb-4 2xl:mb-5">{{ $products[1]['product_name'] }}
                    </h3>
                    <div class="text-gray-500 mb-8 2xl:mb-10 md:whitespace-pre-line font-medium text-base 2xl:text-xl">
                        {{ $products[1]['product_desc'] }}
                    </div>
                    <a href="{{ route('products.detail', $products[1]['product_id'])}}"
                        class="2xl:text-lg border-2 border-black text-sm rounded-full px-5 py-2 text-black font-medium hover:bg-black hover:text-white transition duration-200">
                        Full Story
                    </a>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
@endsection