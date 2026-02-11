@extends('admin.layouts.app')

@section('main-content')

	<div class="content-wrapper">

		<!-- Content Header (Page header) -->
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Permission</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Permission</li>
						</ol>
					</div>
				</div>
			</div><!-- /.container-fluid -->
		</section>

		<!-- Main content -->
		<section class="content">
			<div class="container-fluid">

				<div class="row justify-content-center">
					<div class="col-lg-11">
						<!-- general form elements -->
						<div class="card card-primary">
							<div class="card-header">
								<h3 class="card-title">Permission</h3>
							</div>
						@include('admin.inc.messages')
						<!-- /.card-header -->
							<!-- form start -->
							<form role="form" action="{{ route('permission.store') }}" method="post">
								{{ csrf_field() }}
								<div class="card-body">
									<div class="col-lg-offset-3 col-lg-12">
										<div class="form-group">
											<label for="name">Permission</label>
											<input type="text" class="form-control" id="name" name="name" placeholder="Permission">
										</div>

										<div class="form-group">
											<label for="for">Permission for</label>
											<select name="for" id="for" class="form-control">
												<option selected disable>Select Permission for</option>
												<option value="user">User</option>
												<option value="post">Post</option>
												<option value="other">Other</option>
											</select>
										</div>

										<div class="form-group">
											<button type="submit" class="btn btn-primary">Submit</button>
											<a href='{{ route('permission.index') }}' class="btn btn-warning">Back</a>
										</div>

									</div>

								</div>

							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- /.content-wrapper -->
	</div>
@endsection