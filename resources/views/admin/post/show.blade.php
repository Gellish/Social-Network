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
                            <a class="btn btn-success" href="{{ route('post.create') }}">Add New</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Title</th>
                                    <th>Subtitle</th>
                                    <th>Slug</th>
                                    <th>Created_at</th>
                                    <th>Update_at</th>
                                    <th>Publish Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->subtitle }}</td>
                                        <td>{{ $post->slug }}</td>
                                        <td>{{ $post->created_at }}</td>
                                        <td>{{ $post->updated_at }}</td>
                                        <td class="mt-auto">
                                             <input  type="checkbox" name="status" data-bootstrap-switch data-on-color="success"
                                                     @if($post->status == 1)
                                                      data-on-color="success"
                                                      checked
                                                     @else
                                                     data-off-color="danger"
                                                     @endif>
                                        </td>
                                        <td><a href="{{ route('post.edit',$post->id) }}"><i class="fas fa-edit"></i></a></td>
                                        <td>
                                            <form id="delete-form-{{$post->id }}" action="{{ route('post.destroy',$post->id) }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                            </form>
                                            <a href=""
                                               onclick="if(confirm('Are your sure, You Want to Delete this '))
                                               {
                                                   event.preventDefault();document.getElementById('delete-form-{{$post->id }}').submit();
                                               }
                                               else {
                                                       event.preventDefault();
                                               }">
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>No.</th>
                                    <th>Title</th>
                                    <th>Subtitle</th>
                                    <th>Slug</th>
                                    <th>Created_at</th>
                                    <th>Update_at</th>
                                    <th>Publish Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
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

@endsection