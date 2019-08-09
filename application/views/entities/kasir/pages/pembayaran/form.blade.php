@extends('entities.kasir.layouts.panel')

@section('hstyles')
    <link rel="stylesheet" href="{{ asset('cpanel/vendor/bootstrap-datetimepicker/tempusdominus-bootstrap-4.min.css') }}" />
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah Pembayaran <small></small></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ site_url('kasir/pembayaran') }}">Kuisioner</a></li>
                    <li class="breadcrumb-item active">Tambah Pembayaran</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <form role="form" action="{{ site_url('kasir/pembayaran/store') }}" enctype="multipart/form-data" method="POST">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Pembayaran</h3>
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
                                        <select id="kodepesanan" class="form-control" name="KodePesanan">
											@if(@$info_pesanan)
											@foreach ($info_pesanan as $info_data)
											<option value="{{ $info_data->KodePesanan }}">{{ $info_data->KodePesanan }}</option>
											@endforeach
											@else
											<option value="">-- TIDAK ADA PESANAN --</option>
											@endif
										</select>
									</div>
									<div class="form-group">
										<label for="TanggalBayar">Tanggal Bayar</label>
										<div class="form-group">
											<div class="input-group date" id="tanggalbayar" data-target-input="nearest">
												<input type="text" name="TanggalBayar" placeholder="Tanggal Bayar" class="form-control datetimepicker-input" data-target="#tanggalbayar" readonly/>
												<div class="input-group-append" data-target="#tanggalbayar" data-toggle="datetimepicker">
													<div class="input-group-text"><i class="fa fa-calendar"></i></div>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="SubTotalBayar">Sub Total Bayar</label>
										<input id="subtotalbayar" type="text" class="form-control" name="SubTotalBayar" value="0">
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="Diskon">Diskon</label>
										<input id="diskon" type="text" class="form-control" name="Diskon" value="0">
									</div>
									<div class="form-group">
										<label for="TotalBayar">Total Bayar</label>
										<input id="totalbayar" type="text" class="form-control" name="TotalBayar" value="0" readonly>
									</div>
								</div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button id="btnSubmitForm" type="submit" class="btn btn-{{ @$info ? 'warning' : 'primary' }}">Submit</button>
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
            $('#tanggalbayar').datetimepicker({
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
	<script type="text/javascript">
		$(document).ready(function(){
			$('#kodepesanan').change(function() {
				var kodepesanan = $(this).val;
				var to_url = "{{ site_url('kasir/pembayaran/get_pesanan_subtotalbayar/"+kodepesanan+"') }}";
				$.ajax({
					url : to_url,
					method : "GET",
					data : {SubTotalBayar: SubTotalBayar},
					async : true,
					dataType : 'json',
					error: function() {
						alert('Something is wrong');
					},
					success: function(data) {
						$('#subtotalbayar').val(data.SubTotalBayar);
						$('#diskon').val('0');
						$('#totalbayar').val(data.SubTotalBayar);
					}
				});
				return false;
			});
		});
	</script>
	<script>
		$('#btnSubmitForm').hide();
		$('#diskon').on('input', function() {
			var input_subtotalbayar = $('#subtotalbayar').val();
			var input_diskon = $(this).val();
			var total_bayar_kurang = input_subtotalbayar * (input_diskon/100);
			var total_bayar = input_subtotalbayar - total_bayar_kurang;
			$('#totalbayar').val(total_bayar);
			$('#btnSubmitForm').slideDown("slow");
		});
	</script>
@endsection
