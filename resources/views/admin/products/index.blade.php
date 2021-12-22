@extends('layouts.admin')

@section('title', 'Admin')

@section('head')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css">

@endsection

@section('content')
<div class="p-5 overflow-x-auto">
    <div class="mb-5 flex items-center gap-2">
        <h2 class="text-2xl font-semibold">Products Manager</h2>
        <a href="#" class="material-icons-round text-sky-500 hover:text-sky-600">add</a>
    </div>
    <table id="products" class="display" style="width:100%">
        <thead>
            <tr>
                <th></th>
                <th>Image</th>
                <th class="text-left">Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Discount</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr id="{{ $product->id }}">
                <td></td>
                <td>
                    <img src="{{ asset($product->coverPath . $product->cover) }}" alt="{{ $product->cover }}"
                        class="w-[5rem] mx-auto">
                </td>
                <td>{{ $product->name }}</td>
                <td class="text-center">{{ $product->price }}</td>
                <td class="text-center">{{ $product->quantity }}</td>
                <td class="text-center">{{ $product->discount ?? 'NO' }}</td>
                <td class="flex justify-center gap-2">
                    <a href="{{ route('product.show', ['id' => $product->id, 'name' => $product->name]) }}" class="bg-sky-500 hover:bg-sky-600 text-sm px-2 py-1 text-white rounded">Show</a>
                    <a href="{{ route('admin.products.edit', $product->id) }}" class="bg-green-500 hover:bg-green-600 text-sm px-2 py-1 text-white rounded">Edit</a>
                    <a href="#" class="bg-rose-500 hover:bg-rose-600 text-sm px-2 py-1 text-white rounded">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th></th>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Discount</th>
                <th>Actions</th>
            </tr>
        </tfoot>
    </table>
    <div class="flex gap-2 items-center">
        <span>Bulk Action :</span>
        <a href="#" class="px-2 py-1 bg-rose-500 hover:bg-rose-600 text-white rounded">Delete Selected</a>
    </div>
</div>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
<script>
    $(document).ready(function() {
        $('#products').DataTable( {
            columnDefs: [ {
                orderable: false,
                className: 'select-checkbox',
                targets:   0
            } ],
            select: {
                style:    'multi',
                selector: 'td:first-child'
            },
            order: [[ 1, 'asc' ]]
        } );
    } );
</script>
@endsection
