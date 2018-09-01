<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">



  <!-- Bootstrap Core CSS -->
  <link href="{{ asset('css/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- MetisMenu CSS -->
  <link href="{{ asset('css/metisMenu/metisMenu.min.css')}}" rel="stylesheet">

  <!-- DataTables CSS -->
  <link href="{{ asset('css/datatables-plugins/dataTables.bootstrap.css') }}" rel="stylesheet">

  <!-- DataTables Responsive CSS -->
  <link href="{{ asset('css/datatables-responsive/dataTables.responsive.css') }}" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="{{ asset('css/css/sb-admin-2.css') }}" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="{{ asset('css/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

  <link rel="stylesheet" type="text/css" href="{{ asset('css/mycss.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert/sweetalert.css') }}">
  <!-- jQuery -->
  <script src="{{ asset('js/jquery/jquery.min.js') }}"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="{{ asset('js/bootstrap/js/bootstrap.min.js') }}"></script>

  <!-- Metis Menu Plugin JavaScript -->
  <script src="{{ asset('js/metisMenu/metisMenu.min.js') }}"></script>

  <!-- DataTables JavaScript -->
  <script src="{{ asset('js/datatables/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('js/datatables-plugins/dataTables.bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/datatables-responsive/dataTables.responsive.js') }}"></script>

  <!-- Custom Theme JavaScript -->
  <script src="{{ asset('js/sb-admin-2.js') }}"></script>

  <!-- Page-Level Demo Scripts - Tables - Use for reference -->
  
  <script type="text/javascript" src="{{ asset('js/sweetalert/sweetalert.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/jquery.form-validator.js') }}"></script>


</head>
<body>
  
  @include('layouts.nav')
  <div id="content">
    @yield('content')
  </div>

  <script src="{{ asset('js/sb-admin-2.js') }}"></script>

  

</body>
</html>