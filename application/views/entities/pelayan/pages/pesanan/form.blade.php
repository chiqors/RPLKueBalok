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
                <h1>Tambah Pesanan <small></small></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ site_url('pelayan/pesanan') }}">Pesanan</a></li>
                    <li class="breadcrumb-item active">Tambah Pesanan</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <form role="form" action="{{ site_url('pelayan/pesanan/store') }}" enctype="multipart/form-data" method="POST">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
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
                                <div class="col-6">
									<div class="form-group">
										<label for="KodePesanan">Kode Pesanan</label>
                                        <input type="text" class="form-control" name="KodePesanan" placeholder="Kode Pesanan" value="{{ generate_kode() }}" readonly>
                                    </div>
                                    <div class="form-group">
										<label for="NIP">NIP</label>
                                        <input type="text" class="form-control" name="NIP" placeholder="NIP" value="{{ $this->session->nip }}" readonly>
                                    </div>
                                    <div class="form-group">
										<label for="TanggalPesanan">Tanggal Pesanan</label>
										<div class="form-group">
											<div class="input-group date" id="tanggalpesanan" data-target-input="nearest">
												<input type="text" name="TanggalPesanan" placeholder="Tanggal Pesanan" class="form-control datetimepicker-input" data-target="#tanggalpesanan" readonly/>
												<div class="input-group-append" data-target="#tanggalpesanan" data-toggle="datetimepicker">
													<div class="input-group-text"><i class="fa fa-calendar"></i></div>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="StatusPesanan">Status Pesanan</label>
                                        <input type="text" class="form-control" name="StatusPesanan" placeholder="Nama" value="Dipesan" readonly>
                                    </div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="NamaPelanggan">Nama Pelanggan</label>
                                        <input type="text" class="form-control" name="NamaPelanggan" placeholder="Nama Pelanggan" value="">
                                    </div>
                                    <div class="form-group">
										<label for="NoTelepon">Nomor Telepon</label>
                                        <input type="text" class="form-control" name="NoTelepon" placeholder="Nomor Telepon" value="">
									</div>
									<div class="form-group">
										<label for="Email">Email</label>
                                        <input type="text" class="form-control" name="Email" placeholder="Email" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </form>
    </div>
</section>
<!-- /.content -->
@endsection

@section('fscripts')
    <script type="text/javascript">
        $(function () {
            $('#tanggalpesanan').datetimepicker({
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
@endsection
