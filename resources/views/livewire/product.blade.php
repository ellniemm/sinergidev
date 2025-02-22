<div class="container mx-auto p-6 text-black">
    @if ($message)
    <div class="my-3 p-3 bg-green-200 rounded-lg shadow-sm">
        <p class="text-green-700">{{ $message }}</p>
    </div>
    @endif

    <div class="bg-gray-50 py-4 px-6 rounded-lg shadow-lg">
        <h2 class="text-xl font-semibold mb-4">Product Form</h2>

        <form wire:submit.prevent="store" enctype="multipart/form-data" class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium">Product Name</label>
                    <input type="text"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-indigo-200"
                        wire:model='productName'>
                </div>
                <div>
                    <label class="block text-sm font-medium">Product Description</label>
                    <textarea class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-indigo-200"
                        wire:model='productDescription'></textarea>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium">Product Image</label>
                <input type="file" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-indigo-200"
                    wire:model="productImage" accept="image/*" onchange="previewImage(this)">

                {{-- Preview Gambar --}}
                <div id="imagePreview" class="mt-4 border-t-2 border-primary pt-4 {{ $productImage ? '' : 'hidden' }}">

                    @if ($productImage)
                    @if (is_string($productImage))
                    {{-- Jika dari API (edit mode) --}}
                    <img src="https://sinergi.dev.ybgee.my.id/img/product/{{ $productImage }}" id="previewImg"
                        alt="Thumbnail Preview"  class="max-w-[250px] h-auto object-cover rounded-lg mx-auto">
                    @else
                    {{-- Jika dari Upload Baru --}}
                    <img src="{{ $productImage->temporaryUrl() }}" id="previewImg" alt="Thumbnail Preview"
                    class="max-w-[250px] h-auto object-cover rounded-lg mx-auto">
                    @endif
                    @endif
                </div>

            </div>

            <div class="flex space-x-3">
                @if (!$updateData)
                <button type="submit"
                    class="px-4 py-2 bg-indigo-600 text-white rounded-lg shadow-md hover:bg-indigo-700">SAVE</button>
                @else
                <button wire:click='update()' type="button"
                    class="px-4 py-2 bg-yellow-500 text-white rounded-lg shadow-md hover:bg-yellow-600">UPDATE</button>
                <button wire:click="resetForm" type="button"
                    class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg shadow-md">Cancel</button>
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
                            <button wire:click="edit('{{ $product['product_id'] }}')"
                                class="px-3 py-1 bg-yellow-500 text-white rounded shadow hover:bg-yellow-600">Edit</button>
                            <button wire:click="delete('{{ $product['product_id'] }}')"
                                class="px-3 py-1 bg-red-500 text-white rounded shadow hover:bg-red-600">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

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
<script>
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
    