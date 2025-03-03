<footer class="bg-[#0D192F] text-white lg:px-10 2xl:px-16 py-20 w-full">
    <div class="px-6 mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 justify-between">
            <!-- About Section - Larger width -->
            <div class="lg:col-span-6">
                <h3 class="text-2xl 2xl:text-4xl font-bold mb-2">Sinergi.Studio</h3>
                <p class="text-gray-300 leading-relaxed pr-8 text-md 2xl:text-2xl">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quas esse placeat non ex excepturi! Maiores excepturi fugiat tempora nihil quibusdam eligendi officia officiis numquam omnis praesentium cupiditate, velit, soluta facilis.
                </p>
            </div>

            <!-- Pages Links -->
            <div class="lg:col-span-2 space-y-4 lg:px-10">
                <h3 class="text-lg 2xl:text-2xl font-semibold">Pages</h3>
                <ul class="space-y-2 text-sm 2xl:text-xl text-gray-300">
                    <li>
                        <a href="{{ route('home') }}" class="hover:text-blue-400 transition duration-200">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('services') }}" class="hover:text-blue-400 transition duration-200">
                            Services
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('products') }}" class="hover:text-blue-400 transition duration-200">
                            Product
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Know More Links -->
            <div class="lg:col-span-2 space-y-4">
                <h3 class="text-lg 2xl:text-2xl font-semibold">Know More</h3>
                <ul class="space-y-2 text-sm 2xl:text-xl text-gray-300">
                    <li>
                        <a href="{{ route('about-us') }}" class="hover:text-blue-400 transition duration-200">
                            About Us
                        </a>
                    </li>
                    <li>
                        <a href="#" class="hover:text-blue-400 transition duration-200">
                            Privacy Policy
                        </a>
                    </li>
                    <li>
                        <a href="#" class="hover:text-blue-400 whitespace-nowrap transition duration-200">
                            Terms & conditions
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Social Links -->
            <div class="lg:col-span-2 space-y-4 overflow-visible">
                <h3 class="text-lg 2xl:text-2xl font-semibold">Social Media</h3>
                <div class="space-y-2 text-md 2xl:text-xl font-medium">
                    <!-- Social Media Item 1 -->
                    <a href="https://www.instagram.com/sinergi.studio" class="hover:text-blue-400 transition duration-200">
                        <div class="flex items-center gap-1">
                            <!-- Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24">
                                <path fill="white"
                                    d="M20.947 8.305a6.5 6.5 0 0 0-.419-2.216a4.6 4.6 0 0 0-2.633-2.633a6.6 6.6 0 0 0-2.186-.42c-.962-.043-1.267-.055-3.709-.055s-2.755 0-3.71.055a6.6 6.6 0 0 0-2.185.42a4.6 4.6 0 0 0-2.633 2.633a6.6 6.6 0 0 0-.419 2.185c-.043.963-.056 1.268-.056 3.71s0 2.754.056 3.71c.015.748.156 1.486.419 2.187a4.6 4.6 0 0 0 2.634 2.632a6.6 6.6 0 0 0 2.185.45c.963.043 1.268.056 3.71.056s2.755 0 3.71-.056a6.6 6.6 0 0 0 2.186-.419a4.62 4.62 0 0 0 2.633-2.633c.263-.7.404-1.438.419-2.187c.043-.962.056-1.267.056-3.71c-.002-2.442-.002-2.752-.058-3.709m-8.953 8.297c-2.554 0-4.623-2.069-4.623-4.623s2.069-4.623 4.623-4.623a4.623 4.623 0 0 1 0 9.246m4.807-8.339a1.077 1.077 0 0 1-1.078-1.078a1.077 1.077 0 1 1 2.155 0c0 .596-.482 1.078-1.077 1.078">
                                </path>
                                <circle cx="11.994" cy="11.979" r="3.003" fill="white"></circle>
                            </svg>
                            <!-- Link Text -->
                            <h1 class="text-sm 2xl:text-lg">tefa.crtvespace</h1>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Divider and Copyright -->
    <div class="flex justify-center mt-8">
        <div class="container w-8/12 border-t border-gray-300 pt-4 text-center text-sm 2xl:text-lg text-gray-300">
            © {{ date('Y') }} Sinergi.Studio. All Rights Reserved
        </div>
    </div>
</footer>
