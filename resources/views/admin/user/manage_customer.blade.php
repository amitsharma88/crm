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
            Add a Customer
            <!--small>Preview</small-->
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{URL::route('admin/user');}}" class="btn btn-primary btn-sm addnew">Listing View</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">User</h3>
                    </div><!-- /.box-header -->

                    <form id="user_form"  method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="row">
                                <div class=" col-md-6">
                                    <div class="form-group name">
                                        <label for="exampleInputEmail1 ">First Name</label>
                                        <input type="text" value="{{isset($user_data->first_name) ? $user_data->first_name:''}}" class="form-control" id="name" placeholder="Name" name="first_name">
                                        <span class="error_span" id="first_name-err"></span>
                                    </div>
                                </div>
                                <div class=" col-md-6">
                                    <div class="form-group name">
                                        <label for="exampleInputEmail1 ">Last Name</label>
                                        <input type="text" value="{{isset($user_data->last_name) ? $user_data->last_name:''}}" class="form-control" id="name" placeholder="Name" name="last_name">
                                        <span class="error_span" id="last_name-err"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class=" col-md-6">
                                    <div class="form-group email">
                                        <label for="exampleInputEmail1 ">Email</label>
                                        <input type="text" value="{{isset($user_data->email) ? $user_data->email:''}}"  
                                        <?php
                                        if (isset($user_data->email)) {
                                            echo "disabled";
                                        }
                                        ?> class="form-control" id="email" placeholder="Email" name="email">
                                        <span class="error_span" id="email-err"></span>
                                    </div>
                                </div>
                                <div class=" col-md-6">
                                    <div class="form-group contact_no">
                                        <label for="exampleInputEmail1">Contact No</label>
                                        <input type="text" value="{{isset($user_data->mobile) ? $user_data->mobile:''}}" class="form-control" id="contact_no" placeholder="Contact No" name="mobile">
                                        <p id="mobile-err" class="error_span"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class=" col-md-6">
                                    <div class="form-group password">
                                        <label for="exampleInputEmail1">Password</label>
                                        <input type="password" value="" class="form-control" id="password" placeholder="password" name="password">
                                        <span class="error_span" id="password-err"></span>
                                    </div>
                                </div>

                                <div class=" col-md-6">
                                    <div class="form-group password_confirm cpassword">
                                        <label for="exampleInputEmail1">Confirm Password</label>
                                        <input type="password" value="" class="form-control" id="exampleInputEmail1" placeholder="Password Confirm" id="password_confirm" name="password_confirm">
                                        <span class="error_span" id="cpassword-err"></span>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class=" col-md-6">
                                    <div class="form-group user_type">
                                        <label for="exampleInputEmail1">User Type</label>
                                        <select name="user_type" class="form-control" id="user_type">
                                            <option value="">Select User Type</option>
                                        </select>
                                        <span class="error_span"  id="user_type-err"></span>
                                    </div>
                                </div>


                                <div class=" col-md-6">
                                    <div class="form-group user_group">
                                        <label for="exampleInputEmail1">Type of User</label>
                                        <select name="user_group" class="form-control" id="user_group">
                                            <option value="">Select User Group</option>
                                            @if($user_group)
                                            @foreach($user_group as $group)
                                            @if(Session::get('admin_user_group') != $group->value)
                                            <option {{isset($user_data->user_group) && $user_data->user_group == $group->value ? 'selected' : '' }} value="{{$group->value}}">{{$group->name}}</option>
                                            @endif
                                            @endforeach
                                            @endif
                                        </select>
                                        <span class="error_span"  id="user_group-err"></span>
                                    </div>
                                </div>
                            </div>


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
                                        <span class="error" id="user_pic_image_err"></span>

                                    </div>
                                    <span id="name_err" class="error err_display"> fsfg</span>
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