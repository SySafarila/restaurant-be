@extends('layouts.admin')

@section('title', 'Admin')

@section('head')
@endsection

@section('content')
<div class="p-5">
    @if (session('status'))
    <p class="bg-sky-200 text-sky-700 p-4 rounded-lg mb-5">{{ session('status') }}</p>
    @endif
    <div class="mb-5 flex items-center gap-2">
        <h2 class="text-2xl font-semibold">Photos Manager</h2>
        {{-- <a href="#" class="material-icons-round text-sky-500 hover:text-sky-600">add</a> --}}
    </div>
    <div class="items-center grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
        {{-- <div class="flex flex-col h-full justify-between gap-2">
            <img src="{{ asset($product->coverPath . $product->cover) }}" alt="{{ $product->cover }}" class="w-full max-h-[10rem] h-full object-contain">
            <div class="flex gap-2">
                <a href="{{ route('admin.products.photosManagerDelete', ['imageId' => $product->id, 'productId' => $product->id]) }}" class="bg-rose-500 hover:bg-rose-600 text-white px-2 py-1 rounded" onclick="event.preventDefault(); document.getElementById('delete{{ $product->id }}').submit();">Delete</a>
            </div>
        </div>
        <form action="{{ route('admin.products.photosManagerDelete', ['imageId' => $product->id, 'productId' => $product->id]) }}" method="post" id="{{ 'delete' . $product->id }}" class="hidden">
            @csrf
            @method('DELETE')
        </form> --}}
        @foreach ($product->images as $image)
            <div class="flex flex-col h-full justify-between gap-2">
                <img src="{{ asset($image->path . $image->name) }}" alt="{{ $image->name }}" class="w-full max-h-[10rem] h-full object-contain">
                <div class="flex gap-2">
                    <a href="{{ route('admin.products.photosManagerDelete', ['imageId' => $image->id, 'productId' => $product->id]) }}" class="bg-rose-500 hover:bg-rose-600 text-white px-2 py-1 rounded" onclick="event.preventDefault(); document.getElementById('delete{{ $image->id }}').submit();">Delete</a>
                </div>
            </div>
            <form action="{{ route('admin.products.photosManagerDelete', ['imageId' => $image->id, 'productId' => $product->id]) }}" method="post" id="{{ 'delete' . $image->id }}" class="hidden">
                @csrf
                @method('DELETE')
            </form>
        @endforeach
    </div>
    <form action="{{ route('admin.products.photosManagerStore', $product->id) }}" method="POST" enctype="multipart/form-data" class="mt-4">
        @csrf
        <div class="flex flex-col gap-1">
            <label class="capitalize" for="additionalImages">additional images</label>
            <input type="file" name="additionalImages[]" id="additionalImages" class="w-full file:border-none file:p-2 file:rounded file:bg-sky-100 file:text-sky-700 hover:file:bg-sky-200 file:mr-3" accept="image/*" multiple>
        </div>
        <button type="submit" class="mt-4 bg-sky-500 hover:bg-sky-600 text-white px-2 py-1 rounded">Add</button>
    </form>
</div>
@endsection

@section('script')
@endsection
