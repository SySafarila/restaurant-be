@extends('layouts.admin')

@section('title', 'Admin')

@section('head')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css">

@endsection

@section('content')
<div class="p-5 overflow-x-auto">
    @if (session('status'))
    <p class="bg-sky-200 text-sky-700 p-4 rounded-lg mb-5">{{ session('status') }}</p>
    @endif
    <div class="mb-5 flex items-center gap-2">
        <h2 class="text-2xl font-semibold">Products Manager</h2>
        <a href="{{ route('admin.products.create') }}" class="material-icons-round text-sky-500 hover:text-sky-600">add</a>
    </div>
    <table id="products" class="display" style="width:100%">
        <thead>
            <tr>
                <th></th>
                <th>Image</th>
                <th class="text-left">Name</th>
                <th class="text-left">Category</th>
                <th>Price (Rp)</th>
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
                <td class="capitalize">{{ $product->category->name }}</td>
                <td class="text-center">{{ number_format($product->price, 0, 0, ',') }}</td>
                <td class="text-center">{{ $product->quantity }}</td>
                <td class="text-center">{{ $product->discount }}%</td>
                <td>
                    <div class="grid grid-cols-2 justify-center gap-1">
                        <a href="{{ route('product.show', ['id' => $product->id, 'name' => $product->name]) }}"
                            class="bg-sky-500 hover:bg-sky-600 text-sm px-2 py-1 text-white rounded text-center">Show</a>
                        <a href="{{ route('admin.products.edit', $product->id) }}"
                            class="bg-green-500 hover:bg-green-600 text-sm px-2 py-1 text-white rounded text-center">Edit</a>
                        <a href="#"
                            class="bg-gray-300 hover:bg-gray-400 text-sm px-2 py-1 text-gray-500 hover:text-gray-700 rounded text-center">Photo's</a>
                        <form action="{{ route('admin.products.delete', $product->id) }}" method="POST" class="flex">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                            class="bg-rose-500 hover:bg-rose-600 text-sm px-2 py-1 text-white rounded text-center grow">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th></th>
                <th>Image</th>
                <th class="text-left">Name</th>
                <th class="text-left">Category</th>
                <th>Price (Rp)</th>
                <th>Quantity</th>
                <th>Discount</th>
                <th>Actions</th>
            </tr>
        </tfoot>
    </table>
    <div class="flex gap-2 items-center">
        <span>Bulk Action :</span>
        <a href="#" class="px-2 py-1 bg-rose-500 hover:bg-rose-600 text-white rounded" id="deleteSelected">Delete
            Selected</a>
    </div>
</div>
<form action="{{ route('admin.products.deleteSelected') }}" id="deleteSelectedForm" method="POST" class="hidden">
    @csrf
    @method('DELETE')
    <input type="text" name="ids" id="ids">
</form>
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
<script>
    const deleteSelected = document.querySelector('#deleteSelected');
    const deleteSelectedForm = document.querySelector('#deleteSelectedForm');
    const ids = document.querySelector('#deleteSelectedForm input#ids');
    deleteSelected.addEventListener('click', (e) => {
        e.preventDefault()
        let arr = [];
        let selectedRows = document.querySelectorAll('tr.selected');
        selectedRows.forEach(row => {
            arr.push(row.id);
        });
        if (arr.length == 0) {
            alert('0 Row selected');
        } else {
            alert(arr);
            ids.value = arr;
            deleteSelectedForm.submit();
        }
    })
</script>
@endsection
