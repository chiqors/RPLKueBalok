@extends('entities.pelayan.layouts.panel')

@section('hstyles')
    <link rel="stylesheet" href="{{ asset('cpanel/vendor/bootstrap-datetimepicker/tempusdominus-bootstrap-4.min.css') }}" />
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah Pesanan Meja <small></small></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ site_url('pelayan/pesanan') }}">Pesanan</a></li>
                    <li class="breadcrumb-item active">Tambah Pesanan Meja</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
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
				<form role="form" action="{{ site_url('pelayan/pesanan/menu/store') }}" enctype="multipart/form-data" method="POST">
					<div class="row">
						<div class="col-12">
							<div class="card card-warning">
								<div class="card-header">
									<h3 class="card-title">Tambah Detail Pesanan Menu</h3>
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
										<div class="col-12">
											<div class="form-group">
												<label for="IdMenu">Nama Menu</label>
												<select class="form-control" name="IdMenu">
													@if(@$info2)
													@foreach($info2 as $info_data)
													<option value="{{ $info_data->IdMenu }}">{{ $info_data->Nama }} - ({{ $info_data->JenisMenu }} | {{ $info_data->Harga }})</option>
													@endforeach
													@endif
												</select>
											</div>
											<div class="form-group">
												<label for="Kuantitas">Kuantitas</label>
												<input type="text" class="form-control" name="Kuantitas" placeholder="Kuantitas">
											</div>
										</div>
									</div>
								</div>
								<!-- /.card-body -->
								<div class="card-footer">
									<div class="row">
										<div class="col-6">
											<div class="row">
												<div class="col-12">
													<button type="submit" name="submitForm" value="loop" class="btn btn-warning">Tambah</button>
												</div>
											</div>
										</div>
										<div class="col-6">
											<div class="row float-right">
												<div class="col-12">
													<button type="submit" name="submitForm" class="btn btn-primary">Selesai</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- /.card -->
						</div>
					</form>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="card card-secondary">
							<div class="card-header">
								<h3 class="card-title">Detail Pesanan Menu yang akan dipesan</h3>
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
    </div>
</section>
<!-- /.content -->
@endsection

@section('fscripts')
    <script type="text/javascript">
        $(function () {
            $('#tanggalkadaluarsa').datetimepicker({
                format : 'YYYY-MM-DD',
				locale: 'id',
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
@endsection
