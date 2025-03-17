@extends('pages.layouts.user')

@section('content')
<header class="bg-[#0D192F] w-full">
    <div class="px-10 pt-32 w-3/4 pb-60 ">
        <div class="flex items-center space-x-2 mb-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                <g fill="none">
                    <path
                        d="m12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z">
                    </path>
                    <path fill="#fff"
                        d="M19 4a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2zm0 6H5v7a1 1 0 0 0 .883.993L6 18h12a1 1 0 0 0 .993-.883L19 17zM6 6a1 1 0 1 0 0 2a1 1 0 0 0 0-2m3 0a1 1 0 1 0 0 2a1 1 0 0 0 0-2m3 0a1 1 0 1 0 0 2a1 1 0 0 0 0-2">
                    </path>
                </g>
            </svg>
            <h1 class="text-3xl font-medium">
                Web
                <span class="bg-gradient-to-r from-[#4796A3] to-[#25427C] bg-clip-text text-transparent">
                    Development
                </span>
            </h1>
        </div>

        <h1 class="font-bold text-5xl border-t-2 pt-2">
            Solusi Profesional untuk Website yang Memikat Pengguna
        </h1>
    </div>
</header>
<section class="bg-white text-black">
    <div class="px-10 gap-7 py-20 flex flex-row justify-center">
        <div class="text-2xl font-bold whitespace-pre-line border-r-2 pr-8 border-black flex items-start self-start">
            <span class="bg-gradient-to-r from-[#4796A3] to-[#0D192F] bg-clip-text text-transparent">Tingkatkan
                pertumbuhan
                perusahaan Anda dengan layanan
                Pengembangan Web khusus</span>
        </div>
        <div class="text-lg whitespace-pre-line self-start">Kami memberikan solusi Pengembangan Web
            yang akan menciptakan peluang untuk
            mengahasilkan lebih banyak prospek dan mencapai
            tujuan bisnis Anda.</div>
    </div>

    {{-- =Image= --}}
    <div class="relative">
        <div class="absolute inset-0 bg-[#0D192F] opacity-50 z-10"></div>
        <img src="{{ asset('img/Web-Development.jpg')}}" alt="Web-Development" class="w-full object-cover z-1 ">
    </div>


    <div class="px-20 pt-32 pb-20 w-11/12">
        <h1 class="text-4xl font-bold mb-5">
            <span class="bg-gradient-to-r from-[#4796A3] to-[#0D192F] bg-clip-text text-transparent">
                Sesuaikan Kebutuhan Bisnis
            </span>
        </h1>
        <p class="text-lg mb-10">
            Dengan kebutuhan bisnis kustomisasi, kami dengan cermat memahami
            minat, preferensi Anda, dan menganalisis informasi untuk memberi
            Anda layanan pengembangan web terbaik.
        </p>
        <h1 class="text-4xl font-bold mb-5">
            <span class="bg-gradient-to-r from-[#4796A3] to-[#0D192F] bg-clip-text text-transparent">
                Teknologi
            </span>
        </h1>
        <p class="text-lg mb-10">
            Kami menerapkan berbagai teknologi untuk mengembangkan, memproses,
            dan mengonfigurasi perangkat lunak berdasarkan kebutuhan isnis Anda
            yang akan membuat merek Anda menonjol.
        </p>
        <h1 class="text-4xl font-bold mb-5">
            <span class="bg-gradient-to-r from-[#4796A3] to-[#0D192F] bg-clip-text text-transparent">
                Back-End
            </span>
        </h1>
        <p class="text-lg mb-10">
            Kami memenuhi kebutuhan back end, database sesuai minat dan prefensi
            anda.
        </p>
        <h1 class="text-4xl font-bold mb-5">
            <span class="bg-gradient-to-r from-[#4796A3] to-[#0D192F] bg-clip-text text-transparent">
                Front-End
            </span>
        </h1>
        <p class="text-lg mb-10">
            Kami memenuhi kebutuhan tampilan front end sesuai design minat dan
            prefensi anda.
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
                <a href="#" class="text-sm  "></a>
                Lihat Detail
                </a>
            </div>
            @if (isset($products[0]))

            <div class="flex flex-col gap-2">
                <img src="https://sinergi.dev.ybgee.my.id/img/product/{{ $products[0]['product_img'] }}" alt=""
                    class="rounded-2xl w-[300px] h-[200px] object-cover">
                <h1 class="text-2xl font-semibold mb-5">{{$products[0]['product_name']}}</h1>
                <a href="{{ route('products.detail', $products[0]['product_id'])}}" class="text-sm">
                Lihat Detail
                </a>
            </div>
            @endif
            <div class="flex flex-col gap-2">
                <div class="bg-gray-400 rounded-2xl w-[300px] h-[200px]"></div>
                <h1 class="text-2xl font-semibold mb-5">Lorem, ipsum.</h1>
                <a href="#" class="text-sm  "></a>
                Lihat Detail
                </a>
            </div>
        </div>
    </div>
</section>
@endsection