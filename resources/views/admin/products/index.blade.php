@extends('layouts.adminlte')

@section('title', 'Admin')

@section('head')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css">

{{-- Material Icons --}}
<link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp">
@endsection

@section('content')
<section class="content-header">
    <div class="container-fluid">
        @if (session('status'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ session('status') }}
        </div>
        @endif
        <div class="row mb-2">
            <div class="align-items-center col-sm-6 d-flex">
                <h1>Products</h1>
                <a href="{{ route('admin.products.create') }}" class="material-icons-round">add</a>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Products</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">DataTable with default features</h3>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 20px" class="text-center">#</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Disc</th>
                                    <th>Category</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr data-product-id="{{ $product->id }}">
                                    <td class="text-center">{{ $n++ }}</td>
                                    <td>
                                        <a
                                            href="{{ route('product.show', ['id' => $product->id, 'name' => $product->name]) }}">{{
                                            $product->name }}</a>
                                    </td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->discount }}</td>
                                    <td class="text-capitalize">{{ $product->category->name }}</td>
                                    <td class="align-items-start d-flex justify-content-center" style="gap: 1rem">
                                        <a href="{{ route('admin.products.edit', $product->id) }}"
                                            class="material-icons-round text-secondary">edit</a>
                                        <a href="{{ route('admin.products.photosManager', $product->id) }}"
                                            class="material-icons-round text-secondary">image</a>
                                        <span class="material-icons-round text-danger" style="cursor: pointer"
                                            onclick="event.preventDefault();document.getElementById('delete-{{ $product->id }}').submit()">delete</span>
                                        <form action="{{ route('admin.products.delete', $product->id) }}" method="POST"
                                            class="d-none" id="{{ 'delete-' . $product->id  }}">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<form action="{{ route('admin.products.deleteSelected') }}" id="deleteSelectedForm" method="POST" class="d-none">
    @csrf
    @method('DELETE')
    <input type="text" name="ids" id="ids">
</form>
@endsection

@section('script')
{{-- DataTables  & Plugins --}}
<script src="{{ asset('adminLte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('adminLte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
<script>
    $(function () {
      $("#example1").DataTable({
        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis", {
                text: 'Delete Selected',
                className: 'btn-danger',
                action: function ( e, dt, node, config ) {
                    checkSelectedRows()
                }
            }],
        select: {
            style: 'multi'
        }
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    //   $('#example2').DataTable({
    //     "paging": true,
    //     "lengthChange": false,
    //     "searching": false,
    //     "ordering": true,
    //     "info": true,
    //     "autoWidth": false,
    //     "responsive": true,
    //   });
    });
</script>
<script>
    const checkSelectedRows = () => {
        const deleteSelectedForm = document.querySelector('#deleteSelectedForm');
        const ids = document.querySelector('#deleteSelectedForm input#ids');
        let selectedRowsArr = []
        let selectedRows = document.querySelectorAll('tr.selected');

        selectedRows.forEach(row => {
            selectedRowsArr.push(row.dataset.productId);
        });
        // console.log(selectedRowsArr);
        if (selectedRowsArr.length == 0) {
            alert('0 Row selected');
        } else {
            alert(selectedRowsArr);
            ids.value = selectedRowsArr;
            deleteSelectedForm.submit();
        }
    }
</script>
@endsection
