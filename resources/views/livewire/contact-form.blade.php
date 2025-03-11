<div>
    @livewire('toast')
    <h1 class="text-2xl md:text-3xl 2xl:text-5xl font-bold mb-3 2xl:mb-6">
        Get In Touch
    </h1>
    <h1 class="text-base md:text-lg 2xl:text-2xl font-semibold text-gray-500 mb-2 2xl:mb-4">
        You can contact us anytime
    </h1>
    <form wire:submit="submit">
        <div class="mb-3 2xl:mb-6">
            <label class="block text-sm 2xl:text-lg text-gray-700 font-semibold mb-2 2xl:mb-4">Fullname</label>
            <input type="text" wire:model="fullname"
                class="shadow appearance-none border w-full py-2 px-3 2xl:py-3 2xl:px-5 text-gray-700 leading-tight rounded-lg focus:outline-none focus:shadow-outline">
        </div>
        @error('fullname') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        <div class="mb-3 2xl:mb-6">
            <label class="block text-sm 2xl:text-lg text-gray-700 font-semibold mb-2 2xl:mb-4">Email</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="#B2B2B2"
                            d="M22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2zm-2 0l-8 5l-8-5zm0 12H4V8l8 5l8-5z" />
                    </svg>
                </div>
                <input type="email" wire:model="email" autocomplete="email"
                    class="shadow appearance-none border rounded-lg w-full py-2 px-3 2xl:py-3 2xl:px-5 pl-10 2xl:pl-10 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3 2xl:mb-6">
            <label class="block text-sm 2xl:text-lg text-gray-700 font-semibold mb-2 2xl:mb-4">Phone</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="none" stroke="#B2B2B2" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="1.5"
                            d="M15.6 14.522c-2.395 2.52-8.504-3.534-6.1-6.064c1.468-1.545-.19-3.31-1.108-4.609c-1.723-2.435-5.504.927-5.39 3.066c.363 6.746 7.66 14.74 14.726 14.042c2.21-.218 4.75-4.21 2.215-5.669c-1.268-.73-3.009-2.17-4.343-.767" />
                    </svg>
                </div>
                <input type="text" wire:model="phone"
                    class="shadow appearance-none border rounded-lg w-full py-2 px-3 2xl:py-3 2xl:px-5 pl-10 2xl:pl-10 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            @error('phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4 2xl:mb-7">
            <label class="block text-sm 2xl:text-lg text-gray-700 font-semibold mb-2 2xl:mb-4">Message</label>
            <textarea wire:model="message" rows="3"
                class="shadow resize-none hover:resize-y appearance-none border rounded-lg w-full py-3 px-4 2xl:py-10 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
            @error('message') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <button type="submit" wire:loading.attr="disabled"
            class="bg-[#25427C] w-full hover:bg-black text-white font-medium text-sm py-2 px-4 rounded-md focus:outline-none focus:shadow-outline 2xl:text-md">
            Submit
        </button>
    </form>
</div>