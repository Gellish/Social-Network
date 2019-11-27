@extends('admin.layouts.app')

@section('headSection')
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
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
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            @include('admin.inc.messages')
                            <br>
                            <a class="btn btn-success" href="{{ route('user.create') }}">Add New</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Username</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>More Info</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                    <th>Created_at</th>
                                    <th>Updated_at</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>

                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ str_limit($user->username,12) }}</td>
                                        <td>{{ str_limit($user->firstname,12) }}</td>
                                        <td>{{ str_limit($user->lastname,12)}}</td>
                                        <td>{{ str_limit($user->email,24)}}</td>
                                        <td>{{ str_limit($user->password, 8) }}</td>
                                        <td><a href=""><i class="fas fa-info"></i>More Info</a></td>
                                        <td><a href="{{ route('user.edit',$user->id) }}"><i class="fas fa-edit"></i></a></td>
                                        <td>
                                            <form id="delete-form-{{$user->id }}" action="{{ route('tag.destroy',$user->id) }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                            </form>
                                            <a href=""
                                               onclick="if(confirm('Are your sure, You Want to Delete this '))
                                                       {
                                                       event.preventDefault();document.getElementById('delete-form-{{$user->id }}').submit();
                                                       }
                                                       else {
                                                       event.preventDefault();
                                                       }">
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                        </td>
                                        <td>{{ str_limit($user->created_at,10) }}</td>
                                        <td>{{ str_limit($user->updated_at,10) }}</td>
                                    </tr>
                                @endforeach

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>No.</th>
                                    <th>Username</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>More Info</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                    <th>Created_at</th>
                                    <th>Updated_at</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('footerSection')
    <script src="{{ asset('assets/admin/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>

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

@endsection