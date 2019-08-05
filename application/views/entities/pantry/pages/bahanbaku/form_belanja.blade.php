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
                <h1>Tambah Belanja Bahan Baku <small></small></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ site_url('pantry') }}">Beranda</a></li>
					<li class="breadcrumb-item"><a href="{{ site_url('pantry/bahanbaku') }}">Bahan Baku</a></li>
                    <li class="breadcrumb-item active">Tambah Belanja Bahan Baku</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <form role="form" action="{{ site_url('pantry/bahanbaku/belanja/'.$info_id_bahanbaku.'/store') }}" enctype="multipart/form-data" method="POST">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Belanja Bahan Baku</h3>
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
										<label for="nama">Bahan Baku</label>
										@if(!$info_id_bahanbaku)
										<select class="form-control" name="IdBahanBaku">
											@if(@$info_bahanbaku)
											@foreach ($info_bahanbaku as $info_data)
											<option value="{{ $info_data->IdBahanBaku }}">{{ $info_data->IdBahanBaku }} - {{ $info_data->Nama }}</option>
											@endforeach
											@endif
										</select>
										@else
										<input type="text" class="form-control" name="IdBahanBaku" placeholder="ID Bahan Baku" value="{{ @$info_id_bahanbaku }}" readonly>
										@endif
                                    </div>
                                    <div class="form-group">
										<label for="Kuantitas">Kuantitas</label>
                                        <input type="text" class="form-control" name="Kuantitas" placeholder="Kuantitas" value="{{ @$info->kuantitas }}">
                                    </div>
                                    <div class="form-group">
										<label for="TanggalKadaluarsa">Tangga Kadaluarsa</label>
										<div class="form-group">
											<div class="input-group date" id="tanggalkadaluarsa" data-target-input="nearest">
												<input type="text" name="TanggalKadaluarsa" placeholder="Tanggal Kadaluarsa" class="form-control datetimepicker-input" data-target="#tanggalkadaluarsa" readonly/>
												<div class="input-group-append" data-target="#tanggalkadaluarsa" data-toggle="datetimepicker">
													<div class="input-group-text"><i class="fa fa-calendar"></i></div>
												</div>
											</div>
										</div>
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
