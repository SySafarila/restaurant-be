@extends('layouts.main')

@section('title', 'RestEat')

@section('head')
<!-- splide js : start -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.9/dist/css/splide.min.css" />
<style>
    .splide__pagination .splide__pagination__page {
        background-color: #ffffff6e;
    }

    .splide__pagination .splide__pagination__page.is-active {
        background-color: white;
    }

    .splide__pagination {
        justify-content: flex-start;
    }

    /* Large devices (desktops, 992px and up) */
    @media (min-width: 992px) {
        .splide__pagination {
            justify-content: center;
        }
    }
</style>
<!-- splide js : end -->
@endsection

@section('content')
<main class="mt-[63px] max-w-[1440px] w-full mx-auto p-5" style="min-height: calc(100vh - 63px - 61px);">
    <div class="relative overflow-hidden mb-5 group rounded-lg" id="splide">
        <div class="splide__arrows hidden lg:block">
            <button class="
                    absolute top-[50%] z-10 rounded-full -translate-x-[200%] group-hover:translate-x-0 splide__arrow--prev
                    bg-white/50
                    hover:bg-white/80
                    material-icons
                    transform
                    translate-y-[-50%]
                    transition-all
                    ease-in-out
                    h-[40px]
                    w-[40px]
                ">
                chevron_left
            </button>
            <button class="
                    absolute top-[50%] z-10 rounded-full translate-x-[200%] group-hover:translate-x-0 splide__arrow--next
                    bg-white/50
                    hover:bg-white/80
                    material-icons
                    transform
                    translate-y-[-50%]
                    transition-all
                    ease-in-out
                    h-[40px]
                    w-[40px]
                ">
                chevron_right
            </button>
        </div>
        <div class="splide__track">
            <ul class="splide__list">
                <li class="splide__slide">
                    <div class="
                            w-full
                            h-[10rem]
                            lg:h-[20rem]
                            bg-gray-300

                            relative
                            overflow-hidden
                        ">
                        <img src="https://source.unsplash.com/random/1300x320?sig=1"
                            class="w-full h-full object-center object-cover" />
                    </div>
                </li>
                <li class="splide__slide">
                    <div class="
                            w-full
                            h-[10rem]
                            lg:h-[20rem]
                            bg-gray-300

                            relative
                            overflow-hidden
                        ">
                        <img src="https://source.unsplash.com/random/1300x320?sig=2"
                            class="w-full h-full object-center object-cover" />
                    </div>
                </li>
                <li class="splide__slide">
                    <div class="
                            w-full
                            h-[10rem]
                            lg:h-[20rem]
                            bg-gray-300

                            relative
                            overflow-hidden
                        ">
                        <img src="https://source.unsplash.com/random/1300x320?sig=3"
                            class="w-full h-full object-center object-cover" />
                    </div>
                </li>
            </ul>
        </div>
    </div>
    @foreach ($categories as $category)
    <div id="{{ $category->name }}">
        <h2 class="font-['Fredericka_the_Great'] text-5xl capitalize">{{ $category->name }}'s</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-5 my-5">
            @foreach ($category->products as $product)
            <a href="{{ route('product.show', $product) }}" class="
            group
            flex flex-col
            gap-y-2
            border border-transparent
            hover:border-gray-200
            transition-colors
            ease-in-out
            rounded-lg
        ">
                <div class="
                group-hover:scale-95
                transition-all
                ease-in-out
                relative
                overflow-hidden
                rounded-lg
            ">
                    <img src="{{ $product->cover }}" alt="{{ $product->name }}" class="
                    w-full
                    group-hover:brightness-75
                    transition-all
                    ease-in-out
                " />
                    <div class="
                    flex
                    items-center
                    bg-sky-500
                    text-white
                    w-fit
                    absolute
                    top-0
                    left-0
                    p-2
                    rounded-br
                    gap-x-1
                    hidden
                ">
                        <span class="material-icons-round text-sm">discount</span>
                        <span class="text-sm">5%</span>
                    </div>
                </div>
                <h3 class="
                group-hover:text-sky-500
                transition-all
                ease-in-out
                px-2
            ">
                    {{ $product->name }}
                </h3>
                <span class="
                font-bold
                px-2
                pb-2
                text-sky-500
                group-hover:text-current
                transition-all
                ease-in-out
            ">Rp{{ number_format($product->price,0 ,0, ',') }}</span>
            </a>
            @endforeach
        </div>
    </div>
    @endforeach
</main>
@endsection

@section('script')
<!-- splide js -->
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.9/dist/js/splide.min.js"></script>
<script>
    new Splide("#splide", {
      type: 'loop',
      gap: 0,
      pagination: true,
      autoplay: true,
      pauseOnHover: true,
      rewind: true,
    }).mount();
</script>
<script>
    // handle not found images
    let imgs = document.querySelectorAll('img');
    imgs.forEach((img, index) => {
        img.addEventListener('error', () => {
            img.src = "/images/404.png"
        })
    })
</script>
@endsection
