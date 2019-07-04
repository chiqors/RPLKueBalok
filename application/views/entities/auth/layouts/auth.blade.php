<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>{{ getenv('APP_NAME') }} | {{ $title }}</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{ asset('cpanel/vendor/font-awesome/css/font-awesome.min.css') }}">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{ asset('cpanel/css/adminlte.css') }}">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
	@yield('content')
	<!-- jQuery -->
    <script src="{{ asset('cpanel/vendor/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('cpanel/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
	<!-- iCheck -->
	<script src="{{ asset('cpanel/vendor/iCheck/icheck.min.js') }}"></script>
	<script>
	$(function () {
		$('input').iCheck({
			checkboxClass: 'icheckbox_square-blue',
			radioClass   : 'iradio_square-blue',
			increaseArea : '20%' // optional
		})
	})
	</script>
</body>
</html>
