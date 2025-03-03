<div class="bg-gray-50 min-h-screen flex justify-center">
    <div class="container mx-auto text-black p-4">
        @if ($message)
        <div class="my-3 p-3 bg-green-200 rounded-lg shadow-sm text-center">
            <p class="text-green-700 font-medium">{{ $message }}</p>
        </div>
        @endif

        {{-- Form Section --}}
        <div class="my-3 p-4 bg-gray-200 rounded-lg shadow-sm">
            <form wire:submit.prevent="store">
                <div class="mb-3">
                    <label for="category_name" class="block text-sm font-medium">Category Name</label>
                    <input type="text"
                        class="mt-1 w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                        wire:model='categoryName' required>

                    <div class="mt-4 flex space-x-2">
                        @if (!$updateData)
                        <button type="submit"
                            class="px-4 py-2 btn btn-primary text-white rounded-lg w-full md:w-auto">Save</button>
                        @else
                        <button wire:click='update()' type="button"
                            class="px-4 py-2 btn btn-primary text-white rounded-lg w-full md:w-auto">Update</button>
                        <button wire:click="resetForm" type="button"
                            class="px-4 py-2 btn btn-ghost text-gray-600 rounded-lg w-full md:w-auto">
                            Cancel
                        </button>
                        @endif
                    </div>
                </div>
            </form>
        </div>

        {{-- Table Section --}}
        <div class="my-3 p-4 bg-gray-200 rounded-lg shadow-sm">
            <h1 class="text-xl md:text-2xl font-bold mb-4 text-center md:text-left">Categories</h1>
            <div class="overflow-x-auto">
                <table class="w-full table-auto border-collapse">
                    <thead class="bg-gray-50">
                        <tr class="text-sm md:text-base">
                            <th class="px-4 py-3 text-left">No</th>
                            <th class="px-4 py-3 text-left">Category Name</th>
                            <th class="px-4 py-3 text-left">Created At</th>
                            <th class="px-4 py-3 text-left">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-300">
                        @foreach ($categories as $index => $category)
                        <tr class="text-sm md:text-base">
                            <td class="px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2">{{ $category['category_name'] }}</td>
                            <td class="px-4 py-2">{{ \Carbon\Carbon::parse($category['created_at'])->format('Y-m-d') }}
                            </td>
                            <td class="px-4 py-2">
                                <div class="flex space-x-2">
                                    <button wire:click="edit('{{ $category['category_id'] }}')"
                                        class="px-3 py-1 btn btn-warning text-white rounded text-xs md:text-sm">Edit</button>
                                    <button wire:click="delete('{{ $category['category_id'] }}')"
                                        class="px-3 py-1 btn btn-error text-white rounded text-xs md:text-sm">Delete</button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Pagination
            <div class="flex flex-col md:flex-row justify-between items-center mt-4 space-y-2 md:space-y-0">
                @if ($prevPageUrl)
                <button wire:click="fetchCategories({{ $currentPage - 1 }})"
                    class="px-4 py-2 bg-gray-300 rounded text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <g fill="none" fill-rule="evenodd">
                            <path
                                d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                            <path fill="#fff"
                                d="M8.293 12.707a1 1 0 0 1 0-1.414l5.657-5.657a1 1 0 1 1 1.414 1.414L10.414 12l4.95 4.95a1 1 0 0 1-1.414 1.414z" />
                        </g>
                    </svg>
                    Previous</button>
                @endif
                <span class="text-sm md:text-base">Page {{ $currentPage }} of {{ $lastPage }}</span>
                @if ($nextPageUrl)
                <button wire:click="fetchCategories({{ $currentPage + 1 }})"
                    class="px-4 py-2 bg-gray-300 rounded text-sm">Next
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="#fff"
                            d="M9.31 6.71a.996.996 0 0 0 0 1.41L13.19 12l-3.88 3.88a.996.996 0 1 0 1.41 1.41l4.59-4.59a.996.996 0 0 0 0-1.41L10.72 6.7c-.38-.38-1.02-.38-1.41.01" />
                    </svg>
                </button>
                @endif
            </div> --}}
        </div>
    </div>
</div>