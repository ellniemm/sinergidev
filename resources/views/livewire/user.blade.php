<div class="">
    <div class="container mx-auto text-black">
        @livewire('toast')

        <div class="my-3 p-3 bg-gray-200 rounded-lg shadow-sm h-screen">
            <h1 class="text-2xl font-bold mb-4">User Management</h1>
            <div class="overflow-x-auto">
                <table class="w-full table-auto">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left">No</th>
                            <th class="px-6 py-3 text-left">Name</th>
                            <th class="px-6 py-3 text-left">Email</th>
                            <th class="px-6 py-3 text-left">Status</th>
                            <th class="px-6 py-3 text-left">Created At</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($users as $index => $user)
                        <tr>
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ $user['name'] }}</td>
                            <td class="px-6 py-4">{{ $user['email'] }}</td>
                            <td class="px-6 py-4">
                                <select wire:change="updateStatus('{{ $user['id'] }}', $event.target.value)"
                                    class="select select-primary bg-white rounded-md ">
                                    <option value="active" {{ $user['status']==='active' ? 'selected disabled' : '' }}>
                                        Active
                                    </option>
                                    <option value="suspended" {{ $user['status']==='suspended' ? 'selected disabled'
                                        : '' }}>
                                        Suspended
                                    </option>
                                </select>
                            </td>
                            <td class="px-6 py-4">{{ \Carbon\Carbon::parse($user['created_at'])->format('Y-m-d') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
