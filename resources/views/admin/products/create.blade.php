@extends('layouts.adminlte')

@section('title', 'Admin')

@section('head')
@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            @if (session('status'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{-- <h5><i class="icon fas fa-check"></i> Alert!</h5> --}}
                    {{ session('status') }}
                </div>
            @endif
            <div class="row mb-2">
                <div class="align-items-center col-sm-6 d-flex">
                    <h1>Create Product</h1>
                    {{-- <a href="{{ route('admin.products.create') }}" class="material-icons-round">add</a> --}}
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Products</a></li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="content">
        <div class="container-fluid">
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
                        <select required class="form-control text-capitalize" name="category_id">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" class="text-capitalize">{{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="d-flex flex-column mb-3" style="gap: 1rem">
                    <div class="">
                        <label for="cover">Cover *</label>
                        <div class="custom-file">
                            <input type="file" name="cover" class="custom-file-input" id="exampleInputFile"
                                accept="image/*">
                            <label class="custom-file-label" for="exampleInputFile"></label>
                        </div>
                    </div>
                    {{-- <div class="form-group">
                        <label class="text-capitalize" for="additionalImages">additional images</label>
                        <input type="file" name="additionalImages[]" id="additionalImages" class="w-100"
                            accept="image/*" multiple>
                    </div> --}}
                    <div class="">
                        <label class="text-capitalize" for="additionalImages">additional images</label>
                        <div class="custom-file">
                            <input type="file" name="additionalImages[]" class="custom-file-input" id="additionalImages"
                                accept="image/*" multiple>
                            <label class="custom-file-label" for="exampleInputFile"></label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success mb-3">Create</button>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('adminLte/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
@endsection
