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
                        <li class="breadcrumb-item"><a href="{{ route('admin.banners.index') }}">Banners</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="content">
        <div class="container-fluid">
            <form action="{{ route('admin.banners.update', $banner->id) }}" method="post" enctype="multipart/form-data"
                class="flex flex-col gap-3">
                @csrf
                @method('PATCH')
                <div class="d-flex flex-column mb-3" style="gap: 1rem">
                    <div class="">
                        <label for="image" class="text-capitalize">image</label>
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="exampleInputFile"
                                accept="image/*">
                            <label class="custom-file-label" for="exampleInputFile">{{ $banner->image }}</label>
                        </div>
                    </div>
                    <div class="">
                        <label for="description" class="text-capitalize">description *</label>
                        <textarea name="description" id="description" rows="10" class="form-control">{{ $banner->description }}</textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-success mb-3">Update</button>
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
