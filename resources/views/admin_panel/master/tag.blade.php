@extends('admin_panel.app')

@section('main-content')

<!-- Content Header (Page header) -->
<section class="content-header">

    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tags</a></li>
        <!-- <li class="active">Editors</li> -->
    </ol>
</section>
<br>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-header">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif

                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    <h3 class="box-title">{{ !empty($editTagDetails)? 'Edit':'Add' }} Tag
                        <!-- <small></small> -->
                    </h3>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form method="post" action="{{ url('admin/tag/add_update') }}" autocomplete="off">
                        {{ csrf_field() }}
                        <input type="hidden" name="TXTID" value="{{ !empty($editTagDetails)?$editTagDetails->id:'' }}">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tag Name</label>
                            <input type="text" class="form-control" name="tag_name" id="tag_name"
                                value="{{ !empty($editTagDetails)?$editTagDetails->name:'' }}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug</label>
                            <input type="text" class="form-control" name="slug" id="slug"
                                value="{{ !empty($editTagDetails)?$editTagDetails->slug:'' }}">
                        </div>
                        <div class="box-footer">
                            <button type="submit"
                                class="btn btn-primary">{{ !empty($editTagDetails)?'Update':'Submit' }}</button>
                            <!-- </div> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Tag List
                    <!-- <small></small> -->
                </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th width="12%" class="text-center">Sr. No.</th>
                            <th width="20%" class="text-center">Tag Name</th>
                            <th width="10%" class="text-center">Slug</th>
                            <th width="10%" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // dd($tagDetails);
                        if (!empty($tagDetails)) {

                            $i = ($tagDetails->currentPage() - 1) * $tagDetails->perPage() + 1;
                            // $i = '1';
                        ?>

                        @foreach($tagDetails as $value)
                        <tr>
                            <td class="text-center">{{$i++}}</td>

                            <td><?php echo !empty($value->name) ? ucfirst($value->name) : ''; ?></td>
                            <td><?php echo !empty($value->slug) ? ($value->slug) : ''; ?></td>
                            <td style="text-align: center;">
                                <!-- $page = ($empDetails->currentPage() - 1) * $empDetails->perPage() + 1; -->
                                <a href='{{url("admin/tag/$value->id")}}'><button type="button"
                                        class="btn btn-warning btn-xs" title="Edit"><i
                                            class="fa fa-pencil"></i></button></a>
                                <a href='{{url("admin/tag_del/$value->id")}}'
                                    onClick="return confirm('Are you sure you want to delete record?')"><button
                                        type="button" class="btn btn-danger btn-xs" title="Delete"><i
                                            class="fa fa-trash"></i></button></a>
                            </td>

                        </tr>
                        @endforeach
                        <?php } ?>

                    </tbody>
                </table>
                {{$tagDetails->links()}}
            </div>
        </div>
    </div>
    </div>
    <!-- ./row -->
</section>
<!-- /.content -->


@endsection