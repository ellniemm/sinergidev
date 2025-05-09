@extends('pages.layouts.layout')
@section('title', 'Feedback Questions - Admin Sinergi Studio')

@section('main')
<div class="bg-gray-50">
    <div x-data="{ showToast: false, message:'', type:'' }" x-init="@if (session()->has('toast')) 
                    showToast = true; 
                    message = '{{ session('toast')['message'] }}'; 
                    type = '{{ session('toast')['type'] }}'; 
                    setTimeout(() => showToast = false, 3000);
                 @endif">

        <div x-show="showToast" x-transition class="toast toast-end z-50">
            <div class="max-w-sm px-4 py-2 rounded-lg shadow-lg flex items-center space-x-2" :class="{
                    'alert alert-success text-white': type === 'success',
                    'alert alert-error text-white': type === 'error',
                    'alert alert-warning text-white': type === 'warning',
                    'alert alert-info text-white': type === 'info'
                 }">
                <div class="w-8 h-8 flex items-center justify-center rounded-full border border-white">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            x-show="type === 'success'" d="M5 13l4 4L19 7" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x-show="type === 'error'"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </div>
                <span class="text-sm" x-text="message"></span>
            </div>
        </div>

        <div class="text-black bg-white rounded-md shadow-md mx-auto p-6 h-screen">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold">Feedback Questions</h1>
                @if(isset($fq_not_replied) && $fq_not_replied > 0)
                <div class="badge badge-error text-white p-3">{{ $fq_not_replied }} unreplied messages</div>
                @endif
            </div>

            <div class="overflow-x-auto">
                <table class="table w-full">
                    <thead>
                        <tr class="text-black">
                            <th>No</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Description</th>
                            <th>Created At</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($faqs as $index => $fq)
                        <tr class="text-black">
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $fq['fq_fullname'] }}</td>
                            <td>{{ $fq['fq_email'] }}</td>
                            <td>{{ $fq['fq_notelp'] }}</td>
                            <td class="max-w-[200px] overflow-hidden" title="{{ $fq['fq_desc'] }}">
                                <div class="truncate">
                                    {{ Str::words($fq['fq_desc'], 5, '...') }}
                                </div>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($fq['created_at'])->format('d M Y') }}</td>
                            <td>
                                @if(!empty($fq['replied_at']))
                                <span class="badge badge-success text-white">Replied</span>
                                @else
                                <span class="badge badge-error text-white">Unreplied</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.faq.detail', $fq['fq_id']) }}"
                                    class="btn btn-warning text-white btn-sm">
                                    View
                                </a>
                                <form action="{{ route('admin.faq.delete', $fq['fq_id']) }}" method="POST"
                                    class="inline"
                                    onsubmit="return confirm('Are you sure you want to delete this FAQ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-error text-white btn-sm">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="text-black flex justify-between items-center mt-4">
                    @if (count($faqs) > 0)
                    @if ($pagination['prev_page_url'])
                    <a href="{{ $pagination['prev_page_url'] }}" class="btn btn-neutral text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <g fill="none" fill-rule="evenodd">
                                <path
                                    d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                                <path fill="#fff"
                                    d="M8.293 12.707a1 1 0 0 1 0-1.414l5.657-5.657a1 1 0 1 1 1.414 1.414L10.414 12l4.95 4.95a1 1 0 0 1-1.414 1.414z" />
                            </g>
                        </svg>
                        Previous
                    </a>
                    @endif

                    <span>Page {{ $pagination['current_page'] }} of {{ $pagination['last_page'] }}</span>

                    @if ($pagination['next_page_url'])
                    <a href="{{ $pagination['next_page_url'] }}" class="btn btn-neutral text-white">
                        Next
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="#fff"
                                d="M9.31 6.71a.996.996 0 0 0 0 1.41L13.19 12l-3.88 3.88a.996.996 0 1 0 1.41 1.41l4.59-4.59a.996.996 0 0 0 0-1.41L10.72 6.7c-.38-.38-1.02-.38-1.41.01" />
                        </svg>
                    </a>
                    @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection