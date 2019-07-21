@extends('entities.pantry.layouts.panel')

@section('hstyles')
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
					<li class="breadcrumb-item"><a href="{{ site_url('pantry') }}">Beranda</a></li>
					<li class="breadcrumb-item"><a href="{{ site_url('pantry/bahanbaku') }}">Bahan Baku</a></li>
                    <li class="breadcrumb-item active">{{ @$info ? 'Ubah' : 'Tambah' }} Bahan Baku</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <form role="form" action="{{ @$info ? site_url('pantry/bahanbaku/update/1') : site_url('pantry/bahanbaku/store') }}" enctype="multipart/form-data" method="POST">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-{{ @$info ? 'warning' : 'primary' }}">
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
                                        <label for="nama">Nama Bahan Baku</label>
                                        <input type="text" class="form-control" name="nama" placeholder="Nama Bahan Baku" value="{{ @$info ? @$info->Nama : '' }}">
                                    </div>
                                    <div class="form-group">
										<label for="jenis">Jenis Bahan Baku</label>
                                        <input type="text" class="form-control" name="jenis" placeholder="Jenis Bahan Baku" value="{{ @$info->Jenis }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="kategori">Kategori Bahan Baku</label>
                                        <select class="form-control" name="kategori">
											<option value="Hewan" {{ (@$info->Kategori=='Hewan') ? 'selected' : '' }}>Hewan</option>
											<option value="Sayuran" {{ (@$info->Kategori=='Sayuran') ? 'selected' : '' }}>Sayuran</option>
											<option value="Bumbu" {{ (@$info->Kategori=='Bumbu') ? 'selected' : '' }}>Bumbu</option>
											<option value="Cairan" {{ (@$info->Kategori=='Cairan') ? 'selected' : '' }}>Cairan</option>
										</select>
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
