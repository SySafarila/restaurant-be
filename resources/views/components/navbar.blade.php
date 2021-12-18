<div class="fixed top-0 w-full bg-white/80 backdrop-blur-sm border-b px-5 z-10">
    <nav class="
            flex
            justify-between
            max-w-[1440px]
            mx-auto
            items-center
            my-3
            relative
        ">
        <div class="flex items-center gap-x-2" id="left">
            <button class="material-icons-round lg:hidden" id="menu">
                menu
            </button>
            <a href="{{ route('index') }}" class="
                    text-sky-500
                    hover:text-sky-600
                    font-['Fredericka_the_Great']
                    text-[25px]
                ">RestEat</a>
            <li class="
                    lg:flex
                    items-center
                    gap-x-2
                    border-l
                    pl-2.5
                    dropdown
                    relative
                    ml-1
                    hidden
                ">
                <a href="#" class="flex items-center gap-x-2 dropdown-trigger"><span
                        class="hover:text-sky-500">Categories</span>
                    <!-- <div class="w-[24px] h-[24px] bg-gray-200 rounded-full"></div> -->
                </a>
                <div class="
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
                    ">
                    {{-- <a href="#profile" class="px-4 hover:text-sky-500">Food's</a>
                    <a href="#logout" class="px-4 hover:text-sky-500">Drink's</a>
                    <a href="#other" class="px-4 hover:text-sky-500">Other's</a> --}}
                    @foreach ($gCategories as $category)
                        <a href="#other" class="capitalize px-4 hover:text-sky-500">{{ $category->name }}'s</a>
                    @endforeach
                </div>
            </li>
        </div>
        <div id="center">
            <form action="#" class="flex">
                <input type="text" name="search" id="search" class="
                        border
                        focus:outline-none
                        px-2
                        rounded-l
                        w-[12rem]
                        lg:w-[32rem]
                    " placeholder="Fried rice / Lemon tea" />
                <button class="
                        border border-l-0
                        material-icons-round
                        p-1.5
                        bg-gray-200
                        text-gray-500
                        rounded-r
                        hover:bg-gray-300
                    ">
                    search
                </button>
            </form>
        </div>
        <div class="hidden lg:block" id="right">
            <ul class="items-center flex gap-x-3 flex-col lg:flex-row">
                <a href="#" class="material-icons-round hover:text-sky-500">notifications</a>
                <!-- <li class="hover:text-sky-500"> -->
                <a href="#" class="material-icons-round hover:text-sky-500">shopping_cart</a>
                <!-- </li> -->
                <li class="
                        flex
                        items-center
                        gap-x-2
                        border-l
                        pl-2.5
                        dropdown
                        relative
                    ">
                    <a href="#" class="flex items-center gap-x-2 dropdown-trigger"><span
                            class="hover:text-sky-500">Syahrul</span>
                        <div class="w-[24px] h-[24px] bg-gray-200 rounded-full"></div>
                    </a>
                    <div class="
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
                        ">
                        <a href="#profile" class="px-4 hover:text-sky-500">Profile</a>
                        <a href="#logout" class="px-4 hover:text-sky-500">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>
