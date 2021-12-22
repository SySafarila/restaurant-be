@extends('layouts.admin')

@section('title', 'Admin')

@section('head')

@endsection

@section('content')
<div class="p-5">
    <div class="mb-5 flex items-center gap-2">
        <h2 class="text-2xl font-semibold">Edit Product</h2>
        {{-- <a href="#" class="material-icons-round text-sky-500 hover:text-sky-600">add</a> --}}
    </div>
    <form action="{{ route('admin.products.update', $product->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div>
            <label for="name">name</label>
            <input required class="w-full border rounded focus:outline-none p-2" type="text" name="name" value="{{ $product->name }}">
        </div>
        <div>
            <label for="description">description</label>
            <textarea required class="w-full border rounded focus:outline-none p-2" name="description" rows="10">{{ $product->description }}</textarea>
        </div>
        <div>
            <label for="quantity">quantity</label>
            <input required class="w-full border rounded focus:outline-none p-2" type="number" name="quantity" value="{{ $product->quantity }}">
        </div>
        <div>
            <label for="price">price</label>
            <input required class="w-full border rounded focus:outline-none p-2" type="number" name="price" value="{{ $product->price }}">
        </div>
        <div>
            <label for="discount">discount</label>
            <input class="w-full border rounded focus:outline-none p-2" type="number" name="discount" value="{{ $product->discount }}">
        </div>
        <div>
            <label for="category">category</label>
            <select required class="w-full border rounded focus:outline-none p-2" name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="px-2 py-1 bg-sky-500 hover:bg-sky-600 text-white rounded">Save</button>
    </form>
</div>
@endsection

@section('script')

@endsection
