<div class="bg-[#0D192F] sticky 2xl:px-10 top-0 w-full shadow-md z-30">
    <div class="absolute inset-0 bg-white opacity-[0.06] z-0 pointer-events-none"></div>
    <div class="overflow-x-hidden px-4 mx-auto sm:px-10">
        <nav class="text-white mx-auto py-5 flex justify-between items-center">
            <a href="{{route('home')}}" class="flex items-center gap-x-2 text-xl 2xl:text-3xl font-bold">
                <img src="{{ asset('img/logotefa1.png') }}" width="35" height="35" class="2xl:w-[45px] 2xl:h-[45px]" alt="logo">
                <div class="flex items-center">
                    Sinergi<span class="text-[#4796A3]">.Studio</span>
                </div>
            </a>

            <div class="hidden lg:flex justify-center items-center col-span-6 gap-x-5">
                <a href="{{route('home')}}"
                    class="font-semibold text-base 2xl:text-xl relative cursor-pointer hover:text-blue-300 transition-colors duration-200">
                    Home
                    <span
                        class="absolute -bottom-2 left-0 w-full h-[2px] bg-blue-300 transform origin-left transition-transform duration-200 ease-out scale-x-0"></span>
                </a>
                <a href="{{route('services')}}"
                    class="font-semibold text-base 2xl:text-xl relative cursor-pointer hover:text-blue-300 transition-colors duration-200">
                    Services
                    <span
                        class="absolute -bottom-2 left-0 w-full h-[2px] bg-blue-300 transform origin-left transition-transform duration-200 ease-out scale-x-0"></span>
                </a>
                <a href="{{route('about-us')}}"
                    class="font-semibold text-base 2xl:text-xl relative cursor-pointer hover:text-blue-300 transition-colors duration-200">
                    About Us
                    <span
                        class="absolute -bottom-2 left-0 w-full h-[2px] bg-blue-300 transform origin-left transition-transform duration-200 ease-out scale-x-0"></span>
                </a>
                <a href="{{route('products')}}"
                    class="font-semibold text-base 2xl:text-xl relative cursor-pointer hover:text-blue-300 transition-colors duration-200">
                    Product
                    <span
                        class="absolute -bottom-2 left-0 w-full h-[2px] bg-blue-300 transform origin-left transition-transform duration-200 ease-out scale-x-0"></span>
                </a>
                <a href="{{route('blog.user')}}"
                    class="font-semibold text-base 2xl:text-xl relative cursor-pointer hover:text-blue-300 transition-colors duration-200">
                    Blog
                    <span
                        class="absolute -bottom-2 left-0 w-full h-[2px] bg-blue-300 transform origin-left transition-transform duration-200 ease-out scale-x-0"></span>
                </a>
            </div>

            <div class="flex items-center space-x-2">
                <div class="hidden lg:block">
                    <a href="{{route('contact-us')}}"
                        class="flex items-center gap-1 py-2 px-3 2xl:py-4 2xl:px-5 rounded-xl bg-gray-400 bg-opacity-20">
                        <img src="{{ asset('img/contactus.png') }}" width="24" height="24" alt="contactus" class="block">
                        <span class="hidden md:inline-flex text-white font-medium text-sm 2xl:text-lg 2xl:font-semibold">Contact Us</span>
                    </a>
                </div>
                <div class="lg:hidden">
                    @include('pages.components.mobileMenuUser')
                </div>
            </div>
        </nav>
    </div>
</div>
