<div>
    <div class="container mx-auto text-black">
        @livewire('toast')

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
                                    class="select select-primary bg-white rounded-md ">
                                    <option value="pending" {{ $user['status']==='pending' ? 'selected disabled' : ''
                                        }}>
                                        Pending
                                    </option>
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

            <div class="flex justify-between items-center mt-4">
                @if ($prevPageUrl)
                <button wire:click="fetchUsers({{ $currentPage - 1 }})"
                    class="btn btn-neutral text-white">
                    <svg xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" viewBox="0 0 24 24">
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
                <button wire:click="fetchUsers({{ $currentPage + 1 }})"
                    class="btn btn-neutral text-white">Next
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="#fff" d="M9.31 6.71a.996.996 0 0 0 0 1.41L13.19 12l-3.88 3.88a.996.996 0 1 0 1.41 1.41l4.59-4.59a.996.996 0 0 0 0-1.41L10.72 6.7c-.38-.38-1.02-.38-1.41.01" />
                    </svg>
                </button>
                @endif
            </div>
        </div>
    </div>
</div>