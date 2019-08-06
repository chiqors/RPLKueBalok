@extends('entities.owner.layouts.panel')

@section('hstyles')
    <link rel="stylesheet" href="{{ asset('cpanel/vendor/bootstrap-datetimepicker/tempusdominus-bootstrap-4.min.css') }}" />
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ @$info ? 'Ubah' : 'Tambah' }} Pengguna <small></small></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ site_url('owner/pengguna') }}">Pengguna</a></li>
                    <li class="breadcrumb-item active">{{ @$info ? 'Ubah' : 'Tambah' }} Pengguna</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <form role="form" action="{{ @$info ? site_url('owner/pengguna/update/'.@$info->NIP) : site_url('owner/pengguna/store') }}" enctype="multipart/form-data" method="POST">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-{{ @$info ? 'warning' : 'primary' }}">
                        <div class="card-header">
                            <h3 class="card-title">Pengguna</h3>
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
										<label for="NIP">NIP</label>
										<input type="text" class="form-control" name="NIP" value="{{ @$info->NIP }}" {{ (@$info->NIP) ? '' : 'readonly' }}>
									</div>
									<div class="form-group">
										<label for="Username">Username</label>
										<input type="text" class="form-control" name="Username" value="{{ @$info->Username }}">
									</div>
									<div class="form-group">
										<label for="Password">Password</label>
										<input type="password" class="form-control" name="Password" value="">
									</div>
									<div class="form-group">
										<label for="NamaLengkap">Nama Lengkap</label>
										<input type="text" class="form-control" name="NamaLengkap" value="{{ @$info->NamaLengkap }}">
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="Jabatan">Jabatan</label>
										<select class="form-control" name="Jabatan">
											<option value="Owner" {{ (@$info->Jabatan=="Owner") ? 'selected' : '' }}>Owner</option>
											<option value="Pelayan" {{ (@$info->Jabatan=="Pelayan") ? 'selected' : '' }}>Pelayan</option>
											<option value="Kasir" {{ (@$info->Jabatan=="Kasir") ? 'selected' : '' }}>Kasir</option>
											<option value="Customer Servis" {{ (@$info->Jabatan=="Customer Servis") ? 'selected' : '' }}>Customer Servis</option>
											<option value="Koki" {{ (@$info->Jabatan=="Koki") ? 'selected' : '' }}>Koki</option>
											<option value="Pantry" {{ (@$info->Jabatan=="Pantry") ? 'selected' : '' }}>Pantry</option>
										</select>
									</div>
									<div class="form-group">
										<label for="NoTelp">Nomor Telepon</label>
										<input type="text" class="form-control" name="NoTelp" value="{{ @$info->NoTelp }}">
									</div>
								</div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-{{ @$info ? 'warning' : 'primary' }}">Submit</button>
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
            $('#tanggalpengisian').datetimepicker({
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
