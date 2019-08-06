@extends('entities.pelayan.layouts.panel')

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
                <h1>Tampil Pesanan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ site_url('pelayan/pesanan') }}">Pesanan</a></li>
                    <li class="breadcrumb-item active">Tampil Pesanan</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-6">
			<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title"><b>Tampil Pesanan</b></h3>
					<div class="card-tools">
						<button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
							<i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
							<i class="fa fa-times"></i></button>
					</div>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<table class="table table-user-information">
								<tbody>
									<tr>
										<td>Kode Pesanan</td>
										<td>{{ $info1->KodePesanan }}</td>
									</tr>
									<tr>
										<td>NIP</td>
										<td>{{ $info1->NIP }}</td>
									</tr>
									<tr>
										<td>Tanggal Pesanan</td>
										<td>{{ $info1->TanggalPesanan }}</td>
									</tr>
									<tr>
										<td>Status Pesanan</td>
										<td>{{ $info1->StatusPesanan }}</td>
									</tr>
									<tr>
										<td>Nama Pelanggan</td>
										<td>{{ $info1->NamaPelanggan }}</td>
									</tr>
									<tr>
										<td>Nomor Telepon</td>
										<td>{{ $info1->NoTelepon }}</td>
									</tr>
									<tr>
										<td>Email</td>
										<td>{{ $info1->Email }}</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-6">
			<div class="row">
				<div class="col-12">
					<div class="card card-secondary">
						<div class="card-header">
							<h3 class="card-title">Data Pesanan Meja</h3>
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
								<table id="table-data" class="table table-bordered table-striped text-center table-responsive-sm">
									<thead>
										<tr>
											<th>Nomor Meja</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($info2 as $info_data)	
										<tr>
											<td>{{ $info_data->NoMeja }}</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="card card-secondary">
						<div class="card-header">
							<h3 class="card-title">Data Pesanan Menu</h3>
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
								<table id="table-data" class="table table-bordered table-striped text-center table-responsive-sm">
									<thead>
										<tr>
											<th>ID Menu</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($info3 as $info_data)	
										<tr>
											<td>{{ $info_data->IdMenu }}</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
			</div>
        </div>
        <!-- /.col -->
	</div>
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
