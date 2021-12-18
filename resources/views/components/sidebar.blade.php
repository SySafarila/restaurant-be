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
    <ul class="flex gap-y-3 flex-col lg:flex-row">
        <li class="flex items-center gap-x-2 dropdown relative">
            <a
                href="#"
                class="
                    flex flex-row-reverse
                    items-center
                    gap-x-2
                    dropdown-trigger
                    w-full
                    justify-end
                "
                ><span class="hover:text-sky-500">Syahrul</span>
                <div class="w-[24px] h-[24px] bg-gray-200 rounded-full"></div>
            </a>
            <div
                class="
                    dropdown-items
                    hidden
                    absolute
                    top-[2.5rem]
                    right-0
                    bg-white
                    border
                    rounded-lg
                    py-2
                    min-w-[7rem]
                "
            >
                <a href="#profile" class="px-4 hover:text-sky-500">Profile</a>
                <a href="#logout" class="px-4 hover:text-sky-500">Logout</a>
            </div>
        </li>
        @foreach ($gCategories as $category)
            <li class="hover:text-sky-500">
                <a href="#{{ $category->name }}">{{ $category->name }}</a>
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
