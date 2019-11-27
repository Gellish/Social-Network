@extends('admin.layouts.app')

@section('headSection')
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2/css/select2.min.css') }}">
@endsection


@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <div class="row justify-content-center">
                    <div class="col-lg-11">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Post</h3>
                            </div>
                        @include('admin.inc.messages')
                        <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" action="{{ route('user.store') }}" method="post">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="name">User Name</label>
                                            <input type="text" class="form-control" id="username" name="username" placeholder="User Name" value="{{ old('name') }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" id="email" name="email" placeholder="email" value="{{ old('email') }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="phone">Cellphone</label>
                                            <input type="text" class="form-control" id="cellphone" name="cellphone" placeholder="cellphone" value="{{ old('cellphone') }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="password" value="{{ old('password') }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="password_confirmation">Confirm Passowrd</label>
                                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="confirm passowrd">
                                        </div>
                                        <div class="form-group">
                                            <label>Select Roles</label>
                                            <select class="form1 select2 select2-hidden-accessible" multiple="true" data-placeholder="Select the roles of user" style="width: 100%;" data-select1-id="7" tabindex="-1" aria-hidden="true" name="role[]">
                                                @foreach($roles as $role)
                                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <div class="icheck-primary d-inline ml-2">
                                                <input type="checkbox" value="1" name="status" id="status">
                                                <label for="status">Active</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <a href='{{ route('user.index') }}' class="btn btn-warning">Back</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('footerSection')
    <script src="{{ asset('assets/admin/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>

    <script>
        $(function () {

            $("input[data-bootstrap-switch]").each(function(){
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            });
        })
    </script>

    <script>

        $(function () {
            $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
        })
    </script>


    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });
        });
    </script>
    <script src="{{ asset('assets/admin/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        if ($('.form1').length > 0) {
            $('.form1').select2();
        };

        if ($('.form2').length > 0) {
            $('.form2').select2();
        };
    </script>

@endsection