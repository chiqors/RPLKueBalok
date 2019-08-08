@extends('entities.customer_servis.layouts.panel')

@section('hstyles')
    <link rel="stylesheet" href="{{ asset('cpanel/vendor/bootstrap-datetimepicker/tempusdominus-bootstrap-4.min.css') }}" />
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ @$info ? 'Ubah' : 'Tambah' }} Kuisioner <small></small></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ site_url('customer_servis/kuisioner') }}">Kuisioner</a></li>
                    <li class="breadcrumb-item active">{{ @$info ? 'Ubah' : 'Tambah' }} Kuisioner</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <form role="form" action="{{ @$info ? site_url('customer_servis/kuisioner/update/'.@$info->IdKuisioner) : site_url('customer_servis/kuisioner/store') }}" enctype="multipart/form-data" method="POST">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-{{ @$info ? 'warning' : 'primary' }}">
                        <div class="card-header">
                            <h3 class="card-title">Kuisioner</h3>
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
                                        <select class="form-control" name="KodePesanan">
											@if(@$info_pembayaran)
											@foreach ($info_pembayaran as $info_data)
											<option value="{{ $info_data->KodePesanan }}">Pembayaran: {{ $info_data->KodePesanan }}</option>
											@endforeach
											@else
											<option value="">-- TIDAK ADA PEMBAYARAN KODE PESANAN --</option>
											@endif
										</select>
									</div>
									<div class="form-group">
										<label for="TanggalPengisian">Tanggal Pengisian</label>
										<div class="form-group">
											<div class="input-group date" id="tanggalpengisian" data-target-input="nearest">
												<input type="text" name="TanggalPengisian" placeholder="Tanggal Pengisian" class="form-control datetimepicker-input" data-target="#tanggalpengisian" readonly/>
												<div class="input-group-append" data-target="#tanggalpengisian" data-toggle="datetimepicker">
													<div class="input-group-text"><i class="fa fa-calendar"></i></div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="Jwb_kondisi">Jawaban Kondisi</label>
										<textarea class="form-control" name="Jwb_kondisi">{{ @$info->Jwb_kondisi }}</textarea>
									</div>
									<div class="form-group">
										<label for="Jwb_tempat">Jawaban Tempat</label>
										<textarea class="form-control" name="Jwb_tempat">{{ @$info->Jwb_tempat }}</textarea>
									</div>
									<div class="form-group">
										<label for="Jwb_menu">Jawaban Menu</label>
										<textarea class="form-control" name="Jwb_menu">{{ @$info->Jwb_menu }}</textarea>
									</div>
									<div class="form-group">
										<label for="Jwb_servis">Jawaban Servis</label>
										<textarea class="form-control" name="Jwb_servis">{{ @$info->Jwb_servis }}</textarea>
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
