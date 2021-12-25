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
        <h2 class="text-2xl font-semibold">Edit Product</h2>
        {{-- <a href="#" class="material-icons-round text-sky-500 hover:text-sky-600">add</a> --}}
    </div>
    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" class="flex flex-col gap-3" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="flex flex-col gap-1">
            <label for="name" class="capitalize">name*</label>
            <input required class="w-full border rounded focus:outline-none p-2 focus:border-sky-400" type="text" name="name"
                value="{{ old('name') ?? $product->name }}">
        </div>
        <div class="flex flex-col gap-1">
            <label for="description" class="capitalize">description*</label>
            <textarea required class="w-full border rounded focus:outline-none p-2 focus:border-sky-400" name="description"
                rows="10">{{ old('description') ?? $product->description }}</textarea>
        </div>
        <div class="flex flex-col gap-1">
            <label for="quantity" class="capitalize">quantity*</label>
            <input required class="w-full border rounded focus:outline-none p-2 focus:border-sky-400" type="number" name="quantity"
                value="{{ old('quantity') ?? $product->quantity }}">
        </div>
        <div class="flex flex-col gap-1">
            <label for="price" class="capitalize">price*</label>
            <input required class="w-full border rounded focus:outline-none p-2 focus:border-sky-400" type="number" name="price"
                value="{{ old('price') ?? $product->price }}">
        </div>
        <div class="flex flex-col gap-1">
            <label for="discount" class="capitalize">discount (%)*</label>
            <input required class="w-full border rounded focus:outline-none p-2 focus:border-sky-400" type="number" name="discount"
                value="{{ old('discount') ?? $product->discount }}">
        </div>
        <div class="flex flex-col gap-1">
            <label for="category" class="capitalize">category*</label>
            <select required class="w-full border rounded focus:outline-none p-2 focus:border-sky-400 capitalize" name="category_id">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{
                    $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex flex-col gap-1">
            <label class="capitalize" for="cover">cover</label>
            <input type="file" name="cover" id="cover" class="w-full file:border-none file:p-2 file:rounded file:bg-sky-100 file:text-sky-700 hover:file:bg-sky-200 file:mr-3" accept="image/*">
        </div>
        <button type="submit" class="px-2 py-1 bg-sky-500 hover:bg-sky-600 text-white rounded w-fit">Save</button>
    </form>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
</div>
@endsection

@section('script')

@endsection
