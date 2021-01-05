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
        <li><a href="#">User List</a></li>
        <!-- <li class="active">Blank page</li> -->
    </ol>
</section>
<br><br>
<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-md-3">
            <div class="box box-primary">
                <div class="box-header with-border">
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
                    <h3 class="box-title">Import </h3>
                </div> <!-- /.box-header -->
                <div class="box-body">
                    <form method="post" action="{{ url('admin/excel/import') }}" enctype="multipart/form-data"
                        autocomplete="off">
                        {{ csrf_field() }}
                        <input type="file" name="file" class="form-control">
                        <br>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Import User Data</button>
                            <!-- </div> -->
                    </form>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <!-- Default box -->
        <div class="col-md-8">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Export List</h3>
                    <div class="box-tools pull-right">
                        <!-- <a class="btn btn-primary" href="{{url('admin/add_user')}}">Import Data</a> -->
                        <a class="btn btn-primary" href="{{url('admin/excel/exporting')}}">Export Data</a>
                    </div>
                </div>
                <div class="box-body">
                    <!-- Start creating your amazing application! -->
                    <table id="example" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="12%" class="text-center">Sr. No.</th>
                                <th width="20%" class="text-center">name</th>
                                <th width="20%" class="text-center">Age</th>
                                <th width="20%" class="text-center">City</th>
                                <th width="10%" class="text-center">Salary</th>
                                <th width="10%" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // dd($postDetails);
                            if (!empty($data)) {

                                $i = ($data->currentPage() - 1) * $data->perPage() + 1;
                                // $i = '1';
                            ?>

                            @foreach($data as $value)
                            <tr>
                                <td class="text-center">{{$i++}}</td>

                                <td><?php echo !empty($value->name) ? ucfirst($value->name) : ''; ?></td>
                                <td><?php echo !empty($value->age) ? ucfirst($value->age) : ''; ?></td>
                                <td><?php echo !empty($value->city) ? ($value->city) : ''; ?></td>
                                <td><?php echo !empty($value->salary) ? ($value->salary) : ''; ?></td>

                                <td style="text-align: center;">
                                    <!-- $page = ($empDetails->currentPage() - 1) * $empDetails->perPage() + 1; -->
                                    <a href='{{url("admin/add_user/$value->id")}}'><button type="button"
                                            class="btn btn-warning btn-xs" title="Edit"><i
                                                class="fa fa-pencil"></i></button></a>
                                    <a href='{{url("admin/user_del/$value->id")}}'
                                        onClick="return confirm('Are you sure you want to delete record?')"><button
                                            type="button" class="btn btn-danger btn-xs" title="Delete"><i
                                                class="fa fa-trash"></i></button></a>
                                </td>

                            </tr>
                            @endforeach
                            <?php } ?>


                        </tbody>
                    </table>
                    {{$data->links()}}
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <!-- Footer -->
                </div>
                <!-- /.box-footer-->
            </div>
        </div>
        <!-- /.box -->
    </div>
</section>
<!-- /.content -->

@endsection