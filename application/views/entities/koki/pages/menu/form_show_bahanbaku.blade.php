@extends('entities.koki.layouts.panel')

@section('hstyles')
	<!-- DataTables -->
	<link rel="stylesheet" href="{{ asset('cpanel/vendor/datatables/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('cpanel/vendor/bootstrap-datetimepicker/tempusdominus-bootstrap-4.min.css') }}" />
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ @$info ? 'Ubah' : 'Tambah' }} Bahan Baku <small></small></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ site_url('koki/menu') }}">Menu</a></li>
                    <li class="breadcrumb-item active">{{ @$info ? 'Ubah' : 'Tambah' }} Menu Bahan Baku</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
		<div class="row">
			<!-- left column -->
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-6">
						<form role="form" action="{{ site_url('koki/menu/show/'.$info_id_menu.'/store') }}" enctype="multipart/form-data" method="POST">
							<!-- general form elements -->
							<div class="card card-primary">
								<div class="card-header">
									<h3 class="card-title">Bahan Baku</h3>
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
										<div class="col-lg-12">
											<div class="form-group">
												<label for="IdMenu">Menu</label>
												<input type="text" class="form-control" value="{{ $info_id_menu }}" name="IdMenu" readonly>
											</div>
											<div class="form-group">
												<label for="IdBahanBaku">Bahan Baku</label>
												<select class="form-control" name="IdBahanBaku">
													@if(@$info_bahanbaku)
													@foreach ($info_bahanbaku as $info_data)
													<option value="{{ @$info_data->IdBahanBaku }}">Nama: {{ @$info_data->Nama }}</option>
													@endforeach
													@else
													<option value="">-- BAHAN BAKU TIDAK TERSEDIA --</option>
													@endif
												</select>
											</div>
											<div class="form-group">
												<label for="Jumlah">Jumlah</label>
												<input type="text" class="form-control" name="Jumlah">
											</div>
										</div>
									</div>
								</div>
								<div class="card-footer">
									<button type="submit" class="btn btn-warning" name="submitForm" value="loop">Tambah</button> | 
									<button type="submit" class="btn btn-primary" name="submitForm">Lanjut</button>
								</div>
							</div>
							<!-- /.card -->
						</form>
					</div>
					<div class="col-md-6">
						<div class="card card-info">
							<div class="card-header">
								<h3 class="card-title">Tabel Menu Bahan Baku</h3>
								<div class="card-tools">
									<button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip"
										title="Collapse">
										<i class="fa fa-minus"></i></button>
									<button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip"
										title="Remove">
										<i class="fa fa-times"></i></button>
								</div>
							</div>
							<!-- /.card-header -->
							<div class="card-body">
								<div class="row">
									<table id="table-data" class="table table-bordered table-striped text-center table-responsive-sm">
										<thead>
											<tr>
												<th>Nama Bahan Baku</th>
												<th>Jumlah</th>
											</tr>
										</thead>
										<tbody>
											@if(@$info_menu_bahanbaku)
											@foreach($info_menu_bahanbaku as $info_data)
											<tr>
												<td>{{ $info_data->Nama }}</td>
												<td>{{ $info_data->Jumlah }}</td>
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
				</div>
			</div>
			<!-- /.col -->
        </div>
    </div>
</section>
<!-- /.content -->
@endsection

@section('fscripts')
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker1').datetimepicker({
                format : 'YYYY-MM-DD hh:mm:ss',
                ignoreReadonly: true
            });
        });
    </script>
    <script type="text/javascript" src="{{ asset('cpanel/vendor/bootstrap-datetimepicker/moment.js') }}"></script>
    <script type="text/javascript" src="{{ asset('cpanel/vendor/bootstrap-datetimepicker/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- CK Editor -->
    <script type="text/javascript" src="{{ asset('cpanel/vendor/ckeditor/ckeditor.js') }}"></script>
    <script>
        $(function () {
            ClassicEditor
            .create(document.querySelector('#body-editor'))
            .then(function (editor) {
                // The editor instance
            })
            .catch(function (error) {
                console.error(error)
            })
        })
	</script>
	<!-- DataTables -->
	<script src="{{ asset('cpanel/vendor/datatables/jquery.dataTables.js') }}"></script>
	<script src="{{ asset('cpanel/vendor/datatables/dataTables.bootstrap4.js') }}"></script>
	<!-- Page Script -->
	<script>
		$(document).ready(function () {
			var table = $('#table-data').DataTable({
				"bFilter": false,
				"lengthChange": false
			});
		});
	</script>
@endsection
