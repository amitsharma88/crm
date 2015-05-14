@extends('admin.layouts.default')
@section('content')
{{ HTML::script('public/admin/js/module/admin_location_module.js'); }}
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header listing_section">
        <h1>
            Add Location
            <!--small>Preview</small-->
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{URL::route('admin/location');}}" class="btn btn-primary btn-sm addnew">Listing View</a></li>
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
                        <!--h3 class="box-title">Quick Example</h3-->
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form id="location_form" method="post" class="">
                        <?php
                        $segment = Request::segment(4);
                        ?>
                        <div class="box-body">
                            <div class="form-group orm-group form-input-text location">
                                <label for="exampleInputEmail1">Location Name</label>
                                <input type="name" value="{{isset($segment)?$locations_data[0]['location']:''}}" class="form-control" id="exampleInputEmail1" placeholder="Name" name="location">
                                @if ($errors->has('location')) <p class="help-block">{{ $errors->first('location') }}</p> @endif
                                <span class="error_span" id="location_err"> </span>
                            </div>

                            <div class="form-group  form-input-text">
                                <label for="exampleInputEmail1">Active</label><br>
                                <select class="form-control" name="status">

                                    <option value="1"  <?php
                        if (isset($locations_data[0]['status'])) {
                            if ($locations_data[0]['status'] == 1) {
                                echo 'selected=selected';
                            }
                        }
                        ?>>Yes</option>
                                    <option value="0" <?php
                                            if (isset($locations_data[0]['status'])) {
                                                if ($locations_data[0]['status'] == 0) {
                                                    echo 'selected=selected';
                                                }
                                            }
                                            ?>>No</option>

                                </select>


                            </div>

                            <input type="hidden" value="{{isset($segment)?$segment:''}}" class="form-control" id="r_id" name="id">

                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <div class="btn_submit_loader"></div>
                            <button type="submit" id="btn_submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div><!-- /.box -->



            </div><!--/.col (left) -->

        </div>   <!-- /.row -->
    </section><!-- /.content -->
</aside><!-- /.right-side -->

@stop