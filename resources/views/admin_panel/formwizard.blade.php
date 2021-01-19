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
        <li><a href="#">Form Wizard</a></li>
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

@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
        <li>Please click on Add new order button you will see errors..!!</li>
    </ul>
</div>
@endif
<br>
<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Order Form</h3>
            <div class="box-tools pull-right">
                <!-- <a class="btn btn-primary" href="{{url('admin/add_user')}}">Add User</a> -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#orderFormModel"> Add New
                    Order </button>
            </div>
        </div>
        <div class="box-body">
            <!-- Start creating your amazing application! -->
            <div class="container">
                <div class="table-responsive">
                    <table id="example" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="12%" class="text-center">Sr. No.</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">email</th>
                                <!-- <th  class="text-center">Mobile</th> -->
                                <!-- <th  class="text-center">City</th> -->
                                <th class="text-center">product name</th>
                                <th class="text-center">Amount</th>
                                <th class="text-center">Payment Mode</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // dd($postDetails);
                            if (!empty($tbl_data)) {

                                $i = ($tbl_data->currentPage() - 1) * $tbl_data->perPage() + 1;
                                // $i = '1';
                            ?>

                            @foreach($tbl_data as $value)
                            <tr>
                                <td class="text-center">{{$i++}}</td>

                                <td><?php echo !empty($value->name) ? ucfirst($value->name) : ''; ?></td>
                                <td><?php echo !empty($value->email) ? ucfirst($value->email) : ''; ?></td>
                                <td><?php echo !empty($value->product_name) ? ucfirst($value->product_name) : ''; ?>
                                </td>
                                <td><?php echo !empty($value->main_amt) ? ucfirst($value->main_amt) : ''; ?></td>
                                <td><?php echo !empty($value->payment_mode) ? ($value->payment_mode) : ''; ?></td>



                            </tr>
                            @endforeach
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <!-- <div class="box-footer">            
        </div> -->
        <!-- /.box-footer-->
    </div>
    <!-- /.box -->
</section>
<!-- /.content -->
<div class="modal fade" id="orderFormModel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modelHeading">Order Form</h4>
            </div>
            <div class="modal-body">
                <div class="stepwizard">
                    <div class="stepwizard-row setup-panel">
                        <div class="stepwizard-step">
                            <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                            <p>Personal Info</p>
                        </div>
                        <div class="stepwizard-step">
                            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                            <p>Product Info</p>
                        </div>
                        <div class="stepwizard-step">
                            <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                            <p>Payment Info</p>
                        </div>
                        <div class="stepwizard-step">
                            <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                            <p>Complete</p>
                        </div>
                    </div>
                </div>
                <form role="form" id="frmVal" action="{{ url('admin/form_wizard/add') }}" method="post">
                    @csrf
                    <div class="row setup-content" id="step-1">
                        <div class="col-xs-12">
                            <div class="col-md-12">
                                <!-- <h3> Personal Info</h3> -->
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" placeholder="Name" name="name"
                                        value="{{old('name')}}" required>
                                    <p style="color:red">{{$errors->first('name')}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" class="form-control" placeholder="Email" name="email"
                                        value="{{old('email')}}" required>
                                    <p style="color:red">{{$errors->first('email')}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mobile Number</label>
                                    <input type="text" class="form-control" placeholder="mobile_no" name="mobile_no"
                                        value="{{old('mobile_no')}}" required>
                                    <p style="color:red">{{$errors->first('mobile_no')}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Country</label>
                                    <input type="text" class="form-control" placeholder="Country" name="country"
                                        value="{{old('country')}}" required>
                                    <p style="color:red">{{$errors->first('country')}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">state</label>
                                    <input type="text" class="form-control" placeholder="state" name="state"
                                        value="{{old('state')}}" required>
                                    <p style="color:red">{{$errors->first('state')}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">City</label>
                                    <input type="text" class="form-control" placeholder="City" name="city"
                                        value="{{old('city')}}" required>
                                    <p style="color:red">{{$errors->first('city')}}</p>
                                </div>

                                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next</button>
                            </div>
                        </div>
                    </div>
                    <div class="row setup-content" id="step-2">
                        <div class="col-xs-12">
                            <div class="col-md-12">
                                <!-- <h3> Product Info</h3> -->
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product</label>
                                    <select class="form-control products" id="products" name="product">
                                        <option selected value="none">Select Product</option>
                                        @foreach($product_data as $value)
                                        <option value="{{$value->id}}" data-ammount="{{$value->amount}}"
                                            <?php echo old('product') == $value->id ? 'selected' : ''; ?>>
                                            {{$value->product_name}}
                                        </option>
                                        @endforeach
                                    </select>
                                    <p style="color:red">{{$errors->first('product')}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Quantity</label>
                                    <input type="text" class="form-control" placeholder="Quantity" id="qty"
                                        name="quantity" value="{{old('quantity')?old('quantity'):1}}" required>
                                    <p style="color:red">{{$errors->first('quantity')}}</p>
                                </div>
                                <button type="button" class="btn btn-default prev-step"><i
                                        class="fa fa-chevron-left"></i> Back</button>
                                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next</button>
                            </div>
                        </div>
                    </div>
                    <div class="row setup-content" id="step-3">
                        <div class="col-xs-12">
                            <div class="col-md-12">
                                <!-- <h3> Payment Info</h3> -->
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Payment Mode</label>
                                    <select class="form-control payment_mode" name="payment_mode">
                                        <option selected value="none">Select Payment Mode</option>
                                        <option value="cod"
                                            <?php echo old('payment_mode') == 'cod' ? 'selected' : ''; ?>>COD</option>
                                        <option value="online"
                                            <?php echo old('payment_mode') == 'online' ? 'selected' : ''; ?>>Online
                                            Paypal
                                        </option>
                                        <option value="debit_card"
                                            <?php echo old('payment_mode') == 'debit_card' ? 'selected' : ''; ?>>
                                            Debit/Credit Card
                                        </option>
                                    </select>
                                    <p style="color:red">{{$errors->first('payment_mode')}}</p>
                                </div>
                                <div id="paypal-id" style="display: none;">
                                    <div class="form-group">
                                        <label for="paypal_id">Paypal ID</label>
                                        <input type="text" class="form-control" id="paypal_id" name="paypal_id"
                                            placeholder="Enter Paypal ID"
                                            value="{{old('paypal_id')?old('paypal_id'):''}}"
                                            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                                    </div>
                                </div>
                                <div id="debit" style="display: none;">

                                    <div class="form-group">
                                        <label for="cardNumber">Card number</label>
                                        <input type="text" class="form-control" id="cardNumber" name="cardNumber"
                                            placeholder="Card Number" value="{{old('cardNumber')?old('cardNumber'):''}}"
                                            onchange="check(this.value)" pattern="[0-9]{13,16}">
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label><span class="hidden-xs">Expiration</span> </label>
                                                <div class="form-inline">
                                                    <select class="form-control" style="width:45%" id="month"
                                                        name="month">
                                                        <option selected value="">Select Month</option>
                                                        <option value="01"
                                                            <?php echo old('month') == '01' ? 'selected' : ''; ?>>01
                                                        </option>
                                                        <option value="02"
                                                            <?php echo old('month') == '02' ? 'selected' : ''; ?>>02
                                                        </option>
                                                        <option value="03"
                                                            <?php echo old('month') == '03' ? 'selected' : ''; ?>>03
                                                        </option>
                                                        <option value="04"
                                                            <?php echo old('month') == '04' ? 'selected' : ''; ?>>04
                                                        </option>
                                                        <option value="05"
                                                            <?php echo old('month') == '05' ? 'selected' : ''; ?>>05
                                                        </option>
                                                        <option value="06"
                                                            <?php echo old('month') == '06' ? 'selected' : ''; ?>>06
                                                        </option>
                                                        <option value="07"
                                                            <?php echo old('month') == '07' ? 'selected' : ''; ?>>07
                                                        </option>
                                                        <option value="08"
                                                            <?php echo old('month') == '08' ? 'selected' : ''; ?>>08
                                                        </option>
                                                        <option value="09"
                                                            <?php echo old('month') == '09' ? 'selected' : ''; ?>>09
                                                        </option>
                                                        <option value="10"
                                                            <?php echo old('month') == '10' ? 'selected' : ''; ?>>10
                                                        </option>
                                                        <option value="11"
                                                            <?php echo old('month') == '11' ? 'selected' : ''; ?>>11
                                                        </option>
                                                        <option value="12"
                                                            <?php echo old('month') == '12' ? 'selected' : ''; ?>>12
                                                        </option>
                                                    </select>
                                                    <span style="width:10%; text-align: center"> / </span>
                                                    <select class="form-control" style="width:45%" id="year"
                                                        name="year">
                                                        <option selected value="">Select Year</option>
                                                        <option value="2021"
                                                            <?php echo old('year') == '2021' ? 'selected' : ''; ?>>2021
                                                        </option>
                                                        <option value="2022"
                                                            <?php echo old('year') == '2022' ? 'selected' : ''; ?>>2022
                                                        </option>
                                                        <option value="2023"
                                                            <?php echo old('year') == '2023' ? 'selected' : ''; ?>>2023
                                                        </option>
                                                        <option value="2024"
                                                            <?php echo old('year') == '2024' ? 'selected' : ''; ?>>2024
                                                        </option>
                                                        <option value="2025"
                                                            <?php echo old('year') == '2025' ? 'selected' : ''; ?>>2025
                                                        </option>
                                                        <option value="2026"
                                                            <?php echo old('year') == '2026' ? 'selected' : ''; ?>>2026
                                                        </option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label data-toggle="tooltip" title=""
                                                    data-original-title="3 digits code on back side of the card">CVV <i
                                                        class="fa fa-question-circle"></i></label>
                                                <input class="form-control" id="cvv" name="cvv"
                                                    value="{{old('cvv')?old('cvv'):''}}" type="text" pattern="[0-9]{3}">
                                            </div> <!-- form-group.// -->
                                        </div>
                                    </div> <!-- row.// -->
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Amount</label>
                                    <input type="number" class="form-control" id="amt" placeholder="Amount"
                                        value="{{old('amt')}}" name="amt" readonly>
                                </div>
                                <button type="button" class="btn btn-default prev-step"><i
                                        class="fa fa-chevron-left"></i> Back</button>
                                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next</button>

                            </div>
                        </div>
                    </div>
                    <div class="row setup-content" id="step-4">
                        <div class="col-xs-12">
                            <div class="col-md-12">
                                <!-- <h3> Complete</h3> -->
                                <p>You have successfully completed all steps.</p>
                                <br><br>
                                <button type="button" class="btn btn-default prev-step"><i
                                        class="fa fa-chevron-left"></i> Back</button>
                                <button class="btn btn-primary btn-lg pull-right" type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


@endsection
@section('script')
<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
<!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> -->
<!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
<script type="text/javascript" src="{{ asset('js/formwizard.js') }}"></script>
<script src="http://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>

<script type="application/javascript">
$(document).ready(function() {

    var navListItems = $('div.setup-panel div a'),
        allWells = $('.setup-content'),
        allNextBtn = $('.nextBtn');
    allPrevBtn = $('.prev-step');

    allWells.hide();

    navListItems.click(function(e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function() {
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next()
            .children("a"),
            curInputs = curStep.find("input[type='text'],input[type='email'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for (var i = 0; i < curInputs.length; i++) {
            if (!curInputs[i].validity.valid) {
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });
    allPrevBtn.click(function() {
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().prev()
            .children("a"),
            curInputs = curStep.find("input[type='text'],input[type='email'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for (var i = 0; i < curInputs.length; i++) {
            if (!curInputs[i].validity.valid) {
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });


    $('div.setup-panel div a.btn-primary').trigger('click');
});

$('.products').on('change', function() {
    var selected = $(this).find('option:selected');
    var get_product_amt = selected.data('ammount');
    // alert(get_product_amt);
    var qty = $('#qty').val();
    var amt = qty * get_product_amt;
    // console.log(amt);
    $('#amt').val(amt);

});

$('.payment_mode').on('change', function() {
    var selected = $(this).find('option:selected');
    var val = selected.val();
    // alert(val);
    // console.log("val:" + val);
    if (val == 'debit_card') {
        $('#debit').css('display', 'block');
        $("#cardNumber").prop('required', true);
        $("#month").prop('required', true);
        $("#year").prop('required', true);
        $("#cvv").prop('required', true);

        $('#paypal-id').css('display', 'none');
        $("#paypal_id").removeAttr('required');


    } else if (val == 'online') {
        $('#debit').css('display', 'none');
        $("#cardNumber").removeAttr('required');
        $("#month").removeAttr('required');
        $("#year").removeAttr('required');
        $("#cvv").removeAttr('required');
        $('#paypal-id').css('display', 'block');
        $("#paypal_id").prop('required', true);
    } else {
        $('#debit').css('display', 'none');
        $('#paypal-id').css('display', 'none');

        $("#cardNumber").removeAttr('required');
        $("#month").removeAttr('required');
        $("#year").removeAttr('required');
        $("#cvv").removeAttr('required');

        $("#paypal_id").removeAttr('required');

    }
});

$('#qty').on('change', function() {
    var selected = $('.products').find('option:selected');
    var get_product_amt = selected.data('ammount');
    // alert(get_product_amt);
    var qty = $(this).val();
    var amt = qty * get_product_amt;
    console.log(amt);
    $('#amt').val(amt);
});

function check(value) {
    if (/[^0-9-]+/.test(value)) {
        alert('enter correct number');
        $('#cardNumber').focus();
    }

}
</script>
@endsection