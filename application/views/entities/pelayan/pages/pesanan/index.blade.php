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
                <h1>Data Pesanan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Data Pesanan</li>
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
                    <h3 class="card-title">Pesanan</h3>
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
										<a href="{{ site_url('pelayan/pesanan/create') }}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Tambah Pesanan</a>
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
                                    <th>NIP</th>
                                    <th>Tanggal Pesanan</th>
									<th>Status Pesanan</th>
									<th>Nama Pelanggan</th>
									<th>Nomor Telepon</th>
									<th>Email</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
								@foreach ($info as $info_data)	
                                <tr>
									<td>{{ $info_data->KodePesanan }}</td>
                                    <td>{{ $info_data->NIP }}</td>
                                    <td>{{ $info_data->TanggalPesanan }}</td>
									<td>{{ $info_data->StatusPesanan }}</td>
									<td>{{ $info_data->NamaPelanggan }}</td>
									<td>{{ $info_data->NoTelepon }}</td>
									<td>{{ $info_data->Email }}</td>
									<td>
										<a href="{{ site_url('pelayan/pesanan/show/'.$info_data->KodePesanan) }}" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Tampil</a>
                                    </td>
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
