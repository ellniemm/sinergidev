@php
    use App\Models\NavL;
    $navLinks = NavL::getAdminNavLinks();
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
        <ul class="menu bg-base-200 text-base-content w-40 md:w-60 p-3 rounded-lg shadow-lg h-auto">
            <li class="menu-title text-gray-400 text-sm md:text-base">Menu</li>
            @foreach($navLinks as $link)
                <a href="{{ route($link['href']) }}"
                    class="text-sm md:text-base font-semibold relative cursor-pointer hover:text-blue-300 transition-all duration-200 px-2 py-1
                    {{ request()->is(ltrim($link['href'], '/')) ? 'active text-blue-300 bg-blue-950 rounded-md' : 'text-gray-300 hover:text-blue-300' }}">
                    {{ $link['name'] }}
                    <span class="absolute -bottom-1 left-0 w-full h-[2px] bg-blue-300 transform origin-left transition-transform duration-200 ease-out scale-x-0"></span>
                </a>
            @endforeach
        </ul>
    </div>
</div>
