@extends('pages.layouts.user')

@section('content')
<header class="bg-[#0D192F] ">
    <div class="flex flex-row justify-between">
        <div class="px-10 pt-36 ">
            <h1 class="font-medium text-2xl">
                Kelas Malam - Studio Tengah Malam
            </h1>
            <h1 class="font-bold pt-3 text-6xl">
                Kelas
                <span class="bg-gradient-to-r from-[#4796A3] to-[#25427C] bg-clip-text text-transparent">
                    Malam
                </span>
            </h1>
        </div>
        <div>
            <svg width="295" height="581" viewBox="0 0 395 681" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M343.469 673.414C350.328 682.072 362.907 683.531 371.565 676.671L714.765 404.778C723.423 397.919 724.881 385.34 718.022 376.682L477.972 73.6766C471.113 65.0187 458.533 63.5604 449.876 70.4195L106.676 342.313C98.018 349.172 96.5598 361.751 103.419 370.409L343.469 673.414Z"
                    fill="url(#paint0_linear_491_77)" />
                <path
                    d="M244.661 607.789C251.52 616.446 264.099 617.905 272.757 611.046L615.957 339.152C624.614 332.293 626.073 319.714 619.214 311.056L379.163 8.05076C372.304 -0.60718 359.725 -2.06544 351.067 4.79366L7.86759 276.687C-0.790357 283.546 -2.24859 296.125 4.6105 304.783L244.661 607.789Z"
                    fill="url(#paint1_linear_491_77)" />
                <defs>
                    <linearGradient id="paint0_linear_491_77" x1="507.218" y1="688.725" x2="242.329" y2="354.366"
                        gradientUnits="userSpaceOnUse">
                        <stop stop-color="white" stop-opacity="0" />
                        <stop offset="1" stop-color="white" stop-opacity="0.5" />
                    </linearGradient>
                    <linearGradient id="paint1_linear_491_77" x1="474.165" y1="512.725" x2="209.276" y2="178.366"
                        gradientUnits="userSpaceOnUse">
                        <stop stop-color="white" stop-opacity="0" />
                        <stop offset="1" stop-color="white" stop-opacity="0.5" />
                    </linearGradient>
                </defs>
            </svg>
        </div>
    </div>
</header>
<section>
    <header>
        <div class="flex">
            <div class="w-1/3 text-black bg-slate-200 mx-auto justify-items-center">
                <div class="px-10 py-24 ">
                    <h1 class="text-2xl font-semibold mb-3">Service :</h1>
                    <h1 class="font-medium text-xl text-gray-600">
                        Game Development
                    </h1>
                </div>
            </div>
            <div class="w-3/4 relative">
                <div class="px-28 py-24 relative bg-cover bg-center bg-no-repeat"
                    style="background-image: linear-gradient(rgba(0, 0, 0, 0.69), rgba(0, 0, 0, 0.703)), url('{{ asset('img/kelasmalamp.jpg') }}')">
                    <div class="relative z-10">
                        <h1 class="text-2xl font-semibold mb-3 text-white">About :</h1>
                        <p class="font-medium text-xl whitespace-pre-line text-gray-200">Kelas Malam : Escape From Karma
                            adalah game horor yang membawa pemain ke dalam
                            perjalanan mengerikan seorang pelajar yang
                            berusaha menebus kesalahan masa lalunya.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="bg-white">
        <div class="px-10 py-24">
            <div class="w-11/12 h-[500px] bg-gray-400 mb-10 mx-auto rounded-xl shadow-md">
                <iframe class="w-full h-full rounded-xl" src="https://www.youtube.com/embed/NhbtZuVHaEw"
                    title="Kelas Malam: Escape From Karma - Announcement Trailer | PC Games"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                </iframe>
            </div>

            <div class="text-black px-14 pb-10 ">
                <h1 class="text-4xl font-bold mb-7 ">
                    <span class="bg-gradient-to-r from-[#4796A3] to-[#0D192F] bg-clip-text text-transparent">
                        Sinopsis
                    </span>
                </h1>
                <p class="text-lg font-medium text-gray-600 mb-11">
                    Seorang pelajar yang bertekad menebus kesalahan masa lalunya
                    dihadapkan pada ujian. Namun, malam itu berubah menjadi mimpi
                    buruk saat kejadian-kejadian aneh dan mengerikan mulai menghantui
                    setiap langkahnya. Kini ia harus memilih : melarikan diri dari
                    teror yang terus memburu atau menghadapinya untuk membuktikan
                    bahwa dirinya benar-benar ingin berubah.
                </p>
                <h1 class="text-4xl font-bold mb-7 ">
                    <span class="bg-gradient-to-r from-[#4796A3] to-[#0D192F] bg-clip-text text-transparent">
                        Fitur-Fitur
                    </span>
                </h1>
                <p class="text-lg font-medium text-red-500 mb-11">
                    Fitur-fitur dalam game ini sedang dalam tahap pengembangan dan akan segera diumumkan.
                </p>
                <h1 class="text-4xl font-bold  ">
                    <span class="bg-gradient-to-r from-[#4796A3] to-[#0D192F] bg-clip-text text-transparent">
                        Preview
                    </span>
                </h1>
            </div>
            <div class="grid grid-cols-2 gap-4 px-10 pb-20">
                <div class="bg-gray-500 shadow-lg rounded-lg">
                    <img src="{{ asset('img/preview/kelasmalam.png')}}" alt="preview"
                        class="w-full h-full object-cover rounded-lg cursor-pointer" onclick="openGallery(0)">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-gray-500 shadow-lg aspect-video rounded-lg">
                        <img src="{{ asset('img/preview/ghost.png')}}" alt="preview"
                            class="w-full h-full object-cover rounded-lg cursor-pointer" onclick="openGallery(1)">
                    </div>
                    <div class="bg-gray-500 shadow-lg aspect-video rounded-lg">
                        <img src="{{ asset('img/preview/room.png')}}" alt="preview"
                            class="w-full h-full object-cover rounded-lg cursor-pointer" onclick="openGallery(2)">
                    </div>
                    <div class="bg-gray-500 shadow-lg aspect-video rounded-lg">
                        <img src="{{ asset('img/preview/paper.png')}}" alt="preview"
                            class="w-full h-full object-cover rounded-lg cursor-pointer" onclick="openGallery(3)">
                    </div>
                    <div class="bg-gray-500 shadow-lg aspect-video rounded-lg">
                        <img src="{{ asset('img/preview/multiuser.png')}}" alt="preview"
                            class="w-full h-full object-cover rounded-lg cursor-pointer" onclick="openGallery(4)">
                    </div>
                </div>
            </div>

            <!-- Image Gallery Modal -->
            <div id="gallery-modal" class="fixed inset-0 z-50 bg-black bg-opacity-90 items-center justify-center"
                style="display: none;">
                <div class="relative max-w-6xl w-full mx-auto">
                    <!-- Main Image -->
                    <div class="relative">
                        <img id="gallery-image" src="" alt="Gallery image" class="max-h-[80vh] mx-auto border-gray-700 rounded-xl border-2">

                        <!-- Navigation Buttons -->
                        <button id="prev-btn"
                            class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 p-2 rounded-r-lg text-white hover:bg-opacity-75">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>
                        <button id="next-btn"
                            class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 p-2 rounded-l-lg text-white hover:bg-opacity-75">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>

                    <!-- Close Button -->
                    <button id="close-btn"
                        class="absolute top-4 right-4 text-white bg-black bg-opacity-50 rounded-full p-2 hover:bg-opacity-75">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>

                    <!-- Image Counter -->
                    <div
                        class="absolute bottom-4 left-1/2 transform -translate-x-1/2 text-white bg-black bg-opacity-50 px-4 py-2 rounded-full">
                        <span id="current-index">1</span> / <span id="total-images">5</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Gallery images array
    const galleryImages = [
        '{{ asset('img/preview/kelasmalam.png') }}',
        '{{ asset('img/preview/ghost.png') }}',
        '{{ asset('img/preview/room.png') }}',
        '{{ asset('img/preview/paper.png') }}',
        '{{ asset('img/preview/multiuser.png') }}'
    ];
    
    let currentIndex = 0;
    const totalImages = galleryImages.length;
    
    // DOM elements
    const modal = document.getElementById('gallery-modal');
    const galleryImage = document.getElementById('gallery-image');
    const currentIndexEl = document.getElementById('current-index');
    const totalImagesEl = document.getElementById('total-images');
    const prevBtn = document.getElementById('prev-btn');
    const nextBtn = document.getElementById('next-btn');
    const closeBtn = document.getElementById('close-btn');
    
    // Initialize total images count
    totalImagesEl.textContent = totalImages;
    
    // Open gallery with specific image
    function openGallery(index) {
    currentIndex = index;
    updateGalleryImage();
    modal.style.display = 'flex';
}
    
    // Close gallery
    function closeGallery() {
    modal.style.display = 'none';
}
    
    // Update gallery image based on current index
    function updateGalleryImage() {
        galleryImage.src = galleryImages[currentIndex];
        currentIndexEl.textContent = currentIndex + 1;
    }
    
    // Navigate to previous image
    function prevImage() {
        currentIndex = (currentIndex - 1 + totalImages) % totalImages;
        updateGalleryImage();
    }
    
    // Navigate to next image
    function nextImage() {
        currentIndex = (currentIndex + 1) % totalImages;
        updateGalleryImage();
    }
    
    // Event listeners
    prevBtn.addEventListener('click', prevImage);
    nextBtn.addEventListener('click', nextImage);
    closeBtn.addEventListener('click', closeGallery);
    
    // Keyboard navigation
    document.addEventListener('keydown', function(e) {
        if (modal.classList.contains('flex')) {
            if (e.key === 'ArrowLeft') {
                prevImage();
            } else if (e.key === 'ArrowRight') {
                nextImage();
            } else if (e.key === 'Escape') {
                closeGallery();
            }
        }
    });
</script>
@endsection