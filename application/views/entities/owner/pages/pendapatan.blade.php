@extends('entities.owner.layouts.panel')

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
                <h1>Data Periodik Pendapatan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Data Periodik Pendapatan</li>
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
                    <h3 class="card-title">Periodik Pendapatan</h3>
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
							<form action="{{ site_url('owner/pendapatan') }}" method="get">
								<div class="row">
									<div class="col-3">
										<div class="form-group">
											<label for="Tampil">Tampilkan Pendapatan: </label>
										</div>
									</div>
									<div class="col-3">
										<select class="form-control form-control-sm" name="periodik">
											<option value="Minggu">Minggu Ini</option>
											<option value="Bulan">Bulan Ini</option>
										</select>
									</div>
									<div class="col-6">
										<div class="form-group">
											<button class="btn btn-primary btn-sm" type="submit">Submit</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
                    <div class="row">
                        <table class="table table-user-information">
							<tbody>
								<tr>
									<td>Tanggal</td>
									<td>{{ @$tanggal }}</td>
								</tr>
								<tr>
									<td>Jumlah Pembayaran</td>
									<td>{{ @$jumlah_pembayaran }}</td>
								</tr>
								<tr>
									<td>Jumlah Belanja Bahan Baku</td>
									<td>{{ @$jumlah_belanja_bahanbaku }}</td>
								</tr>
								<tr>
									<td>Sub Total Pembayaran</td>
									<td>{{ @$sub_total_pembayaran }}</td>
								</tr>
								<tr>
									<td>Total Pendapatan</td>
									<td>{{ @$total_pendapatan }}</td>
								</tr>
								<tr>
									<td>Status</td>
									<td>{{ @$status }}</td>
								</tr>
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
