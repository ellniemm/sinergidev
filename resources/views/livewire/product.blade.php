<div class="container mx-auto p-6 text-black">
    @livewire('toast')

    <div class="bg-gray-50 py-4 px-6 rounded-lg shadow-lg">
        <h2 class="text-xl font-semibold mb-4">Product Form</h2>

        <form wire:submit.prevent="store" enctype="multipart/form-data" class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium">Product Name</label>
                    <input type="text"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-indigo-200"
                        wire:model='productName' wire:key="productName-{{ now() }}">
                </div>
                <div>
                    <label class="block text-sm font-medium">Product Description</label>
                    <textarea class="w-full h-32 min-h-[80px] max-h-96 resize-y border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-indigo-200"
                        wire:model='productDescription'
                        wire:key="productDescription-{{ $updateData ? $product_id : now() }}"></textarea>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium">Product Image</label>
                <input type="file" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-indigo-200"
                    wire:model="productImage" accept="image/*" onchange="previewImage(this)"
                    wire:key="productImage-{{$updateData ? $product_id : now() }}">

                {{-- Preview Gambar --}}
                <div id="imagePreview" class="mt-4 border-t-2 border-primary pt-4 relative">

                    @if ($productImage)
                    @if (is_string($productImage))
                    {{-- Jika dari API (edit mode) --}}
                    <img src="https://sinergi.dev.ybgee.my.id/img/product/{{ $productImage }}" id="previewImg"
                        alt="Thumbnail Preview" class="max-w-[250px] h-auto object-cover rounded-lg mx-auto">
                    @else
                    {{-- Jika dari Upload Baru --}}
                    <img src="{{ $productImage->temporaryUrl() }}" id="previewImg" alt="Thumbnail Preview"
                        class="max-w-[250px] h-auto object-cover rounded-lg mx-auto">
                    @endif
                    @else
                    <div wire:loading wire:target="productImage">
                        <div
                            class="absolute inset-0 bg-gray-200 opacity-75 flex items-center justify-center rounded-lg">
                            <div class="text-center text-black">Uploading...</div>
                            <span class="loading loading-spinner text-primary"></span>
                        </div>
                    </div>
                    @endif
                    <div wire:loading wire:target="update, productImage">
                        <div
                            class="absolute inset-0 bg-gray-200 opacity-75 flex items-center justify-center rounded-lg">
                            <div class="text-center">Uploading...</div>
                            <span class="loading loading-spinner text-primary"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex space-x-3">
                @if (!$updateData)
                <button type="submit" class="btn btn-primary text-white" wire:loading.attr="disabled"
                    wire:target="productImage">Save</button>
                @else
                <button wire:click='update()' type="button" class="btn btn-warning text-white"
                    wire:loading.attr="disabled" wire:target="productImage, update">Update</button>
                <button wire:click.prevent="resetForm" type="button" class="btn btn-ghost"
                    wire:loading.attr="disabled">Cancel</button>
                @endif
            </div>
        </form>
    </div>

    <div class="bg-white shadow-lg rounded-lg p-6 mt-6">
        <h2 class="text-xl font-semibold mb-4">Data Products</h2>
        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-200 rounded-lg shadow-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 text-left">No</th>
                        <th class="px-4 py-2 text-left">Product Name</th>
                        <th class="px-4 py-2 text-left">Description</th>
                        <th class="px-4 py-2 text-left">Image</th>
                        <th class="px-4 py-2 text-left">Created At</th>
                        <th class="px-4 py-2 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($products as $index => $product)
                    <tr>
                        <td class="px-4 py-2">{{ ($currentPage - 1) * $perPage + $loop->iteration }}</td>
                        <td class="px-4 py-2">{{ $product['product_name'] }}</td>
                        <td class="px-4 py-2 truncate max-w-xs" title="{{ $product['product_desc'] }}">{{
                            Str::limit($product['product_desc'], 35, '...') }}</td>
                        <td class="px-4 py-2">
                            <img src="https://sinergi.dev.ybgee.my.id/img/product/{{ $product['product_img'] }}"
                                class="w-16 h-16 object-cover rounded-md">
                        </td>
                        <td class="px-4 py-2">{{ \Carbon\Carbon::parse($product['created_at'])->format('Y-m-d') }}</td>
                        <td class="px-4 py-2 space-x-2">
                            <button wire:click="edit('{{ $product['product_id'] }}')" wire:loading.attr="disabled"
                                class="btn btn-warning text-white">Edit
                            </button>
                            <button wire:click="delete('{{ $product['product_id'] }}')" wire:loading.attr="disabled"
                                class="btn btn-error text-white">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="flex justify-between items-center mt-4">
            @if ($prevPageUrl)
            <button wire:click="prevPage" class="btn btn-neutral text-white">
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
            <span>Page {{ $currentPage }} of {{ $lastPage }}</span>
            @if ($nextPageUrl)
            <button wire:click="nextPage" class="btn btn-neutral text-white">Next
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="#fff"
                        d="M9.31 6.71a.996.996 0 0 0 0 1.41L13.19 12l-3.88 3.88a.996.996 0 1 0 1.41 1.41l4.59-4.59a.996.996 0 0 0 0-1.41L10.72 6.7c-.38-.38-1.02-.38-1.41.01" />
                </svg>
            </button>
            @endif
        </div>
    </div>
</div>
<script>
    document.addEventListener('livewire:intialized', () => {
        Livewire.on('reset', () => {
            Livewire.dispatch('resetForm');
        });
    });

    function previewImage(input) {
        const preview = document.getElementById('imagePreview');
        let image = preview.querySelector('img'); 
    
        if (!image) {
            // Jika img belum ada, buat elemen img baru
            image = document.createElement('img');
            image.id = 'previewImg';
            image.className = 'max-w-[250px] h-auto object-cover rounded-lg mx-auto';
            preview.appendChild(image);
        }
    
        if (input.files && input.files[0]) {
            const reader = new FileReader();
    
            reader.onload = function(e) {
                image.src = e.target.result;
                preview.classList.remove('hidden');
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>