@extends('admin_panel.app')

@section('main-content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Text Editors
        <small>Advanced form element</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Editors</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Tag Index
                        <small>Simple and fast</small>
                    </h3>
                    <!-- tools box -->
                    <!-- <div class="pull-right box-tools">
                        <button type="button" class="btn btn-default btn-sm" data-widget="collapse"
                            data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip"
                            title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div> -->
                    <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">
                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Post Title</label>
                            <input type="text" class="form-control" name="post_title" id="post_title">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Post Sub Title</label>
                            <input type="text" class="form-control" name="post_sub_title" id="post_sub_title">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug</label>
                            <input type="text" class="form-control" name="slug" id="slug">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Image Upload</label>
                            <input type="file" id="exampleInputFile" name="img_upload">

                            <!-- <p class="help-block">Example block-level help text here.</p> -->
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="status"> Publish ?
                            </label>
                        </div>

                        <textarea class="textarea" name="body" placeholder="Place some text here"
                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                        </textarea>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <!-- </div> -->
                    </form>
                </div>
            </div>
        </div>
        <!-- /.col-->
    </div>
    <!-- ./row -->
</section>
<!-- /.content -->


@endsection