@extends('layouts.admin')

@section('title', 'Admin')

@section('head')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css">

@endsection

@section('content')
<div class="p-5">
    <h2 class="text-2xl font-semibold">Products Manager</h2>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th></th>
                <th>Image</th>
                <th class="text-left">Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Discount</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr id="{{ $product->id }}">
                <td></td>
                <td>
                    <img src="{{ asset($product->coverPath . $product->cover) }}" alt="{{ $product->cover }}" class="w-[5rem] mx-auto">
                </td>
                <td>{{ $product->name }}</td>
                <td class="text-center">{{ $product->price }}</td>
                <td class="text-center">{{ $product->quantity }}</td>
                <td class="text-center">{{ $product->discount ?? 'NO' }}</td>
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
            </tr>
        </tfoot>
    </table>
</div>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable( {
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
