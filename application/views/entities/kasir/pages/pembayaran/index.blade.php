@extends('entities.kasir.layouts.panel')

@section('hstyles')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('cpanel/vendor/datatables/dataTables.bootstrap4.css') }}">
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Pembayaran</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Data Pembayaran</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Pembayaran</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
					<div class="row">
						<div class="col-sm-12">
							<div class="row">
								<div class="col-sm-6">
									<div class="row">
										<a href="{{ site_url('kasir/pembayaran/create') }}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Tambah Pembayaran</a>
									</div>
								</div>
							</div>
						</div>
					</div>
                    <div class="row">
                        <table id="table-data" class="table table-bordered table-striped text-center table-responsive-sm">
                            <thead>
                                <tr>
									<th>Kode Pesanan</th>
									<th>Tanggal Pesanan</th>
									<th>Nama Pelanggan</th>
									<th>Status Pesanan</th>
									<th>Tanggal Bayar</th>
									<th>NIP (Kasir)</th>
                                </tr>
                            </thead>
                            <tbody>
								@if(@$info)
								@foreach ($info as $info_data)	
                                <tr>
									<td>{{ $info_data->KodePesanan }}</td>
                                    <td>{{ $info_data->TanggalPesanan }}</td>
                                    <td>{{ $info_data->NamaPelanggan }}</td>
                                    <td>{{ $info_data->StatusPesanan }}</td>
                                    <td>{{ $info_data->TanggalBayar }}</td>
                                    <td>{{ $info_data->NIP }}</td>
								</tr>
								@endforeach
								@endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
		<!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
@endsection

@section('fscripts')
<!-- DataTables -->
<script src="{{ asset('cpanel/vendor/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('cpanel/vendor/datatables/dataTables.bootstrap4.js') }}"></script>
<!-- Page Script -->
<script>
$(document).ready(function() {
    var table = $('#table-data').DataTable({
		"bFilter": false,
		"lengthChange": false
	});
});
</script>
@endsection
