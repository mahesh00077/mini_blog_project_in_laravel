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
        <li><a href="#">Pdf</a></li>
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
            <h3 class="box-title">Pdf Making</h3>
            <div class="box-tools pull-right">
                <a class="btn btn-primary" href="{{ route('pdfview1',['download'=>'pdf']) }}">Download Pdf</a>
            </div>
        </div>
        <div class="box-body">
            <!-- Start creating your amazing application! -->
            <table id="example" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th width="12%" class="text-center">Sr. No.</th>
                        <th width="20%" class="text-center">name</th>
                        <th width="20%" class="text-center">age</th>
                        <th width="20%" class="text-center">city</th>
                        <th width="10%" class="text-center">salary</th>
                        <!-- <th width="10%" class="text-center">Action</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // dd($items);
                    if (!empty($items)) {

                        // $i = ($items->currentPage() - 1) * $items->perPage() + 1;
                        $i = '1';
                    ?>

                    @foreach($items as $value)
                    <tr>
                        <td class="text-center">{{$i++}}</td>

                        <td><?php echo !empty($value->name) ? ucfirst($value->name) : ''; ?></td>
                        <td><?php echo !empty($value->age) ? ucfirst($value->age) : ''; ?></td>
                        <td><?php echo !empty($value->city) ? ($value->city) : ''; ?></td>
                        <td><?php echo !empty($value->salary) ? ($value->salary) : ''; ?></td>




                    </tr>
                    @endforeach
                    <?php } ?>

                </tbody>
            </table>
            <!-- -->
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