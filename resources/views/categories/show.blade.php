@extends('layouts.main')

@section('title', 'RestEat')

@section('content')
<main class="mt-[63px] max-w-[1440px] w-full mx-auto p-5" style="min-height: calc(100vh - 63px - 61px);">
    <div id="{{ $category->name }}">
        <h2 class="font-['Fredericka_the_Great'] text-5xl capitalize">{{ $category->name }}'s</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-5 my-5">
            @foreach ($category->products as $product)
            <a href="{{ route('product.show', ['id' => $product->id, 'name' => $product->name]) }}" class="
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
                w-full
                h-[10rem]
                xl:h-[15rem]
            ">
                    <img src="{{ asset($product->coverPath . $product->cover) }}" alt="{{ $product->name }}" class="
                    w-full
                    group-hover:brightness-75
                    transition-all
                    ease-in-out
                    h-full
                    object-contain
                " />
                    @if ($product->discount > 0)
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
                ">
                        <span class="material-icons-round text-sm">discount</span>
                        <span class="text-sm">{{ $product->discount }}%</span>
                    </div>
                    @endif
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
</main>
@endsection

@section('script')

@endsection
