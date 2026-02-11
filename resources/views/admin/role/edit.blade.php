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
                        <h1>Post</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Post</li>
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
                            <form role="form" action="{{ route('role.update',$role->id) }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}
                                <div class="card-body">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="post_title">Roles</label>
                                            <input type="text" class="form-control" name="name" id="name" placeholder="name" value="{{ $role->name }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Post Permissions</label>
                                            <select class="form1 select2 select2-hidden-accessible" multiple="true" data-placeholder="Select the roles of user" style="width: 100%;" data-select1-id="7" tabindex="-1" aria-hidden="true" name="role[]">
                                                @foreach($permissions as $permission)
                                                    @if ($permission->for == 'post')
                                                        <option value="{{ $permission->id }}"

                                                        >
                                                            {{ $permission->name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">User Permissions</label>
                                            <select class="form1 select2 select2-hidden-accessible" multiple="true" data-placeholder="Select the roles of user" style="width: 100%;" data-select1-id="7" tabindex="-1" aria-hidden="true" name="role[]">
                                                @foreach($permissions as $permission)
                                                    @if ($permission->for == 'user')
                                                        <option value="{{ $permission->id }}"

                                                        >
                                                            {{ $permission->name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Other Permissions</label>
                                            <select class="form1 select2 select2-hidden-accessible" multiple="true" data-placeholder="Select the roles of Other" style="width: 100%;" data-select1-id="7" tabindex="-1" aria-hidden="true" name="role[]">
                                                @foreach($permissions as $permission)
                                                    @if ($permission->for == 'other')
                                                        <option value="{{ $permission->id }}"
                                                                {{--@foreach($role->$permission as $role_permission)--}}
                                                                {{--@if($role_permission->id == $permission)--}}
                                                                {{--selected--}}
                                                                {{--@endif--}}
                                                                {{--@endforeach--}}
                                                        >
                                                            {{ $permission->name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success">Update</button>
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

    <script src="{{ asset('assets/admin/ckeditor/ckeditor.js') }}"></script>
    <script>
        $(function () {
            CKEDITOR.replace('editor');
            $(".textarea").wysihtml5();
        });
    </script>

    <script src="{{ asset('assets/admin/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".select2").select2();
        });
    </script>
@endsection