@extends('layouts.adminlte')

@section('title', 'Admin')

@section('head')
@endsection

@section('content')
    <div class="content py-3">
        <div class="container-fluid">
            @if (session('status'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{-- <h5><i class="icon fas fa-check"></i> Alert!</h5> --}}
                    {{ session('status') }}
                </div>
            @endif
            <div class="flex gap-2 items-center">
                <h2 class="text-2xl font-semibold">Create Product</h2>
                {{-- <a href="{{ route('admin.products.create') }}"
                class="material-icons-round text-sky-500 hover:text-sky-600">add</a> --}}
            </div>
            <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data"
                class="flex flex-col gap-3">
                @csrf
                <div class="form-group">
                    <label class="text-capitalize" for="name">name *</label>
                    <input required class="form-control" type="text" name="name" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label class="text-capitalize" for="description">description *</label>
                    <textarea required class="form-control" name="description"
                        rows="10">{{ old('description') }}</textarea>
                </div>
                <div class="flex flex-col md:flex-row gap-2">
                    <div class="form-group grow">
                        <label class="text-capitalize" for="quantity">quantity *</label>
                        <input required class="form-control" type="number" name="quantity"
                            value="{{ old('quantity') }}">
                    </div>
                    <div class="form-group grow">
                        <label class="text-capitalize" for="price">price *</label>
                        <input required class="form-control" type="number" name="price" value="{{ old('price') }}">
                    </div>
                    <div class="form-group grow">
                        <label class="text-capitalize" for="discount">discount (%) *</label>
                        <input required class="form-control" type="number" name="discount"
                            value="{{ old('discount') }}">
                    </div>
                    <div class="form-group grow">
                        <label class="text-capitalize" for="category">category *</label>
                        <select required class="form-control capitalize" name="category_id">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row gap-2">
                    <div class="form-group">
                        <label class="text-capitalize" for="cover">cover *</label>
                        <input required type="file" name="cover" id="cover" class="w-100" accept="image/*">
                    </div>
                    <div class="form-group">
                        <label class="text-capitalize" for="additionalImages">additional images</label>
                        <input type="file" name="additionalImages[]" id="additionalImages" class="w-100"
                            accept="image/*" multiple>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Create</button>
            </form>
        </div>
    </div>
@endsection

@section('script')
@endsection
