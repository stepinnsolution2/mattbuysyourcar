<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Admin Panel - mattbuysyourcar</title>
		<!-- Favicons -->
		<link href="images/favicon.png" rel="icon">
		<!-- Google Font: Source Sans Pro -->
		<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
		<!-- Font Awesome -->
		<link rel="stylesheet" href="{{ asset('admin-assets/plugins/fontawesome-free/css/all.min.css') }}">
		<!-- Theme style -->
		<link rel="stylesheet" href="{{ asset('admin-assets/css/adminlte.min.css') }}">
		<link rel="stylesheet" href="{{ asset('admin-assets/plugins/dropzone/min/dropzone.min.css') }}">
		<link rel="stylesheet" href="{{ asset('admin-assets/plugins/select2/css/select2.min.css') }}">
		<!-- Include SweetAlert2 CSS -->
		<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css"> -->
		<link rel="stylesheet" href="{{ asset('admin-assets/plugins/sweetalert2/sweetalert2.min.css') }}">

		<link rel="stylesheet" href="{{ asset('admin-assets/css/custom.css') }}">
        <link rel="stylesheet" href="{{ asset('admin-assets/plugins/summernote/summernote-bs4.min.css') }}">

		<!-- datatables css-->
		<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">

		<meta name="csrf-token" content="{{ csrf_token() }}">
		<style>
			.main-sidebar{
				background: #1f701f !important;
			}

			.scroller{
				overflow: auto !important;
				max-height: 100vh;

			}

		</style>
	</head>
	<body class="hold-transition sidebar-mini">
		<!-- Site wrapper -->
		<div class="wrapper">
			<!-- Navbar -->
			<nav class="main-header navbar navbar-expand navbar-white navbar-light">
				<!-- Right navbar links -->
				<ul class="navbar-nav">
					<li class="nav-item">
					  	<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
					</li>
				</ul>
				<div class="navbar-nav pl-2">
					<!-- <ol class="breadcrumb p-0 m-0 bg-white">
						<li class="breadcrumb-item active">Dashboard</li>
					</ol> -->
				</div>

				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" data-widget="fullscreen" href="#" role="button">
							<i class="fas fa-expand-arrows-alt"></i>
						</a>
					</li>
					<li class="nav-item dropdown">
    <a class="nav-link p-0 pr-3" data-toggle="dropdown" href="#">
        <img src="{{ asset('images/logo.png') }}" class="" width="45" alt="">
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-3">
        <h4 class="h4 mb-0"><strong>{{ Auth::user()->name }}</strong></h4>
        <div class="mb-3">{{ Auth::user()->email }}</div>
        <div class="dropdown-divider"></div>
        <a href="{{ route('password-reset') }}" class="dropdown-item">
            <i class="fas fa-lock mr-2"></i> Change Password
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt mr-2"></i> Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</li>

				</ul>
			</nav>
			<!-- /.navbar -->
			<!-- Main Sidebar Container -->
		@include('admin.layouts.slidebar')
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
	         @yield('content')
			</div>
			<!-- /.content-wrapper -->
			<footer class="main-footer">

				<strong>Powered By <a href="https://stepinnsolution.com/">StepinnSolution</a> Copyright &copy; <?php echo date('Y'); ?> mattbuysyourcars - All rights reserved.
			</footer>

		</div>
		<!-- ./wrapper -->
		<!-- jQuery -->
		<script src="{{ asset('admin-assets/plugins/jquery/jquery.min.js') }}"></script>
		<!-- Include SweetAlert2 JS -->
		<script src="{{ asset('admin-assets/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
		<!-- Bootstrap 4 -->
		<script src="{{ asset('admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
		<!-- AdminLTE App -->
		<script src="{{ asset('admin-assets/js/adminlte.min.js') }}"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="{{ asset('admin-assets/plugins/summernote/summernote-bs4.min.js') }} "></script>
		<script src="{{ asset('admin-assets/plugins/dropzone/min/dropzone.min.js') }}"></script>

		<script src="{{ asset('admin-assets/js/demo.js') }}"></script>
		<script src="{{ asset('admin-assets/plugins/select2/js/select2.min.js') }}"></script>
		<!-- datatable js -->
		<script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>

		<script>
			$(document).ready(function() {
                $('#table').DataTable({
                    fixedHeader: true, // Fix the table header
                    scrollX: true, // Enable horizontal scrolling
                    autoWidth: false,  // Disable DataTables automatic column width calculation
                    columnDefs: [
                        { "width": "10%", "targets": "_all" }  // Set a fixed width for all columns
                    ],
                    order: []  // Optionally disable initial sorting
                });
            });
		</script>
		<script type="text/javascript">
              $.ajaxSetup({
				headers:{
					'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
				}
			  })
			  $(document).ready(function(){
				$('.summernote').summernote({
                    height: '300px'
                });
			  });


		</script>
        @yield('customjs')
	</body>
</html>
