<div class="bg-[#0D192F] sticky top-0 w-full shadow-md z-30">
    <div class="overflow-x-hidden px-1 mx-auto sm:px-10">
        <nav class="text-white mx-auto py-5 flex justify-between items-center">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-x-2 text-xl font-bold">
                <img src="{{ asset('img/logotefa1.png') }}" width="35" height="35" alt="logo">
                <div class="flex items-center">
                    Sinergi<span class="text-[#4796A3]">.Studio</span>
                </div>
            </a>

            <div class="hidden lg:flex justify-center items-center col-span-6 gap-x-5">
                <a href="{{ route('service.index') }}" class="font-semibold relative cursor-pointer hover:text-blue-300 transition-colors duration-200">
                    Service
                    <span class="absolute -bottom-2 left-0 w-full h-[2px] bg-blue-300 transform origin-left transition-transform duration-200 ease-out scale-x-0"></span>
                </a>
                <a href="{{ route('product.index') }}" class="font-semibold relative cursor-pointer hover:text-blue-300 transition-colors duration-200">
                    Product
                    <span class="absolute -bottom-2 left-0 w-full h-[2px] bg-blue-300 transform origin-left transition-transform duration-200 ease-out scale-x-0"></span>
                </a>
                <a href="{{ route('about.index') }}" class="font-semibold relative cursor-pointer hover:text-blue-300 transition-colors duration-200">
                    About Us
                    <span class="absolute -bottom-2 left-0 w-full h-[2px] bg-blue-300 transform origin-left transition-transform duration-200 ease-out scale-x-0"></span>
                </a>
            </div>
            

            <div class="flex items-center space-x-2">
                <div class="lg:hidden">
                    @include('pages.components.mobileMenuAdmin')
                </div>
                <a class="flex items-center gap-1 py-2 px-3 rounded-xl bg-gray-400 bg-opacity-20 cursor-pointer" id="logoutButton">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                    </svg>
                    <span class="hidden md:inline-flex text-white font-medium">Logout</span>
                </a>
                @include('api.logoutPost')
            </div>
        </nav>
    </div>
</div>
