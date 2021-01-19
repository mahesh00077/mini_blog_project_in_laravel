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
        <li><a href="#">Qr code</a></li>
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
            <h3 class="box-title">Qr code list</h3>
            <!-- <div class="box-tools pull-right">
                </div> -->
        </div>
        <div class="box-body">
            <table class="table table-bordered">
                <th>
                    <tr>
                        <td>QR code</td>
                        <td>Name</td>
                    </tr>
                </th>
                <tbody>
                    <tr>
                        <td>{!! QrCode::size(200)->generate('Testing'); !!}</td>
                        <td>Testing</td>
                    </tr>
                    <tr>
                        <td>{{QrCode::size(20)->backgroundColor(255,55,0)->generate('W3Adda Laravel Tutorial')}}
                        </td>
                        <td>Size and background function</td>
                    </tr>
                    <tr>
                        <td>
                            {!! QrCode::size(50)->email('john@w3adda.com'); !!}

                        </td>
                        <td>Specify just email address</td>
                    </tr>
                    <tr>
                        <td>
                            {!! QrCode::email('mahesh@google.com', 'Thank you for visiting', 'Laravel
                            Tutorial'); !!}

                        </td>
                        <td>Specify email address, subject and the body </td>
                    </tr>
                    <tr>
                        <td>
                            {!! QrCode::phoneNumber('937-392-5466'); !!}

                        </td>
                        <td>Phone number method or SMS(number,message); </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.box -->
</section>
<!-- /.content -->

@endsection