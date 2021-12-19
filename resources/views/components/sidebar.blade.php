<aside
    class="
        fixed
        left-0
        w-1/2
        md:w-1/3
        lg:hidden
        top-[63px]
        bg-white/80
        backdrop-blur-sm
        p-5
        border-r
        transform
        -translate-x-full
        transition-transform
        ease-in-out
        overflow-y-auto
        z-10
        overscroll-contain
    "
    style="height: calc(100% - 63px)"
    id="sidebar"
>
    <ul class="flex gap-y-5 flex-col lg:flex-row">
        <li class="flex items-center gap-x-2 dropdown relative">
            <a href="#" class="flex flex-row-reverse items-center gap-x-2 dropdown-trigger w-full justify-end">
                <span class="hover:text-sky-500">
                    @auth
                        {{ Auth::user()->name }}
                    @else
                        Account
                    @endauth
                </span>
                <div class="w-[24px] h-[24px] bg-gray-200 rounded-full"></div>
            </a>
            <div
                class="
                dropdown-items
                hidden
                absolute
                top-[2.4rem]
                right-0
                bg-white
                border
                rounded-lg
                w-full
                min-w-[7rem]
                flex flex-col gap-y-3 py-4
                "
            >
                @auth
                    <a href="#profile" class="px-4 hover:text-sky-500">Profile</a>
                    <a href="#logout" class="px-4 hover:text-sky-500">Logout</a>
                @else
                    <a href="#login" class="px-4 hover:text-sky-500">Login</a>
                @endauth
            </div>
        </li>
        @foreach ($gCategories as $category)
            <li class="hover:text-sky-500 capitalize">
                <a href="{{ route('categories.show', $category) }}">{{ $category->name }}'s</a>
            </li>
        @endforeach
        <li class="hover:text-sky-500">Menu 1</li>
        <li class="hover:text-sky-500">Menu 2</li>
        <li class="hover:text-sky-500">Menu 1</li>
        <li class="hover:text-sky-500">Menu 2</li>
        <li class="hover:text-sky-500">Menu 1</li>
        <li class="hover:text-sky-500">Menu 2</li>
        <li class="hover:text-sky-500">Menu 1</li>
        <li class="hover:text-sky-500">Menu 2</li>
        <li class="hover:text-sky-500">Menu 1</li>
        <li class="hover:text-sky-500">Menu 2</li>
        <li class="hover:text-sky-500">Menu 1</li>
        <li class="hover:text-sky-500">Menu 2</li>
        <li class="hover:text-sky-500">Menu 1</li>
        <li class="hover:text-sky-500">Menu 2</li>
        <li class="hover:text-sky-500">Menu 1</li>
        <li class="hover:text-sky-500">Menu 2</li>
        <li class="hover:text-sky-500">Menu 1</li>
        <li class="hover:text-sky-500">Menu 2</li>
        <li class="hover:text-sky-500">Menu 1</li>
        <li class="hover:text-sky-500">Menu 2</li>
        <li class="hover:text-sky-500">Menu 1</li>
        <li class="hover:text-sky-500">Menu 2</li>
        <li class="hover:text-sky-500">Menu 1</li>
        <li class="hover:text-sky-500">Menu 2</li>
        <li class="hover:text-sky-500">Menu 1</li>
        <li class="hover:text-sky-500">Menu 2</li>
        <li class="hover:text-sky-500">Menu 1</li>
        <li class="hover:text-sky-500">Menu 2</li>
        <li class="hover:text-sky-500">Menu 1</li>
        <li class="hover:text-sky-500">Menu 2</li>
        <li class="hover:text-sky-500">Menu 1</li>
        <li class="hover:text-sky-500">Menu 2</li>
        <li class="hover:text-sky-500">Menu 1</li>
        <li class="hover:text-sky-500">Menu 2</li>
        <li class="hover:text-sky-500">Menu 1</li>
        <li class="hover:text-sky-500">Menu 2</li>
        <li class="hover:text-sky-500">Menu 1</li>
        <li class="hover:text-sky-500">Menu 2</li>
        <li class="hover:text-sky-500">Menu 1</li>
        <li class="hover:text-sky-500">Menu 2</li>
        <li class="hover:text-sky-500">Menu 1</li>
        <li class="hover:text-sky-500">Menu 2</li>
        <li class="hover:text-sky-500">Menu 1</li>
        <li class="hover:text-sky-500">Menu 2</li>
        <li class="hover:text-sky-500">Menu 1</li>
        <li class="hover:text-sky-500">Menu 2</li>
        <li class="hover:text-sky-500">Menu 1</li>
        <li class="hover:text-sky-500">Menu 2</li>
        <li class="hover:text-sky-500">Menu 1</li>
        <li class="hover:text-sky-500">Menu 2</li>
        <li class="hover:text-sky-500">Menu 1</li>
        <li class="hover:text-sky-500">Menu 2</li>
        <li class="hover:text-sky-500">Menu 1</li>
        <li class="hover:text-sky-500">Menu 2</li>
        <li class="hover:text-sky-500">Menu 1</li>
        <li class="hover:text-sky-500">Menu 2</li>
        <li class="hover:text-sky-500">Menu 1</li>
        <li class="hover:text-sky-500">Menu 2</li>
        <li class="hover:text-sky-500">Menu 1</li>
        <li class="hover:text-sky-500">Menu 2</li>
        <li class="hover:text-sky-500">Menu 1</li>
        <li class="hover:text-sky-500">Menu 2</li>
        <li class="hover:text-sky-500">Menu 1</li>
        <li class="hover:text-sky-500">Menu 2</li>
        <li class="hover:text-sky-500">Menu 1</li>
        <li class="hover:text-sky-500">Menu 2</li>
        <li class="hover:text-sky-500">Menu 1</li>
        <li class="hover:text-sky-500">Menu 2</li>
        <li class="hover:text-sky-500">Menu 1</li>
        <li class="hover:text-sky-500">Menu 2</li>
    </ul>
</aside>
