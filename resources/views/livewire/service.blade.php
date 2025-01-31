<div>
    <div class="container mx-auto text-black">
        @if ($message)
            <div class="my-3 p-3 bg-green-200 rounded-lg shadow-sm">
                <p class="text-green-700">{{ $message }}</p>
            </div>
        @endif
        @if ($errors && count($errors) > 0)
            <div class="my-3 p-3 bg-red-200 rounded-lg shadow-sm">
                <ul>
                    @foreach ($errors as $field => $errorMessages)
                        <li class="text-red-500">{{ is_array($errorMessages) ? $errorMessages[0] : $errorMessages }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            
        {{-- Form Section --}}
        <div class="my-3 p-3 bg-gray-200 rounded-lg shadow-sm">
            <form wire:submit.prevent="store" enctype="multipart/form-data">
                <div class="mb-3 grid grid-cols-12 items-center gap-4">
                    <label for="nama" class="col-span-2">Service Name</label>
                    <div class="col-span-5">
                        <input type="text" class="form-control w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500" wire:model='serviceName'>
                    </div>
                </div>
                <div class="mb-3 grid grid-cols-12 items-center gap-4">
                    <label for="email" class="col-span-2">Service Description</label>
                    <div class="col-span-5">
                        <input type="text" class="form-control w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500" wire:model='serviceDescription'>
                    </div>
                </div>
                <div class="mb-3 grid grid-cols-12 items-center gap-4">
                    <label for="alamat" class="col-span-2">Service Image</label>
                    <div class="col-span-5">
                        <input type="file" class="form-control w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500" wire:model='serviceImage'>
                    </div>
                </div>
                <div class="mb-3 grid grid-cols-12 items-center gap-4">
                    <div class="col-start-3 col-span-5">
                        <button type="submit" class="px-4 py-2 btn btn-primary text-white rounded-lg">SIMPAN</button>
                    </div>
                </div>
            </form>
        </div>

        {{-- Table Section with wire:poll for real-time updates --}}
        <div class="my-3 p-3 bg-gray-200 rounded-lg shadow-sm" wire:poll.5s>
            <h1 class="text-2xl font-bold mb-4">Data Services</h1>
            <div class="overflow-x-auto">
                <table class="w-full table-auto">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left">No</th>
                            <th class="px-6 py-3 text-left">Service Name</th>
                            <th class="px-6 py-3 text-left">Service Description</th>
                            <th class="px-6 py-3 text-left">Service Image</th>
                            <th class="px-6 py-3 text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($services as $index => $service)
                        <tr>
                            <td class="px-6 py-4">{{ $index + 1 }}</td>
                            <td class="px-6 py-4">{{ $service['service_name'] }}</td>
                            <td class="px-6 py-4">{{ $service['service_desc'] }}</td>
                            <td class="px-6 py-4">{{ $service['service_img'] }}</td>
                            <td class="px-6 py-4">
                                <button class="px-3 py-1 btn btn-warning text-white rounded mr-2">Edit</button>
                                <button class="px-3 py-1 btn btn-error text-white rounded">Del</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
