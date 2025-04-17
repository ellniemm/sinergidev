@extends('pages.layouts.user')
@section('title', $blog['blog_name'])

<style>
    .blog-content p {
        line-height: 1.7;
    }

    .blog-content h1 {
        font-size: 2em;
        font-weight: bold;
        margin: 0.67em 0;
    }

    .blog-content h2 {
        font-size: 1.5em;
        font-weight: bold;
        margin: 0.83em 0;
    }

    .blog-content h3 {
        font-size: 1.17em;
        font-weight: bold;
        margin: 1em 0;
    }

    .blog-content h4 {
        font-size: 1em;
        font-weight: bold;
        margin: 1.33em 0;
    }

    .blog-content blockquote {
        margin: 1em 40px;
        padding-left: 15px;
        border-left: 3px solid #ccc;
    }

    .blog-content ul {
        list-style-type: disc;
        margin: 1em 0;
        padding-left: 40px;
    }

    .blog-content ol {
        list-style-type: decimal;
        margin: 1em 0;
        padding-left: 40px;
    }

    .blog-content li {
        display: list-item;
        margin: 0.5em 0;
        padding-bottom: 7px;
    }

    /* 🔥 Pastikan gambar sejajar dengan teks */
    .blog-content img {
        display: inline-block;
        vertical-align: middle;
        max-width: 100%;
        height: auto;
    }

    /* 🔥 Atur paragraf yang berisi gambar */
    .blog-content p:has(img) {
        margin: 10px 0;
        text-align: left;
        /* Default alignment */
    }
</style>

@section('content')

<header class="bg-[#0D192F] text-white w-full ">
    <div>
        <div class="pt-10 md:pt-28 pb-16  mx-auto text-center space-y-7 ">
            <h3 class="text-base md:text-2xl 2xl:text-3xl font-medium">
                {{ \Carbon\Carbon::parse($blog['created_at'])->format('d M Y') }}
            </h3>
            <h1 class="text-2xl md:text-4xl 2xl:text-6xl font-bold px-5 md:px-0 md:w-8/12 mx-auto ">
                {{-- Apa Itu
                <span class="bg-gradient-to-tl from-[#2a88b4] to-[#4796A3] bg-clip-text text-transparent">
                    Boolean Search? --}}
                    {{ $blog['blog_name'] }}
                </span>
            </h1>
        </div>
        <div class="relative w-full flex justify-center content-center">
            {{--
            <Image src="/placeholder1000x500.png" alt="Blog Thumbnail"
                class=" rounded-xl md:rounded-3xl w-[300px] h-[150px] md:w-[1000px] md:h-[500px] 2xl:w-[1500px] 2xl:h-[750px] mt-10 2xl:mt-20 z-10"
                width={500} height={250} /> --}}
            {{-- <div
                class="bg-gray-400 rounded-xl md:rounded-3xl w-[300px] h-[150px] md:w-[1000px] md:h-[500px] 2xl:w-[1500px] 2xl:h-[750px] mt-14 2xl:mt-20 z-10 ">
            </div> --}}
            <img src="https://sinergi.dev.ybgee.my.id/img/blog/thumbnails/{{ $blog['blog_thumbnail'] }}"
                alt="{{ $blog['blog_name']}}"
                class=" rounded-xl md:rounded-3xl w-[310px] h-[200px] md:w-[800px] md:h-[400px] 2xl:w-[1000px] 2xl:h-[500px] mt-4 md:mt-12  2xl:mt-14 z-10 object-cover">
            {{-- <svg viewBox="0 0 1728 800" fill="none" xmlns="http://www.w3.org/2000/svg"
                class="absolute bottom-0 md:bottom-auto w-full">
                <rect x="104" width="1521" height="600" rx="76" fill="white" class="absolute z-0" />
                <rect width="1729" height="800" fill="url(#paint0_linear_491_77)" />
                <defs>
                    <linearGradient id="paint0_linear_491_77" x1="864.5" y1="364" x2="864.5" y2="68"
                        gradientUnits="userSpaceOnUse">
                        <stop stopColor="#FFFFFF" />
                        <stop offset="1" stopColor="#999999" stopOpacity="0" />
                    </linearGradient>
                </defs>
            </svg> --}}
            <div
                class="absolute z-0  w-11/12 h-[200px] md:w-[900px] md:h-[450px] 2xl:w-[1121px] 2xl:h-[500px] bg-white rounded-2xl md:rounded-[66px] justify-items-center">
            </div>
            <svg class="absolute bottom-0 md:bottom-auto w-full" viewBox="0 0 1728 800" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                {{--
                <rect x="254" width="1221" height="600" rx="76" fill="white" class="absolute z-0 " /> --}}
                <rect width="1729" height="800" fill="url(#paint0_linear_491_77)" />
                {{--
                <path d="M0 0H1729V496H0V0Z" fill="url(#paint0_linear_491_77)" /> --}}
                <defs>
                    <linearGradient id="paint0_linear_491_77" x1="864.5" y1="364" x2="864.5" y2="68"
                        gradientUnits="userSpaceOnUse">
                        <stop stop-color="#FFFFFF" />
                        <stop offset="1" stop-color="#999999" stop-opacity="0" />
                    </linearGradient>
                </defs>
            </svg>

        </div>
    </div>
</header>
<div class="bg-white text-black w-full relative z-10">
    <div class="blog-content mx-auto px-6 md:px-72 py-10 2xl:py-20 2xl:px-[500px]">
        {{-- <div class="space-y-3 md:space-y-7 mb-3 md:mb-5  2xl:mb-7">
            <h2 class="text-xl md:text-4xl 2xl:text-5xl font-semibold pt-10">
                <span class="bg-gradient-to-r from-[#25427C] to-[#4796A3] bg-clip-text text-transparent">
                    Lorem, ipsum.
                </span>
            </h2>
            <p class="text-sm md:text-base 2xl:text-xl font-medium text-gray-500">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet
                omnis quas id sint repellendus. Rerum voluptatibus minus corrupti
                mollitia repellendus dicta vel eveniet, quam, soluta hic iure
                excepturi nisi culpa iste necessitatibus aspernatur fugiat sint
                totam nesciunt labore sed exercitationem itaque. Quod dolore
                labore vero cumque modi asperiores omnis voluptate, iure dicta
                fugiat ab fuga unde, iusto id quasi excepturi nisi blanditiis sunt
                error eligendi eaque minus exercitationem? Illum voluptates
                dignissimos eos obcaecati voluptatem. Repellendus error quia saepe
                illo fugit.
            </p>
        </div> --}}
        {{-- == point == --}}
        {{-- <div class="space-y-5 mb-7">
            <h3 class="text-lg md:text-3xl 2xl:text-4xl font-semibold">
                1. Apa itu Lorem, ipsum.?
            </h3>
            <p class="text-base 2xl:text-xl font-medium text-gray-500">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad
                voluptatibus illo suscipit, commodi placeat esse quos nulla soluta
                itaque libero repellat magnam, saepe voluptatem maiores,
                doloremque reiciendis incidunt dolorum unde eius eos quaerat. Quae
                eligendi voluptate hic quas quam, iste fugiat maxime corrupti ut
                nisi enim ab neque, nulla ratione id blanditiis aut delectus.
                Sequi perferendis ducimus similique itaque modi?
            </p>
        </div>
        <div class="space-y-5 mb-7">
            <h3 class="text-base md:text-3xl 2xl:text-4xl font-semibold">
                2. Kenapa harus Lorem, ipsum.?
            </h3>
            <p class="text-base 2xl:text-xl font-medium text-gray-500">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad
                voluptatibus illo suscipit, commodi placeat esse quos nulla soluta
                itaque libero repellat magnam, saepe voluptatem maiores,
                doloremque reiciendis incidunt dolorum unde eius eos quaerat.
            </p>
        </div>
        <div class="space-y-5 mb-7">
            <h3 class="text-lg md:text-3xl 2xl:text-4xl font-semibold">
                3.Dimana saya bisa mendapatkan Lorem, ipsum.?
            </h3>
            <p class="text-base 2xl:text-xl font-medium text-gray-500">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Et qui
                quae ullam soluta minima ab earum maiores. Autem numquam vel, ea
                illo architecto aperiam quaerat eum a laborum debitis maxime
                molestiae corrupti commodi laudantium itaque enim nemo id voluptas
                pariatur alias ab quasi repellat! Quis eum esse iste perspiciatis
                velit?
            </p>
        </div> --}}
        {{-- == {mo-- article == --}}
        {{-- <div class="py-10 2xl:py-16">
            <h1 class="text-xl md:text-4xl 2xl:text-5xl font-semibold mb-7">
                <span class="bg-gradient-to-r from-[#25427C] to-[#4796A3] bg-clip-text text-transparent">
                    More Article
                </span>
            </h1>
            <div class="md:flex md:flex-row gap-8">
                <a href="#">
                    <div class="card px-5 py-6 bg-[#D9D9D9] bg-opacity-25 rounded-2xl w-full mb-5">
                        <div class="flex flex-col h-full">
                            <div class="relative"> --}}
                                {{--
                                <Image src={"/placeholder300x200.png"} alt="plhd" width={300} height={200}
                                    class="rounded-xl w-full object-cover" />
                                <div --}} {{--
                                    class="absolute top-4 right-3 bg-white text-black text-sm md:text-base 2xl:text-lg font-semibold px-4 py-1 rounded-full ">
                                    UI/UX
                                </div>
                            </div>
                            <div class="flex flex-col justify-between">
                                <div>
                                    <h2 class="font-semibold text-lg 2xl:text-2xl  py-8">
                                        Lorem ipsum dolor sit amet.
                                    </h2>
                                    <p class="text-[#6A6A6A] 2xl:text-xl font-medium">
                                        Lorem ipsum dolor sit amet consectetur adipisicing
                                        elit. Facere sed nostrum debitis, minima enim quia non
                                        fugiat laborum officia earum!
                                    </p>
                                </div>
                                <p class="mt-4 text-base 2xl:text-xl font-semibold">
                                    Sinergi Studio • 30 Nov 2024
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="#">
                    <div class="card px-5 py-6 bg-[#D9D9D9] bg-opacity-25 rounded-2xl w-full mb-5">
                        <div class="flex flex-col h-full">
                            <div class="relative"> --}}
                                {{--
                                <Image src={"/placeholder300x200.png"} alt="plhd" width={300} height={200}
                                    class="rounded-xl w-full object-cover" />
                                <div --}} {{--
                                    class="absolute top-4 right-3 bg-white text-black text-sm md:text-base 2xl:text-lg font-semibold px-4 py-1 rounded-full ">
                                    UI/UX
                                </div>
                            </div>
                            <div class="flex flex-col justify-between">
                                <div>
                                    <h2 class="font-semibold text-lg 2xl:text-2xl  py-8">
                                        Lorem ipsum dolor sit amet.
                                    </h2>
                                    <p class="text-[#6A6A6A] 2xl:text-xl font-medium">
                                        Lorem ipsum dolor sit amet consectetur adipisicing
                                        elit. Facere sed nostrum debitis, minima enim quia non
                                        fugiat laborum officia earum!
                                    </p>
                                </div>
                                <p class="mt-4 text-base 2xl:text-xl font-semibold">
                                    Sinergi Studio • 30 Nov 2024
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="#">
                    <div class="card px-5 py-6 bg-[#D9D9D9] bg-opacity-25 rounded-2xl w-full mb-5">
                        <div class="flex flex-col h-full">
                            <div class="relative"> --}}
                                {{--
                                <Image src={"/placeholder300x200.png"} alt="plhd" width={300} height={200}
                                    class="rounded-xl w-full object-cover" />
                                <div --}} {{--
                                    class="absolute top-4 right-3 bg-white text-black text-sm md:text-base 2xl:text-lg font-semibold px-4 py-1 rounded-full ">
                                    UI/UX
                                </div>
                            </div>
                            <div class="flex flex-col justify-between">
                                <div>
                                    <h2 class="font-semibold text-lg 2xl:text-2xl  py-8">
                                        Lorem ipsum dolor sit amet.
                                    </h2>
                                    <p class="text-[#6A6A6A] 2xl:text-xl font-medium">
                                        Lorem ipsum dolor sit amet consectetur adipisicing
                                        elit. Facere sed nostrum debitis, minima enim quia non
                                        fugiat laborum officia earum!
                                    </p>
                                </div>
                                <p class="mt-4 text-base 2xl:text-xl font-semibold">
                                    Sinergi Studio • 30 Nov 2024
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            </div> --}}
            {{--
        </div> --}}
        {!! $blog['blog_desc'] !!}

    </div>
</div>
@endsection