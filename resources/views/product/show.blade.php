@extends('layouts.main')

@section('title', 'RestEat')

@section('head')
<!-- splide js : start -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.9/dist/css/splide.min.css" />
<style>
    .splide__slide {
        opacity: 0.3;
    }

    .splide__slide.is-active {
        opacity: 1;
    }

    .splide--nav>.splide__track>.splide__list>.splide__slide.is-active {
        border-color: #0ea5e9;
        border-width: 2px;
    }
</style>
 <!-- local style : start -->
 <style>
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    /* Firefox */
    input[type="number"] {
      -moz-appearance: textfield;
    }
  </style>
  <!-- local style : end -->
@endsection

@section('content')
<main class="mt-[63px] max-w-[1440px] w-full mx-auto p-5" style="min-height: calc(100vh - 63px - 61px);">
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-5 lg:gap-10">
        <div id="images" class="flex flex-col gap-3">
            <div class="splide" id="main-slider">
                <div class="splide__track">
                    <ul class="splide__list">
                        <li class="splide__slide rounded-lg overflow-hidden aspect-square relative">
                            <img src="{{ asset($product->coverPath . $product->cover) }}" class="
                    w-full h-full
                    hover:scale-[1.3]
                    transition-transform
                    ease-in-out object-contain
                  " />
                        </li>
                        @foreach ($product->images as $image)
                        <li class="splide__slide rounded-lg overflow-hidden aspect-square relative">
                            <img src="{{ asset($image->path . $image->name) }}" class="
                    w-full h-full
                    hover:scale-[1.3]
                    transition-transform
                    ease-in-out object-contain
                  " />
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div id="thumbnail-slider" class="splide">
                <div class="splide__track">
                    <ul class="splide__list">
                        <li class="splide__slide">
                            <img src="{{ asset($product->coverPath . $product->cover) }}" style="height: 100%;width: 100%;object-fit: contain;" />
                        </li>
                        @foreach ($product->images as $image)
                        <li class="splide__slide">
                            <img src="{{ asset($image->path . $image->name) }}" style="height: 100%;width: 100%;object-fit: contain;" />
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="lg:col-span-2">
            <div class="border-b pb-3">
                <h1 class="font-bold text-lg">
                    {{$product->name}}
                </h1>
                <div class="flex items-start">
                    <span class="text-sky-500 text-2xl">Rp{{ number_format($product->price,0 ,0, ',') }}</span>
                    @if ($product->discount > 0)
                    <div class="flex items-center bg-sky-500 text-white rounded-full px-1 py-[0.1rem]">
                        <span class="material-icons-round text-xs">discount</span>
                        <span class="text-xs">{{ $product->discount }}%</span>
                    </div>
                    @endif
                </div>
            </div>
            <div class="flex flex-col gap-3 pt-3">
                <h2 class="font-['Fredericka_the_Great'] text-3xl">Detail</h2>
                <p class="whitespace-pre-line">{{ $product->description }}</p>
            </div>
        </div>
        <div class="border rounded-lg p-3 flex flex-col gap-y-5 h-min">
            <h3 class="font-['Fredericka_the_Great'] text-3xl text-center">
                Order Here
            </h3>
            <form action="#" class="flex flex-col gap-y-5">
                <div class="flex flex-col gap-2">
                    <label for="quantity">Quantity</label>
                    <div class="flex">
                        <input type="number" name="" id="quantity" class="
                  border
                  w-full
                  rounded-l
                  focus:outline-none
                  p-2
                  text-center
                " placeholder="Example : 1" min="1" value="1" />
                        <button class="w-[4rem] bg-red-500 hover:bg-red-600 text-white" id="-qty">
                            -
                        </button>
                        <button class="
                  w-[4rem]
                  bg-sky-500
                  hover:bg-sky-600
                  text-white
                  rounded-r
                " id="+qty">
                            +
                        </button>
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <label for="note">Note</label>
                    <textarea name="note" id="note" rows="5" class="border w-full rounded focus:outline-none p-2"
                        placeholder="Example : Extra sauce"></textarea>
                </div>
                <button class="
              bg-sky-500
              text-white
              font-['Fredericka_the_Great']
              rounded
              p-2
              hover:bg-sky-600
            ">
                    Buy
                </button>
            </form>
        </div>
        <div class="lg:col-span-3">
            <h3 class="font-['Fredericka_the_Great'] text-3xl">Review's</h3>
            <div class="flex flex-col gap-5 py-5">
                @foreach ($product->reviews as $review)
                <div class="flex flex-col lg:flex-row gap-y-2 gap-x-5">
                    <div class="flex items-start shrink-0 gap-x-3">
                        <img src="https://source.unsplash.com/random/50x50?sig=1" alt="x"
                        class="w-[50px] rounded-full" />
                        <div class="flex flex-col">
                            <span>User</span>
                            <span class="opacity-80 text-sm">{{ $review->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                    <p class="xl:w-1/2">{{ $review->text }}</p>
                </div>
                @endforeach
                @if ($product->reviews->count() == 0)
                    <p>Empty</p>
                @endif
            </div>
        </div>
    </div>
</main>
@endsection

@section('script')
    <!-- splide js -->
  <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.9/dist/js/splide.min.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      var main = new Splide("#main-slider", {
        type: "fade",
        rewind: true,
        pagination: false,
        arrows: false,
      });

      var thumbnails = new Splide("#thumbnail-slider", {
        fixedWidth: 50,
        fixedHeight: 50,
        gap: 10,
        rewind: true,
        pagination: false,
        cover: false,
        isNavigation: true,
        arrows: false,
      });

      main.sync(thumbnails);
      main.mount();
      thumbnails.mount();
    });
  </script>

  <script>
    // qty controller
    const qty = document.getElementById("quantity");
    const min = document.getElementById("-qty");
    const plus = document.getElementById("+qty");

    min.addEventListener("click", (e) => {
      e.preventDefault();
      if (qty.value > 1) {
        qty.value = qty.value - 1;
      }
    });
    plus.addEventListener("click", (e) => {
      e.preventDefault();
      if (qty.value >= 1) {
        qty.value = parseInt(qty.value) + 1;
      }
    });
    qty.addEventListener("keyup", () => {
      if (qty.value == 0) {
        qty.value = 1;
      }
    });
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
