@extends('admin.layouts.default')
@section('content')
{{ HTML::script('public/admin/js/plugins/plupload/plupload.full.js'); }}
{{ HTML::script('public/admin/js/module/user_pic.js'); }}
{{ HTML::script('public/admin/js/module/admin_user_module.js'); }}

<aside class="right-side">

    <?php
    $segment = Request::segment(4);
    ?>
    <!-- Content Header (Page header) -->
    <section class="content-header listing_section">
        <h1>
            Edit Profile
            <!--small>Preview</small-->
        </h1>

    </section>
    <!-- Main content -->
    <section class="content">

        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Profile Details</h3>
                    </div><!-- /.box-header -->
                    <div class="col-md-12">
                    @if(Session::get('save'))
                    <div class="alert alert-info text-success">{{Session::get('save')}}</div>
                    @endif
                    <!-- form start -->
                    </div>
                    <form id="user_profile_form"  method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="row">
                                <div class=" col-md-6">
                                    <div class="form-group name">
                                        <label for="exampleInputEmail1 ">Name</label>
                                        <input type="text" value="{{isset($user_data->name) ? $user_data->name:''}}" class="form-control" id="name" placeholder="Name" name="name">
                                        @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
                                        <span class="error_span" id="name-err"></span>
                                    </div>
                                </div>
                                <div class=" col-md-6">
                                    <div class="form-group email">
                                        <label for="exampleInputEmail1 ">Email</label>
                                        <input type="text" value="{{isset($user_data->email) ? $user_data->email:''}}"  
                                        <?php
                                        if (isset($user_data->email)) {
                                            echo "disabled";
                                        }
                                        ?> class="form-control" id="email" placeholder="Email" name="email">
                                        @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
                                        <span class="error_span" id="email-err"></span>
                                    </div>
                                </div>



                                <div class=" col-md-6">
                                    <div class="form-group ">
                                        <label for="exampleInputEmail1">Company Name</label>
                                        <input type="text" value="{{isset($user_data->company_name) ? $user_data->company_name:''}}" class="form-control" id="company_name" placeholder="Company Name" name="company_name">

                                    </div>
                                </div>

                                <div class=" col-md-6">
                                    <div class="form-group contact_no">
                                        <label for="exampleInputEmail1">Contact No</label>
                                        <input type="text" value="{{isset($user_data->contact_no) ? $user_data->contact_no:''}}" class="form-control" id="contact_no" placeholder="Company No" name="contact_no">
                                        <p id="contact_no-err" class="error_span"></p>
                                    </div>
                                </div>
                                <input type="hidden" name="user_type_hidden" value="{{$user_data->user_group}}">
                                @if($user_data->user_group == "admin")
                                <div class=" col-md-6">
                                    <div class="form-group user_type">
                                        <label for="exampleInputEmail1">User Type</label>
                                        <select name="user_type" class="form-control" id="user_type">
                                            <option value="">Select User Type</option>
                                            <option value="1" <?php
                                            if (isset($user_data->user_type)) {
                                                if ($user_data->user_type == "1") {
                                                    echo "selected=slected";
                                                }
                                            }
                                            ?> >1</option>
                                            <option value="2" <?php
                                            if (isset($user_data->user_type)) {
                                                if ($user_data->user_type == "2") {
                                                    echo "selected=slected";
                                                }
                                            }
                                            ?>>2</option>
                                        </select>
                                        @if ($errors->has('user_type')) <p class="help-block">{{ $errors->first('user_type') }}</p> @endif
                                        <span class="error_span"  id="user_type-err"></span>
                                    </div>
                                </div>


                                <div class=" col-md-6">
                                    <div class="form-group user_group">
                                        <label for="exampleInputEmail1">User Group</label>
                                        <select name="user_group" class="form-control" id="user_group">
                                            <option value="">Select User Group</option>
                                            <option value="admin" <?php
                                            if (isset($user_data->user_group)) {
                                                if ($user_data->user_group == "admin") {
                                                    echo "selected=slected";
                                                }
                                            }
                                            ?>>Admin</option>
                                            <option value="vendor" <?php
                                            if (isset($user_data->user_group)) {
                                                if ($user_data->user_group == "vendor") {
                                                    echo "selected=slected";
                                                }
                                            }
                                            ?>>Vendor</option>
                                            <option value="outlet" <?php
                                            if (isset($user_data->user_group)) {
                                                if ($user_data->user_group == "outlet") {
                                                    echo "selected=slected";
                                                }
                                            }
                                            ?>>Outlet</option>
                                        </select>
                                        @if ($errors->has('user_group')) <p class="help-block">{{ $errors->first('user_group') }}</p> @endif
                                        <span class="error_span"  id="user_group-err"></span>
                                    </div>
                                </div>

                                @endif
                            </div>

                            <div class="row">
                                <div class=" col-md-12">
                                    <label for="exampleInputEmail1">User pic</label>
                                    <div id="user_pic_thumb_image">
                                        @if(isset($user_data->profile_pic) && ($user_data->profile_pic != ""))
                                        <?php
                                        if (isset($user_data->profile_pic)) {
                                            $pic_id = (explode(".", $user_data->profile_pic));
                                        }
                                        ?>
                                        <div class="{{$pic_id[0]}}">
                                            @if(isset($user_data->profile_pic) && File::exists('uploads/user_pic/'.$user_data->profile_pic) )

                                            <img src="{{URL::to('/').'/uploads/user_pic/'.$user_data->profile_pic}}" height="100" width="100">
                                            <br>
                                            <a href="javascript:void();" class="remove_profile_pic" id="{{$pic_id[0]}}">Remove</a>
                                            <input type="hidden" name="profile_image" value="{{$user_data->profile_pic}}">

                                            @endif
                                        </div>
                                        @else

                                        <input type="hidden" name="profile_image" value="">
                                        @endif
                                    </div>
                                    <div class="form-group">

                                        <div id="user_pic_filelist" ></div>
                                        <div id="user_pic_container">
                                            <input type="file" style="margin-top:20px;"   id="user_pic_pickfiles" >
                                            <!--<label style="margin:5px 0 0 0">Select Image</label>-->
                                            <span class="error" id="user_profile_image_err"></span>

                                        </div>
                                        <span id="name_err" class="error err_display"> fsfg</span>
                                    </div>
                                </div>
                                </div>
                                  <div class="row">
                                <div class="box-header">
                                    <h3 class="box-title">Reset Password</h3>
                                </div><!-- /.box-header -->


                                <div class=" col-md-6">
                                    <div class="form-group old_password">
                                        <label for="exampleInputEmail1">Old Password</label>
                                        <input type="password" value="" class="form-control" id="old_password" placeholder="password" name="old_password">
                                        @if ($errors->has('old_password')) <p class="help-block">{{ $errors->first('old_password') }}</p> @endif
                                        <span class="error_span" id="old_password-err"></span>
                                    </div>
                                </div>


                                <div class=" col-md-6">
                                    <div class="form-group password">
                                        <label for="exampleInputEmail1">New Password</label>
                                        <input type="password" value="" class="form-control" id="password" placeholder="password" name="password">
                                        @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
                                        <span class="error_span" id="password-err"></span>
                                    </div>
                                </div>

                                <div class=" col-md-6">
                                    <div class="form-group password_confirm">
                                        <label for="exampleInputEmail1">Confirm Password</label>
                                        <input type="password" value="" class="form-control" id="exampleInputEmail1" placeholder="Password Confirm" id="password_confirm" name="password_confirm">
                                        @if ($errors->has('password_confirm')) <p class="help-block">{{ $errors->first('password_confirm') }}</p> @endif
                                        <span class="error_span" id="password_confirm-err"></span>
                                    </div>
                                </div>

                            </div>

                            <input type="hidden" value="{{isset($segment)?$segment:''}}" class="form-control" id="a_id" name="id">

                        </div><!-- /.box-body -->

                        <div class="box-footer">

                            <div class="form-group"> 
                                <div class="btn_submit_loader"></div>
                                <!--button id="btn_submit" type="submit" class="btn btn-primary">Submit</button-->

                                <input type="submit" id="btn_submit" class="btn btn-primary"  value="Submit">
                            </div>
                        </div>
                    </form>
                </div><!-- /.box -->

            </div><!--/.col (left) -->

        </div>   <!-- /.row -->
    </section><!-- /.content -->
</aside><!-- /.right-side -->
@stop