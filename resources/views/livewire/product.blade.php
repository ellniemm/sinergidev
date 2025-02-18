<div>
    <div>
        <div class="container mx-auto text-black">
            @if ($message)
            <div class="my-3 p-3 bg-green-200 rounded-lg shadow-sm">
                <p class="text-green-700">{{ $message }}</p>
            </div>
            @endif
            <div class="bg-gray-50 py-2 px-4">
                {{-- Form Section --}}
                <div class="my-3 p-3 bg-gray-200 rounded-lg shadow-sm">
                    <form wire:submit.prevent="store" enctype="multipart/form-data">
                        <div class="mb-3 grid grid-cols-12 items-center gap-4">
                            <label for="nama" class="col-span-2">Product Name</label>
                            <div class="col-span-5">
                                <input type="text"
                                    class="form-control w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                    wire:model='productName'>
                            </div>
                        </div>
                        <div class="mb-3 grid grid-cols-12 items-center gap-4">
                            <label for="description" class="col-span-2">Product Description</label>
                            <div class="col-span-8">
                                <textarea type="text"
                                    class="form-control w-full rounded-lg ring border focus:border-blue-500 focus:ring-blue-500"
                                    wire:model='productDescription'></textarea>
                            </div>
                        </div>
                        <div class="mb-3 grid grid-cols-12 items-center gap-4">
                            <label for="product_image" class="col-span-2">Product Image</label>
                            <div class="col-span-8">
                                <input type="file"
                                    class="form-control w-full rounded-lg border-gray-300 ring-blue-500 focus:border-blue-500 focus:ring-2 hover:border-blue-400 cursor-pointer transition-colors"
                                    wire:model='productImage'>
                            </div>
                        </div>
                        <div class="mb-3 grid grid-cols-12 items-center gap-4">
                            <div class="col-start-3 col-span-5">
                                @if (!$updateData)
                                <button type="submit"
                                    class="px-4 py-2 btn btn-primary text-white rounded-lg">SAVE</button>
                                @else
                                <button wire:click='update()' type="button"
                                    class="px-4 py-2 btn btn-primary text-white rounded-lg">UPDATE</button>
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
                    <h1 class="text-2xl font-bold mb-4">Data Products</h1>
                    <div class="overflow-x-auto">
                        <table class="w-full table-auto">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left">No</th>
                                    <th class="px-6 py-3 text-left">Product Name</th>
                                    <th class="px-6 py-3 text-left">Product Description</th>
                                    <th class="px-6 py-3 text-left">Product Image</th>
                                    <th class="px-6 py-3 text-left">Preview</th>
                                    <th class="px-6 py-3 text-left">Created At</th>
                                    <th class="px-6 py-3 text-left">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach ($products as $index => $product)
                                <tr>
                                    <td class="px-6 py-4">{{ ($currentPage - 1) * $perPage + $loop->iteration }}</td>
                                    <td class="px-6 py-4">{{ $product['product_name'] }}</td>
                                    <td class="px-6 py-4">
                                        <div class="max-w-[200px]">
                                            <span class="truncate block hover:whitespace-normal"
                                                title="{{ $product['product_desc'] }}">
                                                {{ Str::limit($product['product_desc'], 35, '...') }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="max-w-[200px]">
                                            <span class="truncate block" title="{{ $product['product_img'] }}">{{
                                                Str::limit($product['product_img'], 25, '...') }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <img src="https://sinergi.dev.ybgee.my.id/img/product/{{ $product['product_img'] }}"
                                            alt="{{ $product['product_name'] }}"
                                            class="w-20 h-20 object-cover rounded-md">
                                    </td>
                                    <td class="px-6 py-4">{{
                                        \Carbon\Carbon::parse($product['created_at'])->format('Y-m-d')
                                        }}</td>
                                    <td class="px-6 py-4">
                                        <button wire:click="edit('{{ $product['product_id'] }}')"
                                            class="px-3 py-1 btn btn-warning text-white rounded mr-2">Edit</button>
                                        <button wire:click="delete('{{ $product['product_id'] }}')"
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
                        <button wire:click="prevPage" class="px-4 py-2 bg-gray-300 rounded">Previous</button>
                        @endif
                        <span>Page {{ $currentPage }} of {{ $lastPage }}</span>
                        @if ($nextPageUrl)
                        <button wire:click="nextPage" class="px-4 py-2 bg-gray-300 rounded">Next</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>