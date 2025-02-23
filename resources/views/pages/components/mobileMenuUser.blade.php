@php
    use App\Models\NavL;
    $navLinks = NavL::getUserNavLinks();
@endphp
<div class="drawer drawer-end">
    <input id="my-drawer-4" type="checkbox" class="drawer-toggle" />
    
    <div class="drawer-content py-2 px-2 rounded-xl bg-gray-400 bg-opacity-20">
        <label for="my-drawer-4" class="cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 48 48">
                <path fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M7.95 11.95h32m-32 12h32m-32 12h32"></path>
            </svg>
        </label>
    </div>

    <div class="drawer-side">
        <label for="my-drawer-4" aria-label="close sidebar" class="drawer-overlay"></label>
        
        <!-- Perbaikan agar drawer hanya setinggi menu -->
        <ul class="menu bg-base-200 text-base-content  w-50 md:w-60 p-2 rounded-lg shadow-lg h-auto">
            <li class="menu-title text-gray-400">Menu</li>

            @foreach($navLinks as $link)
                <li>
                    <a href="{{ $link['href'] }}" 
                       class="font-semibold text-lg px-4 py-2 
                        {{ request()->is(ltrim($link['href'], '/')) ? 'active text-blue-300 bg-blue-950 rounded-md' : 'text-gray-300 hover:text-blue-300' }}">
                        {{ $link['name'] }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>

