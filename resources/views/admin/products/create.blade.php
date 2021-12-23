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
        <h2 class="text-2xl font-semibold">Create Product</h2>
        {{-- <a href="{{ route('admin.products.create') }}"
            class="material-icons-round text-sky-500 hover:text-sky-600">add</a> --}}
    </div>
    <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data" class="flex flex-col gap-3">
        @csrf
        <div class="flex flex-col gap-1">
            <label class="capitalize" for="name">name</label>
            <input required class="w-full border rounded focus:outline-none p-2 focus:border-sky-400" type="text"
                name="name" value="{{ old('name') }}">
        </div>
        <div class="flex flex-col gap-1">
            <label class="capitalize" for="description">description</label>
            <textarea required class="w-full border rounded focus:outline-none p-2 focus:border-sky-400"
                name="description" rows="10">{{ old('description') }}</textarea>
        </div>
        <div class="flex flex-col gap-1">
            <label class="capitalize" for="quantity">quantity</label>
            <input required class="w-full border rounded focus:outline-none p-2 focus:border-sky-400" type="number"
                name="quantity" value="{{ old('quantity') }}">
        </div>
        <div class="flex flex-col gap-1">
            <label class="capitalize" for="price">price</label>
            <input required class="w-full border rounded focus:outline-none p-2 focus:border-sky-400" type="number"
                name="price" value="{{ old('price') }}">
        </div>
        <div class="flex flex-col gap-1">
            <label class="capitalize" for="discount">discount (%)</label>
            <input required class="w-full border rounded focus:outline-none p-2 focus:border-sky-400" type="number"
                name="discount" value="{{ old('discount') }}">
        </div>
        <div class="flex flex-col gap-1">
            <label class="capitalize" for="category">category</label>
            <select required class="w-full border rounded focus:outline-none p-2 focus:border-sky-400 capitalize"
                name="category_id">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex flex-col gap-1">
            <label class="capitalize" for="cover">cover</label>
            <input required type="file" name="cover" id="cover" class="w-full file:border-none file:p-2 file:rounded file:bg-sky-100 file:text-sky-700 hover:file:bg-sky-200 file:mr-3" accept="image/*">
        </div>
        <div class="flex flex-col gap-1">
            <label class="capitalize" for="additionalImages">additional images</label>
            <input type="file" name="additionalImages[]" id="additionalImages" class="w-full file:border-none file:p-2 file:rounded file:bg-sky-100 file:text-sky-700 hover:file:bg-sky-200 file:mr-3" accept="image/*" multiple>
        </div>
        <button type="submit" class="px-2 py-1 bg-sky-500 hover:bg-sky-600 text-white rounded w-fit">Create</button>
    </form>
</div>
@endsection

@section('script')
@endsection
