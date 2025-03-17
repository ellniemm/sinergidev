@extends('pages.layouts.user')

@section('content')
<header class="bg-[#0D192F] w-full">
    <div class="px-10 pt-32 w-3/4 pb-60 ">
        <div class="flex items-center space-x-2 mb-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 512 512">
                <path fill="#fff"
                    d="M483.13 245.38C461.92 149.49 430 98.31 382.65 84.33A107.1 107.1 0 0 0 352 80c-13.71 0-25.65 3.34-38.28 6.88C298.5 91.15 281.21 96 256 96s-42.51-4.84-57.76-9.11C185.6 83.34 173.67 80 160 80a115.7 115.7 0 0 0-31.73 4.32c-47.1 13.92-79 65.08-100.52 161C4.61 348.54 16 413.71 59.69 428.83a56.6 56.6 0 0 0 18.64 3.22c29.93 0 53.93-24.93 70.33-45.34c18.53-23.1 40.22-34.82 107.34-34.82c59.95 0 84.76 8.13 106.19 34.82c13.47 16.78 26.2 28.52 38.9 35.91c16.89 9.82 33.77 12 50.16 6.37c25.82-8.81 40.62-32.1 44-69.24c2.57-28.48-1.39-65.89-12.12-114.37M208 240h-32v32a16 16 0 0 1-32 0v-32h-32a16 16 0 0 1 0-32h32v-32a16 16 0 0 1 32 0v32h32a16 16 0 0 1 0 32m84 4a20 20 0 1 1 20-20a20 20 0 0 1-20 20m44 44a20 20 0 1 1 20-19.95A20 20 0 0 1 336 288m0-88a20 20 0 1 1 20-20a20 20 0 0 1-20 20m44 44a20 20 0 1 1 20-20a20 20 0 0 1-20 20">
                </path>
            </svg>
            <h1 class="text-3xl font-medium">
                Game
                <span class="bg-gradient-to-r from-[#4796A3] to-[#25427C] bg-clip-text text-transparent">
                    Development
                </span>
            </h1>
        </div>

        <h1 class="font-bold text-5xl border-t-2 pt-2">
            Pengembangan Game Berkualitas Tinggi yang Disukai Pemain
        </h1>
    </div>
</header>
<section class="bg-white text-black">
    <div class="px-10 gap-7 py-20 flex flex-row justify-center ">
        <div class="text-2xl font-bold whitespace-pre-line border-r-2 pr-8 border-black flex items-start self-start">
            <span class="bg-gradient-to-r from-[#4796A3] to-[#0D192F] bg-clip-text text-transparent">Tingkatkan pertumbuhan
                perusahaan Anda dengan layanan
                Pengembangan Game</span>
        </div>
        <div class="text-lg  whitespace-pre-line  ">Kami memberikan solusi Pengembangan Game
            yang menciptakan peluang untuk mengahasilkan
            Game seperti yang Anda inginkan.</div>
    </div>
     {{-- =Image=  --}}
    <div class="relative">
        <div class="absolute inset-0 bg-[#0D192F] opacity-50 z-10"></div>
            <img src="{{ asset('img/Game-Development.jpg')}}" alt="Game-Development" class="w-full object-cover z-1 ">
    </div>


    <div class="px-20 pt-32 pb-20 w-11/12">
        <h1 class="text-4xl font-bold mb-5">
            <span class="bg-gradient-to-r from-[#4796A3] to-[#0D192F] bg-clip-text text-transparent">
                Sesuaikan Kebutuhan Game Anda
            </span>
        </h1>
        <p class="text-lg mb-10">
            Kami menyediakan layanan pengembangan game yang dapat disesuaikan sepenuhnya
            dengan Kebutuhan Anda. Dengan memahami preferensi unik dan kebutuhan spesifik
            Anda, kami berkomitmen untuk menghadirkan pengalaman bermain yang menarik dan
            sesuai dengan target pasar Anda.
        </p>
        <h1 class="text-4xl font-bold mb-5">
            <span class="bg-gradient-to-r from-[#4796A3] to-[#0D192F] bg-clip-text text-transparent">
                Teknologi
            </span>
        </h1>
        <p class="text-lg mb-10">
            Kami menggunakan teknologi terkini dan terdepan dalam industri game untuk
            menghadirkan performa terbaik. Mulai dari grafis, mekanisme permainan, hingga
            optimalisasi perangkat, kami memastikan setiap aspek game Anda berjalan mulus dan
            memukau.
        </p>
        <h1 class="text-4xl font-bold mb-5">
            <span class="bg-gradient-to-r from-[#4796A3] to-[#0D192F] bg-clip-text text-transparent">
                Desain dan Pengalaman Pengguna
            </span>
        </h1>
        <p class="text-lg mb-10">
            Desain dan interaksi yang imersif adalah inti dari pengalaman bermain yang hebat. Kami
            mengembangkan antarmuka yang intuitif dan estetis serta alur permainan yang
            menarik agar pemain betah dan terhubung dengan game Anda.
        </p>
        <h1 class="text-4xl font-bold mb-5">
            <span class="bg-gradient-to-r from-[#4796A3] to-[#0D192F] bg-clip-text text-transparent">
                Pengujian dan Pemeliharaan
            </span>
        </h1>
        <p class="text-lg mb-10">
            Kami melakukan pengujian secara menyeluruh untuk memastikan game berfungsi
            tanpa kendala. Layanan pemeliharaan juga kami sediakan untuk memastikan performa
            game tetap optimal dna bebas dari bug setelah dirilis.
        </p>
    </div>
</section>
<section class="bg-white text-black pt-10">
    <div>
        <h1 class="text-4xl font-semibold text-center">
            <span class="bg-gradient-to-r from-[#4796A3] to-[#0D192F] bg-clip-text text-transparent">
                Produk Kami Lainnya
            </span>
        </h1>
        <div class=" py-16 grid grid-cols-3 w-5/6 gap-20 mx-auto justify-items-center">
            <div class="flex flex-col gap-2">
                <div class="bg-gray-400 rounded-2xl w-[300px] h-[200px]"></div>
                <h1 class="text-2xl font-semibold mb-5">Lorem, ipsum.</h1>
                <a href="#" class="text-sm">
                Lihat Detail
                </a>
            </div>
            @if (isset($products[1]))
                
            <div class="flex flex-col gap-2">
                <img src="https://sinergi.dev.ybgee.my.id/img/product/{{ $products[1]['product_img'] }}" alt="" class="rounded-2xl w-[300px] h-[200px] object-cover">
                <h1 class="text-2xl font-semibold mb-5">{{$products[1]['product_name']}}</h1>
                <a href="{{ route('products.detail', $products[1]['product_id'])}}" class="text-sm">
                    Lihat Detail
                </a>
            </div>
            @endif
            <div class="flex flex-col gap-2">
                <div class="bg-gray-400 rounded-2xl w-[300px] h-[200px]"></div>
                <h1 class="text-2xl font-semibold mb-5">Lorem, ipsum.</h1>
                <a href="#" class="text-sm">
                Lihat Detail
                </a>
            </div>
        </div>
        
    </div>
</section>
@endsection