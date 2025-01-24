@extends('pages.layouts.user')

@section('content')
    <!-- === Hero Section === -->
    <section class="bg-[#0D192F] text-white w-full">
        <div class="space-x-3 flex text-left items-center mx-auto md:gap-16 justify-between">
            <div class="w-full md:w-3/5 2xl:w-10/12 px-10 2xl:px-24 py-7 2xl:py-10">
                <h3 class="text-4xl md:text-5xl 2xl:text-8xl font-bold mb-8">
                    Kreativitas Digital & Inovatif Bersama Sinergi
                </h3>
                <div class="text-gray-400 mb-16 whitespace-pre-line md:font-medium text-lg 2xl:text-3xl">
                    Selamat datang di Sinergi.Studio, solusi lengkap untuk kebutuhan
                    digital Anda. Kami menyediakan jasa pembuatan website, aplikasi,
                    mobile, pengembangan game, dan pemasaran digital yang dirancang
                    khusus untuk membantu bisnis Anda berkembang.
                </div>
                <a href="#"
                    class="inline-flex items-center text-base 2xl:text-2xl text-white font-semibold bg-gray-400 bg-opacity-20 py-2 2xl:py-4 px-4 2xl:px-10 rounded-xl gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-[30px] [h-30px] 2xl:w-[40px] 2xl:h-[40px] text-white"
                        viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M3 21h2v-6H3zm9.46 1l-2.93-.64l-2.93-.69a.73.73 0 0 1-.43-.26a.7.7 0 0 1-.17-.47v-4a.77.77 0 0 1 .17-.47a.8.8 0 0 1 .43-.26l4.78-.59l4.79-.6l.15.56l.15.55a.93.93 0 0 1-.15.52a.9.9 0 0 1-.4.37l-2 .5l-2 .5l1.62.66l1.63.65l2.27-.64l2.21-.69a.78.78 0 0 1 .58.08a.73.73 0 0 1 .36.46l.19.77l.2.76a.77.77 0 0 1-.08.56a.78.78 0 0 1-.46.35l-3.63 1l-3.63 1a1.4 1.4 0 0 1-.36 0a1.1 1.1 0 0 1-.36.02M9 4L7 6L5 8l2 2l2 2l.7-.7l.7-.7l-1.3-1.3L7.8 8l1.3-1.3l1.3-1.3l-.7-.7zm6 0l-.7.7l-.7.7l1.3 1.3L16.2 8l-1.3 1.3l-1.3 1.3l.7.7l.7.7l2-2l2-2l-2-2z" />
                    </svg>
                    See Services
                </a>
            </div>
            <div class="py-2 md:w-auto">
                <div class="hidden lg:block self-center w-full">
                    <div class="hidden md:block">
                        <svg class="w-full h-auto 2xl:w-full 2xl:h-[800px]" viewBox="0 0 564 1072" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M239.309 290.041C247.119 282.23 259.782 282.23 267.593 290.041L498.549 520.997C506.36 528.808 506.36 541.471 498.549 549.282L274.583 773.248C266.773 781.058 254.109 781.058 246.299 773.248L15.3425 542.291C7.53197 534.481 7.53199 521.817 15.3425 514.007L239.309 290.041Z"
                                fill="white" fill-opacity="0.8" />
                            <path
                                d="M522.867 574.651C530.678 566.841 543.341 566.841 551.152 574.651L782.108 805.608C789.919 813.418 789.919 826.081 782.108 833.892L558.142 1057.86C550.332 1065.67 537.668 1065.67 529.858 1057.86L298.901 826.901C291.091 819.091 291.091 806.428 298.901 798.617L522.867 574.651Z"
                                fill="white" fill-opacity="0.8" />
                            <path
                                d="M515.747 14.6822C523.558 6.87174 536.221 6.87175 544.032 14.6822L774.988 245.639C782.798 253.449 782.798 266.112 774.988 273.923L551.022 497.889C543.211 505.7 530.548 505.7 522.738 497.889L291.781 266.933C283.971 259.122 283.971 246.459 291.781 238.648L515.747 14.6822Z"
                                fill="white" fill-opacity="0.8" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- === Project Section === -->
    <section class="bg-[#0D192F] text-white w-full h-auto">
        <div class="container mx-auto px-10 lg:px-4 md:px-6 py-10">
            <h1 class="w-full lg:w-3/4 2xl:w-5/6  mx-auto  text-3xl md:text-4xl 2xl:text-6xl font-bold">
                Projek
                <span class="bg-gradient-to-r from-[#4796A3] to-[#163981] bg-clip-text text-transparent"> Kami</span>
            </h1>

            <div class="flex flex-col space-y-8 py-14">
                {{-- === Project Card 1 ===  --}}
                <div class="w-full lg:w-3/4 2xl:w-5/6 mx-auto flex flex-col lg:flex-row items-center justify-between gap-8">
                    {{-- Left Side: Title, Description, Button --}}
                    <div class="w-full lg:w-1/2 mb-6 lg:mb-0">
                        <h3 class="text-xl 2xl:text-3xl font-bold mb-3 2xl:mb-5">Web Development</h3>
                        <div class="text-gray-400 mb-6 2xl:mb-10 whitespace-pre-line font-xl text-lg 2xl:text-2xl">
                            Pengembangan website dengan Laravel
                            memungkinnkan pengalaman pengguna yang
                            optimal dan kinerja yang luar biasa. Setiap
                            proyek dirancang secara khusus untuk
                            kebutuhan bisnis, memberikan solusi digital
                            yang efektif dan berkelanjutan.
                        </div>
                        <a href=""
                            class="2xl:text-lg  border-2 border-white rounded-full px-5 py-2 text-white font-medium hover:bg-white hover:text-[#1E2A38] transition duration-200">
                            View More
                        </a>
                    </div>

                    {{-- Right Side: Image  --}}
                    <div class="w-full lg:w-auto">
                        {{-- <img
              src="/placeholder300.png"
              width={300}
              height={300}
              alt="Web Development"
              class="rounded-lg w-full lg:w-[300px] h-auto object-cover"
            /> --}}
                    </div>
                </div>

                {{-- === Project Card 2 === --}}
                <div class="w-full lg:w-3/4 2xl:w-5/6 mx-auto flex flex-col md:flex-row items-center justify-between gap-8">
                    {{-- Right Side: Image  --}}
                    <div class="w-full lg:w-auto">
                        {{-- <Image
              src="/placeholder300.png"
              width={300}
              height={300}
              alt="Web Development"
              class="rounded-lg w-full lg:w-[300px] h-auto object-cover"
            /> --}}
                    </div>

                    {{-- Left Side: Title, Description, Button  --}}
                    <div class="w-full lg:w-1/2 2xl:w-5/6 mb-6 lg:mb-0">
                        <h3 class="text-xl  2xl:text-3xl 2xl:mb-5 font-bold mb-3 ">
                            Mobile App Development
                        </h3>
                        <div class="text-gray-400 2xl:text-2xl 2xl:mb-10 mb-6 whitespace-pre-line font-xl text-lg">
                            Pengembangan aplikasi mobile dengan berbagai
                            platform, memastikan pengalaman pengguna yang
                            lancar dan tampilan yang menarik. Kami membuat
                            aplikasi yang disesuaikan dengan kebutuhan
                            bisnis yang berkembang.
                        </div>
                        <a href=""
                            class="2xl:text-lg  border-2 border-white rounded-full px-5 py-2 text-white font-medium hover:bg-white hover:text-[#1E2A38] transition duration-200">
                            View More
                        </a>
                    </div>
                </div>

                {{-- === Project Card 3 ===  --}}
                <div class="w-full lg:w-3/4 2xl:w-5/6 mx-auto flex flex-col lg:flex-row items-center justify-between gap-8">
                    {{-- Left Side: Title, Description, Button  --}}
                    <div class="w-full lg:w-1/2 mb-6 lg:mb-0">
                        <h3 class="text-xl 2xl:text-3xl 2xl:mb-5 font-bold mb-3">UI/UX Design</h3>
                        <div class="text-gray-400 2xl:text-2xl 2xl:mb-10 mb-6 whitespace-pre-line font-xl text-lg">
                            Desain antarmuka dan pengalaman pengguna yang
                            intuitif dan menarik. Kami berfokus pada
                            menciptakan desain yang sesuai dengan tujuan
                            bisnis dan memberikan pengalaman yang memuaskan.
                        </div>
                        <a href=""
                            class="2xl:text-lg  border-2 border-white rounded-full px-5 py-2 text-white font-medium hover:bg-white hover:text-[#1E2A38] transition duration-200">
                            View More
                        </a>
                    </div>

                    {{-- Right Side: Image  --}}
                    <div class="w-full lg:w-auto">
                        {{-- <Image
              src="/placeholder300.png"
              width={300}
              height={300}
              alt="Web Development"
              class="rounded-lg w-full lg:w-[300px] h-auto object-cover"
            /> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- === Fakta section === --}}
    <section class="bg-white text-black w-full">
        <div class="w-3/4 mx-auto py-10">
            <h1 class="text-center py-20 font-bold text-4xl 2xl:text-6xl">
                Fakta <span class="text-[#4796A3]">Kami</span>
            </h1>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 mb-8">
                {{-- Fakta 1 --}}
                <div class="flex flex-col items-center">
                    <div class="flex items-center space-x-2">
                        <div class="text-6xl text-gray-400 mr-2">
                            {{-- <svg viewBox="0 0 172 178" fill="none" xmlns="http://www.w3.org/2000/svg"
                                class="w-24 h-24 2xl:w-32 2xl:h-32">
                                <path fillRule="evenodd" clipRule="evenodd"
                                    d="M43.0001 80.1001C47.5618 80.1001 51.9367 78.2247 55.1623 74.8866C58.3879 71.5485 60.2001 67.021 60.2001 62.3001C60.2001 57.5792 58.3879 53.0517 55.1623 49.7136C51.9367 46.3754 47.5618 44.5001 43.0001 44.5001C38.4383 44.5001 34.0635 46.3754 30.8378 49.7136C27.6122 53.0517 25.8001 57.5792 25.8001 62.3001C25.8001 67.021 27.6122 71.5485 30.8378 74.8866C34.0635 78.2247 38.4383 80.1001 43.0001 80.1001ZM43.0001 89.0001C46.3882 89.0001 49.7431 88.3095 52.8733 86.9677C56.0035 85.6259 58.8477 83.6592 61.2434 81.1799C63.6392 78.7005 65.5396 75.7571 66.8362 72.5177C68.1327 69.2784 68.8001 65.8064 68.8001 62.3001C68.8001 58.7938 68.1327 55.3218 66.8362 52.0825C65.5396 48.8431 63.6392 45.8997 61.2434 43.4203C58.8477 40.941 56.0035 38.9743 52.8733 37.6325C49.7431 36.2907 46.3882 35.6001 43.0001 35.6001C36.1575 35.6001 29.5952 38.4131 24.7567 43.4203C19.9183 48.4276 17.2001 55.2188 17.2001 62.3001C17.2001 69.3814 19.9183 76.1726 24.7567 81.1799C29.5952 86.1871 36.1575 89.0001 43.0001 89.0001Z"
                                    fill="#6A6A6A" />
                                <path fillRule="evenodd" clipRule="evenodd"
                                    d="M33.1444 79.1746C33.5449 79.588 33.8626 80.0791 34.0794 80.6197C34.2961 81.1603 34.4077 81.7399 34.4077 82.3252C34.4077 82.9105 34.2961 83.4901 34.0794 84.0308C33.8626 84.5714 33.5449 85.0625 33.1444 85.4758L30.2376 88.4751C24.6436 94.2659 21.5008 102.119 21.5 110.307V126.825C21.5 128.005 21.047 129.137 20.2406 129.972C19.4342 130.806 18.3405 131.275 17.2 131.275C16.0596 131.275 14.9659 130.806 14.1595 129.972C13.3531 129.137 12.9 128.005 12.9 126.825V110.307C12.9012 99.7584 16.9505 89.6422 24.1574 82.1828L27.0556 79.1746C27.4551 78.7602 27.9296 78.4314 28.452 78.2071C28.9744 77.9827 29.5344 77.8673 30.1 77.8673C30.6656 77.8673 31.2257 77.9827 31.7481 78.2071C32.2705 78.4314 32.745 78.7602 33.1444 79.1746ZM134.556 76.5046C134.155 76.918 133.837 77.4091 133.621 77.9497C133.404 78.4903 133.292 79.0699 133.292 79.6552C133.292 80.2405 133.404 80.8201 133.621 81.3608C133.837 81.9014 134.155 82.3925 134.556 82.8058L137.462 85.8051C143.056 91.5959 146.199 99.4486 146.2 107.637V126.825C146.2 128.005 146.653 129.137 147.459 129.972C148.266 130.806 149.36 131.275 150.5 131.275C151.64 131.275 152.734 130.806 153.541 129.972C154.347 129.137 154.8 128.005 154.8 126.825V107.637C154.799 97.0884 150.75 86.9722 143.543 79.5128L140.644 76.5046C140.245 76.0902 139.77 75.7614 139.248 75.5371C138.726 75.3127 138.166 75.1973 137.6 75.1973C137.034 75.1973 136.474 75.3127 135.952 75.5371C135.43 75.7614 134.955 76.0902 134.556 76.5046Z"
                                    fill="#6A6A6A" />
                                <path fillRule="evenodd" clipRule="evenodd"
                                    d="M120.4 80.1001C115.838 80.1001 111.463 78.2247 108.238 74.8866C105.012 71.5484 103.2 67.021 103.2 62.3001C103.2 57.5792 105.012 53.0517 108.238 49.7136C111.463 46.3754 115.838 44.5001 120.4 44.5001C124.962 44.5001 129.337 46.3754 132.562 49.7136C135.788 53.0517 137.6 57.5792 137.6 62.3001C137.6 67.021 135.788 71.5484 132.562 74.8866C129.337 78.2247 124.962 80.1001 120.4 80.1001ZM120.4 89.0001C117.012 89.0001 113.657 88.3095 110.527 86.9677C107.397 85.6259 104.552 83.6592 102.157 81.1799C99.7609 78.7005 97.8605 75.7571 96.5639 72.5177C95.2673 69.2784 94.6 65.8064 94.6 62.3001C94.6 58.7938 95.2673 55.3218 96.5639 52.0824C97.8605 48.8431 99.7609 45.8997 102.157 43.4203C104.552 40.941 107.397 38.9743 110.527 37.6325C113.657 36.2907 117.012 35.6001 120.4 35.6001C127.243 35.6001 133.805 38.4131 138.643 43.4203C143.482 48.4276 146.2 55.2188 146.2 62.3001C146.2 69.3814 143.482 76.1726 138.643 81.1799C133.805 86.1871 127.243 89.0001 120.4 89.0001ZM81.7 117.925C75.9978 117.925 70.5292 120.269 66.4972 124.442C62.4651 128.615 60.2 134.274 60.2 140.175V151.745C60.2 152.925 59.7469 154.057 58.9405 154.892C58.1341 155.726 57.0404 156.195 55.9 156.195C54.7595 156.195 53.6658 155.726 52.8594 154.892C52.053 154.057 51.6 152.925 51.6 151.745V140.175C51.6 131.914 54.7712 123.99 60.4161 118.149C66.0609 112.307 73.717 109.025 81.7 109.025C89.683 109.025 97.339 112.307 102.984 118.149C108.629 123.99 111.8 131.914 111.8 140.175V151.745C111.8 152.925 111.347 154.057 110.541 154.892C109.734 155.726 108.64 156.195 107.5 156.195C106.36 156.195 105.266 155.726 104.459 154.892C103.653 154.057 103.2 152.925 103.2 151.745V140.175C103.2 137.253 102.644 134.36 101.563 131.66C100.483 128.961 98.8992 126.508 96.9028 124.442C94.9063 122.376 92.5362 120.737 89.9277 119.619C87.3192 118.501 84.5234 117.925 81.7 117.925Z"
                                    fill="#6A6A6A" />
                                <path fillRule="evenodd" clipRule="evenodd"
                                    d="M81.7 104.575C86.2617 104.575 90.6366 102.7 93.8623 99.3617C97.0879 96.0235 98.9 91.4961 98.9 86.7752C98.9 82.0543 97.0879 77.5268 93.8623 74.1887C90.6366 70.8506 86.2617 68.9752 81.7 68.9752C77.1383 68.9752 72.7634 70.8506 69.5378 74.1887C66.3122 77.5268 64.5 82.0543 64.5 86.7752C64.5 91.4961 66.3122 96.0235 69.5378 99.3617C72.7634 102.7 77.1383 104.575 81.7 104.575ZM81.7 113.475C88.5426 113.475 95.1049 110.662 99.9434 105.655C104.782 100.648 107.5 93.8565 107.5 86.7752C107.5 79.6939 104.782 72.9027 99.9434 67.8954C95.1049 62.8882 88.5426 60.0752 81.7 60.0752C74.8574 60.0752 68.2951 62.8882 63.4567 67.8954C58.6182 72.9027 55.9 79.6939 55.9 86.7752C55.9 93.8565 58.6182 100.648 63.4567 105.655C68.2951 110.662 74.8574 113.475 81.7 113.475Z"
                                    fill="#6A6A6A" />
                            </svg> --}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-24 h-24 2xl:w-32 2xl:h-32" viewBox="0 0 20 20">
                                <g fill="#6A6A6A" fill-rule="evenodd" clip-rule="evenodd">
                                    <path d="M5 9a2 2 0 1 0 0-4a2 2 0 0 0 0 4m0 1a3 3 0 1 0 0-6a3 3 0 0 0 0 6" />
                                    <path
                                        d="M3.854 8.896a.5.5 0 0 1 0 .708l-.338.337A3.47 3.47 0 0 0 2.5 12.394v1.856a.5.5 0 1 1-1 0v-1.856a4.47 4.47 0 0 1 1.309-3.16l.337-.338a.5.5 0 0 1 .708 0m11.792-.3a.5.5 0 0 0 0 .708l.338.337A3.47 3.47 0 0 1 17 12.094v2.156a.5.5 0 0 0 1 0v-2.156a4.47 4.47 0 0 0-1.309-3.16l-.337-.338a.5.5 0 0 0-.708 0" />
                                    <path
                                        d="M14 9a2 2 0 1 1 0-4a2 2 0 0 1 0 4m0 1a3 3 0 1 1 0-6a3 3 0 0 1 0 6m-4.5 3.25a2.5 2.5 0 0 0-2.5 2.5v1.3a.5.5 0 0 1-1 0v-1.3a3.5 3.5 0 0 1 7 0v1.3a.5.5 0 1 1-1 0v-1.3a2.5 2.5 0 0 0-2.5-2.5" />
                                    <path d="M9.5 11.75a2 2 0 1 0 0-4a2 2 0 0 0 0 4m0 1a3 3 0 1 0 0-6a3 3 0 0 0 0 6" />
                                </g>
                            </svg>
                        </div>
                        <div class="text-[#4796A3] font-bold text-5xl 2xl:text-7xl">0</div>
                    </div>
                    <p class="text-gray-500 text-center mt-1 font-medium text-lg 2xl:text-2xl">
                        Client and Patners
                    </p>
                </div>
                {{-- Fakta 2 --}}
                <div class="flex flex-col items-center">
                    <div class="flex items-center space-x-2">
                        <div class="text-6xl text-gray-400 mr-2">
                            {{-- <svg class="w-24 h-24 2xl:w-32 2xl:h-32" viewBox="0 0 172 178" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M64.5 81.5832L86 103.833L157.667 29.6665" stroke="#6A6A6A" strokeWidth="10"
                                    strokeLinecap="round" strokeLinejoin="round" />
                                <path
                                    d="M150.5 89V140.917C150.5 144.851 148.99 148.624 146.302 151.405C143.614 154.187 139.968 155.75 136.167 155.75H35.8333C32.0319 155.75 28.3862 154.187 25.6981 151.405C23.0101 148.624 21.5 144.851 21.5 140.917V37.0833C21.5 33.1493 23.0101 29.3764 25.6981 26.5946C28.3862 23.8128 32.0319 22.25 35.8333 22.25H114.667"
                                    stroke="#6A6A6A" strokeWidth="10" strokeLinecap="round" strokeLinejoin="round" />
                            </svg> --}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-24 h-24 2xl:w-32 2xl:h-32" viewBox="0 0 24 24">
                                <path fill="#6A6A6A"
                                    d="M18 20.75H6A2.75 2.75 0 0 1 3.25 18V6A2.75 2.75 0 0 1 6 3.25h8.86a.75.75 0 0 1 0 1.5H6A1.25 1.25 0 0 0 4.75 6v12A1.25 1.25 0 0 0 6 19.25h12A1.25 1.25 0 0 0 19.25 18v-7.71a.75.75 0 0 1 1.5 0V18A2.75 2.75 0 0 1 18 20.75" />
                                <path fill="#6A6A6A"
                                    d="M10.5 15.25A.74.74 0 0 1 10 15l-3-3a.75.75 0 0 1 1-1l2.47 2.47L19 5a.75.75 0 0 1 1 1l-9 9a.74.74 0 0 1-.5.25" />
                            </svg>
                        </div>
                        <div class="text-[#4796A3] font-bold text-5xl 2xl:text-7xl">0</div>
                    </div>
                    <p class="text-gray-500 text-center mt-1 font-medium text-lg 2xl:text-2xl">
                        Problem Solved
                    </p>
                </div>
                {{-- Fakta 3  --}}
                <div class="flex flex-col items-center">
                    <div class="flex items-center space-x-2">
                        <div class="text-6xl text-gray-400 mr-2">
                            {{-- <svg class="w-24 h-24 2xl:w-32 2xl:h-32" viewBox="0 0 172 178" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M85.9999 163.167C125.58 163.167 157.667 129.961 157.667 89.0002C157.667 48.039 125.58 14.8335 85.9999 14.8335C46.4195 14.8335 14.3333 48.039 14.3333 89.0002C14.3333 129.961 46.4195 163.167 85.9999 163.167Z"
                                    stroke="#6A6A6A" strokeWidth="10" strokeLinecap="round" strokeLinejoin="round" />
                                <path d="M86 44.5V89L114.667 103.833" stroke="#6A6A6A" strokeWidth="10"
                                    strokeLinecap="round" strokeLinejoin="round" />
                            </svg> --}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-24 h-24 2xl:w-32 2xl:h-32" viewBox="0 0 24 24">
                                <g fill="none" stroke="#6A6A6A" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.5">
                                    <path d="M12 6v6l4 2" />
                                    <path d="M21 12a9 9 0 1 1-18 0a9 9 0 0 1 18 0" />
                                </g>
                            </svg>
                        </div>
                        <div class="text-[#4796A3] font-bold text-5xl 2xl:text-7xl">0</div>
                    </div>
                    <div class="text-gray-500 text-center whitespace-pre-line mt-1 font-medium 2xl:font-lg 2xl:text-2xl">
                        Years Expirience in
                        this industry</div>
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 py-4 gap-8 mb-8 mx-auto sm:w-2/3">
                {{-- Fakta 4 --}}
                <div class="flex flex-col items-center">
                    <div class="flex items-center space-x-2">
                        <div class="text-6xl text-gray-400 mr-2">
                            {{-- <svg class="w-24 h-24 2xl:w-32 2xl:h-32" viewBox="0 0 172 172" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M113.531 86.7846C124.118 91.7824 133.145 99.5676 139.645 109.305C146.144 119.043 149.871 130.367 150.425 142.061C150.498 143.132 150.358 144.208 150.01 145.224C149.663 146.24 149.116 147.176 148.402 147.978C147.688 148.78 146.82 149.431 145.851 149.893C144.882 150.355 143.83 150.619 142.758 150.669C141.685 150.719 140.613 150.554 139.605 150.185C138.597 149.815 137.673 149.248 136.887 148.516C136.101 147.784 135.469 146.903 135.029 145.924C134.588 144.944 134.348 143.887 134.321 142.814C133.735 130.392 128.388 118.674 119.39 110.09C110.393 101.507 98.4351 96.7184 85.9999 96.7184C73.5648 96.7184 61.6072 101.507 52.6094 110.09C43.6116 118.674 38.2647 130.392 37.6787 142.814C37.5339 144.916 36.5716 146.878 34.9979 148.28C33.4241 149.682 31.3641 150.412 29.2589 150.313C27.1537 150.215 25.1707 149.296 23.7346 147.754C22.2984 146.211 21.5233 144.168 21.5752 142.061C22.1281 130.368 25.8529 119.045 32.3504 109.308C38.848 99.5697 47.8731 91.7839 58.4585 86.7846C51.6753 81.1268 46.7997 73.5168 44.4948 64.9898C42.1898 56.4629 42.5675 47.4328 45.5764 39.1281C48.5852 30.8234 54.0793 23.6471 61.3111 18.5753C68.543 13.5036 77.1616 10.7827 85.9946 10.7827C94.8276 10.7827 103.446 13.5036 110.678 18.5753C117.91 23.6471 123.404 30.8234 126.413 39.1281C129.422 47.4328 129.799 56.4629 127.494 64.9898C125.189 73.5168 120.314 81.1268 113.531 86.7846ZM112.875 53.7499C112.875 46.6222 110.043 39.7864 105.003 34.7464C99.9634 29.7064 93.1276 26.8749 85.9999 26.8749C78.8723 26.8749 72.0365 29.7064 66.9965 34.7464C61.9564 39.7864 59.125 46.6222 59.125 53.7499C59.125 60.8776 61.9564 67.7134 66.9965 72.7534C72.0365 77.7934 78.8723 80.6249 85.9999 80.6249C93.1276 80.6249 99.9634 77.7934 105.003 72.7534C110.043 67.7134 112.875 60.8776 112.875 53.7499Z"
                                    fill="#6A6A6A" />
                            </svg> --}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-24 h-24 2xl:w-32 2xl:h-32" viewBox="0 0 24 24">
                                <path fill="#6A6A6A"
                                    d="M12 2.5a5.5 5.5 0 0 1 3.096 10.047a9.005 9.005 0 0 1 5.9 8.181a.75.75 0 1 1-1.499.044a7.5 7.5 0 0 0-14.993 0a.75.75 0 0 1-1.5-.045a9.005 9.005 0 0 1 5.9-8.18A5.5 5.5 0 0 1 12 2.5M8 8a4 4 0 1 0 8 0a4 4 0 0 0-8 0" />
                            </svg>
                        </div>
                        <div class="text-[#4796A3] font-bold text-5xl 2xl:text-7xl">19</div>
                    </div>
                    <p class="text-gray-500 text-center mt-1 font-medium text-lg 2xl:text-2xl">
                        Sinergi Talent
                    </p>
                </div>
                {{-- Fakta 4 --}}
                <div class="flex flex-col items-center">
                    <div class="flex items-center space-x-2">
                        <div class="text-6xl text-gray-400 mr-2">
                            {{-- <svg class="w-24 h-24 2xl:w-32 2xl:h-32" viewBox="0 0 172 178" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M85.9999 163.167C125.58 163.167 157.667 129.961 157.667 89.0002C157.667 48.039 125.58 14.8335 85.9999 14.8335C46.4195 14.8335 14.3333 48.039 14.3333 89.0002C14.3333 129.961 46.4195 163.167 85.9999 163.167Z"
                                    stroke="#6A6A6A" strokeWidth="10" strokeLinecap="round" strokeLinejoin="round" />
                                <path
                                    d="M57.3333 103.833C57.3333 103.833 68.0833 118.667 85.9999 118.667C103.917 118.667 114.667 103.833 114.667 103.833"
                                    stroke="#6A6A6A" strokeWidth="10" strokeLinecap="round" strokeLinejoin="round" />
                                <path d="M64.5 66.75H64.5717" stroke="#6A6A6A" strokeWidth="10" strokeLinecap="round"
                                    strokeLinejoin="round" />
                                <path d="M107.5 66.75H107.572" stroke="#6A6A6A" strokeWidth="10" strokeLinecap="round"
                                    strokeLinejoin="round" />
                            </svg> --}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-24 h-24 2xl:w-32 2xl:h-32"
                                viewBox="0 0 24 24">
                                <g fill="none" stroke="#6A6A6A" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.5">
                                    <path d="M9 9h.01M15 9h.01M8 14q4 4 8 0" />
                                    <circle cx="12" cy="12" r="10" />
                                </g>
                            </svg>
                        </div>
                        <div class="text-[#4796A3] font-bold text-5xl 2xl:text-7xl">4</div>
                    </div>
                    <p class="text-gray-500 text-center mt-1 font-medium text-lg 2xl:text-2xl">
                        Client Happy
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- === Layanan Kami section === --}}
    <section class="bg-[#5D82AC] w-full  py-16 relative overflow-hidden">
        <div class="w-3/4 mx-auto container py-16 ">
            <h1 class="text-4xl 2xl:text-6xl font-bold text-white">
                Layanan
                <span class="bg-gradient-to-r from-[#0D192F] to-[#294F95] bg-clip-text text-transparent"> Kami
                </span>
            </h1>
        </div>

        <div class="flex flex-col lg:flex-row gap-4 2xl:gap-8 w-5/6 2xl:w-8/12 mx-auto justify-center ">
            {{-- Card 1 - Left Side  --}}
            <div class="bg-[#0D192F] text-white p-6 rounded-xl shadow-lg lg:w-2/6 w-full py-16 z-10">
                <div>
                    <svg class="w-[50px] h-[50px] 2xl:w-[60px] 2xl:h-[60px]" viewBox="0 0 70 78" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M62.2221 0C64.2849 0 66.2632 0.819442 67.7218 2.27806C69.1804 3.73667 69.9999 5.71498 69.9999 7.77778V54.4445C69.9999 56.5072 69.1804 58.4856 67.7218 59.9442C66.2632 61.4028 64.2849 62.2222 62.2221 62.2222H7.77766C5.71486 62.2222 3.73655 61.4028 2.27794 59.9442C0.81932 58.4856 -0.00012207 56.5072 -0.00012207 54.4445V7.77778C-0.00012207 5.71498 0.81932 3.73667 2.27794 2.27806C3.73655 0.819442 5.71486 0 7.77766 0H62.2221ZM62.2221 23.3333H7.77766V50.5556C7.77778 51.5081 8.12748 52.4274 8.76044 53.1392C9.39339 53.851 10.2656 54.3058 11.2115 54.4172L11.6665 54.4445H58.3332C59.2857 54.4443 60.2051 54.0946 60.9169 53.4617C61.6287 52.8287 62.0834 51.9565 62.1949 51.0106L62.2221 50.5556V23.3333ZM11.6665 7.77778C10.6351 7.77778 9.64599 8.1875 8.91669 8.91681C8.18738 9.64612 7.77766 10.6353 7.77766 11.6667C7.77766 12.6981 8.18738 13.6872 8.91669 14.4165C9.64599 15.1458 10.6351 15.5556 11.6665 15.5556C12.6979 15.5556 13.6871 15.1458 14.4164 14.4165C15.1457 13.6872 15.5554 12.6981 15.5554 11.6667C15.5554 10.6353 15.1457 9.64612 14.4164 8.91681C13.6871 8.1875 12.6979 7.77778 11.6665 7.77778ZM23.3332 7.77778C22.3018 7.77778 21.3127 8.1875 20.5834 8.91681C19.854 9.64612 19.4443 10.6353 19.4443 11.6667C19.4443 12.6981 19.854 13.6872 20.5834 14.4165C21.3127 15.1458 22.3018 15.5556 23.3332 15.5556C24.3646 15.5556 25.3538 15.1458 26.0831 14.4165C26.8124 13.6872 27.2221 12.6981 27.2221 11.6667C27.2221 10.6353 26.8124 9.64612 26.0831 8.91681C25.3538 8.1875 24.3646 7.77778 23.3332 7.77778ZM34.9999 7.77778C33.9685 7.77778 32.9793 8.1875 32.25 8.91681C31.5207 9.64612 31.111 10.6353 31.111 11.6667C31.111 12.6981 31.5207 13.6872 32.25 14.4165C32.9793 15.1458 33.9685 15.5556 34.9999 15.5556C36.0313 15.5556 37.0204 15.1458 37.7497 14.4165C38.479 13.6872 38.8888 12.6981 38.8888 11.6667C38.8888 10.6353 38.479 9.64612 37.7497 8.91681C37.0204 8.1875 36.0313 7.77778 34.9999 7.77778Z"
                            fill="white" />
                    </svg>
                </div>
                <h3 class="text-2xl 2xl:text-4xl font-bold mb-4 2xl:mb-7">Web Development</h3>
                <p class="text-gray-400 font-medium 2xl:text-2xl mb-10 w-11/12 ">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eum quae
                    id saepe consequuntur, tenetur nulla error nemo. Doloremque
                    temporibus, a sit laboriosam iste quia aliquid soluta doloribus
                    nisi, at aperiam!
                </p>
                <p class="text-gray-400 font-medium 2xl:text-2xl mb-10 w-11/12 ">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aperiam
                    repudiandae atque quod aliquam neque. Impedit?
                </p>
                <Link href="" class="text-white 2xl:text-xl font-semibold rounded-xl mt-5">
                Learn More
                </Link>
            </div>

            {{-- Right Side Container for Cards 2 & 3  --}}
            <div class="flex flex-col gap-4 2xl:gap-8 lg:justify-center lg:w-1/2 2xl:w-2/4 w-full">
                {{-- Card 2  --}}
                <div class="bg-white text-[#0D192F] p-6 rounded-xl shadow-lg z-10">
                    <div>
                        <svg class="w-[50px] h-[50px] 2xl:w-[60px] 2xl:h-[60px]" viewBox="0 0 70 70" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g clipPath="url(#clip0_536_104)">
                                <path
                                    d="M3.28125 70H33.9062C34.1963 70 34.4745 69.8848 34.6796 69.6796C34.8848 69.4745 35 69.1963 35 68.9062C35 68.6162 34.8848 68.338 34.6796 68.1329C34.4745 67.9277 34.1963 67.8125 33.9062 67.8125H3.28125C2.99117 67.8125 2.71297 67.6973 2.50785 67.4921C2.30273 67.287 2.1875 67.0088 2.1875 66.7188V3.28125C2.1875 2.99117 2.30273 2.71297 2.50785 2.50785C2.71297 2.30273 2.99117 2.1875 3.28125 2.1875H49.2188C49.5088 2.1875 49.787 2.30273 49.9921 2.50785C50.1973 2.71297 50.3125 2.99117 50.3125 3.28125V14.2188C50.3125 14.5088 50.4277 14.787 50.6329 14.9921C50.838 15.1973 51.1162 15.3125 51.4062 15.3125C51.6963 15.3125 51.9745 15.1973 52.1796 14.9921C52.3848 14.787 52.5 14.5088 52.5 14.2188V3.28125C52.5 1.47219 51.0278 0 49.2188 0H3.28125C1.47219 0 0 1.47219 0 3.28125V66.7188C0 68.5278 1.47219 70 3.28125 70Z"
                                    fill="#0D192F" />
                                <path
                                    d="M39.375 22.9688V66.7188C39.375 68.5278 40.8472 70 42.6562 70H66.7188C68.5278 70 70 68.5278 70 66.7188V22.9688C70 21.1597 68.5278 19.6875 66.7188 19.6875H42.6562C40.8472 19.6875 39.375 21.1597 39.375 22.9688ZM67.8125 22.9688V66.7188C67.8125 67.0088 67.6973 67.287 67.4921 67.4921C67.287 67.6973 67.0088 67.8125 66.7188 67.8125H42.6562C42.3662 67.8125 42.088 67.6973 41.8829 67.4921C41.6777 67.287 41.5625 67.0088 41.5625 66.7188V22.9688C41.5625 22.6787 41.6777 22.4005 41.8829 22.1954C42.088 21.9902 42.3662 21.875 42.6562 21.875H66.7188C67.0088 21.875 67.287 21.9902 67.4921 22.1954C67.6973 22.4005 67.8125 22.6787 67.8125 22.9688Z"
                                    fill="#0D192F" />
                                <path
                                    d="M26.25 63.4375C27.4581 63.4375 28.4375 62.4581 28.4375 61.25C28.4375 60.0419 27.4581 59.0625 26.25 59.0625C25.0419 59.0625 24.0625 60.0419 24.0625 61.25C24.0625 62.4581 25.0419 63.4375 26.25 63.4375Z"
                                    fill="#0D192F" />
                                <path
                                    d="M54.6875 63.4375C55.8956 63.4375 56.875 62.4581 56.875 61.25C56.875 60.0419 55.8956 59.0625 54.6875 59.0625C53.4794 59.0625 52.5 60.0419 52.5 61.25C52.5 62.4581 53.4794 63.4375 54.6875 63.4375Z"
                                    fill="#0D192F" />
                            </g>
                            <defs>
                                <clipPath id="clip0_536_104">
                                    <rect width="70" height="70" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                    </div>
                    <h3 class="text-2xl 2xl:text-3xl font-bold mb-4 2xl:mb-7 mt-2 2xl:mt-4">
                        Mobile App Development
                    </h3>
                    <p class="font-medium 2xl:text-2xl mb-8">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                        Doloremque ipsa ab magni culpa non quod cumque, officia at odio
                        repudiandae.
                    </p>
                    <Link href="" class="font-bold 2xl:text-xl">
                    Learn More
                    </Link>
                </div>

                {{-- Card 3  --}}
                <div class="bg-white text-[#0D192F] p-6 rounded-xl shadow-lg z-10">
                    <div>
                        <svg class="w-[50px] h-[50px] 2xl:w-[60px] 2xl:h-[60px]" viewBox="0 0 70 70" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M66.0529 33.5482C63.1531 20.4382 58.789 13.441 52.3154 11.5297C50.9546 11.1304 49.543 10.931 48.1249 10.9377C46.2505 10.9377 44.6181 11.3943 42.8913 11.8783C40.8105 12.4621 38.4466 13.1252 34.9999 13.1252C31.5533 13.1252 29.188 12.4634 27.1031 11.8797C25.3749 11.3943 23.7439 10.9377 21.8749 10.9377C20.4085 10.9325 18.9485 11.1313 17.5368 11.5283C11.0974 13.4314 6.73607 20.4259 3.79388 33.54C0.630208 47.6521 2.18743 56.5621 8.16068 58.6293C8.97945 58.9179 9.84095 59.0667 10.7091 59.0695C14.8011 59.0695 18.0824 55.6611 20.3245 52.8707C22.8579 49.7125 25.8234 48.1101 34.9999 48.1101C43.1962 48.1101 46.5882 49.2216 49.5181 52.8707C51.3597 55.1648 53.1001 56.7699 54.8365 57.7802C57.1456 59.1228 59.4535 59.4209 61.6943 58.6511C65.2243 57.4466 67.2478 54.2625 67.7099 49.1847C68.0613 45.291 67.5199 40.1763 66.0529 33.5482ZM28.4374 32.8127H24.0624V37.1877C24.0624 37.7678 23.832 38.3242 23.4217 38.7345C23.0115 39.1447 22.4551 39.3752 21.8749 39.3752C21.2948 39.3752 20.7384 39.1447 20.3281 38.7345C19.9179 38.3242 19.6874 37.7678 19.6874 37.1877V32.8127H15.3124C14.7323 32.8127 14.1759 32.5822 13.7656 32.172C13.3554 31.7617 13.1249 31.2053 13.1249 30.6252C13.1249 30.045 13.3554 29.4886 13.7656 29.0784C14.1759 28.6681 14.7323 28.4377 15.3124 28.4377H19.6874V24.0627C19.6874 23.4825 19.9179 22.9261 20.3281 22.5159C20.7384 22.1056 21.2948 21.8752 21.8749 21.8752C22.4551 21.8752 23.0115 22.1056 23.4217 22.5159C23.832 22.9261 24.0624 23.4825 24.0624 24.0627V28.4377H28.4374C29.0176 28.4377 29.574 28.6681 29.9842 29.0784C30.3945 29.4886 30.6249 30.045 30.6249 30.6252C30.6249 31.2053 30.3945 31.7617 29.9842 32.172C29.574 32.5822 29.0176 32.8127 28.4374 32.8127ZM39.9218 33.3595C39.381 33.3595 38.8523 33.1992 38.4027 32.8987C37.953 32.5983 37.6025 32.1712 37.3956 31.6716C37.1886 31.1719 37.1345 30.6221 37.24 30.0917C37.3455 29.5613 37.6059 29.0741 37.9883 28.6917C38.3707 28.3093 38.8579 28.0488 39.3884 27.9433C39.9188 27.8378 40.4686 27.892 40.9682 28.0989C41.4678 28.3059 41.8949 28.6564 42.1954 29.106C42.4958 29.5557 42.6562 30.0844 42.6562 30.6252C42.6562 31.3504 42.3681 32.0459 41.8553 32.5587C41.3425 33.0715 40.647 33.3595 39.9218 33.3595ZM45.9374 39.3752C45.3963 39.3752 44.8674 39.2146 44.4176 38.9139C43.9678 38.6131 43.6173 38.1856 43.4106 37.6856C43.2038 37.1856 43.1501 36.6354 43.2561 36.1048C43.3622 35.5742 43.6233 35.087 44.0064 34.7049C44.3895 34.3227 44.8773 34.0629 45.4082 33.9581C45.9391 33.8534 46.4891 33.9085 46.9886 34.1165C47.4881 34.3245 47.9147 34.6761 48.2143 35.1266C48.5139 35.5772 48.6732 36.1065 48.6718 36.6476C48.67 37.3716 48.3811 38.0654 47.8685 38.5767C47.3559 39.088 46.6615 39.3752 45.9374 39.3752ZM45.9374 27.3439C45.3966 27.3439 44.868 27.1835 44.4183 26.8831C43.9686 26.5826 43.6182 26.1556 43.4112 25.6559C43.2042 25.1563 43.1501 24.6065 43.2556 24.0761C43.3611 23.5457 43.6215 23.0584 44.0039 22.676C44.3863 22.2936 44.8736 22.0332 45.404 21.9277C45.9344 21.8222 46.4842 21.8763 46.9838 22.0833C47.4835 22.2903 47.9105 22.6407 48.211 23.0904C48.5114 23.5401 48.6718 24.0687 48.6718 24.6095C48.6718 25.3347 48.3837 26.0302 47.8709 26.543C47.3581 27.0558 46.6626 27.3439 45.9374 27.3439ZM51.9531 33.3595C51.4123 33.3595 50.8836 33.1992 50.4339 32.8987C49.9843 32.5983 49.6338 32.1712 49.4268 31.6716C49.2199 31.1719 49.1657 30.6221 49.2712 30.0917C49.3767 29.5613 49.6372 29.0741 50.0196 28.6917C50.402 28.3093 50.8892 28.0488 51.4196 27.9433C51.95 27.8378 52.4998 27.892 52.9995 28.0989C53.4991 28.3059 53.9262 28.6564 54.2266 29.106C54.5271 29.5557 54.6874 30.0844 54.6874 30.6252C54.6874 31.3504 54.3994 32.0459 53.8866 32.5587C53.3738 33.0715 52.6783 33.3595 51.9531 33.3595Z"
                                fill="#0D192F" />
                        </svg>
                    </div>
                    <h3 class="text-2xl 2xl:text-3xl font-bold mb-4 2xl:mb-7 mt-2 2xl:mt-4">
                        Game Development
                    </h3>
                    <p class="font-medium 2xl:text-2xl mb-8">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                        Doloremque ipsa ab magni culpa non quod cumque, officia at odio
                        repudiandae.
                    </p>
                    <Link href="" class="font-bold 2xl:text-xl">
                    Learn More
                    </Link>
                </div>
            </div>
        </div>
        <div class="absolute -bottom-20 left-0 z-0">
            {{-- <svg
            class="w-full"
            width="270"
            preserveAspectRatio="xMidYMid slice"
            viewBox="0 0 424 981"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M168.475 975.281C160.368 982.782 147.714 982.291 140.212 974.183L-467.418 317.455C-474.919 309.347 -474.428 296.693 -466.32 289.192L-218.158 59.5827C-210.05 52.0812 -197.397 52.5725 -189.895 60.6802L417.735 717.408C425.237 725.516 424.745 738.17 416.638 745.671L168.475 975.281Z"
              fill="url(#paint0_linear_491_77)"
            />
            <rect
              x="40.6135"
              y="587.499"
              width="464.728"
              height="374.567"
              rx="20"
              transform="rotate(-132.776 40.6135 587.499)"
              fill="url(#paint1_linear_491_77)"
            />
            <defs>
              <linearGradient
                id="paint0_linear_491_77"
                x1="-163.603"
                y1="645.819"
                x2="113.92"
                y2="389.044"
                gradientUnits="userSpaceOnUse"
              >
                <stop stopColor="white" stopOpacity="0" />
                <stop offset="1" stopColor="white" stopOpacity="0.6" />
              </linearGradient>
              <linearGradient
                id="paint1_linear_491_77"
                x1="272.978"
                y1="587.499"
                x2="272.978"
                y2="962.066"
                gradientUnits="userSpaceOnUse"
              >
                <stop offset="0.388956" stopColor="white" stopOpacity="0" />
                <stop offset="1" stopColor="white" stopOpacity="0.6" />
              </linearGradient>
            </defs>
          </svg> --}}
            <svg class="w-full" viewBox="0 0 424 981" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M168.476 975.281C160.368 982.782 147.714 982.291 140.213 974.183L-467.417 317.455C-474.919 309.347 -474.427 296.693 -466.32 289.192L-218.158 59.5827C-210.05 52.0812 -197.396 52.5725 -189.895 60.6802L417.735 717.408C425.237 725.516 424.746 738.17 416.638 745.671L168.476 975.281Z"
                    fill="url(#paint0_linear_491_77)" />
                <rect x="40.6139" y="587.498" width="464.728" height="374.567" rx="20"
                    transform="rotate(-132.776 40.6139 587.498)" fill="url(#paint1_linear_491_77)" />
                <defs>
                    <linearGradient id="paint0_linear_491_77" x1="-163.602" y1="645.819" x2="113.92"
                        y2="389.044" gradientUnits="userSpaceOnUse">
                        <stop stop-color="white" stop-opacity="0" />
                        <stop offset="1" stop-color="white" stop-opacity="0.5" />
                    </linearGradient>
                    <linearGradient id="paint1_linear_491_77" x1="272.978" y1="587.498" x2="272.978"
                        y2="962.065" gradientUnits="userSpaceOnUse">
                        <stop offset="0.388956" stop-color="white" stop-opacity="0" />
                        <stop offset="1" stop-color="white" stop-opacity="0.5" />
                    </linearGradient>
                </defs>
            </svg>

        </div>
    </section>
@endsection
