@extends('pages.layouts.user')

@section('content')
    <header class="bg-[#0D192F] pt-28 2xl:pt-40 relative ">
        {{-- <svg class="absolute  top-40 left-16 transform -translate-x-1/4 -translate-y-1/4" width="257" height="616"
            viewBox="0 0 257 616" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M-122.083 608.261C-115.224 616.918 -102.645 618.377 -93.987 611.518L249.213 339.624C257.871 332.765 259.329 320.186 252.47 311.528L12.4194 8.52282C5.56028 -0.135121 -7.01877 -1.5934 -15.6767 5.26572L-358.876 277.159C-367.534 284.018 -368.992 296.597 -362.133 305.255L-122.083 608.261Z"
                fill="url(#paint0_linear_601_39)" />
            <defs>
                <linearGradient id="paint0_linear_601_39" x1="77.6128" y1="475.571" x2="-187.276" y2="141.212"
                    gradientUnits="userSpaceOnUse">
                    <stop stopColor="white" stopOpacity="0" />
                    <stop offset="1" stopColor="white" stopOpacity="0.5" />
                </linearGradient>
            </defs>
        </svg> --}}
        <svg class="absolute  top-40 left-16 transform -translate-x-1/4 -translate-y-1/4" width="257" height="616" viewBox="0 0 257 616" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M-122.083 608.261C-115.224 616.919 -102.645 618.377 -93.987 611.518L249.213 339.624C257.871 332.765 259.329 320.186 252.47 311.528L12.4194 8.52318C5.56028 -0.134755 -7.01877 -1.59303 -15.6767 5.26608L-358.876 277.16C-367.534 284.019 -368.992 296.598 -362.133 305.256L-122.083 608.261Z"
                fill="url(#paint0_linear_2117_2292)" />
            <defs>
                <linearGradient id="paint0_linear_2117_2292" x1="77.6128" y1="475.571" x2="-187.276" y2="141.213"
                    gradientUnits="userSpaceOnUse">
                    <stop stop-color="white" stop-opacity="0" />
                    <stop offset="1" stop-color="white" stop-opacity="0.5" />
                </linearGradient>
            </defs>
        </svg>


        <div class="text-center mb-28 relative z-10">
            <h1
                class="text-4xl 2xl:text-7xl font-medium inline-block border-b-2 2xl:border-b-4 w-2/6 pb-3 2xl:pb-6 mb-2 2xl:mb-4">
                Contact
                <span class=" bg-gradient-to-r from-[#4796A3] to-[#25427C]  bg-clip-text text text-transparent">
                    Us
                </span>
            </h1>
            <h1 class="text-5xl 2xl:text-8xl font-semibold">Let's Meet & Collaborate</h1>
        </div>

        <div class=" w-11/12 mx-auto relative py-10 z-10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 2xl:gap-20 pt-10 2xl:pt-32">
                <div class="flex  bg-white py-5 px-5 text-black rounded-xl items-center space-x-10">
                    <div class=" ">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-[30px] h-[30px] 2xl:w-[52px] 2xl:h-[52px]"
                            viewBox="0 0 24 24">
                            <path fill="#6a6a6a"
                                d="M22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2zm-2 0l-8 5l-8-5zm0 12H4V8l8 5l8-5z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="font-semibold text-sm 2xl:text-2xl text-[#6A6A6A]">
                            Email
                        </h1>
                        <p class="text-lg font-semibold 2xl:text-4xl">
                            lorem@gmail.com
                        </p>
                    </div>
                </div>
                <div class="flex bg-white py-5 px-5 text-black rounded-xl items-center space-x-10">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-[30px] h-[30px] 2xl:w-[52px] 2xl:h-[52px]"
                            viewBox="0 0 24 24">
                            <g fill="none">
                                <path
                                    d="m12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z">
                                </path>
                                <path fill="#6a6a6a"
                                    d="M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10a9.96 9.96 0 0 1-4.863-1.26l-.305-.178l-3.032.892a1.01 1.01 0 0 1-1.28-1.145l.026-.109l.892-3.032A9.96 9.96 0 0 1 2 12C2 6.477 6.477 2 12 2m0 2a8 8 0 0 0-6.759 12.282c.198.312.283.696.216 1.077l-.039.163l-.441 1.501l1.501-.441c.433-.128.883-.05 1.24.177A8 8 0 1 0 12 4M9.102 7.184a.7.7 0 0 1 .684.075c.504.368.904.862 1.248 1.344l.327.474l.153.225a.71.71 0 0 1-.046.864l-.075.076l-.924.686a.23.23 0 0 0-.067.291c.21.38.581.947 1.007 1.373c.427.426 1.02.822 1.426 1.055c.088.05.194.034.266-.031l.038-.045l.601-.915a.71.71 0 0 1 .973-.158l.543.379c.54.385 1.059.799 1.47 1.324a.7.7 0 0 1 .089.703c-.396.924-1.399 1.711-2.441 1.673l-.159-.01l-.191-.018l-.108-.014l-.238-.04c-.924-.174-2.405-.698-3.94-2.232c-1.534-1.535-2.058-3.016-2.232-3.94l-.04-.238l-.025-.208l-.013-.175l-.004-.075c-.038-1.044.753-2.047 1.678-2.443">
                                </path>
                            </g>
                        </svg>
                    </div>
                    <div>
                        <h1 class="font-semibold text-sm 2xl:text-2xl text-[#6A6A6A]">
                            WhatsApp
                        </h1>
                        <p class="text-lg font-semibold 2xl:text-4xl">
                            0821lorem999
                        </p>
                    </div>
                </div>
                <div class="flex bg-white py-5 px-5 text-black rounded-xl items-center space-x-10">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-[30px] h-[30px] 2xl:w-[52px] 2xl:h-[52px]"
                            viewBox="0 0 24 24">
                            <g fill="none" stroke="#6a6a6a" strokeLinejoin="round" strokeWidth={2}>
                                <path d="M13 9a1 1 0 1 1-2 0a1 1 0 0 1 2 0Z"></path>
                                <path d="M17.5 9.5c0 3.038-2 6.5-5.5 10.5c-3.5-4-5.5-7.462-5.5-10.5a5.5 5.5 0 1 1 11 0Z">
                                </path>
                            </g>
                        </svg>
                    </div>
                    <div>
                        <h1 class="font-semibold text-sm 2xl:text-2xl text-[#6A6A6A]">
                            Lokasi
                        </h1>
                        <p class="text-lg font-semibold 2xl:text-4xl">
                            Jl. Ki Ageng Gribig
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="bg-[#E8E8F4] text-black py-10 ">
        <div class="container mx-auto px-5 2xl:px-0 md:px-20">
            <div class="md:flex justify-between gap-5">
                <div class="md:w-2/3 2xl:w-3/4  py-20">
                    <h1 class=" text-5xl 2xl:text-7xl font-bold mb-5">Let's Work Together</h1>
                    <div class="text-lg 2xl:text-2xl whitespace-pre-line font-semibold text-gray-500">
                        Share your vision for your next project
                        with us now. Please Contact us for
                        basic questions we're habe to help!
                    </div>
                </div>
                <div class="md:w-1/2 flex flex-col bg-[#F8F8F8] py-10 px-10 text-black rounded-xl">
                    <h1 class="text-3xl 2xl:text-5xl font-bold mb-3 2xl:mb-6">
                        Get In Touch
                    </h1>
                    <h1 class="text-lg 2xl:text-2xl font-semibold text-gray-500 mb-2 2xl:mb-4">
                        You can contact us anytime
                    </h1>
                    <form>
                        <div class="mb-3 2xl:mb-6">
                            <label htmlFor="fullname"
                                class="block text-sm 2xl:text-lg text-gray-700 font-semibold mb-2 2xl:mb-4">
                                Fullname
                            </label>
                            <input type="text" id="fullname" name="fullname"
                                class="shadow appearance-none border  w-full py-2 px-3 2xl:py-3 2xl:px-5 text-gray-700 leading-tight rounded-lg focus:outline-none focus:shadow-outline" />
                        </div>
                        <div class="mb-3 2xl:mb-6">
                            <label htmlFor="email"
                                class="block text-sm 2xl:text-lg 2xl:mb-4 text-gray-700 font-semibold mb-2">
                                Email
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24">
                                        <path fill="#B2B2B2"
                                            d="M22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2zm-2 0l-8 5l-8-5zm0 12H4V8l8 5l8-5z" />
                                    </svg>
                                </div>
                                <input type="email" id="email" name="email"
                                    class="shadow appearance-none border rounded-lg w-full py-2 px-3 2xl:py-3 2xl:px-5 pl-10 2xl:pl-10 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                            </div>
                        </div>
                        <div class="mb-3 2xl:mb-6">
                            <label htmlFor="phone"
                                class="block text-sm 2xl:text-lg 2xl:mb-4 text-gray-700 font-semibold mb-2">
                                Phone
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24">
                                        <path fill="none" stroke="#B2B2B2" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="1.5"
                                            d="M15.6 14.522c-2.395 2.52-8.504-3.534-6.1-6.064c1.468-1.545-.19-3.31-1.108-4.609c-1.723-2.435-5.504.927-5.39 3.066c.363 6.746 7.66 14.74 14.726 14.042c2.21-.218 4.75-4.21 2.215-5.669c-1.268-.73-3.009-2.17-4.343-.767" />
                                    </svg>
                                </div>
                                <input type="text" id="phone" name="phone"
                                    class="shadow appearance-none border rounded-lg w-full py-2 px-3 2xl:py-3 2xl:px-5 pl-10 2xl:pl-10 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                            </div>
                        </div>
                        <div class="mb-4 2xl:mb-7">
                            <label htmlFor="message"
                                class="block text-sm 2xl:text-lg 2xl:mb-4 text-gray-700 font-semibold mb-2">
                                Feedback or Questions
                            </label>
                            <textarea id="message" name="message" rows={3}
                                class="shadow appearance-none border rounded-lg w-full py-2 px-3 2xl:py-3 2xl:px-5 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                        </div>
                        <button type="submit"
                            class="bg-[#25427C] w-full hover:bg-black text-white font-medium text-sm py-2 px-4 rounded-md focus:outline-none focus:shadow-outline 2xl:text-md">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-white py-20 2xl:py-40">
        <div class="container mx-auto px-5 md:px-24">
            <h1 class="text-4xl 2xl:text-6xl text-center font-bold mb-10 text-black">
                FAQs
            </h1>
            <div id="accordion-open" data-accordion="open">
                <!-- Panel 1 -->
                <div id="accordion-open-heading-1" >
                  <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-open-body-1" aria-expanded="true" aria-controls="accordion-open-body-1">
                    <span class="flex items-center">
                      <svg class="w-5 h-5 me-2 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path>
                      </svg> 
                      <h2 class="font-bold text-sm 2xl:text-2xl text-black">What is Flowbite?</h2>
                    </span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                    </svg>
                  </button>
                </div>
                <div id="accordion-open-body-1" class="hidden" aria-labelledby="accordion-open-heading-1">
                  <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 text-sm 2xl:text-xl">
                    <p class="mb-2 text-gray-700 dark:text-gray-400">Flowbite is an open-source library of interactive components built on top of Tailwind CSS including buttons, dropdowns, modals, navbars, and more.</p>
                    <p class="mb-2 text-gray-700 dark:text-gray-400">Check out this guide to learn how to <a href="/docs/getting-started/introduction/" class="text-blue-600 dark:text-blue-500 hover:underline">get started</a> and start developing websites even faster with components on top of Tailwind CSS.</p>
                  </div>
                </div>
              
                <!-- Panel 2 -->
                <div id="accordion-open-heading-2" class="">
                  <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-open-body-2" aria-expanded="false" aria-controls="accordion-open-body-2">
                    <span class="flex items-center">
                      <svg class="w-5 h-5 me-2 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path>
                      </svg> 
                      <h2 class="font-bold text-sm 2xl:text-2xl text-black">Is there a Figma file available?</h2>
                    </span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                    </svg>
                  </button>
                </div>
                <div id="accordion-open-body-2" class="hidden" aria-labelledby="accordion-open-heading-2">
                  <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 text-sm 2xl:text-xl">
                    <p class="mb-2 text-gray-500 dark:text-gray-400">Flowbite is first conceptualized and designed using the Figma software so everything you see in the library has a design equivalent in our Figma file.</p>
                    <p class="mb-2 text-gray-700 dark:text-gray-400">Check out the <a href="https://flowbite.com/figma/" class="text-blue-600 dark:text-blue-500 hover:underline">Figma design system</a> based on the utility classes from Tailwind CSS and components from Flowbite.</p>
                  </div>
                </div>
              
                <!-- Panel 3 -->
                <div id="accordion-open-heading-3" class="">
                  <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-open-body-3" aria-expanded="false" aria-controls="accordion-open-body-3">
                    <span class="flex items-center">
                      <svg class="w-5 h-5 me-2 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path>
                      </svg> 
                      <h2 class="font-bold text-sm 2xl:text-2xl text-black">What are the differences between Flowbite and Tailwind UI?</h2>
                    </span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                    </svg>
                  </button>
                </div>
                <div id="accordion-open-body-3" class="hidden" aria-labelledby="accordion-open-heading-3">
                  <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700 text-sm 2xl:text-xl">
                    <p class="mb-2 text-gray-500 dark:text-gray-400">The main difference is that the core components from Flowbite are open source under the MIT license, whereas Tailwind UI is a paid product. Another difference is that Flowbite relies on smaller and standalone components, whereas Tailwind UI offers sections of pages.</p>
                    <p class="mb-2 text-gray-500 dark:text-gray-400">However, we actually recommend using both Flowbite, Flowbite Pro, and even Tailwind UI as there is no technical reason stopping you from using the best of two worlds.</p>
                    <p class="mb-2 text-gray-500 dark:text-gray-400">Learn more about these technologies:</p>
                    <ul class="ps-5 text-gray-500 list-disc dark:text-gray-400">
                      <li><a href="https://flowbite.com/pro/" class="text-blue-600 dark:text-blue-500 hover:underline">Flowbite Pro</a></li>
                      <li><a href="https://tailwindui.com/" rel="nofollow" class="text-blue-600 dark:text-blue-500 hover:underline">Tailwind UI</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              
        </div>
    </section>
@endsection
