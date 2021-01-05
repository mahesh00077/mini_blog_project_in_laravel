@extends('admin_panel.app')


@section('main-content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <!-- <h1>
        Users Page
        <small>it all starts here</small>
    </h1> -->
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Post List</a></li>
        <!-- <li class="active">Blank page</li> -->
    </ol>
</section>
<br><br>
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block pull-right" style="position: relative;z-index: inherit;">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block pull-right" style="position: relative;z-index: inherit;">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif
<br>
<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Post List</h3>
            <div class="box-tools pull-right">
                <a class="btn btn-primary" href="{{url('admin/add_post')}}">Add Post</a>
            </div>
        </div>
        <div class="box-body">
            <!-- Start creating your amazing application! -->
            <table id="example" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th width="12%" class="text-center">Sr. No.</th>
                        <th width="20%" class="text-center">Title</th>
                        <th width="20%" class="text-center">Subtitle</th>
                        <th width="20%" class="text-center">slug</th>
                        <th width="20%" class="text-center">Category</th>
                        <th width="10%" class="text-center">Publish Status</th>
                        <th width="10%" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // dd($postDetails);
                    if (!empty($postDetails)) {

                        $i = ($postDetails->currentPage() - 1) * $postDetails->perPage() + 1;
                        // $i = '1';
                    ?>

                    @foreach($postDetails as $value)
                    <tr>
                        <td class="text-center">{{$i++}}</td>

                        <td><?php echo !empty($value->title) ? ucfirst($value->title) : ''; ?></td>
                        <td><?php echo !empty($value->subtitle) ? ucfirst($value->subtitle) : ''; ?></td>
                        <td><?php echo !empty($value->slug) ? ($value->slug) : ''; ?></td>
                        <td><?php echo !empty($value->cat_name) ? ($value->cat_name) : ''; ?></td>
                        <td><?php echo $value->status ? '<b>Published</b>' : '<b>Not Published</b>'; ?></td>
                        <td style="text-align: center;">
                            <!-- $page = ($empDetails->currentPage() - 1) * $empDetails->perPage() + 1; -->
                            <a href='{{url("admin/add_post/$value->id")}}'><button type="button"
                                    class="btn btn-warning btn-xs" title="Edit"><i
                                        class="fa fa-pencil"></i></button></a>
                            <a href='{{url("admin/post_del/$value->id/$value->cp_id/$value->img_id/$value->image_path")}}'
                                onClick="return confirm('Are you sure you want to delete record?')"><button
                                    type="button" class="btn btn-danger btn-xs" title="Delete"><i
                                        class="fa fa-trash"></i></button></a>
                        </td>

                    </tr>
                    @endforeach
                    <?php } ?>

                </tbody>
            </table>
            {{$postDetails->links()}}
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <!-- Footer -->
        </div>
        <!-- /.box-footer-->
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->

@endsection