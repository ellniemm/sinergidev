<div aria-live="assertive" class="toast toast-end z-50">
    @php
    $toastTypes = [
        'success' => ['alert alert-success text-white', 'M5 13l4 4L19 7', 'border-white'],
        'error'   => ['alert alert-error text-white', 'M6 18L18 6M6 6l12 12', 'border-white'],
        'warning' => ['alert alert-warning text-white', 'M12 2L2 12h3v8h6v-6h2v6h6v-8h3z', 'border-white'],
        'info'    => ['alert alert-info text-white', 'M12 2L2 12h3v8h6v-6h2v6h6v-8h3z', 'border-white']
    ];
    @endphp

    @if ($show)
    <div 
         x-data="{ 
             show: @entangle('show').live, 
             message: @entangle('message').live,
             type: @entangle('type').live,
             init() {
                 setTimeout(() => { 
                     this.show = false;
                     this.$wire.hideToast();
                 }, 3000);
             }
         }"
         x-show="show"
         x-transition
         class="transition-all duration-200 ease-in-out">
         
         <div class="max-w-sm px-4 py-2 rounded-lg shadow-lg flex items-center space-x-2 {{ $toastTypes[$type][0] }}">
            <div class="w-8 h-8 flex items-center justify-center rounded-full border {{ $toastTypes[$type][2] }}">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $toastTypes[$type][1] }}" />
                </svg>
            </div>
            <span class="text-sm" x-text="message"></span>
        </div>
    </div>
    @endif
</div>

<script>
     document.addEventListener("DOMContentLoaded", function () {
        Livewire.on('startToastTimer', () => {
            setTimeout(() => {
                Livewire.dispatch('hideToast');
            }, 2000);
        });
    });
    
</script>
