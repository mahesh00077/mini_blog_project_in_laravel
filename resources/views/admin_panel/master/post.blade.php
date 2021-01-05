@extends('admin_panel.app')

@section('main-content')

<!-- Content Header (Page header) -->
<section class="content-header">

    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Post</a></li>
        <!-- <li class="active">Editors</li> -->
    </ol>
</section>
<br>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header">


                    <h3 class="box-title">{{ !empty($editPostDetails)?'Edit':'Add' }} Post
                    </h3>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form method="post" action="{{url('admin/post_add/action')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="text" name="TXTID" value="{{!empty($editPostDetails)?$editPostDetails['id']:''}}">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Post Title</label>
                            <input type="text" class="form-control" name="post_title" id="post_title"
                                value="{{!empty($editPostDetails)?$editPostDetails['title']:''}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Post Sub Title</label>
                            <input type="text" class="form-control" name="post_sub_title" id="post_sub_title"
                                value="{{!empty($editPostDetails)?$editPostDetails['subtitle']:''}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug</label>
                            <input type="text" class="form-control" name="slug" id="slug"
                                value="{{!empty($editPostDetails)?$editPostDetails['slug']:''}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category</label>
                            <select class="form-control" name="category">
                                <option selected>Select Category</option>
                                @foreach($category_data as $value)
                                <option value="{{$value->cat_id}}"
                                    <?php echo !empty($editPostDetails) ? $editPostDetails['cat_id'] == $value->cat_id ? 'Selected' : '' : ''; ?>>
                                    {{$value->name}}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Image Upload</label>
                            <input type="file" id="exampleInputFile" name="img_upload">
                            <input type="hidden" name="old_img_path"
                                value="{{!empty($editPostDetails)?$editPostDetails['image_path']:''}}">
                            <input type="hidden" name="img_idd"
                                value="{{!empty($editPostDetails)?$editPostDetails['img_id']:''}}">
                            <!-- <p class="help-block">Example block-level help text here.</p> -->
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="status"
                                    <?php echo !empty($editPostDetails['status']) ? 'checked' : ''; ?>>
                                Publish ?
                            </label>
                        </div>

                        <textarea class="textarea" name="body" placeholder="Place some text here"
                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                        {{!empty($editPostDetails)?$editPostDetails['body']:''}}
                        </textarea>
                        <div class="box-footer">
                            <button type="submit"
                                class="btn btn-primary">{{!empty($editPostDetails)?"Update":"Submit"}}</button>
                            <!-- </div> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.col-->

    </div>
    <!-- ./row -->
</section>
<!-- /.content -->


@endsection