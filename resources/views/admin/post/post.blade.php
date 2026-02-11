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
                            <form role="form" action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="post_title">Title</label>
                                            <input type="text" class="form-control" name="post_title" id="post_title" placeholder="Title">
                                        </div>

                                        <div class="form-group">
                                            <label for="subtitle">Subtitle</label>
                                            <input type="text" class="form-control" name="subtitle" id="subtitle" placeholder="subtitle">
                                        </div>

                                        <div class="form-group">
                                            <label for="slug">Slug</label>
                                            <input type="text" class="form-control" name="slug" id="slug" placeholder="slug">
                                        </div>

                                    </div>
                                    <div class="col-lg-12 justify-content-end">
                                        <div class="form-group">
                                            <label for="exampleInputFile">File input</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="image" class="custom-file-input" id="image">
                                                    <label class="custom-file-label" for="image">Choose file</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="image">Upload</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Select Tags</label>
                                            <select class="form1 select2 select2-hidden-accessible" multiple="true" data-placeholder="Select a State" style="width: 100%;" data-select1-id="7" tabindex="-1" aria-hidden="true" name="tags[]">
                                               @foreach($tags as $tag)
                                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Category Tags</label>
                                            <select class="form2 select2 select2-hidden-accessible" multiple="true" data-placeholder="Select a State" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true" name="categories[]">
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <div class="icheck-primary d-inline ml-2">
                                                <input type="checkbox" value="" name="status" id="status">
                                                <label for="status">Active</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                {{--<!-- Content Header (Page header) -->--}}
                                {{--<section class="content-header">--}}
                                    {{--<div class="container-fluid">--}}
                                        {{--<div class="row mb-2">--}}
                                            {{--<div class="col-sm-6">--}}
                                                {{--<h1>Text Editors</h1>--}}
                                            {{--</div>--}}
                                            {{--<div class="col-sm-6">--}}
                                                {{--<ol class="breadcrumb float-sm-right">--}}
                                                    {{--<li class="breadcrumb-item"><a href="#">Home</a></li>--}}
                                                    {{--<li class="breadcrumb-item active">Text Editors</li>--}}
                                                {{--</ol>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div><!-- /.container-fluid -->--}}
                                {{--</section>--}}

                                <!-- Main content -->
                                <section class="content">
                                    <div class="row justify-content-center">
                                        <div class="col-md-11">
                                            <div class="card card-outline card-info">
                                                <div class="card-header">
                                                    <h3 class="card-title">
                                                        Body
                                                        {{--<small>Simple and fast</small>--}}
                                                    </h3>
                                                    <!-- tools box -->
                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                                                                title="Collapse">
                                                            <i class="fas fa-minus"></i></button>
                                                        {{--<button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"--}}
                                                        {{--title="Remove">--}}
                                                        {{--<i class="fas fa-times"></i></button>--}}
                                                    </div>
                                                    <!-- /. tools -->
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body pad">
                                                    <div class="mb-3">
                <textarea class="textarea" placeholder="Place some text here" id="editor" name="body"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                                    </div>
                                                    {{--<p class="text-sm mb-0">--}}
                                                        {{--Editor <a href="https://github.com/bootstrap-wysiwyg/bootstrap3-wysiwyg">Documentation and license--}}
                                                            {{--information.</a>--}}
                                                    {{--</p>--}}
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.col-->
                                    </div>
                                    <!-- ./row -->
                                </section>
                                <!-- /.content -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{ route('post.index') }}" class="btn btn-danger">Back</a>
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
        if ($('.form1').length > 0) {
            $('.form1').select2();
        };

        if ($('.form2').length > 0) {
            $('.form2').select2();
        };
    </script>
@endsection