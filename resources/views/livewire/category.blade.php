<div>
    <div class="container mx-auto text-black">
        @if ($message)
        <div class="my-3 p-3 bg-green-200 rounded-lg shadow-sm">
            <p class="text-green-700">{{ $message }}</p>
        </div>
        @endif

        {{-- Form Section --}}
        <div class="my-3 p-3 bg-gray-200 rounded-lg shadow-sm">
            <form wire:submit.prevent="store">
                <div class="mb-3 flex flex-col ">
                    <label for="category_name" class="col-span-2">Category Name</label>
                    <div class="col-span-5">
                        <input type="text"
                            class="form-control  rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                            wire:model='categoryName'>
                    </div>
                    <div class="mt-2">
                        @if (!$updateData)
                        <button type="submit" class="px-4 py-2 btn btn-primary text-white rounded-lg">Save</button>
                        @else
                        <button wire:click='update()' type="button"
                        class="px-4 py-2 btn btn-primary text-white rounded-lg">Update</button>
                        <button wire:click="resetForm" type="button"
                            class="px-4 py-2 btn btn-ghost text-gray-600 rounded-lg">
                            Cancel
                        </button>
                        @endif
                    </div>
                </div>
            </form>
        </div>

        {{-- Table Section --}}
        <div class="my-3 p-3 bg-gray-200 rounded-lg shadow-sm">
            <h1 class="text-2xl font-bold mb-4">Categories</h1>
            <div class="overflow-x-auto">
                <table class="w-full table-auto">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left">No</th>
                            <th class="px-6 py-3 text-left">Category Name</th>
                            <th class="px-6 py-3 text-left">Created At</th>
                            <th class="px-6 py-3 text-left">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($categories as $index => $category)
                        <tr>
                            <td class="px-6 py-4">{{ ($currentPage - 1) * $perPage + $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ $category['category_name'] }}</td>
                            <td class="px-6 py-4">{{ \Carbon\Carbon::parse($category['created_at'])->format('Y-m-d') }}
                            </td>
                            <td class="px-6 py-4">
                               <button wire:click="edit('{{ $category['category_id'] }}')"
                                        class="px-3 py-1 btn btn-warning text-white rounded mr-2">Edit</button>
                                    <button wire:click="delete('{{ $category['category_id'] }}')"
                                        class="px-3 py-1 btn btn-error text-white rounded">Delete</button>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="flex justify-between items-center mt-4">
                @if ($prevPageUrl)
                <button wire:click="fetchCategories({{ $currentPage - 1 }})"
                    class="px-4 py-2 bg-gray-300 rounded">Previous</button>
                @endif
                <span>Page {{ $currentPage }} of {{ $lastPage }}</span>
                @if ($nextPageUrl)
                <button wire:click="fetchCategories({{ $currentPage + 1 }})"
                    class="px-4 py-2 bg-gray-300 rounded">Next</button>
                @endif
            </div>
        </div>
    </div>
</div>