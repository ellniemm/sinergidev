@extends('pages.layouts.layout')
@section('title', 'FQ Detail - Admin Sinergi Studio')

@section('main')
<div class="bg-gray-50 min-h-screen p-6">
    <div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg p-8">
        <div class="border-b pb-4 mb-6">
            <div class="flex justify-between items-center mb-2">
                <h1 class="text-2xl font-bold text-gray-800">FQ Details</h1>
                @if(!empty($faq['replied_at']))
                <span class="badge badge-success text-white p-3">Replied on {{
                    \Carbon\Carbon::parse($faq['replied_at'])->format('d M Y') }}</span>
                @else
                <span class="badge badge-error text-white p-3">Unreplied</span>
                @endif
            </div>
            <div class="flex flex-col md:flex-row md:justify-between md:items-center text-sm text-gray-600">
                <div class="mb-2 md:mb-0">
                    <span class="font-semibold">From:</span> {{ $faq['fq_fullname'] }} ({{ $faq['fq_email'] }}) - Telp:
                    {{ $faq['fq_notelp'] }}
                </div>
                <span class="text-gray-500">
                    {{ \Carbon\Carbon::parse($faq['created_at'])->format('d M Y ') }}
                </span>
            </div>
        </div>

        @if($faq)
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Feedback/Question Description</label>
            <div class="bg-gray-100 p-4 rounded-lg min-h-[150px] shadow-inner">
                <p class="text-gray-800 text-lg">{{ $faq['fq_desc'] }}</p>
            </div>
        </div>

        @if(!empty($faq['replied_at']))
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Pesan Balasan</label>
            <div class="bg-blue-50 p-4 rounded-lg shadow-inner border border-blue-100">
                <p class="text-gray-800">{{ $faq['message'] ?? $faq['reply_message'] ?? '' }}</p>
            </div>
            @if (empty($faq['message']) && empty($faq['reply_message']) && !empty($faq['replied_at']))
                <p class="text-red-500 italic mt-2 text-sm">Pesan tidak tersedia disini, kemungkinan sudah dikirimkan melalui email.</p>
            @endif
            
        </div>
    </div>
    //


    <div class="mt-6 flex justify-center">
        <a href="{{ route('faq.index') }}" class="btn btn-primary text-white text-center">
            Kembali
        </a>
    </div>
    @else

    <form action="{{ route('admin.faq.reply', $faq['fq_id']) }}" method="POST" class="mt-8">
        @csrf
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Pesan Balasan
                </label>
                <textarea name="reply_message" rows="5"
                    class="w-full text-black border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Ketik balasan detil Anda di sini..." required></textarea>
            </div>
        </div>


        <div class="mt-6 flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 w-full">
                <button type="submit" name="reply_type" value="feedback" class="btn btn-success text-white">
                    Kirim sebagai Feedback
                </button>
                <button type="submit" name="reply_type" value="question" class="btn btn-primary text-white">
                    Kirim sebagai Pertanyaan
                </button>
            </div>
            <a href="{{ route('faq.index') }}" class="btn btn-neutral text-center text-slate-200">
                Kembali
            </a>
        </div>
    </form>
    @endif

    @else
    <p class="text-center text-gray-500">Tidak ada detail FAQ yang ditemukan.</p>
    @endif
</div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
    // Validasi form
    const form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', function(e) {
            const replyMessage = form.querySelector('textarea[name="reply_message"]');

            if (!replyMessage.value.trim()) {
                e.preventDefault();
                alert('Silakan masukkan pesan balasan');
                replyMessage.focus();
                return;
            }
        });
    }
});
</script>
@endsection