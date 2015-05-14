@extends('admin.layouts.default')
@section('content')
{{ HTML::script('public/admin/js/module/admin_city_module.js'); }}
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header listing_section">
        <h1>
            Add City
            <!--small>Preview</small-->
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{URL::route('admin/city');}}" class="btn btn-primary btn-sm addnew">Cities List</a></li>
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
                    <form id="city_form" method="post" class="">
                        <?php
                        $segment = Request::segment(4);
                        ?>
                        <div class="box-body">
                            <div class="form-group form-group form-input-text city">
                                <label for="exampleInputEmail1">City Name</label>
                                <input type="name" value="{{isset($segment)?$cities_data[0]['city']:''}}" class="form-control" id="exampleInputEmail1" placeholder="Name" name="city">
                                @if ($errors->has('city')) <p class="help-block">{{ $errors->first('city') }}</p> @endif
                                <span class="error_span" id="city_err"> </span>
                            </div>

                            <div class="form-group  form-input-text">
                                <label for="exampleInputEmail1">Active</label><br>
                                <select class="form-control" name="status">

                                    <option value="1"  <?php
                                    if (isset($cities_data[0]['status'])) {
                                        if ($cities_data[0]['status'] == 1) {
                                            echo 'selected=selected';
                                        }
                                    }
                                    ?>>Yes</option>
                                    <option value="0" <?php
                                    if (isset($cities_data[0]['status'])) {
                                        if ($cities_data[0]['status'] == 0) {
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



                <!--div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Upload CSV</h3>
                    </div>
                    
                    <form action="{{ URL::route('admin/upload_csv'); }}" method="post" class="" enctype="multipart/form-data">
                        <div class="box-body">


                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <input type="file" id="exampleInputFile" name="csvfile">

                            </div>

                        </div>

                        <div class="box-footer">
                            <div class="btn_submit_loader"></div>
                            <button type="submit" id="btn_submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div-->



            </div><!--/.col (left) -->

        </div>   <!-- /.row -->
    </section><!-- /.content -->
</aside><!-- /.right-side -->

@stop