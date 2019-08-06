@extends('entities.customer_servis.layouts.panel')

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
                <h1>Tampil Kuisioner</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ site_url('customer_servis/kuisioner') }}">Kuisioner</a></li>
                    <li class="breadcrumb-item active">Tampil Kuisioner</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-12">
			<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title"><b>Tampil Kuisioner</b></h3>
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
										<td>ID Kuisioner</td>
										<td>{{ $info->IdKuisioner }}</td>
									</tr>
									<tr>
										<td>Status Kuisioner</td>
										<td>{{ $info->StatusKuisioner }}</td>
									</tr>
									<tr>
										<td>Jawaban Kondisi</td>
										<td>{{ $info->Jwb_kondisi }}</td>
									</tr>
									<tr>
										<td>Jawaban Tempat</td>
										<td>{{ $info->Jwb_kondisi }}</td>
									</tr>
									<tr>
										<td>Jawaban Menu</td>
										<td>{{ $info->Jwb_menu }}</td>
									</tr>
									<tr>
										<td>Jawaban Servis</td>
										<td>{{ $info->Jwb_servis }}</td>
									</tr>
									<tr>
										<td>Tanggal Pengisian</td>
										<td>{{ $info->TanggalPengisian }}</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
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
