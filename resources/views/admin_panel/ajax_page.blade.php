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
        <li><a href="#">Ajax Page</a></li>
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
                <!-- <a class="btn btn-success" href="javascript:void(0)" id="createNewProduct"> Add New Emp</a> -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"
                    id="createNewProduct">
                    Add Employee
                </button>
            </div>
        </div>
        <div class="box-body">
            <!-- Start creating your amazing application! -->
            <table id="example" class="table table-bordered table-striped table-hover data-table">
                <thead>
                    <tr>
                        <th width="12%" class="text-center">Sr. No.</th>
                        <th width="20%" class="text-center">Name</th>
                        <th width="20%" class="text-center">Age</th>
                        <th width="20%" class="text-center">City</th>
                        <th width="10%" class="text-center">Salary</th>
                        <th width="10%" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
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
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <form id="productForm" name="productForm" class="form-horizontal">
                <div class="modal-body">
                    <!-- <p>One fine body&hellip;</p> -->
                    <input type="hidden" name="product_id" id="product_id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name"
                                value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="age" class="col-sm-2 control-label">Age</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="age" name="age" placeholder="Enter age" value=""
                                maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="city" class="col-sm-2 control-label">City</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="city" name="city" placeholder="Enter city"
                                value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="salary" class="col-sm-2 control-label">Salary</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="salary" name="salary" placeholder="Enter salary"
                                value="" maxlength="50" required="">
                        </div>
                    </div>

                    <!-- <div class="form-group">
                        <label class="col-sm-2 control-label">Details</label>
                        <div class="col-sm-12">
                            <textarea id="detail" name="detail" required="" placeholder="Enter Details"
                                class="form-control"></textarea>
                        </div>
                    </div> -->

                    <div class="col-sm-offset-2 col-sm-10">
                        <!-- <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes
                        </button> -->
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                    <button type="submit" class="btn btn-primary" id="saveBtn">Save changes</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

@section('script')
<script type="text/javascript">
// $(function() {
$('document').ready(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('ajaxproducts.index') }}",
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex'
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'age',
                name: 'age'
            },
            {
                data: 'city',
                name: 'city'
            },
            {
                data: 'salary',
                name: 'salary'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ]
    });

    $('#createNewProduct').click(function() {
        $('#saveBtn').val("create-product");
        $('#product_id').val('');
        $('#productForm').trigger("reset");
        $('#modelHeading').html("Add Employee");
        // $('#ajaxModel').modal('show');
    });

    $('body').on('click', '.editProduct', function() {
        var product_id = $(this).data('id');
        $.get("{{ route('ajaxproducts.index') }}" + '/' + product_id + '/edit', function(data) {
            $('#modelHeading').html("Edit Employee");
            $('#saveBtn').val("edit-user");
            // $('#ajaxModel').modal('show');
            $('#product_id').val(data.id);
            $('#name').val(data.name);
            $('#age').val(data.age);
            $('#city').val(data.city);
            $('#salary').val(data.salary);
        })
    });

    $('#saveBtn').click(function(e) {
        e.preventDefault();
        // $(this).html('Sending..');

        $.ajax({
            data: $('#productForm').serialize(),
            url: "{{ route('ajaxproducts.store') }}",
            type: "POST",
            dataType: 'json',
            beforeSend: function() {
                // setting a timeout
                $(this).html('Sending..');
            },
            success: function(data) {

                $('#productForm').trigger("reset");
                // $('#ajaxModel').modal('hide');
                // $('#modal-default').modal();
                // $('#modal-default').modal().hide();
                $("#modal-default .close").click()
                table.draw();

            },
            error: function(data) {
                console.log('Error:', data);
                $('#saveBtn').html('Save Changes');
            }
        });
    });

    $('body').on('click', '.deleteProduct', function() {

        var product_id = $(this).data("id");
        confirm("Are You sure want to delete !");

        $.ajax({
            type: "DELETE",
            url: "{{ route('ajaxproducts.store') }}" + '/' + product_id,
            success: function(data) {
                table.draw();
            },
            error: function(data) {
                console.log('Error:', data);
            }
        });
    });

});
</script>
@endsection