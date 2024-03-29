@extends('admin.layouts.app')

@section('main-content')

    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Post Tag</h1>
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
                            <form role="form" action="{{ route('tag.update',$tag->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}
                                <div class="card-body">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="name">Category Title</label>
                                            <input type="text" class="form-control" name="name" id="name" placeholder="category Title" value="{{ $tag->name }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="slug">Category Slug</label>
                                            <input type="text" class="form-control" name="slug" id="slug" placeholder="slug"  value="{{ $tag->slug }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{ route('tag.index') }}" class="btn btn-danger">Back</a>
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