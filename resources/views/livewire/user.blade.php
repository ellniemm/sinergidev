<div>
    <div class="container mx-auto text-black">
        @if ($message)
        <div class="my-3 p-3 bg-green-200 rounded-lg shadow-sm">
            <p class="text-green-700">{{ $message }}</p>
        </div>
        @endif

        <div class="my-3 p-3 bg-gray-200 rounded-lg shadow-sm">
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
                            <td class="px-6 py-4">{{ ($currentPage - 1) * $perPage + $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ $user['name'] }}</td>
                            <td class="px-6 py-4">{{ $user['email'] }}</td>
                            <td class="px-6 py-4">
                                <select wire:change="updateStatus('{{ $user['id'] }}', $event.target.value)"
                                    class="rounded border-gray-300">
                                    <option value="pending" {{ $user['status']==='pending' ? 'selected' : '' }}>Pending
                                    </option>
                                    <option value="active" {{ $user['status']==='active' ? 'selected' : '' }}>Active
                                    </option>
                                    <option value="suspended" {{ $user['status']==='suspended' ? 'selected' : '' }}>
                                        Suspended</option>
                                </select>
                            </td>
                            <td class="px-6 py-4">{{ \Carbon\Carbon::parse($user['created_at'])->format('Y-m-d') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="flex justify-between items-center mt-4">
                @if ($prevPageUrl)
                <button wire:click="fetchUsers({{ $currentPage - 1 }})"
                    class="px-4 py-2 bg-gray-300 rounded">Previous</button>
                @endif
                <span>Page {{ $currentPage }} of {{ $lastPage }}</span>
                @if ($nextPageUrl)
                <button wire:click="fetchUsers({{ $currentPage + 1 }})"
                    class="px-4 py-2 bg-gray-300 rounded">Next</button>
                @endif
            </div>
        </div>
    </div>
</div>