@extends('admin.layouts.default')
@section('content')

{{ HTML::script('public/admin/js/module/admin_project_module.js'); }}

<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header listing_section">
        <h1>Add {{$heading}}</h1>
        <ol class="breadcrumb">
          
            <li><a href="{{SITE_URL}}masters/{{$heading}}/{{$table_name}}" class="btn btn-primary btn-sm addnew">Listing View</a></li>
        </ol>
    </section>

    <!-- Main content -->

    <section class="content">
        <div class="row">
            <form id="master_form"  onsubmit="return false;">
                <!-- left column -->
                <div class="col-md-12">

                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">{{$heading}} Information</h3>
                        </div><!-- /.box-header -->

                        <div class="box-body">
                            <div class="row">
                                <div class=" col-md-6">
                                    <div class="form-group name">
                                        <label for="restaurantname">Name</label>
                                        <input type="text" value="{{isset($master->name) ? $master->name:''}}" class="form-control" id="exampleInputEmail1" placeholder="Name" name="name">
                                        <span id="name_err" class="error err_display"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="clearfix"></div>

                            <div class="row">
                                <div class=" col-md-6">
                                    <div class="form-group category">
                                        <label for="exampleInputEmail1">Status</label>
                                        <select name="status"  class="form-control">
                                            <option {{isset($master->status) && $master->status == 1 ? 'selected' : ''}} value="1">Yes</option>
                                            <option {{isset($master->status) && $master->status == 0 ? 'selected' : ''}} value="0">No</option>
                                        </select>
                                        <span id="status_err" class="error err_display"> </span>
                                    </div>
                                </div>
                            </div>





                            <div class="box box-info">
                                <div class="box-footer">
                                    <input type="hidden" value="{{isset($master->id) ? $master->id:''}}" class="form-control" id="r_id" name="id">
                                    <input type="hidden" value="{{$table_name}}" name="table" class='table'>
                                    <input type="hidden" value="{{$heading}}" name="heading" class='heading'>
                                    <div class="form-group"> 
                                        <div class="btn_submit_loader"></div>
                                        <button id="btn_submit" type="submit" class="btn btn-primary" >Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                    </section><!-- /.content -->
                    </aside><!-- /.right-side -->


                    @stop