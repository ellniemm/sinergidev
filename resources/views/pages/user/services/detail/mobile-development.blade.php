@extends('pages.layouts.user')
@section('title', 'Mobile Development - Sinergi Studio')

@section('content')
<header class="bg-[#0D192F] w-full">
    <div class="px-10 pt-32 w-5/6 pb-60 ">
        <div class="flex items-center space-x-2 mb-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                <g fill="#fff">
                    <path
                        d="M1.5 32h14a.5.5 0 0 0 0-1h-14a.5.5 0 0 1-.5-.5v-29a.5.5 0 0 1 .5-.5h21a.5.5 0 0 1 .5.5v5a.5.5 0 0 0 1 0v-5c0-.827-.673-1.5-1.5-1.5h-21C.673 0 0 .673 0 1.5v29c0 .827.673 1.5 1.5 1.5">
                    </path>
                    <path
                        d="M18 10.5v20c0 .827.673 1.5 1.5 1.5h11c.827 0 1.5-.673 1.5-1.5v-20c0-.827-.673-1.5-1.5-1.5h-11c-.827 0-1.5.673-1.5 1.5m13 0v20a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-20a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 .5.5">
                    </path>
                    <circle cx={12} cy={28} r={1}></circle>
                    <circle cx={25} cy={28} r={1}></circle>
                </g>
            </svg>
            <h1 class="text-3xl font-medium">
                Mobile App
                <span class="bg-gradient-to-r from-[#4796A3] to-[#25427C] bg-clip-text text-transparent">
                    Development
                </span>
            </h1>
        </div>

        <h1 class="font-bold text-5xl whitespace-pre-line border-t-2 pt-2">
            Bangun Aplikasi Mobile Berkualitas
            untuk Memikat Pengguna
        </h1>
    </div>
</header>
<section class="bg-white text-black">
    <div class="px-10 gap-7 py-20 flex flex-row justify-center ">
        <div class="text-2xl font-bold whitespace-pre-line border-r-2 pr-8 border-black flex items-start self-start">
            <span class="bg-gradient-to-r from-[#4796A3] to-[#0D192F] bg-clip-text text-transparent">Tingkatkan
                pertumbuhan
                perusahaan Anda dengan layanan
                Pengembangan Aplikasi Mobile</span>
        </div>
        <div class="text-lg  whitespace-pre-line  ">Kami memberikan solusi Pengembangan Mobile
            App menciptakan peluang untuk mengahasilkan
            Mobile App seperti yang anda inginkan.</div>
    </div>
    {{-- =Image= --}}
    <div class="relative">
        <div class="absolute inset-0 bg-[#0D192F] opacity-50 z-10"></div>
        <img src="{{ asset('img/mobiledev.png')}}" alt="Mobile-Development" class="w-full object-cover z-1 ">

    </div>
    <p class="text-xs text-gray-500 mt-2 text-center">Photo by <a
            href="https://cdn.axalize.vn/media/content/images/mobile-app-development-company_wsoXHkf.jpeg"
            target="_blank" class="underline hover:text-gray-700 transition-colors">Axalize</a></p>>

    <div class="px-20 pt-32 pb-20 w-11/12">
        <h1 class="text-4xl font-bold mb-5">
            <span class="bg-gradient-to-r from-[#4796A3] to-[#0D192F] bg-clip-text text-transparent">
                Sesuaikan Kebutuhan Aplikasi Mobile Anda
            </span>
        </h1>
        <p class="text-lg mb-10">
            Kami menawarkan layanan pengembangan aplikasi mobile yang sepenuhnya dapat
            disesuaikan dengan kebutuhan bisnis Anda. Dengan memahami preferensi dan
            kebutuhan bisnis Anda, kami berkomitmen untuk menciptakan aplikasi mobile yang
            menarik dan fungsional bagi pengguna Anda.
        </p>
        <h1 class="text-4xl font-bold mb-5">
            <span class="bg-gradient-to-r from-[#4796A3] to-[#0D192F] bg-clip-text text-transparent">
                Teknologi
            </span>
        </h1>
        <p class="text-lg mb-10">
            Kami menggunakan teknologi terbaru untuk memastikan aplikasi mobile Anda bekerja
            dengan optimal di berbagai perangkat. Mulai dari performa hingga keamanan, kami
            memastikan aplikasi Anda memiliki kualitas terbaik di setiap aspek.
        </p>
        <h1 class="text-4xl font-bold mb-5">
            <span class="bg-gradient-to-r from-[#4796A3] to-[#0D192F] bg-clip-text text-transparent">
                Desain dan Pengalaman Pengguna
            </span>
        </h1>
        <p class="text-lg mb-10">
            Pengalaman pengguna yang intuitif dan menarik adalah folus utama kami. Kami
            merancang antarmuka yang mudah digunakan seta estetis agar aplikasi Anda dapat
            memberikan kesan pertama yang kuat dan mempertahankan pengguna.
        </p>
        <h1 class="text-4xl font-bold mb-5">
            <span class="bg-gradient-to-r from-[#4796A3] to-[#0D192F] bg-clip-text text-transparent">
                Integrasi dan Skalabilitas
            </span>
        </h1>
        <p class="text-lg mb-10">
            Kami mengembangkan aplikasi yang dapat dengan mudah diintegrasikan dengan
            sistem lain dan dirancang untuk berkembang seiring kebutuhan bisnis Anda. Dengan
            arsitektur yang fleksibel, aplikasi Anda siap untuk menghadapi berbagai perkembangan
            di masa depan.
        </p>
        <h1 class="text-4xl font-bold mb-5">
            <span class="bg-gradient-to-r from-[#4796A3] to-[#0D192F] bg-clip-text text-transparent">
                Dukungan dan Pembaruan
            </span>
        </h1>
        <p class="text-lg mb-10">
            Kami menyediakan dukungan teknis dan layanan pembaruan untuk memastikan
            aplikasi Anda tetap relevan dan berjalan dengan lancar seiring waktu. Kami
            berkomitmen untuk memberikan solusi yang menjaga kualitas aplikasi di tengah
            perubahan teknologi.
        </p>
    </div>
</section>
{{-- <section class="bg-white text-black pt-10">
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
                <a href="#" class="text-sm  ">
                    Lihat Detail
                </a>
            </div>
            @if (isset($products[2]))

            <div class="flex flex-col gap-2">
                <img src="https://sinergi.dev.ybgee.my.id/img/product/{{ $products[2]['product_img'] }}" alt=""
                    class="rounded-2xl w-[300px] h-[200px] object-cover">
                <h1 class="text-2xl font-semibold mb-5">{{$products[2]['product_name']}}</h1>
                <a href="{{ route('products.detail', $products[2]['product_id'])}}" class="text-sm">
                    Lihat Detail
                </a>
            </div>
            @endif
            <div class="flex flex-col gap-2">
                <div class="bg-gray-400 rounded-2xl w-[300px] h-[200px]"></div>
                <h1 class="text-2xl font-semibold mb-5">Lorem, ipsum.</h1>
                <a href="#" class="text-sm  ">
                    Lihat Detail
                </a>
            </div>
        </div>
    </div>
</section> --}}
@endsection