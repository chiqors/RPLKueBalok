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
                <h1>{{ @$info ? 'Ubah' : 'Tambah' }} Meja <small></small></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ site_url('pelayan/meja') }}">Meja</a></li>
                    <li class="breadcrumb-item active">{{ @$info ? 'Ubah' : 'Tambah' }} Meja</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <form role="form" action="{{ @$info ? site_url('pelayan/meja/update/'.@$info->IdMenu) : site_url('pelayan/meja/store') }}" enctype="multipart/form-data" method="POST">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-{{ @$info ? 'warning' : 'primary' }}">
                        <div class="card-header">
                            <h3 class="card-title">Meja</h3>
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
										<label for="Kapasitas">Kapasitas</label>
                                        <input type="text" class="form-control" name="Kapasitas" placeholder="Kapasitas" value="{{ @$info->Kapasitas }}">
									</div>
									<div class="form-group">
                                        <label for="TipeMeja">Tipe Meja</label>
                                        <select class="form-control" name="TipeMeja">
											<option value="2 Orang" {{ (@$info->TipeMeja=="2 Orang") ? 'selected' : '' }}>Pasangan (2 Orang)</option>
											<option value="4 Orang" {{ (@$info->TipeMeja=="4 Orang") ? 'selected' : '' }}>Keluarga (4 Orang)</option>
											<option value="5 Orang" {{ (@$info->TipeMeja=="5 Orang") ? 'selected' : '' }}>Keluarga (5 Orang)</option>
											<option value="6 Orang" {{ (@$info->TipeMeja=="6 Orang") ? 'selected' : '' }}>Keluarga (6 Orang)</option>
											<option value="8 Orang" {{ (@$info->TipeMeja=="8 Orang") ? 'selected' : '' }}>Keluarga Besar (8 Orang)</option>
										</select>
                                    </div>
                                    <div class="form-group">
                                        <label for="HargaLayananMeja">Harga Layanan Meja</label>
                                        <input type="text" class="form-control" name="HargaLayananMeja" placeholder="Harga Layanan Meja" value="{{ @$info->HargaLayananMeja }}">
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
@endsection
