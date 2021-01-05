@extends('admin_panel.app')


@section('main-content')

<!-- Content Header (Page header) -->
<section class="content-header">

    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Add User</a></li>
        <!-- <li class="active">Blank page</li> -->
    </ol>
</section>
<br>
<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">{{ !empty($edit_data)?'Edit':'Add'}} User</h3>

        </div>
        <div class="box-body">
            <form method="post" action="{{url('admin/add_user/action')}}" autocomplete="off">
                {{csrf_field()}}
                <input type="hidden" name="TXTID" value="{{!empty($edit_data)?$edit_data->id:''}}">
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control" name="username" id="username"
                        value="{{!empty($edit_data)?$edit_data->username:''}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email Id</label>
                    <input type="text" class="form-control" name="email" id="email"
                        value="{{!empty($edit_data)?$edit_data->email:''}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Role</label>
                    <select class="form-control" name="role">
                        <option selected>Select Role</option>
                        @foreach($role_data as $value)

                        <option value="{{$value->id}}"
                            {{!empty($edit_data)?$edit_data->role==$value->id?'Selected':'':''}}>{{$value->name}}
                        </option>
                        @endforeach
                    </select>
                </div>
                @if(empty($edit_data))
                <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                @endif
                <div style="align-content: center;">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="post" <?php echo !empty($edit_data->post) ? 'checked' : ''; ?>>
                            Post
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="category"
                                <?php echo !empty($edit_data->category) ? 'checked' : ''; ?>>
                            Category
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="tag" <?php echo !empty($edit_data->tag) ? 'checked' : ''; ?>>
                            Tag
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="users"
                                <?php echo !empty($edit_data->users) ? 'checked' : ''; ?>>
                            Users
                        </label>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">{{!empty($edit_data)?"Update":"Submit"}}</button>
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