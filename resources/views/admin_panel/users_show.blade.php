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
            <h3 class="box-title">User List</h3>
            <div class="box-tools pull-right">
                <a class="btn btn-primary" href="{{url('admin/add_user')}}">Add User</a>
            </div>
        </div>
        <div class="box-body">
            <!-- Start creating your amazing application! -->
            <table id="example" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th width="12%" class="text-center">Sr. No.</th>
                        <th width="20%" class="text-center">Username</th>
                        <th width="20%" class="text-center">Email ID</th>
                        <th width="20%" class="text-center">Role</th>
                        <th width="10%" class="text-center">Status</th>
                        <th width="10%" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // dd($postDetails);
                    if (!empty($user_data)) {

                        $i = ($user_data->currentPage() - 1) * $user_data->perPage() + 1;
                        // $i = '1';
                    ?>

                    @foreach($user_data as $value)
                    <tr>
                        <td class="text-center">{{$i++}}</td>

                        <td><?php echo !empty($value->username) ? ucfirst($value->username) : ''; ?></td>
                        <td><?php echo !empty($value->email) ? ucfirst($value->email) : ''; ?></td>
                        <td><?php echo !empty($value->role) ? ($value->role) : ''; ?></td>
                        <td class="text-center">
                            <?php
                                $status1 = "";
                                if ($value->status == "1") {
                                    $status1 = "0";
                                    $class = "fa fa-toggle-on tgle-on danger";
                                    $style = "style=color:green";
                                    $title = "Inactive";
                                } else if ($value->status == "0") {
                                    $status1 = "1";
                                    $style = "style=color:red";
                                    $class = "fa fa-toggle-on fa-rotate-180 tgle-off";
                                    $title = "Active";
                                }
                                ?>
                            <a onClick="return confirm('Are you sure you want to change status of this employee ?')"
                                href='{{url("admin/user_status/$value->id/$status1")}}'> <i class="{{$class}}"
                                    {{$style}} aria-hidden="true" title="{{$title}}"></i></a>

                        </td>

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
            {{$user_data->links()}}
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