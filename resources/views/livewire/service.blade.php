<div>
    <div class="container mx-auto text-black">
        {{-- Form Section --}}
        <div class="my-3 p-3 bg-gray-200 rounded-lg shadow-sm">
            <form>
                <div class="mb-3 grid grid-cols-12 items-center gap-4">
                    <label for="nama" class="col-span-2">Service Name</label>
                    <div class="col-span-5">
                        <input type="text" class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                    </div>
                </div>
                <div class="mb-3 grid grid-cols-12 items-center gap-4">
                    <label for="email" class="col-span-2">Service Description</label>
                    <div class="col-span-5">
                        <input type="email" class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                    </div>
                </div>
                <div class="mb-3 grid grid-cols-12 items-center gap-4">
                    <label for="alamat" class="col-span-2">Service Image</label>
                    <div class="col-span-5">
                        <input type="file" class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                    </div>
                </div>
                <div class="mb-3 grid grid-cols-12 items-center gap-4">
                    <div class="col-start-3 col-span-5">
                        <button type="button" class="px-4 py-2 btn btn-primary  text-white rounded-lg ">SIMPAN</button>
                    </div>
                </div>
            </form>
        </div>

        {{-- Table Section --}}
        <div class="my-3 p-3 bg-gray-200 rounded-lg shadow-sm">
            <h1 class="text-2xl font-bold mb-4">Data Pegawai</h1>
            <div class="overflow-x-auto">
                <table class="w-full table-auto">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left">No</th>
                            <th class="px-6 py-3 text-left">Service Name</th>
                            <th class="px-6 py-3 text-left">Service Descriptioin</th>
                            <th class="px-6 py-3 text-left">Service Image</th>
                            <th class="px-6 py-3 text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4">1</td>
                            <td class="px-6 py-4">Trip Jakarta</td>
                            <td class="px-6 py-4">Ini adalah kota Jakarta</td>
                            <td class="px-6 py-4">Yogyakarta.png</td>
                            <td class="px-6 py-4">
                                <button class="px-3 py-1 btn btn-warning  text-white rounded mr-2">Edit</button>
                                <button class="px-3 py-1 btn btn-error  text-white rounded ">Del</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
