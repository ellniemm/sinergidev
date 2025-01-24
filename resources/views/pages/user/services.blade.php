@extends('pages.layouts.user')

@section('content')
    {{-- Header  --}}
    <header class="bg-[#0D192F] relative py-14 2xl:py-32 md:py-20 ">
        {{-- Konten Header  --}}
        <div class="container mx-auto text-center px-4 sm:px-6 lg:px-8 py-5 sm:py-10 ">
            <h1
                class="text-3xl sm:text-4xl md:text-5xl 2xl:text-8xl font-bold text-white leading-tight mx-auto max-w-lg md:max-w-3xl 2xl:max-w-7xl">
                Layanan Unggulan untuk Inovasi Bisnis Anda
            </h1>
            <p
                class="text-sm sm:text-base md:text-lg 2xl:text-3xl font-normal text-gray-300 mx-auto mt-7 max-w-sm md:max-w-2xl 2xl:max-w-5xl">
                Dari ide hingga eksekusi, kami membantu Anda menciptakan solusi
                digital yang efektif dan sesuai kebutuhan.
            </p>
        </div>

        {{-- SVG di bagian bawah header  --}}
        <div class="relative ">
            {{-- <svg
            class="-mb-40  hidden lg:block "
            viewBox="0 0 1728 725"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M228.972 607.414C222.113 616.072 209.534 617.531 200.876 610.671L-142.323 338.778C-150.981 331.919 -152.44 319.34 -145.581 310.682L94.4698 7.67663C101.329 -0.981312 113.908 -2.43959 122.566 4.41953L465.765 276.313C474.423 283.172 475.882 295.751 469.023 304.409L228.972 607.414Z"
              fill="url(#paint0_linear_491_77)"
            />
            <path
              d="M541.972 717.414C535.113 726.072 522.534 727.531 513.876 720.671L170.677 448.778C162.019 441.919 160.56 429.34 167.419 420.682L407.47 117.677C414.329 109.019 426.908 107.56 435.566 114.42L778.765 386.313C787.423 393.172 788.882 405.751 782.023 414.409L541.972 717.414Z"
              fill="url(#paint1_linear_491_77)"
            />
            <path
              d="M1520.47 607.414C1527.33 616.072 1539.91 617.531 1548.57 610.671L1891.77 338.778C1900.42 331.919 1901.88 319.34 1895.02 310.682L1654.97 7.67663C1648.11 -0.981312 1635.53 -2.43959 1626.88 4.41953L1283.68 276.313C1275.02 283.172 1273.56 295.751 1280.42 304.409L1520.47 607.414Z"
              fill="url(#paint2_linear_491_77)"
            />
            <path
              d="M1207.47 717.414C1214.33 726.072 1226.91 727.531 1235.57 720.671L1578.77 448.778C1587.42 441.919 1588.88 429.34 1582.02 420.682L1341.97 117.677C1335.11 109.019 1322.53 107.56 1313.88 114.42L970.676 386.313C962.019 393.172 960.56 405.751 967.419 414.409L1207.47 717.414Z"
              fill="url(#paint3_linear_491_77)"
            />
            <rect
              y="207"
              width="1728"
              height="496"
              fill="url(#paint4_linear_491_77)"
            />
            <defs>
              <linearGradient
                id="paint0_linear_491_77"
                x1="29.2764"
                y1="474.725"
                x2="294.166"
                y2="140.366"
                gradientUnits="userSpaceOnUse"
              >
                <stop stopColor="white" stopOpacity="0" />
                <stop offset="1" stopColor="white" stopOpacity="0.5" />
              </linearGradient>
              <linearGradient
                id="paint1_linear_491_77"
                x1="342.276"
                y1="584.725"
                x2="607.166"
                y2="250.366"
                gradientUnits="userSpaceOnUse"
              >
                <stop stopColor="white" stopOpacity="0" />
                <stop offset="1" stopColor="white" stopOpacity="0.5" />
              </linearGradient>
              <linearGradient
                id="paint2_linear_491_77"
                x1="1720.17"
                y1="474.725"
                x2="1455.28"
                y2="140.366"
                gradientUnits="userSpaceOnUse"
              >
                <stop stopColor="white" stopOpacity="0" />
                <stop offset="1" stopColor="white" stopOpacity="0.5" />
              </linearGradient>
              <linearGradient
                id="paint3_linear_491_77"
                x1="1407.17"
                y1="584.725"
                x2="1142.28"
                y2="250.366"
                gradientUnits="userSpaceOnUse"
              >
                <stop stopColor="white" stopOpacity="0" />
                <stop offset="1" stopColor="white" stopOpacity="0.5" />
              </linearGradient>
              <linearGradient
                id="paint4_linear_491_77"
                x1="864"
                y1="725"
                x2="864"
                y2="275"
                gradientUnits="userSpaceOnUse"
              >
                <stop stopColor="white" stopOpacity="1" />
                <stop offset="0.5" stopColor="white" stopOpacity="1" />
                <stop offset="1" stopColor="white" stopOpacity="0" />
              </linearGradient>
            </defs>
          </svg> --}}
            <svg class="-mb-40  hidden lg:block " viewBox="0 0 1728 725" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M228.972 607.414C222.113 616.072 209.534 617.53 200.876 610.671L-142.323 338.778C-150.981 331.919 -152.44 319.34 -145.581 310.682L94.4698 7.67651C101.329 -0.981435 113.908 -2.43971 122.566 4.4194L465.765 276.313C474.423 283.172 475.882 295.751 469.023 304.409L228.972 607.414Z"
                    fill="url(#paint0_linear_491_77)" />
                <path
                    d="M541.972 717.414C535.113 726.072 522.534 727.53 513.876 720.671L170.677 448.778C162.019 441.919 160.56 429.34 167.419 420.682L407.47 117.677C414.329 109.019 426.908 107.56 435.566 114.419L778.765 386.313C787.423 393.172 788.882 405.751 782.023 414.409L541.972 717.414Z"
                    fill="url(#paint1_linear_491_77)" />
                <path
                    d="M1520.47 607.414C1527.33 616.072 1539.91 617.53 1548.57 610.671L1891.77 338.778C1900.42 331.919 1901.88 319.34 1895.02 310.682L1654.97 7.67651C1648.11 -0.981435 1635.53 -2.43971 1626.88 4.4194L1283.68 276.313C1275.02 283.172 1273.56 295.751 1280.42 304.409L1520.47 607.414Z"
                    fill="url(#paint2_linear_491_77)" />
                <path
                    d="M1207.47 717.414C1214.33 726.072 1226.91 727.53 1235.57 720.671L1578.77 448.778C1587.42 441.919 1588.88 429.34 1582.02 420.682L1341.97 117.677C1335.11 109.019 1322.53 107.56 1313.88 114.419L970.676 386.313C962.019 393.172 960.56 405.751 967.419 414.409L1207.47 717.414Z"
                    fill="url(#paint3_linear_491_77)" />
                <rect y="207" width="1728" height="496" fill="url(#paint4_linear_491_77)" />
                <defs>
                    <linearGradient id="paint0_linear_491_77" x1="29.2764" y1="474.725" x2="294.166" y2="140.366"
                        gradientUnits="userSpaceOnUse">
                        <stop stop-color="white" stop-opacity="0" />
                        <stop offset="1" stop-color="white" stop-opacity="0.5" />
                    </linearGradient>
                    <linearGradient id="paint1_linear_491_77" x1="342.276" y1="584.725" x2="607.166" y2="250.366"
                        gradientUnits="userSpaceOnUse">
                        <stop stop-color="white" stop-opacity="0" />
                        <stop offset="1" stop-color="white" stop-opacity="0.5" />
                    </linearGradient>
                    <linearGradient id="paint2_linear_491_77" x1="1720.17" y1="474.725" x2="1455.28" y2="140.366"
                        gradientUnits="userSpaceOnUse">
                        <stop stop-color="white" stop-opacity="0" />
                        <stop offset="1" stop-color="white" stop-opacity="0.5" />
                    </linearGradient>
                    <linearGradient id="paint3_linear_491_77" x1="1407.17" y1="584.725" x2="1142.28" y2="250.366"
                        gradientUnits="userSpaceOnUse">
                        <stop stop-color="white" stop-opacity="0" />
                        <stop offset="1" stop-color="white" stop-opacity="0.5" />
                    </linearGradient>
                    <linearGradient id="paint4_linear_491_77" x1="864" y1="571" x2="864" y2="275"
                        gradientUnits="userSpaceOnUse">
                        <stop stop-color="white" />
                        <stop offset="0.2" stop-color="white" stop-opacity="1" />
                        <stop offset="1" stop-color="white" stop-opacity="0" />
                    </linearGradient>
                </defs>
            </svg>
        </div>
    </header>

    {{-- Section Services  --}}
    <section
        class="bg-white py-10 lg:py-20 2xl:py-0 px-5 flex flex-col justify-center items-center lg:px-24 w-full h-auto relative ">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 py-10 w-full">
            <div class="text-center lg:text-left space-y-4 ">
                <div class="flex flex-col md:flex-row items-center lg:items-start gap-3 py-5">
                    <svg width="50" height="50" viewBox="0 0 70 78" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M62.2221 0C64.2849 0 66.2632 0.819442 67.7218 2.27806C69.1804 3.73667 69.9999 5.71498 69.9999 7.77778V54.4445C69.9999 56.5072 69.1804 58.4856 67.7218 59.9442C66.2632 61.4028 64.2849 62.2222 62.2221 62.2222H7.77766C5.71486 62.2222 3.73655 61.4028 2.27794 59.9442C0.81932 58.4856 -0.00012207 56.5072 -0.00012207 54.4445V7.77778C-0.00012207 5.71498 0.81932 3.73667 2.27794 2.27806C3.73655 0.819442 5.71486 0 7.77766 0H62.2221ZM62.2221 23.3333H7.77766V50.5556C7.77778 51.5081 8.12748 52.4274 8.76044 53.1392C9.39339 53.851 10.2656 54.3058 11.2115 54.4172L11.6665 54.4445H58.3332C59.2857 54.4443 60.2051 54.0946 60.9169 53.4617C61.6287 52.8287 62.0834 51.9565 62.1949 51.0106L62.2221 50.5556V23.3333ZM11.6665 7.77778C10.6351 7.77778 9.64599 8.1875 8.91669 8.91681C8.18738 9.64612 7.77766 10.6353 7.77766 11.6667C7.77766 12.6981 8.18738 13.6872 8.91669 14.4165C9.64599 15.1458 10.6351 15.5556 11.6665 15.5556C12.6979 15.5556 13.6871 15.1458 14.4164 14.4165C15.1457 13.6872 15.5554 12.6981 15.5554 11.6667C15.5554 10.6353 15.1457 9.64612 14.4164 8.91681C13.6871 8.1875 12.6979 7.77778 11.6665 7.77778ZM23.3332 7.77778C22.3018 7.77778 21.3127 8.1875 20.5834 8.91681C19.854 9.64612 19.4443 10.6353 19.4443 11.6667C19.4443 12.6981 19.854 13.6872 20.5834 14.4165C21.3127 15.1458 22.3018 15.5556 23.3332 15.5556C24.3646 15.5556 25.3538 15.1458 26.0831 14.4165C26.8124 13.6872 27.2221 12.6981 27.2221 11.6667C27.2221 10.6353 26.8124 9.64612 26.0831 8.91681C25.3538 8.1875 24.3646 7.77778 23.3332 7.77778ZM34.9999 7.77778C33.9685 7.77778 32.9793 8.1875 32.25 8.91681C31.5207 9.64612 31.111 10.6353 31.111 11.6667C31.111 12.6981 31.5207 13.6872 32.25 14.4165C32.9793 15.1458 33.9685 15.5556 34.9999 15.5556C36.0313 15.5556 37.0204 15.1458 37.7497 14.4165C38.479 13.6872 38.8888 12.6981 38.8888 11.6667C38.8888 10.6353 38.479 9.64612 37.7497 8.91681C37.0204 8.1875 36.0313 7.77778 34.9999 7.77778Z"
                            fill="black" />
                    </svg>
                    <h1 class="text-4xl 2xl:text-5xl  font-semibold text-black">
                        <span class="bg-gradient-to-r from-[#4796A3] to-[#34668f] bg-clip-text text-transparent">
                            Web
                        </span> Development
                    </h1>
                </div>
                <div class="text-[#6A6A6A] text-base 2xl:text-xl font-semibold whitespace-pre-line md:text-base ">
                    Kami siap membangun website yang menarik dan optimal, dengan
                    pengalaman pengguna yang intuitif dan responsif. Adapun
                    kebutuhan bisnis Anda, kami hadirkan solusi web untuk mendukung
                    pertumbuhan di dunia digital.
                </div>
                <div class="flex items-center justify-center lg:justify-start space-x-4">
                    <div class="w-2 h-2 bg-black rounded-full"></div>
                    <p class=" text-black font-semibold text-lg 2xl:text-2xl">
                        Backend Technology
                    </p>
                </div>
                <div class="flex  items-center justify-center lg:justify-start space-x-4">
                    <div class="w-2 h-2 bg-black rounded-full"></div>
                    <p class=" text-black font-semibold text-lg 2xl:text-2xl">
                        Frontend Technology
                    </p>
                </div>
                <div class="2xl:pt-5 flex justify-center lg:justify-start">
                    <a role="button" {{-- href="/services/web-development" --}}
                        class="text-black 2xl:text-xl px-6 py-2 border border-black rounded-full font-medium hover:bg-black hover:text-[#ffffff] transition duration-300">
                        Learn More
                    </a>
                </div>
            </div>

            <div class="text-left content-center space-y-5">
                <div class="flex  justify-center mb-5">
                    <div class="w-96 2xl:w-5/6 h-72 2xl:h-96 items bg-gray-500 rounded-lg"></div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 py-20 w-full">
            <div class="text-left space-y-5 ">
                <div class="flex justify-center mb-5">
                    <div class="w-96 2xl:w-5/6 h-72 2xl:h-96 items bg-gray-500 rounded-lg"></div>
                </div>
                <div class="flex flex-col items-center gap-3 py-5">
                    <svg width="50" height="50" viewBox="0 0 70 70" fill="none"
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
                    <h1 class="text-4xl 2xl:text-5xl font-semibold text-black text-center">
                        <span class="bg-gradient-to-r from-[#4796A3] to-[#4a649a] bg-clip-text text-transparent">
                            Mobile
                        </span> App
                        <br />
                        Development
                    </h1>
                </div>
                <div
                    class="text-[#6A6A6A] text-base 2xl:text-xl font-semibold md:whitespace-pre-line md:text-base text-center ">
                    Kami menawarkan layanan pengembangan aplikasi
                    mobile dengan navigasi mudah, performa tinggi,
                    dan tampilan menarik. Untuk Android, IOS, atau
                    keduanya, kami siap mengubah ide Anda menjadi
                    solusi mobile yang inovatif dan fungsional.
                </div>
                <div class="flex items-center justify-center space-x-4">
                    <div class="w-2 h-2 bg-black rounded-full"></div>
                    <p class=" text-black font-semibold text-lg 2xl:text-2xl">
                        IOS
                    </p>
                </div>
                <div class="flex items-center justify-center space-x-4">
                    <div class="w-2 h-2 bg-black rounded-full"></div>
                    <p class=" text-black font-semibold text-lg 2xl:text-2xl">
                        Android
                    </p>
                </div>
                <div class="flex justify-center">
                    <a role="button" href="/services/mobile-app-development"
                        class="text-black 2xl:text-xl px-6 py-2 border border-black rounded-full font-medium hover:bg-black hover:text-[#ffffff] transition duration-300">
                        Learn More
                    </a>
                </div>
            </div>

            <div class="text-left space-y-5">
                <div class="flex justify-center mb-5">
                    <div class="w-96 2xl:w-5/6 h-72 2xl:h-96 items bg-gray-500 rounded-lg"></div>
                </div>
                <div class="flex flex-col items-center gap-3 py-5">
                    <svg width="50" height="50" viewBox="0 0 70 70" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M66.0529 33.5482C63.1531 20.4382 58.789 13.441 52.3154 11.5297C50.9546 11.1304 49.543 10.931 48.1249 10.9377C46.2505 10.9377 44.6181 11.3943 42.8913 11.8783C40.8105 12.4621 38.4466 13.1252 34.9999 13.1252C31.5533 13.1252 29.188 12.4634 27.1031 11.8797C25.3749 11.3943 23.7439 10.9377 21.8749 10.9377C20.4085 10.9325 18.9485 11.1313 17.5368 11.5283C11.0974 13.4314 6.73607 20.4259 3.79388 33.54C0.630208 47.6521 2.18743 56.5621 8.16068 58.6293C8.97945 58.9179 9.84095 59.0667 10.7091 59.0695C14.8011 59.0695 18.0824 55.6611 20.3245 52.8707C22.8579 49.7125 25.8234 48.1101 34.9999 48.1101C43.1962 48.1101 46.5882 49.2216 49.5181 52.8707C51.3597 55.1648 53.1001 56.7699 54.8365 57.7802C57.1456 59.1228 59.4535 59.4209 61.6943 58.6511C65.2243 57.4466 67.2478 54.2625 67.7099 49.1847C68.0613 45.291 67.5199 40.1763 66.0529 33.5482ZM28.4374 32.8127H24.0624V37.1877C24.0624 37.7678 23.832 38.3242 23.4217 38.7345C23.0115 39.1447 22.4551 39.3752 21.8749 39.3752C21.2948 39.3752 20.7384 39.1447 20.3281 38.7345C19.9179 38.3242 19.6874 37.7678 19.6874 37.1877V32.8127H15.3124C14.7323 32.8127 14.1759 32.5822 13.7656 32.172C13.3554 31.7617 13.1249 31.2053 13.1249 30.6252C13.1249 30.045 13.3554 29.4886 13.7656 29.0784C14.1759 28.6681 14.7323 28.4377 15.3124 28.4377H19.6874V24.0627C19.6874 23.4825 19.9179 22.9261 20.3281 22.5159C20.7384 22.1056 21.2948 21.8752 21.8749 21.8752C22.4551 21.8752 23.0115 22.1056 23.4217 22.5159C23.832 22.9261 24.0624 23.4825 24.0624 24.0627V28.4377H28.4374C29.0176 28.4377 29.574 28.6681 29.9842 29.0784C30.3945 29.4886 30.6249 30.045 30.6249 30.6252C30.6249 31.2053 30.3945 31.7617 29.9842 32.172C29.574 32.5822 29.0176 32.8127 28.4374 32.8127ZM39.9218 33.3595C39.381 33.3595 38.8523 33.1992 38.4027 32.8987C37.953 32.5983 37.6025 32.1712 37.3956 31.6716C37.1886 31.1719 37.1345 30.6221 37.24 30.0917C37.3455 29.5613 37.6059 29.0741 37.9883 28.6917C38.3707 28.3093 38.8579 28.0488 39.3884 27.9433C39.9188 27.8378 40.4686 27.892 40.9682 28.0989C41.4678 28.3059 41.8949 28.6564 42.1954 29.106C42.4958 29.5557 42.6562 30.0844 42.6562 30.6252C42.6562 31.3504 42.3681 32.0459 41.8553 32.5587C41.3425 33.0715 40.647 33.3595 39.9218 33.3595ZM45.9374 39.3752C45.3963 39.3752 44.8674 39.2146 44.4176 38.9139C43.9678 38.6131 43.6173 38.1856 43.4106 37.6856C43.2038 37.1856 43.1501 36.6354 43.2561 36.1048C43.3622 35.5742 43.6233 35.087 44.0064 34.7049C44.3895 34.3227 44.8773 34.0629 45.4082 33.9581C45.9391 33.8534 46.4891 33.9085 46.9886 34.1165C47.4881 34.3245 47.9147 34.6761 48.2143 35.1266C48.5139 35.5772 48.6732 36.1065 48.6718 36.6476C48.67 37.3716 48.3811 38.0654 47.8685 38.5767C47.3559 39.088 46.6615 39.3752 45.9374 39.3752ZM45.9374 27.3439C45.3966 27.3439 44.868 27.1835 44.4183 26.8831C43.9686 26.5826 43.6182 26.1556 43.4112 25.6559C43.2042 25.1563 43.1501 24.6065 43.2556 24.0761C43.3611 23.5457 43.6215 23.0584 44.0039 22.676C44.3863 22.2936 44.8736 22.0332 45.404 21.9277C45.9344 21.8222 46.4842 21.8763 46.9838 22.0833C47.4835 22.2903 47.9105 22.6407 48.211 23.0904C48.5114 23.5401 48.6718 24.0687 48.6718 24.6095C48.6718 25.3347 48.3837 26.0302 47.8709 26.543C47.3581 27.0558 46.6626 27.3439 45.9374 27.3439ZM51.9531 33.3595C51.4123 33.3595 50.8836 33.1992 50.4339 32.8987C49.9843 32.5983 49.6338 32.1712 49.4268 31.6716C49.2199 31.1719 49.1657 30.6221 49.2712 30.0917C49.3767 29.5613 49.6372 29.0741 50.0196 28.6917C50.402 28.3093 50.8892 28.0488 51.4196 27.9433C51.95 27.8378 52.4998 27.892 52.9995 28.0989C53.4991 28.3059 53.9262 28.6564 54.2266 29.106C54.5271 29.5557 54.6874 30.0844 54.6874 30.6252C54.6874 31.3504 54.3994 32.0459 53.8866 32.5587C53.3738 33.0715 52.6783 33.3595 51.9531 33.3595Z"
                            fill="#0D192F" />
                    </svg>
                    <h1 class="text-4xl 2xl:text-5xl font-semibold text-black text-center">
                        <span class="bg-gradient-to-r from-[#4796A3] to-[#4a649a] bg-clip-text text-transparent">
                            Games
                        </span>
                        <br />
                        Development
                    </h1>
                </div>

                <div
                    class="text-[#6A6A6A] text-base 2xl:text-xl font-semibold md:whitespace-pre-line justify-center text-center">
                    Kami menawarkan solusi pengembangan game
                    untuk membawa konsep kreatif Anda ke level
                    berikutnya. Dengan desain menawan dan gameplay
                    seru, kami ciptakan pengalaman bermain yang
                    memikat di berbagai platform.
                </div>
                <div class="flex items-center justify-center space-x-4">
                    <div class="w-2 h-2 bg-black rounded-full"></div>
                    <p class=" text-black font-semibold text-lg 2xl:text-2xl">
                        PC
                    </p>
                </div>
                <div class="flex items-center justify-center space-x-4">
                    <div class="w-2 h-2 bg-black rounded-full"></div>
                    <p class=" text-black font-semibold text-lg 2xl:text-2xl">
                        Mobile
                    </p>
                </div>
                <div class="flex justify-center">
                    <a role="button" href="/services/game-development"
                        class="text-black 2xl:text-xl px-6 py-2 border border-black rounded-full font-medium hover:bg-black hover:text-[#ffffff] transition duration-300">
                        Learn More
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
