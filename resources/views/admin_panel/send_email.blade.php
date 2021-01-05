@extends('admin_panel.app')


@section('main-content')

<!-- Content Header (Page header) -->
<section class="content-header">

    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Sending Email</a></li>
        <!-- <li class="active">Blank page</li> -->
    </ol>
</section>
<br>
<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Sending Mail</h3>

        </div>
        <div class="box-body">
            <form method="post" action="{{url('admin/send/email-action')}}" enctype="multipart/form-data"
                autocomplete="off">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email id</label>
                    <input type="email" class="form-control" name="email" id="email">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Subject </label>
                    <input type="text" class="form-control" name="subject" id="name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Message </label>
                    <textarea name="message" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Attachment </label>
                    <input type="file" class="form-control" name="attachment[]" multiple id="attachment">
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <!-- </div> -->
            </form>
        </div>
        <!-- /.box-body -->
        <!-- /.box-footer-->
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->

@endsection