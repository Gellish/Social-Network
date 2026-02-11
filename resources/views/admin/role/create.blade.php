@extends('admin.layouts.app')

@section('headSection')
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2/css/select2.min.css') }}">
@endsection

@section('main-content')

    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Roles</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Tag</li>
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
                                <h3 class="card-title">Post</h3>
                            </div>
                        @include('admin.inc.messages')
                        <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" action="{{ route('role.store') }}" method="post">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="name">Role Title</label>
                                            <input type="text" class="form-control" name="name" id="name" placeholder="Role Title">
                                        </div>
                                        <div class="form-group">
                                            <label>Post Permissions</label>
                                            <select class="form1 select2 select2-hidden-accessible" multiple="true" data-placeholder="Select the roles of user" style="width: 100%;" data-select1-id="7" tabindex="-1" aria-hidden="true" name="role[]">
                                                @foreach($permissions as $permission)
                                                    @if ($permission->for == 'post')
                                                    <option name="permission[]" value="{{ $permission->id }}">{{ $permission->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">User Permissions</label>
                                            <select class="form1 select2 select2-hidden-accessible" multiple="true" data-placeholder="Select the roles of user" style="width: 100%;" data-select1-id="7" tabindex="-1" aria-hidden="true" name="role[]">
                                                @foreach($permissions as $permission)
                                                    @if ($permission->for == 'user')
                                                        <option name="permission[]" value="{{ $permission->id }}">{{ $permission->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Other Permissions</label>
                                            <select class="form1 select2 select2-hidden-accessible" multiple="true" data-placeholder="Select the roles of Other" style="width: 100%;" data-select1-id="7" tabindex="-1" aria-hidden="true" name="role[]">
                                                @foreach($permissions as $permission)
                                                    @if ($permission->for == 'other')
                                                        <option name="permission[]" value="{{ $permission->id }}">{{ $permission->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{ route('role.index') }}" class="btn btn-danger">Back</a>
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