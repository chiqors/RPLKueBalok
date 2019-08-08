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
                <h1>Tampil Menu</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ site_url('pelayan/menu') }}">Menu</a></li>
                    <li class="breadcrumb-item active">Tampil Menu</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title"><b>Tampil Menu</b></h3>
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
										<td>ID Menu</td>
										<td>{{ $info1->IdMenu }}</td>
									</tr>
									<tr>
										<td>Jenis Menu</td>
										<td>{{ $info1->JenisMenu }}</td>
									</tr>
									<tr>
										<td>Nama</td>
										<td>{{ $info1->Nama }}</td>
									</tr>
									<tr>
										<td>Harga</td>
										<td>{{ $info1->Harga }}</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <div class="row">
        <div class="col-12">
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Data Bahan Baku</h3>
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
                                    <th>ID Bahan Baku</th>
                                    <th>Nama Bahan Baku</th>
                                    <th>Jenis Bahan Baku</th>
                                    <th>Kategori</th>
                                </tr>
                            </thead>
                            <tbody>
								@if(@$info2)
								@foreach ($info2 as $info_data)	
                                <tr>
                                    <td>{{ $info_data->IdBahanBaku }}</td>
                                    <td>{{ $info_data->Nama }}</td>
									<td>{{ $info_data->Jenis }}</td>
									<td>{{ $info_data->Kategori }}</td>
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
