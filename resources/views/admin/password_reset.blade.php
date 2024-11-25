@extends('admin.layouts.app')
@section('content')
				<!-- Content Header (Page header) -->
				<section class="content-header">					
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Change Password</h1>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="container-fluid">
						@include('admin.message')
						<form method="POST" action="{{ route('changepassword') }}">
							@csrf
							<input type="hidden" name="id" value="{{ Auth::user()->id }}" required>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" class="form-control" name="password" id="password" placeholder="Enter new Password" required>
							</div>
							<div class="form-group">
								<label for="c_password">Confirm Password</label>
								<input type="password" class="form-control" name="confirm_password" id="c_password" placeholder="Enter Confirm Password" required>
							</div>
							<button type="submit" class="btn btn-primary">Change Password</button>
						</form>
					</div>
					<!-- /.card -->
				</section>
				<!-- /.content -->
@endsection